# Buat Database baru

## **1. Membuat Database Baru**

TESTTT
tess
tess
tesss

Untuk membuat database baru, gunakan perintah `CREATE DATABASE` di SQL. Berikut adalah contoh sintaks untuk membuat database: 
```sql
CREATE DATABASE nama_database;
```

Contoh : 
```sql
CREATE DATABASE pegawai;
```

Hasil : 

![](praktikkum%202/RIPALDO/Assets/database1.png)

- **`CREATE DATABASE`**: Perintah SQL untuk membuat database baru.
- **`nama_database`**: Nama yang Anda pilih untuk database baru. Nama ini harus unik dalam server database dan tidak boleh mengandung spasi.
# Membuat Table
*STRUKTUR "*
```sql

CREATE TABLE pegawai (
-> NIP INT PRIMARY KEY,
-> NDep VARCHAR(255) NOT NULL,
-> NBlk VARCHAR(255),
-> JK ENUM('L', 'P') NOT NULL,
-> Alamat TEXT NOT NULL,
-> Telp VARCHAR(255) NOT NULL,
Jabatan ENUM('Manager', 'Supervisor', 'Staff'),
    Gaji BIGINT NOT NULL,
    NoCab VARCHAR(255) NOT NULL
);
```

*HASIL :*

![](praktikkum%202/RIPALDO/Assets/create.png)

- `NIP` (tipe integer, berfungsi sebagai primary key)
- `NDep` (string yang tidak boleh kosong, mewakili nama depan)
- `NBlk` (string, mewakili nama belakang)
- `JK` (enum dengan nilai 'L' atau 'P', mewakili jenis kelamin, dan tidak boleh kosong)
- `Alamat` (teks yang tidak boleh kosong untuk alamat)
- `Telp` (string yang tidak boleh kosong untuk nomor telepon)
- `Jabatan` (enum dengan nilai 'Manager', 'Supervisor', atau 'Staff')
- `Gaji` (big integer yang tidak boleh kosong, mewakili gaji)
- `NoCab` (string yang tidak boleh kosong, kemungkinan mewakili nomor cabang atau kantor)

Untuk penjelasan lanjutnya kita lanjut di materi selanjutnya. Dengan mengecek Struktur Table....
# Mengecek Struktur Table

Untuk mengecek struktur pada table, kita menggunakan perintah `Desc`

Struktur : 
```sql
DESC nama_table
```

Contoh : 
```sql
DESC pegawai
```


![](praktikkum%202/RIPALDO/Assets/desc.png)


*PENJELASAN :*
> Deskripsi Tabel Pegawai

1. NIP (INT, PRIMARY KEY)

- NIP: Menyimpan Nomor Induk Pegawai. Tipe data ini adalah integer (INT).
- PRIMARY KEY: Menandakan bahwa NIP adalah kunci utama untuk tabel ini. Artinya, setiap Nomor Induk Pegawai harus unik dan tidak boleh kosong (NULL).

2. NDep (VARCHAR(255), NOT NULL)

- NDep: Menyimpan Nama Depan pegawai. Tipe data ini adalah string dengan panjang maksimum 255 karakter (VARCHAR(255)).
- NOT NULL: Kolom ini harus diisi; tidak boleh kosong (NULL).

3. NBlk (VARCHAR(255))

- NBlk: Menyimpan Nama Belakang pegawai. Tipe data ini adalah string dengan panjang maksimum 255 karakter (VARCHAR(255)).
- NULL YES: Kolom ini bisa kosong (NULL) jika tidak ada nilai.

4. JK (ENUM('L', 'P'), NOT NULL)

- JK: Menyimpan Jenis Kelamin pegawai. Tipe data ini adalah ENUM dengan dua pilihan: 'L' untuk Laki-laki dan 'P' untuk Perempuan.
- NOT NULL: Kolom ini harus diisi dengan salah satu dari nilai yang diperbolehkan; tidak boleh kosong (NULL).

5. Alamat (TEXT, NOT NULL)

- Alamat: Menyimpan alamat pegawai. Tipe data ini adalah TEXT, yang memungkinkan penyimpanan teks dalam jumlah besar.
- NOT NULL: Kolom ini harus diisi; tidak boleh kosong (NULL).

6. Telp (VARCHAR(255), NOT NULL)

- Telp: Menyimpan nomor telepon pegawai. Tipe data ini adalah string dengan panjang maksimum 255 karakter (VARCHAR(255)).
- NOT NULL: Kolom ini harus diisi; tidak boleh kosong (NULL).

7. Jabatan (ENUM('Manajer', 'Supervisor', 'Staf'))

- Jabatan: Menyimpan jabatan pegawai. Tipe data ini adalah ENUM dengan tiga pilihan: 'Manajer', 'Supervisor', atau 'Staf'.
- NULL YES: Kolom ini bisa kosong (NULL) jika tidak ada nilai.

8. Gaji (BIGINT, NOT NULL)

- Gaji: Menyimpan gaji pegawai. Tipe data ini adalah BIGINT, yang memungkinkan penyimpanan angka dalam jumlah sangat besar.
- NOT NULL: Kolom ini harus diisi; tidak boleh kosong (NULL).

9. NoCab (VARCHAR(255), NOT NULL)

- NoCab: Menyimpan nomor cabang pegawai. Tipe data ini adalah string dengan panjang maksimum 255 karakter (VARCHAR(255)).
- NOT NULL: Kolom ini harus diisi; tidak boleh kosong (NULL).
# Mengisi data pada table
*STRUKTUR "*
```sql
INSERT INTO pegawai (NIP, NDep, NBlk, JK, Alamat, Telp, Jabatan, Gaji, NoCab) VALUES 
-> (10107, 'Emya', 'Salsalina', 'P', 'JL. Suci 78 Bandung', '022-555768', 'Manager', 5250000, 'C101'), 
-> (10246, 'Dian', 'Anggraini', 'P', 'JL. Mawar 5 Semarang', '024-555102', 'Supervisor', 2750000, 'C103'), 
-> (10324, 'Martin', 'Susanto', 'L', 'JL. Bima 51 Jakarta', '021-555785', 'Staff', 1750000, 'C102'), 
-> (10252, 'Antoni', 'Irawan', 'L', 'JL. A. Yani 15 Jakarta', '021-555888', 'Manager', 5750000, 'C102'), 
-> (10176, 'Diah', 'Wahyuni', 'P', 'JL. Maluku 56 Bandung', '022-555934', 'Supervisor', 2500000, 'C101'), 
-> (10314, 'Ayu', 'Rahmadani', 'P', 'JL. Malaka 342 Jakarta', '021-555098', 'Supervisor', 1950000, 'C102'), 
-> (10307, 'Erik', 'Adrian', 'L', 'JL. Manggis 5 Semarang', '024-555236', 'Manager', 6250000, 'C103'), 
-> (10415, 'Susan', 'Sumantri', 'P', 'JL. Pahlawan 24 Surabaya', '031-555120', '', 2650000, 'C104'), 
-> (10407, 'Rio', 'Gunawan', 'L', 'JL. Melati 356 Surabaya', '031-555231', 'Staff', 1725000, 'C104');
```

*PENJELASAN :*
1.  **`INSERT INTO pegawai`**:
    
    - Ini adalah perintah SQL yang digunakan untuk menambahkan data baru ke tabel yang bernama **`pegawai`**.
- **Kolom yang Diisi**:
    
    - Dalam perintah ini, Anda menentukan kolom-kolom di tabel `pegawai` yang akan diisi dengan data. Kolom-kolom tersebut adalah:
        - **NIP**: Nomor Induk Pegawai
        - **NDep**: Nama Depan
        - **NBlk**: Nama Belakang
        - **JK**: Jenis Kelamin
        - **Alamat**: Alamat
        - **Telp**: Nomor Telepon
        - **Jabatan**: Jabatan
        - **Gaji**: Gaji
        - **NoCab**: Nomor Cabang
2. **`VALUES`**:
    
    - Setelah menentukan kolom-kolom yang akan diisi, Anda menyebutkan data yang akan dimasukkan. Data untuk setiap baris harus mengikuti urutan kolom yang telah disebutkan.
- **Contoh Data yang Dimasukkan**:
    
    - **Baris Pertama**:
        - **NIP**: 10107
        - **NDep**: 'Emya'
        - **NBlk**: 'Salsalina'
        - **JK**: 'P' (Perempuan)
        - **Alamat**: 'JL. Suci 78 Bandung'
        - **Telp**: '022-555768'
        - **Jabatan**: 'Manager'
        - **Gaji**: 5.250.000
        - **NoCab**: 'C101'
    - **Baris Berikutnya**:
        - Mengikuti format yang sama dengan data yang berbeda untuk setiap kolom.
