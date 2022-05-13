<?php
 if(isset($_POST["submit"]) and $_POST["submit"]=="register"){
      
  require_once("models/User.php");
  $user = new User();

  $nik = $_POST['nik'];
  $nm_lengkap = $_POST['nm_lengkap'];

  if(empty($nik) AND empty($nm_lengkap)){
    header("Location:".BASE_URL."register.php?m=2");
    exit();
  }else{
    $result = $user->register($nik, $nm_lengkap);
    if(isset($result)){
      header("Location:".BASE_URL."register.php?m=3");
      exit();
    }
  }
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Peduli Diri|Daftar</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="public/Assets/style.css">
  <!-- <link rel="stylesheet" href="public/bower_components/bootstrap/dist/css/bootstrap.min.css"> -->

</head>
<body class="hold-transition login-page">
<style>
body {
  background-image: url('public/Assets/pedulidiri.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
</style>
 <div class="login-box">
 
  <div class="login-box-body">
    <p class="login-box-msg"></p>

    <?php
      require 'view/layout_partial/alert.php';
    ?>
    <div class="container">
		<form action="" method="POST" class="login-email">

			<div class="input-group">
				<input type="nik" placeholder="NIK" name="nik">
			</div>
			<div class="input-group">
				<input type="nm_lengkap" placeholder="Nama" name="nm_lengkap">
			</div>
			<div class="input-group">
        <input type="hidden" name="submit" value="register">
				<button name="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
			</div>
			<p class="login-register-text">Sudah Punya Akun? <a href="index.php">Login</a>.</p>
		</form>
	</div>
  </div>
</div>

<script src="public/bower_components/jquery/dist/jquery.min.js"></script>
<script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="public/plugins/iCheck/icheck.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html>
