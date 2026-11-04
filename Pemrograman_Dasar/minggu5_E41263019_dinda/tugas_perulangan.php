<?php

// Bagian A

$angka = 3;

echo "<h2>Tabel Perkalian $angka (For)</h2>";

for ($i = 1; $i <= 10; $i++) {
    $hasil = $angka * $i;

    echo $angka . " x " . $i . " = " . $hasil ."<br>";
}
    echo "<br>";

// Bagian B 
// 1 
echo "<h2>Deret Angka (While)</h2>";

$i = 1;

while ($i <= 10) {
    echo "Angka: " . $i . "<br>";
    $i++;
}
    echo "<br>";

// 2
echo "<h2>Deret Angka (Do While)</h2>";

$i = 10;

do {
    echo "Angka: " . $i . "<br>";
    $i--;
} while ($i >= 1);
    echo "<br>";

// ganjil genap

echo "<h2>Ganjil Genap (While)</h2>";

$i = 1;

do {
    $keterangan = ($i % 2 == 0) ? "Genap" : "Ganjil";
    echo "Angka: " . $i . " (" . $keterangan . ")<br>";
    $i++;
} while ($i <= 10);

echo "<br>";

echo "<h2>Ganjil Genap (Do While)</h2>";
$i = 10;

do {
    $keterangan = ($i % 2 == 0) ? "Genap" : "Ganjil";
    echo "Angka: " . $i . " (" . $keterangan . ")<br>";
    $i--;
} while ($i >= 1);

echo "<br";

?>