- **Catatan Penting**:
    
    - **Kolom Jabatan**: Pada baris data dengan **NIP** 10415 untuk **Susan Sumantri**, kolom Jabatan tidak diisi (`''`). Jika kolom Jabatan adalah ENUM (jenis kelamin) dan tidak mengizinkan nilai kosong, ini dapat menyebabkan masalah. Pastikan kolom Jabatan diisi dengan nilai yang valid seperti 'Staff' jika kolom tersebut tidak mengizinkan nilai kosong.
    - **Pembaruan Data**: Jika kolom Jabatan mengizinkan nilai kosong, Anda mungkin perlu memperbarui baris ini dengan jabatan yang sesuai. Jika tidak, Anda mungkin perlu menyesuaikan skema tabel untuk mengizinkan nilai kosong.
**Hasil** :

![](praktikkum%202/RIPALDO/Assets/isidata.png)


# Menghitung jumlah entri atau baris dalam kolom tertentu

![](praktikkum%202/RIPALDO/Assets/lanjutan1.png)


### 1. **SELECT**

- Perintah `SELECT` digunakan untuk memilih data dari satu atau lebih tabel dalam database.

### 2. **COUNT(NIP) AS JumlahPegawai**

- Fungsi `COUNT()` digunakan untuk menghitung jumlah baris yang berisi nilai non-null dalam kolom yang ditentukan.
- `NIP` adalah nama kolom dalam tabel `pegawai`. Jika tidak ada nilai null dalam kolom ini, fungsi ini akan menghitung jumlah total entri atau baris.
- `AS JumlahPegawai` memberi alias pada hasil dari `COUNT(NIP)`. Ini berarti hasil perhitungan akan diberi nama `JumlahPegawai`, yang dapat digunakan sebagai nama kolom dalam hasil output.

**Contoh**: Jika ada 100 baris dalam kolom `NIP`, maka hasil dari `COUNT(NIP)` akan menjadi 100, dan ini akan ditampilkan sebagai `JumlahPegawai`.

### 3. **COUNT(Jabatan) AS JumlahJabatan**

- Sama seperti pada `COUNT(NIP)`, fungsi `COUNT(Jabatan)` menghitung jumlah entri non-null dalam kolom `Jabatan`.
- `AS JumlahJabatan` memberi alias pada hasil perhitungan sehingga hasil dari `COUNT(Jabatan)` akan ditampilkan dengan nama `JumlahJabatan`.

**Contoh**: Jika ada 95 baris dalam kolom `Jabatan` (dengan asumsi ada beberapa baris null), maka hasil dari `COUNT(Jabatan)` akan menjadi 95, dan ini akan ditampilkan sebagai `JumlahJabatan`.

### 4. **FROM pegawai**

- Perintah ini menentukan tabel tempat pengambilan data. Dalam hal ini, tabel yang dimaksud adalah `pegawai`.
  
  Hasilnya akan menunjukkan dua angka: satu untuk jumlah total pegawai (`JumlahPegawai`) dan satu lagi untuk jumlah pegawai dengan jabatan (`JumlahJabatan`).


# Menghitung jumlah pegawai yang terdaftar di cabang tertentu

![](praktikkum%202/RIPALDO/Assets/lanjutan2.png)

- **COUNT(NIP)**: Fungsi ini digunakan untuk menghitung jumlah baris dalam kolom `NIP` yang memiliki nilai non-null. Ini berarti fungsi akan menghitung berapa kali NIP (Nomor Induk Pegawai) muncul dalam tabel `pegawai`. Jika ada NIP yang null, baris tersebut tidak akan dihitung.
    
- **AS JumlahPegawai**: Bagian ini memberikan alias pada hasil dari `COUNT(NIP)`. Ini berarti hasil perhitungan akan diberi nama `JumlahPegawai`. Jadi, ketika hasilnya ditampilkan, kolom hasil perhitungan akan diberi nama `JumlahPegawai`, yang menggambarkan total pegawai dalam cabang tertentu.
    
- **FROM pegawai**: Bagian ini menentukan tabel dari mana data akan diambil. Dalam hal ini, data diambil dari tabel `pegawai`, yang merupakan tabel yang menyimpan informasi tentang pegawai.
    
- **WHERE NoCab = 'C102'**: Bagian ini adalah kondisi yang menyaring data. Hanya baris-baris dalam tabel `pegawai` yang memiliki nilai `NoCab` sama dengan 'C102' yang akan dihitung. `NoCab` adalah kolom yang menyimpan kode cabang, dan 'C102' adalah kode cabang spesifik yang sedang dihitung.
    

Hasil akhir dari perintah ini akan menampilkan jumlah pegawai yang terdaftar di cabang dengan kode `C102`, dan hasilnya akan ditampilkan dengan nama alias `JumlahPegawai`.

# Menghitung jumlah pegawai di setiap cabang yang berbeda

![](praktikkum%202/RIPALDO/Assets/lanjutan3.png)


- **NoCab**: Kolom ini mewakili kode cabang (`NoCab`). Perintah ini akan mengelompokkan data berdasarkan cabang yang berbeda, sehingga hasil akhirnya akan mencantumkan kode cabang bersama dengan jumlah pegawai di cabang tersebut.
    
- **COUNT(NIP) AS Jumlah_Pegawai**: Fungsi `COUNT(NIP)` menghitung jumlah baris dalam kolom `NIP` yang memiliki nilai non-null, untuk setiap kelompok `NoCab`. Alias `Jumlah_Pegawai` digunakan untuk memberi nama hasil perhitungan ini. Ini berarti hasil perhitungan akan menampilkan jumlah pegawai yang terdaftar di setiap cabang, dan hasilnya akan diberi nama `Jumlah_Pegawai`.
    
- **FROM pegawai**: Bagian ini menentukan tabel dari mana data diambil, yaitu `pegawai`. Ini adalah tabel yang berisi data tentang pegawai, termasuk informasi tentang cabang mereka (`NoCab`).
    
- **GROUP BY NoCab**: Bagian ini adalah inti dari perintah, yang mengelompokkan data berdasarkan nilai yang berbeda dalam kolom `NoCab`. Ini berarti, semua baris dengan nilai `NoCab` yang sama akan dikelompokkan bersama, dan kemudian fungsi `COUNT(NIP)` akan diterapkan untuk menghitung jumlah pegawai dalam setiap kelompok tersebut.
    

Hasil dari perintah ini adalah daftar setiap cabang (`NoCab`) yang ada dalam tabel, bersama dengan jumlah pegawai (`Jumlah_Pegawai`) di setiap cabang tersebut. Setiap baris dalam hasil akan menunjukkan satu cabang dan jumlah pegawai yang bekerja di cabang tersebut.

# Menghitung jumlah pegawai di setiap cabang

![](praktikkum%202/RIPALDO/Assets/lanjutan4.png)


- **NoCab**: Ini merujuk pada kolom dalam tabel yang berisi kode cabang (`NoCab`). Perintah ini akan mengelompokkan hasil berdasarkan cabang yang berbeda.
    
- **COUNT(NIP) AS Jumlah_pegawai**: Fungsi `COUNT(NIP)` menghitung jumlah baris dalam kolom `NIP` yang memiliki nilai non-null untuk setiap kelompok `NoCab`. Alias `Jumlah_pegawai` digunakan untuk memberi nama hasil perhitungan ini. Dengan demikian, hasilnya akan menampilkan jumlah pegawai di setiap cabang.
    
- **FROM pegawai**: Ini menunjukkan bahwa data diambil dari tabel `pegawai`, yang merupakan tabel yang berisi informasi tentang pegawai, termasuk cabang mereka (`NoCab`).
    
- **GROUP BY NoCab**: Bagian ini mengelompokkan data berdasarkan nilai `NoCab`. Semua baris dengan nilai `NoCab` yang sama akan dikelompokkan bersama. Setelah pengelompokan, fungsi `COUNT(NIP)` akan menghitung jumlah pegawai dalam setiap kelompok.
    
- **HAVING COUNT(NIP) >= 3**: Bagian ini menyaring hasil setelah pengelompokan. Hanya kelompok yang memiliki `COUNT(NIP)` (jumlah pegawai) lebih besar dari atau sama dengan 3 yang akan ditampilkan. Artinya, hanya cabang-cabang yang memiliki minimal 3 pegawai yang akan dimasukkan dalam hasil akhir.
    

