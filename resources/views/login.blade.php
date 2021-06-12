<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>ScuoleItalia</title>
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="login.css">
        <script src="university.js" defer></script>
        <script src="login_page.js" defer></script>
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
        <div class="hidden" id="empty"><p>Inserire un valore in tutti i campi</p></div>
        <div class="title">Login</div>
            <div id="login">
                <form name="login" method="post" action="{{ route('authentification') }}">
                    <label>Username<input type="text" name="username"></label>
                    <label>Password<input type="password" name="password"></label>
                    <input name="_token" type="hidden" name="remember" value='{{ csrf_token() }}'>
                    <label><span></span><input type="submit" name="submit" value="login">
                </form>
            </div>
            <div id="register">Non hai un account? <a href="register">Registrati qui</a></div>
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