<?php
    //Memulai Sesi
    session_start();
    //Memanggil Koneksi DB
    include "koneksi.php";

    //Deklarasi variabel yang dibutuhkan
    $tanggal = $_POST['tanggal'];
    $namalapangan = $_POST['namalapangan'];
    $notelp = $_POST['notelp'];
    $iduser = $_POST['iduser'];
    $idlapangan = $_POST['idlapangan'];
    $jam = $_POST['jam'];
    $durasi = $_POST['durasi'];
    $_SESSION['alertval'] = null;

    //Membentuk variabel hargasewa dengan memanggil price.php
    include "price.php";

    //Memasukkan data ke database
    //Memasukkan data ke tabel jadwal
    $query1 = "INSERT INTO jadwal (tanggal, idlapangan, jam, durasi, hargasewa) VALUES ('$tanggal','$idlapangan','$jam','$durasi','$hargasewa')";
    $result = mysqli_query($koneksi,$query1);

    //Membentuk Variabel idjadwalval dengan Query $idjadwal
    $idjadwal = mysqli_query($koneksi,"select * from jadwal where jam = '$jam' AND tanggal = '$tanggal'");
    while ($row = mysqli_fetch_array($idjadwal)) {
        $idjadwalval=$row['idjadwal']; 
    }

    //Membentuk Variabel waktupesan dengan fungsi date untuk mengambil waktu sesi dilakukan
    date_default_timezone_set("Asia/Bangkok");
    $waktupesan = date('Y-m-d H:i:s');

    //Memasukan data ke tabel pemesanan
    $query2 = "INSERT INTO pemesanan (waktupesan, iduser, idjadwal) VALUES ('$waktupesan','$iduser','$idjadwalval')";
    $result2 = mysqli_query($koneksi,$query2);
    
    //Membentuk Variabel idpesanan yang memiliki atribut idjadwal = $idjadwalval
    $query3 = "SELECT * FROM pemesanan where idjadwal='$idjadwalval'";
    $result3 = mysqli_query($koneksi,$query3);
    while ($row = mysqli_fetch_array($result3)) {
        $idpesanan=$row['idpesanan']; 
    }

    //Memasukkan data atribut $idpesanan ke tabel pembayaran
    $query4 = "INSERT INTO pembayaran (idpesanan) VALUES ('$idpesanan')";
    $result4 = mysqli_query($koneksi,$query4);

    echo "<script>
        window.location.replace('../yourorder.php');
        </script>";

?>

