<!DOCTYPE html>

<html lang="en">

  <head>
    <!-- Title -->
    <title>Good Bye | Online Biblioteka</title>
    <!-- Icon -->
    <link rel="shortcut icon" href="{{asset('img/library-favicon.ico')}}" type="image/vnd.microsoft.icon" />
    <!-- Meta -->
    <x-meta></x-meta>
    <!-- Style -->
    <link rel="stylesheet" href="{{asset('good_bye/style/style.css')}}">
    <!-- Font Awesome -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  </head>
  
<body>
  
  <article>

      <h1>Žao nam je što odlazite!</h1>
      <div>
          <p>&mdash; <span>[nullable]</span> tim</p>
          <img src="{{asset('good_bye/img/good-bye-rocket.gif')}}" alt="Good Bye!" title="Good Bye!">
      </div>
      <a href="{{route('redirect')}}">Početna stranica</a>
  </article>

</body>

</html>