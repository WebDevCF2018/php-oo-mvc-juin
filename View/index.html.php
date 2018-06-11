<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
<h1>Accueil</h1>
<?php
// si le contenu est un tableau
if(is_array($contenu)){
    foreach ($contenu as $valeur){
        echo "<h3>{$valeur->getTitre()}</h3>";
        echo "<p>{$valeur->getTexte()}</p>";
        echo "<p>{$valeur->getLadate()}</p>";
        echo "<pre>";
        var_dump($valeur);
        echo "</pre>";
    }
}else{ // pas de messages
    echo "<h2>$contenu</h2>";
}
?>
</body>
</html>