Hasil dari perintah ini adalah daftar cabang (`NoCab`) yang memiliki setidaknya 3 pegawai, bersama dengan jumlah pegawai di masing-masing cabang tersebut (`Jumlah_pegawai`). Cabang yang memiliki kurang dari 3 pegawai tidak akan muncul dalam hasil.

# Menghitung total keseluruhan gaji dari semua pegawai

![](praktikkum%202/RIPALDO/Assets/lanjutan5.png)


- **SUM(Gaji)**: Fungsi `SUM` menjumlahkan semua nilai dalam kolom `Gaji` yang terdapat dalam tabel `pegawai`. Ini berarti total gaji dari semua pegawai yang tercatat dalam tabel akan dihitung.
    
- **AS Total_Gaji**: Alias `Total_Gaji` digunakan untuk memberi nama hasil dari fungsi `SUM(Gaji)`. Ini berarti hasil dari perhitungan jumlah keseluruhan gaji akan ditampilkan dengan nama `Total_Gaji`.
    
- **FROM pegawai**: Bagian ini menunjukkan bahwa data yang digunakan untuk perhitungan diambil dari tabel `pegawai`. Tabel ini berisi informasi tentang pegawai, termasuk kolom `Gaji` yang berisi data gaji masing-masing pegawai.
    

Hasil dari perintah ini adalah satu nilai yang mewakili total keseluruhan gaji dari semua pegawai yang tercatat dalam tabel `pegawai`, dan hasil ini akan ditampilkan dengan nama `Total_Gaji`.

# Menghitung total gaji dari semua pegawai yang memiliki jabatan sebagai "Manager"

![](praktikkum%202/RIPALDO/Assets/lanjutan6.png)


- **SUM(Gaji)**: Fungsi `SUM` digunakan untuk menjumlahkan semua nilai dalam kolom `Gaji` yang memenuhi kondisi tertentu, yaitu yang memiliki jabatan "Manager". Ini berarti total gaji dari semua pegawai dengan jabatan "Manager" akan dihitung.
    
- **AS Gaji_Manager**: Alias `Gaji_Manager` digunakan untuk memberi nama hasil dari fungsi `SUM(Gaji)`. Hasil ini akan menampilkan total gaji dari semua "Manager" dalam tabel, dengan nama alias `Gaji_Manager`.
    
- **FROM pegawai**: Bagian ini menunjukkan bahwa data yang digunakan diambil dari tabel `pegawai`, yang berisi informasi tentang pegawai, termasuk jabatan dan gaji mereka.
    
- **WHERE Jabatan = 'Manager'**: Kondisi `WHERE` ini menyaring data sehingga hanya baris-baris yang memiliki nilai `Jabatan` yang sama dengan "Manager" yang akan dipertimbangkan dalam perhitungan. Hanya pegawai dengan jabatan "Manager" yang gajinya akan dijumlahkan.

Hasil dari perintah ini adalah satu nilai yang mewakili total keseluruhan gaji dari semua pegawai dengan jabatan "Manager" yang tercatat dalam tabel `pegawai`, dan hasil ini akan ditampilkan dengan nama `Gaji_Manager`.

# Menghitung total gaji yang dikeluarkan untuk setiap cabang

![](praktikkum%202/RIPALDO/Assets/lanjutan7.png)


- **NoCab**: Kolom ini mewakili kode cabang dalam tabel `pegawai`. Perintah ini akan mengelompokkan data berdasarkan nilai dalam kolom `NoCab`.
    
- **SUM(Gaji) AS TotalGaji**: Fungsi `SUM(Gaji)` menghitung jumlah total nilai dalam kolom `Gaji` untuk setiap kelompok yang dikelompokkan berdasarkan `NoCab`. Alias `TotalGaji` digunakan untuk memberi nama hasil perhitungan ini, sehingga hasilnya akan menampilkan total gaji untuk setiap cabang dengan nama alias `TotalGaji`.
    
- **FROM pegawai**: Bagian ini menentukan tabel dari mana data diambil. Dalam hal ini, data diambil dari tabel `pegawai`, yang berisi informasi tentang pegawai termasuk cabang dan gaji mereka.
    
- **GROUP BY NoCab**: Bagian ini mengelompokkan hasil berdasarkan kolom `NoCab`. Semua baris dengan nilai `NoCab` yang sama akan digabungkan bersama, dan kemudian fungsi `SUM(Gaji)` akan menghitung total gaji untuk setiap kelompok cabang.
    

Hasil dari perintah ini adalah daftar setiap cabang (`NoCab`) yang ada dalam tabel, bersama dengan total gaji (`TotalGaji`) yang dikeluarkan untuk pegawai di masing-masing cabang tersebut. Setiap baris dalam hasil akan menunjukkan satu cabang dan jumlah total gaji yang dibayarkan di cabang tersebut.

# Menghitung total gaji di setiap cabang dan hanya menampilkan cabang-cabang yang memiliki total gaji tertentu

![](praktikkum%202/RIPALDO/Assets/lanjutan8.png)


- **NoCab**: Kolom ini mewakili kode cabang dalam tabel `pegawai`. Perintah ini akan mengelompokkan hasil berdasarkan kode cabang.
    
- **SUM(Gaji) AS Total_Gaji**: Fungsi `SUM(Gaji)` menghitung total gaji untuk setiap kelompok berdasarkan `NoCab`. Alias `Total_Gaji` digunakan untuk memberi nama hasil perhitungan ini, sehingga total gaji untuk setiap cabang akan ditampilkan dengan nama `Total_Gaji`.
    
- **FROM pegawai**: Bagian ini menunjukkan bahwa data diambil dari tabel `pegawai`, yang menyimpan informasi tentang pegawai, termasuk cabang dan gaji mereka.
    
- **GROUP BY NoCab**: Bagian ini mengelompokkan data berdasarkan kolom `NoCab`. Semua baris dengan nilai `NoCab` yang sama akan digabungkan, dan fungsi `SUM(Gaji)` akan menghitung total gaji untuk setiap kelompok cabang.
    
- **HAVING SUM(Gaji) >= 8000000**: Kondisi `HAVING` menyaring hasil setelah pengelompokan. Hanya cabang-cabang yang memiliki total gaji (`SUM(Gaji)`) lebih besar dari atau sama dengan 8.000.000 yang akan ditampilkan dalam hasil.
    

Hasil dari perintah ini adalah daftar cabang (`NoCab`) yang memiliki total gaji pegawai sebesar atau lebih dari 8.000.000, bersama dengan jumlah total gaji (`Total_Gaji`) yang dibayarkan di masing-masing cabang tersebut. Cabang-cabang yang total gajinya kurang dari 8.000.000 tidak akan muncul dalam hasil.

# Menghitung rata-rata gaji dari semua pegawai yang terdaftar

![](praktikkum%202/RIPALDO/Assets/lanjutan9.png)


- **AVG(Gaji)**: Fungsi `AVG` menghitung rata-rata dari nilai-nilai dalam kolom `Gaji`. Ini berarti fungsi ini akan menjumlahkan semua nilai gaji dan membagi hasilnya dengan jumlah baris yang memiliki nilai non-null dalam kolom `Gaji`.
    
- **AS Rata_rata**: Alias `Rata_rata` digunakan untuk memberi nama pada hasil dari fungsi `AVG(Gaji)`. Ini berarti hasil rata-rata gaji akan ditampilkan dengan nama `Rata_rata`.
    
- **FROM pegawai**: Bagian ini menunjukkan bahwa data yang digunakan untuk perhitungan diambil dari tabel `pegawai`, yang berisi informasi tentang pegawai, termasuk kolom `Gaji`.
    

Hasil dari perintah ini adalah satu nilai yang mewakili rata-rata gaji dari semua pegawai yang tercatat dalam tabel `pegawai`, dan hasil ini akan ditampilkan dengan nama `Rata_rata`.

# Menghitung rata-rata gaji dari pegawai yang memiliki jabatan tertentu

![](praktikkum%202/RIPALDO/Assets/lanjutan10.png)


- **AVG(Gaji)**: Fungsi `AVG` digunakan untuk menghitung rata-rata nilai dalam kolom `Gaji`. Fungsi ini akan menjumlahkan semua nilai gaji untuk pegawai yang memenuhi kondisi yang ditentukan dan kemudian membagi jumlah tersebut dengan jumlah baris yang memenuhi kondisi.
    
- **AS GajiRatamgr**: Alias `GajiRatamgr` digunakan untuk memberi nama hasil dari fungsi `AVG(Gaji)`. Ini berarti hasil perhitungan rata-rata gaji untuk pegawai dengan jabatan "Manager" akan ditampilkan dengan nama `GajiRatamgr`.
    
