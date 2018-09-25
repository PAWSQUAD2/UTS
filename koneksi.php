<?php
    function konek(){
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "ksr";
        $con = mysqli_connect($server, $username, $password, $database) or die("GAGAL TERKONEKSI KE SERVER");
        
        return $con;
    };
?>