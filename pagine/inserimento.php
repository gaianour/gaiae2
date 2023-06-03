<?php
    if(isset($_POST["matricola"])){$matricola=$_POST["matricola"];}else{$matricola="";}
    if(isset($_POST["superficie"])){$superficie=$_POST["superficie"];}else{$superficie="";}
    if(isset($_POST["n_piani"])){$n_piani=$_POST["n_piani"];}else{$n_piani="";}
    if(isset($_POST["prezzo"])){$prezzo=$_POST["prezzo"];}else{$prezzo="";}
    if(isset($_POST["citta"])){$citta=$_POST["citta"];}else{$citta="";}
    if(isset($_POST["via"])){$via=$_POST["via"];}else{$via="";}
    if(isset($_POST["n_civico"])){$n_civico=$_POST["n_civico"];}else{$n_civico="";}

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

    <main>
        <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <table class= "table__login">
                <tr>
                    <td colspan="2"><h1>inserimento immobile</h1></td>
                </tr>
                <tr>
                    <td>matricola immobile:</td>
                    <td><input type="number" name="matricola" required></td>
                </tr>
                <tr >
                    <td>superficie: (in mq)</td>
                    <td><input type="number" name="superficie" required></td>
                </tr>
                <tr>
                    <td>prezzo: (in euro)</td>
                    <td><input type="number" name="prezzo" required></td>
                </tr>
                <tr>
                    <td>numero di piani: </td>
                    <td><input type="number" name="n_piani" required></td>
                </tr>
                <tr>
                    <td>città:</td>
                    <td><input type="text" name="citta" required></td>
                </tr>
                <tr>
                    <td>via: </td>
                    <td><input type="text" name="via" required></td>
                </tr>
                <tr>
                    <td>n_civico: </td>
                    <td><input type="text" name="n_civico" required></td>
                </tr>
                <tr>
                    <td>locali: </td>
                    <td>
                        <input type="radio" name="locali" name="bilocale" checked>bilocale
                    </td>
                </tr>
                <tr><td></td><td><input type="radio" name="locali" name="trilocale">trilocale</td></tr>
                <tr><td></td><td><input type="radio" name="locali" name="quadrilocale">quadrilocale</td></tr>
                <tr><td></td><td><input type="radio" name="locali" name="quadrilocale+">quadrilocale+</td></tr>


                <tr>
                    <td colspan="2">
                        <input style="text-align:center" class="input__submit" type="submit" value="inserisci">
                    </td>
                </tr>
           
        </form>

        <tr><td colspan="2">
            <a href="aggiungi_immagine.php">vuoi aggiungere un'immagine al tuo database? vai qui.</a>
        </td></tr>

         </table>


    </main>
</body>
</html>