<?php
    include_once 'session.php';
    session_init(true);
    $user = unserialize($_SESSION['user']);
    
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title id="title">Admin KSR</title>
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	<link href="css/main-responsive.css?version=20" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="css/footer.css?version=20" rel="stylesheet">
    <link href="css/gradient.css?version=20" rel="stylesheet">
    <link href="css/ksr-admin.css?version=20" rel="stylesheet">
    <script src="js/textValidation.js"></script>
    <link rel="shortcut icon" href="images/icon1.ico">
    <script src="js/editor.js"></script>

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
                            <div class="col profile-data" >
                            <h4>Overview</h4>
                            <hr>
                            <div class="row">
                                <?php include_once 'koneksi.php'; $con = konek();
                                $users = $con->query("SELECT * FROM users WHERE role != 'anggota baru'");
                                $posts = $con->query("SELECT * FROM berita"); 
                                $registrar = $con->query("SELECT * FROM users WHERE role = 'anggota baru'");?>

                                <a href="member.php" class="no-hover">
                                    <div class="col-auto">
                                        <div class="card color-block purple-blue">
                                            <i class="fa fa-users color-lightTheme"  style="font-size:40px;"> <?php echo mysqli_num_rows($users)?></i>
                                            <i class="color-lightTheme">Member</i>
                                        </div>
                                    </div>
                                </a>
                                <a href="berita.php" class="no-hover">
                                    <div class="col-auto">
                                        <div class="card color-block yellow-green">
                                            <i class="fa fa-newspaper color-lightTheme"  style="font-size:40px;"> <?php echo mysqli_num_rows($posts)?></i>
                                            <i class="color-lightTheme">Berita</i>
                                        </div>
                                    </div>
                                </a>
                                
                                <a href="pendaftar.php" class="no-hover">
                                    <div class="col-auto">
                                        <div class="card color-block yellow-orange">
                                            <i class="fa fa-newspaper color-lightTheme"  style="font-size:40px;"> <?php echo mysqli_num_rows($registrar)?></i>
                                            <i class="color-lightTheme">Registrar</i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <hr>
                            <form method="post" action="ksr-admin_action.php" enctype="multipart/form-data">
                                <div class="row">
                                    <?php $setting = $con->query("SELECT * FROM setting");
                                    $setting = mysqli_fetch_assoc($setting);?>
                                    <div class="col-auto p-4">
                                        <div class="card shadow setting-card p-4">
                                            <h4>Pengaturan</h4>
                                            <hr>
                                            <div class="row">
                                                <label class="col-md-auto color-darkTheme no-block" style="width:200px;">Timeout(s) :</label>
                                                <input type="text" name="timeout" class="col-md-auto bold-600 color-darkTheme no-block" value="<?php echo $setting['timeout_sec']?>" style="width:300px; margin:auto 15px; font-weight:600" required id="npm">
                                            </div>

                                            <div class="row" style="margin-top:10px;">
                                                <label class="col-md-auto color-darkTheme no-block" style="width:200px;">Phone :</label>
                                                <input type="text" name="phone" class="col-md-auto bold-600 color-darkTheme no-block" value="<?php echo $setting['phone']?>" style="width:300px; margin:auto 15px; font-weight:600" required id="npm">
                                            </div>
                                            <div class="row" style="margin-top:10px;">
                                                <label class="col-md-auto color-darkTheme no-block" style="width:200px;">Email :</label>
                                                <input type="text" name="email" class="col-md-auto bold-600 color-darkTheme no-block" value="<?php echo $setting['email']?>" style="width:300px; margin:auto 15px; font-weight:600" required id="npm">
                                            </div>
                                            <div class="row" style="margin-top:10px;">
                                                <label class="col-md-auto color-darkTheme no-block" style="width:200px;">Facebook :</label>
                                                <input type="text" name="facebook" class="col-md-auto bold-600 color-darkTheme no-block" value="<?php echo $setting['facebook']?>" style="width:300px; margin:auto 15px; font-weight:600" required id="npm">
                                            </div>
                                            <div class="row" style="margin-top:10px;">
                                                <label class="col-md-auto color-darkTheme no-block" style="width:200px;">Instagram :</label>
                                                <input type="text" name="instagram" class="col-md-auto bold-600 color-darkTheme no-block" value="<?php echo $setting['instagram']?>" style="width:300px; margin:auto 15px; font-weight:600" required id="npm">
                                            </div>
                                            <div class="row" style="margin-top:10px;">
                                                <label class="col-md-auto color-darkTheme no-block" style="width:200px;">Google Plus :</label>
                                                <input type="text" name="gplus" class="col-md-auto bold-600 color-darkTheme no-block" value="<?php echo $setting['googleplus']?>" style="width:300px; margin:auto 15px; font-weight:600" required id="npm">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto p-4" style="margin:0 auto;">
                                        <div class="card shadow setting-card p-4">
                                            <h4>Pengaturan Konten</h4>
                                            <hr>
                                            <div class="row">
                                                <label class="col-md-auto color-darkTheme no-block" style="width:200px;">Total berita :</label>
                                                <input type="text" name="total_berita" class="col-md-auto bold-600 color-darkTheme no-block" value="<?php echo $setting['total_berita']?>" style="width:300px; margin:auto 15px; font-weight:600" required id="npm">
                                            </div>
                                            <div class="row" style="margin-top:10px;">
                                                <label class="col-md-auto color-darkTheme no-block" style="width:200px;">Visi :</label>
                                                <textarea type="text" name="visi" class="col-md-auto bold-600 color-darkTheme no-block" style="width:300px; margin:auto 15px; font-weight:600" required id="npm"><?php echo $setting['visi']?></textarea>
                                            </div>
                                            <div class="row" style="margin-top:10px;">
                                                <label class="col-md-auto color-darkTheme no-block" style="width:200px;">Misi :</label>
                                                <textarea type="text" name="misi" class="col-md-auto bold-600 color-darkTheme no-block" style="width:300px; margin:auto 15px; font-weight:600" required id="npm"><?php echo $setting['misi']?></textarea>
                                            </div>
                                            <div class="row" style="margin-top:10px;">
                                                <label class="col-md-auto color-darkTheme no-block" style="width:200px;">Alamat :</label>
                                                <textarea type="text" name="alamat" class="col-md-auto bold-600 color-darkTheme no-block" style="width:300px; margin:auto 15px; font-weight:600" required id="npm"><?php echo $setting['alamat']?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <input type="submit" name="save_as" value="Simpan" style="width:200px; margin:0 auto;">
                                    <input type="submit" name="pdf" value="Download PDF" style="width:200px; margin:0 auto;">
                                </div>
                            </form>
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