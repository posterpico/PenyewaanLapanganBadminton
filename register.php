<html>
    <head>
        <title> GOR Online </title>
        <link href="library/bootstrap/css/bootstrap.css" rel="stylesheet"/>
        <link href="styles/styles.css" rel="stylesheet"/>
    </head>
    
    <body>
        <?php
        include "nav.php";
        ?>
        
    <!-- Start to build Register Form -->
    <div class=register-form>
        <form action="form-action/registeract.php" method="POST">
            <fieldset>
        <legend>Register</legend>
        <label for ="Email">Email</label>
        <input type = "text" placeholder="Enter Email" name="email"/>

        <label for ="Password">Password</label>
        <input type = "password" placeholder="Enter Password" name="password" required/> <br>

        <label for ="NamaDepan">Nama Depan</label>
        <input type = "text" placeholder="Enter Name" name="firstname" required/> <br>

        <label for ="NamaBelakang">Nama Belakang</label>
        <input type = "text" placeholder="Enter Last Name" name="lastname" required/> <br>
        
        <label for ="Nama Depan">Jenis Kelamin</label>
        <input class = "radio" type = "radio" name="jk" value="Laki-Laki"> Laki-Laki &nbsp; <input class="radio" type = "radio" name="jk" value="Perempuan"> Perempuan  <br><br>


        <button type="submit" class="btn btn-success">Register</button>
            <br/>
   
            </fieldset>
        </form> 
    </div> 
    <footer> GOR Caimulang 2019-2020 ©</footer>
       
    </body>
</html>