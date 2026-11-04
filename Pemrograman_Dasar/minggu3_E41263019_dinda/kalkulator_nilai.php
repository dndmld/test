<?php
    $tugas = 92.5;
    $uts = 95;
    $uas = 97;

    $nilai_Akhir = 
        ($tugas * 0.30) +
        ($uts * 0.30) +
        ($uas * 0.40);

        echo "Nilai Tugas: " . $tugas . "<br>";
        echo "Nilai UTS: " . $uts . "<br>";
        echo "Nilai UAS: " . $uas . "<br>";
        echo "Nilai Akhir: " . $nilai_Akhir . "<br>";
        echo "Apakah nilai akhir >= 75?" . "<br>";

    var_dump($nilai_Akhir >= 75);

?>