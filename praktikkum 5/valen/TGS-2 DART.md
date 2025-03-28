---
"": " "
---
# DESC
*Penjelasan* : Dalam MySQL, DESC adalah singkatan dari "DESCRIBE". Perintah DESCRIBE digunakan untuk menampilkan struktur dari tabel yang ada dalam database. Dengan menggunakan DESCRIBE, Anda bisa mendapatkan informasi mengenai kolom-kolom dalam tabel, termasuk nama kolom, tipe data, apakah kolom tersebut dapat bernilai NULL atau tidak, dan atribut lainnya seperti kunci primer (primary key) atau default value.

**Contoh :
```sql
desc pegawai;
```


***Hasilnya :**
![](asset/Capture100.png)

*Kesimpulan :*

Secara keseluruhan, tabel pegawai dirancang dengan kolom id sebagai identifikasi unik yang bertambah otomatis, sementara kolom nama adalah wajib diisi, dan kolom jabatan serta tanggal_lahir bersifat opsional. Ini mencerminkan struktur dasar dari tabel yang mungkin digunakan untuk menyimpan data pegawai dengan informasi kunci seperti nama, jabatan, dan tanggal lahir.

# SELECT
*Penjelasan :* Perintah SELECT dalam MySQL digunakan untuk mengambil data dari tabel dalam database. Ini adalah perintah dasar dan paling sering digunakan dalam SQL untuk menampilkan data. Anda bisa menggunakan SELECT untuk memilih kolom tertentu, menggabungkan tabel, melakukan filter data, dan banyak lagi.

*Contoh :*
```sql
select * from pegawai;
```


***Hasil :***
![](asset/Capture200.png)

*Kesimpulan :*
Perintah SELECT * FROM pegawai; berguna untuk melihat seluruh data dalam tabel pegawai tanpa batasan atau filter. Ini adalah cara cepat untuk mendapatkan gambaran lengkap tentang data yang ada di tabel, tetapi untuk analisis yang lebih spesifik atau untuk meningkatkan performa query, sebaiknya Anda memilih kolom tertentu dan menerapkan kondisi yang sesuai.

# COUNT
*penjelasan:* Perintah COUNT dalam MySQL digunakan untuk menghitung jumlah baris dalam suatu tabel yang memenuhi kriteria tertentu. Ini adalah fungsi agregat yang sangat umum digunakan dalam query SQL untuk memperoleh informasi statistik tentang data dalam tabel.

*Contoh:* 
```sql
SELECT COUNT(NIP) AS jumlahpegawai, COUNT(Jabatan) AS jumlahJabatan FROM pegawai;
```

***Hasil:***
![](asset/Capture1.png)

*Analisis:*
- `SELECT `= untuk memilih kolom apa saja yang ingin dipilih (untuk dihitung). 
- `COUNT (NIP)` = untuk menghitung Jumlah barisan data yang mempunyai dari kolom Yan dipilih. NIP adalah nama kolom Yang dipilih untuk dihitung. 
- `AS `= untuk mengubah nama dari suatu kolom untuk sementara. Jumlah Pegawai = merupakan nama ubahan dari Perintah AS yang digunakan. merupakan nama sementara dari Perintah COUNT (NIP). 
- `COUNT (Jabatan) `untuk menghitung jumlah barisan data yang mempunyai isi data dan kolom yang dipilih. Jabatan adalah nama kolom Yang dipilih untuk dihitung 
- `AS `= untuk mengubah nama dari suatu kolom untuk sementara. Jumlah Jabatan = merupakan nama sementara dari perintah COUNT (Jabatan). 
- `FROM Pegawai` = merupakan dari tabel mana datanya yang digunakan Pegawai adalah nama tabel Yang datanya ingin digunakan.
- **Hasilnya** = karena ada 9 barisan data, Yang ingin dihitung adalah kolom NIP, Jumlah dari kolom NIP (isi datanya) ada 9, ditampilkan sebagai Jumlah pesawai. Kolom Jabatan Jusa dihitung, akan tetapi ada satu data yang berisi Null (kosong), oleh karena itu hanya ada 8 data ditampilkan sebagai Jumlah Jabatan.

