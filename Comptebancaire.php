<?php

class Comptebancaire {

    private string $_libelle;
    private Titulaire $_titulaire;
    private int $_soldeinitial;
    private float $_devise;
    
    public function __construct (string $_libelle, Titulaire $_titulaire , string $_soldeinitial ,float $_devise) 
    {

    $this->_libelle = $_libelle;
    $this->_titulaire = $_titulaire;
    $this->_soldeinitial = $_soldeinitial;
    $this->_devise = $_devise;
  
    }

    //Getters
    public function get_libelle()
    {
        return $this->_libelle;
    } 

    public function get_titulaire()
    {
        return $this->_titulaire;
    } 

    public function get_soldeinitial()
    {
        return $this->_soldeinitial;
    }

    public function get_devise()
    {
        return $this->_devise;
    }
    
    //setters 

    public function set_libelle($libelle)
    {
         $this->_libelle=$libelle;
    } 

    public function set_titulaire($titulaire)
    {
         $this->_titulaire=$titulaire;
    } 

    public function set_soldeinitial($soldeinitial)
    {
         $this->_soldeinitial=$soldeinitial;
    }

    public function set_devise($devise)
    {
         $this->_devise=$devise;
    }
    
// Fin getters et setters


//* Création des différentes fonction : Créditer compte, Débiter compte, Effectuer virement.

    public function crediter(float $crediter)

    { 
        $this -> _soldeinitial += $crediter;
        echo "Le compte " .$this-> _libelle. " de " .$this->get_titulaire()->get_nom(). "  ".$this->get_titulaire()->get_prenom()." a été crédité de " .$crediter. " €. <br>"; //!  ICI nous avons voulu récupérer le nom et le prénom du titulaire qui se trouvent dans la feuille Titulaires.php : d'où le GET_TITULAIRE (non de la classe Titulaire). 
    } 

    public function debiter(float $debiter) 
    {
        $this -> _soldeinitial -= $debiter;
        echo "Le compte " .$this-> _libelle.  " de " .$this->get_titulaire()->get_nom(). "  ".$this->get_titulaire()->get_prenom()." a été débité de " .$debiter. " €.  <br>";

    }

    public function virement(float $Montantvire, $comptecredite ) //! J'ai besoin de créer une fonction Virement qui comprendra des VARIABLES pour lier les actions CREDITER et DEBITER.
    {

        $this -> debiter ($Montantvire);
        $comptecredite-> crediter($Montantvire);
        echo "Un virement de " . $Montantvire. " € a été effectué sur le compte " .$comptecredite. " de " .$this->get_titulaire()->get_nom(). " " .$this->get_titulaire()->get_prenom(). "<br>";

    }
    public function get_Infocompte()
    {
        $result = " Informations du compte : <br>"
        ." Nom du Titulaire : " . $this->get_titulaire()->get_nom().  
        " <br> Prénom du Titulaire : ". $this->get_titulaire()->get_prenom(). "<br>".
        "<br> Compte : " . $this -> _libelle.
        " <br> Solde du compte : ". $this -> get_soldeinitial(). "<br>"; 
        return $result;

    }

    //! fonction __to string pour afficher ici le solde du compte après virement

    public function __toString()
    { 
        $result = $this -> _libelle . " " . $this-> _soldeinitial. " €. <br>";
        return $result;
    }

}
//? LES FONCTIONS ET VARIABLES SONT A CODER DANS LE FICHIER INDEX, OÙ IL FAUDRA LIER LES 3 FICHIERS : Comptebancaire, Titulaire et Index