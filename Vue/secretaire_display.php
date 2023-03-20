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

     
    $Util = new Util();
    $user = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
    $Secretaire = new Secretaire();
    $Secretaire = $user->getSecretaire();
    $fonctionC=new FonctionC();
    $liste=$fonctionC->listeRDV();
   }

    
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
               <?php
                    
                    echo $Secretaire->getNom_Secretaire().' '.$Secretaire->getPrenom_Secretaire();
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
                                        echo $Secretaire->getNom_Secretaire().' '.$Secretaire->getPrenom_Secretaire();
                                   ?>
                                </h4>
                            </center>
                        </div>
                       
                        <div class="Left-body">
                        <div id="google_translate_element"></div>
         <script type="text/javascript">
             function googleTranslateElementInit() {
                 new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
             }
         </script>

         <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
         </script> 
                            <div class="Left-body-head">
                                Liste des rendez-vous à venir 
                            </div>
                           
                            <div class="infos">
                            
                            </div>
                            <div class="en_bref">
                                
                            <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <th class="text-center">Date rendez vous</th>
                                            <th class="text-center">Salle rendez vous</th>
                                                <th class="text-center">Medecin</th>
                                                <th class="text-center">Patient</th>
                                            
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            
                                              
                                        <?PHP
foreach($liste as $rdv)
{
?>
<tr>
<td class="text-center"><?PHP echo $rdv['Date_Rendez_Vous']; ?></td>

<td class="text-center"><?PHP echo $rdv['Salle_Rendez_Vous']; ?></td>
<td class="text-center">
<?php $elementL= $fonctionC->getMedecinById($rdv['Id_Medecin']);
 echo $elementL->Nom_Medecin; echo " ";
 echo $elementL->Prenom_Medecin; 
 
 ?>
 </td>
<td class="text-center">
<?php $elementL= $fonctionC->getPatientById($rdv['Id_Patient']);
 echo $elementL->Nom_Patient; echo " ";
 echo $elementL->Prenom_Patient; 
 
 ?>

</td>

<?PHP
}
?>
                                           
                                        </tbody>
                                    </table>
                                
                            </div>
                            
                            
                        </div>
                    <div class="Right-body">
                        <div class="About-us">
                            <div class="Social-NW-head">
                                
                            </div>
                            <div class="Social-NW-body">
                                
                            <a href="displayPatientCabinet.php"><i class="icon-user"></i> Liste des patients</a>
                                <br/>
                                <a href="displayMedecinCabinet.php"><i class="icon-user"></i> Liste des Medecins</a>
                                <br/>
                                <a href="displayRDV.php"><i class="icon-calendar"></i> Liste des rendez-vous</a>
                                <hr/>
                                <a href="ajout_rdv.php"><i class="icon-plus-sign"></i> Ajouter un rendez-vous</a>
                                <br/>
                                <a href="ajout_patient.php"><i class="icon-plus"></i> Nouvelle fiche patient</a>
                                <br/>
                                <a href="findPatient.php"><i class="icon-search"></i> Rechercher Patient</a>
                                <hr/>
                                <a href="../Controller/deconnexion.php"><i class="icon-off"></i> Se d&eacute;connecter</a>
                                
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
