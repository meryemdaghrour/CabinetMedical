<?php

include_once '../Controller/Util.php';
include_once '../Model/Medecin.php';
include_once '../Model/Patient.php';
include_once '../Model/Consultation.php';
include_once '../Model/Rdv.php';
include_once '../Model/Ordonnance.php';


class FonctionC{

   public function listeMedecin()
    {
      $query = "SELECT * FROM medecin"; 
	  $util=new Util(); 
      $util->dbConnection();
        
        if ($util->mysqli->connect_error) {
            die('Erreur de connexion ('.$util->mysqli->connect_errno.')'. $util->mysqli->connect_error);
        }  
        else{
          
				try{
					$liste=$util->mysqli->query($query);
					return $liste;
					}
					catch (Exception $e){
						die('Erreur: '.$e->getMessage());
					}	       
           
        }
    }
   
    function listeRDVMed($id)
    {
      $query = "SELECT * FROM rendez_vous WHERE Date_Rendez_Vous >= CURDATE() and Id_Medecin='".$id."'" ; 
        $util=new Util(); 
        $util->dbConnection();
          
          if ($util->mysqli->connect_error) {
              die('Erreur de connexion ('.$util->mysqli->connect_errno.')'. $util->mysqli->connect_error);
          }  
          else{
            
                  try{
                      $liste=$util->mysqli->query($query);
                      return $liste;
                      }
                      catch (Exception $e){
                          die('Erreur: '.$e->getMessage());
                      }	       
             
          }
    }


    public function listePatientMed($id)
    {
  

 $query="SELECT * FROM `patient` WHERE `Id_Patient`
  IN (SELECT distinct `Id_Patient` FROM `rendez_vous` WHERE `Id_Medecin` ='".$id."')";


	  $util=new Util(); 
    $util->dbConnection();
        
        if ($util->mysqli->connect_error) {
            echo "Error: " . $query . "<br/>" . $util->mysqli->error;
            die('Erreur de connexion ('.$util->mysqli->connect_errno.')'. $util->mysqli->connect_error);
        }  
        else{
          
				try{
					$liste=$util->mysqli->query($query);
         
					return $liste;
					}
					catch (Exception $e){
            echo "Error: " . $query . "<br/>" . $util->mysqli->error;
						die('Erreur: '.$e->getMessage());
					}	       
           
        }
    }
	public function listePatient()
    {
      $query = "SELECT * FROM patient"; 
	  $util=new Util(); 
      $util->dbConnection();
        
        if ($util->mysqli->connect_error) {
            die('Erreur de connexion ('.$util->mysqli->connect_errno.')'. $util->mysqli->connect_error);
        }  
        else{
          
				try{
					$liste=$util->mysqli->query($query);
					return $liste;
					}
					catch (Exception $e){
						die('Erreur: '.$e->getMessage());
					}	       
           
        }
    }
	function listeRDV()
  {
    $query = "SELECT * FROM rendez_vous WHERE Date_Rendez_Vous >= CURDATE() ORDER BY Date_Rendez_Vous ASC"; 
	  $util=new Util(); 
      $util->dbConnection();
        
        if ($util->mysqli->connect_error) {
            die('Erreur de connexion ('.$util->mysqli->connect_errno.')'. $util->mysqli->connect_error);
        }  
        else{
          
				try{
					$liste=$util->mysqli->query($query);
					return $liste;
					}
					catch (Exception $e){
						die('Erreur: '.$e->getMessage());
					}	       
           
        }
  }

