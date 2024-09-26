## 1. Gunakan perintah DESC pegawai; untuk mendapatkan struktur tabel.
*STRUKTUR "*
SQL
```sql
CREATE TABLE pegawai (
-> NIP INT PRIMARY KEY,
-> NDep VARCHAR(255) NOT NULL,
-> NBlk VARCHAR(255),
-> JK ENUM('L', 'P') NOT NULL,
-> Alamat TEXT NOT NULL,
-> Telp VARCHAR(255) NOT NULL,
Jabatan ENUM('Manager', 'Sales', 'Staff'),
    Gaji BIGINT NOT NULL,
    NoCab VARCHAR(255) NOT NULL
);

```

*PENJELASAN :*
- *NIP INT PRIMARY KEY*:
    - *NIP*: Kolom ini menyimpan Nomor Induk Pegawai yang bertipe data integer (INT).
    - *PRIMARY KEY*: Menandakan bahwa kolom NIP adalah kunci utama dari tabel ini. Kunci utama harus memiliki nilai yang unik untuk setiap baris dan tidak boleh NULL.
    
- *NDep VARCHAR(255) NOT NULL*:
    - *NDep*: Kolom ini menyimpan Nama Depan pegawai bertipe data string dengan panjang maksimum 255 karakter (VARCHAR(255)).
    - *NOT NULL*: Menandakan bahwa kolom ini tidak boleh berisi nilai kosong (NULL); artinya, setiap baris harus memiliki nilai untuk kolom ini.
    
- *NBlk VARCHAR(255)*:
    - *NBlk*: Kolom ini menyimpan Nama Belakang pegawai bertipe data string dengan panjang maksimum 255 karakter (VARCHAR(255)).
    - Kolom ini tidak memiliki batasan NOT NULL, sehingga nilai kosong (NULL) diizinkan.
    
- *JK ENUM('L', 'P') NOT NULL*:
    - *JK*: Kolom ini menyimpan Jenis Kelamin pegawai dengan tipe data ENUM. Hanya dua nilai yang diperbolehkan: 'L' (Laki-laki) atau 'P' (Perempuan).
    - *NOT NULL*: Menandakan bahwa kolom ini tidak boleh kosong; artinya, setiap baris harus memiliki nilai untuk kolom ini.

- *Alamat TEXT NOT NULL*:
    - *Alamat*: Kolom ini menyimpan alamat pegawai dengan tipe data TEXT, yang bisa menampung teks dalam jumlah besar.
    - *NOT NULL*: Menandakan bahwa kolom ini harus diisi dengan nilai; nilai kosong (NULL) tidak diperbolehkan.

- *Telp VARCHAR(255) NOT NULL*:
    - *Telp*: Kolom ini menyimpan nomor telepon pegawai dengan tipe data string dan panjang maksimum 255 karakter (VARCHAR(255)).
    - *NOT NULL*: Menandakan bahwa kolom ini harus diisi; nilai kosong (NULL) tidak diperbolehkan.
    
- *Jabatan ENUM('Manager', 'Sales', 'Staff')*:
    - *Jabatan*: Kolom ini menyimpan jabatan pegawai dengan tipe data ENUM. Nilai yang diperbolehkan adalah 'Manager', 'Supervisor', atau 'Staff'.
    - Kolom ini tidak memiliki batasan NOT NULL, sehingga nilai kosong (NULL) diizinkan.
    
- *Gaji BIGINT NOT NULL*:
    - *Gaji*: Kolom ini menyimpan gaji pegawai dengan tipe data BIGINT, yang dapat menampung bilangan bulat yang sangat besar.
    - *NOT NULL*: Menandakan bahwa kolom ini harus diisi; nilai kosong (NULL) tidak diperbolehkan.
    
- *NoCab VARCHAR(255) NOT NULL*:
    - *NoCab*: Kolom ini menyimpan nomor cabang pegawai dengan tipe data string dan panjang maksimum 255 karakter (VARCHAR(255)).
    - *NOT NULL*: Menandakan bahwa kolom ini harus diisi; nilai kosong (NULL) tidak diperbolehkan.

