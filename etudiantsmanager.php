<?php include('header.php');
if(isset($_POST["name"]))

  {
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $prenom = mysqli_real_escape_string($conn, $_POST['prenom']);
      $email = mysqli_real_escape_string($conn, $_POST['email']); 
      $filiere = mysqli_real_escape_string($conn, $_POST['filiere']);  
      mysqli_query($conn,"INSERT INTO `etudiant` (`nom`, `prenom`, `email`, `filiere`) VALUES ('$name', '$prenom', '$email', '$filiere')");
  }


$deletudiant=$_GET['suppid'];
if($deletudiant!=NULL){
  mysqli_query($conn,"DELETE FROM `etudiant` where idEtudiant='$deletudiant'");
}





 ?>
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <div class="text-white text-center"> 
            <form action="" method="POST">
              Rechercher par filière :    <input type="text"    name="f" >      
              <input type="submit" name="submit" value="Chercher" class="btn btn-sm  btn-success">
            </form>
         </div> 
         
        </div>
      </div>
    </div>


<div class="container-fluid mt--7">
  <form role="form" action="" method="POST">
      <!-- Table -->
      <div class="row">
        <div class="col">
         <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Liste des étudiants</h3>
                </div>
                <div class="col text-right">
                  <a href="#" data-toggle="modal" data-target="#newetudiant" class="btn btn-sm btn-primary">Ajouter</a>
                </div>
              </div>
            </div>
           
            
              <!-- Projects table -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    
                    <th scope="col">Nom Complet</th>
                    <th scope="col">Email</th>
                    <th scope="col">Filiere</th>
                    <th scope="col" class="text-center">Actions</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if (!isset($_POST["submit"]))  {
                      $sql="SELECT *  FROM `etudiant`";
                      $result=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($result)){
                  ?>                  
                  <tr>
                    <th scope="row">
                     <?php echo $row["nom"].' '.$row["prenom"];  
                     ?>
                    </th>
                    <td>
                      <?php echo $row["email"]  ?>
                    </td>
                    <td>
                      <?php echo $row["filiere"]  ?>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-info" name="modifi" href="update_etudiant.php?etuiid=<?php echo $row['idEtudiant']; ?>"> Modifier</a>    
                      <a href="?suppid=<?php echo $row['idEtudiant']; ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Voulez-vous supprimer cet étudiant ?');">Supprimer</a>
                    </td>
                  </tr>
                <?php } }else 
                $f=$_POST['f'];
                $sql="SELECT * FROM `etudiant` WHERE filiere= '$f' ";
                $result=mysqli_query($conn,$sql);
                 while($row=mysqli_fetch_assoc($result)){

                ?>
                <tr>
                    <th scope="row">
                     <?php echo $row["nom"].' '.$row["prenom"];  
                     ?>

                    </th>
                    <td>
                      <?php echo $row["email"]  ?>
                    </td>
                    <td>
                      <?php echo $row["filiere"]  ?>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-info" name="modifi" href="update_etudiant.php?etuiid=<?php echo $row['idEtudiant']; ?>"> Modifier</a>    
                      <a href="?suppid=<?php echo $row['idEtudiant']; ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Voulez-vous supprimer cet étudiant ?');">Supprimer</a>
                    </td>
                  </tr>
                 <?php } ?>
                
                               
                     <!-- Modal -->
                    
                </tbody>
              </table>
            </div>
          </div>
        </div>
      

                     <!-- Modal -->
                    <div class="modal fade" id="newetudiant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nouveau Etudiant</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                           <form role="form" action="" method="post">
                          <div class="modal-body">                             
                                
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>
                                    <input  class="form-control" name="name" placeholder="Nom"  type="text">
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                                    </div>
                                    <input  class="form-control" name="prenom" placeholder="Prénom"  type="text">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input  class="form-control" name="email" placeholder="Email"  type="email">
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-align-left-2"></i></span>
                                    </div>
                                    <input autocomplete="off" class="form-control" name="filiere" placeholder="Filière"  type="text">
                                  </div>
                                </div>                        
                               
                          </div>
                          
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                          </div>
                          </form>

                        </div>
                      </div>
                    </div>


<?php include('footer.php'); ?>    

