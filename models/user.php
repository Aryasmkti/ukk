<?php
    require 'config/connection.php';

    Class User{
    public function __construct()
        {

        }

    public function login($nik, $nm_lengkap)
        {
            $sql = "SELECT * FROM tb_user WHERE nik='$nik' AND nm_lengkap='$nm_lengkap' ";
            return runQuery($sql);
        }

    public function register($nik, $nm_lengkap)
        {
            $sql = "INSERT INTO tb_user (, nik, nm_lengkap) VALUES ('$nik', '$nm_lengkap')";
            return runQuery($sql);
        }


       
    }