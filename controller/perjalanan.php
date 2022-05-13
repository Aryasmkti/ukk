<?php

    require_once "../models/perjalanan.php";

    $perjalanan = new Perjalanan();

    $id_perjalanan = isset($_POST["id_perjalanan"]) ? cleanString($_POST["id_perjalanan"]):"";
    $id_user = isset($_POST["id_user"]) ? cleanString($_POST["id_user"]):"";
    $tgl = isset($_POST["tgl"]) ? cleanString($_POST["tgl"]):"";
    $waktu = isset($_POST["waktu"]) ? cleanString($_POST["waktu"]):"";
    $lokasi = isset($_POST["lokasi"]) ? cleanString($_POST["lokasi"]):"";
    $suhu = isset($_POST["suhu"]) ? cleanString($_POST["suhu"]):"";

    switch ($_GET["action"]){
        case 'saveOrEdit' :
            if(empty($id_perjalanan)){
                $response =  $perjalanan->insert($id_user, $waktu, $tgl, $lokasi, $suhu);
            }else{
                $response = $perjalanan->update($id_perjalanan, $id_user, $waktu, $tgl, $lokasi, $suhu);
            }
        break;

        case 'show' :
            $response = $perjalanan->show($id_perjalanan);
            echo json_encode($response);
        break;

        case 'get_data' :
            $response = $perjalanan->get_data($id_user);

            $data = Array();

            while($row = $response->fetch_object()){
                $data[] = array(
                    "0"=>date('d-m-Y, H:i', strtotime($row->waktu)),
                    "1"=>$row->lokasi,
                    "2"=>$row->suhu,
                    "3"=>'<button class="btn btn-info btn-sm" onclick="show('.$row->id_perjalanan.')" title="Edit Data"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-sm" onclick="delete_data('.$row->id_perjalanan.')" title="Delete Data"><i class="fa fa-trash"></i></button>'
                );
            }

            $result = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );

            echo json_encode($result);
        break;

        case 'delete_data' :
            $response = $perjalanan->delete_data($id_perjalanan);
        break;

        case 'search' :
          
            $response = $perjalanan->search($id_user, $tgl_awal, $tgl_akhir);
            
            $data = Array();

            while($row = $response->fetch_object()){
                $data[] = array(
                    // "0"=>$row->id_perjalanan,
                    "0"=>date('d-m-Y, H:i', strtotime($row->waktu)),
                    "1"=>$row->lokasi,
                    "2"=>$row->suhu
                );
            }

            $result = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data
            );

            echo json_encode($result);
        break;
    }