<?php

   
    require('../Controller/Util.php');
    
    $Util = new Util();
    
    if(isset($_POST["date_rdv"]) &&
        isset($_POST["salle_rdv"])&&
        isset($_POST["medecin"])&&
        isset($_POST["patient"])
      
        )
    {
        
        $Query = "INSERT INTO `rendez_vous`( `Date_Rendez_Vous`, 
        `Salle_Rendez_Vous`, `Id_Patient`, `Id_Medecin`) VALUES"
                                   ."('".$_POST["date_rdv"]."',"
                                   ."'".$_POST["salle_rdv"]."',"
                                   ."'".$_POST["patient"]."',"
                                   ."'".$_POST["medecin"]."'"
                                   .")";
        
        $Util->dbConnection();
        
        if ($Util->mysqli->connect_error) {
            die('Erreur de connexion ('.$Util->mysqli->connect_errno.')'. $Util->mysqli->connect_error);
        }
        
        else{
            if($Util->mysqli->query($Query) === TRUE) {
                header("location: ../Vue/secretaire_display.php");
            }
            else {
                echo "Error: " . $Query . "<br/>" . $Util->mysqli->error;
            }
        }
        
        
    }
        

?>