## 2.
*penjelasan:* Queri SQL yang Anda berikan akan menghitung jumlah karyawan ( NIP) dalam pegawai`tabel yang termasuk dalam cabang atau departemen tertentu yang diidentifikasi oleh `NoCab = 'C102'.
*contoh:* 
```sql
SELECT COUNT(NIP) AS jumlahpegawai
-> FROM pegawai
-> WHERE NoCab = 'C102';
```
***hasil:***
![](asset/Capture2.png)
*analisis:*
- SELECT= untuk memilih kolom mana saja yang di ingin dipilih untuk dihitung.
- COUNT(NIP)= untuk menghitung jumlah basis data yang mempunyai data dari kolom yang dipilih, NIP adalah nama kolom yang dipilih untuk dihitung.
- AS= untuk mengubah nama dari suatu kolom untuk sementara.
- jumlahpegawai= nama sementara yang dipilih untuk colom COUNT(NIP).
- FROM pegawai= dari tabel mana datanya akan digunakan, pegawai adalah nama tabel yang dipilih untuk digunakan.
- WHERE= merupakan kondisi yang harus dipenuhi agar datanya dapat dihitung dengan query COUNT(NIP).
- (NoCab = C102;) = adalah kondisi dari WHERE yang harus dipenuhi, jadi hanya barisan data yang memiliki C102 dikolom NoCab yang bisa dihitung.
*Hasilnya:* di 9 barisan data yang ada pada tabel pegawai, kita ingin menghitung jumlah barisan data yang memiliki nilai C102 pada kolom NoCab nya dengan menggunakan COUNT. jadi yang muncul adalah 2 barisan data. kita juga ingin mengubah nama dari kolom hasil perintah COUNT secara sementara dengan perintah AS, namanya adalah jumlahpegawai.

## 3.
*penjelasan:* SELECT NoCab, COUNT(NIP) AS jumlah_pegawai:
*contoh:*
```sql
SELECT NoCab,COUNT(NIP) AS jumlah_pegawai
    -> FROM pegawai
    -> GROUP BY NoCab;
```
***hasil:***
![](asset/Capture3.png)
*analisis:*
- SELECT= untuk memilih kolom mana saja yang ingin dihitung atau ditampilkan.
- NoCab= merupakan nama kolom yang ingin ditampilkan.
- COUNT(NIP)= untuk menghitung jumlah barisan data yang mempunyai isi data dari kolom yang dipilih, NIP adalah nama kolom yang dipilih unutk dihitung
- AS= untuk mengubah nama dari suatu kolom untuk sementara.
- jumlah_pagawai= merupakan nama sementara dari kolom hasil COUNT(NIP).
- FROM pegawai= dari tabel mana yang data kolomnya ingin digunakan.
- GROUP BY= untuk mengelompokkan data berdasarkan nilai data yang telah ditentukan pada kolom yang dipilih.
- NoCab= nama kolom yang dipilih untuk datanya dikelompokkan.
*hasilnya:* berdasarkan 9 barisan data, masing-masing nilai dalam kolom NoCab dikelompokkan berdasarkan nilainya sendiri. jadi NoCab C101 bersama NoCab yang nilainya sama yaitu C101. jadi NoCab yang memiliki C101 ada 2, C102 ada 3, C103 ada 2, C104 ada 2. total semuanya 9, sesuai dengan jumlah data yang ada. adapun nama dari kolom hasil yaitu jumlah_pegawai dari perintah AS. 

## 4.
**GAMBAR :** 
![](asset/Capture15.png)
STRIKTUR :
```sql
SELECT NoCab, COUNT(NIP) AS Jumlah_pegawai
    -> FROM pegawai
    -> GROUP BY NoCab HAVING COUNT(NIP) >= 3;
```
PENJELASAN : 
- `SELECT `= untuk memilih kolom mana sasa Yang ingin dihitung atau ditampilkan. 
- `Nocab` = merupakan nama kolom yang ingin ditampilkan. 
- `COUNT (NIP)` = untuk menghitung jumlah barisan data yang mempunyai isi data dari kolom Yang dipilih. NIP adalah nama kolom Yang dipilih untuk dihitung. 
- ` AS `= untuk mengubah nama dari suatu kolom untuk sementara. 
- `Jumlah-Pegawai` = nama sementara dari kolom hasil COUNT (NIP). 
- FROM Pegawai = untuk memilih dari tabel mana Yang data kolomnya ingin digunakan.Pesawai adalah nama tabel Yang dipilih untuk digunakan. 
- `GROUP BY` = untuk mengelompokkan data berdasarkan nilai data Yang telah ditentukan Pada kolom Yan dipilih. Nocab-nama kolom Yang dipilih untuk dikelompokkan datanya. 
- `HAVING` = untuk menentukan kondisi (Yang harus dipenuhi) oleh suatu kelompok data agar bisa ditampilkan. 
- `(COUNT (NIP) >= 3)` = merupakan kondisi Yang harus dipenuhi oleh suatu kelompok data. Jadi hanya kelompok data Yang hasil hitungannya lebih atau Sama dengan 3. 
- **Hasilnya** seperti sebelumnya, ada 9 barisan data dibadi sesuai Nocab nya masing- - masing. Namun Yang ingin ditampilkan adalah hasil hitungan yang lebih dari atau sama dengan 3. Yaitu Nocab C102 Yang ada 3. Yand lain clol ada 2, c103 ada 2, c104 ada 2.

