<?php
/**
 * Front Controler
 */

// dependences
require_once "config.php";

// create autoload in Model/
spl_autoload_register(function($nom_classe){
    require_once "Model/$nom_classe.php";
});

// connection PDO
$db = new ConnectPDO(DB_TYPE,DB_HOST,DB_NAME,DB_PORT,DB_LOGIN,DB_PWD,DB_CHARSET);

