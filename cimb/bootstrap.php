<?php
session_name('crental');

date_default_timezone_set("Asia/Kuala_Lumpur");

error_reporting(E_ALL ^ E_NOTICE);
define('DOC_ROOT', realpath(dirname(__FILE__) . '/'));
define('BASE_URL', 'http://localhost/crental/');

require 'layout.php';
require_once("connectdb.php");