- **FROM pegawai**: Bagian ini menunjukkan bahwa data yang digunakan diambil dari tabel `pegawai`, yang berisi informasi tentang pegawai termasuk kolom `Gaji` dan `Jabatan`.
    
- **WHERE Jabatan = 'Manager'**: Kondisi `WHERE` ini menyaring data sehingga hanya baris-baris dengan nilai `Jabatan` yang sama dengan "Manager" yang akan dipertimbangkan dalam perhitungan. Ini berarti hanya gaji dari pegawai yang memiliki jabatan "Manager" yang akan dihitung untuk rata-rata.
    

Hasil dari perintah ini adalah satu nilai yang mewakili rata-rata gaji dari semua pegawai yang memiliki jabatan "Manager" dalam tabel `pegawai`, dan hasil ini akan ditampilkan dengan nama alias `GajiRatamgr`.

# Menghitung rata-rata gaji pegawai di setiap cabang

![](praktikkum%202/RIPALDO/Assets/lanjutan11.png)

- **NoCab**: Kolom ini merujuk pada kode cabang dalam tabel `pegawai`. Perintah ini akan mengelompokkan data berdasarkan nilai dalam kolom `NoCab`.
    
- **AVG(Gaji) AS RataGaji**: Fungsi `AVG(Gaji)` digunakan untuk menghitung rata-rata nilai dalam kolom `Gaji` untuk setiap kelompok yang dikelompokkan berdasarkan `NoCab`. Alias `RataGaji` digunakan untuk memberi nama pada hasil perhitungan ini, sehingga hasil rata-rata gaji untuk setiap cabang akan ditampilkan dengan nama `RataGaji`.
    
- **FROM pegawai**: Bagian ini menunjukkan bahwa data yang digunakan diambil dari tabel `pegawai`, yang berisi informasi tentang pegawai, termasuk kolom `Gaji` dan `NoCab`.
    
- **GROUP BY NoCab**: Bagian ini mengelompokkan hasil berdasarkan kolom `NoCab`. Semua baris dengan nilai `NoCab` yang sama akan digabungkan bersama, dan fungsi `AVG(Gaji)` akan menghitung rata-rata gaji untuk setiap kelompok cabang.
    

Hasil dari perintah ini adalah daftar setiap cabang (`NoCab`) yang ada dalam tabel, bersama dengan rata-rata gaji (`RataGaji`) yang dibayarkan di masing-masing cabang tersebut. Setiap baris dalam hasil akan menunjukkan satu cabang dan rata-rata gaji pegawai di cabang tersebut.

# Menghitung rata-rata gaji pegawai di cabang-cabang tertentu

![](praktikkum%202/RIPALDO/Assets/lanjutan12.png)

- **NoCab**: Kolom ini merujuk pada kode cabang dalam tabel `pegawai`. Perintah ini akan mengelompokkan data berdasarkan nilai dalam kolom `NoCab`.
    
- **AVG(Gaji) AS RataGaji**: Fungsi `AVG(Gaji)` digunakan untuk menghitung rata-rata nilai dalam kolom `Gaji` untuk setiap kelompok yang dikelompokkan berdasarkan `NoCab`. Alias `RataGaji` digunakan untuk memberi nama hasil perhitungan ini, sehingga rata-rata gaji untuk setiap cabang akan ditampilkan dengan nama `RataGaji`.
    
- **FROM pegawai**: Bagian ini menunjukkan bahwa data yang digunakan diambil dari tabel `pegawai`, yang berisi informasi tentang pegawai, termasuk kolom `Gaji` dan `NoCab`.
    
- **GROUP BY NoCab**: Bagian ini mengelompokkan hasil berdasarkan kolom `NoCab`. Semua baris dengan nilai `NoCab` yang sama akan digabungkan bersama, dan fungsi `AVG(Gaji)` akan menghitung rata-rata gaji untuk setiap kelompok cabang.
    
- **HAVING NoCab = 'C101' OR NoCab = 'C102'**: Kondisi `HAVING` menyaring hasil setelah pengelompokan. Hanya cabang-cabang dengan kode `NoCab` yang sama dengan 'C101' atau 'C102' yang akan ditampilkan dalam hasil. Baris-baris dengan kode cabang lainnya tidak akan muncul dalam hasil.
    

Hasil dari perintah ini adalah daftar cabang-cabang yang memiliki kode 'C101' atau 'C102', bersama dengan rata-rata gaji (`RataGaji`) dari pegawai di cabang-cabang tersebut.

# Menemukan nilai gaji terbesar dan terkecil dari semua pegawai

![](praktikkum%202/RIPALDO/Assets/lanjutan13.png)


- **MAX(Gaji) AS GajiTerbesar**: Fungsi `MAX` digunakan untuk menemukan nilai maksimum dalam kolom `Gaji`. Ini berarti fungsi ini akan mengidentifikasi gaji tertinggi yang ada dalam tabel `pegawai`. Alias `GajiTerbesar` digunakan untuk memberi nama pada hasil dari fungsi `MAX(Gaji)`, sehingga hasilnya akan ditampilkan dengan nama `GajiTerbesar`.
    
- **MIN(Gaji) AS GajiTerkecil**: Fungsi `MIN` digunakan untuk menemukan nilai minimum dalam kolom `Gaji`. Ini berarti fungsi ini akan mengidentifikasi gaji terendah yang ada dalam tabel `pegawai`. Alias `GajiTerkecil` digunakan untuk memberi nama pada hasil dari fungsi `MIN(Gaji)`, sehingga hasilnya akan ditampilkan dengan nama `GajiTerkecil`.
    
- **FROM pegawai**: Bagian ini menunjukkan bahwa data yang digunakan diambil dari tabel `pegawai`, yang berisi informasi tentang pegawai, termasuk kolom `Gaji`.
    

Hasil dari perintah ini adalah dua nilai:

- **GajiTerbesar**: Nilai ini menunjukkan gaji tertinggi di antara semua pegawai yang terdaftar dalam tabel `pegawai`.
- **GajiTerkecil**: Nilai ini menunjukkan gaji terendah di antara semua pegawai yang terdaftar dalam tabel `pegawai`.

Kedua nilai ini memberikan gambaran mengenai rentang gaji dalam tabel tersebut.

# Menemukan nilai gaji terbesar dan terkecil dari pegawai yang memiliki jabatan "Manager"

![](praktikkum%202/RIPALDO/Assets/lanjutan14.png)


- **MAX(Gaji) AS GajiTerbesar**: Fungsi `MAX` digunakan untuk menemukan nilai maksimum dalam kolom `Gaji` untuk pegawai yang memenuhi kondisi. Ini berarti fungsi ini akan mengidentifikasi gaji tertinggi di antara pegawai yang memiliki jabatan "Manager". Alias `GajiTerbesar` digunakan untuk memberi nama pada hasil dari fungsi `MAX(Gaji)`, sehingga hasilnya akan ditampilkan dengan nama `GajiTerbesar`.
    
- **MIN(Gaji) AS GajiTerkecil**: Fungsi `MIN` digunakan untuk menemukan nilai minimum dalam kolom `Gaji` untuk pegawai yang memenuhi kondisi. Ini berarti fungsi ini akan mengidentifikasi gaji terendah di antara pegawai yang memiliki jabatan "Manager". Alias `GajiTerkecil` digunakan untuk memberi nama pada hasil dari fungsi `MIN(Gaji)`, sehingga hasilnya akan ditampilkan dengan nama `GajiTerkecil`.
    
- **FROM pegawai**: Bagian ini menunjukkan bahwa data yang digunakan diambil dari tabel `pegawai`, yang berisi informasi tentang pegawai, termasuk kolom `Gaji` dan `Jabatan`.
    
- **WHERE Jabatan = 'Manager'**: Kondisi `WHERE` ini menyaring data sehingga hanya baris-baris dengan nilai `Jabatan` yang sama dengan 'Manager' yang akan dipertimbangkan dalam perhitungan. Hanya gaji dari pegawai yang memiliki jabatan "Manager" yang akan dihitung untuk nilai maksimum dan minimum.
    

Hasil dari perintah ini adalah dua nilai:

- **GajiTerbesar**: Nilai ini menunjukkan gaji tertinggi di antara pegawai yang memiliki jabatan "Manager" yang berjumlah "6250000"
- **GajiTerkecil**: Nilai ini menunjukkan gaji terendah di antara pegawai yang memiliki jabatan "Manager" yang berjumlah "5250000"

