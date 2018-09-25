<?php
    include_once 'session.php';
    session_init(true);
    $user = unserialize($_SESSION['user']);
    
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title id="title">PROFIL - </title>
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	<link href="css/main-responsive.css?version=20" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="css/footer.css?version=20" rel="stylesheet">
    <script src="js/textValidation.js"></script>
    <link rel="shortcut icon" href="images/icon1.ico">
    <script src="js/editor.js"></script>
    <?php echo '<script>document.getElementById("title").innerHTML +="'.unserialize($_SESSION['user'])->name.'";</script>';?>

</head>

<body>
<div class="container-fluid pad-b-40px">
    <nav class="navbar mNav fixed-top navbar-expand-lg navbar-light bg-light"> 
        <a class="logo"><img src="images/emblen.jpg"/></a>
        <a class="navbar-brand" href="index.php">KSR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><em>&nbsp;</em></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active"> <a class="nav-link no-outline fa fa-home" href="index.php"> Home <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item"> <a class="nav-link no-outline fa fa-users" href="member.php"> Member</a> </li>
            <li class="nav-item"> <a class="nav-link no-outline fa fa-newspaper" href="berita.php"> Berita</a> </li>
            <li class="nav-item"> <a class="nav-link no-outline color-darkOrange fa fa-user-plus" href="pendaftar.php"> Open Registration</a> </li>
          </ul>
          <div class="pull-right">
              <!-- <ul class="navbar-nav mr-auto">
                  <li class="nav-item active"> <a class="nav-link no-outline" href="#">Home <span class="sr-only">(current)</span></a> </li>
                  <li class="nav-item"> <a class="nav-link no-outline" href="about.html">About</a> </li>
              </ul> -->
              
              <?php
              if(isset($_SESSION['user'])){
                $user = unserialize($_SESSION['user']);
                echo '<li class="nav-item dropdown" style="margin:0; padding:0;"><a style="margin:0; padding: 0;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                              <div class="navbar-profile navbar-nav color-lightTheme mr-auto" style="display:inline;">
                                                <img class="avatar" src="'.($user->photoUrl? $user->photoUrl : "images/pp.png").'" alt="avatar"/>
                                                <span class="name">'.$user->name.'</span>
                                              </div> 
                                            </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1" > 
                  <a class="dropdown-item color-darkTheme fa fa-user" href="profile.php">  Beranda</a> 
                  <a class="dropdown-item color-darkTheme fa fa-wrench" href="profile_edit.php">  Edit Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item color-darkTheme fa fa-newspaper" href="tambah-berita.php">  Olah Berita</a>
                  <div class="dropdown-divider"></div>';
                if($user->role==="admin")
                echo '<a class="dropdown-item color-darkTheme fa fa-lock"  href="ksr-admin.php">  Panel Admin</a>
                  <div class="dropdown-divider"></div>';
                echo '<a class="dropdown-item color-darkTheme fa fa-power-off" href="logout.php">  Keluar</a>
                   
                </div>
              </li>';
              }else{
                echo '<a href="daftar.php" style="outline:0;text-decoration: none;">
                  <div class="navbar-profile navbar-nav color-lightTheme mr-auto">
                      <span class="name">Masuk/Daftar</span>
                  </div>
              </a>';
              }
              ?>
          </div>
        </div>
    </nav>
    <div class="row p-x-10 pad-t-60px">
        <div class="container profile-container mar-t-20px">
            <div class="absolute-ppbg" style="overflow:hidden;">
                <img class="sampul" src="images/sampul.jpg" alt="pp">
            </div>
            <div class="row">
                <div class="col-xl-12 no-padding">
                    <div class="profile-header-container p-x-5 pad-t-60px">
                        <div class="row pad-b-40px">
                            <div class="col-md-auto photo-profile mb-5" >
                                <img src="<?php echo $user->photoUrl==null?'images/pp.png':$user->photoUrl;?>" alt="pp" id="img-preview">
                                <div style="margin : auto; width:100px; margin-top:-100px;">
                                    <input type="button" value="Browse..." onclick="document.getElementById('selectedFile').click();" style="width:100%;margin-top:30px;"/>
                                </div>
                            </div>
                            <div class="col profile-data" >
                                <form method="post" action="profile_edit_action.php" enctype="multipart/form-data">
                                <input required type="file" name="file" class="full-width mt-4" accept="image/gif, image/jpg, image/jpeg, image/png" style="display: none;" id="selectedFile" onchange="readURL(this);">
                                <?php
                                    include_once 'koneksi.php';
                                    include_once 'user.php';
                                    
                                    // if(isset($_GET['uid'])){
                                    //     $uid = $_GET['uid'];
                                    //     $user = User::getUser($uid);
                                    // }else{
                                        
                                    // }
                                    // if($user==null){
                                    //     echo'';
                                    //     exit();
                                    // }
                                    echo '<div class="speech-icon">Hello</div>
                                <div class="row  mar-t-20px">
                                    <label class="col-md-auto color-darkTheme h1 weight-300 no-block"style="width:200px;">I am </label><input type="text" name="name" class="col-md-auto bold-600 color-darkTheme no-block" value="'.$user->name.'" style="width:300px; margin:auto 15px; font-weight:600" required onkeyup="inputValidation('."'name'".', '."'name'".', '."'name_er'".')" id="name" maxlength="30">
                                    <span class="col-md-auto validity" style="margin:auto 0;"></span>
                                </div>
                                <div class="row">
                                    <label class="col-md-auto color-darkTheme weight-300">As : '.$user->role.'</label><br>
                                </div>
                                <hr style="height:2px;border:none;background-color:rgb(82, 82, 82);">
                                <div class="row">
                                    <label class="col-md-auto color-darkTheme " style="width:200px;">E-MAIL</label><input type="text" class="col-md-auto bold-600 color-darkTheme no-block" value="'.$user->email.'" style="width:300px; margin:auto 15px; font-weight:600" readonly>
                                </div><br>
                                
                                <div class="row" >
                                    <label class="col-md-auto color-darkTheme " style="width:200px;">PROGRAM STUDI  </label><input type="text" class="col-md-auto bold-600 color-darkTheme no-block" value="'.$user->prody.'" style="width:300px; margin:auto 15px; font-weight:600" readonly>
                                </div><br>
                            
                                 <div class="row" >
                                    <label class="col-md-auto color-darkTheme " style="width:200px;">NPM </label><input type="text" name="npm" class="col-md-auto bold-600 color-darkTheme no-block" value="'.$user->npm.'" style="width:300px; margin:auto 15px; font-weight:600" required onkeyup="inputValidation('."'npm'".', '."'npm'".', '."'npm_er'".')" id="npm">
                                    <span class="col-md-auto validity"></span>
                                </div><br>
                          
                                <div class="row" >
                                    <label class="col-md-auto color-darkTheme " style="width:200px;">TELEPON </label><input type="text" name="phone" class="col-md-auto bold-600 color-darkTheme no-block" value="'.$user->phone.'" style="width:300px; margin:auto 15px; font-weight:600" required onkeyup="inputValidation('."'number'".', '."'phone'".', '."'phone_er'".')" id="phone">
                                    <span class="col-md-auto validity"></span>
                                </div><br>
                           
                                <div class="row" >
                                    <label class="col-md-auto color-darkTheme " style="width:200px;">TEMPAT LAHIR</label><input type="text" name="bornPlace" class="col-md-auto bold-600 color-darkTheme no-block" value="'.$user->bornplace.'" style="width:300px; margin:auto 15px; font-weight:600" required>
                                    <span class="col-md-auto validity"></span>  
                                </div><br>
                           
                                <div class="row" >
                                    <label class="col-md-auto color-darkTheme " style="width:200px;">TANGGAL LAHIR</label><input type="date" name="birthday" class="col-md-auto bold-600 color-darkTheme no-block" value="'.$user->birthday.'" style="width:300px; margin:auto 15px; font-weight:600" required>
                                    <span class="col-md-auto validity"></span>
                                </div><br>
                                <hr style="height:2px;border:none;background-color:rgb(82, 82, 82);">
                                <div class="row" >
                                    <label class="col-md-auto color-darkTheme " style="width:200px;">Facebook</label><input type="text" name="facebook" class="col-md-auto bold-600 color-darkTheme no-block" value="'.$user->facebook.'" style="width:300px; margin:auto 15px; font-weight:600">
                                </div><br>
                                <div class="row" >
                                    <label class="col-md-auto color-darkTheme " style="width:200px;">Twitter</label><input type="text" name="twitter" class="col-md-auto bold-600 color-darkTheme no-block" value="'.$user->twitter.'" style="width:300px; margin:auto 15px; font-weight:600">
                                </div><br>
                                <div class="row" >
                                    <label class="col-md-auto color-darkTheme " style="width:200px;">Instagram</label><input type="text" name="instagram" class="col-md-auto bold-600 color-darkTheme no-block" value="'.$user->instagram.'" style="width:300px; margin:auto 15px; font-weight:600">
                                </div><br>
                                <hr style="height:2px;border:none;background-color:rgb(82, 82, 82);">
                                <input type="submit" class="full-width" value="Simpan Data" name="simpan">';
                                
                                ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="media-social-container p-x-5 pad-t-60px">
                        <div class="row h-100">
                            <div class="col">
                                <a class="social-media" href="<?php echo 'https://www.facebook.com/'.$user->facebook?>"><i class="fab fa-facebook-f" id="profile"></i></a>
                            </div>
                            <div class="col">
                                <a class="social-media" href="<?php echo 'https://www.twitter.com/'.$user->twitter?>"><i class="fab fa-twitter" id="profile"></i></a>
                            </div>
                            <div class="col">
                                <a class="social-media" href="<?php echo 'https://www.instagram.com/'.$user->instagram?>"><i class="fab fa-instagram" id="profile"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.2.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.0.0.js"></script>
</body>
<!--Footer Here-->
<footer class="footer" >
    <?php
    include_once 'koneksi.php';
    $con = konek();
    $result = $con->query("SELECT * FROM setting");
    $data = mysqli_fetch_assoc($result);
    ?>
    <div class="container bottom_border">
        <div class="row">
        <div class="col text-center">
            <h5 class="headin5_amrc col_white_amrc pt2">Get in Touch</h5>
            <p><i class="fa fa-location-arrow"></i> <?php echo $data['alamat'];?></p>
            <p><i class="fa fa-phone"></i>  <?php echo $data['phone'];?></p>
            <p><i class="fa fa fa-envelope"></i> <?php echo $data['email'];?></p>
        </div>
        </div>
        </div>

        <div class="row">
            <ul class="social_footer_ul">
            <li><a href="<?php echo $data['facebook']?>"><i class="fab fa-facebook-f"></i></a></li> 
            <li><a href="<?php echo $data['googleplus']?>"><i class="fab fa-google +"></i></a></li>
            <li><a href="<?php echo $data['instagram']?>"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <!--social_footer_ul ends here-->
    <hr class="split">
    <p class="text-center">Copyright @2018 | privacy policy | disclaimer | site map</p>
</footer>
</html>