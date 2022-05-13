<?php 
  
  if(isset($_POST["submit"]) and $_POST["submit"]=="login"){
      
      require_once("models/User.php");
      $user = new User();

      $nik = $_POST['nik'];
      $nm_lengkap = $_POST['nm_lengkap'];

      if(empty($nik) AND empty($nm_lengkap)){
        header("Location:".BASE_URL."index.php?m=2");
        exit();
      }else{
        $result = $user->login($nik, $nm_lengkap);
        $get = $result->fetch_object();
        session_start();
        if(isset($get)){
          $_SESSION["id_user"]=$get->id_user;
          $_SESSION["nik"]=$get->nik;
          $_SESSION["nm_lengkap"]=$get->nm_lengkap;
          header("Location:".BASE_URL."view/perjalanan/");
          exit();
        }else{
          header("Location:".BASE_URL."index.php?m=1");
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
  <title>Peduli Diri</title>
 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="public/Assets/style.css">
  <!-- <link rel="stylesheet" href="public/bower_components/bootstrap/dist/css/bootstrap.min.css"> -->


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
				<input type="NIK" placeholder="NIK" name="nik">
			</div>
			<div class="input-group">
				<input type="nama" placeholder="Nama" name="nm_lengkap">
			</div>
			<div class="input-group">
      <input type="hidden" name="submit" value="login">
				<button type="submit" class="btn btn-primary btn-block btn-flat" id="btnDaftar">Masuk</button>
			</div>
			<p class="login-register-text">Saya Pengguna Baru <a href="register.php">Daftar</a>.</p>
		</form>
	</div>
  </div>

<script src="public/bower_components/jquery/dist/jquery.min.js"></script>
<script src="public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="public/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
