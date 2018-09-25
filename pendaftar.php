<?php
    include_once 'session.php';
    session_init(1);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>List Pendaftar Anggota KSR</title>
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
    <link href="css/main-responsive.css?version=20" rel="stylesheet">
    <link href="css/tambah-berita.css?version=20" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/TB.css">
    <link rel="shortcut icon" href="images/icon1.ico">
    
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
                    <div class="profile-header-container p-x-5 pad-t-60px editor-container">
                        <div class="emblem">
                            <div class="logo"><img src="images/emblen.jpg"/></div>
                            <h3 class="caption color-darkTheme">Kelompok Studi Robotik</h3>
                        </div>
                        <h3 class="color-darkTheme">>> Calon-Calon Anggota KSR</h3>
                        <hr>
                        <iframe name="hidden-frame" width="0" height="0" border="0" style="display: none;"></iframe>
                        <table>
                            <tr >
                                <th >No.</strong></th>
                                <th >Nama</th>
                                <th >Fakultas</th>
                                <th >Program Studi</th>
                                <th >NIM</th>
                                <th >Email</th>
                                <th >Accept / Reject</th>
                            </tr>
                            <?php
                                include_once 'koneksi.php';
                                $con=konek();
                                $query = "SELECT * FROM users WHERE role='anggota baru' ORDER BY name";
                                $result = mysqli_query($con, $query);
                                if(unserialize($_SESSION['user'])->role!='admin'){
                                    echo    '<tr>
                                                <td colspan="7">Anda tidak punya hak untuk mengakses data ini.</td>
                                            </tr>';
                                }else if(mysqli_num_rows($result)==0){
                                    echo    '<tr>
                                                <td colspan="7">Tidak Ada Pendaftar.</td>
                                            </tr>';
                                }else{
                                    $no = 1;
                                    
                                    while($data = mysqli_fetch_assoc($result)){
                                        echo '
                                            <tr>
                                                <td >'.$no.'</td>
                                                <td ><a href="profile.php?uid='.$data['token'].'">'.$data['name'].'</a></td>
                                                <td>FTI</td>
                                                <td>'.$data['prody'].'</td>
                                                <td>'.$data['npm'].'</td>
                                                <td>'.$data['email'].'</td>
                                                <td>
                                                    <div class="centralize">
                                                        <form action="pendaftar_action.php" method="post" target="hidden-frame">
                                                            <input type="hidden" name="Userid" value="'.$data['token'].'">
                                                            <button type= "submit" class="btn-acc" name="acc" onclick="'."return confirm('Anda Yakin Menerima --> ".$data['name']."?')".'"> Accept </button>
                                                            <button type= "submit" class="btn-rej" name="rej" onclick="'."return confirm('Anda Yakin Menolak --> ".$data['name']."?')".'"> Reject </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        ';
                                        $no++;
                                    }
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.2.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.0.0.js"></script>

</html>