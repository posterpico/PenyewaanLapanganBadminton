<?php
    //Memanggil Koneksi DB
    include "koneksi.php";

    //Deklarasi Variabel dengan nilai form
    $email = $_POST['email'];
    $password = $_POST['password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $jk = $_POST['jk'];
    $fullname = $firstname . " " . $lastname;
   
    $result = mysqli_query($koneksi,"SELECT * FROM user WHERE email='$email'");
    $num_rows = mysqli_num_rows($result);

    //Mengecek data duplikat
    if ($num_rows) {
        echo "<script>alert('Email telah terdaftar');
        window.location.href='../register.php';</script>";
     }

    //Deklarasi Query Input ke tabel User
    $proses = mysqli_query($koneksi,"INSERT INTO user (email, password, nama, jk) VALUES ('$email','$password','$fullname','$jk') ")
    or die (mysqli_error($koneksi));

    //Cek apakah data tidak ada data duplikasi
    if (mysqli_num_rows($proses) == 0) {
        echo "<script>alert('Pendaftaran anda berhasil!');
        window.location.href='../login.php';</script>";
    }
?>