<?php

require("database/dati_db.php");

session_start();
if (isset($_POST["username"])) {$username = $_POST["username"];} else {$username = "";}
if (isset($_POST["password"])) {$password = $_POST["password"];} else {$password = "";}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./pagine/style.css">
    <title>Document</title>

</head>
<body>

    <header>
        <div class="flexbox">
            <div class="header__logo">GAIA</div>
            <div class="header__nav">
                <ul>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
            <div class="header__img"></div>
            
        </div>
        
    </header> 

    <table class="table__login" style="width:30%;">
        <tr><td colspan="2"><h3 style="text-align: center;" class="header__logo">GAIAE</h3></td></tr>
        <tr><td colspan="2"><h1 style="text-align: center;">accedi</h1></td></tr>
        <form action="" method="post">
            
                <tr><td colspan="2">username: </td></tr>
                <tr><td colspan="2"><input class="input__text" type="text" name="username" required></td></tr>

                <tr><td colspan="2">password: </td></tr>
                <tr><td colspan="2"><input class="input__text" type="password" name="password" required></td></tr>

                <tr><td colspan="2" style="text-align: center;" colspan="2"><input class="input__submit" type="submit"></td></tr> 
                <?php
        
        if (isset($_POST["username"]) and isset($_POST["password"])) {
            $conn = new mysqli($host, $user, $password_database, $database);

            if ($conn === false){
                die("connessione fallita");
            }
        
        $myquery = "SELECT username, password 
                        FROM account 
                        WHERE username='$username'
                            AND password='$password'";

        $ris = $conn->query($myquery) or die("<p>Query fallita! ".$conn->error."</p>");
        
        if($ris->num_rows == 0){
            echo "<tr><td colspan='2'><h5 class='messaggio__errore'>Utente non trovato o password errata</h5></td></tr>";
            $conn->close();
        } 
        else {
            echo "<p>Utente trovato</p>";

            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password ;
                                    
            $conn->close();
            header("location:pagine/home.php");

        }
        }
        ?>

                <tr><td colspan="2"><h5 style="text-align:center">non hai un account? <b><u><a href="./pagine/registrazione.php">registrati ora</a></u></b></h4></h1></td></tr>
            
        </form>


        
    </table>
    

</body>
<footer>
    <?php
        include('./pagine/footer.php')
    ?>
</footer>
</html>