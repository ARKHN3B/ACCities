<?php
/**
 * Created by PhpStorm.
 * User: benlmsc
 * Date: 16/04/2018
 * Time: 11:00 AM
 */

require_once 'global.types.php';

# Settings for development
if ($server_name === 'dev.local.classme' || $server_name === 'localhost') {
    $config['displayErrorDetails'] = TRUE;
    $config['addContentLengthHeader'] = FALSE;

    # Config database
    $config['db']['host'] = $server_name;
    $config['db']['user'] = 'root';
    $config['db']['pass'] = 'root';
    $config['db']['dbname'] = 'CLASSEMENT_MEUBLE';
    $config['db']['port'] = '8889';
}
# Settings for production
else {
    // TODO : add a config for prod in the future
    var_dump('Production server');
}

# Set the global url
$https
    ?  $url = 'https://' . $http_host
    :  $url = 'http://' . $http_host;
$url .= '/';