*HASIL :*
![](Asset/gambar2.jpg)
## 2. Gunakan perintah SELECT * FROM pegawai; untuk mendapatkan data.
*STRUKTUR "*
SQL
INSERT INTO pegawai (NIP, NDep, NBlk, JK, Alamat, Telp, Jabatan, Gaji, NoCab) VALUES 
-> (10107, 'Emya', 'Salsalina', 'P', 'JL. Suci 78 Bandung', '022-555768', 'Manager', 5250000, 'C101'), 
-> (10246, 'Dian', 'Anggraini', 'P', 'JL. Mawar 5 Semarang', '024-555102', 'sales', 2750000, 'C103'), 
-> (10324, 'Martin', 'Susanto', 'L', 'JL. Bima 51 Jakarta', '021-555785', 'Staff', 1750000, 'C102'), 
-> (10252, 'Antoni', 'Irawan', 'L', 'JL. A. Yani 15 Jakarta', '021-555888', 'Manager', 5750000, 'C102'), 
-> (10176, 'Diah', 'Wahyuni', 'P', 'JL. Maluku 56 Bandung', '022-555934', 'sales', 2500000, 'C101'), 
-> (10314, 'Ayu', 'Rahmadani', 'P', 'JL. Malaka 342 Jakarta', '021-555098', 'Sales', 1950000, 'C102'), 
-> (10307, 'Erik', 'Adrian', 'L', 'JL. Manggis 5 Semarang', '024-555236', 'Manager', 6250000, 'C103'), 
-> (10415, 'Susan', 'Sumantri', 'P', 'JL. Pahlawan 24 Surabaya', '031-555120', '', 2650000, 'C104'), 
-> (10407, 'Rio', 'Gunawan', 'L', 'JL. Melati 356 Surabaya', '031-555231', 'Staff', 1725000, 'C104');


*PENJELASAN :*
- *INSERT INTO pegawai*:
    - Menunjukkan bahwa Anda akan menambahkan data ke tabel bernama pegawai.
    
- *(NIP, NDep, NBlk, JK, Alamat, Telp, Jabatan, Gaji, NoCab)*:
    - Ini adalah daftar kolom dalam tabel pegawai yang akan diisi dengan data. Kolom-kolom ini adalah:
        - NIP (Nomor Induk Pegawai)
        - NDep (Nama Depan)
        - NBlk (Nama Belakang)
        - JK (Jenis Kelamin)
        - Alamat (Alamat)
        - Telp (Telepon)
        - Jabatan (Jabatan)
        - Gaji (Gaji)
        - NoCab (Nomor Cabang)
        
- *VALUES*:
    - Menunjukkan data yang akan dimasukkan ke dalam tabel. Data untuk setiap baris harus sesuai dengan urutan kolom yang disebutkan sebelumnya.
    
- *Data yang Dimasukkan*:
    - Baris pertama:
        - NIP: 10107
        - NDep: 'Emya'
        - NBlk: 'Salsalina'
        - JK: 'P' (Perempuan)
        - Alamat: 'JL. Suci 78 Bandung'
        - Telp: '022-555768'
        - Jabatan: 'Manager'
        - Gaji: 5250000
        - NoCab: 'C101'
    - Baris kedua dan seterusnya mengikuti pola yang sama, dengan data yang berbeda.
    
- *Catatan*:
    - Pada baris 10415 untuk Susan Sumantri, kolom Jabatan tidak diisi (''), yang bisa menyebabkan masalah jika kolom Jabatan adalah ENUM dan tidak termasuk nilai kosong. Pastikan kolom Jabatan memiliki nilai yang valid.
    - Jika ada nilai kosong ('') dalam kolom Jabatan, Anda mungkin ingin memperbarui baris ini dengan jabatan yang sesuai, seperti 'Staff', atau menyesuaikan schema tabel untuk mengizinkan nilai kosong jika perlu.

*HASIL :*
![](Asset/gambar1.jpg)


## Latihan-1
**GAMBAR : 
![[ade1.jpg]]

*STRIKTUR :*
```sql
SELECT COUNT(NIP) AS JumlahPegawai, COUNT(Jabatan) AS JumlahJabatan FROM pegawai;
```

*PENJELASAN :* 
- SELECT untuk memilih kolom apa saja yang ingin dipilih (untuk dihitung).
- COUNT (NIP) = untuk menghitung Jumlah barisan data yang mempunyai
  dari kalom Yang dipilih. NIP adalah nama kolom Yang dipilih untuk dihitung.

- AS = untuk mengubah nauna dari suatu kolom untuk sementara. Jumlah PeSouvai = merupakan nama ubahan dari Perintah As Yang digunakan. merupakan nama sementara dari perintah COUNT(NIP).

-  COUNT (Departemen) = untuk menghitung jumlah baris data Yoard yang memiliki konten data dari kumpulan yang dipilih.
   Jabatan adalah nama kolom yang dipilih untuk dihitung.

