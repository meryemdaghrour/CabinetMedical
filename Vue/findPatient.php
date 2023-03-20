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
                            <br>
                           
                        </div>
                        <div class="Left-body">
                            <div class="Left-body-head">
                                Patient recherché
                            </div>
                            <br> <br>
                            <div class="form-group">  &ensp;  &ensp; 
                            <input class="form-control" type="text" id="search-user" value=""
                             placeholder="Rechercher un ou plusieurs clients"/>

                              </div>
                           
                            <div class="infos">
                                
                            </div>
                            <div id="result-search"></div>
                            
                            
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
                                <a href="rechercherPatient.php"><i class="icon-plus"></i> Rechercher Patient</a>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script>
  $(document).ready(function(){
    $('#search-user').keyup(function(){
      $('#result-search').html('');
      var patient = $(this).val();
      if(patient != ""){
        $.ajax({
          type: 'GET',
          url: 'rechercherPatient.php',
          data: 'user=' + encodeURIComponent(patient),
          success: function(data){
            if(data != ""){
              $('#result-search').append(data);
            }else{
              document.getElementById('result-search').innerHTML = "<div style='font-size: 20px; text-align: center; margin-top: 10px'>Aucun patient</div>"
            }
          }
        });
      }
    });
  });
</script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>

    </body>
    
    
    
</html>
