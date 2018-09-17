<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>PROFIL - </title>
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	<link href="css/main-responsive.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="css/footer.css" rel="stylesheet">
    <?php
        include_once 'session.php';
        session_init(true);
    ?>
</head>

<body>
<div class="container-fluid pad-b-40px">
    <nav class="navbar mNav fixed-top navbar-expand-lg navbar-light bg-light"> 
        <a class="logo"><img src="images/emblen.jpg"/></a>
        <a class="navbar-brand" href="index.html">KSR</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><em>&nbsp;</em></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active"> <a class="nav-link no-outline" href="#">Home <span class="sr-only">(current)</span></a> </li>
            <li class="nav-item"> <a class="nav-link no-outline" href="daftar.html">Member</a> </li>
            <li class="nav-item"> <a class="nav-link no-outline" href="tambah-berita.html">Buat Berita</a> </li>
            <li class="nav-item"> <a class="nav-link no-outline color-darkOrange" href="pendaftar.html">Open Registration</a> </li>
            <!-- <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Dropdown </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> <a class="dropdown-item" href="#">Action</a> <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Something else here</a> </div>
            </li> -->
            </ul>
        <div class="pull-right">
            <!-- <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link no-outline" href="#">Home <span class="sr-only">(current)</span></a> </li>
                <li class="nav-item"> <a class="nav-link no-outline" href="about.html">About</a> </li>
            </ul> -->
            <a href="profile.html" style="outline:0;text-decoration: none;">
                <div class="navbar-profile navbar-nav color-lightTheme mr-auto dropdown-toggle">
                    <img class="avatar" src="images/img_avatar.png" alt="avatar"/>
                    <span class="name">Jo Vianto</span>
                </div>
            </a>
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
                                <img src="images/pp.png" alt="pp">
                            </div>
                            <div class="col profile-data" >
                                <?php
                                    include_once 'koneksi.php';
                                    include_once 'user.php';
                                    $user;
                                    if(isset($_GET['uid'])){
                                        $uid = $_GET['uid'];
                                        $user = User::getUser($uid);
                                    }else{
                                        $user = $_SESSION['user'];
                                    }
                                    echo '<div class="speech-icon">Hello</div>
                                <div class="row  mar-t-20px">
                                    <label class="col-md-auto color-darkTheme h1 weight-300">Iam <span class="bold-600">'.$user->name.'</span></label><input type="submit" value="Edit" style="margin-left: 200px" onclick="window.location='."'profile_edit.php'".';"><br>
                                </div>
                                <div class="row">
                                    <label class="col-md-auto color-darkTheme weight-300">As : '.$user->role.'</label><br>
                                </div>
                                <hr style="height:2px;border:none;background-color:rgb(82, 82, 82);">
                                <div class="row">
                                    <label class="col-md-auto color-darkTheme ">E-MAIL</label> <label class="col-md-auto color-secondTheme weight-300">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: '.$user->email.'</label>
                                </div><br>
                                
                                <div class="row" >
                                    <label class="col-md-auto color-darkTheme ">PROGRAM STUDI  </label><label class="col-md-auto color-secondTheme weight-300">: '.$user->prody.'</label>
                                </div><br>
                            
                                 <div class="row" >
                                    <label class="col-md-auto color-darkTheme ">NPM </label><label class="col-md-auto color-secondTheme weight-300">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: '.$user->npm.'</label>
                                </div><br>
                          
                                <div class="row" >
                                    <label class="col-md-auto color-darkTheme ">TELEPON </label><label class="col-md-auto color-secondTheme weight-300">&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;: '.$user->phone.'</label>
                                </div><br>
                           
                                <div class="row" >
                                    <label class="col-md-auto color-darkTheme ">TEMPAT LAHIR</label><label class="col-md-auto color-secondTheme weight-300">&ensp;&ensp;: '.$user->bornplace.'</label>
                                </div><br>
                           
                                <div class="row" >
                                    <label class="col-md-auto color-darkTheme ">TANGGAL LAHIR</label><label class="col-md-auto color-secondTheme weight-300">&ensp;: '.$user->birthday.'</label>
                                </div><br>
                                <hr style="height:2px;border:none;background-color:rgb(82, 82, 82);">';
                                    
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="media-social-container p-x-5 pad-t-60px">
                        <div class="row h-100">
                            <div class="col">
                                <a class="social-media" href="<?php echo 'https://www.facebook.com/'.$user->facebook?>"><i class="fab fa-facebook-f" id="profile"></i></a>
                            </div>
                            <div class="col">
                                <a class="social-media" href="#"><i class="fab fa-twitter" id="profile"></i></a>
                            </div>
                            <div class="col">
                                <a class="social-media" href="#"><i class="fab fa-instagram" id="profile"></i></a>
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
<footer class="footer">

    <div class="container bottom_border">
        <div class="row">
        <div class="col text-center">
            <h5 class="headin5_amrc col_white_amrc pt2">Get in Touch</h5>
            <p><i class="fa fa-location-arrow"></i> Under Construction</p>
            <p><i class="fa fa-phone"></i>  Under Construction</p>
            <p><i class="fa fa fa-envelope"></i> support@website.com</p>
        </div>
        </div>
        </div>

        <div class="row">
            <ul class="social_footer_ul">
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li> 
            <li><a href="#"><i class="fab fa-twitter"></i></a></li> 
            <li><a href="#"><i class="fab fa-google +"></i></a></li>
            <li><a href="#"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
        <!--social_footer_ul ends here-->
    <hr class="split">
    <p class="text-center">Copyright @2018 | privacy policy | disclaimer | site map</p>
</footer>
</html>