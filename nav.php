<?php
    //Memulai Sesi
    session_start();

    //Kondisi ketika Logout
    if (isset($_GET['logout'])) { 
    session_destroy(); 
    unset($_SESSION['nama']);
    $logout = "1"; 
    header("location: login.php"); 
    } 
?>

<html>
    <head>
        <title> GOR Online </title>
        <link href="styles/styles.css" rel="stylesheet"/>
    </head>
    
    <body>
        <header id="navbar">
            <nav>
                 <!-- Start to build Unordered List -->
                <ul>
                    <li class="Logo"><a href="index.php">Logo GOR Online</a></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="dateselection.php">Order</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contacts.php">Contacts</a></li>
                         <!-- Mengecek Kondisi ketika ada Sesi Nama -->
                        <?php if(isset($_SESSION["nama"])) : ?>
                            <li class="loggedin">
                                <a href="account.php">
                         <?php echo $_SESSION['nama']; ?>   
                                </a>
                            </li>
                            <li class = "logout">
                                <a href ="index.php?logout=1">
                            Logout</a>  </li>
                            <li class = "yourorder">
                        <!-- Check if User or Admin logged in -->
                            <?php if(isset($_SESSION['iduser'])) :?>
                                <a href ="yourorder.php">
                                Histori Order</a>  </li>
                            <?php else :?>
                                <a href ="adminorder.php">
                                Kelola Order&nbsp;</a>  </li>
                            <?php endif;?>
                        
                        <!-- Kondisi ketika tidak ada Sesi Nama -->
                        <?php else : ?>
                        <li class="login">
                            <a href="login.php">
                            Sign In </a></li>
                        <?php endif; ?>
                             
                </ul>
            </nav>
        </header>
</body>

</html>