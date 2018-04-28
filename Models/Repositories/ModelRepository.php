<?php
/**
 * Created by PhpStorm.
 * User: benlmsc
 * Date: 16/04/2018
 * Time: 12:50 PM
 */

class ModelRepository {
    protected $_connection;

    public function __construct($connection)
    {
        $this->_connection = $connection;
    }
}