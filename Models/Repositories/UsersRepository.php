<?php
/**
 * Created by PhpStorm.
 * User: benlmsc
 * Date: 16/04/2018
 * Time: 12:51 PM
 */

class UsersRepository extends ModelRepository {

    /**
     * @param String $emailorusername
     * @param String $password
     * @return array|Users
     */
    public function login(String $emailorusername, String $password)
    {
        $connection = $this->_connection;
        $query =
            'SELECT * FROM users
             WHERE email = :email
             OR username = :username';

        $request = $connection->prepare($query);
        $request->execute(array(
           'email' => $emailorusername,
           'username' => $emailorusername
        ));

        $data = $request->fetch(PDO::FETCH_ASSOC);

        return $data
            ? $data['password'] === $password
                ?  new Users($data)
                :  array('error' => BAD_PASSWORD)
            : array('error' => ACCOUNT_DONT_EXIST);
    }
}