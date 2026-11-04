<?php
$nama = "Adinda Maulida";
$nim = "123456789";
$prodi = "Teknik Informatika";
$umur = 19;
$ipk = 4.0;
$aktif = true;

$teks_aktif = $aktif ? "Aktif" : "Tidak Aktif";

echo "Nama             : " . $nama . "<br>";
echo "NIM              : " . $nim . "<br>";
echo "Program Studi    : " . $prodi . "<br>";
echo "Umur             : " . $umur . "<br>";
echo "IPK              : " . $ipk . "<br>";
echo "Status           : " . $teks_aktif . "<br>";

var_dump($nama); echo "<br>";
var_dump($nim); echo "<br>";
var_dump($prodi); echo "<br>";
var_dump($umur); echo "<br>";
var_dump($ipk); echo "<br>";
var_dump($aktif); echo "<br>";
?>