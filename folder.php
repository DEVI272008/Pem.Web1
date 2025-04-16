<?php
$host = 'localhost';
$dbname = 'rpl_database';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Cek apakah nama kosong
    if (empty($name)) {
        throw new Exception("Nama tidak boleh kosong.");
    }

    // Cek apakah email sudah digunakan oleh pengguna lain
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE email = :email AND id != :id");
    $stmt->execute(['email' => $email, 'id' => $id]);
    $emailExists = $stmt->fetchColumn();

    if ($emailExists) {
        throw new Exception("Email sudah digunakan oleh pengguna lain.");
    }

    // Update data pengguna
    $stmt = $pdo->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
    $stmt->execute([
        'name' => $name,
        'email' => $email,
        'id' => $id
    ]);

    echo "Data pengguna berhasil diperbarui.";
} catch (Exception $e) {
    echo "Kesalahan: " . $e->getMessage();
}
?>