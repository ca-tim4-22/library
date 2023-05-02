<html>
<head>
    <title>{{__('Nedostupno | Online biblioteka')}}</title>
    <link rel="icon" type="image/x-icon"
          href="{{asset('library-favicon.ico')}}"/>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0"/>
    <meta http-equiv="content-language" content="en"/>
    <meta name="author" content="tim nullable()"/>
    <meta name="description"
          content="Online biblioteka - projekat namijenjen srednjoškolcima..."/>
    <meta name="keywords"
          content="ict cortex, cortex, coinis, srednjoškolci, učenici, programiranje, kodiranje, biblioteka"/>
    <meta name="theme-color" content="#D22336"/>
    <link rel="stylesheet" href="{{asset('maintenance/style/style.css')}}"/>
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="background">
<div class="container">
    @php
    $URL = url()->current();
    @endphp

    @if (!str_contains($URL, 'tim7'))
    <a href="http://127.0.0.1:8000"> <img src="{{asset('library-favicon.ico')}}"
                                          class="logo no-select"/> </a>
    @else
    <a href="https://tim7.ictcortex.me/"> <img
                src="{{asset('library-favicon.ico')}}" class="logo no-select"/>
    </a>
    @endif

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
    <img src="https://i.postimg.cc/PfwZ6bDk/rocket.png" class="rocket"/>
</div>
</body>
<script>
    var countDownDate = new Date("October 6, 2022 10:00:00").getTime(),
        x = setInterval(function () {
            var e = new Date().getTime(),
                t = countDownDate - e;
            (document.getElementById("days").innerHTML = Math.floor(t / 864e5)),
                (document.getElementById("hours").innerHTML = Math.floor((t % 864e5) / 36e5)),
                (document.getElementById("minutes").innerHTML = Math.floor((t % 36e5) / 6e4)),
                (document.getElementById("seconds").innerHTML = Math.floor((t % 6e4) / 1e3)),
            t < 0 &&
            (clearInterval(x),
                (document.getElementById("days").innerHTML = "00"),
                (document.getElementById("hours").innerHTML = "00"),
                (document.getElementById("minutes").innerHTML = "00"),
                (document.getElementById("seconds").innerHTML = "00"));
        }, 1e3);

    function showAlert() {
        let e;
        Swal.fire({
            title: "@lang('Online biblioteka će uskoro biti dostupna! Stay tuned:)')",
            timer: 1800,
            timerProgressBar: !0,
            didOpen() {
                Swal.showLoading();
                let t = Swal.getHtmlContainer().querySelector("b");
                e = setInterval(() => {
                    t.textContent = Swal.getTimerLeft();
                }, 100);
            },
            willClose() {
                clearInterval(e);
            },
        }).then((e) => {
        });
    }
</script>
</html>
