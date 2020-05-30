<?php
    //Memulai Sesi
    session_start();

    //Memanggil Koneksi DB
    include "koneksi.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $_SESSION['success'] = "";
    $_SESSION['email'] = "";

    //Mencegah Override Data
    $email = stripcslashes($email);
    $password = stripcslashes($password);
    $email = mysqli_real_escape_string($koneksi,$email);
    $password = mysqli_real_escape_string($koneksi,$password);

    //Mengeck Kondisi
    //Kondisi ketika form dengan name=admin
    if(isset($_POST['admin'])){
        $result = mysqli_query($koneksi,"select *from admin where username = '$email' and password = '$password'")
        or die (mysqli_error($koneksi));
        $_SESSION['admin']=true;
    }

    //Kondisi ketika form dengan name!=admin
    else{
        $result = mysqli_query($koneksi,"select *from user where email = '$email' and password = '$password'")
        or die (mysqli_error($koneksi));
    }


    //Mengecek Kecocokan Data Form dengan Database
    $row = mysqli_fetch_array($result);
    
    //Mengecek Kondisi
    //Ketika email/username dan password cocok dengan database
    if($row['email'] == $email || $row['username'] && $row['password'] == $password){
        $_SESSION['nama'] = $row['nama']; 
        $_SESSION['email'] = $row['email']; 
        $_SESSION['username'] = $row['username']; 
        $_SESSION['iduser'] = $row['iduser'];
        $_SESSION['notelp'] = $row['notelp'];
        if(isset($_POST['admin'])){
        header('location: ../adminorder.php'); 
        }else{
            header('location: ../index.php'); 
        } 

    //Ketika tidak cocok
    }else{
        echo "<script>
        alert('Email & Password anda salah!');
        window.location.replace('../login.php');
        </script>";
    }

?>