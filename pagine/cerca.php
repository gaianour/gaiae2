<?php
    session_start();
    $host= "localhost";
    $user= "root";
    $password_database= "";
    $database = "gaiae";

    if (isset($_SESSION["username"])) {
        $username = $_SESSION["username"];
    } else {
        $username = "";
    }
    

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <div class="barra__ricerca" style="display:flex; justify-content:center">
                    città:<input type="text" name="citta" value="<?php echo isset($_POST['citta']) ? $_POST['citta'] : ''; ?>">
                    superficie:<input class="superficie" type="text" name="superficie" value="<?php echo isset($_POST['superficie']) ? $_POST['superficie'] : ''; ?>">
                    prezzo:<input class="prezzo" type="text" name="prezzo" value="<?php echo isset($_POST['prezzo']) ? $_POST['prezzo'] : ''; ?>">
                    <input style="text-align: center; padding-top: 10px" colspan="2" type="submit" value="Cerca"/>
                </div>
                
        </form>
    

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
                        $sql = "SELECT immobile.matricola, citta, superficie, prezzo, path
                                FROM immobile JOIN immagini ON immobile.matricola=immagini.matricola
                                WHERE 1=1";

                        if ($citta != "") {
                            $sql = $sql." AND citta = '$citta'"; /* aggiunge AND citta alla query quandnil cmapo citta non è vuoto */
                        }
                        if ($superficie != "") {
                            $sql = $sql." AND superficie <= $superficie";
                        }
                        if ($prezzo != "") {
                            $sql = $sql." AND prezzo <= $prezzo";
                        }

                        echo $sql;

                        $ris = $conn->query($sql) or die("<p>Query fallita!</p>");
                        if ($ris->num_rows > 0) {
                            foreach($ris as $riga){
                                                
                                $matricola = $riga["matricola"];
                                $citta = $riga["citta"];
                                $superficie = $riga["superficie"];
                                $prezzo = $riga["prezzo"];
                                echo"
                                <p> la casa che hai scelto è a $citta</p>
                                    <p> la sua matricola è:$matricola</p>
                                    <p> il suo prezzo è:$prezzo</p> ";

                                $sql2 = "SELECT path
                                        FROM immagini JOIN immobile ON immobile.matricola=immagini.matricola
                                        WHERE citta='".$citta."'";  //poi dovrò scrivere or prezzo=prezzo

                                $ris2 = $conn->query($sql2) or die("<p>Query fallita!</p>");
                                echo " <div class='owl-carousel owl-theme' >";
                                if ($ris2->num_rows > 0){
                                    foreach($ris2 as $riga2){
                                        $path=$riga2["path"];
                                        
                                        echo "<div class='item' ><img src=".$path." ></div>";
                                    }
                                }

                            } // fine foreach
                            echo "</div>";
                        // } // fine if numrows 0
                        echo "</table>";
                    }
                    
                }
                ?>
                
        </form> 

    </div> 

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" 
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

         <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" 
         integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" 
         crossorigin="anonymous" referrerpolicy="no-referrer"></script>

         <script type="text/javascript">
             $('.owl-carousel').owlCarousel({
                 loop:true,
                 margin:30,
                 nav:true,
                 responsive:{
                     0:{
                         items:1
                     },
                     600:{
                         items:2
                     },
                     1000:{
                         items:3
                     }
                 }
             })
         </script>

                    
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
