<?php
session_start();
include "../pengunjung.php";
include "phpqrcode/qrlib.php";

unlink("image".$_SESSION['no'].".png");
//echo $_SESSION['no'];

$konek=mysqli_connect("localhost","tagarakc_haizim","Gerak18");
mysqli_select_db($konek,"tagarakc_eo");

function tkn(){
$konek=mysqli_connect("localhost","tagarakc_haizim","Gerak18");
mysqli_select_db($konek,"tagarakc_eo");

$no=rand(1,9999);
$token=base64_encode_url($no);

$q = "select * from token where token=$token";
$r = mysqli_query($konek, $q);

if(mysqli_num_rows($r)>0){
            tkn();
        }
        else{
           QRcode::png("haizim.one/iseng/eo/datang.php?token=$token", "image".$no.".png","L",7,1);
           $q = "insert into token(token) values ('$token')";
           $masuk = mysqli_query($konek, $q);
           $_SESSION['no']=$no;
        }

    return $no;
}

$no=tkn();

function base64_encode_url($string) {
    return str_replace(['+','/','='], ['-','_',''], base64_encode($string));
}

$a = rand(130,255);
$b = rand(130,255);
$c = rand(130,255);

$mina = 255-$a;
$minb = 255-$b;
$minc = 255-$c;




?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sebuah Platform Pergerakan Digital">



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

<center>
    <h1> <?php //echo $judul; ?></h1>
    <h3><?php //echo $sub; ?></h3>

<br/>
<div class="row">
         <div class="col-sm-3"></div>
     
     <div class="col-sm-6" style="background-color:#f1f1f1; border-radius: 10px; box-shadow: 0px 0px 5px #111111; padding: 25px;">
    <?php echo "<img src=image".$no.".png />";
//echo "no=".$no;
//echo "sesi no=".$_SESSION['no']; ?>
<br/>
<a href="presensi.php"><button type="submit" class="btn" style="background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>); font-weight:550; color:#fff;">Reload</button></a>

</div>
</div>
</center>
</body>

</html>