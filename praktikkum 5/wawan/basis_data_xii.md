## 1.membuat database company_indrawan.
STRUKTUR 

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


PENJELASAN :
1. NIP (Nomor Induk Pegawai):
- Tipe data INT dipilih karena NIP biasanya berupa angka yang dapat direpresentasikan dengan tipe data integer.
- PRIMARY KEY menunjukkan bahwa kolom NIP adalah kunci utama (primary key) yang unik untuk setiap data pegawai.

2. NDep (Nama Departemen) dan NBlk (Nama Belakang):
- Tipe data VARCHAR(255)dipilih karena nama departemen dan nama belakang dapat berupa string yang panjangnya bervariasi, namun tidak melebihi 255 karakter.
- NOT NULL menunjukkan bahwa kolom NDep dan NBlk harus diisi, karena informasi tersebut dianggap penting untuk data pegawai.

3. JK (Jenis Kelamin):
- Tipe data ENUM('L', 'P') dipilih karena jenis kelamin hanya memiliki dua kemungkinan, yaitu 'Laki-laki' dan 'Perempuan'.
- NOT NULL menunjukkan bahwa kolom JK harus diisi, karena informasi jenis kelamin dianggap penting untuk data pegawai.

4. Alamat:
- Tipe data TEXT dipilih karena alamat dapat berisi string yang lebih panjang daripada VARCHAR(255)
- NOT NULL menunjukkan bahwa kolom Alamat harus diisi, karena informasi tersebut dianggap penting untuk data pegawai.

5. Telp (Telepon):
- Tipe data VARCHAR(255) dipilih karena nomor telepon dapat berupa string yang panjangnya bervariasi, namun tidak melebihi 255 karakter.
- NOT NULL menunjukkan bahwa kolom Telp harus diisi, karena informasi kontak pegawai dianggap penting

6. . Jabatan:
- Tipe data ENUM('Manager', 'sales', 'Staff') dipilih karena jabatan pegawai hanya memiliki tiga kemungkinan.
- Tidak ada atribut NOT NULL atau NULL, artinya kolom Jabatan boleh diisi atau dibiarkan kosong.

7. Gaji:
- Tipe data BIGINT dipilih karena gaji pegawai dapat berupa angka yang cukup besar.
- NOT NULL menunjukkan bahwa kolom Gaji harus diisi, karena informasi gaji dianggap penting untuk data pegawai.

8. NoCab (Nomor Cabang):
- Tipe data VARCHAR(255) dipilih karena nomor cabang dapat berupa string yang panjangnya bervariasi, namun tidak melebihi 255 karakter.
- NOT NULL menunjukkan bahwa kolom NoCab harus diisi, karena informasi cabang dianggap penting untuk data pegawai.

Secara umum, penggunaan tipe data dan atribut NOT NULL atau NULL pada tabel pegawai ini dimaksudkan untuk menjaga integritas dan konsistensi data, serta memastikan bahwa informasi yang dianggap penting untuk data pegawai selalu tersedia.

HASIL :
![](assett/database.png)


## 2. membuat table pegawai  .
*STRUKTUR "*
SQL
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

- - Baris kedua dan seterusnya mengikuti pola yang sama, dengan data yang berbeda.
- *Catatan*:
- Pada baris 10415 untuk Susan Sumantri, kolom Jabatan tidak diisi (''), yang bisa menyebabkan masalah jika kolom Jabatan adalah ENUM dan tidak termasuk nilai kosong. Pastikan kolom Jabatan memiliki nilai yang valid.
- Jika ada nilai kosong ('') dalam kolom Jabatan, Anda mungkin ingin memperbarui baris ini dengan jabatan yang sesuai, seperti 'Staff', atau menyesuaikan schema tabel untuk mengizinkan nilai kosong jika perlu.

*HASIL :*
![](assett/pegawai.png)


# select table

## jumlahpegawai and jumlahjabatan

### SINTAKS
```sql 
select  COUNT(NIP) AS Jumlahpegawai, COUNT(Jabatan) AS JumlahJabatan FROM pegawai;
```
 
