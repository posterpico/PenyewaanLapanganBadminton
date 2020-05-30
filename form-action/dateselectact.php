<?php
    //Memulai Sesi
    session_start();

    //Memanggil Koneksi DB
    include "koneksi.php";
    
    //Deklaasi namalapangan
    $namalapangan = $_POST['namalapangan'];
    $_SESSION['namalapangan'] = $namalapangan;
    
    //Deklarasi Query
    $jadwal = mysqli_query($koneksi,"select * from lapangan where namalapangan = '$namalapangan'");

    //Mendapatkan Data Baris dari Database
    while ($row = mysqli_fetch_array($jadwal)) {
        $idlapangan=$row['idlapangan']; }

    //Deklarasi tanggal
    $tanggal = $_POST['tanggal'];
    
    //Deklarasi Sesi
    $_SESSION['tanggal'] = $tanggal;
    $_SESSION['idlapangan'] = $idlapangan;
    header('location: ../order.php'); 

?>