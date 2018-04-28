<?php
/**
 * Created by PhpStorm.
 * User: benlmsc
 * Date: 16/04/2018
 * Time: 1:46 PM
 */

class AuthServices {

    public $_dbm;

    /**
     * AuthServices constructor.
     * @param DBManager $dbm
     */
    public function __construct(DBManager $dbm)
    {
        $this->_dbm = $dbm;
    }

    /**
     * @param $emailorusername
     * @param $password
     * @return bool|array
     */
    public function signin($emailorusername, $password)
    {
        # Protect against CSRF Flaws. Injection of HTML|PHP
        $login = array(
            'user' => strip_tags($emailorusername),
            'pass' => strip_tags($password)
        );
        // TODO : Set the preg_match regex for the inputs
        if ( empty($login['user']) ) return ['error' => EMAIL_MISSING];
        if ( empty($login['pass']) ) return ['error' => PASSWORD_MISSING];

        if ( !empty($login['user']) && !empty($login['pass']) ) {
            // TODO : Check if user/pass isValidate (regex)
            $repo = $this->_dbm->getUsersRepository();
            $result = $repo->login($login['user'], $login['pass']);

            if (is_array($result))
                return $result;

            $userdata = array(
                'id' => $result->getId(),
                'email' => $result->getEmail(),
                //'password' => $result->getPassword(),
                'username' => $result->getUsername()
            );

            $_SESSION['user'] = $userdata;

            return TRUE;
        }
    }

    // TODO : inscription
    public function signup()
    {

    }
}