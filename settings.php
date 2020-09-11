<?php
ini_set("output_buffering", 0);  // off
ini_set("zlib.output_compression", 1);  // off
ini_set("implicit_flush", 1);  // on
error_reporting(1);
ini_set("display_errors", 1);
//error_reporting(E_ALL);
ini_set('output_buffering', 'On');

define('MYSQL_SERVER', '');                            //MYSQL SERVER
define('MYSQL_USER', '');						    //MYSQL USER
define('MYSQL_PASSWORD', '');					//MYSQL PASSWORD
define('MYSQL_DB', '');						//MYSQL NAME DB


function db_connect(){
	$link = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB)
		or die("Error: ".mysqli_error($link));
	if(!mysqli_set_charset($link, "utf8mb4")){
		printf("Error: ".mysqli_error($link));
	}
	return $link;
}

$link = db_connect();
require_once('bots-lib.php');