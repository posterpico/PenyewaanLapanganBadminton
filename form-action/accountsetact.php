<?php
//Memulai Sesi
session_start();
    //Memanggil Koneksi DB
    include "koneksi.php";
    $iduser = $_SESSION['iduser'];

    //Mengecek Kondisi Input
    //Kondisi Form dengan Input email
    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $nohp = $_POST['notelp'];
        $nama = $_POST['nama'];
        $query = "UPDATE user SET nama='$nama', notelp='$nohp' where iduser='$iduser'";
        $change = mysqli_query($koneksi, $query);
        $_SESSION['nama']=$nama;
        echo "<script>alert('Data diperbarui!');
        window.location.replace('../account.php');</script>";
       
    //Kondisi Form dengan Input newpass
    } else if(isset($_POST['newpass'])){
        $oldpass = $_POST['oldpass'];
        $newpass = $_POST['newpass'];

        $query = "SELECT * FROM user where iduser='$iduser'";
        $fetching = mysqli_query($koneksi, $query);
        while($row = mysqli_fetch_array($fetching)){
            $password = $row['password'];
        }

        if($oldpass==$password){
            $query2 = "UPDATE user SET password='$newpass' where iduser='$iduser'";
            mysqli_query($koneksi, $query2);
            echo "<script>alert('Data diperbarui!');
            window.location.replace('../account.php');</script>";
        }else{
            echo "<script>alert('Password lama tidak cocok');
            window.location.replace('../changepassword.php');</script>";
        }
        

    }