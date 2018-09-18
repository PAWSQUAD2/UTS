<?php
    if(isset($_POST['publish'])){
        include_once 'koneksi.php';
        $con = konek();
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $kategori = $_POST['kategori'];
        $result = $con->query("INSERT INTO berita(judul, isi, kategori) VALUES('$judul', '$isi','$kategori')");
        echo '<script>window.parent.location.reload(true);</script>';
    }else if(isset($_POST['delete'])){
        include_once 'koneksi.php';
        $con = konek();
        $id = $_POST['id'];
        $con->query("DELETE FROM berita WHERE id=$id");
        echo '<script>window.parent.location.reload(true);</script>';
    }else if(isset($_POST['edit'])){
        include_once 'koneksi.php';
        $con = konek();
        $id = $_POST['id'];
        echo '<script>window.parent.location.replace("tambah-berita.php?edit='.$id.'");</script>';
    }if(isset($_POST['update'])){
        include_once 'koneksi.php';
        $con = konek();
        if(!isset($_GET['id'])){

        }
        $id = $_GET['id'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $kategori = $_POST['kategori'];
        $result = $con->query("UPDATE berita SET judul= '$judul', isi ='$isi', kategori = '$kategori' WHERE id=$id");
        if($result){
            echo '<script>window.parent.location.reload(true);</script>';
        }else{
            echo '<script>alert("GAGAL MENYIMPAN DATA SILAHKAN COBA LAGI!");</script>';
        }
    }else{
        echo 'BAD REQUEST';
    }
?>