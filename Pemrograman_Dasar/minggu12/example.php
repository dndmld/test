<?php
    $nama = $email = $nohp = $umur = $url = $semester = $tema = "";
    $bahasa = [];
    $errors = [];
    $sukses = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = trim($_POST['nama'] ?? "");
    $email = trim($_POST['email'] ?? "");
    $nohp = trim($_POST['nohp'] ?? "");
    $umur = trim($_POST['umur'] ?? "");
    $url = trim($_POST['url'] ?? "");
    $semester = $_POST['semester'] ?? "";
    $tema = $_POST['tema'] ?? "";
    $bahasa = $_POST['bahasa'] ?? [];

    if ($nama === "") {
        $errors['nama'] = "Nama harus di isi";
    } elseif (strlen($nama) < 3 || strlen($nama) > 50) {
        $errors['nama'] = "Nama harus berkisar 3 - 50";
    }

    if ($email === "") {
        $errors['email'] = "Hey, Email juga wajib di isi ya!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Format email salahhhh!";
    }

    $opsiHp = ["options" => ["regexp" => "/^(\+62|62|0)8[1-9][0-9]{6,9}$/"]];
    if ($nohp === "") {
        $errors['nohp'] = "Tolong isi no hp nya kak";
    } elseif (!filter_var($nohp, FILTER_VALIDATE_REGEXP, $opsiHp)) {
        $errors['nohp'] = "Format no hp salah , gunakan awalan +62 / 085***";
    }

    $opsiUmur = ["options" => ["min_range" => 19, "max_range" => 60]];
    if ($umur === "") {
        $errors["umur"] = "Silahkan masukkan umur anda";
    } elseif (!filter_var($umur, FILTER_VALIDATE_INT, $opsiUmur)) {
        $errors["umur"] = "Umur tidak valid, umur wajib dari 19 - 60 Tahunn!";
    }

    if ($url === "") {
        $errors["url"] = "Tolong isi url media sosialnya dengan benar!";
    } elseif (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errors["url"] = "Pakai format url dengan benar!";
    }

    //dropdown
    $daftarSemester = ["Semester 1", "Semester 3", "Semester 5"];
    if (!in_array($semester, $daftarSemester, true)) {
        $errors["semester"] = "Tolong pilih salah satu";
    }
    

    //checkbox
    $daftarTema = ["Web", "Mobile", "Backend"];
    if (!in_array($tema, $daftarTema, true)) {
        $errors["tema"] = "Tolong pilih salah satu tema!";
    }

    if (empty($bahasa)) {
        $errors["bahasa"] = "Tolong pilih salah satu";
    }

    //Validasi terakhir
    if (empty($errors)) {
        $sukses = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <title>Registrasi lomba Coding</title>
    </head>
    <body>
        <h2>Registrasi Lomba Coding</h2>

        <?php if ($sukses === true) {?>

        <div style="color: green; margin-bottom: 20px;">
                <h3>Pendaftaran Berhasil, <?= htmlspecialchars($nama) ?>!</h3>
                No HP: <?= htmlspecialchars($nohp) ?> <br>
                Media sosial: <?= htmlspecialchars($url) ?> <br>
                Umur: <?= htmlspecialchars($umur) ?> <br>
                Semester: <?= htmlspecialchars($semester) ?> <br>
                Tema: <?= htmlspecialchars($tema) ?> <br>
                Bahasa: <?= htmlspecialchars(implode(", ", $bahasa)) ?>
            </div>
            
        <?php } ?>

        <form method="post" action="">

        <!-- Lahbel Buat isi Nama -->
            <label>Nama :</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($nama)?>">
            <?php if (isset($errors['nama'])) { echo "<span style = 'color: red'>" . $errors['nama'] . "</span>"; } ?>
            <br><br>

        <!--Label Buat Email -->
            <label>Email :</label>
            <input type="text" name="email" value="<?= htmlspecialchars($email) ?>">
            <?php if (isset($errors["email"])) { echo "<span style = 'color: red'>" . $errors['email'] . "</span>"; } ?>
            <br><br>

        <!--Label Buat Nomer HP -->
            <label>Nomer HP :</label>
            <input type="text" name="nohp" value="<?= htmlspecialchars($nohp) ?>">
            <?php if (isset($errors['nohp'])) { echo "<span style = 'color: red'>" . $errors['nohp'] . "</span>"; }?>
            <br><br>

        <!--Label Buat Umur  -->
            <label>Umur anda :</label>
            <input type="text" name="umur" value="<?= htmlspecialchars($umur) ?>">
            <?php if (isset($errors['umur'])) { echo "<span style = 'color: red'>" . $errors['umur'] . "</span>"; }?>
            <br><br>
        <!--Label Buat URL medsos -->
            <label>URL medsos :</label>
            <input type="text" name="url" value="<?= htmlspecialchars($url) ?>">
            <?php if (isset($errors['url'])) { echo "<span style = 'color: red'>" . $errors['url'] . "</span>"; }?>
            <br><br>

        <!--Dropdown Buat semester-->
            <label>Semester :</label>
            <select name="semester">
                <option value="">--Pilih Semester--</option>
                <option value="Semester 1"<?php if ($semester === "Semester 1") echo "selected"; ?>>Semester 1</option>
                <option value="Semester 3"<?php if ($semester === "Semester 3") echo "selected"; ?>>Semester 3</option>
                <option value="Semester 3"<?php if ($semester === "Semester 5") echo "selected"; ?>>Semester 5</option>
            </select>
            <?php if (isset($errors['semester'])) { echo "<span style = 'color: red'>" . $errors['semester'] . "</span>"; } ?>
            <br><br>

        <!--checkbox Buat Bahasa-->
            <label>Pilih bahasa kamu :</label>
            <input type="checkbox" name="bahasa[]" value="PHP" <?php if (in_array("PHP", $bahasa)) echo "checked"; ?>> PHP
            <input type="checkbox" name="bahasa[]" value="Java" <?php if (in_array("Java", $bahasa)) echo "checked"; ?>> Java
            <?php if (isset($errors['bahasa'])) echo "<span style = 'color: red'>" . $errors['bahasa'] . "</span>"; ?>
            <br><br>

        <!--Radio Buat Tema-->
            <label>Pilih tema dari code kamu :</label>
            <input type="radio" name="tema" value="Web" <?php if ($tema === "Web") echo "checked" ?>> Web Development
            <input type="radio" name="tema" value="Mobile" <?php if ($tema === "Mobile") echo "checked" ?>> Mobile App
            <input type="radio" name="tema" value="Backend" <?php if ($tema === "Backend") echo "checked" ?>> Backend Developer
            <?php if (isset($errors['tema'])) echo "<span style = 'color: red'>" . $errors['tema'] . "</span>"; ?>
            <br><br>
            
        <!--    SUBMIT  -->
            <button type="submit">Kirim semua data!</button>
        </form>
    </body>
</html>