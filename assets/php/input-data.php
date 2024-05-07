<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Metas -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hoteling: Hotel Booking</title>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: {
            'sans': ['"Poppins"', 'sans-serif'],
            'heading': ['"Montserrat"', 'sans-serif']
          },
        }
      }
    }
  </script>
</head>
<body>
  <?php
  // Database configuration
  include 'database-config.php';

  // Cek data yang diterima
  $is_data_complete = isset($_GET['nama']) && isset($_GET['nomor-identitas']) && isset($_GET['jenis-kelamin']) && isset($_GET['kamar']) && isset($_GET['durasi']) && isset($_GET['diskon-input']) && isset($_GET['total-harga-input']);
  if ($is_data_complete) {
    // Dapatkan data dari form
    $nama = $_GET['nama'];
    $nomor_identitas = $_GET['nomor-identitas'];
    $jenis_kelamin = $_GET['jenis-kelamin'];
    $kamar = $_GET['kamar'];
    $durasi = $_GET['durasi'];
    $diskon = $_GET['diskon-input'];
    $total_harga = $_GET['total-harga-input'];

    // Query SQL
    $sql = "INSERT INTO data_pemesan (nama_pemesan, nomor_identitas, jenis_kelamin, tipe_kamar, durasi_penginapan, diskon, total_harga) VALUES ('$nama', '$nomor_identitas', '$jenis_kelamin', '$kamar', '$durasi', '$diskon', '$total_harga')";

    // Eksekusi query
    if ($conn->query($sql) === FALSE) {
      echo `<script>alert("Error: $sql <br> $conn->error")</script>`;
    }
  }
  ?>
  <main class="grow">
    <section class="py-20">
      <div class="container mx-auto">
        <h2 class="font-heading text-2xl text-center"><?php echo $is_data_complete ? 'Pemesanan Berhasil' : 'Pemesanan Gagal' ?></h2>
        <p class="text-center mt-2">
          <?php echo $is_data_complete ? 'Terima kasih telah memesan kamar di Hoteling. Berikut adalah rincian pemesanan Anda:' : 'Mohon maaf, pemesanan Anda tidak berhasil. Silakan coba lagi.' ?>
        </p>
        <div class="mt-8">
          <?php if ($is_data_complete) : ?>
          <table class="table-auto mx-auto">
            <tr>
              <td class="px-4 py-2">Nama Pemesan</td>
              <td class="px-4 py-2">: <?= $_GET['nama'] ?></td>
            </tr>
            <tr>
              <td class="px-4 py-2">Nomor Identitas</td>
              <td class="px-4 py-2">: <?= $_GET['nomor-identitas'] ?></td>
            </tr>
            <tr>
              <td class="px-4 py-2">Jenis Kelamin</td>
                <td class="px-4 py-2">: <?= ucfirst($_GET['jenis-kelamin']) ?></td>
            </tr>
            <tr>
              <td class="px-4 py-2">Tipe Kamar</td>
              <td class="px-4 py-2">: <?= ucfirst($_GET['kamar']) ?></td>
            </tr>
            <tr>
              <td class="px-4 py-2">Durasi Penginapan</td>
              <td class="px-4 py-2">: <?= $_GET['durasi'] ?> hari</td>
            </tr>
            <tr>
              <td class="px-4 py-2">Diskon</td>
              <td class="px-4 py-2">: <?= $_GET['diskon-input'] ?>%</td>
            </tr>
            <tr>
              <td class="px-4 py-2">Total Harga</td>
              <td class="px-4 py-2">: <?= 'Rp ' . number_format($_GET['total-harga-input'], 2, ',', '.') ?></td>
            </tr>
          </table>
          <?php endif; ?>

          <div class="text-center mt-8">
            <a href="../../index.html" class="inline-block bg-blue-500 text-white py-2 px-4 border-4 border-blue-500 hover:bg-white hover:text-blue-500 hover:font-bold js-wider">Kembali ke Beranda</a>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="../js/script.js"></script>
</body>