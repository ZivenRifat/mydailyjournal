<?php
include "koneksi.php";

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Query untuk mengambil data pengguna berdasarkan username
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $hasil = $conn->query($sql);

    // Jika data ditemukan
    if ($row = $hasil->fetch_assoc()) {
        // Proses jika form disubmit
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Ambil data dari form
            $password = isset($_POST['password']) ? $_POST['password'] : '';
            $foto_baru = $_FILES['foto']['name']; // Nama file foto baru
            $gambar_lama = $_POST['gambar_lama']; // Foto lama

            // Jika password diubah, enkripsi dengan MD5
            if ($password != '') {
                $password = md5($password);
                $sql_update = "UPDATE user SET password = '$password' WHERE username = '$username'";
                $conn->query($sql_update);
            }

            // Jika foto baru dipilih
            if ($foto_baru != '') {
                // Tentukan lokasi penyimpanan foto baru
                $target_dir = "img/";
                $target_file = $target_dir . basename($foto_baru);

                // Cek apakah file valid dan berhasil diupload
                if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
                    // Jika berhasil, simpan nama file foto baru ke database
                    $sql_update_foto = "UPDATE user SET foto = '$foto_baru' WHERE username = '$username'";
                    $conn->query($sql_update_foto);

                    // Hapus foto lama jika ada (opsional)
                    if ($gambar_lama && file_exists('img/' . $gambar_lama)) {
                        unlink('img/' . $gambar_lama); // Hapus foto lama
                    }
                } else {
                    echo "Terjadi kesalahan saat mengunggah foto.";
                }
            }

            echo "Perubahan berhasil disimpan.";
        }
?>
        <form method="post" action="" enctype="multipart/form-data">
            <div class="container mt-5">
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Ganti Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan password baru (opsional)">
                </div>

                <!-- Ganti Foto Profil -->
                <div class="mb-3">
                    <label for="formGroupExampleInput3" class="form-label">Ganti Foto Profil</label>
                    <input type="file" class="form-control" name="foto" id="foto">
                </div>

                <!-- Foto Profil Lama -->
                <div class="mb-3">
                    <label for="formGroupExampleInput4" class="form-label">Foto Profil Saat Ini</label>
                    <?php
                    if ($row["foto"] != '') {
                        if (file_exists('img/' . $row["foto"])) {
                    ?>
                        <br><img src="img/<?= $row["foto"] ?>" width="100">
                    <?php
                        }
                    }
                    ?>
                    <input type="hidden" name="gambar_lama" value="<?= $row["foto"] ?>">
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>

<?php
    } else {
        echo "Data pengguna tidak ditemukan.";
    }
}
?>
