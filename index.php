<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DASHBOARD KSR</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
    <link href="css/main-responsive.css" rel="stylesheet">
    <link href="css/tambah-berita.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/footer.css">
    <link rel="stylesheet" type="text/css" href="css/TB.css">
    <link href="css/index.css" type="text/css" rel="stylesheet">
    <?php
    include_once 'user.php';
    session_start();
    if(isset($_SESSION['user'])){
      $_SESSION['user']->updateTimeout();
    }else{

    }
    
    ?>
  </head>
  <body style="padding-top: 65px">
  	<!-- body code goes here -->
  <div class="container-fluid">
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
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1"> 
                  <a class="dropdown-item color-darkTheme" href="profile.php">Beranda</a> 
                  <a class="dropdown-item color-darkTheme" href="#">--</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item color-darkTheme" href="logout.php">Keluar</a> 
                </div>
              </li>';
              }else{
                echo '<a href="daftar.html" style="outline:0;text-decoration: none;">
                  <div class="navbar-profile navbar-nav color-lightTheme mr-auto">
                      <span class="name">Masuk/Daftar</span>
                  </div>
              </a>';
              }
              ?>
          </div>
        </div>
      </nav>
    <div class="row top ">
	    <div id="myCarousel" class="carousel slide" data-ride="carousel" style="background-color: grey">
		    <ol class="carousel-indicators">
		      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		      <li data-target="#myCarousel" data-slide-to="1"></li>
		      <li data-target="#myCarousel" data-slide-to="2"></li>
	      </ol>
		    <div class="carousel-inner" role="listbox">
		      <div class="carousel-item active"> <img class="d-block mx-auto" src="images/img01.jpg" alt="First slide">
		        <div class="carousel-caption">
		          <h5>Project</h5>
		          <p>Kreativitas membuat sebuah robot</p>
	            </div>
	          </div>
		      <div class="carousel-item"> <img class="d-block mx-auto" src="images/img02.jpg" alt="Second slide">
		        <div class="carousel-caption">
		          <h5>Wisudawan Fosil</h5>
		          <p>Menghadiri acara wisudawan para fosil</p>
	            </div>
	          </div>
		      <div class="carousel-item"> <img class="d-block mx-auto" src="images/img03.jpg" alt="Third slide">
		        <div class="carousel-caption">
		          <h5>TEA PARTY</h5>
		          <p>Acara Perpisahaan & Ulang Tahun para fosil</p>
	            </div>
	          </div>
	      </div>
	      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
      </div>
    </div>
    <!-- Page content 1 -->
    <div class="row p-x-10" style="background-color: white;padding-top: 40px;padding-bottom: 40px">
      <div class="container-fluid pad25B row">
        <div class="col-md-4 pad25B my-auto">
                <div class="card-view">
                  <div class="icon-card-view"></div>
                  <h3 class="heder-card-view">Mechanic</h3>
                  <p class="content-card-view">Mechanic merupakan bentuk badan dari robot dan mekanisme kerjanya, sehingga kurikulum yang kami ajarkan tentang bagaimana membuat bentuk dan proses kerjanya. </p>
                </div>
        </div>

        <div class="col-md-4 pad25B my-auto">
              <div class="card-view">
                <div class="icon2-card-view"></div>
                <h3 class="heder-card-view">Electronic</h3>
                <p class="content-card-view">Electronic merupakan isi dari robot, mulai dari sensor hingga penggerak, dari baterai hingga tampilan display yang semuanya akan diatur oleh komputer.  </p>
              </div>
        </div>

        <div class="col-md-4 pad25B my-auto">
            <div class="card-view">
              <div class="icon3-card-view"></div>
              <h3 class="heder-card-view">COMPUTER</h3>
              <p class="content-card-view">Seluruh proses dalam robot diatur dalam computer, sehingga untuk dapat membuat robot bergerak sesuai kebutuhan akan diperlukan kemampuan pemrograman.  </p>
            </div>
        </div>
        </div>					
    </div>
    <!-- Page content -->
    <div class="row body" style="max-height:1250px; background-color: rgb(64, 67, 68); overflow: hidden;">
      <!-- Page content 2-->
      <div class=" col-xl-12" >
          <!-- Project Section -->
        <div class="al-panel al-padding-32" id="projects">
          <h3 class="al-padding-bootom al-border-light-grey al-padding-16 color-lightTheme">Trending</h3>
        </div>
      
        <div class="al-row-padding">
          <div class="al-col al al-m al-margin-bottom">
            <div class="al-display-container">
              <div class="al-display-topleft al-black al-padding">Drone</div>
              <img src="images/Carousel_Placeholder.png" alt="drone" style="width:100%; max-width:300px;">
              <p class="al-caption color-lightTheme">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquet risus quis quam volutpat, nec condimentum metus faucibus. Maecenas tempor hendrerit metus quis interdum. Donec id tortor vulputate, fermentum magna vitae, rhoncus nunc. Maecenas tempus arcu imperdiet, mollis metus in, eleifend augue. Nunc lacus metus, pretium id lobortis vitae, imperdiet in est. Nunc tempor, nulla vitae bibendum elementum, nisi ex pellentesque arcu, sed consectetur sem mauris ac tellus. Ut tincidunt vestibulum tincidunt. </p>
            </div>
          </div>
          <div class="al-col al al-m al-margin-bottom">
            <div class="al-display-container">
              <div class="al-display-topleft al-black al-padding">Computer</div>
              <img src="images/Carousel_Placeholder.png" alt="computer" style="width:100% ;max-width:300px">
              <div class="al-caption color-lightTheme">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquet risus quis quam volutpat, nec condimentum metus faucibus. Maecenas tempor hendrerit metus quis interdum. Donec id tortor vulputate, fermentum magna vitae, rhoncus nunc. Maecenas tempus arcu imperdiet, mollis metus in, eleifend augue. Nunc lacus metus, pretium id lobortis vitae, imperdiet in est. Nunc tempor, nulla vitae bibendum elementum, nisi ex pellentesque arcu, sed consectetur sem mauris ac tellus. Ut tincidunt vestibulum tincidunt. </div>

            </div>
          </div>
          <div class="al-col al al-m al-margin-bottom">
            <div class="al-display-container">
              <div class="al-display-topleft al-black al-padding">Drone</div>
              <img src="images/Carousel_Placeholder.png" alt="drone" style="width:100%; max-width:300px">
              <div class="al-caption color-lightTheme">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquet risus quis quam volutpat, nec condimentum metus faucibus. Maecenas tempor hendrerit metus quis interdum. Donec id tortor vulputate, fermentum magna vitae, rhoncus nunc. Maecenas tempus arcu imperdiet, mollis metus in, eleifend augue. Nunc lacus metus, pretium id lobortis vitae, imperdiet in est. Nunc tempor, nulla vitae bibendum elementum, nisi ex pellentesque arcu, sed consectetur sem mauris ac tellus. Ut tincidunt vestibulum tincidunt. </div>

            </div>
          </div>
          <div class="al-col al al-m al-margin-bottom">
            <div class="al-display-container">
              <div class="al-display-topleft al-black al-padding">Drone</div>
              <img src="images/Carousel_Placeholder.png" alt="drone" style="width:100%; max-width:300px">
              <div class="al-caption color-lightTheme ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquet risus quis quam volutpat, nec condimentum metus faucibus. Maecenas tempor hendrerit metus quis interdum. Donec id tortor vulputate, fermentum magna vitae, rhoncus nunc. Maecenas tempus arcu imperdiet, mollis metus in, eleifend augue. Nunc lacus metus, pretium id lobortis vitae, imperdiet in est. Nunc tempor, nulla vitae bibendum elementum, nisi ex pellentesque arcu, sed consectetur sem mauris ac tellus. Ut tincidunt vestibulum tincidunt. </div>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row body" style="max-height: 1200px;  background-color: white;overflow: hidden;">
      <div class="ald-row ald-padding-64" id="about">
          <div class="ald-col m6 ald-padding-large">
          <img src="images/Carousel_Placeholder.png" class="ald-round ald-image ald-opacity-min" alt="Table Setting" width="600" height="750">
          </div>
      
          <div class="ald-col m6 ald-padding-large">
            <h1 class="ald-center">Mutant: Mechatron - Rise of the Robots Roleplaying</h1><br>
            <h5 class="ald-center">--Fria Ligan--</h5>
            <p class="ald-large">The machines awake in this postapocalyptic RPG in the vein of Asimov and Westworld, set in the universe of acclaimed Mutant: Year Zero.</p>
            <p class="ald-large ald-text-grey ald-hide-medium">In the huge underwater Mechatron-7 facility, armies of machines toil away in decaying factories. When the war raged the humans fled, leaving their robotic servants with one simple command: continue the production until we return. That was decades ago. Now, something is changing. Robots in Mechatron-7 are starting to malfunction. To rebel. To express a will of their own. To Awake. It's time for the machines to make their mark on the dawnworld.</p>
          </div>
        </div>
      </div>
      
    <div class="row grid" style="opacity:.7; overflow: hidden;">
      <div class="about-container" style="height:500px;opacity:50%;">
        <div class="col "style="opacity:50%">
          <div class="emblem clear-margin">
            <div class="logo"><img src="images/emblen.jpg"/></div>
            <h3 class="caption color-darkTheme clear-margin">About Us</h3>
          </div>
          <div class="tentang-ksr-data clear-margin">
              <div class="row">
                  <div class="col visi"  style="color: white;">
                      <h2 style="text-align: center; font-weight: bold">VISI </h2>
                          <br>
                      <p>
                          Lorem ipsum dolor sit amet, wisi denique cum ei, ea pro vidit nostrud incorrupte, mea id nullam neglegentur. Rsse dicat petentium ea vim. Eu liber aliquando vel. Vix no aperiam discere.

                          Cum ei suas inciderint. Delenit nonumes te cum, populo expetendis ad mel. Quod singulis maluisset ne vix, esse populo volumus te ius, has iusto mundi viris et.
                      </p>
                  </div>
                  <div class="col misi" style="overflow: auto;">
                      <h2 style="text-align: center; font-weight: bold;">MISI </h2>
                          <br>
                      <p>
                          Erant zril munere ad vis, an esse magna omnes est, cum et audire utamur praesent. Cu vel nemore delectus adolescens, id erant nullam postulant eam. Labitur fabellas ne duo. Duo ad nemore civibus, tota populo ne cum.


                          Illum laboramus vulputate vix ex. Doming legimus denique ex pri, ipsum movet bonorum ut eos, alii lobortis consectetuer ei duo. Quo viderer tractatos disputationi ex, sit natum deseruisse in. Per nominavi officiis te, ei nullam sensibus mei.
                      </p>
                  </div>
              </div>
              <div class="row">
                  
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