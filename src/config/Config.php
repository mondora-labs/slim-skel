<?php 
namespace src\config;

class Config {
	
	public static $PROJECT_PATH='/Users/matteo/work/workspace/h3g/slim-skel/';
	
	public static $ENDPOINT1='http://localhost:8080/menu';
	
	/* Database - POSTGRES */
	public static $PDO_CONNECTION_DSN="pgsql:host=localhost;dbname=corso";
	public static $PDO_CONNECTION_USER="postgres";
	public static $PDO_CONNECTION_PASSWORD="postgres";
	
	/* Autoload */
	// TODO: Ricordarsi di cambiare anche il path assoluto nel file MyAutoloader.php
}
?>