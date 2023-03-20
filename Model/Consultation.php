<?php


class Consultation {
    
    
    public $Id_Consultation;
    public $Date_Consultation;
    public $Compte_Rendu_Consultation;
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
    public function getId_Consultation() {
        return $this->Id_Consultation;
    }
    /**
     * 
     * @return type
     */
    public function getDate_Consultation() {
        return $this->Date_Consultation;
    }
    /**
     * 
     * @return type
     */
    public function getCompte_Rendu_Consultation() {
        return $this->Compte_Rendu_Consultation;
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
     * @param type $Id_Consultation
     */
    function setId_Consultation($Id_Consultation) {
        $this->Id_Consultation = $Id_Consultation;
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
     * @param type $Compte_Rendu_Consultation
     */
    function setCompte_Rendu_Consultation($Compte_Rendu_Consultation) {
        $this->Compte_Rendu_Consultation = $Compte_Rendu_Consultation;
    }

     /**
     * 
     * @param type $Date_Consultation
     */
    function setDate_Consultation($Date_Consultation) {
        $this->Date_Consultation = $Date_Consultation;
    }
    
  
    
   
    
}
