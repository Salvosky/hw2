<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>ScuoleItalia</title>
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="searchschool.css">
        <script src="university.js" defer></script>
        <script src="searchschool.js" defer></script>
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
            <h1><strong>ScuoleItalia</strong></h1>
        </header>
        <section>
            <h1>Scuole presenti nel sito</h1>
            <div id="research_box">
                <form name="research" method="get">
                    <h2>Filtra per nome:</h2><input type='text' name="schoolname">
                    <input type='submit' value='Cerca'>
                </form>
            </div>
            <div id="result_box"></div>
            <div class="hidden" id="details"></div>
        </section>
        <footer>
            <address>ScuoleItalia.net ?? un progetto a cura di</address> 
            <p>Ferula Salvatore</p>
            <div>
                della facolt?? di ingegneria informatica della
                <a></a>
                , matricola O46002233
            </div>
        </footer>
    </body>
</html>