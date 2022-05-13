 <!-- CHECK CONDITION FOR ALERT -->
<?php
    if(isset($_GET["m"])){
        switch($_GET["m"]){
        case "1":
        ?>
            <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Perhatian</h4>
                NIK atau Nama Lengkap Anda Salah
            </div>    
        <?php
            break;
            case "2":
        ?>
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Perhatian</h4>
                Silahkan Masukan NIK dan Nama Lengkap Anda
            </div>   
        <?php
            break;
            case "3" :
        ?>
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info"></i> Perhatian</h4>
                Anda Berhasil Mendafatar.
            </div>  
        <?php
            break;
                    
        }
    }
        ?> <!-- END CHECK CONDITION FOR ALERT -->