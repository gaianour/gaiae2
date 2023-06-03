<?php
    if(isset($_POST["matricola"])){$matricola=$_POST["matricola"];}else{$matricola="";}
    if(isset($_POST["path"])){$path=$_POST["path"];}else{$path="";}
    
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
    <title>Document</title>
</head>
<body>
    <h1>inserimento immagine</h1>
    <tr>
        <td>matricola: </td>
        <td><input type="text" name="matricola" id=""></td>
    </tr>
    <tr>
        <td colspan="2">
        <form action="../upload.php" method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" name="upload" value="Carica file">
        </form>
        </td>
    </tr>
    
    <?php
           
            if(isset($_POST["matricola"])){
                echo "qua"; 
                $conn = new mysqli($host, $user, $password_database, $database);

                if($conn->connect_error){
                    die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
                }
                
            
                

                $ris = $conn->query($myquery) or die("<p>Query fallita!</p>");
                if ($ris->num_rows > 0) {

                    $myquery = "INSERT INTO immagini (matricola, path)
                                VALUES ('$matricola', '../immagini/$path')";

                    if ($conn->query($myquery) === true) {
                        
                        $conn->close();

                        echo "<tr><td colspan='2'><h5 class='messaggio'>Inserimento effettuato con successo!</h5></td></tr>";
                    } else {
                        echo "Non è stato possibile effettuare la registrazione per il seguente motivo: " . $conn->error;
                    }
                    echo "<tr><td colspan='2'><h5 class='messaggio__errore'>Un immobile con questa matricola esiste già, si è pregati di scegliere un altro numero</h5></td></tr>";
                } else {

                    
                    
                }
            }
            

        ?>
</body>
</html>