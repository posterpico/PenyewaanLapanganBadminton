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
        ?>

     <!-- Login Form with Order-Form Styles and with some height & width change-->
    <div class="order-form" style="height:450px; width:430px;"> 
        <form id="orderForm" action = "form-action/accountsetact.php" method="POST">
        <fieldset>
        <legend>Account Settings</legend>
        <p class="marginset"> Email</p>
        <input class="disable" type = "text" placeholder="" name="email" value="<?php echo $_SESSION['email'];?>"/> <br>
        <p class="marginset">No HP</p>
        <input class="alignform" style="width:200px;" type = "text" placeholder="Tambahkan No HP" name="notelp" value=""/>
    
        <br>
        <p class="marginset">Nama</p>
        <input class="alignform" style="width:300px;" type="text" name="nama" value="<?php echo $_SESSION['nama'];?>" required/>
        <br>
        <button style = "top:30px" type="submit" class="buttondate">Lanjutkan</button>
        <a href="changepassword.php"><p style="position:absolute; right:5px; bottom:-20">Ganti Password?</p></a>
        </form>
        </fieldset>
    </div>

    <footer> GOR Caimulang 2019-2020 ©</footer>
    </body>
</html>