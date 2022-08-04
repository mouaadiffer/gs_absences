<?php include 'codes/config.php';
	  	

$id=$_GET['moduleid'];
if (isset($_POST['submit'])) {
	$module=$_POST['module'];
	$coeff=$_POST['coeff'];
	$result=mysqli_query($conn,"UPDATE `module` SET module='$module', coefficient='$coeff'
		where  idModule='$id' ");
	if ($result) {
		//echo "updated";
		header('location: modulemanager.php');
	}else {
		die(mysqli_error($conn));
	}

}
$sql="SELECT * FROM `module` where `idModule`= '$id' ";
	$result=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result)){


?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modifier </title>
	<link href="./assets/img/brand/167707.png" rel="icon" type="image/png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<h1 class="text-center">Modification du Module N°<?php echo $id 	?> </h1>
	<img src="./assets/img/brand/school.png" class="navbar-brand-img pull-right " alt="..." style="max-height: 35rem;">
	<form action="" method="POST" style="width: 50%; margin-left: 50px;">
		<div class="form-group">
		Module: <input type="text" name="module" class="form-control" value="<?php echo $row['module']; ?>"><br>
		Coefficient : <input type="text" name="coeff" class="form-control" value="<?php echo $row['coefficient']; ?>"><br>
		</div>


		<button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
	</form>
	<?php }	?>
	</div>

</body>
</html>