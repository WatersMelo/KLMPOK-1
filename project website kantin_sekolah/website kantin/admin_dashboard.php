<?php
session_start();
include 'koneksi.php';

// Ambil data produk
$produk = mysqli_query($koneksi, "SELECT * FROM produk");

// Ambil data siswa
$siswa = mysqli_query($koneksi, "SELECT * FROM siswa");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Admin - Kantin Sekolah</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Animate CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
  <style>
    body {
      background: #f8f9fa;
      min-height: 100vh;
    }
    .sidebar {
      background: linear-gradient(180deg, #1976D2 0%, #0D47A1 100%);
      min-height: 100vh;
      transition: all 0.3s;
    }
    .sidebar-link {
      transition: all 0.2s;
      border-radius: 8px;
    }
    .sidebar-link:hover {
      background: rgba(255, 255, 255, 0.1);
      transform: translateX(5px);
    }
    .card-hover {
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .card-hover:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .navbar {
      box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <i class="fas fa-school me-2"></i> Dashboard Admin Kantin Sekolah
      </a>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-2 sidebar p-0">
        <div class="d-flex flex-column p-3">
          <a href="manajemen_produk.php" class="sidebar-link text-white text-decoration-none mb-2 p-3" data-aos="fade-right">
            <i class="fas fa-box me-2"></i> Manajemen Produk
          </a>
          <a href="transaksi.php" class="sidebar-link text-white text-decoration-none mb-2 p-3" data-aos="fade-right" data-aos-delay="50">
            <i class="fas fa-shopping-cart me-2"></i> Transaksi Pembelian
          </a>
          <a href="manajemen_siswa.php" class="sidebar-link text-white text-decoration-none mb-2 p-3" data-aos="fade-right" data-aos-delay="100">
            <i class="fas fa-users me-2"></i> Manajemen Siswa
          </a>
          <a href="produk_terlaris.php" class="sidebar-link text-white text-decoration-none mb-2 p-3" data-aos="fade-right" data-aos-delay="150">
            <i class="fas fa-fire me-2"></i> Produk Terlaris Bulan Ini
          </a>
          <a href="logout.php" class="sidebar-link text-white text-decoration-none mb-2 p-3" data-aos="fade-right" data-aos-delay="200" onclick="return confirm('Yakin ingin logout?')">
            <i class="fas fa-sign-out-alt me-2"></i> Logout
          </a>
        </div>
      </div>

      <!-- Main Content -->
      <div class="col-md-10 p-4">
        <div data-aos="fade-up">
          <!-- Produk Section -->
          <div class="card card-hover mb-4 shadow-sm" id="produk">
            <div class="card-body">
              <h2 class="card-title text-primary mb-4">
                <i class="fas fa-box me-2"></i>Manajemen Produk
              </h2>
              <p class="card-text">produk makanan/minuman. </p>
              <div class="table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Stok</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while($p = mysqli_fetch_assoc($produk)): ?>
                      <tr>
                        <td><?= htmlspecialchars($p['nama_produk']) ?></td>
                        <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
                        <td><?= $p['stok'] ?></td>
                      </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Siswa Section -->
          <div class="card card-hover mb-4 shadow-sm" id="siswa" data-aos="fade-up" data-aos-delay="100">
            <div class="card-body">
              <h2 class="card-title text-warning mb-4">
                <i class="fas fa-users me-2"></i>Manajemen Siswa
              </h2>
              <p class="card-text">data siswa yang bisa melakukan transaksi di kantin.</p>
              <div class="row g-3">
                <div class="col-md-6">
                  <input type="text" class="form-control" id="cariSiswa" placeholder="Cari siswa...">
                </div>
              </div>
              <table class="table mt-3 table-bordered" id="tabelSiswa">
                <thead>
                  <tr>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while($s = mysqli_fetch_assoc($siswa)): ?>
                    <tr>
                      <td><?= htmlspecialchars($s['nama_siswa']) ?></td>
                      <td><?= $s['kelas'] ?></td>
                    </tr>
                  <?php endwhile; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
  <script>
    AOS.init({
      duration: 800,
      once: true,
      easing: 'ease-in-out'
    });

    // Script untuk pencarian siswa
    document.getElementById('cariSiswa').addEventListener('keyup', function () {
      const filter = this.value.toLowerCase();
      const rows = document.querySelectorAll('#tabelSiswa tbody tr');

      rows.forEach(row => {
        const nama = row.children[0].textContent.toLowerCase();
        if (nama.includes(filter)) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    });
  </script>
</body>
</html>
