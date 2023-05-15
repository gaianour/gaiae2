<?php 
$host= "localhost";
$user= "root";
$password_database= "";
$database = "gaiae";

    if(isset($_POST["username"])) $username = $_POST["username"];  else $username = "";
    if(isset($_POST["password"])) $password = $_POST["password"];  else $password = "";
    if(isset($_POST["conferma"])) $conferma = $_POST["conferma"];  else $conferma = "";
    if(isset($_POST["nome"])) $nome = $_POST["nome"];  else $nome = "";
    if(isset($_POST["cognome"])) $cognome = $_POST["cognome"];  else $cognome = "";
    if(isset($_POST["email"])) $email = $_POST["email"];  else $email = "";
    if(isset($_POST["telefono"])) $telefono = $_POST["telefono"];  else $telefono = "";
    if(isset($_POST["comune"])) $comune = $_POST["comune"];  else $comune = "";
    if(isset($_POST["indirizzo"])) $indirizzo = $_POST["indirizzo"];  else $indirizzo = "";
    if(isset($_POST["tipologia"])) $tipologia = $_POST["tipologia"];  else $tipologia = "utenti";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
<table class="table__login">
        <tr><td colspan="2"><h3 style="text-align: center;" class="header__logo">GAIAE</h3></td></tr>
        <tr><td colspan="2"><h1 style="text-align: center;">registrazione</h1></td></tr>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
            
                <tr>
                    <td>Username:</td>
                    <td><input class="input_dati_personali" type="text" name="username" <?php echo "value = '$username'" ?> required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input class="input_dati_personali" type="password" name="password" <?php echo "value = '$password'" ?> required></td>
                </tr>
                <tr>
                    <td>Conferma psw:</td>
                    <td><input class="input_dati_personali" type="password" name="conferma" <?php echo "value = '$conferma'" ?> required></td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td><input class="input_dati_personali" type="text" name="nome" <?php echo "value = '$nome'" ?>></td>
                </tr>
                <tr>
                    <td>Cognome:</td>
                    <td><input type="text" class="input_dati_personali" name="cognome" <?php echo "value = '$cognome'" ?>></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" class="input_dati_personali" name="email" <?php echo "value = '$email'" ?>></td>
                </tr>
                <tr>
                    <td>Telefono:</td>
                    <td><input type="text" class="input_dati_personali" name="telefono" <?php echo "value = '$telefono'" ?>></td>
                </tr>
                <tr>
                    
            
            <tr><td style="text-align:center" colspan="2"><input type="submit" value="invia"></td></tr>
        </form>
        </table>

        <?php
            if(isset($_POST["username"]) and isset($_POST["password"])) {
                if ($_POST["password"] != $_POST["conferma"]) {
                    echo "Le password inserite non corrispondono";
                } else {
                    $conn = new mysqli($host, $user, $password_database, $database);
                    if($conn->connect_error){
                        die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
                    }
                    
                    $myquery = "SELECT username 
						    FROM account 
						    WHERE username='" . $_POST["username"] . "'";
                    

                    $ris = $conn->query($myquery) or die("<p>Query fallita!</p>");
                    if ($ris->num_rows > 0) {
                        ?> <p style="text-align: center">Lo username è già stato usato, si è pregati di cambiarlo</p><?php
                    } else {

                        $myquery = "INSERT INTO account (username, password, nome, cognome, email, telefono)
                                    VALUES ('$username', '$password', '$nome', '$cognome','$email', '$telefono')";

                        if ($conn->query($myquery) === true) {
                            session_start();
                            $_SESSION["username"]=$username;

						    $conn->close();

                            echo "Registrazione effettuata con successo!<br>sarai ridirezionato alla home tra 5 secondi.";
                            header('Refresh: 4; URL=../index.html');

                        } else {
                            echo "Non è stato possibile effettuare la registrazione per il seguente motivo: " . $conn->error;
                        }
                    }
                }
            }
            ?>
       
        
 

    
</body>
</html>