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
   
   }

  if(isset($_GET['user']) && !empty($_GET['user'])){
    $user = (String) trim($_GET['user']);
    $sql = "SELECT *
      FROM rendez_vous
      WHERE Date_Rendez_Vous LIKE '%".$user."%' 
      OR Salle_Rendez_Vous LIKE '%".$user."%'
      LIMIT 20";
      $util=new Util(); 
      $util->dbConnection();
      $sql=$util->mysqli->query($sql);
      
    


	
     
  ?>
  <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc">
  <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <th class="text-center">Date </th>
                                            <th class="text-center">Salle </th>
                                                <th class="text-center">Medecin</th>
                                                <th class="text-center">Patient</th>
                                                <th class="text-center">Détails </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            
                                              
                                        <?PHP
foreach($sql as $rdv)
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
<td class="text-center"> 
 <button class="au-btn au-btn-icon au-btn--blue">
 <a href="detailsRDV.php?id=<?PHP echo $rdv['Id_Rendez_Vous']; ?>">
 <i class="zmdi zmdi"></i>Voir</button>
  </a>
 </td>

<?PHP
}
?>
                                           
                                        </tbody>
                                    </table>
    </div>
    <?php  
  } 
?>