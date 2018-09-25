<?php
	include_once 'session.php';
	//session_init(1);
	session_start();
	if(isset($_SESSION['user'])){
		header("Location: index.php");
	}else{

	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>REGISTRATION</title>
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
	<link href="css/main-responsive.css?version=20" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link href="css/footer.css?version=20" rel="stylesheet">
	<script src="js/textValidation.js?version=20"></script>
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
		<div class="container register-container border-radius-5px mar-t-20px">
			<fieldset >
				<legend class="form-title">WELCOME <span class="color-secondTheme">FRESHMEN</span></legend>
				<form class="form registration" method="post" action="daftar_action.php">
				<div class="row">
					<div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Full Name</label>
						<input class="placeholder-lightTheme" name="name" type="text" placeholder="Jo Vianto" required onkeyup="inputValidation('name','name','name_er')" id="name" maxlength="30"/>
						<span class="validity"><span id="name_er"></span></span>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Email</label>
						<input class="placeholder-lightTheme" name="email" type="text" required onkeyup="inputValidation('email','email','email_er')" placeholder="example@domain.com" id="email" maxlength="50"/>
						<span class="validity"><span id="email_er"></span></span>
					</div>
				</div>
				<div class="row">
				  <div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Password</label>
						<input class="placeholder-lightTheme" name="pass" type="password" placeholder="Password" required onkeyup="inputValidation('pass','pass','pass_er')" placeholder="example@domain.com" id="pass" maxlength="25" minlength="6"/>
						<span class="validity"><span id="pass_er"></span></span>
					</div>
				</div>
				<div class="row">
				  <div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Verify Password</label>
						<input class="placeholder-lightTheme" type="password" placeholder="Re-Password" required onkeyup="rePassValidation('pass', 'repass', 'rePass_er')" id="repass"/>
						<span class="validity"><span id="rePass_er"></span></span>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Study Program</label>
						<select class="full-width" name="jurusan">
							<option  value="Teknik Informatika">Teknik Informatika</option>
							<option value="Teknik Industri">Teknik Industri</option>
							<option value="TIKI">TIKI</option>
							<option value="Sistem Informasi">Sistem Informasi</option>
						</select>
					</div>
				</div>
				<div class="row">
				  <div class="col-xl-12">
					<label class="color-lightTheme"><span class="color-red">*</span> NPM</label>
						<input class="placeholder-lightTheme" name="npm" type="tel" placeholder="123456789" required onkeyup="inputValidation('npm', 'npm', 'npm_er')" id="npm" maxlength="9"/>
						<span class="validity"><span id="npm_er"></span></span>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Phone</label>
						<input class="placeholder-lightTheme" name="phone" type="text" placeholder="00123" required onkeyup="inputValidation('number', 'phone', 'phone_er')" id="phone"/>
						<span class="validity"><span id="phone_er"></span></span>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<label class="color-lightTheme"><span class="color-red">*</span> Born Place</label><span class="validity"></span>
						<input class="placeholder-lightTheme" name="bornPlace" type="text" placeholder="Yogyakarta"/>
					</div>
				</div>
					<div class="row">
					<div class="col-xl-12">
					  <label class="color-lightTheme"><span class="color-red">*</span> Birth Day</label><span class="validity"></span>
						<input class="placeholder-lightTheme" name="birthDay" type="date" id="datePicker"/>
						<input class="full-width" type="submit" value="Register" name="register"/>
					</div>
				</div>
		  	</form>
			</fieldset>				
	  	</div>
		<div class="container login-container border-radius-5px mar-t-20px">
			<fieldset >
				<legend class="form-title">SIGNIN DASHBOARD <span class="color-secondTheme">KSR</span></legend>
				<iframe name="hidden-frame" width="0" height="0" border="0" style="display: none;"></iframe>
				<form class="form" method="post" action="auth.php" target="hidden-frame">
					<div class="row">
						<div class="col-xl-12">
							<label class="color-lightTheme"><span class="color-red">*</span> Email</label><span class="validity"></span>
							<input class="placeholder-lightTheme" name="email" type="text" placeholder="example@domain.com" required/>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<label class="color-lightTheme"><span class="color-red">*</span> Password</label><span class="validity"></span>
							<input class="placeholder-lightTheme" name="pass" type="password" placeholder="********" required/>
							<a href="#" style="margin-bottom:5px; margin-top:5">Lupa Password?</a>
						</div>
					</div>
					<div class="row fail-login">
						<div class="col-xl-12" >
							<p class="align-center color-lightTheme" id="fail-login">Gagal Masuk! Email/Password Anda Salah.</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-12">
							<input class="full-width bg-color-darkorange" type="submit" value="Login" name="login"/>
						</div>
					</div>
				</form>
			</fieldset>				
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
<?php
	if(isset($_GET['expired'])){
		echo '<script>setFailLogin("fail-login","Session Key Anda Kadaluarsa.")</script>';
	}
?>
</html>
