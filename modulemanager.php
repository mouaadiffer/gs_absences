<?php include('header.php');
if(isset($_POST["module"]))

  {
      $module = mysqli_real_escape_string($conn, $_POST['module']);
      $coefficient = mysqli_real_escape_string($conn, $_POST['coefficient']);
      mysqli_query($conn,"INSERT INTO `module` (`module`,`coefficient`) VALUES ('$module','$coefficient')");
  }

$delmodule=$_GET['suppid'];
if($delmodule!=NULL){
  mysqli_query($conn,"DELETE FROM `module` where idModule='$delmodule'");
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
                  <h3 class="mb-0">Liste des modules</h3>
                </div>
                <div class="col text-right">
                  <a href="#" data-toggle="modal" data-target="#newmodule" class="btn btn-sm btn-primary">Ajouter</a>
                </div>
              </div>
            </div>
           
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Module</th>
                    <th scope="col">Coefficient</th>
                    <th scope="col" class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    $sql="SELECT * FROM `module`";
                    $result=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($result)){


                    
                  ?>
                  <tr>
                    <th scope="row">
                     <?php echo $row["idModule"]  ?>
                    </th>
                    <td>
                      <?php echo $row["module"]  ?>
                      <td>
                        <?php echo $row["coefficient"]  ?>
                          
                      </td>
                    </td>
                    <td class="text-center">
                      <a class="btn btn-sm btn-info" href="update_module.php?moduleid=<?php echo $row['idModule']; ?>">Modifier</a>
                      <a href="?suppid=<?php echo $row['idModule']; ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Voulez-vous supprimer ce module ?');">Supprimer</a>
                    </td>
                  </tr>
                <?php } ?>
              
                     <!-- Modal -->
                    
                       

                     <!-- Modal -->
                    <div class="modal fade" id="newmodule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nouveau Module</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                           <form role="form" action="" method="post">
                          <div class="modal-body">                             
                                
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input  class="form-control" name="module" placeholder="Module"  type="text"><br>
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input  class="form-control" name="coefficient" placeholder="Coefficient"  type="text"><br>
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

      