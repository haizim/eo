<?php
include "../pengunjung.php";
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
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>

  <title>Daftar Seminar Nasional</title>

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
    <h1> Selamat Datang</h1>
    <h3>Silakan isi form berikut untuk mendaftar</h3>
</center>

<div class="row">
         <div class="col-sm-3"></div>
     
     <div class="col-sm-6" style="background-color:#f1f1f1; border-radius: 10px; box-shadow: 0px 0px 5px #111111; padding: 25px;">
<form action="daftar.php" class="needs-validation" method=post novalidate>
  <div class="form-group">
    <label for="uname">Nama :</label>
    <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama" required>
    <div class="valid-feedback">OK</div>
    <div class="invalid-feedback">Tolong diisi yaa kak..</div>
    </div>
    <div class="form-group">
    <label for="asal">Asal Instansi :</label>
    <input type="text" class="form-control" id="asal" placeholder="Asal Instansi" name="asal" required>
    <div class="valid-feedback">OK</div>
    <div class="invalid-feedback">Tolong diisi yaa kak..</div>
    </div>
    <div class="form-group">
    <label for="email">Email :</label>
    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
    <div class="valid-feedback">OK</div>
    <div class="invalid-feedback">Tolong diisi yaa kak..</div>
    </div>
    <div class="form-group">
    <label for="telp">Nomor Telepon :</label>
    <input type="tel" class="form-control" id="telp" placeholder="Nomor Telepon" name="telp" required>
    <div class="valid-feedback">OK</div>
    <div class="invalid-feedback">Tolong diisi yaa kak..</div>
    </div>
  
  <button type="submit" class="btn" style="background-color:rgb(<?php echo (255-$a).",".(255-$b).",".(255-$c); ?>); font-weight:550; color:#fff;">Daftar</button>
</form>
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