## 5.
**GAMBAR :** 
![](asset/Capture4.png)

STRIKTUR :
```sql
SELECT SUM(Gaji) AS Total_Gaji
    -> FROM pegawai;
```
PENJELASAN : 
- SELECT = untuk memilih kolom mana saja yang dipilih untuk dijumlahkan. 
- SUM (Gaji) untuk menghitung Jumlah data (khusus andka) Pada kolom Yang dipilih. Gaji merupakan nama kolom Yang dipilih untuk dihitung Jumlah isi datanya 
- AS = untuk mengganti nama dari kolom hasil Sum (Gaji) untuk sementara. 
- Total_Gaji = merupakan nama sementara dari perintah As. 
- FROM Pegawai = untuk memilih dari tabel mana Yang kolom datanya akan digunakan. Pegawai adalah nama dari tabel Yang dipilih. 
- Hasilnya = kolom gaji Yang isi datanya berupa angka-angka, semuanya dijumlahkan menjadi satu seperti ditotalkan (Sama seperti matematika Pada umumnya). hasilnya adalah 30 575 000. Adapun nama kolom dari hasil Jumlah tersebut diubah dari SUM(Gasi) menjadi Total-gaji.

## 6.
**GAMBAR :** 
![](asset/Capture5.png)

STRIKTUR :
```sql
SELECT SUM(Gaji) AS Gaji_Manager
    -> FROM pegawai
    -> WHERE Jabatan = "Manajer";
  ```
**PENJELASAN :** 
SELECT = untuk memilih kolom mana saja yang dipilih untuk dijumlahkan. 
Sum (Gaji) = untuk menghitung Jumlah isi data (khusus angka) Pada kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih untuk dijumlahkan isi datanya. 
AS = untuk mengganti nama dari kolom hasil SUM (Gaji) secara sementara. 
Gaji_Manager = merupakan nama Sementara dari Perintah AS. 
FROM Pegawai = untuk memilih dari tabel mana Yang kolom datanya akan digunakan. Pegawai adalah nama dari table yang dipilih. 
WHERE = kondisi Yang harus dipenuhi oleh suatu kolom agar datanya bisa dijumlah. 
(Jabatan = "manager") = merupakan kondisi dari WHERE. Hanya barisan data yang kolom Jabatannya bersi kolom Gajinya bisa diJumlahkan. 
Hasilnya = barison data Yang kolom Jabatannya berisi manajer akan dijumlah kolom Gajinya menjadi. 17250 000. Jadi hanya beberapa kolom. Saja yang dijumalah

## 7.
**GAMBAR :** 
![](asset/Capture6.png)

STRIKTUR :
```sql
SELECT NoCab, SUM(Gaji) AS TotalGaji
    -> FROM pegawai
    -> GROUP BY NoCab;
  ```
