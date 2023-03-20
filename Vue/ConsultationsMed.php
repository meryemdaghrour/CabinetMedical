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
    $Utilisateur = $Util->getUtilisateurById($_SESSION["ID_CONNECTED_USER"]);
    $Medecin = new Medecin();
    $Medecin = $Utilisateur->getMedecin();
    $fonctionC=new FonctionC();
        $liste=$fonctionC->listeConsultationMed($Medecin->getId_Medecin());
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
                                Liste des consultations
                            </div>
                            <div class="infos">
                                
                            </div>
                            <div class="en_bref">
                                
                            <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <th></th>
                                            <th class="text-center">Date </th>
                                                <th class="text-center">Compte Rendu </th>
                                                <th class="text-center">Patient</th>
                                                <th class="text-center">Ordonnance</th>
                                               
                                              
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            
                                              
                                        <?PHP
foreach($liste as $consultation)
{
?>
<tr>
<td>
 <a href="editConsultation.php?id=<?PHP echo $consultation['Id_Consultation']; ?>"><i class="icon-edit"></i></a>
                                <br/> </td>
<td class="text-center"><?PHP echo  $consultation['Date_Consultation']; echo " "; ?>

</td>
<td class="text-center"><?PHP echo  $consultation['Compte_Rendu_Consultation']; ?></td>
<td class="text-center">
<?php $elementL= $fonctionC->getPatientById($consultation['Id_Patient']);
 echo $elementL->Nom_Patient; echo " ";
 echo $elementL->Prenom_Patient; 
 ?>
</td>
<td class="text-center"> 
<button class="au-btn au-btn-icon au-btn--blue">
 <a href="AddOrdonnace.php?id=<?PHP echo $consultation['Id_Consultation']; ?>">
 <i class="zmdi zmdi"></i>Ajouter</button>
  </a>
  <button class="au-btn au-btn-icon au-btn--blue">
 <a href="EditOrdonnance.php?id=<?PHP echo $consultation['Id_Consultation']; ?>">
 <i class="zmdi zmdi"></i>Editer</button>
  </a>
 <button class="au-btn au-btn-icon au-btn--blue">
 <a href="DisplayOrdonnance.php?id=<?PHP echo $consultation['Id_Consultation']; ?>">
 <i class="zmdi zmdi"></i>Voir</button>
  </a>
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
