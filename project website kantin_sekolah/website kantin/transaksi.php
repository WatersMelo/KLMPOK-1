<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'skaven_rpl';
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tambah transaksi
if (isset($_POST['tambah'])) {
    $id_siswa = $_POST['id_siswa'];
    $tanggal = date('Y-m-d');
    
    // Initialize total payment
    $total_bayar = 0;
    
    // Calculate total payment first
    if (isset($_POST['produk'])) {
        foreach ($_POST['produk'] as $id_produk => $jumlah) {
            if ($jumlah > 0) {
                $produk_data = $conn->query("SELECT harga FROM produk WHERE id_produk = $id_produk")->fetch_assoc();
                $total_bayar += $produk_data['harga'] * $jumlah;
            }
        }
    }
    
  // Cek apakah saldo cukup
$cek_saldo = $conn->query("SELECT saldo FROM siswa WHERE id_siswa = $id_siswa")->fetch_assoc();
if ($cek_saldo['saldo'] >= $total_bayar) {
    // Lanjutkan proses transaksi
    $conn->query("INSERT INTO transaksi (id_siswa, tanggal_transaksi, total_bayar) 
                 VALUES ('$id_siswa', NOW(), '$total_bayar')");
    $id_transaksi = $conn->insert_id;

    foreach ($_POST['produk'] as $id_produk => $jumlah) {
        if ($jumlah > 0) {
            $produk_data = $conn->query("SELECT harga FROM produk WHERE id_produk = $id_produk")->fetch_assoc();
            $total_harga = $produk_data['harga'] * $jumlah;

            $conn->query("INSERT INTO detail_transaksi (id_transaksi, id_produk, jumlah, total_harga) 
                         VALUES ('$id_transaksi', '$id_produk', '$jumlah', '$total_harga')");

            $conn->query("UPDATE produk SET stok = stok - $jumlah WHERE id_produk = $id_produk");
        }
    }

    // Kurangi saldo
    $conn->query("UPDATE siswa SET saldo = saldo - $total_bayar WHERE id_siswa = $id_siswa");

    echo "<script>alert('Transaksi berhasil ditambahkan');</script>";
    echo "<script>window.location.href = 'transaksi.php';</script>";
} else {
    echo "<script>alert('Saldo tidak cukup untuk melakukan transaksi');</script>";
}
}

// Update jumlah pembelian
if (isset($_POST['update'])) {
    $id_detail = $_POST['id_detail'];
    $jumlah_baru = $_POST['jumlah'];
    $row = $conn->query("SELECT * FROM detail_transaksi WHERE id_detail = $id_detail")->fetch_assoc();
    $jumlah_lama = $row['jumlah'];
    $id_produk = $row['id_produk'];
    $id_transaksi = $row['id_transaksi'];

    // Get product price
    $produk_data = $conn->query("SELECT harga FROM produk WHERE id_produk = $id_produk")->fetch_assoc();
    $harga = $produk_data['harga'];
    
    // Calculate new subtotal
    $subtotal_baru = $jumlah_baru * $harga;

    // Update stok
    $selisih = $jumlah_baru - $jumlah_lama;
    $conn->query("UPDATE produk SET stok = stok - $selisih WHERE id_produk = $id_produk");

    // Update detail transaksi with new subtotal
    $conn->query("UPDATE detail_transaksi SET jumlah = $jumlah_baru, subtotal = $subtotal_baru WHERE id_detail = $id_detail");
    
    // Update total payment in transaction
    $conn->query("UPDATE transaksi SET total_bayar = (SELECT SUM(subtotal) FROM detail_transaksi WHERE id_transaksi = $id_transaksi) WHERE id_transaksi = $id_transaksi");
    
    echo "<script>alert('Jumlah pembelian diperbarui');</script>";
    echo "<script>window.location.href = 'transaksi.php';</script>";
}

// Hapus transaksi
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $details = $conn->query("SELECT * FROM detail_transaksi WHERE id_transaksi = $id");
    while ($d = $details->fetch_assoc()) {
        $conn->query("UPDATE produk SET stok = stok + {$d['jumlah']} WHERE id_produk = {$d['id_produk']}");
    }
    $conn->query("DELETE FROM detail_transaksi WHERE id_transaksi = $id");
    $conn->query("DELETE FROM transaksi WHERE id_transaksi = $id");
    echo "<script>alert('Transaksi dihapus');</script>";
    echo "<script>window.location.href = 'transaksi.php';</script>";
}

// Data siswa dan produk
$siswa = $conn->query("SELECT * FROM siswa ORDER BY nama_siswa");
$produk = $conn->query("SELECT * FROM produk ORDER BY nama_produk");

// Riwayat transaksi
$riwayat = $conn->query("SELECT t.*, s.nama_siswa 
                         FROM transaksi t 
                         JOIN siswa s ON t.id_siswa = s.id_siswa 
                         ORDER BY t.id_transaksi DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Pembelian - Kantin Sekolah</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- SweetAlert2 JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        body {
            background: #f8f9fa;
            padding: 20px;
        }
        .card-custom {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
            margin-bottom: 20px;
        }
        .card-custom:hover {
            transform: translateY(-2px);
        }
        .product-category {
            background: #f1f1f1;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .stock-badge {
            font-size: 0.9em;
            padding: 5px 10px;
        }
        .search-box {
            max-width: 300px;
            margin-bottom: 20px;
        }
        .product-card {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            margin-bottom: 10px;
            transition: all 0.2s;
        }
        .product-card:hover {
            background-color: #f8f9fa;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .hidden {
            display: none;
        }
        .total-section {
            background-color: #e9f7ef;
            border-radius: 8px;
            padding: 15px;
            margin-top: 20px;
        }
        .select2-container .select2-selection--single {
            height: 38px!important;
            padding: 5px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">
                <i class="fas fa-cash-register me-2"></i>Transaksi Pembelian
            </h1>
            <a href="admin_dashboard.php" class="btn btn-primary">
                <i class="fas fa-arrow-left me-2"></i>Kembali
            </a>
        </div>

        <!-- Tambah Transaksi Card -->
        <div class="card card-custom">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Tambah Transaksi Baru</h4>
            </div>
            <div class="card-body">
                <form method="POST" id="transaksiForm">
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Pilih Siswa:</label>
                            <select class="form-select select2-siswa" name="id_siswa" required>
                                <option value="">-- Cari Siswa --</option>
                                <?php 
                                $siswa->data_seek(0);
                                while ($s = $siswa->fetch_assoc()): ?>
                                    <option value="<?= $s['id_siswa'] ?>">
                                        <?= htmlspecialchars($s['nama_siswa']) ?> - 
                                        <?= $s['kelas'] ?> <?= $s['jurusan'] ?>
                                        (Saldo: Rp <?= number_format($s['saldo'], 0, ',', '.') ?>)
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>

                    <h5 class="mb-3"><i class="fas fa-boxes me-2"></i>Pilih Produk:</h5>
                    
                    <!-- Product Search Box -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" class="form-control" id="productSearch" placeholder="Cari produk...">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <?php
                        $produk_by_kategori = $conn->query("
                            SELECT p.*, k.nama_kategori 
                            FROM produk p
                            JOIN kategori k ON p.id_kategori = k.id_kategori
                            ORDER BY k.nama_kategori, p.nama_produk
                        ");
                        
                        $current_category = '';
                        while ($p = $produk_by_kategori->fetch_assoc()):
                            if ($current_category != $p['nama_kategori']) {
                                if ($current_category != '') echo '</div></div>';
                                echo '<div class="col-md-4 category-container" id="category-'.$p['id_kategori'].'">
                                        <div class="product-category">
                                            <h6>'.$p['nama_kategori'].'</h6>';
                                $current_category = $p['nama_kategori'];
                            }
                        ?>
                            <div class="product-card" data-product-name="<?= strtolower(htmlspecialchars($p['nama_produk'])) ?>">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h6 class="mb-0"><?= htmlspecialchars($p['nama_produk']) ?></h6>
                                    <span class="badge stock-badge bg-<?= $p['stok'] > 0 ? 'success' : 'danger' ?>">
                                        Stok: <?= $p['stok'] ?>
                                    </span>
                                </div>
                                <div class="row g-2">
                                    <div class="col-7">
                                        <p class="mb-0 text-muted">Harga: Rp <?= number_format($p['harga'], 0, ',', '.') ?></p>
                                    </div>
                                    <div class="col-5">
                                        <input type="number" 
                                               class="form-control form-control-sm product-quantity" 
                                               name="produk[<?= $p['id_produk'] ?>]" 
                                               data-price="<?= $p['harga'] ?>"
                                               value="0" 
                                               min="0" 
                                               max="<?= $p['stok'] ?>">
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        </div></div> <!-- Tutup kategori terakhir -->
                    </div>
                    
                    <!-- Total Section -->
                    <div class="total-section mt-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-2">
                                    <h6>Ringkasan Pembelian:</h6>
                                    <div id="orderSummary">
                                        <p class="text-muted">Belum ada produk dipilih</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5>Total Item:</h5>
                                    <h5 id="totalItems">0</h5>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h4>Total Harga:</h4>
                                    <h4 class="text-success" id="totalPrice">Rp 0</h4>
                                </div>
                                <button class="btn btn-success w-100" name="tambah" type="submit">
                                    <i class="fas fa-save me-2"></i>Tambah Transaksi
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


<!-- Riwayat Transaksi Card -->
<div class="card card-custom">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0"><i class="fas fa-history me-2"></i>Riwayat Transaksi</h4>
    </div>
    <div class="card-body">
        <div class="search-box mb-4">
            <div class="input-group">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
                <input type="text" 
                       class="form-control" 
                       id="searchInput" 
                       placeholder="Cari transaksi...">
            </div>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama Siswa</th>
                        <th>Tanggal</th>
                        <th>Detail Pembelian</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="transactionTable">
                    <?php 
                    $riwayat->data_seek(0);
                    $counter = 1;
                    while ($r = $riwayat->fetch_assoc()):
                        $id = $r['id_transaksi'];
                        $detail = $conn->query("
                            SELECT d.*, p.nama_produk, p.harga 
                            FROM detail_transaksi d 
                            JOIN produk p ON d.id_produk = p.id_produk 
                            WHERE d.id_transaksi = $id
                        ");
                        
                        // Format detail produk
                        $products = [];
                        $totalItems = 0;
                        while ($d = $detail->fetch_assoc()) {
                            $products[] = "
                                <div class='product-detail'>
                                    {$d['nama_produk']} 
                                    <span class='text-muted'>({$d['jumlah']} x Rp ".number_format($d['harga'],0,',','.').")</span>
                                    <span class='text-success'>Rp ".number_format($d['jumlah'] * $d['harga'],0,',','.')."</span>
                                </div>
                            ";
                            $totalItems += $d['jumlah'];
                        }
                    ?>
                    <tr class="transaction-row" data-siswa="<?= strtolower(htmlspecialchars($r['nama_siswa'])) ?>">
                        <td><?= $counter++ ?></td>
                        <td><?= htmlspecialchars($r['nama_siswa']) ?></td>
                        <td><?= date('d M Y H:i', strtotime($r['tanggal_transaksi'])) ?></td>
                        <td>
                            <div class="mb-2">
                                <strong>Total Item:</strong> <?= $totalItems ?>
                            </div>
                            <?= implode('', $products) ?>
                        </td>
                        <td class="text-success fw-bold">
                            Rp <?= number_format($r['total_bayar'],0,',','.') ?>
                        </td>
                        <td>
                            <a href="?hapus=<?= $r['id_transaksi'] ?>" 
                               class="btn btn-sm btn-danger"
                               onclick="return confirm('Hapus transaksi ini?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize Select2 for student search
            $('.select2-siswa').select2({
                placeholder: "Cari siswa...",
                width: '100%'
            });
            
            // Product search functionality
            $('#productSearch').on('keyup', function() {
                const searchTerm = $(this).val().toLowerCase();
                
                $('.product-card').each(function() {
                    const productName = $(this).data('product-name');
                    if (productName.includes(searchTerm)) {
                        $(this).removeClass('hidden');
                    } else {
                        $(this).addClass('hidden');
                    }
                });
                
                // Show/hide categories based on visible products
                $('.category-container').each(function() {
                    const hasVisibleProducts = $(this).find('.product-card:not(.hidden)').length > 0;
                    $(this).toggle(hasVisibleProducts);
                });
            });
            
            // Search functionality for transaction history
            $('#searchInput').on('keyup', function() {
                const searchTerm = $(this).val().toLowerCase();
                
                $('.transaction-row').each(function() {
                    const siswa = $(this).data('siswa') || '';
                    const produk = $(this).data('produk') || '';
                    const rowText = $(this).text().toLowerCase();
                    
                    if (siswa.includes(searchTerm) || produk.includes(searchTerm) || rowText.includes(searchTerm)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
            
            // Calculate total price as quantities change
            function updateTotal() {
                let totalItems = 0;
                let totalPrice = 0;
                let orderSummary = '';
                
                $('.product-quantity').each(function() {
                    const quantity = parseInt($(this).val()) || 0;
                    if (quantity > 0) {
                        const price = parseInt($(this).data('price')) || 0;
                        const subtotal = quantity * price;
                        totalItems += quantity;
                        totalPrice += subtotal;
                        
                        // Get product name
                        const productName = $(this).closest('.product-card').find('h6').text();
                        orderSummary += `<div class="d-flex justify-content-between mb-1">
                                           <span>${quantity}x ${productName}</span>
                                           <span>Rp ${subtotal.toLocaleString('id-ID')}</span>
                                         </div>`;
                    }
                });
                
                // Update the display
                $('#totalItems').text(totalItems);
                $('#totalPrice').text(`Rp ${totalPrice.toLocaleString('id-ID')}`);
                
                if (orderSummary === '') {
                    $('#orderSummary').html('<p class="text-muted">Belum ada produk dipilih</p>');
                } else {
                    $('#orderSummary').html(orderSummary);
                }
            }
            
            // Call updateTotal whenever a quantity changes
            $('.product-quantity').on('change', updateTotal);
            
            // Form validation before submission
            $('#transaksiForm').on('submit', function(e) {
                let hasProducts = false;
                $('.product-quantity').each(function() {
                    if (parseInt($(this).val()) > 0) {
                        hasProducts = true;
                        return false; // break the loop
                    }
                });
                
                if (!hasProducts) {
                    e.preventDefault();
                    alert('Silakan pilih minimal 1 produk');
                    return false;
                }
                
                return true;
            });
        });
    </script>
</body>
</html>