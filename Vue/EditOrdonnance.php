<?php

include '../Controller/Util.php';
include '../Controller/FonctionC.php';

   
   session_start();
    /*-- Verification si le formulaire d'authenfication a été bien saisie --*/
   if($_SESSION["acces"]!='y')
   {
            /*-- Redirection vers la page d'authentification --*/
           header("location:index.php");
   }
   else{
    $error = "";
    $Util = new Util();
    $Utilisateur = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
    $Medecin = new Medecin();
    $Medecin = $Utilisateur->getMedecin();
    $fonctionC=new FonctionC();
        if(isset($_POST['Date_Ordonnance'])  &&
        isset($_POST['Detail_Medicament']) ) 
        { 
            if(!empty($_POST['Date_Ordonnance'])
            && !empty($_POST['Detail_Medicament'])
            )
               {
                $ordonnance=new Ordonnance();
                $ordonnance->setDate_Ordonnance($_POST['Date_Ordonnance']);
                $ordonnance->setDetail_Medicament($_POST['Detail_Medicament']);
                $fonctionC->EditOrdonnace($ordonnance,$_GET['id']);
              
              /* header('Location:showCarteFidelite.php');*/
               }
          else 
              {
               echo '<script> alert(" Des informations Manquantes ");
               </script>';
              } 
       }
   }
   

    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
               <?php
                    
                    echo $Medecin->getNom_Medecin().' '.$Medecin->getPrenom_Medecin();
               ?>
        </title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="js/jquery/css/ui-lightness/jquery-ui-1.9.2.custom.css" type="text/css" />
        <link rel="shortcut icon" href="bootstrap/img/brain_icon_2.ico"/>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div id="content" class="span9">
                    <div class="main_body">
                    
                        <div class="Home-Header">
                            <div class="Slogan">
                                
                            </div>
                            <div class="Contact-Research">

                            </div>
                            <div class="Logo">

                            </div>
                        </div>
                        <div class="Horizontal-menu">
                            <center>
                                <h4>
                                    <?php
                                        echo $Medecin->getNom_Medecin().' '.$Medecin->getPrenom_Medecin();
                                   ?>
                                </h4>
                            </center>
                        </div>
                        <div class="Left-body">
                            <div class="Left-body-head">
                                Ajout une ordonnance
                            </div>
                            <div class="infos">
                                
                            </div>
                            <div class="en_bref">
                        
                            <div id="error">
                                    <?php echo $error; ?>
                                        </div>
                                        <div id="erreur"></div>

                                <form action="" name="ordonnance" id="ordonnance" method="POST" oncopy="return false" onpaste="return false" oncut="return false"
                                 onclick=" return verifCarteAdd()" > 
                  <table  align="center">
                
                <tr>
                    <td>    <label for="Date_Ordonnance" class="label">Date de création: </label></td> 
                </tr> 
                <tr>
                <?php
                 // Définir le nouveau fuseau horaire
                  date_default_timezone_set('Europe/Paris');
                  $date = date('d-m-y');
  
                 ?>
                  <td><input type="text" class="controle" readonly name="Date_Ordonnance" id="Date_Ordonnance" value="<?php echo $date; ?>" required  >  
                
                    </td>
                    <span class="resultat"></span>
                </tr>

                <tr>
                    <td>    <label for="Detail_Medicament" class="label">Détail Médicament: </label></td> 
                </tr> 
                <tr>
               
                  <td><input type="text" class="controle"  name="Detail_Medicament" id="Detail_Medicament"  required  >  
                
                    </td>
                    <span class="resultat"></span>
                </tr>
                
               
                <tr></tr>
                <tr></tr>
                <tr>
                    <td></td><td> <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <input type="submit" class="au-btn au-btn-icon au-btn--blue" value="Envoyer" >
                                    <input type="reset" class="au-btn au-btn-icon au-btn--blue" value="Annuler"> 
                                </div>
                            </div>
                </div></td></tr>
                
                  </table>
        </form>                   
                                
                            </div>
                            
                            
                        </div>
                    <div class="Right-body">
                        <div class="About-us">
                            <div class="Social-NW-head">
                                
                            </div>
                            <div class="Social-NW-body">

<a href="ConsultationsMed.php"><i class="icon-list"></i> Mes consultations</a>
<br/>
<a href="PatientsMed.php"><i class="icon-user"></i> Mes patients</a>
<br/>
<a href="RdvMedecin.php"><i class="icon-calendar"></i> Mes rendez-vous</a>
<br/>
<a href="DisplayOrdonnance.php"><i class="icon-list"></i> Liste des ordonnances</a>
<br/>
<a href="findRDV.php"><i class="icon-search"></i> Rechercher rendez-vous</a>
<br/>
<a href="findConsultations.php"><i class="icon-search"></i> Rechercher Consultations</a>
<br/>
<a href="findPatientsMed.php"><i class="icon-search"></i> Rechercher Patients</a>
<hr/>
<a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se déconnecter </a>

</div>
                        </div>
                        
                        
                    </div>
                    </div>
                    <div class="footer">
                        &COPY; Cabinet Médical 2021
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
    </body>
    
    
    
</html>
