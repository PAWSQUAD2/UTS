<?php
    include_once 'user.php';
    if(!isset($_POST['Userid'])){
        
        echo 'BAD REQUEST';
        exit();
    }if(isset($_POST['rej'])){
        User::delUser($_POST['Userid']);
        echo '<script>window.parent.location.reload(true);</script>';
    }else if(isset($_POST['acc'])){
        User::accUser($_POST['Userid']);
        echo '<script>window.parent.location.reload(true);</script>';
    }else{

    }
?>