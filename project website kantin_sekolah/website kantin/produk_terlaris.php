<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk Terlaris Bulan Ini</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" rel="stylesheet">
    
    <style>
        body {
            background: #f8f9fa;
            padding: 20px;
        }
        .card-custom {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .card-custom:hover {
            transform: translateY(-5px);
        }
        .table-hover tbody tr:hover {
            background-color: rgba(33, 150, 243, 0.05);
        }
        .btn-action {
            padding: 5px 10px;
            margin: 2px;
            min-width: 80px;
        }
        .info {
            color: red;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">
                <i class="fas fa-chart-line me-2"></i>Produk Terlaris Bulan Ini
            </h1>
            <a href="admin_dashboard.php" class="btn btn-primary">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
            </a>
        </div>

        <!-- Main Content -->
        <div class="card card-custom" data-aos="fade-up">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0"><i class="fas fa-list-ul me-2"></i>Daftar Produk Terlaris</h4>
            </div>
            <div class="card-body">
                <?php
                // Cek transaksi bulan ini
                $cekTransaksi = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE MONTH(tanggal_transaksi) = MONTH(CURRENT_DATE()) AND YEAR(tanggal_transaksi) = YEAR(CURRENT_DATE())");

                if (mysqli_num_rows($cekTransaksi) == 0) {
                    echo "<p class='info'>⚠️ Tidak ada transaksi pada bulan ini. Silakan tambah data transaksi terlebih dahulu.</p>";
                } else {
                    $query = "SELECT p.nama_produk, p.harga, SUM(dt.jumlah) AS total_terjual
                    FROM detail_transaksi dt
                    JOIN produk p ON dt.id_produk = p.id_produk
                    GROUP BY dt.id_produk
                    ORDER BY total_terjual DESC
                    LIMIT 5";

                    $result = mysqli_query($koneksi, $query);

                    if (mysqli_num_rows($result) > 0) {
                        echo "<div class='table-responsive'>
                                <table class='table table-hover align-middle'>
                                    <thead class='table-light'>
                                        <tr>
                                            <th>Nama Produk</th>
                                            <th>Harga</th>
                                            <th>Total Terjual</th>
                                        </tr>
                                    </thead>
                                    <tbody>";

                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr data-aos='fade-right'>
                                    <td>{$row['nama_produk']}</td>
                                    <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                                    <td>{$row['total_terjual']}</td>
                                </tr>";
                        }

                        echo "</tbody>
                            </table>
                        </div>";
                    } else {
                        echo "<p class='info'>⚠️ Tidak ada produk terjual bulan ini.</p>";
                    }
                }
                ?>
            </div>
            <div class="card-footer">
                <button class="btn btn-success" onclick="window.print()">
                    <i class="fas fa-print me-2"></i>Cetak Laporan
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        // Initialize animations
        AOS.init({
            duration: 800,
            once: true,
            easing: 'ease-in-out'
        });
    </script>
</body>
</html>