Kedua nilai ini memberikan gambaran mengenai rentang gaji untuk pegawai yang memiliki jabatan "Manager" dalam tabel `pegawai`.

# Menemukan gaji terbesar dan terkecil untuk setiap cabang yang memiliki tiga pegawai atau lebih

![](praktikkum%202/RIPALDO/Assets/lanjutan15.png)


- **NoCab**: Kolom ini merujuk pada kode cabang dalam tabel `pegawai`. Perintah ini akan mengelompokkan data berdasarkan nilai dalam kolom `NoCab`.
    
- **MAX(Gaji) AS GajiTerbesar**: Fungsi `MAX` digunakan untuk menemukan nilai maksimum dalam kolom `Gaji` untuk setiap kelompok cabang. Alias `GajiTerbesar` digunakan untuk memberi nama pada hasil dari fungsi `MAX(Gaji)`, sehingga hasilnya akan ditampilkan dengan nama `GajiTerbesar`.
    
- **MIN(Gaji) AS GajiTerkecil**: Fungsi `MIN` digunakan untuk menemukan nilai minimum dalam kolom `Gaji` untuk setiap kelompok cabang. Alias `GajiTerkecil` digunakan untuk memberi nama pada hasil dari fungsi `MIN(Gaji)`, sehingga hasilnya akan ditampilkan dengan nama `GajiTerkecil`.
    
- **FROM pegawai**: Bagian ini menunjukkan bahwa data yang digunakan diambil dari tabel `pegawai`, yang berisi informasi tentang pegawai, termasuk kolom `Gaji` dan `NoCab`.
    
- **GROUP BY NoCab**: Bagian ini mengelompokkan hasil berdasarkan kolom `NoCab`. Semua baris dengan nilai `NoCab` yang sama akan digabungkan bersama, dan fungsi `MAX(Gaji)` serta `MIN(Gaji)` akan dihitung untuk setiap kelompok cabang.
    
- **HAVING COUNT(NIP) >= 3**: Kondisi `HAVING` menyaring hasil setelah pengelompokan. Hanya cabang-cabang yang memiliki tiga pegawai atau lebih (dalam hal ini, dihitung dengan `COUNT(NIP)`) yang akan ditampilkan dalam hasil. Baris-baris dengan jumlah pegawai kurang dari tiga tidak akan muncul dalam hasil.
    

Hasil dari perintah ini adalah daftar setiap cabang (`NoCab`) yang memiliki tiga pegawai atau lebih, bersama dengan gaji tertinggi (`GajiTerbesar`) dan gaji terendah (`GajiTerkecil`) dari pegawai di setiap cabang tersebut.

# Mendapatkan berbagai statistik terkait gaji dari seluruh pegawai

![](praktikkum%202/RIPALDO/Assets/lanjutan16.png)


- **COUNT(NIP) AS JumlahPegawai**: Fungsi `COUNT` digunakan untuk menghitung jumlah pegawai berdasarkan kolom `NIP`. Alias `JumlahPegawai` digunakan untuk memberi nama pada hasil perhitungan ini. Ini memberikan jumlah total pegawai yang terdaftar dalam tabel `pegawai`.
    
- **SUM(Gaji) AS TotalGaji**: Fungsi `SUM` digunakan untuk menghitung jumlah total dari kolom `Gaji`. Alias `TotalGaji` digunakan untuk memberi nama pada hasil perhitungan ini. Ini memberikan total akumulasi gaji yang dibayarkan kepada semua pegawai.
    
- **AVG(Gaji) AS RataGaji**: Fungsi `AVG` digunakan untuk menghitung rata-rata nilai dalam kolom `Gaji`. Alias `RataGaji` digunakan untuk memberi nama pada hasil perhitungan ini. Ini memberikan rata-rata gaji pegawai di seluruh tabel.
    
- **MAX(Gaji) AS GajiMaks**: Fungsi `MAX` digunakan untuk menemukan nilai maksimum dalam kolom `Gaji`. Alias `GajiMaks` digunakan untuk memberi nama pada hasil perhitungan ini. Ini memberikan gaji tertinggi yang diterima oleh pegawai dalam tabel.
    
- **MIN(Gaji) AS GajiMin**: Fungsi `MIN` digunakan untuk menemukan nilai minimum dalam kolom `Gaji`. Alias `GajiMin` digunakan untuk memberi nama pada hasil perhitungan ini. Ini memberikan gaji terendah yang diterima oleh pegawai dalam tabel.
    
- **FROM pegawai**: Bagian ini menunjukkan bahwa data yang digunakan diambil dari tabel `pegawai`, yang berisi informasi tentang pegawai, termasuk kolom `NIP` dan `Gaji`.
    

Hasil dari perintah ini adalah satu baris data yang menunjukkan:

- **JumlahPegawai**: Total jumlah pegawai yang terdaftar.
- **TotalGaji**: Jumlah total gaji yang dibayarkan kepada semua pegawai.
- **RataGaji**: Rata-rata gaji pegawai.
- **GajiMaks**: Gaji tertinggi yang diterima oleh pegawai.
- **GajiMin**: Gaji terendah yang diterima oleh pegawai.

Perintah ini memberikan gambaran menyeluruh tentang distribusi dan rentang gaji pegawai dalam tabel `pegawai`.

# Memperoleh ringkasan statistik terkait data pegawai

![](praktikkum%202/RIPALDO/Assets/lanjutan17.png)

- **COUNT(NIP) AS JumlahPegawai**  
    Fungsi `COUNT(NIP)` menghitung jumlah total pegawai berdasarkan kolom `NIP`, yang umumnya adalah identifikasi unik setiap pegawai. Hasil dari fungsi ini memberikan jumlah total pegawai yang ada dalam tabel `pegawai`. Hasil ini diberi alias `JumlahPegawai` untuk memudahkan pembacaan.
    
- **SUM(Gaji) AS TotalGaji**  
    Fungsi `SUM(Gaji)` menjumlahkan semua nilai dalam kolom `Gaji`, memberikan total keseluruhan gaji yang dibayarkan kepada seluruh pegawai. Hasil dari fungsi ini adalah jumlah total gaji yang diterima oleh pegawai di tabel. Hasil ini diberi alias `TotalGaji`.
    
- **AVG(Gaji) AS RataGaji**  
    Fungsi `AVG(Gaji)` menghitung rata-rata nilai dalam kolom `Gaji`, memberikan rata-rata gaji yang diterima oleh pegawai. Perhitungan dilakukan dengan menjumlahkan seluruh nilai gaji dan membaginya dengan jumlah pegawai. Hasil ini diberi alias `RataGaji`.
    
- **MAX(Gaji) AS GajiMaks**  
    Fungsi `MAX(Gaji)` mencari nilai maksimum dari kolom `Gaji`, yaitu gaji tertinggi yang diterima oleh pegawai. Hasil ini diberi alias `GajiMaks` untuk menunjukkan gaji tertinggi di tabel.
    
- **MIN(Gaji) AS GajiMin**  
    Fungsi `MIN(Gaji)` mencari nilai minimum dari kolom `Gaji`, yaitu gaji terendah yang diterima oleh pegawai. Hasil ini diberi alias `GajiMin` untuk menunjukkan gaji terendah di tabel.
    

Perintah SQL ini menghasilkan satu baris data yang mencakup jumlah total pegawai, total keseluruhan gaji, rata-rata gaji, gaji tertinggi, dan gaji terendah dari tabel `pegawai`.

# Menghitung dan menganalisis statistik gaji pegawai

![](praktikkum%202/RIPALDO/Assets/lanjutan18.png)


- **COUNT(NIP) AS JumlahPegawai**  
    Fungsi `COUNT(NIP)` menghitung jumlah pegawai yang memiliki nilai pada kolom `NIP`. Ini memberikan jumlah total pegawai yang memenuhi kondisi dalam klausa `WHERE`. Hasil ini diberi alias `JumlahPegawai`.
    
- **SUM(Gaji) AS TotalGaji**  
    Fungsi `SUM(Gaji)` menghitung total keseluruhan gaji dari pegawai yang memenuhi kondisi dalam klausa `WHERE`. Ini memberikan jumlah akumulatif gaji untuk pegawai yang jabatan-nya adalah 'staf' atau 'Sales'. Hasil ini diberi alias `TotalGaji`.
    
- **AVG(Gaji) AS RataGaji**  
    Fungsi `AVG(Gaji)` menghitung rata-rata gaji dari pegawai yang memenuhi kondisi dalam klausa `WHERE`. Ini memberikan nilai rata-rata gaji untuk pegawai dengan jabatan 'staf' atau 'Sales'. Hasil ini diberi alias `RataGaji`.
    
