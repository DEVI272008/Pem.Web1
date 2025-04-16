<?php
// Sertakan koneksi
require 'koneksi.php';

// Hapus data jika terdapat parameter id
if (isset($_GET['name'])) {
    $stmt = $pdo->prepare("DELETE FROM rentals WHERE id = :id");
    $stmt->execute(['id' => $_GET['id']]);
    header("Location: tampildata.php"); // Redirect kembali ke tampildata.php
    exit;
}

// Ambil data dari tabel rentals
$stmt = $pdo->query("SELECT * FROM rentals");
$rentals = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penyewaan</title>
    <style>
    /* Tambahkan css khusus cetak */
    @media print {
        /* sembunyikan tombol cetak saat di print */
        button,
        th:last-child,
        td:last-child {
            display: none;
        }
        
        /* pengaturan margin dan ukuran font saat di print */
        body{
            margin: 0;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th,
        td {
            border:1px soid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #ACAF50 ;
            color: white;
        }
    }
    </style>
</head>

<body>
    <section>
        <h2>Daftar Penyewaan</h2>

        <!-- Tombol Cetak laporan -->
        <button onclick="cetakLaporan()"
            style="margin-bottom: 20px; padding: 10px 20px; background-color: #4CAF50; color: white; border: none; border-radius: 5px; cursor: pointer;"> Cetak
            Laporan</button>        
        <table>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
            <?php if (!empty($rentals)): ?>
            <?php foreach ($rentals as $rental): ?>
            <tr>
                <td><?php echo htmlspecialchars($rental['name']); ?></td>\
                <td><?php echo htmlspecialchars($rental['email']); ?></td>
                <td>
                    <!-- Tautan Edit mengarahkan ke edit.php dengan parameter ID data -->
                    <a href="edit.php?id=<?php echo $rental['id']; ?>">Edit</a>
                    <!-- Tautan Delete menambahkan parameter ID untuk dihapus -->
                    <a href="tampildata.php?id=<?php echo $rental['id']; ?>"
                        onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                </td>
            </tr>
            <?php endforeach;?>
            <?php else: ?>
            <tr>
                <td colspan="3">Tidak ada data penyewaan.</td>
            </tr>
            <?php endif;?>
        </table>
    </section>
</body>

</html>