### PENJELASAN 
- SELECT = untuk memilih kolom apa saja yang ingin dipilih (untuk dihitung).
- COUNT (NIP) = untuk menghitung Jumlah barisan data yang mempunyai dari kolom Yan dipilih. NIP adalah nama kolom Yang dipilih untuk dihitung.
- AS = untuk mengubah nama dari suatu kolom untuk sementara. Jumlah Pegawai = merupakan nama ubahan dari Perintah AS yang digunakan. merupakan nama sementara dari Perintah COUNT (NIP).
- COUNT (Jabatan) untuk menghitung jumlah barisan data yang mempunyai isi data dan kolom yang dipilih. Jabatan adalah nama kolom Yang dipilih untuk dihitung
- AS = untuk mengubah nama dari suatu kolom untuk sementara. Jumlah Jabatan = merupakan nama sementara dari perintah COUNT (Jabatan).
- FROM Pegawai = merupakan dari tabel mana datanya yang digunakan Pegawai adalah nama tabel Yang datanya ingin digunakan.
- Hasilnya = karena ada 9 barisan data, Yang ingin dihitung adalah kolom NIP, Jumlah dari kolom NIP (isi datanya) ada 9, ditampilkan sebagai Jumlah pesawai. Kolom Jabatan Jusa dihitung, akan tetapi ada satu data yang berisi Null (kosong), oleh karena itu hanya ada 8 data ditampilkan sebagai Jumlah Jabatan.

### HASIL : 
![](assett/JumlahPegawai-Jumlahjabatan.png)


##  Where

### sintaks
```SQL
 SELECT COUNT(NIP) AS Jumlahpegawai
    -> FROM pegawai
    -> where NoCab ='C102';
```

### PENJELASAN
- SELECT = untuk memilih kolom mana saja yang ingin dipilih untuk dihitung.
- COUNT (NIP) = untuk menghitung Jumlah barisan data yang mempunyai data dari kolom Yang dipilih. NIP adalah nama kolom Yang dipilih untuk dihitung.
- As = untuk mengubah nama dari suatu kolom untuk sementara.
- Jumlah Pesawai = nama sementara Yang dipilih untuk kolom COUNT (NIP)
- FROM Pegawai = dari tabel mana datanya akan digunakan. Pesawai adalah nama tabel Yang dipilih untuk digunakan.
- WHERE = merupakan kondisi Yang harus dipenuhi agar datanya dapat dengan query COUNT (NIP).
- (Nocab = 'C102') = adalah kondisi dari WHERE Yang harus dipenuhi, Jadi hanya barisan data yang memiliki Clo2 di kolom "vocab Yang bisa dihitung.
- Hasilnya = Di 9 barisan data Yangaja Pada tabel Pegawai, kita ingin menghitung Jumlah barisan data yang memiliki nilai 'clo₂ Pada kolom "Nocab" nya dengan menggunakan COUNT. Jadi Yang muncul adalah 3 0 barisan data. kita Juga ingin mengubah nama dari kolom hasil Perintah COUNT secara sementara dengan Perintah AS, namanya adalah Jumlah Pegawai.



### HASIL:
![](assett/jumlahpegawai.png)

## Group By

### sintaks
```sql
SELECT NoCab,COUNT(NIP) AS Jumlahpegawai
    -> FROM  Pegawai
    -> GROUP BY NoCab;
```
### PENJELASAN
- SELECT untuk memilih kolom mana saja yang ingin dihitung atau ditampilkan.
 -  Nocab = merupakan nama kolom Yang ingin ditampilkan.
