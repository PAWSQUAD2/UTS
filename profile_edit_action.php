<?php
    include_once 'session.php';
    include_once 'user.php';
    session_init(true);
    if(isset($_POST['simpan'])){
       $result = $_SESSION['user']->update();
        if($result){
            header("Location: profile.php");
        }else{
            echo 'Gagal menyimpan profil, anda akan keluar dari sistem, mohon login ulang';
            logout();
            healder("Location: daftar.php",10);
        }
    }
?>