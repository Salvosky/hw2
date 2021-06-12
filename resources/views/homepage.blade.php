<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>ScuoleItalia</title>
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="homepage.css">
        <script src="university.js" defer></script>
        <script src="holidays.js" defer></script>
        <script src="notices.js" defer></script>
    </head>
    <body>
        <header>
            <nav>
                <div id="home"><a href="homepage">Home</a></div>
                <div class="section">
                    <a href="searchschool">Cerca scuola</a>
                    <a href="your_school">La tua scuola</a>
                    @if(isset($tipo))
                    <a href=valutazione>Voti</a>
                    @endif
                    <a href="profile">Profilo</a>
                    @if(isset($user))
                    <a href=logout>Esci</a>
                    @endif
                </div>
                <div id="mobile">
                    <div id="tendina">
                        <div class="icon"></div>
                        <div class="icon"></div>
                        <div class="icon"></div>
                    </div>
                </div>
            </nav>
            <div id="menutendina" class="hidden">
                <a href="searchschool">Cerca scuola</a>
                <a href="your_school">La tua scuola</a>
                @if(isset($tipo))
                <a href=valutazione>Voti</a>
                @endif
                <a href="profile">Profilo</a>
                @if(isset($user))
                <a href=logout>Esci</a>
                @endif
            </div>
            <h1><strong>Benvenuto sul portale di ScuoleItalia </br>
            @if(isset($user))
                {{ $user }}
            @endif
            </strong></h1>
        </header>
        <section>
            @if(!isset($tipo) && isset($user))
            <h3>Non risulti registrato nel database, contattare la scuola</h3>
            @endif
            <div class="hidden favourite">
                <h3>Notizie preferite</h3>
            </div>
            <h3>Notizie del giorno</h3>
            <div class="research">
                <h1>Cerca notizia</h1>
                <input type='text'>
                <h2>Cerca</h2>
            </div>
            <div class="general"></div>
            <div class="holidays">
                <h3>Giorni festivi</h3>
                <div class="researches">
                    <button id="ricercaNormale">Ricerca quest'anno</button>
                    <button id="ricercaConData">Ricerca anno specifico</button>
                    <input type='text'>
                </div>
                <div id="vacanze" class=hidden>
                    <div class="results"></div>
                </div>
            </div>
        </section>
        <footer>
            <address>ScuoleItalia.net è un progetto a cura di</address> 
            <p>Ferula Salvatore</p>
            <div>
                della facoltà di ingegneria informatica della
                <a></a>
                , matricola O46002233
            </div>
        </footer>
    </body>
</html>