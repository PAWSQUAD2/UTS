<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGISTRATION</title>
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	<link href="css/main-responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link href="css/footer.css" rel="stylesheet">
	<script src="js/textValidation.js"></script>
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
						$user = $_SESSION['user'];
						echo '<li class="nav-item dropdown" style="margin:0; padding:0;"><a style="margin:0; padding: 0;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																					<div class="navbar-profile navbar-nav color-lightTheme mr-auto" style="display:inline;">
																						<img class="avatar" src="images/img_avatar.png" alt="avatar"/>
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
		<div class="container border-radius-5px mar-t-20px pad-b-40px" style="background-color: #0000003b;">
            <?php
                if(isset($_GET['result'])){
                    if($_GET['result']==="ok"){
                        echo '<div class="border-radius-5px mar-t-20px p-2" style="background-color: #26b72b78;">
                        <p class="color-lightTheme" style="text-align:center; margin:auto auto;">Anda telah berhasil mendaftar mohon lakukan aktivasi email atau Anda tidak dapat login.</p>
                        </div>
                        <div class="border-radius-5px mar-t-20px" style="background-color: #0000002b;"></div>
                        <hr>
                        <h3 class="color-lightTheme">Sukses Mendaftar !!</h3>
                        <p class="color-lightTheme">Anda telah berhasil mendaftar mohon lakukan aktivasi email atau Anda tidak dapat login.</p>
                        <p class="color-lightTheme">Klik <a href="daftar.php">Disini</a> untuk kembali ke halaman login.</p>
                        <hr>';
                        
                    }else if($_GET['result']==="no"){
                        echo '<div class="border-radius-5px mar-t-20px p-2" style="background-color: #ff000078;">
                        <p class="color-lightTheme" style="text-align:center; margin:auto auto;">Anda tidak berhasil mendaftar mohon lakukan pendaftaran ulang!</p>
                        </div>
                        <div class="border-radius-5px mar-t-20px" style="background-color: #0000002b;"></div>
                        <hr>
                        <h3 class="color-lightTheme">Gagal Mendaftar !!</h3>
                        <p class="color-lightTheme">Anda tidak berhasil mendaftar mohon lakukan pendaftaran ulang! atau coba hubungi administrator website.</p>
                        <p class="color-lightTheme">Klik <a href="daftar.php">Disini</a> untuk kembali ke halaman daftar.</p>
                        <hr>';
                    }else if($_GET['result']==="email_taken"){
                        echo '<div class="border-radius-5px mar-t-20px p-2" style="background-color: #ff000078;">
                        <p class="color-lightTheme" style="text-align:center; margin:auto auto;">Anda tidak berhasil mendaftar mohon lakukan pendaftaran ulang!</p>
                        </div>
                        <div class="border-radius-5px mar-t-20px" style="background-color: #0000002b;"></div>
                        <hr>
                        <h3 class="color-lightTheme">Email Telah Terdaftar !!</h3>
                        <p class="color-lightTheme">Anda tidak berhasil mendaftar mohon lakukan pendaftaran ulang dengan email yang berbeda! atau coba hubungi administrator website.</p>
                        <p class="color-lightTheme">Klik <a href="daftar.phpl">Disini</a> untuk kembali ke halaman daftar.</p>
                        <hr>';
                    }else{
                        echo '<div class="border-radius-5px mar-t-20px p-2" style="background-color: #ff000078;">
                        <p class="color-lightTheme" style="text-align:center; margin:auto auto;">ERROR--BAD REQUEST!</p>
                        </div>
                        <div class="border-radius-5px mar-t-20px" style="background-color: #0000002b;"></div>
                        <hr>
                        <h3 class="color-lightTheme">BAD REQUEST !!</h3>
                        <p class="color-lightTheme">ERROR BAD REQUEST VALUE</p>
                        <p class="color-lightTheme">Klik <a href="daftar.php">Disini</a> untuk kembali ke halaman daftar.</p>
                        <hr>';
                    }
                }else{
                    echo '<div class="border-radius-5px mar-t-20px p-2" style="background-color: #ff000078;">
                    <p class="color-lightTheme" style="text-align:center; margin:auto auto;">ERROR--BAD REQUEST!</p>
                    </div>
                    <div class="border-radius-5px mar-t-20px" style="background-color: #0000002b;"></div>
                    <hr>
                    <h3 class="color-lightTheme">BAD REQUEST !!</h3>
                    <p class="color-lightTheme">ERROR BAD REQUEST VALUE</p>
                    <p class="color-lightTheme">Klik <a href="daftar.php">Disini</a> untuk kembali ke halaman daftar.</p>
                    <hr>';
                }
            ?>
	 	</div>
	</div>
	
</div>
<!-- DEFAULT UI SUPPORT USING JS -->
<script>
		document.getElementById('datePicker').valueAsDate = new Date();
	</script>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
	<script src="js/jquery-3.2.1.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/popper.min.js"></script> 
	<script src="js/bootstrap-4.0.0.js"></script>
</body>
<!--Footer Here-->
<footer class="footer" id="footer">
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
