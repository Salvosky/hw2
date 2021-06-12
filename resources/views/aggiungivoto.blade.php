<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">
        <title>ScuoleItalia</title>
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="aggiungivoto.css">
        <script src="university.js" defer></script>
        <script src="addvote.js" defer></script>
    </head>
    <body>
        <header>
            <nav>
                <div id="home"><a href="homepage.php">Home</a></div>
                <div class="section">
                    <a href="searchschool.php">Cerca scuola</a>
                    <a href="your_school.php">La tua scuola</a>
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
                <a href="searchschool.php">Cerca scuola</a>
                <a href="your_school.php">La tua scuola</a>
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
            <h1>Aggiungi voto</h1>
            <div id="error" class="hidden">Inserire un valore in tutti i campi</div>
            @if(isset($error))
            <div id='errorinsert'>Errore nell'inserimento nel database, riprovare più tardi</div>
            @endif
            <form name="addvote" method="post" action="aggiungivoto/add">
            <label><span class="text">Alunno</span>
                <select name="alunno">
                <option>---Selezionare un alunno---</option>
                    @if(isset($result))
                    @foreach($result[0] as $alunno)
                    <option value="{{$alunno['Cf']}}">{{$alunno['Nome']}} {{$alunno['Cognome']}} {{$alunno['Cf']}}</option>
                    @endforeach
                    @endif
                </select>
            </label>
                <label>Materia
                    <select name="materie">
                    <option>---Inserisci Materia---</option>
                    @if(isset($result))
                    @foreach($result[1] as $materia)
                    <option value="{{$materia['nomemateria']}}">{{$materia['nomemateria']}}</option>                    
                    @endforeach
                    @endif
                    </select>
                </label>
                <label>Voto
                    <select name="vote">
                        <option value="0">0</option>
                        <option value="0.5">0.5</option>
                        <option value="1">1</option>
                        <option value="1.5">1.5</option>
                        <option value="2">2</option>
                        <option value="2.5">2.5</option>
                        <option value="3">3</option>
                        <option value="3.5">3.5</option>
                        <option value="4">4</option>
                        <option value="4.5">4.5</option>
                        <option value="5">5</option>
                        <option value="5.5">5.5</option>
                        <option value="6">6</option>
                        <option value="6.5">6.5</option>
                        <option value="7">7</option>
                        <option value="7.5">7.5</option>
                        <option value="8">8</option>
                        <option value="8.5">8.5</option>
                        <option value="9">9</option>
                        <option value="9.5">9.5</option>
                        <option value="10">10</option>
                    </select>
                </label> 
                <label>Data<input type="date" name="date"></label>
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="submit" value="Aggiungi">
            </form>
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