<?php
    //Memanggil Koneksi DB
    include "koneksi.php";
    //Deklarasi Variabel untuk Query
    $statuspesan = $_POST['status'];
    $idorder = $_POST['idorder'];

    //Menjalankan Query UPDATE
    $query = "UPDATE pemesanan SET statuspesan='$statuspesan' WHERE idpesanan = '$idorder'";
    $result = mysqli_query($koneksi,$query);

    echo $statuspesan;
    ?>