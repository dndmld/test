<?php
    $kehadiran = 60;
    $nilai_tugas = 50;

    $boleh_ujian = $kehadiran >= 75 && $nilai_tugas >= 60;

    var_dump($boleh_ujian);
?>