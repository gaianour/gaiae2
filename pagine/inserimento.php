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
                    <li><a href="inserimento.php">inserisci immobili</a></li>
                    <li><a href="logout.php">logout</a></li>
                </ul>
            </div>
            <div class="header__img"><img class="w100" src="../immagini/logo.jpg" alt=""></div>
            
        </div>
        
    </header>

    <main>
        <form action="<?php $_SERVEER['PHP_SELF']?>" method="post">
            <table>
                <tr>
                    <td>matricola immobile:</td>
                    <td><input type="number" name="matricola"></td>
                </tr>
                <tr>
                    <td>superficie: (in mq)</td>
                    <td><input type="number" name="superficie"></td>
                </tr>
                <tr>
                    <td>prezzo: (in euro)</td>
                    <td><input type="number" name="prezzo"></td>
                </tr>
                <tr>
                    <td>numero di piani: </td>
                    <td><input type="number" name="n_piani"></td>
                </tr>
                <tr>
                    <td>comune:</td>
                    <td><input type="text" name="comune"></td>
                </tr>
                <tr>
                    <td>via: </td>
                    <td><input type="text" name="via"></td>
                </tr>
                <tr>
                    <td>civico: </td>
                    <td><input type="text" name="civico"></td>
                </tr>
                <tr>
                    <td>locali: </td>
                    <td>
                        <input type="radio" name="locali" name="bilocale">bilocale
                    </td>
                </tr>
                <tr><td></td><td><input type="radio" name="locali" name="trilocale">trilocale</td></tr>
                <tr><td></td><td><input type="radio" name="locali" name="quadrilocale">quadrilocale</td></tr>
                <tr><td></td><td><input type="radio" name="locali" name="quadrilocale+">quadrilocale+</td></tr>
            </table>
        </form>
    </main>
</body>
</html>