- COUNT (NIP) = untuk menghitung Jumlah barisan data Yang mempunyai isi data dari kolom Yang dipilih.
- NIP adalah nama kolom yang dipilih untuk dihitung. AS untuk mengubah nama dari suatu kolom untuk sementara.
- Jumlah Pegawai = merupakan nama sementara dari  kolom hasil COUNT (NIP).
- FROM Pegawai dari tabel mana Yang data kolomnya ingin digunakan. Pegawai adalah nama tabel Yang dipilih untuk digunakan.
- GROUP BY untuk mengelompokkan data berdasarkan nilai data yang telah ditentuka Pada kolom Yang dipilih. Nocab hama kolom Yang dipilih untuk datanya dikelompokkan.
- Hasilnya = Berdasarkan. 9 barisan data, masing-masing. nilai, dalam kolom Nocab

### HASIL:
![](assett/baka.png)

## having
### sintaks
```sql
Select Nocab, Count(NIP) AS Jumlahpegawai
    -> FROM pegawai
    -> GROUP BY NoCab HAVING COUNT(NIP)>= 3;
```
### PENJELASAN
- SELECT = untuk memilih kolom mana sasa Yang ingin dihitung atau ditampilkan.
- Nocab = merupakan nama kolom yang ingin ditampilkan.
- COUNT (NIP) = untuk menghitung jumlah barisan data yang mempunyai isi data dari kolom Yang dipilih. NIP adalah nama kolom Yang dipilih untuk dihitung.
- AS = untuk mengubah nama dari suatu kolom untuk sementara.
- Jumlah-Pegawai = nama sementara dari kolom hasil COUNT (NIP).
- FROM Pegawai = untuk memilih dari tabel mana Yang data kolomnya ingin digunakan.Pesawai adalah nama tabel Yang dipilih untuk digunakan.
- GROUP BY = untuk mengelompokkan data berdasarkan nilai data Yang telah ditentukan Pada kolom Yan dipilih. Nocab-nama kolom Yang dipilih untuk dikelompokkan datanya.
- HAVING = untuk menentukan kondisi (Yang harus dipenuhi) oleh suatu kelompok data agar bisa ditampilkan.
- (COUNT (NIP) >= 3) = merupakan kondisi Yang harus dipenuhi oleh suatu kelompok data. Jadi hanya kelompok data Yang hasil hitungannya lebih atau Sama dengan 3.
- Hasilnya seperti sebelumnya, ada 9 barisan data dibadi sesuai Nocab nya masing- - masing. Namun Yang ingin ditampilkan adalah hasil hitungan yang lebih dari atau sama dengan 3. Yaitu Nocab C102 Yang ada 3. Yand lain clol ada 2, c103 ada 2, c104 ada 2.
   
### HASIL:
![](assett/jumlahpegawaihaving.png)

## SUM total_gaji
### sintaks
```sql
SELECT SUM(Gaji) AS Total_GAJI
    -> FROM pegawai;
```
### PENJELASAN
- SELECT = untuk memilih kolom mana saja yang dipilih untuk dijumlahkan.
- SUM (Gaji) untuk menghitung Jumlah data (khusus andka) Pada kolom Yang dipilih. Gaji merupakan nama kolom Yang dipilih untuk dihitung Jumlah isi datanya
- AS = untuk mengganti nama dari kolom hasil Sum (Gaji) untuk sementara.
- Total_Gaji = merupakan nama sementara dari perintah As.
- FROM Pegawai = untuk memilih dari tabel mana Yang kolom datanya akan digunakan. Pegawai adalah nama dari tabel Yang dipilih.
- Hasilnya = kolom gaji Yang isi datanya berupa angka-angka, semuanya dijumlahkan menjadi satu seperti ditotalkan (Sama seperti matematika Pada umumnya). hasilnya adalah 30 575 000. Adapun nama kolom dari hasil Jumlah tersebut diubah dari SUM(Gasi) menjadi Total-gaji.

### HASIL:
![](assett/total_gaji.png)

