<html>
    <head>
        <title> GOR Online </title>
        <link href="styles/styles.css" rel="stylesheet"/>
        <link href="styles/form-style.css" rel="stylesheet"/>
        
    <body>
         <?php
        include "nav.php";
        // Check if User Logged in //
        if(!isset($_SESSION["nama"])) {   
        echo "<script>
        alert('Login terlebih dahulu!');
        window.location.replace('../login.php');
        </script>";}
        ?>

    <!-- Start to build Change Password form with Order Form Styles-->
    <div id="orderform" class="order-form" style="height:340px; width:430px; margin-bottom:35px;"> 
        <form id="orderForm" action = "form-action/accountsetact.php" method="POST">
        <fieldset>
        <legend>Change Password</legend>
        <p style="position:relative; left:36%; margin-bottom:10px; font-size:20px">Password Lama</p>
        <input class="enable" style="width:200px;" type="password" placeholder="" name="oldpass" value=""/> <br>
        <p style="position:relative; left:36%; font-size:20px; margin-bottom:10px;">Password Baru</p>
        <input class="enable"style="width:200px; position:abosl" type="password" placeholder="" name="newpass" value=""/> <br>
    
        <br>
    <button style = "top:30px" type="submit" class="buttondate">Lanjutkan</button>
        </form>
        </fieldset>
    </div>

    <footer> GOR Caimulang 2019-2020 ©</footer>
    </body>
</html>