<?php
    include_once "koneksi.php";
    $con=konek();
    $result = $con->query("SELECT * FROM email_verification WHERE email= 'ssjovianto@gmail.com'");
    if(mysqli_num_rows($result)!=0){
            $data = mysqli_fetch_assoc($result);
            
            $token = $data['email'];
            echo $token;
    }else{
        echo 'ere';
    }
            
?>