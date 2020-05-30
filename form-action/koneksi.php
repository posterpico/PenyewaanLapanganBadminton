<?php

    //Deklarasi DB Credentials
    $hostname ="localhost";
    $userDatabase ="root";
    $passwordUser = "";
    $dbname = "sewalapangan";

    //Deklarasi Query Koneksi
    $koneksi = mysqli_connect($hostname, $userDatabase, $passwordUser, $dbname) or die (mysqli_error());

