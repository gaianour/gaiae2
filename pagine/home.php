<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>progetto Gaie</title>
    <link rel="stylesheet" href="style.css">
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
        <div><img class="copertina" src="../immagini/copertina.jpg" alt="immagine di copertina"></div>

        <div class="contenuto">
            <div class="contenuto__item">
                <div class="contenuto__item__img">
                    <img class="float-left" src="../immagini/index1.jpg" alt="immagine1">
                </div>
                <div class="contenuto__item__text">
                    <h3>Ricerca subito un immobile</h3>
                    <h4>Stai cercando casa? visita la sezione "cerca" del nostro sito per non perderti neanche una novità!</h4>
                </div>
            </div>

            <div class="contenuto__item">
                <div class="contenuto__item__img">
                    <img class="float-left" src="../immagini/mappa.jpg" alt="immagine2">
                </div>
                <div class="contenuto__item__text">
                    <h3>sei un babbpo</h3>
                    <h4>Registrandoti al nostro sito potrai scoprire nuove offerte di immobili ogni giorno. Condividi il nostro sito con i tuoi amici per avere sconti e offerte!</h4>
                </div>
            </div>

            <div class="contenuto__item item20">
                  <h4 class="citazione">“Se più persone considerassero la casa prima dell'oro, il mondo sarebbe un posto più felice.”</h4>
            </div>
        </div>

        <h2>Scopri alcune delle nostre migliori offerte</h2>
        <div class="contenuto">
            <div class="contenuto__item item30">
                
            </div>
        </div>

    </main>


</body>
<footer>
<?php
        include('footer.php')
    ?>
</footer>
</html>