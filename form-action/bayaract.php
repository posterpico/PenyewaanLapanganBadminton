<?php
    //Mengecek Kondisi Form
    //Kondisi Form dengan input name=idpesanan dari yourorder.php
    if(isset($_POST['idpesanan'])){
        session_start();
        $_SESSION['buttonid']=$_POST['idpesanan'];
        $_SESSION['harga']=$_POST['harga'];
        $_SESSION['tanggal']=$_POST['tanggal'];
        $_SESSION['jam']=$_POST['jam'];
        $_SESSION['durasi']=$_POST['durasi'];
        header('location: ../bayar.php');

    //Kondisi Form dengan input name=idbayar dari bayar.php
    }else if(isset($_POST['idbayar'])){
        include "koneksi.php";

        //Deklarasi Variabel $hargasewa melalui price.php
        include "price.php";
        $idpesanan = $_SESSION['buttonid'];
        $query = "UPDATE pembayaran SET metode='$metode', nominal='$hargasewa', status='LUNAS' WHERE idpesanan = '$idpesanan'";
     // $query = "INSERT INTO pembayaran (metode, nominal, status, idpesanan) VALUES ('$metode','$hargasewa','lunas','$idpesanan')"
        $query2 = "UPDATE pemesanan SET statuspesan='LUNAS' where idpesanan=$idpesanan";

        $inputt = mysqli_query($koneksi,$query);
        $input2 = mysqli_query($koneksi,$query2);
        header('location: ../yourorder.php');
    }
?>