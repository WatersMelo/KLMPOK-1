<?php
$conn = new mysqli("localhost", "root", "", "skaven_rpl");

// Cegah error ketika SQL gagal
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Proses Tambah
if (isset($_POST['tambah'])) {
    $nama = $conn->real_escape_string($_POST['nama']);
    $harga = (int)$_POST['harga'];
    $stok = (int)$_POST['stok'];
    $kategori = (int)$_POST['kategori'];

    $conn->query("INSERT INTO produk (nama_produk, harga, stok, id_kategori)
                  VALUES ('$nama', $harga, $stok, $kategori)");
    header("Location: manajemen_produk.php");
    exit;
}

// Proses Edit
if (isset($_POST['edit'])) {
    $id = (int)$_POST['id'];
    $nama = $conn->real_escape_string($_POST['nama']);
    $harga = (int)$_POST['harga'];
    $stok = (int)$_POST['stok'];
    $kategori = (int)$_POST['kategori'];

    $conn->query("UPDATE produk SET 
        nama_produk = '$nama',
        harga = $harga,
        stok = $stok,
        id_kategori = $kategori
        WHERE id_produk = $id");
    header("Location: manajemen_produk.php");
    exit;
}

// Proses Hapus
if (isset($_GET['hapus'])) {
    $id = (int)$_GET['hapus'];
    $conn->query("DELETE FROM produk WHERE id_produk = $id");
    header("Location: manajemen_produk.php");
    exit;
}

// Ambil data kategori
$kategori = $conn->query("SELECT * FROM kategori");

// Ambil semua produk dengan nama kategori
$produk = $conn->query("
    SELECT p.*, k.nama_kategori 
    FROM produk p
    LEFT JOIN kategori k ON p.id_kategori = k.id_kategori
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk - Kantin Sekolah</title>
    
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
        .stock-badge {
            font-size: 0.9em;
            padding: 8px 12px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">
                <i class="fas fa-box-open me-2"></i>Manajemen Produk
            </h1>
            <a href="admin_dashboard.php" class="btn btn-primary">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Dashboard
            </a>
        </div>

         <!-- Add Product Card -->
         <div class="card card-custom" data-aos="fade-up">
            <div class="card-header bg-success text-white">
                <h4 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Tambah Produk Baru</h4>
            </div>
            <div class="card-body">
                <form method="POST" class="row g-3">
                    <div class="col-md-4">
                        <input type="text" name="nama" class="form-control" placeholder="Nama Produk" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="harga" class="form-control" placeholder="Harga" required>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="stok" class="form-control" placeholder="Stok" required>
                    </div>
                    <div class="col-md-3">
                        <select name="kategori" class="form-select" required>
                            <option value="">Pilih Kategori</option>
                            <?php 
                            $kategori->data_seek(0);
                            while ($k = $kategori->fetch_assoc()): ?>
                                <option value="<?= $k['id_kategori'] ?>">
                                    <?= htmlspecialchars($k['nama_kategori']) ?>
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-1">
                        <button type="submit" name="tambah" class="btn btn-success w-100">
                            <i class="fas fa-save"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Products Table Card -->
        <div class="card card-custom mb-4" data-aos="fade-up">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-list-ul me-2"></i>Daftar Produk</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; while ($row = $produk->fetch_assoc()): ?>
                            <tr data-aos="fade-right">
                                <td><?= $no++ ?></td>
                                <td class="fw-bold"><?= htmlspecialchars($row['nama_produk']) ?></td>
                                <td class="text-success">Rp<?= number_format($row['harga'], 0, ',', '.') ?></td>
                                <td>
                                    <span class="badge stock-badge bg-<?= $row['stok'] > 0 ? 'success' : 'danger' ?>">
                                        <?= $row['stok'] ?> Unit
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        <?= htmlspecialchars($row['nama_kategori']) ?>
                                    </span>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-warning btn-action" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModal<?= $row['id_produk'] ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a href="?hapus=<?= $row['id_produk'] ?>" 
                                        class="btn btn-sm btn-danger btn-action"
                                        onclick="return confirm('Yakin menghapus produk ini?')">
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

    <!-- Edit Modals -->
    <?php 
    $produk->data_seek(0);
    while ($row = $produk->fetch_assoc()): 
    ?>
    <div class="modal fade" id="editModal<?= $row['id_produk'] ?>" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title"><i class="fas fa-edit me-2"></i>Edit Produk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="id" value="<?= $row['id_produk'] ?>">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" name="nama" class="form-control" 
                                   value="<?= htmlspecialchars($row['nama_produk']) ?>" required>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Harga</label>
                                <input type="number" name="harga" class="form-control" 
                                       value="<?= $row['harga'] ?>" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Stok</label>
                                <input type="number" name="stok" class="form-control" 
                                       value="<?= $row['stok'] ?>" required>
                            </div>
                        </div>
                        <div class="mt-3">
                            <label class="form-label">Kategori</label>
                            <select name="kategori" class="form-select" required>
                                <?php 
                                $kategori->data_seek(0);
                                while ($k = $kategori->fetch_assoc()): ?>
                                    <option value="<?= $k['id_kategori'] ?>" 
                                        <?= $k['id_kategori'] == $row['id_kategori'] ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($k['nama_kategori']) ?>
                                    </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Batal
                        </button>
                        <button type="submit" name="edit" class="btn btn-warning">
                            <i class="fas fa-save me-2"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php endwhile; ?>

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