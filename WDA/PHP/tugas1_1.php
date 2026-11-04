<?php
    $nama = "Adinda Maulida";
    $nim = "123456789";
    $umur = 19;
    $tinggi = 166;
    $aktif = true;

    $teks_aktif = $aktif ? "Aktif" : "Tidak Aktif";

    echo "Nama             : " . $nama . "<br>";
    echo "NIM              : " . $nim . "<br>";
    echo "Umur             : " . $umur . " tahun<br>";
    echo "Tinggi           : " . $tinggi . "<br>";
    echo "Status           : " . $teks_aktif . "<br>";
?>