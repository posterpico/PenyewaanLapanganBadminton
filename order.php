<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <html>
    <head>
        <title> GOR Online </title>
        <link href="styles/styles.css" rel="stylesheet"/>
        <link href="styles/form-style.css" rel="stylesheet"/>
        
        <!-- Script for Radio Input Onchange -->
        <script>
           $(document).ready(function() {
         $('input:radio').change(function() {
        var id= $(this).attr('id');
        $.post('form-action/price.php', { id : id }, function(data){
            $('div#price').html(data);
        });

         });
        });
        </script>
      
    </head>
    
    <body>
         <?php
        include "nav.php";
        if(!isset($_SESSION["nama"])) {   
        echo "<script>
        alert('Login terlebih dahulu!');
        window.location.replace('../login.php');
        </script>";}
        ?>

    <!-- Start to build Order Form -->
    <div id="orderform" class="order-form"> 
        <form id="orderForm" action = "form-action/orderact.php" method="POST">
            <fieldset>
                <legend>Order</legend>
        <p style = "position:absolute; top:-5px;"> Tanggal : <?php echo $_SESSION['tanggal'] . " " . "<br> Lapangan : " . $_SESSION['namalapangan']; ?> </p>
        <p style="text-align:center; font-size:20px">Email</p>
       
        <input class="disable" type = "text" placeholder="" name="email" value="<?php echo $_SESSION['email'];?>"/> <br>
         <!-- Hidden type input for Input with Sesion Values -->
        <input type = "hidden" name="iduser" value="<?php echo $_SESSION['iduser'];?>"/>
        <input type = "hidden" name="tanggal" value="<?php echo $_SESSION['tanggal'];?>"/>
        <input type = "hidden" name="namalapangan" value="<?php echo $_SESSION['namalapangan'];?>"/>
        <input type = "hidden" name="idlapangan" value="<?php echo $_SESSION['idlapangan'];?>"/>
        <p style="text-align:center; font-size:20px;">No HP</p>
        <input class="enable" style="width:200px;" type = "text" placeholder="Masukkan No HP" name="notelp" value=""/>
        

        <br> <br>
        <p style="text-align:center; font-size:20px">Masukkan Jam Penyewaan</p>
        <input class="enable" type="text" name="jam" placeholder="HH:MM" required/>
        <br>

        <p style="text-align:center; font-size:20px; margin-top:30px">Masukkan Durasi Penyewaan</p>
        <div class="radio-toolbar">
        <?php for($i = 1; $i < 6; $i++) :?>
        <input type="radio" id="<?php echo $i?>" name="durasi" value="<?php echo $i?>" required />
        <label for="<?php echo $i?>"><?php echo $i?> Jam</label>
        <?php endfor?>
        </div>
        
    <p>&nbsp;</p>
         
        <!--Checkbox -->
        <div class="card">
            <div class="checkbox-container">
            <label class="checkbox-label">
                <input type="checkbox" name="peralatan" value="ada">
                <span class="checkbox-custom rectangular"></span>
            </label>
            <div class="input-title">Ingin tambahkan Peralatan?</div>
            </div>
        <div class="checkbox-container circular-container">

        <h1> Harga : </h1>
        <div id="price">Rp 0,00</div>
        <a href ="dateselection.php">Ingin mengubah jadwal dan lapangan?</a>
        <button style = "top:30px" type="submit" class="buttondate">Lanjutkan</button>
          </fieldset>
        </form>
    </div>

    <footer> GOR Caimulang 2019-2020 ©</footer>
    </body>
</html>