- **MAX(Gaji) AS GajiMaks**  
    Fungsi `MAX(Gaji)` mencari gaji tertinggi dari pegawai yang memenuhi kondisi dalam klausa `WHERE`. Ini memberikan nilai maksimum gaji di antara pegawai dengan jabatan 'staf' atau 'Sales'. Hasil ini diberi alias `GajiMaks`.
    
- **MIN(Gaji) AS GajiMin**  
    Fungsi `MIN(Gaji)` mencari gaji terendah dari pegawai yang memenuhi kondisi dalam klausa `WHERE`. Ini memberikan nilai minimum gaji di antara pegawai dengan jabatan 'staf' atau 'Sales'. Hasil ini diberi alias `GajiMin`.
    

**Klausul `WHERE`:**  
Klausul `WHERE` membatasi data yang dipilih hanya pada pegawai yang memiliki jabatan 'staf' atau 'Sales'.

**Klausul `GROUP BY NoCab`:**  
Data dikelompokkan berdasarkan kolom `NoCab`, yang kemungkinan adalah kode cabang. Ini berarti statistik dihitung untuk setiap cabang secara terpisah.

**Klausul `HAVING SUM(Gaji) <= 2600000`:**  
Klausul `HAVING` digunakan untuk memfilter hasil agregat yang telah dikelompokkan. Dalam hal ini, hanya cabang yang memiliki total gaji yang kurang dari atau sama dengan 2.600.000 yang akan ditampilkan.

**Hasil dari Perintah Ini:**  
Perintah ini menghasilkan statistik agregat (jumlah pegawai, total gaji, rata-rata gaji, gaji tertinggi, dan gaji terendah) untuk setiap cabang di mana jabatan pegawai adalah 'staf' atau 'Sales', dan total gaji di setiap cabang tidak melebihi 2.600.000.

# Gambar 1

```sql

SELECT orders.OrderID, orders.OrderDate, orders.CustomerID, customers.CompanyName,
customers.ContactName, customers.City, customers.Phone

FROM orders, customers

WHERE orders.CustomerID = customers.customerID;
```

Hasil : 
![](gambar1.png)

- SELECT : Untuk memilih kolom mana saja yang ingin ditampilkan dan dari tabel mana kolom tersebut diambil
- orders.OrderID : orders merupakan nama tabel yang ingin ditampilkan kolomnya yaitu OrdersID. Jadi kolom OrderID dalam tabel orders ingin ditampilkan.
- orders.Order Date : kolom orderDate dalam. tabel orders ingin ditampilkan
- orders.custID : kolom custID dalam tabel orders dipilih untuk ditampilkan
- Customers.companyName : kolom company Name dalam tabel customers dipilih untuk ditampilkan.
- customers.contactnome : kolom contactName dalam tabel customers dipilih untuk ditampilkan.
- customers.City :  kolom city dalam tabel customers dipilih untuk ditampilFan.
- customers.Phone : kolom Phone dalam tabel customers dipilih untuk ditampilkan
- FROM orders, customers: untuk memilih dan tabel mana saja yang kolomnya insin dipilih untuk ditampilkan. Orders adalah nama tabel Pertama yang dipilih dan customers adalah nama. tabel kedua Yang dipilih.
- WHERE: Kondisi Yang harus dipenuhi oleh suatu kolom data ajar bisa ditampilkan 
- (orders.custID = customers.customerID) : kondisi dari WHERE yang harus dipenuhi. Jadi, data Pada kolom custID dalam tabel orders hans sama dengan data Pada kolom customerID dalam tabel customers adar masing-masing dataik bisa ditampilkan.

Hasilnya yang akan adalah kolom Order ID, order Date dan custID dari tabel, orders dan kojom companyNume, contact Moyoe, city, dan Phane dari tabel astomers.

# Gambar 2

```sql
SELECT o.OrderID, o.OrderDate, o.CustomerID,c.CompanyName, c.ContactName, c.City, c.Phone

FROM orders o

JOIN customers c ON o.CustomerID = c.CustomerID

WHERE c.City = 'London';
```

Hasil : 
![](gambar2.png)

- SELECT : untuk memilih kolom mana saja yang ingin ditampilkan dan dari tabel mana kolom tersebut diambil.
- o.orderID : o merupakan Singkatan dari tabel orders, kolom order ID merupakan kolom dari tabel orders Yang dipilih untuk ditampilkan.
- `o.OrderDate `: kolom orderDate merupakan kolom dari tabel o Yaitu orders Yons dipilih untuk ditampilkan,
- o.custID : tolong custID merupakan kolom dari tabel o Yaitu orders yang dipilih untuk ditampilkan
- c.CompanyName : c merupakan singkatan dari tabel customers. kolom company Name merupakan kolom dari tabel customers Yang dipilih untuk ditampilkan.
- c.ContactName : kolom contactName merupakan kolom dari tabel c Yaitu custome Yang dipilih untuk ditampilkan.
- c.City : kolom city merupakan kolom dari tabel a Yaitu customers Yang dipilih
untuk ditampilkan.
- c.Phone : kolom Phone merupakan kolom dari tabel a Yaitu customers Yang dipilih untuk ditampilkan.
- FROM orders o, customers c : untuk memilih dari tabel mana saja yang kolomnya ingin dipilih untuk ditampilkan. Orders adalah nama tabel yang dipilih untuk ditampilkan tapi disingkat Jadi O, agar lebih mudah dan cepat. customers adalah nama tabel Yang dipilih untuk ditampilkan tapi disingkat Jadi C. 
- WHERE : kondisi yang harus dipenuhi oleh suatu kolom data agar bisa ditampilkan
- (o.CustID = costumer ID) : data Pada kolom CustID dalam tabel o (urders) hans Sama dengan data Pada kolom customer ID dalam tabel c (customers). AND = untuk menyekaksi dua data atau lebih Pada Perintah WHERE.
- (c.city = "London") : kondisi tambahan yang harus dipenuhi Juga. Jadi Pada kolom city dari tabel c(customers) datarra harus berisi data "London" agar bisa ditampil Hasilnya = Jadi hanya barisan data Yani kolom city dari tabel customers mempunyai data "London" Yang bisa tampil.


# Gambar 3

```sql
SELECT o.OrderID, o.OrderDate, c.CompanyName,

c.ContactName, c.Phone, e.LastName, e.Title

FROM orders o, customers c, employees e

WHERE o.CustomerID = c.CustomerID AND o.EmpID = e.EmpID;
```

Hasil : 
![](gambar3.png)

- SELECT : untuk memilih kolam mana saja Yand insin ditampilkan dan dari tabel mana kolom tersebut diambil.
- o.OrderID, o.OrderDate : kolom orderID dan order Date dati tabel o(orders) dipilih untuk ditampilkan
- c.companyName, c.contactName, c.Phone : kolom-kolom companyName, Contact Name dan Phone dari tabel c(customers) dipilih untuk ditampilkan. e. Lastname, e.Title = kolom Lastname dan Title dari tabel e(employees) dipilih Untuk ditampilkan.
- From orders o. customers c, employees e : untuk memilih dari tabel mana saja Yang kolomnya dipillh untur ditampilkan. orders disingkat jadi o adalah nama tabel Yang dipilih. Customers disingkat Jadi c adalah nama tabel Yang dipilih. employees disingkat Jadi e adalah nama tabel yang dipilih untuk ditampilkan. 
- WHERE : kondisi yang harus dipenuhi oleh suatu data ajat bisa ditampilkan.
- (CustID = c.customerID): data Pada kolom custID dalam tabel o(orders) harus 
	Sama densan data Pada kotom customerID dalam tabel c(cocustomers).
- AND : untuk menyeleksi dua data atau lebih Pada Perintah WHERE.
- (o.EmpID = e.EmpID) = data pada kolom EMPID dalam tabel o(orders) hatus Sama dengan data Pada kolom EmpID dakam tabel e(employees) Hasilnya Yang tampil adalah kojom Yang memenuhi semua kondisi dari WHERE.
# Gambar 4

```sql
SELECT o.OrderID, o.OrderDate, c.CompanyName, c.ContactName, c.Phone, e.LastName, e.Title

FROM orders o, customers c, employees e

WHERE o.CustomerID = c.CustomerID AND o.EmpID = e.EmpID AND e.EmpID AND

e.FirstName = 'Margaret';
```

Hasil : 
![](gambar4.png)