- AS untuk mengubah nama dari suatu kolom untuk sementara. Jumlah Jabatan = merupakan nama sementara dari perintah court (Jabatan).
- From Pegawai merupakan dari tabel mana datanya Yang didupakan Pesawai adalah nama tabel Yang datanya ingin digunakan.

- Hasilnya karena ada y barisan data, Yand indin dihitung adalah kalam NIP, Jumlah dari kolom NIP (isi datanya) ada 9, ditampilkan sebagai Jumlah pesawai. kolom Jabatan Jusa dihitung, akan tetapi ada satu data Yang berisi Null (kosong), oleh karena itu hanya ada & data ditampilkan sebadal jumlah jabatan  
## Latihan-2
**GAMBAR : 
![[ade2.png]]

*STRIKTUR :*
```sql
select count(NIP) AS JumlahPegawai
    -> FROM pegawai
    -> WHERE NoCab = 'C102';
```


*PENJELASAN :* 
- SELECT = untuk memilih kolom mana saja yang ingin dipilih untuk dihitung.
- COUNT (NIP) = untuk menghitung jumlah blok data yang memiliki data dari kolom yang dipilih.
- NIP adalah nama kolom Yang dipilih untuk Jihitung.
- As = untuk mengubah nama dari suatu kolom untuk sementara.
## Latihan-3
**GAMBAR : 
![[ade6.jpg]]

*STRIKTUR :*
```sql
SELECT SUM(Gaji) AS Gaji_Manager
    -> FROM pegawai
    -> WHERE Jabatan = 'Manager';
```

*PENJELASAN :* 
- SELECT untuk memilih kolom mana saja Yand insin dihitung atau ditampilkan. NoCab merupakan nama kolom Yang ingin ditampilkan.
- COUNT (NIP) = untuk menghitung Jumlah batisan data Yang mempunyai isi data dari kolom Yang dipilih. NIP adalah nama kolom Yang dipilih untuk dihitung.
- AS untuk mengubah nama dari suatu kolom untuk sementara.
- Jumlah Pegawai merupakan nama Sementara dari kolom hasil COUNT(NIP). 
- From Pegawai dari tabel mana yang data kodomnya ingin digunakan.
  Pegawai adalah nama tabel Yang dipilih untuk digunakan.
- GROUP BY = untuk menjelompokkan data berdasarkan nilai data yang telah ditentukan Pada kolom yang dipilih.
- Nocab hama kolom Yang dipilih untuk datanya dikelompokkan.
- Hasilnya Berdasarkan 9 barisan data, masing-masing. nilai dalam kojom Nocab
## Latihan-4
**GAMBAR : 
![[ade3.png]]

*STRIKTUR :*
```sql
SELECT NoCab, COUNT(NIP) AS Jumlah_pegawai
    -> FROM pegawai
    -> GROUP BY NoCab;
```

*PENJELASAN :* 
- SELECT = untuk memilih kojom mana sasa Yang ingin dihitung atau ditampilkan.
- Nocab: merupakan nama kolom yang ingin ditampilkan.
- COUNT(NIP) = untuk menghitung jumlah barisun data yang mempunyai isi data dari kolom Yang dipilih. NIP adalah nama kolom Yang dipilih untuk dihitung.
- AS untuk mengubah nama dari suatu kojom untuk sementara.
- Jumlah-Pesawai nama sementara dari kolom hasil COUNT (NIP).
- From Pegawai untuk memilih dari tabel mana Yand data kolomnya ingin digunakan. Pesawai adalah nama taber Yang dipilih untuk digunakan.
GROUP BY untuk menjelompokkan data berdasarkan nilai data Yang telah ditentukan Pada kolom Yang dipilih.
- Nocab nama kolom Yang dipilih untuk dikelompokkan datanya.
- HAVING = untuk menentukan kondisi (Yand hans dipenuhi) oleh suatu kelompok data sedang melakukan ada bisa ditampilkun.
- (COUNT (NIP) >= 3) = merupakan kondisi Yang harus dipenuhi oleh suatu kelompok data. Jadi hanya kelompok data Yang hasil hitungannya lebih atau Sama dengan 3.
- Hasilnya seperti sebelumnya, ada 9 barisan data dibagi sesuai Nocab nya masinθ -masing. Namun Yand indin ditampilkan adalah hasil hitungan yang lebih dari atau sama dengan 3. Yaitu Nocab C102 Yang ada 3. Yang lain c101 ada 2, c103 ada 2, c109 ada 2.
- Jumlah pesawai nama sementara Yang dipilih untuk kolom COUNT (NIP)
- From Pesawai dari tabel mana datanya akan digunakan. Pegawai adalah nama tabel Yang dipilih untuk digunakan. 
- WHERE merupakan kondisi yang harus dipenuhi ajar datanya dapat dendon query COUNT (NIP).
- (Nocab = 'C102') = adalah kordisi dari WHERE Yang harus dipenuhi, Jadi hanya barisan data yang memiliki Clo2' di kolom "vocab" Yang bisa dihitung.
- Hasilnya Di 9 barisan data Yangada Pada tabel Pesawai, kita ingin menghitung Jumlah barisan data Yang memiliki nilai 'clo2' Pada kolom "Nocab" nya dengan menggunakan COUNT. Jadi Yang muncul adalah 3 barisan data. kita Juda ingin mengubah nama dari kolom hasil Perintah COUNT Secara sementara dengan Perintah As, namanya adalah Jumlah Pegawai.
## Latihan-5
**GAMBAR : 
![[Screenshot 2024-08-21 210723.png]]

