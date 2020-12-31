<?php
$a = rand(130,255);
$b = rand(130,255);
$c = rand(130,255);

$mina = 255-$a;
$minb = 255-$b;
$minc = 255-$c;


$konek=mysqli_connect([HOST],[USER],[PASS]);
mysqli_select_db($konek,[DB]);

$q = "SELECT * FROM `peserta` order by no desc limit 10";
$ambil = mysqli_query($konek, $q);
//$peserta = mysqli_fetch_array($ambil, MYSQLI_ASSOC);

$q = "SELECT * FROM presensi order by no desc limit 10";
$lihat = mysqli_query($konek, $q);
?>

<!doctype html>
<html lang="en">

<head>
    	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Sebuah Platform Pergerakan Digital">
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

  <title>Haizim Event Management</title>

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
		.ganjil{
		    background-color : #fff;
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
<div class="btn-group fixed-bottom" style="padding:10px; z-index:99; left:10%; right:10%; margin-bottom:-10px;">
          
  <a href="index.php" class="btn" style="border-radius: 15px 0 0 0; box-shadow: 0px 0px 5px #111111; color:rgb(<?php echo (255-$c).",".$b.",".$a; ?>); background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>);"><i class='fas fa-home' style='font-size:36px'></i></a>
  
  
  <a href="registrasi.php" class="btn" style=" box-shadow: 0px 0px 5px #111111; z-index:10; background-color:rgb(<?php echo (255-$c).",".$b.",".$a; ?>); color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>);"><i class='fas fa-align-left' style='font-size:36px'></i></a>
  
  
  <a href="esertifikat.php" class="btn" style="border-radius: 0 15px 0 0; box-shadow: 0px 0px 5px #111111; background-color:rgb(<?php echo (255-$c).",".$b.",".$a; ?>); color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>);"><i class='fas fa-print' style='font-size:36px'></i></a>
  
</div> 


<div class="row">
         <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <center>
                
            <h1> Selamat Datang</h1>
        <div class="container" style="background-color:#f1f1f1; border-radius: 10px; box-shadow: 0px 0px 5px #111111; padding: 5%;">
            <h5>Ini merupakan aplikasi managemen event sederhana. Dimana menangani mulai dari  pendaftaran, presensi kedatangan hingga mencetak E-sertifikat</h5>
        </div>
        <hr/>
            <h1> Cara Penggunaan</h1>
            <div class="row">
                <div class="col" style="padding:5px">
        <div class="container" style="background-color:#f1f1f1; border-radius: 10px; box-shadow: 0px 0px 5px #111111; padding: 5%; height:100%;">
            <h5>Registrasi Peserta</h5>
            <hr/>
            Disini peserta akan mendapatkan nomor peserta yang akan digunakan untuk Presensi dan Mencetak E-Serifikat<hr/>
              <a href=registrasi.php><button type="submit" class="btn" style="background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>); font-weight:550; color:#fff;">Registrasi Peserta</button></a>
        </div>
        </div>
        <div class="col" style="padding:5px">
        <div class="container" style="background-color:#f1f1f1; border-radius: 10px; box-shadow: 0px 0px 5px #111111; padding: 5%; height:100%;">
            <h5>Presensi Kehadiran</h5><hr/>
              Ketika di tempat event akan diberi QR code yang berisi alamat untuk presensi yang hanya dapat digunakan sekali
        </div>
        </div>
        <div class="col" style="padding:5px">
        <div class="container" style="background-color:#f1f1f1; border-radius: 10px; box-shadow: 0px 0px 5px #111111; padding: 5%; height:100%;">
            <h5>Cetak E-Sertifikat</h5><hr/>
              Pencetakan Menggunakan Nomor Peserta<hr/>
              <a href=esertifikat.php><button type="submit" class="btn" style="background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>); font-weight:550; color:#fff;">Cetak E-Sertifikat</button></a>
        </div>
        </div>
        
        
        </div>
        <hr/>
        
        <h1> 10 Pendaftar Terakhir</h1>
        <div class="container" style="text-align:left; background-color:#f1f1f1; border-radius: 10px; box-shadow: 0px 0px 5px #111111; padding: 5%;">
            <div class='row' style="background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>); color:#fff; font-weight: bold;">
                <div class='col-sm-5'>Nama</div>
                <div class='col-sm-7'>Asal</div>
            </div>
            <?php
                $n = 1;
                
                while($peserta = mysqli_fetch_array($ambil, MYSQLI_ASSOC)){
                    $g="";
                    if($n & 1){
                        $g = "ganjil";
                    }
                    
                    $nama = $peserta['nama'];
                    $asal = $peserta['asal'];
                    echo "<div class='row $g'>";
                    echo "<div class='col-sm-5'>$nama </div>";
                    echo "<div class='col-sm-7'>$asal</div>";
                    echo "</div>";
                    $n++;
                }
            ?>
            <br/><br/>
            <center><a href=cetak-peserta.php><button type="submit" class="btn" style="background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>); font-weight:550; color:#fff;">Cetak Rekapitulasi Pendaftar</button></a></center>
        </div>
        <hr/>
        
        <h1> 10 Presensi Terakhir</h1>
        <div class="container" style="background-color:#f1f1f1; border-radius: 10px; box-shadow: 0px 0px 5px #111111; padding: 5%;">
            <div class='row' style="background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>); color:#fff; font-weight: bold;">
                <div class='col-sm-4'>Waktu</div>
                <div class='col-sm-8'>Nomor Peserta</div>
            </div>
            <?php
                $n = 1;
                
                while($peserta = mysqli_fetch_array($lihat, MYSQLI_ASSOC)){
                    $g="";
                    if($n & 1){
                        $g = "ganjil";
                    }
                    
                    $waktu = $peserta['waktu'];
                    $nopes = $peserta['nopes'];
                    echo "<div class='row $g'>";
                    echo "<div class='col-sm-4'>$waktu</div>";
                    echo "<div class='col-sm-8'>$nopes</div>";
                    echo "</div>";
                    $n++;
                }
            ?>
            <br/><br/>
            <a href=cetak-presensi.php><button type="submit" class="btn" style="background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>); font-weight:550; color:#fff;">Cetak Rekapitulasi Presensi</button></a>
        </div>
        <hr/>
        
        </center>
        </div>
<div class="col-sm-3">
    <br/>
    <br/>
    <hr/>
    <br/>
</div>
</div>

</body>

</html>