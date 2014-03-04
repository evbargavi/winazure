<?php 
require_once('Models/Config/Database.php');
require_once('Models/Config/db_config.php');
require_once('Models/Config/config_constants.php');
require_once('Models/Model.php');

global $globalDbManager;
$globalDbManager = new Database();
//echo "host : ".$dbConfig['hostName']."<br>";
$globalDbManager->dbConnect = $globalDbManager->connect($dbConfig['hostName'], $dbConfig['userName'], $dbConfig['passWord'], $dbConfig['dataBase']);
?>
