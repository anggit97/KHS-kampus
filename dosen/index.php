<?php  
session_start();

$error = "";

include '../koneksi/koneksi.php';

if (isset($_POST['login'])) {

	foreach ($_POST as $key => $value) {
		${$key} = $value;
	}

	$query = mysqli_query($conn, "SELECT password from dosen where nid='$nid'");

	if ($query) {

		if (mysqli_num_rows($query)>0) {
			# code...
			$data  = mysqli_fetch_array($query);
			if (password_verify($password,$data['password'])) {
				$_SESSION['dosen'] = $nid;
				header("location:admin");
				exit;
			}else $error = "Password dan Email Salah!";
		}else $error = "Password dan Email Salah!";
		
	}else $error = "Password dan Email Salah!";
	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login Dosen</title>
	<link rel="stylesheet" href="../materialize/css/materialize.css">
	<link href="../webcon/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
	<script src="../js/jquery-2.2.2.js"></script>
	<script src="../materialize/js/materialize.css"></script>
	<style>
		.log{
			margin-top:20px;
		}
		.h5{
			color: white;
			margin-left:-110px;
			margin-top: 100px; 
		}
	</style>
</head>
<body background="../images/login_background.jpg">
	<div class="container">
		<center><h5 class="h5">Sistem KHS Online</h5></center>
		<div class="row log">
		    <div class="col s7 offset-s2 card-panel z-depth-3">
		      <center><h5>LOGIN DOSEN</h5></center>
		      <center><h5><?php echo "<font color='red'>$error</font>"; ?></h5></center>
		      <hr>

		      <form method="post" action="">
		        <div class="row">
		          <div class="input-field col s12">
		            <i class="mdi mdi-account prefix"></i> 
		            <input id="icon_prefix" type="text" class="validate" name="nid" placeholder="NID">
		          </div>

		          <div class="input-field col s12">
		            <i class="mdi mdi-key prefix"></i>
		            <input id="icon_telephone" type="password" class="validate" name="password" placeholder="PASSWORD">
		            
		          </div>
				 
		          <div class="input-field col s12">
		            <button class="btn xxy col s12 red darken-1" name="login"><i class="mdi mdi-forward left"></i>Masuk</button>
		          </div>
		          
		        </div>
		      </form>


		    </div>

		    <div class="col s7 offset-s2 card-panel z-depth-3"><br>
		    	<div class="row">
		    		<div class="col s6">
		    			<a class="waves-effect waves-light btn red darken-1" href="../index.php" style="margin-left:30px;"><i class="mdi mdi-forward left"></i>Login MHS</a>
            			
		    		</div>
					<div class="col s6">
		    			<a class="waves-effect waves-light btn red darken-1" href="../admin" style="margin-left:30px;"><i class="mdi mdi-forward left"></i>Login Admin</a>
     	
		    		</div>
				</div>
            </div>

		</div>
	</div>
</body>
</html>
