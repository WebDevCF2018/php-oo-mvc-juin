<?php
/**
 * Mapping de la table 'contenu' de la DB phpoomvcjuin
 */

class Contenu
{
    // attributs privés
    private $idcontenu,
        $titre,
        $texte,
        $ladate;

    // méthodes

    // constructeur - reçois un tableau
    public function __construct(Array $datas)
    {
        // hydratation
        $this->hydrate($datas);
    }

    // hydratation
    private function hydrate(Array $donnees){
        foreach ($donnees as $key => $value){
            // on crée manuellement le nom du setter correspondant aux clef (si il existe)
            $methode = "set".ucfirst($key);
            // si la méthode existe dans l'instance de classe ($this)
            if(method_exists($this,$methode)){
                // on donne la valeur au setter créé à la vollée
                $this->$methode($value);
            }
        }
    }

    // Getters - pour récupérer les valeurs hors de l'instance de cette classe
    public function getIdcontenu()
    {
        return $this->idcontenu;
    }

    public function getTitre()
    {
        return html_entity_decode($this->titre);
    }

    public function getTexte()
    {
        return html_entity_decode($this->texte);
    }

    public function getLadate()
    {
        return $this->ladate;
    }

    // Setters pour modifier les valeurs hors de l'instance de cette classe
    public function setIdcontenu($idcontenu)
    {
        if(is_numeric($idcontenu)) {
            $this->idcontenu = (int)$idcontenu;
        }
    }

    public function setTitre(string $titre)
    {
        $this->titre = htmlspecialchars(strip_tags(trim($titre)),ENT_QUOTES);
        if(empty($this->titre)){
            die("Impossible d'insérer cet article");
        }
    }

    public function setTexte(string $texte)
    {
        $this->texte = htmlspecialchars(strip_tags(trim($texte)),ENT_QUOTES);
        if(empty($this->texte)){
            die("Impossible d'insérer cet article");
        }
    }

    public function setLadate($ladate)
    {
        if(!empty($ladate)) {
            // regex ok
            preg_match("/^(\d{4})-([0]\d|[1][0-2])\-([0-2]\d|[3][0-1]) ([0-1]\d|[2][0-3]):([0-5][0-9]):([0-5][0-9])/",$ladate,$sort);
            if(!empty($sort)){
                $this->ladate = $ladate;
            }else{
                $this->ladate = date("Y-m-d H:i:s");
            }
        }else{
            $this->ladate = date("Y-m-d H:i:s");
        }
    }


}