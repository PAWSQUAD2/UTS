<?php
    if(isset($_POST['login'])){
        include_once 'koneksi.php';
        $con = konek();
       
        $email = $_POST['email'];
        $pass = md5($_POST['pass']);
        $query = "SELECT * FROM users WHERE email= '$email' AND password='$pass'";
        $result = $con->query($query);
        if(mysqli_num_rows($result)!=0){
            header("Location: daftar_hasil.php?result=ok");
        }else{
            //header("Location: daftar_hasil.php?result=no");
            echo '<script type="text/javascript">window.parent.document.getElementById("fail-login").style.visibility="visible";</script>';
        }
        
    }else{
        header("Location: daftar_hasil.php");
    }
?>