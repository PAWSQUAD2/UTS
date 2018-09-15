<?php
    if(isset($_POST['register'])){
        include_once 'koneksi.php';
        $con = konek();
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $jurusan = $_POST['jurusan'];
        $npm = $_POST['npm'];
        $phone = $_POST['phone'];
        $bornPlace = $_POST['bornPlace'];
        $birthDay = date('Y-m-d', strtotime($_POST['birthDay']));
        $createdAt = $lastUpdate = new DateTime();
        $query = "INSERT INTO users(token, name, email, password, prody, npm, birthday, bornplace, phone) 
        VALUES (UUID(),'$name','$email','$pass','$jurusan','$npm','$birthDay','$bornPlace','$phone')";
        $result = $con->query($query);
        if($result){
            header("Location: daftar_hasil.php?result=ok");
        }else{
            //header("Location: daftar_hasil.php?result=no");
        }
        
    }else{
        header("Location: daftar_hasil.php");
    }
?>