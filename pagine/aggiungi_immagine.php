<?php
    if(isset($_POST["matricola"])){$matricola=$_POST["matricola"];}else{$matricola="";}
    if(isset($_POST["path"])){$path=$_POST["path"];}else{$path="";}
    if(isset($_POST["id"])){$id=$_POST["id"];}else{$id="";}
    
    session_start();

    require("../database/dati_db.php");

    $username=$_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<header>
        <div class="flexbox">
            <div class="header__logo"><a href="home.php">GAIAE</a></div>
            <div class="header__nav">
                <ul>
                    <li><a href="cerca.php">cerca</a></li>
                    <li><a href="preferiti.php"> preferiti</a></li>
                    <li><a href="inserimento.php">inserisci immobili</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </div>
            <div class="header__img"><img class="w100" src="../immagini/logo.jpg" alt=""></div>
            
        </div>
        
    </header>
    
    <table class="table__login">
        <tr>
            <td colspan="2">
            <h1>inserimento immagine</h1>
            </td>
        </tr>
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
    <tr>
        <td>matricola: </td>
        <td><input type="text" name="matricola" required></td>
    </tr>
    <tr>
        <td>id: </td>
        <td><input type="text" name="id"  required></td>
    </tr>
    <tr>
        <td colspan="2">
        <form action="../upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="path">
            <input type="submit" name="upload" value="Carica file">
        </form>
        </td>
    </tr>
    <tr>
        <td><input type="submit" name="conferma" value="conferma"></td>
    </tr>
    </table>
</form>
    <?php
         
            if(isset($_POST["matricola"])){
                 
                $conn = new mysqli($host, $user, $password_database, $database);

                if($conn->connect_error){
                    die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
                }
                
                    //$path2='../immagini/'.$path;
                    $myquery = "INSERT INTO immagini (matricola, path,id)
                                VALUES ('$matricola', '../immagini/$path','$id')";
                        echo $myquery;
                    if ($conn->query($myquery) === true) {
                        
                        $conn->close();

                        echo "<tr><td colspan='2'><h5 class='messaggio'>Inserimento effettuato con successo!</h5></td></tr>";
                    } else {
                        echo "Non è stato possibile inserire l'immagine per il seguente motivo: " . $conn->error;
                    }
                    
            } 
            
            

        ?>
</body>
</html>