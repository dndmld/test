<?php

// Array multidimensi data mahasiswa
$mahasiswa = [
    [
        "nama" => "Lee Jihoon",
        "nim" => "2301001",
        "tugas" => 85,
        "uts" => 80,
        "uas" => 90
    ],
    [
        "nama" => "Wen Junhui",
        "nim" => "2301002",
        "tugas" => 80,
        "uts" => 75,
        "uas" => 85
    ],
    [
        "nama" => "Jeon Wonwoo",
        "nim" => "2301003",
        "tugas" => 90,
        "uts" => 88,
        "uas" => 92
    ],
    [
        "nama" => "Kwon Soonyoung",
        "nim" => "2301004",
        "tugas" => 75,
        "uts" => 70,
        "uas" => 80
    ],
    [
        "nama" => "Yoon Jeonghan",
        "nim" => "2301005",
        "tugas" => 88,
        "uts" => 85,
        "uas" => 90
    ]
];

// Mencari mahasiswa dengan nilai tertinggi
$nilai_tertinggi = 0;
$mahasiswa_tertinggi = "";

foreach ($mahasiswa as $mhs) {
    $nilai_akhir =
        ($mhs["tugas"] * 0.30) +
        ($mhs["uts"] * 0.30) +
        ($mhs["uas"] * 0.40);

    if ($nilai_akhir > $nilai_tertinggi) {
        $nilai_tertinggi = $nilai_akhir;
        $mahasiswa_tertinggi = $mhs["nama"];
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nilai Mahasiswa</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f6fc;
            margin: 40px;
        }

        h2 {
            text-align: center;
            color: #1f4e78;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th {
            background-color: #1f4e78;
            color: white;
            padding: 12px;
        }

       td {
    padding: 10px;
    text-align: center;
    border: 1px solid #ddd;
        }

        td.nama {
    text-align: left;
        }

        tr:nth-child(even) {
            background-color: #eaf2f8;
        }

        tr:hover {
            background-color: #d6eaf8;
        }

        .nilai-akhir {
            font-weight: bold;
            color: #1f4e78;
        }

       .info {
             display: inline-block;
             margin-top: 15px;
             padding: 12px 20px;
             background-color: #d6eaf8;
             color: #1f4e78;
             font-size: 16px;
             font-weight: bold;
             border-left: 5px solid #1f4e78;
             border-radius: 5px;
             line-height: 1.8;
        }
    </style>
</head>

<body>

    <h2>DAFTAR NILAI MAHASISWA</h2>

    <table>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai Tugas</th>
            <th>Nilai UTS</th>
            <th>Nilai UAS</th>
            <th>Nilai Akhir</th>
        </tr>

        <?php
        $no = 1;

        foreach ($mahasiswa as $mhs) {

            // Menghitung nilai akhir
            $nilai_akhir =
                ($mhs["tugas"] * 0.30) +
                ($mhs["uts"] * 0.30) +
                ($mhs["uas"] * 0.40);
        ?>

        <tr>
            <td><?php echo $no++; ?></td>
            <td class="nama"><?php echo $mhs["nama"]; ?></td>
            <td><?php echo $mhs["nim"]; ?></td>
            <td><?php echo $mhs["tugas"]; ?></td>
            <td><?php echo $mhs["uts"]; ?></td>
            <td><?php echo $mhs["uas"]; ?></td>
            <td class="nilai-akhir">
                <?php echo number_format($nilai_akhir, 2); ?>
            </td>
        </tr>

        <?php
        }
        ?>

    </table>

    <div class="info">
        <div>
            Jumlah Mahasiswa: <?php echo count($mahasiswa); ?>
         </div>

        <div>
            Nilai Tertinggi:
            <?php echo $mahasiswa_tertinggi; ?>
           (<?php echo number_format($nilai_tertinggi, 2); ?>)
        </div>
    </div>

</body>
</html>