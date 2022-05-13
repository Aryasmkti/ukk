<?php

    require "../config/connection.php";

    Class Perjalanan
    {
    public function __construct()
        {}

    public function insert($id_user, $waktu, $tgl, $lokasi, $suhu)
        {
            $sql = "INSERT INTO tb_perjalanan (id_user, waktu, tgl, lokasi, suhu) VALUES ('$id_user','$waktu','$tgl','$lokasi', '$suhu')";
            return runQuery($sql);
        }

    public function update($id_perjalanan, $id_user, $waktu, $tgl, $lokasi, $suhu)
        {
            $sql = "UPDATE tb_perjalanan SET id_user='$id_user', waktu='$waktu', tgl='$tgl' lokasi='$lokasi', suhu='$suhu'
                    WHERE id_perjalanan = '$id_perjalanan'";
            return runQuery($sql);
        }

    public function show($id_perjalanan)
        {
            $sql = "SELECT * FROM tb_perjalanan WHERE id_perjalanan='$id_perjalanan'";
            return runQueryRow($sql);
        }

    public function get_data($id_user)
        {
            $sql = "SELECT * FROM tb_perjalanan WHERE id_user='$id_user'";
            return runQuery($sql);
        }

    public function delete_data($id_perjalanan)
        {  
            $sql = "DELETE FROM tb_perjalanan WHERE id_perjalanan='$id_perjalanan'";
            return runQuery($sql);
        }
    }