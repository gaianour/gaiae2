<?php
    if (isset($_POST["username"])){$username=$_POST["username"];}else{$username="";}
    if (isset($_POST["password"])){$password=$_POST["password"];}else{$password="";}
    if (isset($_POST["tipologia"])){$tipologia=$_POST["tipologia"];}else{$tipologia="";}
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
    <h3>esercizio 3-registrazione</h3>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
    <table>
        <tr><td>username: </td><td><input type="text" name="username"></td></tr>
        <tr><td>password: </td><td><input type="text" name="password"></td></tr>
        <tr>
            <td>tipologia: </td>
            <td>
                <input type="radio" name="tipologia" value="utenti" id="">utente
                <input type="radio" name="tipologia" value="bibliotecari" id="">bibliotecario
            </td>
        </tr>
        
    </table>
    </form>
</body>
</html>