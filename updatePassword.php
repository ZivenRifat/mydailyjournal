<?php
function updatePassword($username, $newPassword, $conn) {
    // Enkripsi password baru menggunakan MD5
    $hashedPassword = md5($newPassword);

    // Persiapkan query untuk update password
    $stmt = $conn->prepare("UPDATE user SET password = ? WHERE username = ?");
    if ($stmt === false) {
        return [
            'status' => false,
            'message' => 'Error preparing query: ' . $conn->error,
        ];
    }

    // Bind parameter
    $stmt->bind_param("ss", $hashedPassword, $username);

    // Eksekusi query
    if ($stmt->execute()) {
        // Cek apakah ada baris yang terpengaruh
        if ($stmt->affected_rows > 0) {
            return [
                'status' => true,
                'message' => 'Password berhasil diubah.',
            ];
        } else {
            return [
                'status' => false,
                'message' => 'Username tidak ditemukan atau password tidak diubah.',
            ];
        }
    } else {
        return [
            'status' => false,
            'message' => 'Error executing query: ' . $stmt->error,
        ];
    }

}
?>
