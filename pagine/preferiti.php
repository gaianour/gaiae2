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
<?php
			$conn = new mysqli($db_servername,$db_username,$db_password,$db_name);
			if($conn->connect_error){
				die("<p>connessione fallita, problema: ".$conn->connect_error."</p>");
			}

			$sql = "SELECT username, nome, cognome 
					FROM account
					WHERE username='$username'";
			//echo $sql;
			$ris = $conn->query($sql) or die("<p>Query fallita!</p>");
			foreach($ris as $riga){
				echo "<p>Benvenuto <b>".$riga["nome"]." ".$riga["cognome"]."</b></p>";
			}
		?>

    
</body>
</html>