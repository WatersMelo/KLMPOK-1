
## 📦 Manajemen Produk

### 🧾 Deskripsi Fitur
Fitur ini memungkinkan pengguna (admin/staff) untuk **mengelola data produk** yang tersedia di kantin, termasuk:
- Menambahkan produk baru
- Mengedit informasi produk
- Menghapus produk
- Menampilkan daftar produk lengkap beserta kategori
### 🛠️ Struktur Tabel `produk`
```sql
CREATE TABLE produk (
    id_produk INT AUTO_INCREMENT PRIMARY KEY,
    nama_produk VARCHAR(100),
    harga INT,
    stok INT,
    id_kategori INT,
    FOREIGN KEY (id_kategori) REFERENCES kategori(id_kategori)
);
```
### 🔄 Fungsi CRUD
- **Tambah**: Menyimpan produk baru melalui form.
- **Edit**: Mengubah data produk langsung dari tabel.
- **Hapus**: Menghapus produk berdasarkan `id_produk`.
- **Tampil**: Menggunakan `LEFT JOIN` ke tabel `kategori` untuk menampilkan nama kategori.
### 📄 Cuplikan Code
```php
// Tambah Produk
$conn->query("INSERT INTO produk (nama_produk, harga, stok, id_kategori) VALUES ('$nama', $harga, $stok, $kategori)");

// Edit Produk
$conn->query("UPDATE produk SET nama_produk = '$nama', harga = $harga, stok = $stok, id_kategori = $kategori WHERE id_produk = $id");

// Hapus Produk
$conn->query("DELETE FROM produk WHERE id_produk = $id");

// Tampilkan Produk + Kategori
$produk = $conn->query("SELECT p.*, k.nama_kategori FROM produk p LEFT JOIN kategori k ON p.id_kategori = k.id_kategori");
```
---
## 💰 Transaksi Pembelian
### 🧾 Deskripsi Fitur
Fitur ini mengatur **transaksi pembelian produk** oleh siswa. Dalam satu transaksi, siswa dapat membeli beberapa produk. Sistem akan secara otomatis mengurangi stok produk dan menyimpan detail pembelian.
### 🛠️ Struktur Tabel
```sql
CREATE TABLE transaksi (
    id_transaksi INT AUTO_INCREMENT PRIMARY KEY,
    id_siswa INT,
    tanggal DATE,
    FOREIGN KEY (id_siswa) REFERENCES siswa(id_siswa)
);

CREATE TABLE detail_transaksi (
    id_detail INT AUTO_INCREMENT PRIMARY KEY,
    id_transaksi INT,
    id_produk INT,
    jumlah INT,
    FOREIGN KEY (id_transaksi) REFERENCES transaksi(id_transaksi),
    FOREIGN KEY (id_produk) REFERENCES produk(id_produk)
);
```
### 🔄 Fungsi Transaksi
- **Tambah**: Input transaksi dari form siswa + produk. Stok otomatis berkurang.
- **Edit Jumlah**: Update jumlah produk dalam transaksi, stok ikut berubah sesuai selisih.
- **Hapus Transaksi**: Menghapus transaksi dan mengembalikan stok.
- **Riwayat**: Menampilkan seluruh transaksi bergabung dengan data siswa.
### 📄 Cuplikan Code
```php
// Tambah Transaksi
$conn->query("INSERT INTO transaksi (id_siswa, tanggal) VALUES ('$id_siswa', '$tanggal')");
$id_transaksi = $conn->insert_id;
$conn->query("INSERT INTO detail_transaksi (id_transaksi, id_produk, jumlah) VALUES (...)");
$conn->query("UPDATE produk SET stok = stok - $jumlah");

// Update Jumlah Produk
$conn->query("UPDATE produk SET stok = stok - $selisih WHERE id_produk = $id_produk");
$conn->query("UPDATE detail_transaksi SET jumlah = $jumlah_baru WHERE id_detail = $id_detail");

// Hapus Transaksi
$conn->query("UPDATE produk SET stok = stok + jumlah");
$conn->query("DELETE FROM detail_transaksi WHERE id_transaksi = $id");
$conn->query("DELETE FROM transaksi WHERE id_transaksi = $id");
```
## ✅ Kesimpulan
- Sistem ini sudah mendukung **CRUD Produk** dan **Transaksi pembelian** dengan pengurangan/penambahan stok otomatis.
- Proses yang diutamakan adalah efisiensi dalam manajemen produk dan akurasi stok barang.
- Cocok untuk digunakan di lingkungan sekolah/kantin kecil dengan sistem sederhana.
