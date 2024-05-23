<?php
include 'koneksi.php';

// --- Proses Tambah/Edit ---
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_siswa = $_POST['id_siswa'] ?? null;
    $nama     = $_POST['nama_siswa'];
    $kelas    = $_POST['kelas'];
    $jurusan  = $_POST['jurusan'];
    $jk       = $_POST['jenis_kelamin'];
    $saldo    = $_POST['saldo'];

    if ($id_siswa) {
        // Update
        $query = $koneksi->prepare("UPDATE siswa SET nama_siswa=?, kelas=?, jurusan=?, jenis_kelamin=?, saldo=? WHERE id_siswa=?");
        $query->bind_param("ssssii", $nama, $kelas, $jurusan, $jk, $saldo, $id_siswa);
    } else {
        // Tambah
        $query = $koneksi->prepare("INSERT INTO siswa (nama_siswa, kelas, jurusan, jenis_kelamin, saldo) VALUES (?, ?, ?, ?, ?)");
        $query->bind_param("ssssi", $nama, $kelas, $jurusan, $jk, $saldo);
    }
    $query->execute();
    header("Location: manajemen_siswa.php");
    exit;
}

// --- Proses Hapus ---
if (isset($_GET['hapus'])) {
    $id_hapus = $_GET['hapus'];
    $koneksi->query("DELETE FROM siswa WHERE id_siswa = $id_hapus");
    header("Location: manajemen_siswa.php");
    exit;
}

// --- Ambil data untuk form edit ---
$edit_data = null;
if (isset($_GET['edit'])) {
    $id_edit = $_GET['edit'];
    $result = $koneksi->query("SELECT * FROM siswa WHERE id_siswa = $id_edit");
    $edit_data = $result->fetch_assoc();
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Siswa - Kantin Sekolah</title>
    
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
            transform: translateY(-2px);
        }
        .saldo-badge {
            font-size: 0.9em;
            padding: 8px 15px;
            min-width: 120px;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(33, 150, 243, 0.05);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">
                <i class="fas fa-users-class me-2"></i>Manajemen Siswa
            </h1>
            <div>
                <a href="admin_dashboard.php" class="btn btn-primary me-2">
                    <i class="fas fa-arrow-left me-2"></i>Kembali
                </a>
                <a href="manajemen_siswa.php" class="btn btn-success">
                    <i class="fas fa-user-plus me-2"></i>Tambah Siswa
                </a>
            </div>
        </div>
        
<!-- Form Tambah/Edit -->
<div class="card mb-4" data-aos="fade-down">
    <div class="card-header bg-success text-white">
        <h5 class="mb-0"><?= $edit_data ? 'Edit Siswa' : 'Tambah Siswa' ?></h5>
    </div>
    <div class="card-body">
        <form method="POST" action="">
            <?php if ($edit_data): ?>
                <input type="hidden" name="id_siswa" value="<?= $edit_data['id_siswa'] ?>">
            <?php endif; ?>
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="nama_siswa" class="form-control" required placeholder="Nama Siswa"
                        value="<?= $edit_data['nama_siswa'] ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <input type="text" name="kelas" class="form-control" required placeholder="Kelas"
                        value="<?= $edit_data['kelas'] ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <input type="text" name="jurusan" class="form-control" required placeholder="Jurusan"
                        value="<?= $edit_data['jurusan'] ?? '' ?>">
                </div>
                <div class="col-md-2">
                    <select name="jenis_kelamin" class="form-select" required>
                        <option value="">Pilih JK</option>
                        <option value="L" <?= (isset($edit_data) && $edit_data['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="P" <?= (isset($edit_data) && $edit_data['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <input type="number" name="saldo" class="form-control" required placeholder="Saldo"
                        value="<?= $edit_data['saldo'] ?? 0 ?>">
                </div>
            </div>
            <div class="mt-3">
                <button class="btn btn-success" type="submit">
                    <i class="fas fa-save me-2"></i><?= $edit_data ? 'Simpan Perubahan' : 'Tambah' ?>
                </button>
                <?php if ($edit_data): ?>
                    <a href="manajemen_siswa.php" class="btn btn-secondary ms-2">Batal</a>
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>

        <!-- Student Table Card -->
        <div class="card card-custom" data-aos="fade-up">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0"><i class="fas fa-list-ul me-2"></i>Daftar Siswa</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Jenis Kelamin</th>
                                <th>Saldo</th>
                                <th>Total Transaksi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $query = $koneksi->query("
                                 SELECT siswa.*, 
                                    COUNT(transaksi.id_transaksi) AS jumlah_transaksi,
                                    COALESCE(SUM(transaksi.total_bayar), 0) AS total_transaksi
                                FROM siswa
                                LEFT JOIN transaksi ON siswa.id_siswa = transaksi.id_siswa
                                GROUP BY siswa.id_siswa
                            ");
                            while ($data = $query->fetch_assoc()):
                            ?>
                            <tr data-aos="fade-right" data-aos-delay="<?= $no * 50 ?>">
                                <td><?= $no++ ?></td>
                                <td class="fw-bold"><?= htmlspecialchars($data['nama_siswa']) ?></td>
                                <td><?= htmlspecialchars($data['kelas']) ?></td>
                                <td><?= htmlspecialchars($data['jurusan']) ?></td>
                                <td>
                                    <span class="badge bg-info">
                                        <?= $data['jenis_kelamin'] == 'L' ? 'Laki-laki' : 'Perempuan' ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge saldo-badge bg-<?= $data['saldo'] > 0 ? 'success' : 'secondary' ?>">
                                        <i class="fas fa-wallet me-2"></i>Rp <?= number_format($data['saldo'], 0, ',', '.') ?>
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-primary saldo-badge">
                                        <i class="fas fa-receipt me-2"></i>Rp <?= number_format($data['total_transaksi'], 0, ',', '.') ?>
                                    </span>
                                </td>
                                <td>
                                <a href="manajemen_siswa.php?edit=<?= $data['id_siswa'] ?>" 
    class="btn btn-sm btn-warning me-2">
    <i class="fas fa-edit"></i>
</a>
<a href="manajemen_siswa.php?hapus=<?= $data['id_siswa'] ?>" 
    class="btn btn-sm btn-danger" 
    onclick="return confirm('Yakin ingin menghapus siswa ini?')">
    <i class="fas fa-trash"></i>
</a>

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