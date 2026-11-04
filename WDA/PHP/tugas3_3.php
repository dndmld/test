<?php
    $nama = "Adinda Maulida";
    $nilai = 82;

    if ($nilai >= 85 && $nilai <= 100) {
        $grade = "Sangat Baik";
    } elseif ($nilai >= 70) {
        $grade = "Baik";
    } elseif ($nilai >= 60) {
        $grade = "Cukup";
    } elseif ($nilai >= 50) {
        $grade = "Kurang";
    } elseif ($nilai >= 0) {
        $grade = "Sangat Kurang";
    } else {
        $grade = "Nilai tidak valid";
    }
    
    echo "Nama:  " . $nama . "<br>";
    echo "Nilai: " . $nilai . "<br>";
    echo "Grade: " . $grade;

?>