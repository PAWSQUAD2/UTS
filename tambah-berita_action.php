<?php
    if(isset($_POST['publish'])){
        include_once 'koneksi.php';
        $con = konek();
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $kategori = $_POST['kategori'];
        $result = $con->query("INSERT INTO berita(judul, isi, kategori) VALUES('$judul', '$isi','$kategori')");
    }else if(isset($_POST['preview'])){

    }else{
        echo 'BAD REQUEST';
    }
?>