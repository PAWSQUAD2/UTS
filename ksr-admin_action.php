<?php 
include_once 'session.php';
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
session_init(1);
if(isset($_POST['save_as'])){
    include_once 'koneksi.php';
    $timeout = $_POST['timeout'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $gplus = $_POST['gplus'];
    $total_berita = $_POST['total_berita'];
    $visi = $_POST['visi'];
    $misi = $_POST['misi'];
    $alamat = $_POST['alamat'];
    $con = konek();
    $con->query("UPDATE setting SET timeout_sec = $timeout, phone = '$phone', email = '$email', facebook = '$facebook',
    instagram = '$instagram', googleplus = '$gplus', visi= '$visi', misi = '$misi', total_berita = $total_berita, alamat = '$alamat' ");
    header("Location: ksr-admin.php");
}else
if(isset($_POST['pdf'])){
    include_once 'koneksi.php'; $con = konek();
    $users = $con->query("SELECT * FROM users WHERE role != 'anggota baru'");
    $posts = $con->query("SELECT * FROM berita"); 
    $registrar = $con->query("SELECT * FROM users WHERE role = 'anggota baru'");
    $filename = 'TESTING';
    $users_td ='';
    $no = 1;
    while($data = mysqli_fetch_assoc($users)){
        $users_td.='<tr>
                        <td>'.$no.'</td>
                        <td>'.$data['name'].'</td>
                        <td>'.$data['prody'].'</td>
                        <td>'.$data['npm'].'</td>
                        <td>'.$data['email'].'</td>
                    </tr>';
        $no++;
    }
    $users_table = '<table>
                        <tr>
                            <th  colspan="5" >Data-data Anggota</th>
                        </tr>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>NPM</th>
                            <th>Email</th>
                        </tr>
                        '.$users_td.'
                    </table>';
    $registrar_td ='';
    $no = 1;
    while($data = mysqli_fetch_assoc($registrar)){
        $registrar_td.='<tr>
                        <td>'.$no.'</td>
                        <td>'.$data['name'].'</td>
                        <td>'.$data['prody'].'</td>
                        <td>'.$data['npm'].'</td>
                        <td>'.$data['email'].'</td>
                    </tr>';
        $no++;
    }
    $registrar_table = '<table>
                        <tr>
                            <th  colspan="5" >Data-data Pendaftar KSR</th>
                        </tr>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>NPM</th>
                            <th>Email</th>
                        </tr>
                        '.$registrar_td.'
                    </table>';
    $html = '<html>
            <head>
                <link rel="stylesheet" type="text/css" href="css/TB.css">
                
            </head>
            <body>
                <h2 style="text-align: center;">KSR-REPORT</h2>
                <h4>Overview</h4>
                <h5>Jumlah Anggota Sah: <span>'.mysqli_num_rows($users).'</span></h5>
                <h5>Jumlah Post       : <span>'.mysqli_num_rows($posts).'</span></h5>
                <h5>Jumlah Pendaftar  : <span>'.mysqli_num_rows($registrar).'</span></h5>
                '.$users_table.'
                <hr>
                '.$registrar_table.'
            </body>
            </html>';
    pdf_create($html, $filename, 'A4', 'portrait');
}
function pdf_create($html, $filename, $paper, $orientation, $stream=TRUE){
    $dompdf = new Dompdf();
    $dompdf->set_paper($paper, $orientation);
    $dompdf->load_html($html);
    $dompdf->render();
    $dompdf->stream($filename.'pdf');
}
?>