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
    public $birthday='';
    public $isActivated= false;
    public $timeout;
    public function __construct($token, $name, $email,$jurusan, $npm, $phone, $bornplace, $isActivated, $role, $birthday) {
        $this->token = $token;
        $this->name = $name;
        $this->email = $email;
        $this->prody = $jurusan;
        $this->npm = $npm;
        $this->bornplace = $bornplace;
        $this->phone = $phone;
        $this->timeout = time();
        $this->isActivated = $isActivated;
        $this->role = $role;
        $this->birthday=$birthday;
    }
    public static function login($email, $pass){
        include_once 'koneksi.php';
        $con = konek();
        $query = "SELECT * FROM users WHERE email= '$email' AND password='$pass'";
        $result = $con->query($query);
        if(mysqli_num_rows($result)!=0){
            session_start();
            $user = mysqli_fetch_assoc($result);
            $foo = new User($user['token'], $user['name'], $user['email'], $user['prody'], $user['npm'], $user['phone'], $user['bornplace'], $user['emailactivated'], $user['role'], $user['birthday']);
            
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
            $foo = new User($user['token'], $user['name'], $user['email'], $user['prody'], $user['npm'], $user['phone'], $user['bornplace'], $user['emailactivated'], $user['role'], $user['birthday']);
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