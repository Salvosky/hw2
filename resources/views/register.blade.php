<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>ScuoleItalia</title>
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="register.css">
        <script src="university.js" defer></script>
        <script src="register_page.js" defer></script>
    </head>
    <body>
        <header>
            <nav>
                <div id="home"><a href="homepage">Home</a></div>
                <div class="section">
                    <a href="searchschool">Cerca scuola</a>
                    <a href="your_school">La tua scuola</a>
                    <a href="profile">Profilo</a>
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
                <a href="profile">Profilo</a>
            </div>
            <h1><strong>ScuoleItalia</strong></h1>
        </header>
        <section>
        <div class="hidden" id="error"><p></p></div>
        @if(isset($error))
        <p>Username già usato da un altro utente, riprovare</p>
        @endif
            <div class="title">Registrazione</div>
            <div id="register">
                <form name="register" method="post">
                    <label>Inserisci Username<input type="text" name="username"></label>
                    <label>Inserisci Nome<input type="text" name="nome"></label>
                    <label>Inserisci Cognome<input type="text" name="cognome"></label>
                    <label>Inserisci Codice Fiscale<input type="text" name="cf"></label>
                    <label>Inserisci Password<input type="password" name="password"></label>
                    <label>Conferma Password<input type="password" name="confirm"></label>
                    <input type="hidden" name="_token" value='{{ csrf_token() }}'>
                    <label><strong>Accetto i termini e le condizioni d'uso</strong><input type="checkbox" name="check"></label>
                    <label><span></span><input type="submit" name="submit" value="Registrati">
                </form>
            </div>
            <div class="text">La password deve contenere almeno una maiuscola ed un numero, e deve essere almeno di 8 caratteri</div>
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