<?php
    if(isset($_POST['publish'])){
        include_once 'koneksi.php';
        $con = konek();
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $kategori = $_POST['kategori'];
        $target_dir = "images/berita/";
        $date = new DateTime();
        $dist = $date->format('Y_m_d_H_i_s');
        $target_file = $target_dir .'_'. $dist.basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["publish"])) {
            $check = getimagesize($_FILES["file"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["file"]["size"] > 50000000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $dir = $target_dir;
        $result = $con->query("INSERT INTO berita(judul, isi, kategori, photoUrl) VALUES('$judul', '$isi','$kategori', '$target_file')");
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
            exit();
        }
        
        if(isset($_FILES["file"]["name"]) && $_FILES["file"]["name"]!=""){
            $id=$_GET['id'];
            $result = $con->query("SELECT * FROM berita WHERE id= $id");
            $data = mysqli_fetch_assoc($result);
            unlink($data['photoUrl']);
            $target_dir = "images/berita/";
            $date = new DateTime();
            $dist = $date->format('Y_m_d_H_i_s');
            $target_file = $target_dir .'_'. $dist.basename($_FILES["file"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            if(isset($_POST["publish"])) {
                $check = getimagesize($_FILES["file"]["tmp_name"]);
                if($check !== false) {
                    echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["file"]["size"] > 50000000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        $id = $_GET['id'];
        $judul = $_POST['judul'];
        $isi = $_POST['isi'];
        $kategori = $_POST['kategori'];
        $result = $con->query("UPDATE berita SET judul= '$judul', isi ='$isi', kategori = '$kategori', photoUrl = '$target_file' WHERE id=$id");
        if($result){
            echo '<script>window.parent.location.reload(true);</script>';
        }else{
            echo '<script>alert("GAGAL MENYIMPAN DATA SILAHKAN COBA LAGI!");</script>';
        }
    }else{
        echo 'BAD REQUEST';
    }
?>