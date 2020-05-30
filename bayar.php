<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
<html>
    <head>
        <title> GOR Online </title>
        <link href="styles/styles.css" rel="stylesheet"/>
        <link href="styles/form-style.css" rel="stylesheet"/>
        <script>
       // Script for Radio Onchange //
        $(document).ready(function() {
          $('input:radio').change(function() {
             var idbayar= $(this).attr('id');
             $.post('form-action/price.php', { idbayar : idbayar }, function(data){
             $('div#price').html(data);
             });
          });
        });
        </script>
    </head>

    <body>

    <?php include "nav.php"; ?>

    <!-- Start build Pay Form with Order Form Styles and with some width and height changes-->
    <div id="orderform" class="order-form" style="height:350px;"> 
        <form id="orderForm" action = "form-action/bayaract.php" method="POST">
            <fieldset>
            <legend>Order</legend>
         <!-- Tanggal, Waktu, Durasi Code Here-->
        <p style = "position:absolute; top:-5px;"> IDOrder : #<?php echo $_SESSION['buttonid'];?> 
        <br> Tanggal : <?php echo $_SESSION['tanggal'];?> 
        <br> Waktu : <?php echo $_SESSION['jam'];?>
        <br> Durasi : <?php echo $_SESSION['durasi'];?> Jam
        </p>

         <!-- Radio Input -->
            <div class="radio-toolbar">
            <p style="text-align:center; font-size:20px; margin-top:30px">Pilih Metode Pembayaran</p>
                <input type="radio" id="1" name="idbayar" value="1" required />
                <label for="1">Pembayaran <br> Tunai</label>
                <input type="radio" id="2" name="idbayar" value="2" required />
                <label for="2">Minimarket <br> +2000 Fee</label>
                <input type="radio" id="3" name="idbayar" value="3" required />
                <label for="3">Virtual Account <br> + Fee 3000</label>
            </div>

         <!-- Lanjutkan for Submit-->
                <button style = "top:30px" type="submit" class="buttondate">Lanjutkan</button>
            <h1> Harga : </h1>
            <div id="price">Rp 0,00</div>
            </fieldset>
        </form>
         <!--End of Form-->
           
        