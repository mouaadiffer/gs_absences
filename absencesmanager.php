<?php include('header.php');
if(isset($_POST["id"]))

  {
      $id = mysqli_real_escape_string($conn, $_POST['id']);
      $date = mysqli_real_escape_string($conn, $_POST['date']);
      $seance = mysqli_real_escape_string($conn, $_POST['seance']); 
      $motif = mysqli_real_escape_string($conn, $_POST['motif']);  
      mysqli_query($conn,"INSERT INTO `absence` (`idEtudiant`, `dateAbsence`, `seance`, `motif`) VALUES ('$id', '$date', '$seance', '$motif')");
  }


$delabsence=$_GET['suppid'];
if($delabsence!=NULL){
  mysqli_query($conn,"DELETE FROM `absence` where idAbsence='$delabsence'");
}





 ?>
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <div class="text-white text-center"> 
            <form action="" method="POST">
              Rechercher par date :    <input type="date"    name="d" >      
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
                  <h3 class="mb-0">Liste des absences</h3>
                </div>
                <div class="col text-right">
                  <a href="#" data-toggle="modal" data-target="#newabsence" class="btn btn-sm btn-primary">Ajouter</a>
                  <a href="rapport_absence.php?d=<?php echo $_POST['d']  ?>" target="_blank" class="btn btn-sm btn-warning">Génerer</a>
                </div>
              </div>
            </div>
           
            
              <!-- Projects table -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nom Complet</th>
                    <th scope="col">Date d'absence</th>
                    <th scope="col">Séance</th>
                    <th scope="col">Motif</th>
                    <th scope="col" class="text-center">Actions</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php 
                    if (!isset($_POST["submit"]))  {
                      $sql="SELECT idAbsence,a.idEtudiant,dateAbsence,seance,motif,nom,prenom FROM absence a,etudiant e where a.idEtudiant=e.idEtudiant 
                     order by e.idEtudiant";
                      $result=mysqli_query($conn,$sql);
                      while($row=mysqli_fetch_assoc($result)){
                  ?>                  
                  <tr>
                    <th scope="row">
                     <?php echo $row["idEtudiant"];  
                     ?>
                    </th>
                    <th scope="row">
                     <?php echo $row["nom"].' '.$row["prenom"];  
                     ?>
                    </th>
                    <td>
                      <?php echo $row["dateAbsence"]  ?>
                    </td>
                    <td>
                      <?php echo $row["seance"]  ?>
                    </td>
                    <td>
                      <?php echo $row["motif"]  ?>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-info" name="modifi" href="update_absence.php?absenceid=<?php echo $row['idAbsence']; ?>"> Modifier</a>    
                      <a href="?suppid=<?php echo $row['idAbsence']; ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Voulez-vous supprimer cet absence ?');">Supprimer</a>
                    </td>
                  </tr>
                <?php } }else 
                $d=$_POST['d'];
                $sql="SELECT idAbsence,a.idEtudiant,dateAbsence,seance,motif,nom,prenom FROM absence a,etudiant e where a.idEtudiant=e.idEtudiant  AND dateAbsence='$d' order by e.idEtudiant  ";
                $result=mysqli_query($conn,$sql);
                 while($row=mysqli_fetch_assoc($result)){

                ?>
                <tr>
                  <th scope="row">
                     <?php echo $row["idEtudiant"];  
                     ?>

                    </th>
                    <th scope="row">
                     <?php echo $row["nom"].' '.$row["prenom"];  
                     ?>

                    </th>
                    <td>
                      <?php echo $row["dateAbsence"]  ?>
                    </td>
                    <td>
                      <?php echo $row["seance"]  ?>
                    </td>
                     <td>
                      <?php echo $row["motif"]  ?>
                    </td>
                    <td>
                      <a class="btn btn-sm btn-info" name="modifi" href="update_absence.php?absenceid=<?php echo $row['idAbsence']; ?>"> Modifier</a>    
                      <a href="?suppid=<?php echo $row['idAbsence']; ?>" class="btn btn-sm btn-danger"  onclick="return confirm('Voulez-vous supprimer cet étudiant ?');">Supprimer</a>
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
                    <div class="modal fade" id="newabsence" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nouvelle Absence</h5>
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
                                    <input  class="form-control" name="id" placeholder="ID d'étudiant"  type="text">
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input  class="form-control" name="date" placeholder="Date d'absence"  type="date">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-collection"></i></span>
                                    </div>
                                    <input  class="form-control" name="seance" placeholder="Séance"  type="text">
                                  </div>
                                </div>
                                 <div class="form-group">
                                  <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                      <span class="input-group-text"><i class="ni ni-single-copy-04"></i></span>
                                    </div>
                                    <input autocomplete="off" class="form-control" name="motif" placeholder="Motif"  type="text">
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