*STRIKTUR :*
```sql
SELECT NoCab, COUNT(NIP) AS Jumlah_pegawai
    -> FROM pegawai
    -> GROUP BY NoCab HAVING COUNT(NIP) >= 3;
```

*PENJELASAN :* 
- *SELECT NoCab, COUNT(NIP) AS Jumlah_pegawai*:
    - *NoCab*: Memilih kolom NoCab yang biasanya menunjukkan kode cabang tempat pegawai bekerja.
    - *COUNT(NIP)*: Menghitung jumlah baris atau records berdasarkan kolom NIP. Karena NIP biasanya merupakan identifikasi unik untuk setiap pegawai, ini menghitung jumlah pegawai.
    - *AS Jumlah_pegawai*: Memberikan alias Jumlah_pegawai pada hasil hitungan ini, untuk memberi nama yang lebih deskriptif pada kolom hasil.
    
- *FROM pegawai*:
    - Menunjukkan bahwa data yang akan diambil berasal dari tabel pegawai.

- *GROUP BY NoCab*:
    - Mengelompokkan hasil berdasarkan nilai dalam kolom NoCab. Ini memastikan bahwa penghitungan COUNT(NIP) dilakukan secara terpisah untuk setiap cabang.
    
- *HAVING COUNT(NIP) >= 3*:
    - *HAVING*: Digunakan untuk menetapkan kondisi pada kelompok data setelah pengelompokan dilakukan. Berbeda dengan WHERE yang digunakan sebelum pengelompokan, HAVING berlaku setelah GROUP BY.
    - *COUNT(NIP) >= 3*: Menyaring kelompok cabang yang memiliki jumlah pegawai lebih dari atau sama dengan tiga. Hanya cabang-cabang yang memenuhi kondisi ini yang akan ditampilkan dalam hasil query.

## Latihan-6
**GAMBAR : 
![[ade5.jpg]]

STRIKTUR :**
```sql
SELECT SUM(Gaji) AS Total_Gaji
    -> FROM pegawai;
```

*PENJELASAN :* 
- *SELECT SUM(Gaji) AS Total_Gaji*:
    - *SUM(Gaji)*: Menghitung jumlah total dari semua nilai dalam kolom Gaji. Fungsi agregat SUM() menjumlahkan nilai-nilai dalam kolom tersebut.
    - *AS Total_Gaji*: Memberikan alias Total_Gaji pada hasil hitungan ini. Alias ini akan digunakan sebagai nama kolom dalam hasil query.
    
- *FROM pegawai*:
    - Menunjukkan bahwa data yang akan diambil berasal dari tabel pegawai.
##  Latihan-7
**GAMBAR : 
![[ade6.jpg]]

STRIKTUR :**
```sql
SELECT SUM(Gaji) AS Gaji_Manager
    -> FROM pegawai
    -> WHERE Jabatan = 'Manager';
```

*PENJELASAN :* 
- *SELECT SUM(Gaji) AS Gaji_Manager*:
    - *SUM(Gaji)*: Menghitung jumlah total dari nilai-nilai dalam kolom Gaji. Fungsi agregat SUM() digunakan untuk menjumlahkan semua nilai gaji yang memenuhi kondisi tertentu.
    - *AS Gaji_Manager*: Memberikan alias Gaji_Manager pada hasil hitungan ini. Alias ini akan digunakan sebagai nama kolom dalam hasil query, memberikan deskripsi yang jelas bahwa nilai tersebut adalah total gaji untuk jabatan 'Manager'.
    
- *FROM pegawai*:
    - Menunjukkan bahwa data yang akan diambil berasal dari tabel pegawai.
    
