<?php
// Sertakan file koneksi ke database
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //validasi input
    if (empty($_POST['name']) || empty($_POST['email'])) {
        $mesage = "Mohon isi semua kolom."; 
    } else {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);

        // Simpan data ke database
        try {
            $stmt = $pdo->prepare("INSERT INTO rentals (name, email) VALUES (:name, :email)");
            $stmt->execute(['nama' => $name, 'email' => $email]);
            $message = "Terimakasih, $name| Penyewaan Anda telah diterima.";
        } catch (Exception $e) {
            $message = "Terjadi kesalahan: " . $e->getMessage();
        }
    
        // Menggunakan alert box untuk menampilkan pesan
        echo "<script>
            alert('$message');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furdoor Adventure</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head> 
    <style>
        .logo img {
            background-color: cadetblue;
            display: inline-block;
            padding: 10px;
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }
            * {
                padding:0;
                margin:0;
                font-family: sans-serif;
            }

            a {
              color: inherit;
              text-decoration: none;
            }

            .medsos{
                padding:5jpx 0;
                background-color: #148f77;
            }

            .medsos ul li {
                display: inline-block;
                color: #fff;
                margin-right: 10px;
            }
            .container{
                width:80% ;
                margin: 0 auto;
            }
            header{
                border:1px solid;
            }
            header h1 {
                border:1px solid;
                float: left;
            }
            header ul {
                border:1px solid;
                float: right;
            }

    </style>
<body>
    <!-- Header Section -->
    <header>
        <nav>
            <div class="logo">
                <img src="img/yuuu.jpg" alt="Furdoor Adventure">
            </div>
            <ul class="nav-links">
                <li><a href="#about">Tentang Kami</a></li>
                <li><a href="#products">Produk</a></li>
                <li><a href="#testimonials">Testimoni</a></li>
                <li><a href="#location">Lokasi</a></li>
                <li><a href="#join-us">Kontak</a></li>                                
            </ul>
            <a href="tampildata.php" class="rent-now">Lihat Data</a>
        </nav>
        <div class="hero-section">
            <h1>Furdoor Adventure</h1>
            <p>Selamat datang di Rental Perlengkapan Pendakian kami, destinasi terpercaya bagi para petualang yang siap menjelajahi keindahan alam dengan mendaki gunung.</p>
            <br><br>
            <a href="#" class="rent-now">RENT NOW</a>
        </div>
    </header>

    <!-- About Section -->
    <section id="about">
        <div class="medsos">
            <div class="container">
                <br>
                <ul>
                    <li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-instagram"></i></i></a></li>
                    <li><a href="#"><i class="fa-brands fa-github"></i></a></li>
                </ul>
                <br>
                <h1><a href="index.php">PRASTIKA DEVI ANGGRAINI</a></h1>
                <br>
                <ul>
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="about.html">TENTANG KAMI</a></li>
                    <li><a href="products.html">PRODUK</a></li>
                    <li><a href="testimonials.html">TESTIMONI</a></li>
                    <li><a href="location.html">LOKASI</a></li>
                    <li><a href="join-us.html">KONTAK</a></li>
                </ul>
                <br>
            </div>
        </div>

         <br><br>
        <h2>Tentang Kami</h2><br>
        <p>Furdoor Adventure adalah penyedia layanan penyewaan alat camping terpercaya.
            <br> Dengan fokus pada pengalaman luar ruangan yang tak terlupakan, kami menyediakan alat camping berkualitas untuk memastikan Anda merasakan petualangan dengan maksimal.</p>
        <div class="features">
            <div class="feature-item">
                <h3>Harga Terjangkau</h3>
                <p>Furdoor menyediakan harga sewa yang terjangkau dan terhitung sangat ramah dikantong.</p>
            </div>
            <div class="feature-item">
                <h3>Higenis dan Wangi</h3>
                <p>Furdoor menyediakan barang dengan kebersihan tinggi serta wangi demi kenyamanan pelanggan.</p>
            </div>
            <div class="feature-item">
                <h3>Bisa Di Antar</h3>
                <p>Furdoor menyediakan jasa pengantaran bagi teman-teman yang tidak bisa datang ke tempat.</p>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <section id="products">
        <h2>Produk Kami</h2>
        <div class="product-slider">
            <div class="product-item">
                <img src="img/tenda-java.png" alt="Tenda Dome Borneo 4 Red">
                <p>TENDAKI - Tenda Dome Borneo 4 Red</p>
                <p>Rp20000/hari - Kabupaten Malang</p>
            </div>
            <div class="product-item">
                <img src="img/taskuu.jpeg" alt="Tas Camp">
                <p>TENDAKI - Tas Deuter AC Lite 50+10</p>
                <p>Rp30000/hari - Kabupaten Malang</p>
            </div>
            <div class="product-item">
                <img src="img/camp.png" alt="Tenda Camp 4 Light">
                <p>TENDAKI - Tenda Java 4 Light</p>
                <p>Rp2189800 - Chicago</p>
            </div>
        </div>
    </section>

    <!-- Testimonial Section -->
    <section id="testimonials">
        <h2>Testimoni</h2>
        <div class="testimonial-item">
            <p>"Tempat persewaan perlengkapan outdoor di kecamatan Bululawang. Lokasi yang tidak jauh dari jalan raya Bululawang (jalan utama menuju pantai selatan), cocok apabila ada teman-teman yang hendak melakukan aktivitas camping atau outbound di daerah Malang Selatan."</p>
            <br><br>
            <p>- Clarissa Merise, Local Guide</p>
        </div>
    </section>

    <!-- Location Section -->
    <section id="location">
        <h2>Lokasi Kami</h2>
        <br>
        <div class="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.1763777781844!2d112.62114897434886!3d-8.039870994102025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6286b634c552b%3A0x54db1268a1c2d7cd!2sBululawang%2C%20Malang%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1692617173747!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

    <!--Formulir Penyewaan -->
    <section>
        <h2>Formulir Penyewaan</h2>
        <form id="rent-form" method="POST" action="">
            <input type="text" id="name" name="email" placeholder="Nama" required>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <button type="submit">Submit</button>
        </form>
    </section>

    <!-- Footer Section -->
    <footer>
        <div class="join-us">
            <h2>Ayo Gabung Bersama Kami</h2>
            <a href="#" class="join-now">Gabung sekarang</a>
        </div>
        <div class="footer-info">
            <div class="company-info">
                <p>Kunjungi Kami</p>
                <p>Jl. Nangka No.50 RT. 20 RW. 02 Sidobandung, Kecamatan Balen</p>
                <p>Bojonegoro, Jawa Timur, 65171</p>
                <p>0823-3389-3149</p>
                <p>furdoor-adventure@gmail.com</p>
            </div>
            <div class="footer-links">
                <p>Links</p>
                <ul>
                    <li><a href="#products">Produk</a></li>
                    <li><a href="#contact">Kontak</a></li>
                    <li><a href="#about">Tentang Kami</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Made with ❤ by Furdoor Adventure</p>
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>