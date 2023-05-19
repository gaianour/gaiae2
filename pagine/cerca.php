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
        //  $sql = "UPDATE libri
        //          SET username_utente = '$username'
        //          WHERE cod_libro = '$libro'";
        //  $conn->query($sql) or die("<p>Query fallita!</p>");
        // }
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <title>Cerca immobili</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
        <div class="flexbox">
            <div class="header__logo">GAIAE</div>
            <div class="header__nav">
                <ul>
                    <li>buy</li>
                    <li>rent</li>
                    <li>agent</li>
                    <li>about</li>
                </ul>
            </div>
            <div class="header__img"><img class="w100" src="./immagini/logo.jpg" alt=""></div>
            
        </div>
        
    </header>
        <h1 style="text-align: center; margin-top: 50px">Ricerca un immobile</h1>
        
        <form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>">
            <div class="barra__ricerca">
                città:<input type="text" name="citta" value="<?php echo isset($_POST['citta']) ? $_POST['citta'] : ''; ?>">
                superficie:<input class="superficie" type="text" name="superficie" value="<?php echo isset($_POST['superficie']) ? $_POST['superficie'] : ''; ?>">
                prezzo:<input class="prezzo" type="text" name="prezzo" value="<?php echo isset($_POST['prezzo']) ? $_POST['prezzo'] : ''; ?>">
                <input style="text-align: center; padding-top: 10px" colspan="2" type="submit" value="Cerca"/>
            </div>
                
        </form>

        <p></p>

        <form method="post" action="<?php $_SERVER['PHP_SELF'] ?>">
            
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST["citta"]) and isset($_POST["superficie"]) and isset($_POST["prezzo"])) {
                        $citta = $_POST["citta"];
                        $superficie = $_POST["superficie"];
                        $prezzo = $_POST["prezzo"];
                        // if ($prezzo == "") {
                        //  $prezzo = 0;
                        // }

                        // $sql = "SELECT matricola, citta, superficie, prezzo
                        //      FROM immobile 
                        //      WHERE citta LIKE '%$citta%'
                        //          AND superficie <= $superficie
                        //          AND prezzo <= $prezzo";
                        $sql = "SELECT matricola, citta, superficie, prezzo,immagini.path
                                FROM immobile JOIN immagini ON immobile.matricola=immagini.matricola
                                WHERE 1=1";

                        if ($citta != "") {
                            $sql = $sql." AND citta = '$citta'";
                        }
                        if ($superficie != "") {
                            $sql = $sql." AND superficie <= $superficie";
                        }
                        if ($prezzo != "") {
                            $sql = $sql." AND prezzo <= $prezzo";
                        }

                        $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
                        if ($ris->num_rows > 0) {
                            echo "<table id='tabella_selezione_libri'>";
                            echo "<tr> <th></th> <th>città</th> <th>superficie</th> <th>prezzo</th> </tr>";
                        
                            foreach($ris as $riga){
                
                                $matricola = $riga["matricola"];
                                $citta = $riga["citta"];
                                $superficie = $riga["superficie"];
                                $prezzo = $riga["prezzo"];
                                $path=$riga["path"];
                                
                                echo '
                                        citta: '.$citta.'
                                        sup: '.$superficie.'
                                        prezzo: '.$prezzo.'
                                        path:'.$path.'

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
<footer>
    <?php
        include('footer.php')
    ?>
</footer>
</html>
<?php
    $conn->close();
?>
