<?php include('header.php'); 
      include('moyenne_function.php');


?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
         <h2 class="text-white text-center">Traitement des notes en fonction des nombres d'absences</h2>
         <p class="text-danger text-center">Remarque : Pour chaque absence -0.25 pts</p>
         <div class="text-white text-center mt-4"> 
         <form action="" method="POST">
          ID d'étudiant : <input type="text" name="id_etu">
          <input type="submit" name="submit" class="btn btn-sm  btn-success" value="Chercher"></form>
         </div> 
        </div>
      </div>
    </div>
    
     <table class="table table-striped">
              
  <thead>
    <tr>
      <th scope="col">Nom complet</th>
      <th scope="col">Filière</th>
      <th scope="col">Moyenne</th>
      <th scope="col">Total des pénalités</th>
      <th scope="col">Résultat Final</th>
    </tr>
  </thead>
  <tbody>
      <?php 
                   if(isset($_POST['submit'])){
                    $i=$_POST['id_etu'];
                    $sql="SELECT nom,prenom,filiere,moyenne,e.idEtudiant from bulletin b,etudiant e where b.idEtudiant=e.idEtudiant  and b.idEtudiant= '$i' order by b.idEtudiant";
                    $resultat=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($resultat)){
                  ?>
                

                  
    <tr>
      <th scope="row">
        <?php echo $row["nom"].' '.$row["prenom"];    ?>
     </th>
      <th scope="row">
        <?php echo $row["filiere"];    ?>
     </th>
      <th scope="row">
        <?php echo $row["moyenne"];    ?>
     </th>
      
     
     
       <td>
      <?php 
        $id_etudiant=$row["idEtudiant"];
        $req="SELECT idAbsence FROM `absence` WHERE idEtudiant = '$id_etudiant'";
        $total=mysqli_query($conn,$req);
        $t=mysqli_num_rows($total);
        echo $t 
       ?>      
       </td>
      <td><?php 
        $note=$row["moyenne"];
        $nbr_abs=$t;
        $m=moyenne($conn,$note,$nbr_abs);
        echo $m;
        ?>
        
      </td>
        
      
        
       
          
        
           </tr>
    <?php }  ?>
  </tbody>
</table>
      </div>


<?php   } ?>
