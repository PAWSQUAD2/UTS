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
        $isEmailNotUnique = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");
        if(mysqli_num_rows($isEmailNotUnique)>0){
            header("Location: daftar_hasil.php?result=email_taken");
            exit();
        }
        $query_email = "INSERT INTO email_verification(token, email) VALUES (UUID(),'$email')";
        $result = $con->query($query_email);
        if($result){
            $result = $con->query("SELECT * FROM email_verification WHERE email = '$email'");
            $data = mysqli_fetch_assoc($result);
            $token = $data['token'];
            
            $headers = "Content-Type: text/html; charset=ISO-8859-1\r\n";
            mail($email, 'Email Verification - KSR Dashboard', '<h3>Terima Kasih!!</h3>
            <p style="color:red;font-size:20px;">Terima kasih anda telah mendaftar KSR. Mohon aktivasi email anda dibawah ini dan tunggu hingga pendaftaran anda dire-view oleh admin</p>
            Please Click Link Below : <a href="http://ksriotdemo.000webhostapp.com/verify.php?token='.$token.'">---KLIK DISINI---</a>
            <p style="color:red;font-size:20px;">Atau Anda dapat membuka http://ksriotdemo.000webhostapp.com/paw/UTS/verify.php kemudian masukkan token = '.$token.' Anda untuk verifikasi email.</p>', $headers);
        }else{
            header("Location: daftar_hasil.php?result=no");
        }
        
        $query = "INSERT INTO users(token, name, email, password, prody, npm, birthday, bornplace, phone)
        VALUES (UUID(),'$name','$email','$pass','$jurusan','$npm','$birthDay','$bornPlace','$phone')";
        $result = $con->query($query);
        
        if($result){
            header("Location: daftar_hasil.php?result=ok");
        }else{
            header("Location: daftar_hasil.php?result=no");
        }
        
    }else{
        header("Location: daftar_hasil.php");
    }
?>