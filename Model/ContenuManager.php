<?php
/**
 * Created by PhpStorm.
 * User: webform
 * Date: 11/06/2018
 * Time: 15:39
 */

class ContenuManager
{
    // attribut
    private $connexion;

    // method
    // constructeur qui récupère la connexion à la DB
    public function __construct(ConnectPDO $bdd)
    {
        $this->connexion = $bdd;
    }
}