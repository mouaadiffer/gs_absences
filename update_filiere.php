<?php include 'codes/config.php';
	  	

$id=$_GET['filiereid'];		
if (isset($_POST['submit'])) {
	$libelle=$_POST['l'];
	
	$result=mysqli_query($conn,"UPDATE `filiere` SET libelle='$libelle'
		where idFiliere= '$id' ");
	if ($result) {
		//echo "updated";
		header('location: filieresmanager.php');
	}else {
		die(mysqli_error($conn));
	}

}
$sql="SELECT * FROM `filiere` where `idFiliere`= '$id'";
	$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modifier la filière <?php echo $_GET['filiereid'] ?></title>
	<link href="./assets/img/brand/167707.png" rel="icon" type="image/png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<h1 class="text-center">Modification de la filière N°<?php echo $_GET['filiereid'] ?> </h1>
	<img src="./assets/img/brand/school.png" class="navbar-brand-img pull-right " alt="..." style="max-height: 35rem;">
	<form action="" method="POST" style="width: 50%; margin-left: 50px;">
		<div class="form-group">
		Libellé : <input type="text" name="l" class="form-control" value="<?php echo $row['libelle']; ?>"><br>
		</div>


		<button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
	</form>
	<?php }	?>
	</div>
</body>
</html>