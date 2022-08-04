<?php include('header.php'); 


?>
 
    <!-- Header -->
    <div class="header bg-gradient-primary pb-5 pt-5 pt-md-8">
      <div class="container-fluid">
        <div class="header-body">
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Etudiants</h5>
                      <span class="h2 font-weight-bold mb-0">
                        <?php
                          require 'codes/config.php';

                          $query="SELECT idEtudiant from etudiant order by idEtudiant";
                          $resultat=mysqli_query($conn,$query);

                          $row=mysqli_num_rows($resultat);
                          echo  $row  
                         ?> 
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-chart-bar"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Filières</h5>
                      <span class="h2 font-weight-bold mb-0">
                        <?php 
                          require 'codes/config.php';
                          $query="SELECT idFiliere from filiere order by idFiliere";
                          $resultat=mysqli_query($conn,$query);
                          $row=mysqli_num_rows($resultat);
                          echo $row
                        ?>
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                        <i class="fas fa-chart-pie"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Absences</h5>
                      <span class="h2 font-weight-bold mb-0">
                        <?php
                          require 'codes/config.php';
                          $query="SELECT idAbsence from absence order by idAbsence";
                          $resultat=mysqli_query($conn,$query);
                          $row=mysqli_num_rows($resultat);
                          echo $row
                         ?>
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Admins</h5>
                      <span class="h2 font-weight-bold mb-0">
                        <?php 
                          require 'codes/config.php';
                          $query="SELECT aid from admins order by aid";
                          $resultat=mysqli_query($conn,$query);
                          $row=mysqli_num_rows($resultat);
                          echo $row
                        ?>
                      </span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <i class="fas fa-percent"></i></div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <h1 class="text-white text-center mt-1">Les 5 derniers absences</h1>
      </div>
            <table class="table table-striped">
              
  <thead>
    <tr>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Date d'absence</th>
      <th scope="col">Séance</th>
      <th scope="col">Motif</th>
    </tr>
  </thead>
  <tbody>
      <?php 
                    $sql="SELECT nom,prenom,dateAbsence,seance,motif from etudiant e,absence a where a.idEtudiant=e.idEtudiant order by e.idEtudiant ASC LIMIT 5";
                    $resultat=mysqli_query($conn,$sql);
                    while($row=mysqli_fetch_assoc($resultat)){
                  ?>
    <tr>
      <th scope="row">
        <?php echo $row["nom"];    ?>
     </th>
      <td>
        <?php echo $row["prenom"];      ?>
          
        </td>
      <td>
        <?php echo $row["dateAbsence"];   ?>
          
        </td>
      <td>
        <?php echo $row["seance"];   ?>
          
        </td>
      <td>
        <?php echo $row["motif"];    ?>
          
        </td>
    </tr>
    <?php } ?>
  </tbody>
</table>
      </div>

     




 
      


    

        





                
  
