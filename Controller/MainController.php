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
if(isset($_GET['idcontenu'])&&is_numeric($_GET['idcontenu'])) {

    $idArticle = (int)$_GET['idcontenu'];
    $recupOne = $ContenuManager->getContenuById($idArticle);

    if (!$recupOne) {
        $contenu = "Cet article n'existe plus ou a été déplacé";
    } else {
        $contenu = new Contenu($recupOne);
    }

    // appel de la vue
    require_once "View/detail.html.php";

/*
 * on veut insérer un nouvel article
 */
}elseif (isset($_GET['insert'])){

    // Si formulaire non envoyé
    if(empty($_POST)){

        // appel de la vue
        require_once "View/formInsert.html.php";

    }else{

        // hydratation d'un objet Contenu avec les variables POST
        $newContenu = new Contenu($_POST);

        // insertion dans la table contenu d'un objet de type Contenu
        $result = $ContenuManager->create($newContenu);

        if($result){
            header("Location: ./");
        }else{
            $erreur = "Veuillez recommencer";
            require_once "View/formInsert.html.php";
        }

    }


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