<?php
session_start();

# 1) Importation des classes Request et Response.
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
# Import de ce qui nous permettra de rendre des vues
use \Slim\Views\PhpRenderer;

# 2) Import de l'autoloade de Composer.
require 'vendor/autoload.php';
# Custom autoloader
require 'autoloader.php';
# We require our config file for slim
require_once 'config.php';


# 3) Création d'un objet app fournit par Slim qui sera notre point de démarrage.
#      On y passe notre array config dans son constructor.
$app = new \Slim\App(['settings' => $config]);
# On set le folder où sera basé nos views
$container = $app->getContainer();
$container['views'] = new PhpRenderer('./Views');
$container['dbmanager'] = new DBManager($config);




$app->get('/', function (Request $request, Response $response) {
   return $response->withStatus(302)->withHeader('Location', '/login');
});

# 4) Nos routes contiennent une request, une response et des paramètres request optionnels contenu dans un array avec
# une clé pour variable (ici $name)
# ou une variable directement que l'on aurait pu passer comme $name à la place de l'array.

# GET | Testing route
$app->get('/test', function (Request $request, Response $response) {
   $db = $this->dbmanager;
   $repo = $db->getVffRepository();
   $data = $repo->select();
   return json_encode($data);
});

# GET | Login route | Optionnal parameter error
$app->get('/login[/{error}[/{logger:.*}]]', function (Request $request, Response $response, $args) use ($url) {

    if (empty($args)) {
        $error = NULL;
        $logger = NULL;
    } else {
        $error = $args['error'];
        $logger = empty($args['logger']) ? NULL : explode('/', $args['logger']);
    }

    $args = [
        'website_title' => 'Connection',
        'url' => $url,
        'error' => $error,
        'logger' => $logger
    ];

    return $this->views->render($response, '/Login.php', $args);
});

# POST | Login route
$app->post('/login', function (Request $req, Response $res) {
    # Get data form previously sends from GET /login
    $post = $req->getParsedBody();
    $user = $post['emailorusername'];
    $pass = $post['password'];

    $service = new AuthServices($this->dbmanager);
    $result = $service->signin($user, $pass);

    function errorManager($error) {
        if ($error === ACCOUNT_DONT_EXIST)
            return 'Ce compte n\'existe pas !';
        if ($error === BAD_PASSWORD)
            return 'Mauvais mot de passe !';
        if ($error === EMAIL_MISSING)
            return 'Le champ email n\'est pas remplis';
        if ($error === PASSWORD_MISSING)
            return 'Le champ du mot de passe est vide ! Veuillez renseigner un mot de passe';
    }

    return !is_array($result)
                ? $res->withStatus(302)->withHeader('Location', '/dashboard')
                : $res->withStatus(302)
                      ->withHeader('Location',
                                   '/login/' . errorManager($result['error']) . "/$user/$pass");
});

# GET | Dashboard route
$app->get('/dashboard', function (Request $req, Response $res) use ($url) {
    $args = [
        'website_title' => 'Tableau de bord',
        'url' => $url
    ];
    return $this->views->render($res, '/Dashboard.php', $args);
})->setName('dashboard');

# GET | CreateFolder route
$app->get('/createFolder', function (Request $req, Response $res) use ($url) {
    $args = [
        'website_title' => 'Créer un dossier',
        'url' => $url
    ];
    return $this->views->render($res, '/CreateFolder.php', $args);
});

# POST | CreateFolder route
$app->post('/createFolder', function (Request $req, Response $res) use ($app, $url) {
    $post = $req->getParsedBody();
    $service = new FolderServices($this->dbmanager);
    $result = $service->createFolder($post);

    // Redirect to http://www.exemple.com/validateFolder/13
    if ( is_string($result) ) return $res->withHeader('Location', $url . "validateFolder/$result");

});

# GET | Cities route
# Renders an object json which provides the necessaries data on cities
$app->get('/cities', function (Request $req, Response $res) {
    $repo = $this->dbmanager->getVffRepository();
    $data = $repo->select();
    return json_encode($data);
});

# GET | ValidateFolder route
$app->get('/validateFolder/{lastInsertId}', function (Request $req, Response $res, array $args) use ($url) {

    $lastInsertId = $args['lastInsertId'] ?: false;

    $repo = $this->dbmanager->getGieRepository();
    $fetch = $repo->check($lastInsertId);

    # This condition prevent any false access
    if ( !$lastInsertId || !$fetch ) {
        $args = [
            'website_title' => 'Tableau de bord',
            'url' => $url
        ];

        $uri = $this->router->pathFor('dashboard', $args);

        return $res->withHeader('Location', $uri);
    }

    $args = [
        'website_title' => 'Dossier à valider',
        'url' => $url,
        'lastInsertId' => $lastInsertId
    ];

    return $this->views->render($res, 'ValidateFolder.php', $args);
});

# 5) On indique à Slim que la configuration est finie et qu'il est temps de se lancer.
$app->run();