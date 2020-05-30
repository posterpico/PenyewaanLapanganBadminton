<?php
    //Memmulai Sesi
    session_start();

    //Mengecek Kondisi

   //Kondisi Form dengan name=idbayar
   if(isset($_POST['idbayar'])){
        if($_POST['idbayar']==2){
            $hargasewa = $_SESSION['harga'] + 2000;
            $metode = "Tunai";
        }
        else if($_POST['idbayar']==3){
            $hargasewa = $_SESSION['harga'] + 3000;
            $metode = "Minimarket";
        }
        else{
            $hargasewa = $_SESSION['harga'];
            $metode = "Virtual Account";
        }

    //Kondisi Form selain dengan name=idbayar
    }else{
        if(isset($_POST['id']) === true){
            $id = $_POST['id'];
        }
        else{
            $id = $durasi; 
        }

        //Mengecek Kondisi
        //Check $id untuk menentukan hargasewa
        if($id == 1){
            $hargasewa = 20000;
            }
            else if($id == 2){
                $hargasewa = 25000;
                }
                else if($id == 3){
                    $hargasewa = 30000;
                }
                else if($id == 4){
                    $hargasewa = 35000;
                }
                else if($id == 5){
                    $hargasewa = 35000;
                
                }
        }

    //Memunculkan Harga Sewa di order.php
    echo "Rp " . $hargasewa . ",00";

?>