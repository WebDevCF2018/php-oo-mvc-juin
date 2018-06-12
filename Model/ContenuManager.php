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

    /*
     *
     * methodes CRUD - Read
     *
     */


    // on récupère tous les éléments de la table contenu
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

    // on récupère 1 élément via son id de la table contenu
    public function getContenuById(int $id){

        $recupOne = $this->connexion->prepare("SELECT * FROM contenu WHERE idcontenu=?");

        $recupOne->bindValue(1,$id,PDO::PARAM_INT);

        $recupOne->execute();

        // on a un résultat (1 ou 0)
        if($recupOne->rowCount()){
            return $recupOne->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }

    /*
     *
     * methodes CRUD - Create
     *
     */

    // n'accepte comme argument qu'un objet de type Contenu
    public function create(Contenu $datas){

        $create = $this->connexion->prepare("INSERT INTO contenu (idcontenu,titre,texte,ladate) VALUES (?,?,?,?)");

        $create->bindValue(1,$datas->getIdcontenu(),PDO::PARAM_INT);
        $create->bindValue(2,$datas->getTitre(),PDO::PARAM_STR);
        $create->bindValue(3,$datas->getTexte(),PDO::PARAM_STR);
        $create->bindValue(4,$datas->getLadate());

        $create->execute();

        if($create->rowCount()){
            return true;
        }else{
            return false;
        }

    }

    /*
     *
     * methodes CRUD - Update
     *
     */

    // n'accepte comme argument qu'un objet de type Contenu
    public function update(Contenu $datas){

        $create = $this->connexion->prepare("UPDATE contenu SET titre = :title, texte = :txt, ladate = :temps WHERE idcontenu = :id");

        $create->bindValue(":id",$datas->getIdcontenu(),PDO::PARAM_INT);
        $create->bindValue(":title",$datas->getTitre(),PDO::PARAM_STR);
        $create->bindValue(":txt",$datas->getTexte(),PDO::PARAM_STR);
        $create->bindValue(":temps",$datas->getLadate(),PDO::PARAM_STR);

        $create->execute();

        if($create->rowCount()){
            return true;
        }else{
            return false;
        }

    }

}