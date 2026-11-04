<?php
    $nilai = 97;

    if ($nilai >= 90 && $nilai <= 100) {
        $grade = "A";
    } elseif ($nilai >= 80) {
        $grade = "B";
    } elseif ($nilai >= 70) {
        $grade = "C";
    } elseif ($nilai >= 60) {
        $grade = "D";
    } elseif ($nilai < 60 && $nilai >= 0) {
        $grade = "E";
    } else {
        $grade = "Nilai tidak valid";
    }

if ($nilai >= 75) {
    $status =  "Lulus";
} else {
    $status = "Tidak Lulus";
}

    echo "Nilai: " . $nilai . "<br>";
    echo "Grade: " . $grade . "<br>";
    echo "Status: " . $status;

?>