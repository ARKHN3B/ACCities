<?php
/**
 * Created by PhpStorm.
 * User: benlmsc
 * Date: 16/04/2018
 * Time: 12:29 PM
 */

class DBConnection {
    static protected $_connection;

    static public function setConnection($config)
    {
        if ( empty(self::$_connection) ) {
            try {
                $db = $config['db'];

                $username = $db['user'];
                $password = $db['pass'];
                $dsn = 'mysql:host=' . $db['host'] . ';dbname=' . $db['dbname'] . ';charset=utf8;port=' . $db['port'];

                self::$_connection = new PDO($dsn, $username, $password);
                self::$_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return self::$_connection;
            }
            catch (PDOException $e) {
                die ('ERROR : ' . $e->getMessage());
            }
        }
    }
}