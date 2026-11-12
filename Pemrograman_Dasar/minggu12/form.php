<?php
    $nama = $email = $nohp = $umur = $url = $semester = $tema = "";
    $bahasa = [];
    $errors = [];
    $sukses = false;
    $daftarBahasa = ["PHP", "JavaScript", "Python", "Java"];
    $daftarSemester = ["Semester 1", "Semester 3", "Semester 5"];
    $daftarTema = ["Web", "Mobile", "Backend"];

    if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $nama = trim($_POST['nama'] ?? "");
        $email = trim($_POST['email'] ?? "");
        $nohp = trim($_POST['nohp'] ?? "");
        $umur = trim($_POST['umur'] ?? "");
        $url = trim($_POST['url'] ?? "");
        $semester = $_POST['semester'] ?? "";
        $tema = $_POST['tema'] ?? "";
        $bahasa = $_POST['bahasa'] ?? [];

        if ($nama === "") {
            $errors['nama'] = "Nama harus diisi.";
        } else if (strlen($nama) < 3 || strlen($nama) > 50) {
            $errors['nama'] = "Nama harus antara 3 hingga 50 karakter.";
        }

        if ($email === "") {
            $errors['email'] = "Email harus diisi.";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Format email tidak valid.";
        }

        $opsihp = ["options" => ["regexp" => "/^(\+62|62|0)8[1-9][0-9]{6,9}$/"]];
        if ($nohp === "") {
            $errors['nohp'] = "Nomor HP harus diisi.";
        } else if (!filter_var($nohp, FILTER_VALIDATE_REGEXP, $opsihp)) {
            $errors['nohp'] = "Format nomor HP tidak valid.";
        }

        $opsiumur = ["options" => ["min_range" => 17, "max_range" => 19]];
        if ($umur === "") {
            $errors["umur"] = "Umur harus diisi.";
        } else if (!filter_var($umur, FILTER_VALIDATE_INT, $opsiumur)) {
            $errors["umur"] = "Umur harus antara 17 hingga 19 tahun.";
        }

        if ($url === "") {
            $errors["url"] = "URL harus diisi.";
        } else if (!filter_var($url, FILTER_VALIDATE_URL)) {
            $errors["url"] = "Format URL tidak valid.";
        }

        // Dropdown
        $daftarSemester = ["Semester 1", "Semester 3", "Semester 5"];
        if (!in_array($semester, $daftarSemester, true)) {
            $errors["semester"] = "Silakan pilih salah satu semester.";
        }


        // Checkbox
        $daftarTema = ["Web", "Mobile", "Backend"];
        if (!in_array($tema, $daftarTema, true)) {
            $errors["tema"] = "Silakan pilih salah satu tema.";
        }

        if (empty($bahasa)) {
            $errors["bahasa"] = "Silakan pilih minimal satu bahasa.";
        }


        if (empty($errors)) {
            $sukses = true;
        }   
    }
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registrasi Lomba Coding</title>
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

        <!-- Label untuk Nama -->
            <label>Nama :</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($nama)?>">
            <?php if (isset($errors['nama'])) { echo "<span style = 'color: red'>" . $errors['nama'] . "</span>"; } ?>
            <br><br>

        <!-- Label untuk Email -->
            <label>Email :</label>
            <input type="text" name="email" value="<?= htmlspecialchars($email) ?>">
            <?php if (isset($errors["email"])) { echo "<span style = 'color: red'>" . $errors['email'] . "</span>"; } ?>
            <br><br>

        <!-- Label untuk Nomor HP -->
            <label>Nomor HP :</label>
            <input type="text" name="nohp" value="<?= htmlspecialchars($nohp) ?>">
            <?php if (isset($errors['nohp'])) { echo "<span style = 'color: red'>" . $errors['nohp'] . "</span>"; } ?>
            <br><br>

        <!-- Label untuk Umur -->
            <label>Umur :</label>
            <input type="text" name="umur" value="<?= htmlspecialchars($umur) ?>">
            <?php if (isset($errors['umur'])) { echo "<span style = 'color: red'>" . $errors['umur'] . "</span>"; } ?>
            <br><br>

        <!-- Label untuk URL medsos -->
            <label>URL medsos :</label>
            <input type="text" name="url" value="<?= htmlspecialchars($url) ?>">
            <?php if (isset($errors['url'])) { echo "<span style = 'color: red'>" . $errors['url'] . "</span>"; } ?>
            <br><br>

        <!-- Dropdown untuk Semester -->
            <label>Semester :</label>
            <select name="semester">
                <option value="">-- Pilih Semester --</option>
                <?php foreach ($daftarSemester as $s) : ?>
                    <option value="<?= htmlspecialchars($s) ?>" <?= $semester === $s ? 'selected' : '' ?>><?= htmlspecialchars($s) ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errors['semester'])) { echo "<span style = 'color: red'>" . $errors['semester'] . "</span>"; } ?>
            <br><br>

        <!-- Checkbox untuk Bahasa -->
            <label>Bahasa :</label><br>
            <?php foreach ($daftarBahasa as $b) : ?>
                <input type="checkbox" name="bahasa[]" value="<?= htmlspecialchars($b) ?>" <?= in_array($b, $bahasa) ? 'checked' : '' ?>>
                <label><?= htmlspecialchars($b) ?></label><br>
            <?php endforeach; ?>
            <?php if (isset($errors['bahasa'])) { echo "<span style = 'color: red'>" . $errors['bahasa'] . "</span>"; } ?>
            <br><br>

        <!-- Radio untuk Tema -->
            <label>Tema :</label><br>
            <?php foreach ($daftarTema as $t) : ?>
                <input type="radio" name="tema" value="<?= htmlspecialchars($t) ?>" <?= $tema === $t ? 'checked' : '' ?>>
                <label><?= htmlspecialchars($t) ?></label><br>
            <?php endforeach; ?>
            <?php if (isset($errors['tema'])) { echo "<span style = 'color: red'>" . $errors['tema'] . "</span>"; } ?>
            <br><br>

        <!-- Submit button -->
            <input type="submit" value="Submit">
        </form>
    </body>
</html>