## SUM gaji manager
### sintaks
```sql
SELECT SUM(Gaji) AS Gaji_Manager
    -> FROM pegawai
    -> WHERE Jabatan = 'Manager';
```
### PENJELASAN
- SELECT = untuk memilih kolom mana saja yang dipilih untuk dijumlahkan.
- Sum (Gaji) = untuk menghitung Jumlah isi data (khusus angka) Pada kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih untuk dijumlahkan isi datanya.
- AS = untuk mengganti nama dari kolom hasil SUM (Gaji) secara sementara.
- Gaji_Manager = merupakan nama Sementara dari Perintah AS.
- FROM Pegawai = untuk memilih dari tabel mana Yang kolom datanya akan digunakan. Pegawai adalah nama dari table yang dipilih.
-  WHERE = kondisi Yang harus dipenuhi oleh suatu kolom agar datanya bisa dijumlah.
- (Jabatan = "manager") = merupakan kondisi dari WHERE. Hanya barisan data yang kolom Jabatannya bersi kolom Gajinya bisa diJumlahkan.
- Hasilnya = barison data Yang kolom Jabatannya berisi manajer akan dijumlah kolom Gajinya menjadi. 17250 000. Jadi hanya beberapa kolom. Saja yang dijumalah
### HASIL:
![](assett/gajinamenager.png)

## GROUP BY Nocab
### sintaks
```sql
SELECT NoCab, SUM(Gaji) AS Total_Gaji
    -> FROM pegawai
    -> GROUP BY NoCab;
```
### PENJELASAN 
- SELECT = untuk memilih Kolom mana saja yang dipilih untuk ditampilkan/dijumlahkan. Nocab = adalah nama kolom yang ingin ditampilkan.
- SUM (Gaji) = untuk menghitung Jumlah data (khusus angka) Pada kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih untuk dijumlahkan isi datanya.
- AS = untuk mengganti nama dari kolom hasil SUM(Gaji) untuk sementara.
- Totalgaji = merupakan nama sementara dari Perintah AS.
- FROM Pegawai =untuk memilih dari tabel mana Yang data kolomnya akan digunakan. Pegawai adalah nama tabel yang dipilih.
- GROUP BY = untuk mengelompokkan data berdasarkan nilai data yang telah ditentukan pada kolom yang dipilih.
- Nocab = nama kolom Yang datanya dipilih untuk dikelompokkan.
- Hasilnya = Jadi, berdasarkan kolom Nocab, barisan data yang kolom Nocab nya bensi clol maka kolom Gaji dari barisan data itu dijumlahkan bersama barisan data Yang memiliki Nocab clol dua. Maka kolom Gaji dijumlahkan sesuai dengan kolom Nocab nya masinmasing, mulai dari c101 memiliki 2 kolom Gaji Yang bisa dijumlahkan. Sama dengan c103 dan c104. Adapun cl02 memiliki 3 kolom Gaji yang dapat dijumlahkan. Total Gaji merupakan hasil Perintah dari AS untuk mengubah nama kolom hasil dari Sum(Gaji).
### HASIL:
![](assett/totalgaji.png)
## HAVING SUM
### sintaks
```sql
SELECT Nocab, SUM(gaji) AS Total_gaji
    -> FROM pegawai
    -> GROUP BY NoCab HAVING SUM(Gaji)>= 8000000;
```
### PENJELASAN
- SELECT = untuk memilih kolom mana saja yang dipilih untuk ditampilkan / dijumlahkan. Nocab nama kolom Yang dipilih untuk ditampilkan.
- SUM(Gaji) = untuk menghitung Jumlah data (khusus angka) Pada kolom Yang dipilih. Gaji, adalah nama kolom Yang dipilih untuk dijumlahkan isi datanya.
- AS = untuk menganti nama dari kolom hasil Sum (Gaji) untuk sementara.
- Total_Gaji = nama Sementara dari Perintah AS.
- FROM Pegawai = untuk memilih dari tabel mana Yang data kolomnya ingin digunakan. Pegawai adalah nama dari tabel yang dipilih.
- GROUP BY = untuk mengelompokkan data berdasarkan nilai data Yang telah ditentukan Pada kolom yang dipilih.
- Nocab = nama kolom Yang dipilih untuk datanya dikelompokkan. Having = kondisi Yang harus dipenuhi oleh suatu kelompok data agar bisa ditampilkan.
- (SUM (Gaji) >= 8000000) = Kondisi dari HAVING, Hasil dari Penjumlahan Gaji Yang hanya bisa ditampilkan adalah Hasil yang lebih dari atau sama dengan 8000000.
- Hasilnya = Sama seperti sebelumnya, tetapi No cab Yang memenuhi kondisi tersebut hanyala clo2 dan c103 karena hasil Jumlah kolom Gaji nya lebih dari atau sama dengan 8000000. Adapun hasil kolom SUMCGaji) diganti Jadi Total_Gaji.
### HASIL:
![](assett/totalgajihavingsum.png)

