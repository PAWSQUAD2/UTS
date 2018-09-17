<?php
    if(isset($_POST['login'])){
        include_once 'user.php';
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $user = User::login($email, $pass);
        if( $user!= null){
            if($user->isActivated == false){
                echo '<script type="text/javascript">window.parent.document.getElementById("fail-login").style.visibility="visible";
                window.parent.document.getElementById("fail-login").innerHTML = "Email Anda Belum Terverifikasi.";</script>';
                session_destroy();
            }else if($user->role==="anggota baru"){
                echo '<script type="text/javascript">window.parent.document.getElementById("fail-login").style.visibility="visible";
                window.parent.document.getElementById("fail-login").innerHTML = "Anda tidak dapat Login sebelum diterima.";</script>';
                session_destroy();
            }else {
                echo '<script>window.top.location.replace("index.php");</script>';
            }
        }else{
            echo '<script type="text/javascript">window.parent.document.getElementById("fail-login").style.visibility="visible";
            window.parent.document.getElementById("fail-login").innerHTML = "Gagal Masuk! Email/Password Anda Salah.";</script>';
        }
    }else{
        header("Location: daftar_hasil.php");
    }
?>