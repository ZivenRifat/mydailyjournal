<?php
include "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM user WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    
    echo json_encode($user); // Mengembalikan data dalam format JSON
}
?>
