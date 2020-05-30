<html>
    <head>
        <title> GOR Online </title>
        <link href="styles/styles.css" rel="stylesheet"/>
        <link href="styles/form-style.css" rel="stylesheet"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
        </script>
        
        

    </head>
    
    <body>

         <?php
        include "nav.php";
        // Check if User Logged in //
        if(!isset($_SESSION["iduser"])) {   
        echo "<script>
        alert('Login terlebih dahulu!');
        window.location.replace('login.php');
        </script>";}
        ?>
    
        <!-- Generate Array Tanggal (4 Hari Ke Depan) -->
        <?php
        $tanggal = array();
        for($i = 0; $i < 4; $i++){
        $hari=0+$i;
        $hitung = date("Y-m-d", strtotime("+$hari day"));
        $tanggal[$i] = $hitung;
        }
        ?>

    <!-- Start build Select Date Form with Order Form Styles -->
    <div id="selectdate" class="order-form" style="height:500px;"> 
        <form action = "form-action/dateselectact.php" method="POST">
            <fieldset>
    
        <!-- Generate Nama Lapangan from DB -->
        <?php
        include "form-action/koneksi.php";
        $jadwal = mysqli_query($koneksi,"select * from lapangan");
        
        while ($row = mysqli_fetch_array($jadwal)) {
            $lapangan[]=$row['namalapangan']; }
        ?>  
            
        <br> <br>
        <p style="text-align:center; font-size:25px">Pilih Tanggal Penyewaan Lapangan</p>
        <!-- Build Radio Button -->
        <div class="radio-toolbar">

        <!-- Show Radio Input with IF Condition (4 Hari Ke Depan) -->
        <?php for($i = 0; $i < 4; $i++) : ?>
        <input type="radio" id="<?php echo $tanggal[$i]?>" name="tanggal" value="<?php echo $tanggal[$i]?>" required />
        <label for="<?php echo $tanggal[$i]?>"><?php echo $tanggal[$i]?></label>
        <?php endfor;?>

        </div>

        <p style="text-align:center; font-size:25px; margin-top:50px">Pilih Lapangan</p>
        <div class="radio-toolbar">
        <!-- Show Radio Input with Generated Lapangan DB -->
        <?php for($i = 0; $i < count($lapangan); $i++) : ?>
            <?php if($i < count($lapangan)-1) :?>
            <?php if($lapangan[$i]==$lapangan[$i+1]) :?>
            <?php $i += count($lapangan)-1;?>
            <?php endif?>
            <?php endif?>
        <input type="radio" id="<?php echo $lapangan[$i]?>" name="namalapangan" value="<?php echo $lapangan[$i]?>" required />
        <label for="<?php echo $lapangan[$i]?>"><?php echo $lapangan[$i]?></label>
        <?php endfor;?>
        </div>

        <p>&nbsp;</p>
        <button type="submit" class="buttondate">Lanjut</button>
          </fieldset>
        </form>
      
    </div>
        
    <footer> GOR Caimulang 2019-2020 ©</footer>
    </body>
</html>