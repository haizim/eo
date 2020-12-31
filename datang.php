<?php
session_start();
include "../pengunjung.php";

$konek=mysqli_connect("localhost","tagarakc_haizim","Gerak18");
mysqli_select_db($konek,"tagarakc_eo");

$a = rand(130,255);
$b = rand(130,255);
$c = rand(130,255);

$mina = 255-$a;
$minb = 255-$b;
$minc = 255-$c;

$isi ="kosong";

if(isset($_GET['token'])){
    $tkn = $_GET['token'];
    //echo $tkn;
    $q="select * from token where token='$tkn'";
    //echo " ->> ".$q;
    $ambil = mysqli_query($konek, $q);
    $r=mysqli_fetch_array($ambil,MYSQLI_ASSOC);
    
    if(mysqli_num_rows($ambil)>0){
        //echo ">0";
        if ($r['status']=="-"){
            //$k = "update token set status = 'sudah' where token='$tkn'";
            //$m = mysqli_query($konek, $k);
            $isi = "<h3>Silakan isi daftar hadir dulu yaa..</h3><hr/>";
            //$isi .= "<div class = 'row'>";
            $isi .= "<form class='row' action='hadir.php' method='post'>";
            //$isi .= "<input type=hidden name=token value=$tkn>";
            $isi .= "  <div class='col-sm-9' style='padding:7px'> <input type=hidden name=token value=$tkn> <input type='text' class='form-control' id='np' placeholder='Masukkan Nomor Peserta Kamu' name='np'></div>";
            $isi .= "<div class='col-sm-3' style='padding:7px'>  <button type='submit' class='btn' style='background-color:rgb(".($mina).",".($minb).",".($minc)."); font-weight:550; color:#fff;'>Hadir</button> </div>";
            $isi .= "</form>";
            //$isi .= "</div>";
        }elseif ($r['status']=="sudah"){
            $isi = "<h3>Maaf ya kak.. tapi token ini sudah dipakai</h3><hr/>";
            $isi .= "<h5>Silakan scan QRcode yang baru yaa kak..</h5>";
        }
    }else{
        $isi = "<h3>Maaf ya kak.. tapi token ini tidak terdaftar</h3><hr/>";
        $isi .= "<h5>Silakan scan QRcode yang baru yaa kak..</h5>";
    }
}

//echo $isi;

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