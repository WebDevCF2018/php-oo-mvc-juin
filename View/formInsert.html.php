<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail d'un article</title>
</head>
<body>
<h1>Titre: <?php if(is_object($contenu)) echo $contenu->getTitre()?></h1>
<ul>
    <li><a href="./">Accueil - listContenu()</a></li>
    <li><a href="?insert">Insérer</a></li>
</ul>
<h2>ContenuManager->getContenuById($id) : Read</h2>
<?php
// si le contenu est un objet
if(is_object($contenu)){
        echo "<h3>{$contenu->getTitre()}</h3>";
        echo "<p>{$contenu->getTexte()}</p>";
        echo "<p>{$contenu->getLadate()}</p>";
        echo "<hr>";

}else{ // pas de messages
    echo "<h2>$contenu</h2>";
}
?>
</body>
</html>
