<html>
    <head>
        <!-- Title -->
        <title>Nije dostupno - Online Biblioteka</title>
        <!-- Icon -->
        <link rel="icon" type="image/x-icon" href="{{asset('library-favicon.ico')}}">
        <!-- Meta -->
        <x-meta></x-meta>
        <!-- Style -->
        <link rel="stylesheet" href="{{asset('maintenance/style/style.css')}}">
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
                <button type="button" onClick="showAlert()">Saznajte još</button>
            </div>
            <img src="https://i.postimg.cc/PfwZ6bDk/rocket.png" class="rocket">
        </div>
    </body>
</html>

<script src="{{asset('maintenance/js/maintenance.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function showAlert() {
        let timerInterval
Swal.fire({
  title: 'Online Biblioteka će uskoro biti dostupna! Stay tuned:)',
  timer: 1800,
  timerProgressBar: true,
  didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('Zatvoren sam uz pomoć tajmera!')
  }
})
}
</script>
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
