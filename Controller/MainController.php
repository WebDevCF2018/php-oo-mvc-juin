<?php
/**
 * Routeur (liens entre Model et View)
 */

// connection PDO
$db = new ConnectPDO(DB_TYPE,DB_HOST,DB_NAME,DB_PORT,DB_LOGIN,DB_PWD,DB_CHARSET);

// appel du manager de Contenu lié à la connexion PDO
$ContenuManager = new ContenuManager($db);


/*
 * affichage du détail d'un article
 */
if(isset($_GET['idcontenu'])&&is_numeric($_GET['idcontenu'])){

    $idArticle = (int) $_GET['idcontenu'];
    $recupOne = $ContenuManager->getContenuById($idArticle);

    if(!$recupOne){
        $contenu = "Cet article n'existe plus ou a été déplacé";
    }else{
        $contenu = new Contenu($recupOne);
    }

    // appel de la vue
    require_once "View/detail.html.php";

/*
 * accueil
 */
}else{
    // lister tous les contenus
    $recupTous = $ContenuManager->listContenu();
    if(!$recupTous){
        $contenu = "Pas encore d'articles";
    }else{
        foreach ($recupTous as $value){
            $contenu[]= new Contenu($value);
        }
    }
    // appel de la vue
    require_once "View/index.html.php";
}