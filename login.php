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

     <!-- Start build Login Form -->
    <div class=login-form>
        <form action="form-action/loginact.php" method="POST" class="form-horizontal">
        <fieldset>
        <legend>Login</legend>
        <label for ="Email">Email</label>
        <input type = "text" placeholder="Enter Email" name="email" size="40px"/> <br> <br>
        <label for ="Password">Password</label>
        <input type = "password" placeholder="Enter Password" name="password" required size="50"/> <br><br>

        <button type="submit" class="btn btn-success">Login</button>
            <br/>
       <a class="login-newuser" href="register.php">Tidak punya akun?</a>
       <a style="position:absolute; left:20; bottom:24; color:white;" href="loginadmin.php">Login Admin</a>
      </div>
    </form>
     
        </fieldset>

       
        <footer style="top:75px;"> GOR Caimulang 2019-2020 ©</footer>
        <script src="scroll.js"></script>
    </body>
</html>