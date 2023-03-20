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
      FROM consultation
      WHERE Date_Consultation LIKE '%".$user."%' 
      OR Compte_Rendu_Consultation LIKE '%".$user."%'
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
                                            <th class="text-center">Compte Rendu </th>
                                                
                                                <th class="text-center">Patient</th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            
                                              
                                        <?PHP
foreach($sql as $consultation)
{
?><tr>
<td class="text-center"><?PHP echo  $consultation['Date_Consultation']; echo " "; ?>

</td>
<td class="text-center"><?PHP echo  $consultation['Compte_Rendu_Consultation']; ?></td>
<td class="text-center">
<?php $elementL= $fonctionC->getPatientById($consultation['Id_Patient']);

 echo $elementL->Nom_Patient; echo " ";
 echo $elementL->Prenom_Patient; 
 
 ?>

</td>
</tr>

<?PHP
}
?>
                                           
                                        </tbody>
                                    </table>
    </div>
    <?php  
  } 
?>