PENJELASAN : 
- SELECT = untuk memilih Kolom mana saja yang dipilih untuk ditampilkan/dijumlahkan. Nocab = adalah nama kolom yang ingin ditampilkan. 
- SUM (Gaji) = untuk menghitung Jumlah data (khusus angka) Pada kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih untuk dijumlahkan isi datanya. 
- AS = untuk mengganti nama dari kolom hasil SUM(Gaji) untuk sementara. 
- Totalgaji = merupakan nama sementara dari Perintah AS. 
- FROM Pegawai =untuk memilih dari tabel mana Yang data kolomnya akan digunakan. Pegawai adalah nama tabel yang dipilih. 
- GROUP BY = untuk mengelompokkan data berdasarkan nilai data yang telah ditentukan pada kolom yang dipilih. 
- Nocab = nama kolom Yang datanya dipilih untuk dikelompokkan. 
- Hasilnya = Jadi, berdasarkan kolom Nocab, barisan data yang kolom Nocab nya bensi clol maka kolom Gaji dari barisan data itu dijumlahkan bersama barisan data Yang memiliki Nocab clol dua. Maka kolom Gaji dijumlahkan sesuai dengan kolom Nocab nya masinmasing, mulai dari c101 memiliki 2 kolom Gaji Yang bisa dijumlahkan. Sama dengan c103 dan c104. Adapun cl02 memiliki 3 kolom Gaji yang dapat dijumlahkan. Total Gaji merupakan hasil Perintah dari AS untuk mengubah nama kolom hasil dari Sum(Gaji).


## 8.
**GAMBAR :** 
![](asset/Capture7.png)

**STRIKTUR :**
```sql
SELECT NoCab, SUM(Gaji) AS Total_Gaji
    -> FROM pegawai
    -> GROUP BY NoCab HAVING SUM(Gaji) >= 8000000;
```
**PENJELASAN :** 
- SELECT = untuk memilih kolom mana saja yang dipilih untuk ditampilkan / dijumlahkan. Nocab nama kolom Yang dipilih untuk ditampilkan. 
- SUM(Gaji) = untuk menghitung Jumlah data (khusus angka) Pada kolom Yang dipilih. Gaji, adalah nama kolom Yang dipilih untuk dijumlahkan isi datanya.
- AS = untuk menganti nama dari kolom hasil Sum (Gaji) untuk sementara. 
- Total_Gaji = nama Sementara dari Perintah AS. 
- FROM Pegawai = untuk memilih dari tabel mana Yang data kolomnya ingin digunakan. Pegawai adalah nama dari tabel yang dipilih. 
- GROUP BY = untuk mengelompokkan data berdasarkan nilai data Yang telah ditentukan Pada kolom yang dipilih. 
- Nocab = nama kolom Yang dipilih untuk datanya dikelompokkan. Having = kondisi Yang harus dipenuhi oleh suatu kelompok data agar bisa ditampilkan. 
- (SUM (Gaji) >= 8000000) = Kondisi dari HAVING, Hasil dari Penjumlahan Gaji Yang hanya bisa ditampilkan adalah Hasil yang lebih dari atau sama dengan 8000000. 
- Hasilnya = Sama seperti sebelumnya, tetapi No cab Yang memenuhi kondisi tersebut hanyala clo2 dan c103 karena hasil Jumlah kolom Gaji nya lebih dari atau sama dengan 8000000. Adapun hasil kolom SUMCGaji) diganti Jadi Total_Gaji.

## 9.
**GAMBAR :** 
![](asset/Capture8.png)

**STRIKTUR :**
```sql
SELECT AVG(Gaji) AS Rata_rata
    -> FROM pegawai;
```
**PENJELASAN :** 
- SELECT = untuk memilih kolom mana Sara Yang dipilih untuk ditampilkan. 
- AVG (Gaji) = untuk menghitung rata-rata dari data yang ada pada kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih untuk dihitung rata-ratanya. 
- AS = untuk menganti nama dari kolom hasil AVG (Gari) untuk sementara. 
- Rata-rata = nama sementara dari Perintah AS. 
- FROM Pegawai = untuk memilih dari tabel mana Yang data kolomnya ingin digunakan. Pegawai adalah nama dari tabel yang dipilih. 
- Hasilnya = 3397222.2222 merupakan hasil rata-rata dari semua 9 barisan data Pada kolom Gaji. Adapun nama kolom hasil dari AVG (Gaji) Yaitu Rata-rata.
## 10.
**GAMBAR :** 
![](asset/Capture9.png)

