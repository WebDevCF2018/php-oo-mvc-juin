<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajout d'un article</title>
</head>
<body>
<h1>Ajout d'un article</h1>
<ul>
    <li><a href="./">Accueil - listContenu()</a></li>
    <li><a href="?insert">Insérer</a></li>
</ul>
<h2>ContenuManager->getContenuById($id) : Read</h2>
<?php if(isset($erreur)) echo "<h3>$erreur</h3>" ?>
<form method="post" name="nom" action="">
    <!-- les noms des champs correspondent à ceux de la classe Contenu et donc des champs de la DB (table contenu) -->
    <input type="text" name="titre" placeholder="Titre" maxlength="100" required>
    <textarea placeholder="Votre texte" name="texte" required></textarea>
    <input type="date" name="ladate"/>
    <input type="submit" value="Creation"/>
</form>
</body>
</html>
