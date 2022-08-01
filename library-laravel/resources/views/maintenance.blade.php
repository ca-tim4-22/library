<html>
    <head>
        <!-- Title -->
        <title>Maintenance - Online Biblioteka</title>
        <!-- Icon -->
        <link rel="shortcut icon" href="{{asset('img/library-favicon.ico')}}" type="image/vnd.microsoft.icon" />
        <!-- Meta -->
        <x-meta></x-meta>
        <!-- Style -->
        <link rel="stylesheet" href="{{asset('maintenance/style/style.css')}}">
    </head>
    <body class="background">
        <div class="container">
            <a href="http://127.0.0.1:8000">
            <img 
            src="/img/library-favicon.ico" 
            class="logo">
            </a>
            <div class="content">
                <p>Library Is Under Maintenance</p>
                <h1>We're <span>Launching</span> Soon</h1>
                <div class="launch-time">
                    <div>
                        <p id="days">00</p>
                        <span>Days</span>
                    </div>
                    <div>
                        <p id="hours">00</p>
                        <span>Hours</span>
                    </div>
                    <div>
                        <p id="minutes">00</p>
                        <span>Minutes</span>
                    </div>
                    <div>
                        <p id="seconds">00</p>
                        <span>Seconds</span>
                    </div>
                </div>
                <button type="button" onClick="showAlert()">Learn More</button>
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
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
}
</script>
<link
rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
/>
