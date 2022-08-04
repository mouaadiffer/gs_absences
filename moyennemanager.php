<?php include('header.php'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
        <div class="text-center text-white">
         <form action="" method="POST">
         	ID d'étudiant : <input type="text" name="id">
         	<input type="submit" name="submit" value="chercher" class="btn btn-sm  btn-success">
         </form><br>
         Notes des étudiants
     	</div>
         
        </div>
      </div>
    </div>
<table class="table table-striped">
              
  <thead>
    <tr>
      
      
      <th scope="col">Module</th>
     
      <th scope="col">Note</th>
      
    </tr>
  </thead>
  <tbody>
  	 <?php 
  	 if(isset($_POST["submit"])){
  	 $i=$_POST['id'];
  	 $sql="SELECT  distinct e.idEtudiant,nom,prenom,m.idModule,module,note FROM etudier et,etudiant e, module m where et.idEtudiant=e.idEtudiant and et.idModule=m.idModule and e.idEtudiant='$i'";
         $resultat=mysqli_query($conn,$sql);
         while($row=mysqli_fetch_assoc($resultat)){
                

         ?>
  	      

                
<tr>
      
      
        <?php  $nomcomplet=$row["nom"].' '.$row["prenom"];    ?>
     
      <th scope="row">
        <?php
         echo $row["module"]; 
           ?>
     </th>
      
      <th scope="row">
        <?php echo $row["note"];
        $total+=$row["note"];

        ?>
     </th>
     
     <?php }  ?>
 </tr>
</tbody>
	
	<div class="text-center">
	Nom Complet : <?php echo $nomcomplet ?> -> La moyenne est :
	<?php
	$req="SELECT idModule from etudier et, module m where et.idModule=m.idModule";
	$resultat=mysqli_num_rows($resultat);
	$moyenne=$total/$resultat;
	echo $moyenne


   ?>
</table></div>
<?php }  ?>


      