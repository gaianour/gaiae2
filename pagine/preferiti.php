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

    $conn = new mysqli($host,$user,$password_database,$database);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['preferito'])){
			$preferiti = $_POST['preferito'];
		} else {
			$preferiti = array();
		}
		foreach($preferiti as $riga) {
  		
  			$sql = "UPDATE libri               
  					SET username_utente = '$username'
  					WHERE cod_libro = '$libro'";
			$conn->query($sql) or die("<p>Query fallita!</p>");
		}
	}

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
            
			
			
    
</body>
</html>