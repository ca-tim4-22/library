<!DOCTYPE html>

<html lang="en">

  <head>
    <!-- Title -->
    <title>Good bye | Online Biblioteka</title>
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
    <link rel="stylesheet" href="{{asset('good_bye/style/style.css')}}">
    <!-- Font Awesome -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  </head>
  
<body>
  
  <article>

      <h1>Žao nam je što odlazite!</h1>
      <div>
          <p>&mdash; <a href="https://perisicnikola37.github.io/nullable/" target="_blank"><span>[nullable]</span></a> tim</p>
          <img src="{{asset('good_bye/img/good-bye-rocket.gif')}}" alt="Good Bye!" title="Good Bye!">
      </div>
      <a href="{{route('redirect')}}">Početna stranica</a>
  </article>

  <link rel="stylesheet" href="{{asset('css/default/style.css')}}">
    <!-- Notification for small devices -->
    <div class="py-[20px] hidden small:block bg-gradient-to-r from-red-500 mt-[100px]">
      <h1 class="text-[40px] font-medium text-center text-white">
          Trenutno nedostupno...
      </h1>
      <p class="text-[17px] text-white text-center">
          Molimo Vas da koristite veću rezoluciju.
      </p>
  </div>

</body>

</html>