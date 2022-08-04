<?php include('header.php');
if(isset($_POST["name"]))

  {
      $libelle = mysqli_real_escape_string($conn, $_POST['name']);
      mysqli_query($conn,"INSERT INTO `filiere` (`libelle`) VALUES ('$libelle')");
  }

$delfiliere=$_GET['suppid'];
if($delfiliere!=NULL){
 mysqli_query($conn,"DELETE FROM `filiere` where idFiliere='$delfiliere'");
}



 ?>
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
         
         
        </div>
      </div>
    </div>


<div class="container-fluid mt--7">
      <!-- Table -->
      <div class="row">
        <div class="col">
         <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Liste des filières</h3>
                </div>
                <div class="col text-right">
                  <a href="#" data-toggle="modal" data-target="#newfiliere" class="btn btn-sm btn-primary">Ajouter</a>
                </div>
              </div>
            </div>
           
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Libellé</th>
                    <th scope="col" class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $sql="SELECT * FROM `filiere`";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result)){


                    
                  ?>
                  <tr>
                    <th scope="row">
                     <?php echo $row["idFiliere"]  ?>
                    </th>
                    <td>
                      <?php echo $row["libelle"]  ?>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-sm btn-info" href="update_filiere.php?filiereid=<?php echo $row['idFiliere']; ?>">Modifier</a>
                      <a href="?suppid=<?php echo $row['idFiliere']; ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Voulez-vous supprimer cet filière ?');">Supprimer</a>
                    </td>
                  </tr>
                <?php } ?>
               
                     <!-- Modal -->
                    
                       

                     <!-- Modal -->
                    <div class="modal fade" id="newfiliere" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nouvelle Filière</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                           <form role="form" action="" method="post">
                          <div class="modal-body">                             
                                
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-align-left-2"></i></span>
                                    </div>
                                    <input  class="form-control" name="name" placeholder="Libellé"  type="text">
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

      