## AVG (gaji)
 ### sintaks
```sql
select AVG(gaji) AS Rata_rata -> FROM pegawai;
```
### PENJELASAN
- SELECT = untuk memilih kolom mana Sara Yang dipilih untuk ditampilkan.
- AVG (Gaji) = untuk menghitung rata-rata dari data yang ada pada kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih untuk dihitung rata-ratanya.
- AS = untuk menganti nama dari kolom hasil AVG (Gari) untuk sementara.
- Rata-rata = nama sementara dari Perintah AS.
- FROM Pegawai = untuk memilih dari tabel mana Yang data kolomnya ingin digunakan. Pegawai adalah nama dari tabel yang dipilih.
- Hasilnya = 3398111.111 merupakan hasil rata-rata dari semua 9 barisan data Pada kolom Gaji. Adapun nama kolom hasil dari AVG (Gaji) Yaitu Rata-rata.
### HASIL:
![](assett/seletavggaji.png)

## AVG MANAGER

### sintaks
```sql
SELECT AVG(gaji) AS GajiRataMgr
    -> FROM pegawai
    -> WHERE Jabatan = 'Manager';
```
### PENJELASAN
- SELECT untuk memilih kolom mana saja yang dipilih untuk ditampilkan.
- AVG (Gaji) = untuk menghitung rata-rata dari data yang ada pada kolom Yang dipilih Gaji adalah nama kolam Yang dipilih untuk dihitung rata-ratanya.
- AS = untuk mengganti nama dari kolom hasil AVG (Gaji) untuk sementara.
- Gaji Ratamgr = nama sementara dari Perintah AS.
- FROM Pegawai = untuk memilih dan tabel mana Yang data kolomnya ingin digunakan Pegawai adalah nama dari tabel Yang dipilih.
- WHERE = Kondisi Yang harus dipenuhi oleh suatu kolom agar datanya bisa dihitung rataratarya (Jabatan = 'Manajer') kondisi dari wHERE. Barisan data yang kolom Jabatannya Manajer akan dihitung rata-rata kolom Gajinya.
- Hasilnya = 5752666.6667 merupakan hasil hitung rata-rata dari barisan data yang memiliki manajer di kolom Jabatan nya, dari situ kolom Gaji nya di hitung.
### HASIL:
![](assett/avggajimaneger.png)


## AS

### sintaks
```sql
SELECT NoCab,AVG(Gaji) AS Ratagaji
    -> FROM pegawai
    -> GROUP BY NoCab;
```
### PENJELASAN
- SELECT = untuk memilih Kolom mana saja yang dipilih untuk ditampilkan, dihitung.
- Nocab = Kolom Yang dipilih untuk ditampilkan.
- AVG (Gaji) = untuk menghitung rata-rata dari data yang ada pada kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih untuk dihitung rata-ratanya.
- As = untuk menganti nama dari kolom hasil AVG(Gajii) untuk sementara.
- Rata Gaji = adalah nama sementara dari Perintah As.
- FROM Pegawai = untuk memilih dan tabel mana yang data kolomnya ingin digunakan. Pegawai adalah nama dari tabel yang dipilih.
- GROUP BY = untuk mengelompokkan data berdasarkan nilai data yang telah ditentukan.Pada kolom Yong dipilih.
- Nocab = nama kolom Yang dipilih untuk datanya dikelompokkan.
- Hasilnya = Hampir sama seperti no.7, masing-masing kolom Nocab dihitung rata-ratanya
### HASIL:
![](assett/avgratagaji.png)

