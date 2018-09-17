<?php
include_once 'user.php';
include_once 'koneksi.php';
function session_init($b=0){//$b->true == redirect to login
    session_start();
    $con = konek();
    $result = mysqli_query($con, "SELECT * FROM setting WHERE id=1");
    $sec = mysqli_fetch_assoc($result)['timeout_sec'];
    if(isset($_SESSION['user'])){
      $user = $_SESSION['user'];
      if((time()- $user->timeout)>$sec){
          logout(true);
      }else{
          $user->updateTimeout();
      }

    }else{
        if(b){
            header("location: daftar.php");
        }else{

        }
    }
}
function logout($isExpired=false){
    session_destroy();
    if($isExpired){
        header("location: daftar.php?expired");
    }else{
        header("location: daftar.php");
    }
}
?>