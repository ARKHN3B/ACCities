<?php
/**
 * Created by PhpStorm.
 * User: benlmsc
 * Date: 16/04/2018
 * Time: 11:03 AM
 */

$http_host = $_SERVER['HTTP_HOST'];
$server_name = $_SERVER['SERVER_NAME'];
$https = isset($_SERVER['HTTPS']);



# -------------  CONST  ------------- #
const BAD_PASSWORD = 'BAD_PASSWORD';
const ACCOUNT_DONT_EXIST = 'ACCOUNT_DONT_EXIST';
const INTERNAL_SERVER_ERROR = 'INTERNAL_SERVER_ERROR';
const EMAIL_MISSING = 'EMAIL_MISSING';
const PASSWORD_MISSING = 'PASSWORD_MISSING';