- *WHERE Jabatan = 'Manager'*:
    - Menetapkan kondisi filter untuk query. Hanya baris yang memiliki nilai Jabatan sama dengan 'Manager' yang akan dihitung. Dengan kata lain, hanya pegawai dengan jabatan 'Manager' yang akan dihitung total gajinya.
## Latihan-8
**GAMBAR : 
![[ade7.jpg]]

STRIKTUR :**
```sql
ELECT NoCab, SUM(Gaji) AS TotalGaji
    -> FROM pegawai
    -> GROUP BY NoCab;
```

*PENJELASAN :* 
- *SELECT NoCab, SUM(Gaji) AS TotalGaji*:
    - *NoCab*: Memilih kolom NoCab, yang biasanya menunjukkan kode cabang tempat pegawai bekerja.
    - *SUM(Gaji)*: Menghitung jumlah total dari nilai-nilai dalam kolom Gaji. Fungsi agregat SUM() digunakan untuk menjumlahkan gaji dari semua pegawai dalam setiap cabang.
    - *AS TotalGaji*: Memberikan alias TotalGaji pada hasil hitungan ini, yang akan digunakan sebagai nama kolom dalam hasil query.

- *FROM pegawai*:
    - Menunjukkan bahwa data yang akan diambil berasal dari tabel pegawai.

- *GROUP BY NoCab*:
    - Mengelompokkan hasil berdasarkan nilai dalam kolom NoCab. Ini memastikan bahwa perhitungan SUM(Gaji) dilakukan secara terpisah untuk setiap nilai unik di kolom NoCab, yaitu setiap cabang.
## Latihan-9
**GAMBAR : 
![[ade8.png]]

STRIKTUR :**
```sql
SELECT NoCab, SUM(Gaji) AS Total_Gaji
    -> FROM pegawai
    -> GROUP BY NoCab HAVING SUM(Gaji) >= 8000000;
```


*PENJELASAN :* 
- *SELECT NoCab, SUM(Gaji) AS Total_Gaji*:
    - *NoCab*: Memilih kolom NoCab, yang biasanya menunjukkan kode cabang tempat pegawai bekerja.
    - *SUM(Gaji)*: Menghitung jumlah total dari nilai-nilai dalam kolom Gaji. Fungsi agregat SUM() digunakan untuk menjumlahkan gaji dari semua pegawai dalam setiap cabang.
    - *AS Total_Gaji*: Memberikan alias Total_Gaji pada hasil hitungan ini, yang akan digunakan sebagai nama kolom dalam hasil query.

- *FROM pegawai*:
    - Menunjukkan bahwa data yang akan diambil berasal dari tabel pegawai.

- *GROUP BY NoCab*:
    - Mengelompokkan hasil berdasarkan nilai dalam kolom NoCab. Ini memastikan bahwa perhitungan SUM(Gaji) dilakukan secara terpisah untuk setiap cabang.

- *HAVING SUM(Gaji) >= 8000000*:
    - *HAVING*: Digunakan untuk menetapkan kondisi pada kelompok data setelah pengelompokan dilakukan. Ini berbeda dari WHERE yang berlaku sebelum pengelompokan.
    - *SUM(Gaji) >= 8000000*: Menyaring hasil agar hanya cabang-cabang yang memiliki total gaji 8.000.000 atau lebih yang ditampilkan.
## Latihan-10
**GAMBAR : 
![[ade9.jpg]]

STRIKTUR :**
```sql
SELECT AVG(Gaji) AS Rata_rata
    -> FROM pegawai;
```

*PENJELASAN :* 
- *SELECT AVG(Gaji) AS Rata_rata*:
    - *AVG(Gaji)*: Menghitung rata-rata dari nilai-nilai dalam kolom Gaji. Fungsi agregat AVG() digunakan untuk menghitung nilai rata-rata dari kolom tersebut.
    - *AS Rata_rata*: Memberikan alias Rata_rata pada hasil perhitungan ini. Alias ini akan digunakan sebagai nama kolom dalam hasil query, memberikan deskripsi yang jelas bahwa nilai tersebut adalah rata-rata gaji.
    
- *FROM pegawai*:
    - Menunjukkan bahwa data yang akan diambil berasal dari tabel pegawai.
## Latihan-11
**GAMBAR : 
![[ade10.jpg]]

STRIKTUR :**
```sql
SELECT AVG(Gaji) AS GajiRataMgr
    -> FROM pegawai
    -> WHERE Jabatan = 'Manager';
```

