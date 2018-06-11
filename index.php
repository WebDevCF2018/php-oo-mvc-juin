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

// routeur (contrôleur non frontal)
require_once "Controller/MainController.php";