<?php
include "../pengunjung.php";
include "mpdf/index.php";
//use Mpdf\Mpdf;

$a = rand(130,255);
$b = rand(130,255);
$c = rand(130,255);

$mina = 255-$a;
$minb = 255-$b;
$minc = 255-$c;

$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L']);

$konek=mysqli_connect("localhost","tagarakc_haizim","Gerak18");
mysqli_select_db($konek,"tagarakc_eo");

$q = "SELECT * FROM `peserta`";
$ambil = mysqli_query($konek, $q);



//echo $nama;
//echo "<br/>nasam,namsa";
ob_start(); 
//$mpdf->useGraphs = true;
?>
<!DOCTYPE html>
<html>
<head>
     <link href="https://fonts.googleapis.com/css?family=Alata&display=swap" rel="stylesheet"> 
     <style>
         .ganjil{
		    background-color : rgb(<?php echo $c.",".$a.",".$b; ?>);
		}
     </style>
</head>
<body style=" text-align:left; font-size: 19px;">
    
    <h1>Daftar Peserta</h1>
    <!--br/><br/>
    <br/><br/>
    <br/><br/>
    <br/><br/>
    <br/><br/>
    <br/-->
    <table style="width:100%;">
        <tr>
            <td>No.</td>
            <td>Nama</td>
            <td>Asal</td>
            <td>Nomor Peserta</td>
        </tr>
    <?php
                $n = 1;
                
                while($peserta = mysqli_fetch_array($ambil, MYSQLI_ASSOC)){
                    $g="";
                    $no = str_pad($peserta['no'], 4, '0', STR_PAD_LEFT);
                    if($n & 1){
                        $g = "ganjil";
                    }
                    
                    $nama = $peserta['nama'];
                    $asal = $peserta['asal'];
                    echo "<tr class='$g'>";
                    echo "<td style='border:none; padding:3px;'>$n</td>";
                    echo "<td style='border:none; padding:3px;'>$nama</td>";
                    echo "<td style='border:none; padding:3px;'>$asal</td>";
                    echo "<td style='border:none; padding:3px;'>SEMNAS$no</td>";
                    echo "</tr>";
                    $n++;
                }
            ?>
    
        </table>
     <?php

$html = ob_get_contents(); //Proses untuk mengambil data
ob_end_clean();

$bolos = "<h1 style='font-size:100;'>Hayoo.. Gak hadir kok mau e-sertifikat</h1>";

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