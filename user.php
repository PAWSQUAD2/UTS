<?php
class User{
    public $token='';
    public $name='';
    public $email='';
    public $prody='';
    public $npm='';
    public $phone='';
    public $bornplace='';
    public $role= 'anggota baru';
    public $facebook = '';
    public $instagram = '';
    public $twitter = '';
    public $birthday='';
    public $photoUrl = '';
    public $isActivated= false;
    public $timeout;
    public function __construct($token, $name, $email,$jurusan, $npm, $phone, $bornplace, $isActivated, $role, $birthday, $facebook, $twitter, $instagram) {
        $this->token = $token;
        $this->name = $name;
        $this->email = $email;
        $this->prody = $jurusan;
        $this->npm = $npm;
        $this->bornplace = $bornplace;
        $this->phone = $phone;
        $this->instagram = $instagram;
        $this->facebook = $facebook;
        $this->twitter = $twitter;
        $this->timeout = time();
        $this->isActivated = $isActivated;
        $this->role = $role;
        $this->birthday=$birthday;
    }
    public function update(){
        include_once 'koneksi.php';
        $con = konek();
        $this->name = $_POST['name'];
        $this->npm = $_POST['npm'];
        $this->phone = $_POST['phone'];
        $this->bornPlace = $_POST['bornPlace'];
        $this->birthday = date('Y-m-d', strtotime($_POST['birthday']));
        $this->facebook = $_POST['facebook'];
        $this->instagram = $_POST['instagram'];
        $this->twitter = $_POST['twitter'];
        if($this->photoUrl!=null)
        unlink($this->photoUrl);
        
        
        $target_dir = "images/pp/";
        $date = new DateTime();
        $dist = $date->format('Y_m_d_H_i_s');
        $target_file = $target_dir.'_'.$this->name.'_'. $dist.basename($_FILES["file"]["name"]);
        $this->photoUrl = $target_file;
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
        if($uploadOk == 0){
            header("Location: daftar_hasil.php?result=no");
        }
        $this->photoUrl = $target_dir;
        $result = mysqli_query($con, "UPDATE users SET name='$this->name', npm='$this->npm', phone = '$this->phone', bornplace='$this->bornPlace', 
        birthday='$this->birthday', facebook = '$this->facebook', twitter = '$this->twitter', instagram ='$this->instagram', photoUrl = '$target_file' WHERE token = '$this->token'");
        return $result;
    }
    public static function login($email, $pass){
        include_once 'koneksi.php';
        $con = konek();
        $query = "SELECT * FROM users WHERE email= '$email' AND password='$pass'";
        $result = $con->query($query);
        if(mysqli_num_rows($result)!=0){
            session_start();
            $user = mysqli_fetch_assoc($result);
            $foo = new User($user['token'], $user['name'], $user['email'], $user['prody'], $user['npm'], $user['phone'], $user['bornplace'], $user['emailactivated'], $user['role'], $user['birthday'],$user['facebook'], $user['twitter'], $user['instagram']);
            $foo->photoUrl = $user['photoUrl'];
            $foo->timeout = time();
            $_SESSION['user'] = serialize($foo);
            return $foo;
        }else{
            return null;
        }
    }
    public static function getUser($token){
        include_once 'koneksi.php';
        $con = konek();
        $query = "SELECT * FROM users WHERE token= '$token' ";
        $result = $con->query($query);
        if(mysqli_num_rows($result)!=0){
            $user = mysqli_fetch_assoc($result);
            $foo = new User($user['token'], $user['name'], $user['email'], $user['prody'], $user['npm'], $user['phone'], $user['bornplace'], $user['emailactivated'], $user['role'], $user['birthday'],$user['facebook'], $user['twitter'], $user['instagram']);
            $foo->photoUrl = $user['photoUrl'];
            return $foo;
        }else{
            return null;
        }
    }
    public static function delUser($token){
        include_once 'koneksi.php';
        $con = konek();
        $query = "DELETE FROM users WHERE token= '$token' ";
        $result = $con->query($query);
        if($result){
            
        }else{
        }
    }
    public static function accUser($token){
        include_once 'koneksi.php';
        $con = konek();
        $query = "UPDATE users SET role='anggota' WHERE token= '$token' ";
        $result = $con->query($query);
        if($result){
            
        }else{
        }
    }
    public function updateTimeout(){
        $this->timeout = time();
    }
}
    
?>