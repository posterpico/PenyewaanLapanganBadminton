<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <html>
    <head>
        <title> GOR Online </title>
        <link href="styles/styles.css" rel="stylesheet"/>
        <link href="styles/form-style.css" rel="stylesheet"/>
      
    </head>
    
    <body>
         <?php
        include "nav.php";
        if(!isset($_SESSION["nama"])) {   
        echo "<script>
        alert('Login terlebih dahulu!');
        window.location.replace('../login.php');
        </script>";}
        $idbayar = $_POST['idbayar'];
        $nominal = $_POST['nominal'];
        $metode = $_POST['metode'];
        $idpesanan = $_POST['idpesanan'];
        ?>

  
     <!-- Start build Invoice with Order Form Styles -->
    <div class="order-form" style="height:200px; width:430px;"> 
    <legend>Invoice #<?php echo $idbayar;?></legend>
       <p style="position:absolute; top:50px; left:30px; font-size:20px;">
       ID Pesanan : #<?php echo $idpesanan;?></p>
       <p style="position:absolute; top:80px; left:30px; font-size:20px;">
       Nominal dibayarkan : Rp<?php echo $nominal;?>,00</p>
       <p style="position:absolute; top:110px; left:30px; font-size:20px;">
       Metode Pembayaran : <?php echo $metode;?></p>
       <p><a href="yourorder.php"> Kembali ke Histori Order?</a></p>
    </div>

    <footer style="margin-top:440px;"> GOR Caimulang 2019-2020 ©</footer>
    </body>
</html>