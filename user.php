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
        $this->birthday = date('Y-m-d', strtotime($_POST['birthDay']));
        $this->facebook = $_POST['facebook'];
        $this->instagram = $_POST['instagram'];
        $this->twitter = $_POST['twitter'];
        $result = mysqli_query($con, "UPDATE users SET name='$this->name', npm='$this->npm', phone = '$this->phone', bornplace='$this->bornPlace', 
        birthday='$this->birthDay', facebook = '$this->facebook', twitter = '$this->twitter', instagram ='$this->instagram' WHERE token = '$this->token'");
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
            
            $foo->timeout = time();
            $_SESSION['user'] = $foo;
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