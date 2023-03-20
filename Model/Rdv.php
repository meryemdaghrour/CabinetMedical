<?php


class Rdv {
    
    
    public $Id_Rendez_Vous;
    public $Date_Rendez_Vous;
    public $Salle_Rendez_Vous;
    public $Patient;
    public $Medecin;


     /**
     * Default Constructor
     */
    public function __construct(){
      
     }
    /**
     * 
     * @return type
     */
    public function getId_Rendez_Vous() {
        return $this->Id_Rendez_Vous;
    }
    /**
     * 
     * @return type
     */
    public function getDate_Rendez_Vous() {
        return $this->Date_Rendez_Vous;
    }
    /**
     * 
     * @return type
     */
    public function getSalle_Rendez_Vous() {
        return $this->Salle_Rendez_Vous;
    }
    /**
     * 
     * @return type
     */
    public function getPatient() {
        return $this->Patient;
    }
    /**
     * 
     * @return type
     */
    public function getMedecin() {
        return $this->Medecin;
    }

    /**
     * 
     * @param type $Id_Rendez_Vous
     */
    function setId_Rendez_Vous($Id_Rendez_Vous) {
        $this->Id_Rendez_Vous = $Id_Rendez_Vous;
    }

     /**
     * 
     * @param type $Medecin
     */
    function setMedecin($Medecin) {
        $this->Medecin = $Medecin;
    }

      /**
     * 
     * @param type $Patient
     */
    function setPatient($Patient) {
        $this->Patient = $Patient;
    }
      /**
     * 
     * @param type $Salle_Rendez_Vous
     */
    function setSalle_Rendez_Vous($Salle_Rendez_Vous) {
        $this->Salle_Rendez_Vous = $Salle_Rendez_Vous;
    }

     /**
     * 
     * @param type $Date_Rendez_Vous
     */
    function setDate_Rendez_Vous($Date_Rendez_Vous) {
        $this->Date_Rendez_Vous = $Date_Rendez_Vous;
    }
    
  
    
   
    
}
