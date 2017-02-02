<?php

require 'environment.php';

global $config;
global $banco;
$config = array();

if (ENVIRONMENT == "development") {
	$config['dbname'] = 'cantina';
	$config['host'] = 'localhost';
        $config['charset'] = 'utf8';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
        
        define("BASE_URL","http://localhost/cantina");
} else {
	$config['dbname'] = 'u437840495_canti';
	$config['host'] = 'localhost';
        $config['charset'] = 'utf8';
	$config['dbuser'] = 'u437840495_admin';
	$config['dbpass'] = '1a2b3cCantina';
        
        define("BASE_URL","http://cantina.mangiarepizza.com.br");
}

try {
    $banco = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'],$config['dbuser'],$config['dbpass']);
} catch (Exception $e) {
    echo "Falha: ".$e->getMessage();
}
?>