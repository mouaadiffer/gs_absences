<?php include('header.php');
include('moyenne_function.php');
 ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
        	<h2 class="text-white text-center">Traitement des notes en fonction des nombres d'absences</h2>
         <p class="text-danger text-center">Remarque : Pour chaque absence -0.25 pts</p>
        	</div>
          <div class="text-white text-center">
          <form action="" method="POST">
          ID d'étudiant : <input type="text" name="id">
          <input type="submit" name="submit" value="chercher" class="btn btn-sm  btn-success">
         </form><br></div>
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
        if(isset($_POST["submit"])){
          $id=$_POST['id'];
          $sql="SELECT distinct e.idEtudiant,nom,prenom,filiere FROM etudier et,etudiant e where et.idEtudiant=e.idEtudiant and e.idEtudiant='$id' ";
        $resultat=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($resultat)){
        ?>
        
      	
        <tr>
      <th scope="row">
        <?php echo $row["nom"].' '.$row["prenom"]    ?>
     </th>
      <th scope="row">
        <?php echo $row["filiere"];    ?>
     </th>
      <th scope="row">
    	<?php 
    	$id=$row["idEtudiant"];
    	$req="SELECT SUM(note) as somme FROM etudier WHERE idEtudiant = '$id'";
    	$req_result=mysqli_query($conn,$req);
    	$somme=mysqli_fetch_assoc($req_result);
    	$s=$somme["somme"];
    	$nbrmodules="SELECT idModule from etudier et where et.idEtudiant= '$id'";
    	$nb_query=mysqli_query($conn,$nbrmodules);
		  $nb=mysqli_num_rows($nb_query);
		  $moyenne=$s/$nb;
		  echo $moyenne
    	
    	?>
     </th>
     <th scope="row">
          <?php 
        $id_etudiant=$row["idEtudiant"];
        $req="SELECT idAbsence FROM `absence` WHERE idEtudiant = '$id_etudiant'";
        $total=mysqli_query($conn,$req);
        $t=mysqli_num_rows($total);
        echo $t 
       ?>  
     </th>
     <th scope="row">
     	<?php 
        $note=$moyenne;
        $nbr_abs=$t;
        $m=moyenne($conn,$note,$nbr_abs);
        echo $m;
        ?>
     </th>

    
      
    </tr>
  </thead>
  </tbody>
<?php } ?>
<?php } ?>