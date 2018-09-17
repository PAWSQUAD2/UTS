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
		<div class="container border-radius-5px mar-t-20px pad-b-40px" style="background-color: #0000003b;">
            <?php
				function show_error(){
					echo '<div class="border-radius-5px mar-t-20px p-2" style="background-color: #ff000078;">
                        <p class="color-lightTheme" style="text-align:center; margin:auto auto;">ERROR--WRONG TOKEN!</p>
                        </div>
                        <div class="border-radius-5px mar-t-20px" style="background-color: #0000002b;"></div>
                        <hr>
                        <h3 class="color-lightTheme">WRONG TOKEN!!</h3>
                        <p class="color-lightTheme">Token Anda tidak valid atau kadaluarsa.</p>
                        <p class="color-lightTheme">Klik <a href="daftar.html">Disini</a> untuk kembali ke halaman daftar.</p>
                        <hr>';
				}
                if(isset($_GET['token'])){
					include_once 'koneksi.php';
					$con = konek();
					$token = $_GET['token'];
					$result = $con->query("SELECT * FROM email_verification WHERE token='$token'");
					if(mysqli_num_rows($result)!=0){
						$data = mysqli_fetch_assoc($result);
						
						$email = $data['email'];
						$result = $con->query("UPDATE users SET emailactivated=1 WHERE email='$email'");
						if($result){
							$result = $con->query("DELETE FROM email_verification WHERE email='$email'");
							echo '<div class="border-radius-5px mar-t-20px p-2" style="background-color: #26b72b78;">
							<p class="color-lightTheme" style="text-align:center; margin:auto auto;">Anda telah berhasil mendaftar mohon lakukan aktivasi email atau Anda tidak dapat login.</p>
							</div>
							<div class="border-radius-5px mar-t-20px" style="background-color: #0000002b;"></div>
							<hr>
							<h3 class="color-lightTheme">Selamat : '.$email.' !!</h3>
							<p class="color-lightTheme">Anda telah berhasil melakukan aktivasi email, Anda baru bisa login jika Anda telah diterima oleh admin.</p>
							<p class="color-lightTheme">Klik <a href="daftar.html">Disini</a> untuk kembali ke halaman login.</p>
							<hr>';
						}else{
							show_error();
						}
					}else{
						show_error();
					}
                    
                }else{
                    echo '<div class="border-radius-5px mar-t-20px p-2" style="background-color: #00000078;">
                    <p class="color-lightTheme" style="text-align:center; margin:auto auto;">Masukkan Token Anda</p>
                    </div>
                    <div class="border-radius-5px mar-t-20px" style="background-color: #0000002b;"></div>
					<hr>
					<form action="verify.php" method="get">
					<p class="color-lightTheme">Token Anda: </p>
					<input type="text" placeholder="Token" name="token">
					<input class="full-width" type="submit" value="Verifikasi" name="verifikasi">
					</form>
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
