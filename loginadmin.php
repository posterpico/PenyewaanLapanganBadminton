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

     <!-- Start build Login form -->
    <div class=login-form style="height:300px">
        <form action="form-action/loginact.php" method="POST" class="form-horizontal">
        <fieldset>
        <legend>Login Admin</legend>
        <label for ="Email">Username</label>
        <input type = "text" placeholder="Enter Username" name="email" size="40px"/> <br> <br>
        <label for ="Password">Password</label>
        <input type = "password" placeholder="Enter Password" name="password" required size="50"/> <br><br>
        <input type = "hidden" name="admin"/>

        <button type="submit" class="btn btn-success">Login</button>
            <br/>
      </div>
    </form>
     
        </fieldset>

       
        <footer style="top:126px;"> GOR Caimulang 2019-2020 ©</footer>
        <script src="scroll.js"></script>
    </body>
</html>