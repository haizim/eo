<?php

$a = rand(130,255);
$b = rand(130,255);
$c = rand(130,255);

$mina = 255-$a;
$minb = 255-$b;
$minc = 255-$c;

$konek=mysqli_connect([HOST],[USER],[PASS]);
mysqli_select_db($konek,[DB]);

$nama = mysqli_escape_string($konek,$_POST['nama']);
$asal = mysqli_escape_string($konek,$_POST['asal']);
$email = mysqli_escape_string($konek,$_POST['email']);
$telp = mysqli_escape_string($konek,$_POST['telp']);



if ((!empty($nama))&&(!empty($asal))&&(!empty($email))&&(!empty($telp))){
    $q="insert into peserta(nama, asal, email, telp) values ('$nama','$asal','$email','$telp')";
    $masuk = mysqli_query($konek, $q);
    if ($masuk){
        $q= "select no from peserta where nama='$nama' order by no desc limit 1";
        $ambil = mysqli_query($konek, $q);
        $r=mysqli_fetch_array($ambil,MYSQLI_ASSOC);
        $no = str_pad($r['no'], 4, '0', STR_PAD_LEFT);
        kirim($email, $nama, $no);
        $judul = "Selamat";
        $sub = "Kamu Sudah Terdaftar";
        $isi = "Nomor pendaftaran kamu adalah <h3>SEMNAS$no</h3>sudah dikirim ke email <b><i>$email</i></b>";
        
    }else{
        $judul = "Maaf";
        $sub = "Data Kamu Gagal Terinput";
        $isi = "Silakan coba daftar lagi <a href='registrasi.php'>disini</a>";
    }
}else{
    header("Location: registrasi.php");
}

function kirim($tujuan, $nm, $no){
    ini_set('display_errors', 1 );

    error_reporting( E_ALL );

    $from = "no-reply@haizim.one";

$to = "$tujuan";

$subject = "Pendaftaran Seminar Nasional";

$message = "<html><body>";
$message .= "Hai $nm, <br/>";
$message .= "Pendaftaran Seminar Nasional kamu telah berhasil. Untuk nomor pendaftaran kamu adalah :";
$message .= "<div class='col-sm-6' style='background-color:#f1f1f1; border-radius: 10px; box-shadow: 0px 0px 5px #111111; padding: 25px;'><center><h1>SEMNAS$no</h1></center></div>";
$message .= "Jangan lupa hadir pada tanggal 30 Februari 2020 yaa.. ^_^<br/><br/>";
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
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

  

	<style>

		body{
			background-color: rgb(<?php echo $a.",".$b.",".$c; ?>);
			padding : 5% 10%;
			color : rgb(<?php echo $mina.",".$minb.",".$minc; ?>);
		}

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
	
	<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</head>

<body>
<div class="btn-group btn-group-lg fixed-bottom" style="padding:10px; z-index:99; left:10%; right:10%; margin-bottom:-10px;">
          
  <a href="index.php" class="btn" style="border-radius: 15px 0 0 0; box-shadow: 0px 0px 5px #111111; color:rgb(<?php echo (255-$c).",".$b.",".$a; ?>); background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>);"><i class='fas fa-home' style='font-size:36px'></i></a>
  
  
  <a href="registrasi.php" class="btn" style=" box-shadow: 0px 0px 5px #111111; z-index:10; background-color:rgb(<?php echo (255-$c).",".$b.",".$a; ?>); color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>);"><i class='fas fa-align-left' style='font-size:36px'></i></a>
  
  
  <a href="esertifikat.php" class="btn" style="border-radius: 0 15px 0 0; box-shadow: 0px 0px 5px #111111; color:rgb(<?php echo (255-$c).",".$b.",".$a; ?>); background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>);"><i class='fas fa-print' style='font-size:36px'></i></a>
  
</div> 

<center>
    <h1> <?php echo $judul; ?></h1>
    <h3><?php echo $sub; ?></h3>
</center>
<br/>
<div class="row">
         <div class="col-sm-3"></div>
     
     <div class="col-sm-6" style="background-color:#f1f1f1; border-radius: 10px; box-shadow: 0px 0px 5px #111111; padding: 25px;">
    <?php echo $isi; ?>
    
    <?php
    /*
    echo $nama."<br/>";
echo $asal."<br/>";
echo $email."<br/>";
echo $telp."<br/>";
*/
?>

</div>
<div class="col-sm-3"></div>
</div>

</body>

</html>