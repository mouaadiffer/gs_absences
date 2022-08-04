<?php include 'codes/config.php';
	  	

$id=$_GET['absenceid'];		
if (isset($_POST['submit'])) {
	$etudiant=$_POST['etudiant'];
	$date_abs=$_POST['date_abs'];
	$seance=$_POST['seance'];
	$motif=$_POST['motif'];
	
	$result=mysqli_query($conn,"UPDATE `absence` SET idEtudiant='$etudiant',dateAbsence='$date_abs',seance='$seance',motif='$motif'
		where idAbsence= '$id' ");
	if ($result) {
		//echo "updated";
		header('location: absencesmanager.php');
	}else {
		die(mysqli_error($conn));
	}

}
$sql="SELECT * FROM `absence` where `idAbsence`= '$id'";
	$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modifier l'absence <?php echo $_GET['absenceid'] ?></title>
	<link href="./assets/img/brand/167707.png" rel="icon" type="image/png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<h1 class="text-center">Modification de l'absence N°<?php echo $_GET['absenceid'] ?> </h1>
	<img src="./assets/img/brand/school.png" class="navbar-brand-img pull-right " alt="..." style="max-height: 35rem;">
	<form action="" method="POST" style="width: 50%; margin-left: 50px;">
		<div class="form-group">
		ID d'étudiant : <input type="text" name="etudiant" class="form-control" value="<?php echo $row['idEtudiant']; ?>" ><br>
		Date d'absence : <input type="date" name="date_abs" class="form-control" value="<?php echo $row['dateAbsence']; ?>"><br>
	 	Séance : <input type="text" name="seance" class="form-control" value="<?php echo $row['seance']; ?>"><br>
	 	Motif : <input type="text" name="motif" class="form-control" value="<?php echo $row['motif']; ?>"><br>
		</div>


		<button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
	</form>
	<?php }	?>
	</div>
</body>
</html>