**STRIKTUR :**
```sql
SELECT AVG(Gaji) AS GajiRataMgr
    FROM pegawai
    WHERE Jabatan = 'Manajer';
```
**PENJELASAN :** 
- SELECT untuk memilih kolom mana saja yang dipilih untuk ditampilkan.
- AVG (Gaji) = untuk menghitung rata-rata dari data yang ada pada kolom Yang dipilih Gaji adalah nama kolam Yang dipilih untuk dihitung rata-ratanya. 
- AS = untuk mengganti nama dari kolom hasil AVG (Gaji) untuk sementara. 
- Gaji Ratamgr = nama sementara dari Perintah AS. 
- FROM Pegawai = untuk memilih dan tabel mana Yang data kolomnya ingin digunakan Pegawai adalah nama dari tabel Yang dipilih.
- WHERE = Kondisi Yang harus dipenuhi oleh suatu kolom agar datanya bisa dihitung rataratarya (Jabatan = 'Manajer') kondisi dari wHERE. Barisan data yang kolom Jabatannya Manajer akan dihitung rata-rata kolom Gajinya. 
- Hasilnya = 5750000.0000 merupakan hasil hitung rata-rata dari barisan data yang memiliki manajer di kolom Jabatan nya, dari situ kolom Gaji nya di hitung.
## 11.
**GAMBAR :** 
![](asset/Capture10.png)

**STRIKTUR :**
```sql
SELECT NoCab, AVG(Gaji) AS RataGaji
    FROM pegawai
    GROUP BY NoCab;
```
PENJELASAN : 
- SELECT = untuk memilih Kolom mana saja yang dipilih untuk ditampilkan, dihitung.
- Nocab = Kolom Yang dipilih untuk ditampilkan. 
- AVG (Gaji) = untuk menghitung rata-rata dari data yang ada pada kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih untuk dihitung rata-ratanya. 
- As = untuk menganti nama dari kolom hasil AVG(Gajii) untuk sementara. 
- Rata Gaji = adalah nama sementara dari Perintah As. 
- FROM Pegawai = untuk memilih dan tabel mana yang data kolomnya ingin digunakan. Pegawai adalah nama dari tabel yang dipilih. 
- GROUP BY = untuk mengelompokkan data berdasarkan nilai data yang telah ditentukan.Pada kolom Yong dipilih.
- Nocab = nama kolom Yang dipilih untuk datanya dikelompokkan. 
- Hasilnya = Hampir sama seperti no.7, masing-masing kolom Nocab dihitung rata-ratanya
## 12.
**GAMBAR :** 
![](asset/Capture11.png)

STRIKTUR :
```sql
SELECT NoCab, AVG(Gaji) AS RataGaji
    FROM pegawai
    GROUP BY NoCab HAVING NoCab = 'C101' OR NoCab = 'C102';
```
PENJELASAN : 
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
## 13.
**GAMBAR :** 
![](asset/Capture12.png)

STRIKTUR :
```sql
SELECT MAX(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil
    FROM pegawai;
```


PENJELASAN : 
- `SELECT` = untuk memilih kolom mana saja yang dipilih untuk ditampilkan. 
- `MAX(gaji)` = untuk menampilkan nilai maksimum atau terbesar / tertinggi dari suatu data dalam kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih.
- `As Gajiterbesar` = untuk mengganti nama dari kolom hasil Min(Gaji), menjadi nama Sementaranya Yaitu Gaji Terbesar. 
- `MIN (Gaji)` = untuk menampilkan nilai minimum atau terkecil/terendah dari suatu data dalam kolom yg dipilih. Gaji adalah nama kolam Yang dipilih. 
- `As Gaji Terkecil` = untuk mengganti nama dari kolom hasil MIN (Gaji) menjadi Gaji Terkecil untuk sementara. 
- `FROM Pegawai` = untuk memilih dari tabel mana yang dat kolomnya ingin ditampilkan.
- **Hasilnya** = Jadi dari 9 nilai yang ada di kolam Gaji, Gaji maksimumnya adalah 6250000 dan namanya diubah menjadi Gajiterbesar. Gajii minimumnya adalah 1725000 dan namanya diubah menadi Gajiterkecil.
## 14.
**GAMBAR :** 
![](asset/Capture13.png)

STRIKTUR :
```sql
SELECT Max(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil
    FROM pegawai
    WHERE jabatan = 'manajer';
```