- SELECT : untuk memilih kolom mana saja Yang insin ditampilkan dan dari tabel mana kolom tersebut diambil.
- o.orderID, o.OrderDate : kolom orderID dan orderDate dari tabel o (orders) dipilih untuk ditampilkan.
- c.companyName, c.contactName, c.Phone : kolom company Name, ContactName dan Phone dari tabel c (customers) dipilih untuk ditampilkan.
- e.Lastname, e.Title : kolom LastName dan Title dari tabel e (employees) dipilih. untuk ditampilkan.
- FROM orders o customers c, employees e : untuk memilih dari tabel mana Saja Yang kolamnya dipilih untuk ditampilkan. orders atau o adalah nama tabel Yang dipilih untuk ditampilkan. customers atau c adalah nama tabel Yang dipilih untuk ditampilkan employees atau e adalah nama tabel yang dipilih untuk ditampilkan.
- WHERE : kondisi Yang harus difenuhi oleh suatu kolom data agar bisa ditampilkan. 
- (o.custID = c.customerID) : data Pada kolom CustID dalam tabel o(orders) harus Sama dengan data Pada kolom customerID dalam table c(customers).
- AND untuk menyeleksi dua data atau lebih Pada Perintah WHERE.
- (o. EmpID=e.Empld) : data Pada kolom EmpID dalam tabel (orders) harus sama dengan data Pada kolom Empld dalam tabel e(employees).
- AND : untuk menyeleksi dua data atau lebih Pada Perintah WHERE-
- (e.FirstName = "Margaret") : data Pada kolom Firstivame dalam tabel elemplo harus berisi data "Margaret" agar bisa tampil

Hasilnya jadi barisan data yang sudah memenuhi kondisi WHERE akan tampil. tentama kolam FirstName dari tabel employees Yang isinya "Margaret".
# Gambar 5

```sql
SELECT c.CustomerID, c.CompanyName, o.OrderID,

o.OrderDate, od.ProductID, p.ProductName,

od.Quantity AS Qty, od.UnitPrice

FROM customers c, orders o, orderdetails od, products p

WHERE c.CustomerID = o.CustomerID AND o.OrderID = od.OrderID

AND p.ProductID = od.ProductID

ORDER BY c.CustomerID;
```

Hasil : 
![](gambar5.png)

- SELECT : untuk memilih kojom mana sata Yang ingin ditampilkan dan dari tabel mana kolom tersebut diambil.
- c.CustomerID, c.CompanyName : kolom customerID dan companyName dari tabel C (customers) dipilih untuk ditampilkan.
- o.order ID, o.OrderDate : kolom orderID dan order Date dari tabel o(orders) dipilih untuk ditampilkan.
- od.ProductID, od.Quantity, od.UnitPrice : kolom ProductID, Quantity dan UnitPrice dari tabel od (orderdetails) dipilih uritur ditampilkan.
- p.ProductName : kolom ProductName merupakan kolom dari tabel p(Products) Yang dipilih untuk ditampilkan.
- od.Quantity AS Qty : kolom Quantity ditampilkan sebagai nama sementaranta Yaitu Qty. AS untuk mengubah nama suatu kolom secara sementara.
- FROM customers c. orders o, orderdetails od, products p : Untuk memilih dark tabel mana saja Yang Kolomnya dipilih untuk ditampilkan, Customers atav C adalah nama tabel Yang dipilih untuk ditampilkan orders atau o adalah nama tabel Yang dipilih untuk ditampilkan orderdetails atau ad adalah nama tubel yang dipilih untuk ditampilkan. Products atau P adalah nama tabel Yang dipilih untuk ditampilkan.
- WHERE : Kondisi Yang harus dipenuhi oleh suatu kolom data avar bisa ditampilkan (c) (c.customerID = O.CustID) = data Pada kolom customerID dari tabel customers atau a harus sama dengan data Pada kolom custio dari tabel orders atau o.
- AND : Untuk menyeleksi dua data atau lebih Pada perintah WHERE.
- (o. orderID = od.orderID) : Data Pada kolom orderID dari tabel orders
	atau o harus sama dengan data Pada kolom orderId dari tabel orderdetails atau od.
- AND : untuk menyeleksi dua data atau lebih Pada Perintah WHERE.
- (p.ProductID = od.ProductID) : data Pada kolom ProductID dari tabel Products atau p harus sama dengan duta Pada kolam ProductID dati tabel orderdetails atau d..
- OrderBy c.customerID : untuk mengurut data berdasarkan kolom customerId dan tabel customers.

Hasilnya kolam-kolom data yang tampil adalah data Yang telah memenuhi Fondisi-kondisi Yang ada, dan seluruh isi data tersebut diurut berdasarkan satu kolom Yaitu customerID dari tabel customers.
# Gambar 6

```sql
SELECT c.CustomerID, c.CompanyName, CONCAT(e.LastName, ', ', e.FirstName) AS

EmployeeName, od.productid as prodID,

p.ProductName, od.quantity AS Qty FROM customers c, orders o, orderdetails

od,products p, employees e

WHERE c.customerid=o.CustomerID and o.orderid =od.orderid and

p.productid=od.productid and e.empid=o.empid order by o.orderID;
```

Hasil : 
![](gambar6.png)

- SELECT : Untuk memilih kolom mana sata Yang ingin ditampilkan dan dilabuniton Serta dari tabel mara kolom tersebut dipilih.
- c.customerID, c.company Name : kolom customerID dan company Name dari tabel c(customers) dipilih untuk ditampilkan.
- o.OrderID AS ordID, o.OrderDate : Kolom orderID dan order Date dari tabel o(orders) dipilih untuk ditampilkan. As merupakan Perintah untuk mengubah nama Suatu kolom secara sementara. Dalam hal ini kolom order ID diubah namanya sementara mentual ordID
- CONCAT (e.Lastname,',', e.FirstName) AS EmployeeName : CONCAT adalah Perintah untuk mengabungkan beberapa kojom data menjadi satu kolom data. (e. Lastname,',' e.FirstName) merupakan kolom-kolom Yang ingin digabung LastName dan FirstName merupakan kolom dari tabel employee) Yand indin digabung. ('.') merupakan separator atau Pemisah dari kedua kolom Yang ingin digabungkan. As EmployeeName untuk mengubah hasil concat tadi menjadi Employevan (namanya) untuk sementara
- od.ProductID AS ProdID, Od.Quantity AS Qty: kolom ProductID dan Quantity dari tabel ad(orderdetails), dipilih untuk ditampilkan, kolom ProductID namanya diubah sementara Jadi ProdID. kolom Quantity namanya diubah Sementara Jadi aty.
- p.ProductName: kolom ProductName dari taber P(Products) dipilih untuk ditampilkan. 
- FROM customers c. orders o, orderdetails od, Products P, employees e = untuk memit dari tabel mana saja yang kolomnya dipilih untuk ditampilkan, customers atau C adalah nama tabel Yang dipilih. orders atau o adalah nama tabel Yang difilih order details od adalah nama tabel Yang dipilih. Products atau P adalah nama tabel Yang dipilih, employees atau e adalah nama tabel Yant dipilih.
- WHERE : kondisi Yang harus dipenuhi oleh suatu kolom data adar bisa ditampilkan
- (C-CustomerID = 0. custID) : data Pada kolom customerID dari tabel c(customers)harus sama dengan data Pada kolom CustID dari tabel o(orders).
- AND : untuk menyeleksi dua data atau lebih Pada Perintah WHERE.--
- (o.OrderID=od-orderID) : data pada kolom orderID dari tabel (orders) harus Sama dengan data Pada kolom order ID dari tabel od (orderdetails). 
- AND: untuk menyeleksi dua data atau lebih Pada Perintah WHERE. 
- (P.ProductID=od. ProductID) : Data Pada kolom ProductID dari tabel (ProductID) harus sama dengan data Pada kolom ProductID dari tabel od (orderdetails) 
- AND: untuk menyeleksi dua data atau lebih Pada Perintah WHERE. 
- (e. Empld o. EmpID) : data Pada kolom EmpID dari tabel e(employees) hans Sama dengan data Pada kolom EmPID dati tabel o(orders). order By o. orderID = untuk mengurut data berdasarkan kolom orderID dari tabel orders.
- order By o.orderID : untuk mengurut data berdasarkan kolom orderID dari tabel orders.

Hasilnya kolom LastName dan FirstName dari tabel e(employees) digabung dengan Concat dan hasil kotomnya namanya diubah sementara Jadi EmployeeName.
# Gambar 7

```sql
CREATE VIEW CustOrderEmp
    -> AS
    -> SELECT c.CustomerID, c.CompanyName, c.ContactName,
    -> o.OrderID, o.OrderDate, o.EmpID, e.LastName, e.FirstName
    -> FROM customers c, orders o, employees e
    -> WHERE c.CustomerID = o.CustomerID AND o.EmpID = e.EmpID;
```

