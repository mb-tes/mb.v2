<?php
// panel_admin.php - Melihat dan mengelola pesanan pengguna
$conn = new mysqli("localhost", "username", "password", "topup_db");

$query = "SELECT * FROM orders ORDER BY created_at DESC";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Pesanan Top-Up Diamond</title>
</head>
<body>
    <h2>Panel Admin</h2>
    <table border="1">
        <tr>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Jumlah Diamond</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th>Bukti Pembayaran</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['order_id'] ?></td>
                <td><?= $row['ml_user_id'] ?></td>
                <td><?= $row['diamonds'] ?></td>
                <td><?= $row['total_price'] ?></td>
                <td><?= $row['status'] ?></td>
                <td><a href="uploads/<?= $row['payment_proof'] ?>" target="_blank">Lihat</a></td>
                <td>
                    <a href="proses_pesanan.php?action=approve&order_id=<?= $row['order_id'] ?>">Setujui</a> |
                    <a href="proses_pesanan.php?action=reject&order_id=<?= $row['order_id'] ?>">Tolak</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>