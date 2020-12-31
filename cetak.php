<?php
include "../pengunjung.php";
include "mpdf/index.php";
//use Mpdf\Mpdf;

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);

$konek=mysqli_connect("localhost","tagarakc_haizim","Gerak18");
mysqli_select_db($konek,"tagarakc_eo");

$nopes = strtolower($_POST['nopes']);
//echo "nopes =".$nopes."<br/>";

$no = str_replace("semnas","",$nopes);
//echo "no =".$no."<br/>";

$q = "select * from peserta where no=$no";
//echo "q =".$q."<br/>";
$ambil = mysqli_query($konek,$q);
$lihat = mysqli_fetch_array($ambil, MYSQLI_ASSOC);

$nama_file='e-sertifikat_semnas';
$nama = $lihat['nama'];
$sebagai = $lihat['sebagai'];

$q = "select * from presensi where nopes='$nopes'";
$r = mysqli_query($konek, $q);
$l = mysqli_fetch_array($r,MYSQLI_ASSOC);


//echo $nama;
//echo "<br/>nasam,namsa";
ob_start(); 
//$mpdf->useGraphs = true;
?>
<!DOCTYPE html>
<html>
<head>
     <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet"> 
</head>
<body style="background-image:url('SERTI.png'); background-image-resize:4 ; background-image-resolution: normal; text-align:center;">
    
    <!--br/><br/>
    <br/><br/>
    <br/><br/>
    <br/><br/>
    <br/><br/>
    <br/-->
    <h1 style="font-family: 'Alata', sans-serif; padding-top: 225px ; color:#333333;">
        <?php echo ucwords($nama); ?>
    </h1>
    <h1 style="font-family: 'Alata', sans-serif; padding-top: 30px ; color:#333333;">
        <?php echo ucwords($sebagai); ?>
    </h1>
        
     <?php

$hadir = ob_get_contents(); //Proses untuk mengambil data
ob_end_clean();

$bolos = "<h1 style='font-size:100;'>Hayoo.. Gak hadir kok mau e-sertifikat</h1>";

if ($l['ket']=="hadir"){
    $html = $hadir;
}else{
    $html=$bolos;
}
//Here convert the encode for UTF-8, if you prefer the ISO-8859-1 just change for $mpdf->WriteHTML($html);
$mpdf->WriteHTML(utf8_encode($html));
// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html,1);

$mpdf->Output($nama_file."-".$data['no_sj'].".pdf" ,'I');
 


exit; 
?>
</body>
</html>