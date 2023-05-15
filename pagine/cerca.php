<?php
	session_start();
    $host= "localhost";
    $user= "root";
    $password_database= "";
    $database = "gaiae";

	
	$username = $_SESSION["username"];

	$conn = new mysqli($host,$user,$password_database,$database);
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if(isset($_POST['matricola'])){
			$immobile = $_POST['matricola'];
		} else {
			$immobile = array();
		}

		// foreach($libri as $libro) {
  		// 	$sql = "UPDATE libri
  		// 			SET username_utente = '$username'
  		// 			WHERE cod_libro = '$libro'";
		// 	$conn->query($sql) or die("<p>Query fallita!</p>");
		// }
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<title>Biblioteca - Ritira</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

		<h1 style="text-align: center; margin-top: 0px">Ricerca e ritiro dei libri</h1>
		<p>Cerca il libro che vuoi ritirare</p>
		<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
			<table>
				<tr>
					<td>città:</td> <td><input type="text" name="citta" value="<?php echo isset($_POST['citta']) ? $_POST['citta'] : ''; ?>"></td>
				</tr>
				<tr>
					<td>superficie:</td> <td><input class="superficie" type="text" name="superficie" value="<?php echo isset($_POST['superficie']) ? $_POST['superficie'] : ''; ?>"></td>
				</tr>
				<tr>
					<td>prezzo:</td> <td><input class="prezzo" type="text" name="prezzo" value="<?php echo isset($_POST['prezzo']) ? $_POST['prezzo'] : ''; ?>"></td>
				</tr>
				<tr>
					<td style="text-align: center; padding-top: 10px" colspan="2"><input type="submit" value="Cerca"/></td>
				</tr>
			</table>
		</form>

		<p></p>

		<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
			
				<?php
					if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["citta"]) and isset($_POST["superficie"]) and isset($_POST["prezzo"])) {
						$citta = $_POST["citta"];
						$superficie = $_POST["superficie"];
						$prezzo = $_POST["prezzo"];


						$sql = "SELECT matricola, citta, superficie, prezzo
								FROM immobile 
								WHERE citta LIKE '%$citta%'
									AND superficie LIKE '%$superficie%'
									AND prezzo LIKE '%$prezzo%'";

						$ris = $conn->query($sql) or die("<p>Query fallita!</p>");
						if ($ris->num_rows > 0) {
							echo "<p>Scegli tra le soluzioni trovate i libri da ritirare.</p>";
							echo "<table id='tabella_selezione_libri'>";
							echo "<tr> <th></th> <th>città</th> <th>superficie</th> <th>prezzo</th> </tr>";
						
							foreach($ris as $riga){
				
								$matricola = $riga["matricola"];
								$citta = $riga["citta"];
								$superficie = $riga["superficie"];
								$prezzo = $riga["prezzo"];
								
								echo '
										citta: '.$citta.'
										sup: '.$superficie.'
										prezzo: '.$prezzo.'
									';
							}
						}
						echo "</table>";
					}
					
	
				?>
				<p style="text-align: center; padding-top: 10px"><input type="submit" value="Conferma"/></p>
		</form>	

	</div>	
					
</body>
</html>
<?php
	$conn->close();
?>