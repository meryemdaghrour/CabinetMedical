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
   
   }

  if(isset($_GET['user']) && !empty($_GET['user'])){
    $user = (String) trim($_GET['user']);
    $sql = "SELECT *
      FROM patient
      WHERE Nom_Patient LIKE '%".$user."%' 
      OR Prenom_Patient LIKE '%".$user."%' 
      OR Sexe_Patient LIKE '%".$user."%' 
      OR Adresse_Patient LIKE '%".$user."%' 
      OR Ville_Patient LIKE '%".$user."%' 
      OR Departement_Patient LIKE '%".$user."%' 
      OR Date_Naissance_Patient LIKE '%".$user."%'
      OR Situation_Familiale_Patient LIKE '%".$user."%' 
      OR Affiliation_Mutuelle LIKE '%".$user."%' 
      OR Date_Creation_Dossier LIKE '%".$user."%'  
      LIMIT 20";
      $util=new Util(); 
      $util->dbConnection();
      $sql=$util->mysqli->query($sql);
      
    


	
     
  ?>
  <div style="margin-top: 20px 0; border-bottom: 2px solid #ccc">
        <table class="table table-borderless table-striped table-earning">
      <thead>
      <tr>
      <th class="text-center">Nom & Prenom</th>
                                                <th class="text-center">Adresse</th>
                                                <th class="text-center">Date Naissance</th> 
                                                <th class="text-center">Date Creation Dossier</th>
                                                <th class="text-center">Fiche Consultation</th>
             
          </tr>
      </thead>
      <?PHP
foreach($sql as $patient)
{
?>
<tr>

<td class="text-center">
<?PHP echo  $patient['Nom_Patient']; echo " "; ?>
<?PHP echo  $patient['Prenom_Patient']; ?>
</td>

<td class="text-center"><?PHP echo  $patient['Adresse_Patient']; ?></td>

<td class="text-center"><?PHP echo  $patient['Date_Naissance_Patient']; ?></td>

<td class="text-center"><?PHP echo  $patient['Date_Creation_Dossier']; ?></td>

<td class="text-center"> 
 <button class="au-btn au-btn-icon au-btn--blue">
 <a href="ficheConsultationPatient.php?id=<?PHP echo $patient['Id_Patient']; ?>">
 <i class="zmdi zmdi"></i>Voir</button>
  </a>
 </td>
<?PHP
}
?></tbody>
    </table>
    </div>
    <?php  
  } 
?>