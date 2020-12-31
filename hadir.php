<?php
include "../pengunjung.php";
$konek=mysqli_connect("localhost","tagarakc_haizim","Gerak18");
mysqli_select_db($konek,"tagarakc_eo");

$a = rand(130,255);
$b = rand(130,255);
$c = rand(130,255);

$mina = 255-$a;
$minb = 255-$b;
$minc = 255-$c;

$dari = $_SERVER['HTTP_REFERER'];
$np = strtolower($_POST['np']);
$tkn = $_POST['token'];
//$no = substr($np,-4);
$no = str_replace("semnas","",$np);
//echo "no= ".$no."<br/>";

//$h = ["http://","https://"];
$r1 = str_replace("http://","",$dari);
//echo "r1= ".$r1."<br/>";
$r = str_replace("https://","",$r1);
//echo "r= ".$r."<br/>";
$k = substr($r,0,30);
//echo "k= ".$k."<br/>";

if($k=="haizim.one/iseng/eo/datang.php"){
    $q = "select * from peserta where no=$no";
    //echo "q= ".$q."<br/>";
    $ambil = mysqli_query($konek, $q);
    $lihat=mysqli_fetch_array($ambil,MYSQLI_ASSOC);
    $nama = $lihat['nama'];
    $email = $lihat['email'];
    //echo "nama= ".$nama."<br/>";
    
    if(mysqli_num_rows($ambil)>0){
        $q = "select * from presensi where nopes='$np'";
        $cek = mysqli_query($konek, $q);
        $hadir = mysqli_fetch_array($cek,MYSQLI_ASSOC);
        
        if(mysqli_num_rows($cek)==0){
            $q = "insert into presensi(nopes,ket) values ('$np','hadir')";
            $masuk = mysqli_query($konek,$q);
            $k = "update token set status = 'sudah' where token='$tkn'";
            $m = mysqli_query($konek, $k);
            kirim($email, $nama);
            $isi = "<h3>Selamat Datang $nama</h3><hr/>";
            $isi .= "<h5 style='color:rgb(".(255-$c).",".$b.",".$a.");'>Silakan menunjukkan ini dan kartu identitas sebelum masuk ya kaak..</h5>";
        }else{
            $isi = "<h3>Maaf, nomor peserta ini sudah terpakai</h3>";
        }
    }else{
        $isi = "<h3>Maaf, kakak siapa yaa?</h3>";
    }
}else{
    $isi = "<h3>Mohon isi presensi sesuai dengan prosedur yang ditentukan ya kaak.. ^^</h3>";
}
//echo "<br/>".$dari;

function kirim($tujuan, $nm){
    $a = rand(130,255);
$b = rand(130,255);
$c = rand(130,255);

$mina = 255-$a;
$minb = 255-$b;
$minc = 255-$c;
    ini_set('display_errors', 1 );

    error_reporting( E_ALL );

    $from = "no-reply@haizim.one";

$to = "$tujuan";

$subject = "Pendaftaran Seminar Nasional";

$message = "<html><body>";
$message .= "Hai $nm, <br/>";
$message .= "Terimakasih telah datang. <br/>";
$message .= "Untuk mencetak E-Sertifikat silakan menuju halaman berikut<br/>";
$message .= "<a href='http://haizim.one/iseng/eo/esertifikat.php'><button style='padding:10px; font-size:large; border-radius:10px; background-color:rgb(".($mina).",".($minb).",".($minc)."); font-weight:550; color:#fff;border:none;'>Cetak E-Sertifikat</button></a><br/><br/>";
$message .= "Ttd,<br/>";
$message .= "Panitia<br/><br/><br/>";
$message .= "Haizim.";
$message .= "</body></html>";

$headers = "From:" . $from."\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$kirim = mail($to,$subject,$message, $headers);

if($kirim){
 $hasil = "ok";
}else{
 $hasil = "gagal";
}
return $hasil;
}


?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sebuah Platform Pergerakan Digital">

    <title>Presensi Seminar Nasional</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

  

	<style>

		.btn-block{
			background-color: rgb(<?php echo $b.",".$c.",".$a; ?>);
			border : none;
			color : rgb(<?php echo $minb.",".$minc.",".$mina; ?>);
			padding: 1px;
			margin: 3px;
			border-radius: 50px;
			
		}

		h1,h2,h3,h4,h5,h6{
			font-weight: 700;
			//color : rgb(<?php echo $c.",".$a.",".$b; ?>);;
		}

		input{
			padding: 5px 25px;
			border: none;
		}

	</style>
	
</head>

 <body style="background-color:rgb(<?php echo $a.",".$b.",".$c; ?>); padding: 10%;">
<div class="btn-group btn-group-lg fixed-bottom" style="padding:10px; z-index:99; left:10%; right:10%; margin-bottom:-10px;">
          
  <a href="index.php" class="btn" style="border-radius: 15px 0 0 0; box-shadow: 0px 0px 5px #111111; color:rgb(<?php echo (255-$c).",".$b.",".$a; ?>); background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>);"><i class='fas fa-home' style='font-size:36px'></i></a>
  
  
  <a href="registrasi.php" class="btn" style=" box-shadow: 0px 0px 5px #111111; z-index:10; color:rgb(<?php echo (255-$c).",".$b.",".$a; ?>); background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>);"><i class='fas fa-align-left' style='font-size:36px'></i></a>
  
  
  <a href="esertifikat.php" class="btn" style="border-radius: 0 15px 0 0; box-shadow: 0px 0px 5px #111111; color:rgb(<?php echo (255-$c).",".$b.",".$a; ?>); background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>);"><i class='fas fa-print' style='font-size:36px'></i></a>
  
</div> 

<center>
    <h1> <?php //echo $judul; ?></h1>
    <h3><?php //echo $sub; ?></h3>

<br/>
<div class="row">
         <div class="col-sm-3"></div>
     
     <div class="col-sm-6" style="background-color:#f1f1f1; border-radius: 10px; box-shadow: 0px 0px 5px #111111; padding: 25px;">
    <?php echo $isi; ?>
</div>
</div>
</center>
</body>

</html>