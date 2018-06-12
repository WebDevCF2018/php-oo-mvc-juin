<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
</head>
<body>
<h1>Accueil</h1>
<ul>
    <li><a href="./">Accueil - listContenu()</a></li>
    <li><a href="?insert">Insérer</a></li>
</ul>
<?php
// si le contenu est un tableau
if(is_array($contenu)){
    foreach ($contenu as $valeur){
        echo "<h3><a href='?idcontenu={$valeur->getIdcontenu()}'>{$valeur->getTitre()}</a></h3>";
        echo "<p>{$valeur->getTexte()}</p>";
        echo "<p>{$valeur->getLadate()}</p>";
        echo "<hr>";
    }
}else{ // pas de messages
    echo "<h2>$contenu</h2>";
}
?>
</body>
</html>
