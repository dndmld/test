<?php
function hitungNilaiAkhir($tugas, $uts, $uas) {
    return ($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4);
}

function tentukanGrade($nilaiAkhir) {
    if ($nilaiAkhir >= 90) {
        return "A";
    } elseif ($nilaiAkhir >= 80) {
        return "B";
    } elseif ($nilaiAkhir >= 70) {
        return "C";
    } elseif ($nilaiAkhir >= 60) {
        return "D";
    } else {
        return "E";
    }
}

function tentukanStatus($nilaiAkhir) {
    if ($nilaiAkhir >= 75) {
        return "Lulus";
    } else {
        return "Tidak Lulus";
    }
}

function tampilkanHasil($nama, $tugas, $uts, $uas, $nilaiAkhir, $grade, $status) {
    echo "Nama : $nama<br>";
    echo "Nilai Tugas : $tugas<br>";
    echo "Nilai UTS : $uts<br>";
    echo "Nilai UAS : $uas<br>";
    echo "Nilai Akhir : " . number_format($nilaiAkhir, 2) . "<br>";
    echo "Grade : $grade<br>";
    echo "Status : $status<br>";
    echo "<hr>";
}

$mahasiswa = [
    ["nama" => "Andi",  "tugas" => 80, "uts" => 85, "uas" => 91],
    ["nama" => "Budi",  "tugas" => 87, "uts" => 80, "uas" => 70],
    ["nama" => "Citra", "tugas" => 90, "uts" => 91, "uas" => 95],
];

echo "<h2>Pengolahan Nilai Mahasiswa</h2>";

foreach ($mahasiswa as $m) {
    $nilaiAkhir = hitungNilaiAkhir($m["tugas"], $m["uts"], $m["uas"]);
    $grade = tentukanGrade($nilaiAkhir);
    $status = tentukanStatus($nilaiAkhir);

    tampilkanHasil($m["nama"], $m["tugas"], $m["uts"], $m["uas"], $nilaiAkhir, $grade, $status);
}
?>