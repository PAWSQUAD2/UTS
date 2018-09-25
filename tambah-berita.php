<?php
    include_once 'session.php';
    session_init(true);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tambah Berita</title>
	<link href="css/bootstrap-4.0.0.css" rel="stylesheet">
    <link href="css/main-responsive.css?version=20" rel="stylesheet">
    <link href="css/tambah-berita.css?version=20" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/footer.css?version=20">
    <link rel="stylesheet" type="text/css" href="css/TB.css?version=20">
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
                    <div class="profile-header-container p-x-5 pad-t-60px editor-container">
                        <div class="row">
                            <h3 class="color-darkTeme">>> Tambah Berita</h3>
                        </div>
                        <hr>
                        <iframe name="hidden-frame" width="0" height="0" border="0" style="display: none;"></iframe>
                        <form action="tambah-berita_action.php" method="POST" target="hidden-frame" id="form-berita" enctype="multipart/form-data">
                            <div class="row pad-b-40px">
                                <div class="col-md-auto img-berita mb-5 mr-5">
                                    <figure style="width:100%; max-height:150px; overflow:hidden;">
                                        <img src="images/Carousel_Placeholder.png" alt="pp" width="100%" style="margin-top:20px;" id="img-preview">
                                    </figure>
                                    <input required type="file" name="file" class="full-width mt-4" accept="image/gif, image/jpg, image/jpeg, image/png" style="display: none;" id="selectedFile" onchange="readURL(this);">
                                    <div style="margin : auto; width:100px;">
                                        <input type="button" value="Browse..." onclick="document.getElementById('selectedFile').click();" style="width:100%;margin-top:30px;"/>
                                    </div>
                                    
                                </div>
                                <div class="col berita-header">
                                    <div class="row  mar-t-20px">
                                        <label class="col-md-auto color-darkTheme">Judul :</label><br>
                                    </div>
                                    <input required type="text" placeholder="Judul Berita" class="text-box color-darkTheme" name="judul" id="judul">
                                    <div class="row">
                                        <label class="col-md-auto color-darkTheme">Kategori :</label><br>
                                    </div>
                            
                                    <select class="full-width combo-box color-darkTheme" name="kategori" id="kategori">
                                        <option value="Event">Event</option>
                                        <option value="Berita">Berita</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row  mar-t-20px">
                                <label required class="color-darkTheme">Isi Berita :</label><br>
                            </div>
                            <div class="row berita-editor">
                                <div class="tools">
                                    <button type="button" class="tool-button" onclick="editorTool('editor', 0)">B</button>
                                    <button type="button" class="tool-button underline" onclick="editorTool('editor', 1)">Link</button>
                                    <button type="button" class="tool-button centerline" onclick="editorTool('editor', 2)">del</button>
                                    <button type="button" class="tool-button centerline" onclick="editorTool('editor', 3)">img</button>
                                    <button type="button" class="tool-button" onclick="editorTool('editor', 4)">P</button>
                                </div>
                                <textarea class="editor mb-3" id="editor" maxlength="65535" name="isi"></textarea>
                                <button type="submit" class="tool-button publish" name="publish" id="publish">Publish</button>
                                <button type="button" class="tool-button preview color-lightTheme" onclick="preview();">Preview</button>
                            </div>
                        </form>
                        <hr>
                        <div class="row full-width preview-container" style="display:none;" id="preview-container">
                            <h4 style="text-align:center; margin-bottom:40px;" class="full-width bold" ><-PREVIEW-></h4>
                            <h4 style="text-align:center; " class="full-width" id="preview-judul">AWEWE</h4>
                            <h6 style="text-align:center; margin-bottom:80px;" class="full-width" id="preview-kategori">Kategori :</h6>
                            <br>
                            <div class="full-width" id="preview-isi"></div>
                            
                        </div>
                        <br><br>
                        <h3 class="color-darkTeme">>> Berita-Berita</h3>
                        <hr>
                            
                        <table>
                            <tr >
                                <th >No.</strong></th>
                                <th >Judul</th>
                                <th >Jenis</th>
                                <th >Tanggal Rilis</th>
                                <th >Option</th>
                            </tr>
                            <?php
                                include_once 'koneksi.php';
                                $con=konek();
                                $query = "SELECT * FROM berita ORDER BY created_at DESC";
                                $result = mysqli_query($con, $query);
                                if(mysqli_num_rows($result)==0){
                                    echo    '<tr>
                                                <td colspan="5" style="text-align:center;">Tidak Ada Berita.</td>
                                            </tr>';
                                }else{
                                    $no = 1;
                                    
                                    while($data = mysqli_fetch_assoc($result)){
                                        echo '
                                            <tr>
                                                <td >'.$no.'</td>
                                                <td>'.$data['judul'].'</td>
                                                <td>'.$data['kategori'].'</td>
                                                <td>'.$data['created_at'].'</td>
                                                <td>
                                                    <div class="centralize">
                                                        <form action="tambah-berita_action.php" method="POST" target="hidden-frame">
                                                            <input type="hidden" name="id" value="'.$data['id'].'">
                                                            <button type= "submit" class="btn-acc" name="edit" > Edit </button>
                                                            <button type= "submit" class="btn-rej" name="delete" onclick="'."return confirm('Anda Yakin Menghapus --> ".$data['judul']."?')".'"> Hapus </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        ';
                                        $no++;
                                    }
                                }
                                if(isset($_GET['edit'])){
                                    
                                    $id = $_GET['edit'];
                                    $result= $con->query("SELECT * FROM berita WHERE id= $id");
                                    
                                    if(mysqli_num_rows($result)){
                                        $data = mysqli_fetch_assoc($result);
                                        $judul = $data['judul'];
                                        $kategori = $data['kategori'];
                                        $isi = $data['isi'];
                                        
                                        echo "<script>
                                        document.getElementById('judul').value = '".$judul."';
                                        document.getElementById('kategori').value = '".$kategori."';
                                        document.getElementById('editor').value = '".$isi."';
                                        document.getElementById('selectedFile').required = false;
                                        document.getElementById('publish').name = 'update';
                                        document.getElementById('publish').innerHTML = 'Save';
                                        document.getElementById('form-berita').action += '?id=".$id."';
                                        document.getElementById('img-preview').src ='".$data['photoUrl']."';
                                        </script>";
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