*PENJELASAN :* 
- *SELECT AVG(Gaji) AS GajiRataMgr*:
    - *AVG(Gaji)*: Menghitung rata-rata nilai dari kolom Gaji. Fungsi agregat AVG() digunakan untuk menghitung nilai rata-rata gaji.
    - *AS GajiRataMgr*: Memberikan alias GajiRataMgr pada hasil perhitungan ini. Alias ini akan digunakan sebagai nama kolom dalam hasil query, memberikan deskripsi yang jelas bahwa nilai tersebut adalah rata-rata gaji untuk jabatan 'Manager'.

- *FROM pegawai*:
    - Menunjukkan bahwa data yang akan diambil berasal dari tabel pegawai.

- *WHERE Jabatan = 'Manager'*:
    - Menetapkan kondisi filter sehingga hanya pegawai yang memiliki nilai Jabatan sama dengan 'Manager' yang dihitung. Ini berarti hanya gaji dari pegawai dengan jabatan 'Manager' yang akan dimasukkan dalam perhitungan rata-rata.

## Latiahn-12
**GAMBAR : 
![[ade11.jpg]]

STRIKTUR :**
```sql
SELECT NoCab, AVG(Gaji) AS RataGaji
-> FROM pegawai
-> GROUP BY NoCab;
```


*PENJELASAN :* 
- SELECT NoCab, AVG(Gaji) AS RataGaji :
- SELECT : Digunakan untuk menentukan kolom mana yang ingin ditampilkan dalam hasil query
- NoCab : Kolom pertama yang akan ditampilkan dalam hasil query. Ini adalah kolom yang menunjukkan kode cabang (misalnya, NoCab bisa merujuk pada nomor cabang dari tabel pegawai).
- AVG(Gaji) AS RataGaji : Menghitung rata-rata nilai kolom Gaji untuk setiap grup yang dikelompokkan (dalam hal ini, berdasarkan NoCab ). Fungsi AVG adalah fungsi agregat yang menghitung nilai rata-rata dari kolom yang ditentukan. AS RataGajimemberikan alias atau nama lain pada kolom hasil perhitungan rata-rata tersebut, sehingga hasilnya akan ditampilkan dengan nama RataGaji .
- FROM pegawai :Menunjukkan tabel dari mana data diambil, dalam hal ini tabel yang bernama pegawai .
- GROUP BY NoCab :
- GROUP BY : Digunakan untuk mengelompokkan baris-baris yang memiliki nilai kolom yang sama. Dalam hal ini, data akan dikelompokkan berdasarkan kolom NoCab . Setiap grup berisi baris-baris dengan nilai NoCab yang sama.
- Setelah pengelompokan, fungsi agregat (seperti AVG ) diterapkan pada setiap grup.
## Latiahn-13
**GAMBAR : 
![[ade12.jpg]]

STRIKTUR :**
```sql
SELECT NoCab, AVG(Gaji) AS RataGaji
-> FROM pegawai
-> GROUP BY NoCab HAVING NoCab = 'C101' OR NoCab = 'C102';
```

