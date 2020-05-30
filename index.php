<html>
    <head>
        <title> GOR Online </title>
        <link href="library/bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="styles/styles.css" rel="stylesheet"/>
    </head>
    
     <!-- Class "No Image" to set Background to None -->
    <body class="noimage">
         <?php
        include "nav.php";
        ?>

        <!-- Welcome Section -->
        <section>
        <div class="welcome"><br><strong>Selamat Datang di GOR Online</strong></div>
        </section>

        <!-- Show Image Figure Content -->
        <section class="menu">
            <figure> 
                <img src="images/Lapangan.jpg" alt="Lapangan">
                <figcaption>Sewa Lapangan Badminton</figcaption>
            </figure>
            <figure> 
                <img src="images/Peralatan.jpg" alt="Peralatan">
                <figcaption>Menjual Peralatan</figcaption>
            </figure>
            <figure> 
                <img src="images/oneclick.jpg" alt="Lapangan">
                <figcaption>Pesan lewat online!</figcaption>
            </figure>
            <div class=break></div>

            <a href="register.php">
            
            <!--Check if User Logged in -->
            <?php if(isset($_SESSION["iduser"])) : ?>
            <a href="dateselection.php">
            <button> Order sekarang! </button> </a>
            <?php else : ?>
            <a href="register.php">
            <button> Daftar Sekarang! </button> </a>
            <?php endif; ?>
                   
        </section>

         <!-- Information Content -->
        <h1 class="info"><strong>Info Terbaru di GOR Caimulang</strong></h1>
        <hr class="line"/>
        <section class="content">
        <div> 
           <img src="images/Lapangan.jpg">
        </div>
        <div class ="text">
           <a href="index.html"><strong>Pembukaan GOR Caimulang </strong></a> <br>
           Pembukaan GOR Caimulang pada tanggal 15 April 2020 kemarin disambut dengan baik oleh penduduk setempat..........................
       </div>

       <div> 
           <img src="images/oneclick.jpg">
       </div>
       <div class ="text">
           <a href="index.html"><strong>Pemesanan Lapangan secara Online </strong></a> <br>
           Baru-baru ini GOR Caimulang meluncurkan website untuk memudahkan pelanggannya................
       </div>
        </section>

        <footer> GOR Caimulang 2019-2020 ©</footer>
        <script src="styles/scroll.js"></script>
    </body>
</html>