## HAVING NoCab
### sintaks
```sql
SELECT Nocab, AVG(gaji) AS Ratagaji
    -> FROM pegawai
    -> GROUP BY NoCab HAVING NoCab ='C101' OR NoCAB = 'C102';
```
### PENJELASAN
- SELECT = untuk memilih kolom mana saja yang dipilih untuk ditampilkan, dihitung.
- Nocab = Kolom Yong dipilih untuk ditampilkan.
- AVG (Gaji) = untuk menghitung rata-rata dari data yang ada pada kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih untuk dihitung rata-ratanya.
- AS = untuk menganti nama dari kolom hasil AVG (Gaji) untuk sementara.
- rata Gaji = nama sementara dari Perintah As.
- FROM Pegawai untuk memilih dari tabel mana Yang datanya Kolomnya ingin dignakan Pegawai adalah nama dari tabel Yang dipilih.
- GROUP BY = untuk mengelompokkan data berdasarkan nilai data Yang telah ditentukan Pada kolom Yang dipilih.
- Nocab = nama Kolom Yand dipilih untuk datanya dikelompokkan.
- HAVING = kondisi Yang harus dipenuhi oleh suatu kelompok data.
- (Nocabc101' OR Nocab = 'c102') = merupakan kondisi dari Having. Jadi kolom Nocab Yang memiliki c101 atav C102 Yang hanya akan ditampilkan. OR adalah kondisi Yang hanya salah satu datanya yang harus dipenuhi.
### HASIL:
![](assett/nocbnocb.png)

## AS MIN
### sintaks
```sql
SELECT MAX(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil
    -> FROM pegawai;
```
### PENJELASAN
- SELECT = untuk memilih kolom mana saja yang dipilih untuk ditampilkan.
- MAX(gaji) = untuk menampilkan nilai maksimum atau terbesar / tertinggi dari suatu data dalam kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih.
- As Gajiterbesar = untuk mengganti nama dari kolom hasil Min(Gaji), menjadi nama Sementaranya Yaitu Gaji Terbesar.
- MIN (Gaji) = untuk menampilkan nilai minimum atau terkecil/terendah dari suatu data dalam kolom yg dipilih. Gaji adalah nama kolam Yang dipilih.
- As Gaji Terkecil = untuk mengganti nama dari kolom hasil MIN (Gaji) menjadi Gaji Terkecil untuk sementara.
- FROM Pegawai = untuk memilih dari tabel mana yang dat kolomnya ingin ditampilkan.
- Hasilnya = Jadi dari 9 nilai yang ada di kolam Gaji, Gaji maksimumnya adalah 6250000 dan namanya diubah menjadi Gajiterbesar. Gajii minimumnya adalah 1725000 dan namanya diubah menadi Gajiterkecil.
### HASIL:
![](assett/gajikecildanbesar.png)

##  AS MAX MANAGER
### sintaks
```sql
SELECT MAX(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil
    -> FROM pegawai
    -> WHERE Jabatan = 'Manager';
```
### PENJELASAN
- SELECT = untuk memilih kolom mana saja yang dipilih untuk ditampilkan.
- MAX (Gaji) = untuk menampilkan nilai terbesar dari suatu data dalam kolom Yang dipilih Gajii adalah nama kolom yang dipilih.
- AS GajiTerbesar = untuk mengganti nama dari kolom hasil max (Gaji) menjadi Gajiterbesar untuk sementara.
- MIN (Gaji) = untuk menampilkan nilai terkecil dari Suatu data dalam kolam Gaji adalah nama kolom Yang dipilih.
- AS Gajiterkecil = untuk menganti nama dari kolom hasil MIN (Gaji) menjadi Gaji terkecil untuk sementara.
- FROM Pegawai = untuk memilih dari tabel mana Yand data kolomnya ingin ditampilkan.
- WHERE kondisi = Yang harus dipenuhi oleh suatu kolom data agar bisa ditampilkan.
- (jabatan Manajer) = kondisi dari WHERE Yang harus dipenuhi. Barisan data yang kolom Jabatannya berisi manajer akan ditampilkan kolom Gajinya.
- Hasilnya Jabatan Manajer Yang memiliki nilai maksimum adalah 6250000 Kolom hasil MAX nya diubah Jadi Gaji terbesar. sedangkan nilai minimumnya adalah $250000 Kolam hasil MIN nya diubah Tadi Gaji Terkecil.
### HASIL:
![](assett/gajikecildanbesarmanager.png)

##  AS MIN NoCab
### sintaks
```sql
 SELECT NoCAB, MAX(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil
    -> FROM pegawai
    -> GROUP BY NoCab;
```
### PENJELASAN
- SELECT = untuk memilih kolom mana saja yang dipilih untuk ditampilkan.
- Nocab= nama kolom Youd ingin ditampilkan.
- MAX (Gaji) = untuk menampilkan nilai terbesar dari suatu data dalam kolom Yong dish Gari nama kolom Yang dipilih.
- AS GajiTerbesar = untuk mengganti nama kolom hasil MAX (Gaji) menjadi Gaji terbesar untuk sementara.
- MIN (Gaji) = untuk menampilkan nilai terkecil dari suatu data dalam kolom Yang dipilih Gaji nama kolom Yang dipilih.
- As Gajiterkecil = untuk mengganti nama kolom hasil MIN (Gaji) menjadi Gaji Terkecil untuk sementara.
- FROM Pegawai = untuk memilih dari tabel mana Yang data kolomnya ingin ditampilkan. Pegawai adalah nama tabel Yang dipilih untuk ditampilkan.
- GROUP BY = untuk mengelompokkan data berdasarkan nilai data yang telah ditentukan Pada kolom Yan dipilih.
- Nocab = nama Kolom yang ingin dikelompokkan.
- Hasilnya = masing-masing Nocab dicari nilai maksimum dan minimumnya. mulai dari clol, c102, c103, c104. dan nama hasil kolannya diubah Jadi Gajiterbesar dan GajiTerkecil.
### HASIL:
![](assett/gajigajigaji.png)
## HAVING COUNT
### sintaks
```sql
 SELECT NoCAB, MAX(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil
    -> FROM pegawai
    -> GROUP BY NoCab;
```
### PENJELASAN
- SELECT untuk memilih kolom mana sara Yang dipilih untuk ditampilkan.
- Nocab = nama kolom Yang ingin ditampilkan.
- MAX (Gaji) = untuk menampilkan nilai terbesar dan suatu data dalam kolom Yang dipilih Gat adalah nama kolom Yang dipilih.
- AS Gaiterbesar = untur menssanti nama kolom hasil MAX (Gaji) menjadi GariTerbesar Untuk Sementara.
- MIN (Gaji) = untuk menampilkan nilai terkecil dari suatu data dalam kolom yg dipilih. Gaji adalah nama Kolam Yang dipilih.
- AS Gaji = Terkecil untuk mengganti nama kolom hasil MIN (Gaji) menjadi Gajiterkecil untuk sementara.
- FROM Pegawai = adalah untuk memilih dari tabel mana Yang data kolomnya ingin ditampilkan,Pegawai adalah nama tabel Yang dipilih.
- GROUP BY = untuk mengelompokkan data Pada kolom Yang dipilih.
- Nocab = nama kolom Yand dipilih untuk dikelompokkan. Having = Kondisi Yang harus dipenuhi oleh suatu kelompok data.
- (COUNT(NIP) >= 3)= kondisi dri HAVING. Hanya hasil hitung kolom NIP Yang lebih dari atau sama dengan 3 Yang muncul.
- Hasilnya seperti no. 4, Yang mempunyai hasil hitung lebih dari atau Sama dengan 3 Nocab C102 Jadi hanya itu Yandg dicari Nilai maksimum dan adalah minimumnya Pada kolom Gaji.
### HASIL:
![](assett/gajigajigaji3.png)



## AS

### sintaks
```sql
 SELECT COUNT(NIP) AS Jumlahpegawai, SUM(Gaji) AS Totalgaji,
    -> AVG(Gaji) AS RataGaji, MAX(Gaji) AS GajiMaks, Min(gaji) AS Gajmin
    -> FROM pegawai;
```
### PENJELASAN
- SELECT = untuk memilih kolam mana saja yang dipilih untuk ditampilkan.
- COUNT (NIP) = untuk menghitung jumlah barisan data yang ada pada kolam Yang dipilih.
- AS Jumlah Pesawai = untuk menssanti nama kolam hasil COUNT (NIP) menjadi Jumlah Pegawai.
- SUM (Gaji) = untuk menjumlah data Yang ada pada kolom Yang dipilih. Gaji adalah kojom Yand dipilih. AS Total Gaji untuk mengganti nama kolom hasil SUM (Gaji) menjadi Total Gaji.
- AVG (Gaji) = untuk menghitung rata-ratanya suatu data dalam kolom yang dipilih. Gaji adalah nama kolom Yang dipilih untuk dihitung.
- AS RataGaji = untuk mengganti nama kolom hasil AVG (Gari) menjadi RataGaji.
- MAX (Gaji) = untuk menampilkan nilai terbesar dari suatu data dalam kolam Yang dipilih Gaji adalah nama kolom yang dipilih.
- AS Gajimaks = untuk mengganti nama dari kolom hasil MAX(Gari) menjadi Garimaks. untuk Sementara. MIN (Gaji) untuk menampilkan nilai terkecil dari suatu kalam Yang dipilih. Gaji nama kolom Yang dipilih.
- AS GajiMIN = untuk menganti nama dari kolom hasil MIN (Gaji) menjadi Gajimin. Untuk sementara.
- FROM Pegawai = untuk memilih tabel mana yang dipilih untuk ditampilkan. Pegawai adalah nama tabel Yang dipilih.
- Hasilnya = Dihitung berapa NIP, Di Jumlahkan semua data Pada kolom Gaji, Dihitung Rata-tata datri kolom Gaji, Ditampilkan nilai terbesar Pada kolom Gaji, dan Nilai terkecil dalam Kolom Gaji.
### HASIL:
![](assett/nibgajitotalgaji.png)

## WHERE Jabatan staf or sales

### sintaks
```sql
AS Jumlahpegawai, SUM(Gaji) AS Totalgaji,
    -> AVG(Gaji) AS RataGaji, MAX(Gaji) AS GajiMaks, Min(gaji) AS Gajmin
    -> FROM pegawai
    -> WHERE Jabatan = 'Staf' OR Jabatan ='Sales'
    -> GROUP BY NoCab HAVING SUM(Gaji) <= 2600000 ;
```
### PENJELASAN
- SELECT = untuk memilih kolam mana saja yang ingin digunakan.
- COUNT (NIP) = untuk menghitung barisan data yang ada Pada kolom Yang dipilih. AS Jumlah
- pegawai = untuk mengganti nama dari kolom hasil COUNT (NIP) menjadi Jumlah Pegawai untuk sementara.
- SUM (Gaji) = untuk menjumlah data Yang ada Pada kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih.
- As Total Gaji = untuk mengganti nama dari kolom hasil SUM(Gaji) menjadi Total Gaji Untuk Sementara. AVG (Gaji) untuk menghitung rata-rata dari kolom Yand dipilih. Gaji adalah nama kolom Yang dipilih.
- As Rata Gaji = untuk mengganti nama dari kolom hasil AVG (Gaji) menjadi Rata Gaji Untuk sementara. MAX (Gaji) untuk menampilkan nilai 2 terbesar dan suatu data dalam kolom Yang dipilih Gaji adalah nama kolom. Yang dipilih.
### HASIL:
![](assett/nipgajitotalgaji260.png)

# TABEL KESELURUHAN PADA PRAKTIK

![](assett/tbelwan.jpg)
