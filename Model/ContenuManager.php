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
        $this->connexion = $bdd->getConnect();
    }

    public function listContenu(){
        $recupTous = $this->connexion->query("SELECT * FROM Contenu ORDER BY ladate DESC;");
        // si on a un contenu (au moins)
        if($recupTous->rowCount()){
            // on envoie les données au format tableau associatif (pour pouvoir hydrater facilement l'objet)
            return $recupTous->fetchAll(PDO::FETCH_ASSOC);
        }else{
            return false; // pas de contenu
        }
    }
}