PENJELASAN : 
- ` SELECT` = untuk memilih kolom mana saja yang dipilih untuk ditampilkan. 
- `MAX (Gaji)` = untuk menampilkan nilai terbesar dari suatu data dalam kolom Yang dipilih Gajii adalah nama kolom yang dipilih. 
- `AS GajiTerbesar` = untuk mengganti nama dari kolom hasil max (Gaji) menjadi Gajiterbesar untuk sementara. 
- `MIN (Gaji)` = untuk menampilkan nilai terkecil dari Suatu data dalam kolam Gaji adalah nama kolom Yang dipilih. 
- `AS Gajiterkecil` = untuk menganti nama dari kolom hasil MIN (Gaji) menjadi Gaji terkecil untuk sementara. 
- `FROM Pegawai` = untuk memilih dari tabel mana Yand data kolomnya ingin ditampilkan.
- `WHERE kondisi` = Yang harus dipenuhi oleh suatu kolom data agar bisa ditampilkan. 
- `(jabatan Manajer)` = kondisi dari WHERE Yang harus dipenuhi. Barisan data yang kolom Jabatannya berisi manajer akan ditampilkan kolom Gajinya. 
- **Hasilnya** Jabatan Manajer Yang memiliki nilai maksimum adalah 6250000 Kolom hasil MAX nya diubah Jadi Gaji terbesar. sedangkan nilai minimumnya adalah $250000 Kolam hasil MIN nya diubah Tadi Gaji Terkecil.

## 15.
***hasil:***
![](asset/Capture14.png)

*contoh:*
```sql
SELECT NoCab, MAX(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil
    -> FROM pegawai
    -> GROUP BY NoCab;
```



*penjelasan:*
- `SELECT` = untuk memilih kolom mana saja yang dipilih untuk ditampilkan.
- `Nocab`= nama kolom Youd ingin ditampilkan.
- `MAX (Gaji)` = untuk menampilkan nilai terbesar dari suatu data dalam kolom Yong dish Gari nama kolom Yang dipilih. 
- `AS GajiTerbesar` = untuk mengganti nama kolom hasil MAX (Gaji) menjadi Gaji terbesar untuk sementara. 
- `MIN (Gaji)` = untuk menampilkan nilai terkecil dari suatu data dalam kolom Yang dipilih Gaji nama kolom Yang dipilih. 
- `As Gajiterkecil `= untuk mengganti nama kolom hasil MIN (Gaji) menjadi Gaji Terkecil untuk sementara. 
- `FROM Pegawai` = untuk memilih dari tabel mana Yang data kolomnya ingin ditampilkan. Pegawai adalah nama tabel Yang dipilih untuk ditampilkan. 
- `GROUP BY` = untuk mengelompokkan data berdasarkan nilai data yang telah ditentukan Pada kolom Yan dipilih. 
- `Nocab` = nama Kolom yang ingin dikelompokkan. 
- **Hasilnya** = masing-masing Nocab dicari nilai maksimum dan minimumnya. mulai dari clol, c102, c103, c104. dan nama hasil kolannya diubah Jadi Gajiterbesar dan GajiTerkecil.


## 16.
**GAMBAR :** 
![](asset/Capture151.png)

STRIKTUR :
```sql
SELECT NoCab, Max(Gaji) AS GajiTerbesar, MIN(Gaji) AS GajiTerkecil
    FROM pegawai
    GROUP BY NoCab HAVING COUNT(NIP) >= 3;
```


PENJELASAN : 
- `SELECT` untuk memilih kolom mana sara Yang dipilih untuk ditampilkan. 
- `Nocab` = nama kolom Yang ingin ditampilkan. 
- `MAX (Gaji)` = untuk menampilkan nilai terbesar dan suatu data dalam kolom Yang dipilih Gat adalah nama kolom Yang dipilih. 
- `AS Gaiterbesar` = untur menssanti nama kolom hasil MAX (Gaji) menjadi GariTerbesar Untuk Sementara.
- `MIN (Gaji)` = untuk menampilkan nilai terkecil dari suatu data dalam kolom yg dipilih. Gaji adalah nama Kolam Yang dipilih. 
- `AS Gaji` = Terkecil untuk mengganti nama kolom hasil MIN (Gaji) menjadi Gajiterkecil untuk sementara. 
- `FROM Pegawai` = adalah untuk memilih dari tabel mana Yang data kolomnya ingin ditampilkan,Pegawai adalah nama tabel Yang dipilih. 
- `GROUP BY` = untuk mengelompokkan data Pada kolom Yang dipilih. 
- `Nocab` = nama kolom Yand dipilih untuk dikelompokkan. Having = Kondisi Yang harus dipenuhi oleh suatu kelompok data. 
- `(COUNT(NIP) >= 3)`= kondisi dri HAVING. Hanya hasil hitung kolom NIP Yang lebih dari atau sama dengan 3 Yang muncul.
- **Hasilnya** seperti no. 4, Yang mempunyai hasil hitung lebih dari atau Sama dengan 3 Nocab C102 Jadi hanya itu Yandg dicari Nilai maksimum dan adalah minimumnya Pada kolom Gaji.
## 17.
**GAMBAR :** 
![](asset/Capture16.png)

