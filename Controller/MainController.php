<?php
/**
 * Routeur (liens entre Model et View)
 */

// connection PDO
$db = new ConnectPDO(DB_TYPE,DB_HOST,DB_NAME,DB_PORT,DB_LOGIN,DB_PWD,DB_CHARSET);

// appel du manager de Contenu lié à la connexion PDO
$ContenuManager = new ContenuManager($db);