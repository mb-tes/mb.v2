<?php
// proses_pesanan.php - Memperbarui status pesanan di database
$conn = new mysqli("localhost", "username", "password", "topup_db");

if (isset($_GET['action']) && isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $action = $_GET['action'] == 'approve' ? 'completed' : 'rejected';

    $query = "UPDATE orders SET status = '$action' WHERE order_id = $order_id";
    if ($conn->query($query) === TRUE) {
        echo "Pesanan berhasil diperbarui.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>