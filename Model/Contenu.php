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
        return $this->titre;
    }

    public function getTexte()
    {
        return $this->texte;
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
    }

    public function setTexte(string $texte)
    {
        $this->texte = htmlspecialchars(strip_tags(trim($texte)),ENT_QUOTES);
    }

    public function setLadate(string $ladate)
    {
        $this->ladate = $ladate;
    }


}