  function getPatientById($id)
    {
		$sql="SELECT * from patient where	Id_Patient='".$id."'";
    $util=new Util(); 
    $util->dbConnection();
		try{
			$query=$util->mysqli->query($sql);
      while($ligne = $query->fetch_assoc()){
        $_Id = $ligne['Id_Patient'];
        
        if(($id == $_Id))
        {
             $patient = new Patient();
             $patient->setNom_Patient($ligne['Nom_Patient']) ;
             $patient->setPrenom_Patient($ligne['Prenom_Patient']) ;
             $patient->setAdresse_Patient($ligne['Adresse_Patient']);
             $patient->setDate_Naissance_Patient($ligne['Date_Naissance_Patient']);

             break;
        }}
			return $patient;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
    }


    function getMedecinById($id)
    {
		$sql="SELECT * from medecin where	Id_Medecin='".$id."'";
    $util=new Util(); 
    $util->dbConnection();
		try{
      $query=$util->mysqli->query($sql);
      while($ligne = $query->fetch_assoc()){
        $_Id = $ligne['Id_Medecin'];
        
        if(($id == $_Id))
        {
             $medecin = new Medecin();
             $medecin->setNom_Medecin ( $ligne['Nom_Medecin']);
             $medecin->setPrenom_Medecin ( $ligne['Prenom_Medecin']);
             break;
        }
    }
		
			return $medecin;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
    }

    function afficherFichePatient($id)
    {
		
    $sql="SELECT * from consultation where	Id_Patient='".$id."'";
    $util=new Util(); 
    $util->dbConnection();
    $consultation = new Consultation();
		try{
			$query=$util->mysqli->query($sql);

      while($ligne = $query->fetch_assoc()){
        $_Id = $ligne['Id_Patient'];
        
        if(($id == $_Id))
        {
            $medecin = $this->getMedecinById($ligne['Id_Medecin']);
            $patient=$this->getPatientById($ligne['Id_Patient']);  
            $consultation->setId_Consultation($ligne['Id_Consultation']) ;
             $consultation->setPatient($patient) ;
             $consultation->setMedecin($medecin) ;
             $consultation->setCompte_Rendu_Consultation($ligne['Compte_Rendu_Consultation']) ;
             $consultation->setDate_Consultation($ligne['Date_Consultation']) ;
             break;
        }
      }
			return $consultation;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
    }



    function afficherDetailsRDV($id)
    {
		
    $sql="SELECT * from rendez_vous where	Id_Rendez_Vous ='".$id."'";
    $util=new Util(); 
    $util->dbConnection();
    $rdv = new Rdv();
		try{
			$query=$util->mysqli->query($sql);

      while($ligne = $query->fetch_assoc()){
        $_Id = $ligne['Id_Rendez_Vous'];
        
        if(($id == $_Id))
        {
            $medecin = $this->getMedecinById($ligne['Id_Medecin']);
            $patient=$this->getPatientById($ligne['Id_Patient']);  

             $rdv->setId_Rendez_Vous($ligne['Id_Rendez_Vous']) ;
             $rdv->setPatient($patient) ;
             $rdv->setMedecin($medecin); 
             $rdv->setSalle_Rendez_Vous($ligne['Salle_Rendez_Vous']) ;
             $rdv->setDate_Rendez_Vous($ligne['Date_Rendez_Vous']) ;
             break;
        }
      }
			return $rdv;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
    }
		

    function listeConsultationMed($id)
    {
	
    $sql="SELECT * from consultation where	Id_Medecin='".$id."'";
    $util=new Util(); 
    $util->dbConnection();
    $consultation = new Consultation();
		try{
		
      $liste=$util->mysqli->query($sql);
      return $liste;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
    }

    function listeOrdonnanceMed($id)
    {
	
    $sql="SELECT * from ordonnance where	Id_Consultation='".$id."'";
    $util=new Util(); 
    $util->dbConnection();
    $ordonnance = new Ordonnance();
		try{
			$query=$util->mysqli->query($sql);

      while($ligne = $query->fetch_assoc()){
        $_Id = $ligne['Id_Consultation'];
        
        if(($id == $_Id))
        {
             $ordonnance->setDate_Ordonnance($ligne['Date_Ordonnance']) ;
             $ordonnance->setDetail_Medicament($ligne['Detail_Medicament']) ;
             $ordonnance->setId_Ordonnance($_Id) ;  
             break;
        }
       
      }
			return $ordonnance;
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
    }

    function addOrdonnace($ordonnance,$id)
    {
	
    $sql="INSERT INTO `ordonnance`( `Date_Ordonnance`, `Detail_Medicament`, `Id_Consultation`) VALUES"
                                   ."('".$ordonnance->getDate_Ordonnance()."',"
                                   ."'".$ordonnance->getDetail_Medicament()."',"
                                   ."'".$id."'"
                                   .")";
     
    $util=new Util(); 
    $util->dbConnection();
   
		try{
		  if($util->mysqli->query($sql) === TRUE) {
      header("location: ../Vue/ConsultationsMed.php");
  }
  else {
      echo "Error: " . $sql . "<br/>" . $util->mysqli->error;
  }

      
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
    }




    function editOrdonnace($ordonnance,$id)
    {
	
   

   $sql="UPDATE `ordonnance` SET 
    `Date_Ordonnance`='".$ordonnance->getDate_Ordonnance(). "',
    `Detail_Medicament`='".$ordonnance->getDetail_Medicament()."'
      where  `Id_Consultation`='".$id."'"  ;                          
     
    $util=new Util(); 
    $util->dbConnection();
   
		try{
		  if($util->mysqli->query($sql) === TRUE) {
      header("location: ../Vue/ConsultationsMed.php");
  }
      else {
      echo "Error: " . $sql . "<br/>" . $util->mysqli->error;
  }

      
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
    }

    
    function editConsultation($consultation,$id)
    {
	
   

   $sql="UPDATE `consultation` SET 
    `Date_Consultation`='".$consultation->getDate_Consultation(). "',
    `Compte_Rendu_Consultation`='".$consultation->getCompte_Rendu_Consultation()."'
      where  `Id_Consultation`='".$id."'"  ;                          
     
    $util=new Util(); 
    $util->dbConnection();
   
		try{
		  if($util->mysqli->query($sql) === TRUE) {
      
      header("location: ../Vue/ConsultationsMed.php");
  }
      else {
      echo "Error: " . $sql . "<br/>" . $util->mysqli->error;
  }

      
		}
		catch (Exception $e){
			die('Erreur: '.$e->getMessage());
		}
    }









}

?>