STRIKTUR :
```sql
SELECT COUNT(NIP) AS JumlahPegawai, SUM(Gaji) AS TotalGaji,
    AVG(Gaji) AS RataGaji, M
```



PENJELASAN : 
- `SELECT` = untuk memilih kolam mana saja yang dipilih untuk ditampilkan. 
- `COUNT (NIP)` = untuk menghitung jumlah barisan data yang ada pada kolam Yang dipilih.
- `AS Jumlah Pesawai `= untuk menssanti nama kolam hasil COUNT (NIP) menjadi Jumlah Pegawai.
- `SUM (Gaji)` = untuk menjumlah data Yang ada pada kolom Yang dipilih. Gaji adalah kojom Yand dipilih. AS Total Gaji untuk mengganti nama kolom hasil SUM (Gaji) menjadi Total Gaji. 
- `AVG (Gaji)` = untuk menghitung rata-ratanya suatu data dalam kolom yang dipilih. Gaji adalah nama kolom Yang dipilih untuk dihitung.
- `AS RataGaji` = untuk mengganti nama kolom hasil AVG (Gari) menjadi RataGaji. 
- `MAX (Gaji)` = untuk menampilkan nilai terbesar dari suatu data dalam kolam Yang dipilih Gaji adalah nama kolom yang dipilih.
- `AS Gajimaks` = untuk mengganti nama dari kolom hasil MAX(Gari) menjadi Garimaks. untuk Sementara. MIN (Gaji) untuk menampilkan nilai terkecil dari suatu kalam Yang dipilih. Gaji nama kolom Yang dipilih. 
- `AS GajiMIN` = untuk menganti nama dari kolom hasil MIN (Gaji) menjadi Gajimin. Untuk sementara.
- `FROM Pegawai` = untuk memilih tabel mana yang dipilih untuk ditampilkan. Pegawai adalah nama tabel Yang dipilih. 
- **Hasilnya** = Dihitung berapa NIP, Di Jumlahkan semua data Pada kolom Gaji, Dihitung Rata-tata datri kolom Gaji, Ditampilkan nilai terbesar Pada kolom Gaji, dan Nilai terkecil dalam Kolom Gaji.
## 18.
**GAMBAR :** 
![](asset/Capture17.png)

STRIKTUR :
```sql
SELECT COUNT(NIP) AS Jumlahpegawai, SUM(Gaji) AS TotalGaji,
    AVG(Gaji) AS RataGaji, Max(Gaji) AS GajiMks, MIN(Gaji) AS GajiMin
    FROM pegawai
    WHERE Jabatan = 'Staff' OR Jabatan = 'Sales'
    GROUP BY NoCab HAVING SUM(Gaji) <= 2600000;
```

PENJELASAN : 
- ` SELECT` = untuk memilih kolam mana saja yang ingin digunakan. 
- `COUNT (NIP)` = untuk menghitung barisan data yang ada Pada kolom Yang dipilih. AS Jumlah
- `pegawai` = untuk mengganti nama dari kolom hasil COUNT (NIP) menjadi Jumlah Pegawai untuk sementara. 
- `SUM (Gaji)` = untuk menjumlah data Yang ada Pada kolom Yang dipilih. Gaji adalah nama kolom Yang dipilih. 
- `As Total Gaji` = untuk mengganti nama dari kolom hasil SUM(Gaji) menjadi Total Gaji Untuk Sementara. AVG (Gaji) untuk menghitung rata-rata dari kolom Yand dipilih. Gaji adalah nama kolom Yang dipilih.
- `As Rata Gaji` = untuk mengganti nama dari kolom hasil AVG (Gaji) menjadi Rata Gaji Untuk sementara. MAX (Gaji) untuk menampilkan nilai 2 terbesar dan suatu data dalam kolom Yang dipilih Gaji adalah nama kolom. Yang dipilih.

# TABEL KESELURUHAN PADA PRAKTIK
![](asset/tabelvalen.jpg)