<?php
  require_once '../../config/connection.php';
  session_start();
  if(isset($_SESSION["id_user"])){
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Peduli Diri</title> 
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?php require '../layout_partial/link.php'; ?>

</head>

<body class="hold-transition skin-red sidebar-mini">
  <div class="wrapper">

    <?php require '../layout_partial/header.php'; ?>

    <?php require '../layout_partial/sidebar.php'; ?>

    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Data Perjalanan</h3>
                <button type="button" id="btnTambah" onclick="showForm(true)" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Tambah Perjalanan</button>
              </div> 

              <input type="hidden" id="id_user" value="<?php echo $_SESSION["id_user"]?>">
              
              <div class="box-body" id="daftarPerjalanan">
                <div class="callout callout-info">
                  <h4>Selamat Datang, <?php echo $_SESSION["nm_lengkap"]?></h4>
                  <p>NIK : <?php echo $_SESSION["nik"] ?></p>
                </div>
                <div class="table-responsive">
                  <table id="tbl_list" class="table table-bordered table-striped" cellspacing="0" width="100%">
                    <thead>
                      <th>Tanggal/Jam</th>
                      <th>Lokasi</th>
                      <th>Suhu</th>
                      <th>Pilihan</th>
                    </thead>
                    <tbody>           
                    </tbody>
                  </table>
                </div>
              </div>


              <form id="formTambah" method="POST">
                <div class="box-body">
                  <input type="hidden" name="id_user" value="<?php echo $_SESSION["id_user"]?>">

                  <input type="hidden" name="id_perjalanan" id="id_perjalanan">

                  <div class="form-group">
                    <label>Tanggal</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control pull-right" id="tgl" name="tgl">
                    </div>
                    <span>Format Tanggal : Hari/Bulan/Tahun</span>         
                  </div>

                  <div class="form-group">
                    <label>waktu</label>               
                      <input type="time" class="form-control pull-right" id="waktu" name="waktu">           
                  </div>
                  <span>AM : 00.00 Dini Hari s/d 12.00 Siang</span>  
                  <br>
                  <span>PM : 12.00 Siang s/d 23.59 Tengah Malam</span>

                  <div class="form-group">
                    <label>Lokasi</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-map-marker"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="lokasi" id="lokasi">
                    </div>
                   
                  </div>
                  <div class="form-group">
                    <label>Suhu</label>
                    <div class="input-group date">
                      <div class="input-group-addon">
                        <i class="fa fa-tachometer"></i>
                      </div>
                      <input type="text" class="form-control pull-right" name="suhu" id="suhu">
                    </div>
                   
                  </div>
                </div> 

                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" id="btnSimpan">Simpan</button>
                  <button type="button" class="btn btn-danger" onclick="closeForm()">Batal</button>
                </div> 
              </form> 
              
            </div> 
          </div> 
        </div>
      </section> 
    </div> 
  </div> 
  


  <?php require '../layout_partial/script.php'; ?>
  <script type="text/javascript" src="perjalanan.js"></script>
</body>
</html>

<?php
	}else{
		header("Location:".BASE_URL);
	}
?>