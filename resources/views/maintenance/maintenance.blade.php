<html>
    <head>
        <!-- Title -->
        <title>Nije dostupno - Online Biblioteka</title>
        <!-- Icon -->
        <link rel="icon" type="image/x-icon" href="{{asset('library-favicon.ico')}}">
        <!-- Meta -->
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0" />
        <meta http-equiv="content-language" content="en" />
        <meta name="author" content="tim nullable()" />
        <meta name="description" content="Online Biblioteka - projekat namijenjen srednjoškolcima..." />
        <meta name="keywords" content="ict cortex, cortex, coinis, srednjoškolci, učenici, programiranje, kodiranje, biblioteka" />
        <meta name="theme-color" content="#D22336">
        <!-- Style -->
        <link rel="stylesheet" href="{{asset('maintenance/style/style.css')}}">
        <!-- Animate CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    </head>
    <body class="background">
        <div class="container">
            <a href="http://127.0.0.1:8000">
            <img 
            src="{{asset('library-favicon.ico')}}" 
            class="logo no-select">
            </a>
            <div class="content">
                <p>Online biblioteka još uvijek nije dostupna</p>
                <h1>We're <span>Launching</span> Soon</h1>
                <div class="launch-time">
                    <div>
                        <p id="days">00</p>
                        <span>Dana</span>
                    </div>
                    <div>
                        <p id="hours">00</p>
                        <span>Sati</span>
                    </div>
                    <div>
                        <p id="minutes">00</p>
                        <span>Minuta</span>
                    </div>
                    <div>
                        <p id="seconds">00</p>
                        <span>Sekundi</span>
                    </div>
                </div>
                <button type="button" onClick="showAlert()">Saznajte više</button>
            </div>
            <img src="https://i.postimg.cc/PfwZ6bDk/rocket.png" class="rocket">
        </div>
    </body>
</html>

<script src="{{asset('maintenance/js/maintenance.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