*PENJELASAN :* 
- SELECT NoCab, AVG(Gaji) AS RataGaji :
- SELECT : Digunakan untuk menentukan kolom yang ingin ditampilkan dalam hasil query
- NoCab : Kolom pertama yang ditampilkan dalam hasil query, yang mewakili kode cabang
- AVG(Gaji) AS RataGaji : Fungsi agregat AVG digunakan untuk menghitung rata-rata nilai dari kolom Gaji untuk setiap grup yang dibentuk berdasarkan NoCab . Hasilnya diberi nama alias RataGaji .
- FROM pegawai :
Menunjukkan bahwa data diambil dari tabel pegawai .
- GROUP BY NoCab :
GROUP BY digunakan untuk mengelompokkan data berdasarkan nilai kolom NoCab . Setiap nilai unik dari NoCab akan menjadi satu grup, dan rata-rata gaji ( AVG(Gaji) dihitung untuk masing-masing grup.
- HAVING NoCab = 'C101' OR NoCab = 'C102' :
HAVING adalah klausul yang digunakan untuk memfilter hasil setelah pengelompokan data dengan GROUP BY .
- Dalam konteks ini, HAVING membatasi hasil query hanya pada grup-grup di man NoCab adalah 'C101' atau 'C102'.
- Ini berbeda dari WHERE karena WHERE digunakan sebelum pengelompokan, sedangkan HAVING digunakan setelah pengelompokan.
## Latiahn-14
**GAMBAR : 
![[ade13.jpg]]

STRIKTUR :**
```sql
SELECT MAX(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil
-> FROM pegawai;
```

*PENJELASAN :* 
- SELECT MAX(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil :
- MAX(Gaji) : 
Fungsi MAX digunakan untuk mencari nilai maksimum dari kolom Gaji . Fungsi ini akan menelusuri semua nilai dalam kolom Gaji dan mengembalikan nilaiyang paling besar. Hasil dari fungsi ini akan diberi alias (nama lain) GajiTerbesar .
- MIN(Gaji) :
Fungsi MIN digunakan untuk mencari nilai minimum dari kolom Gaji . Fungsi ini akan menelusuri semua nilai dalam kolom Gaji dan mengembalikan nilai yang paling kecil. Hasil dari fungsi ini akan diberi alias (nama lain) GajiTerkecil .
- FROM pegawai :
FROM pegawai : Bagian ini menentukan dari tabel mana data akan diambil. Dalam hal
ini, data diambil dari tabel pegawai
## Latiahn-15
**GAMBAR : 
![[ade15.jpg]]

STRIKTUR :**
```sql
SELECT NoCab, Max(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil
-> FROM pegawai
-> GROUP BY NoCab;
```

*PENJELASAN :* 
- SELECT NoCab, Max(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil :
- NoCab : Kolom ini akan ditampilkan dalam hasil query untuk menunjukkan nomor
cabang.
- MAX(Gaji) AS GajiTerbesar : Fungsi MAX digunakan untuk mencari nilai maksimum
dari kolom Gaji dalam setiap grup NoCab . Hasilnya diberi alias GajiTerbesar .
- MIN(Gaji) AS GajiTerkecil : Fungsi MIN digunakan untuk mencari nilai minimum
dari kolom Gaji dalam setiap grup NoCab . Hasilnya diberi alias GajiTerkecil .
- FROM pegawai :Bagian ini menentukan dari tabel mana data akan diambil. Dalam hal ini, data diambil
dari tabel pegawai .
- GROUP BY NoCab :
GROUP BY NoCab : Bagian ini mengelompokkan hasil berdasarkan kolom NoCab .
Artinya, data akan dikelompokkan berdasarkan nomor cabang, dan untuk setiap
cabang, fungsi MAX dan MIN akan diterapkan pada kolom Gaji .
## Latiahn-16
**GAMBAR : 
![[ade16.jpg]]

STRIKTUR :**
```sql
SELECT NoCab, Max(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil
-> FROM pegawai
-> GROUP BY NoCab HAVING COUNT(NIP) >= 3;
```

*PENJELASAN :* 
- SELECT NoCab, Max(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil :
- NoCab : Kolom ini menampilkan nomor cabang ( NoCab ) dalam hasil query.
- MAX(Gaji) AS GajiTerbesar : Fungsi MAX digunakan untuk mencari nilai maksimum
dari kolom Gaji dalam setiap grup NoCab . Hasilnya diberi alias GajiTerbesar .
- MIN(Gaji) AS GajiTerkecil : Fungsi MIN digunakan untuk mencari nilai minimum
dari kolom Gaji dalam setiap grup NoCab . Hasilnya diberi alias GajiTerkecil .
- FROM pegawai :
Bagian ini menentukan dari tabel mana data akan diambil. Dalam hal ini, data diambil
dari tabel pegawai .
-GROUP BY NoCab :
GROUP BY NoCab : Bagian ini mengelompokkan hasil berdasarkan kolom NoCab .
Artinya, data akan dikelompokkan berdasarkan nomor cabang, dan untuk setiap
cabang, fungsi MAX dan MIN akan diterapkan pada kolom Gaji .HAVING COUNT(NIP) >= 3 :
- HAVING COUNT(NIP) >= 3 : Kondisi ini menyaring hasil grup yang memenuhi kriteria
tertentu. Dalam hal ini, hanya cabang yang memiliki jumlah pegawai (dihitung
berdasarkan NIP , yang merupakan Nomor Induk Pegawai) sebanyak tiga atau lebih
yang akan dimasukkan dalam hasil.
## Latiahn-17
**GAMBAR : 
![[ade17.jpg]]

STRIKTUR :**
```sql
SELECT COUNT(NIP) AS JumlahPegawai, SUM(Gaji) AS TotalGaji,
-> AVG(Gaji) AS RataGaji, MAX(Gaji) AS GajiMaks, MIN(Gaji) AS GajiMin
-> FROM pegawai;
```

*PENJELASAN :* 
- SELECT COUNT(NIP) AS JumlahPegawai:
Bagian ini menghitung jumlah pegawai dalam tabel pegawai dengan cara
menghitung berapa banyak data NIP (Nomor Induk Pegawai) yang ada. Hasilnya
akan ditampilkan dengan nama alias JumlahPegawai .
- SUM(Gaji) AS TotalGaji:
Bagian ini menjumlahkan seluruh nilai gaji dari semua pegawai yang ada di tabel
pegawai . Hasil penjumlahan ini akan ditampilkan dengan nama alias TotalGaji .
- AVG(Gaji) AS RataGaji:
Bagian ini menghitung rata-rata gaji dari semua pegawai yang ada di tabel pegawai .
Hasil perhitungan rata-rata gaji ini akan ditampilkan dengan nama alias RataGaji .
- MAX(Gaji) AS GajiMaks:
Bagian ini mencari dan menampilkan gaji tertinggi (maksimum) di antara semua
pegawai yang ada di tabel pegawai . Hasilnya akan ditampilkan dengan nama alia
GajiMaks .
- MIN(Gaji) AS GajiMin: Bagian ini mencari dan menampilkan gaji terendah (minimum) di antara semua
pegawai yang ada di tabel pegawai . Hasilnya akan ditampilkan dengan nama alias
GajiMin 
- FROM pegawai:
Bagian ini menunjukkan tabel sumber data yang digunakan, yaitu tabel pegawai .
Semua operasi perhitungan (COUNT, SUM, AVG, MAX, MIN) akan dilakukan
berdasarkan data yang ada di tabel ini.
## Latiahn-18
**GAMBAR : 
![[ade18.jpg]]

STRIKTUR :**
```sql
SELECT COUNT(NIP) AS Jumlahpegawai, SUM(Gaji) AS TotalGaji,
-> AVG(Gaji) AS RataGaji, Max(Gaji) AS GajiMks, MIN(Gaji) AS GajiMin
-> FROM pegawai
-> WHERE Jabatan = 'Staff' OR Jabatan = 'Sales'
-> GROUP BY NoCab HAVING SUM(Gaji) <= 2600000;
```

*PENJELASAN :* 
- SELECT COUNT(NIP) AS Jumlahpegawai:
Bagian ini menghitung jumlah pegawai dengan menghitung jumlah NIP (Nomor
Induk Pegawai) yang ada. Hasilnya akan ditampilkan dengan nama alias
Jumlahpegawai 
- SUM(Gaji) AS TotalGaji:
Bagian ini menjumlahkan semua nilai gaji dari pegawai yang memenuhi kriteria. Hasil
penjumlahan gaji ini akan ditampilkan dengan nama alias TotalGaji .
- AVG(Gaji) AS RataGaji:Bagian ini menghitung rata-rata gaji dari pegawai yang memenuhi kriteria. Hasil
perhitungan rata-rataini akan ditampilkan dengan nama alias RataGaji .
- MAX(Gaji) AS GajiMks:
Bagian ini mencari dan menampilkan gaji tertinggi (maksimum) di antara pegawai
yang memenuhi kriteria. Hasilnya akan ditampilkan dengan nama alias GajiMks .
- MIN(Gaji) AS GajiMin:
Bagian ini mencari dan menampilkan gaji terendah (minimum) di antara pegawai
yang memenuhi kriteria. Hasilnya akan ditampilkan dengan nama alias GajiMin .
- FROM pegawai:
Bagian ini menunjukkan tabel yang menjadi sumber data, yaitu tabel pegawai .
- WHERE Jabatan = 'Staff' OR Jabatan = 'Sales':
Bagian ini menetapkan kondisi untuk memilih hanya pegawai dengan Jabatan yang
bernilai 'Staff' atau 'Sales'. Artinya, hanya data pegawai dengan jabatan ini yang akan
diproses lebih lanjut dalam query ini.
- GROUP BY NoCab:
Bagian ini mengelompokkan data berdasarkan kolom NoCab (Nomor Cabang).
Artinya, data akan dikelompokkan per cabang, dan hasil perhitungan (jumlah
pegawai, total gaji, rata-rata gaji, gaji tertinggi, dan gaji terendah) akan ditampilkan
untuk setiap cabang.
- 32HAVING SUM(Gaji) <= 2600000:
Bagian ini menetapkan kondisi setelah pengelompokan, yaitu hanya cabang-cabang
yang memiliki total gaji kurang dari atau sama dengan 2.600.000 yang akan
ditampilkan dalam hasil akhir query. Kondisi ini digunakan setelah pengelompokan
karena HAVING digunakan untuk menyaring hasil setelah agregasi (seperti SUM ).