Hasil : 
![](createview.png)

```sql
SHOW TABLES;
```

![](show.png)

```sql
SELECT * FROM CustOrderEmp;
```

![](select.png)

- CREATE VIEW Custorder Emp : merupakan tabel virtual Yang dibuat dendan Nama custorderEmp
- AS SELECT: untuk memilih kolom-kolom maria Sava Yang ingin dipilih untuk dimasukkan ke tabel virtual.
- c.CustomerID, c.CompanyName, c.contactName : kolom customerID, company name dan contactinome dari tabel c(customers) dipilih untuk dimasukkan ke dalam tabel virtual.
- o.orderID, o. OrderDate : kolom order ID dan orderDate dari tabel (orders) dipilih untuk dimasukkan ke dalam tabel virtual.
- e.EmpID, e.Lastname, e.FirstName: kolom EmpID, LastName, dan FirstName, dari tabel e(employees) dipilih untuk dimasukkan ke dalam tabel virtual.
- FROM customers c, orders o, employees e: untuk memilih dari tabel mana saja Yang kolomnya dipilih untuk dimasukkan. customers, orders dan employees merupakan nama tabel yang kolomnya dipilih.
- WHERE kondisi yang harus dipenuhi oleh suatu data adar bisa dimasukkan ke dalam tabel virtual.
- (c.customerID = a custID) : data Pada kolom customer ID dari tabel c(costumers) harus sama dengan data pada kolom custIO dari tabel (orders) agar bisa dimasukkan.
- AND : untuk menyeleksi dua data atau lebih Pada WHERE.
- (o. EmpID = e.EmpID) : data Pada kolom EmPID dari tabel ocorders) harus Sama dengan data Pada kolom EmPID dari tabel e(employees) agar bisa dimasukkan.

Hasilnya sebuah Tabel virtual telah dibuat dengan nama custorder Emi Yang berisi kolom-kolom dari 3 Tabel customers, orders, employees dan telah memenuhi semua kondisi.

# Gambar 8

bsvfivbies

```sql
CREATE VIEW odproductsc
    -> AS
    -> SELECT od.OrderID, od.ProductID, p.ProductName,
    -> od.Quantity, od.UnitPrice
    -> FROM orderdetails od, products p
    -> WHERE p.ProductID = od.ProductID;
```

Hasil : 
![](createview2.png)

```sql
SELECT * FROM odproductsc;
```

![](gambar8.png)

- CREATE VIEW odProducts : untuk membuat tabel virtual dengan nama odproducts. 
- AS SELECT : untuk memilih kolom-kolom mana saja Yang ingin dipilih untuk dimasukkan ke tabel virtual.
- od.orderID, od.ProductID, od.UnitPrice, od.Quantity : kolom orderID, ProductID, unit Price dan Quantity dari tabel od (orderdetails) dipilih untuk dimasukkan. 
- p.ProductName : kolom Productivame dari tabel P(Products) dipilih untuk dimasukkan. 
- FROM orderdetails od.Products p : untuk memilih dari tabel mana saja yang kolomnya dipilih untuk dimasukkan. orderdetails dan Products adalah nama tabel Yang dipilih.
- WHERE : Kondisi Yang harus dipenuhi oleh suatu data agar bisa dimasukkan ke dalam tabel virtual.
- (ProductID = od. ProductID) : data Pada kolom productID dari tabel P(Products) hatu sama dengan kolom ProductID dari tabel od (orderdetails). a bisa dimasukan 

Hasilnya Tabel virtual yang bermama odproducts Yang terbuat dari kolam dalam 2 Tabel ordendetails dan products.

# Gambar 9

```sql
SELECT c.CustomerID, c.CompanyName, o.OrderID, od.ProductID,
     ROUND(od.unitprice, 2), od.quantity, od.discount,
     ROUND(((1-od.discount) * od.unitprice * od.quantity), 2) AS Jumlah
     FROM customers c, orders o, orderdetails od WHERE c.CustomerID=o.CustomerID AND o.OrderID=od.OrderID
     ORDER BY c.CustomerID;
```

Hasil : 
![](gambar9.png)

- SELECT : untuk memilih Kolom mana saja Yang ingin ditampilkan dan dihitung.
- c. customerID, c.CompanyName : kolom customerID dan company Name dari tabel c(customers) dipilih untuk ditampilkan. 
- o.orderID : Kolom orderID dari tabel o (orders) dipilih untuk ditampilkan. 
- od.ProductID, od.unitPrice, od.quantity, od.Discount = kolom ProductID, unit Price, Quan dan Discount dari tabel od (orderdetails) dipilih untuk ditampilkan dan dibulatkan. 
- ROUND (od.unitprice, 2) : untuk membulatkan bilangan dari kolom unitPrice Sampai Jumlah digit tertentu, sesuai dengan Pilihan, yang dibuat Yaitu 2.
- ROUND (CC1-od. Discount) od unitprice #ad. Quantity), 2) AS Jumlah: untuk membulatkan bilangan dari kolom hasil dari (1 diurant kolom discount lalu dikali unitprice dan kali Quantity) sampai jumlah digit Yaitu 2. As Jumlah untuk menubah kolom. hasil tersebut noma sementaranya Jadi Jumlah 
- WHERE : kondisi yang harus dipenuhi oleh suatu data alar bisa ditampilkan. 
- (C.customer ID = o.cust ID) : data Pada kolam customerID. dari tabel c(customers) harus sama dengan data Poda kolom custID dari tabel o(orders). AND untuk menyeleksi dua data atau lebih Pada kondisi WHERE.
- FROM customers c, orders o, orderdetails od : untuk memilih dari tabel mana Saja yang kolamnya dipilih untuls ditampilkan dan dibulatkan. customer orders, orderdetails merupakan nama-nama tabel Yang dipilih.
- WHERE : kondisi yang harus dipenuhi oleh suatu data alar bisa ditampilkan
- (o.OrderID = od.OrderID) : data pada kolom orderID dari tabel o(orders) hous
	Sama dengan data Pada kolom OrderID dari tabel od (orderdetails).
- ORDER BY c.customerID : untuk mengurut data berdasarkan kolom customer
	dari tabel (customers).

Hasil akan tampil hasil Pembulatan dari kolom-kolom Yang telah memenuhi kondisi dari WHERE.
# Gambar 10

```sql
SELECT c.customerid, c.companyname, ROUND(SUM((1-od.discount)*od.unitprice*od.quantity),2) AS TotalJumlah
     FROM customers c, orders o, orderdetails od WHERE c.customerid=o.customerid AND o.orderid=od.orderid
     GROUP BY c.customerid, c.companyname
     ORDER BY c.customerid;
```

Hasil : 
![](gambar10.png)

- SELECT : untuk memilih kolom mana saja yang ingin ditampilkan dan dibulatkan
- c.CustomerID, c.CompanyName : kolom customerID dan companyName dari tabel c(customers) dipilih untuk ditampilkan.
- ROUND (SUM((1-od.discount)* od.UnitPrice * od.quantity), 2) As Total Jumlah : untuk membulatkan hasil sum dari ((1 dikurang kolom Discount) dikali unitPrice Kali Quantity) sampai 2 digit.Dan nama kolom hasilnya diubah sementara Jadi TotalJumlah.
- FROM Customers c, orders o, orderdetails od : untuk memilih dari tabel mana saja Yang kolomnya dipilih untuk ditampilkan dan dibulatkan. customers, orders dan orderdetails, adalah nama tabel yang dipilih.
- WHERE : kondisi Yang harus dipenuhi oleh suatu data adar bisa ditampilkan.
- (c.customerID = o.custID) : data Pada kolom customerID dari tabel c(customers) harus sama dengan data Pada kolom CustID dari tabel o (orders).
- AND : untuk menyeleksi dua data atau lebih rada kondisi WHERE. 
- (o.orderID)=od.orderID) : data Pada kolom orderID dari tabel o (orders) harus
	sama dengan data pada kolom orderID dari tabel od(orderdetails). 
- GROUP BY c.customerID, c.CompanyName : untuk mengelompokkan data sesuai dengan kolom customerID dan companyName dari tabel c(customers).
- ORDER BY c.customerID : untuk mengurut data berdasarkan kolom CustomerID dori tabel c(customers)

Hasilnya Jadi, kolom yang dikelompokkan adalah customerID dan company Name dan tampilannya diurutkan berdasarkan kolom customerID.
Data