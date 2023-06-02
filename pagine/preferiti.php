<?php
	session_start();
	$host= "localhost";
    $user= "root";
    $password_database= "";
    $database = "gaiae";

	if(!isset($_SESSION['username'])){
		header('location: ../login.php');
	}
	$username = $_SESSION["username"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Preferiti</title>
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
        
 
        <?php
			$conn = new mysqli($host,$user,$password_database,$database);
			if($conn->connect_error){
				die("<p>connessione fallita, problema: ".$conn->connect_error."</p>");
			}

			$sql = "SELECT username, nome, cognome 
					FROM account
					WHERE username='$username'";
			//echo $myquery;
			$ris = $conn->query($sql) or die("<p>Query fallita!</p>");
			foreach($ris as $riga){
				echo "<h2>Benvenuto <b>".$riga["nome"]." ".$riga["cognome"]."</b></h2>";
			}
		?>
    <p> Queste sono le tue case preferite</p>
    <?php

				$myquery = "SELECT matricola,prezzo,superficie
						FROM account JOIN immobile ON immobile.username=account.username  
						WHERE username='".$username."'";
                        echo $myquery;
                $ris = $conn->query($myquery) or die("<p>Query fallita! ".$conn->error."</p>");
				if ($ris->num_rows == 0) {
					echo "<p style='text-align:center'> La tua lista dei preferiti è vuota!";
				}
                
                    foreach($ris as $riga){
                                                
                        $matricola = $riga["matricola"];
                        $citta = $riga["citta"];
                        $superficie = $riga["superficie"];
                        $prezzo = $riga["prezzo"];

                        

                        ?> 
                        <div class="contenuto">
                        <div class="contenuto__item__text">
                            <?php
                                    // echo"<h2><u>$locali a $citta via $via $civico</u></h2>";
                                    echo"<h2>trilocale a lesmo via roma 3</u></h2>";
                                    echo"
                                    <input type='button' value='aggiungi ai preferiti' name='preferito'>
                                    <table>
                                    <tr>
                                        <td><h3>prezzo</h3></td>
                                        <td><h3>superficie</h3></td>
                                        <td><h3>piani</h3></td>
                                        <td><h3>matricola</h3></td>
                                    </tr>
                                    <tr>
                                        <td><h3>".$prezzo."</h3></td>
                                        <td><h3>".$superficie."</h3></td>
                                        <td><h3>".$n_piani."</h3></td>
                                        <td><h3>".$matricola."</h3></td>
                                    </tr>
                                </table>";
                                ?>
                            </div> 
                            <?php
                            $sql2 = "SELECT path
                                FROM immagini JOIN immobile ON immobile.matricola=immagini.matricola
                                WHERE citta='".$citta."'";  //poi dovrò scrivere or prezzo=prezzo
                                ?>
                        
                        <div class="contenuto__item__img item50">
                                <?php
                                    $ris2 = $conn->query($sql2) or die("<p>Query fallita!</p>");
                                    echo " <div class='owl-carousel owl-theme' >";
                                    if ($ris2->num_rows > 0){
                                        foreach($ris2 as $riga2){
                                            $path=$riga2["path"];
                                            
                                            echo "<div class='item' ><img src=".$path." ></div>";
                                        }
                                    }
                                    
                                }           
        ?>
            
			
			
    
</body>
</html>