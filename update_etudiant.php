<?php include 'codes/config.php';
	  	

$id=$_GET['etuiid'];	
if (isset($_POST['submit'])) {
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$mail=$_POST['mail'];
	$f=$_POST['f'];
	
	$result=mysqli_query($conn,"UPDATE `etudiant` SET nom='$fname',prenom='$lname',email='$mail',filiere='$f'
		where idEtudiant= '$id' ");
	if ($result) {
		//echo "updated";
		header('location: etudiantsmanager.php');
	}else {
		die(mysqli_error($conn));
	}

}

	$sql="SELECT * FROM `etudiant` where `idEtudiant`= '$id'";
	$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modifier l'étudiant <?php echo $_GET['etuiid'] ?></title>
	<link href="./assets/img/brand/167707.png" rel="icon" type="image/png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container ">
	<h1 class="text-center">Modification de l'étudiant N°<?php echo $id ?> </h1>
	<img src="./assets/img/brand/school.png" class="navbar-brand-img pull-right " alt="..." style="max-height: 35rem;">
	<form action="" method="POST" style="width: 50%; margin-left: 50px;">
		<div class="form-group text-left">
		Nom : <input type="text" name="fname" class="form-control" value="<?php echo $row['nom'];?>"><br>
		Prenom : <input type="text" name="lname" class="form-control" value="<?php echo $row['prenom'];		?>"><br>
	 	Email : <input type="text" name="mail" class="form-control" value="<?php echo $row['email'];		?>"><br>
	 	Filiere : <input type="text" name="f" class="form-control" value="<?php echo $row['filiere'];		?>"><br>
		</div>


		<button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
	</form>
<?php }	?>
	</div>
</body>
</html>