<?php
// File: tabel_perkalian.php

$angka = 5;

echo "<h2>Tabel Perkalian $angka</h2>";

for ($i = 1; $i <= 10; $i++) {
    $hasil = $angka * $i;

    echo $angka .
        " x " .
        $i .
        " = " .
        $hasil .
        "<br>";
}
?>