<!DOCTYPE html>

<html lang="en">

  <head>
    <!-- Title -->
    <title>Good bye | Online Biblioteka</title>
    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="{{asset('library-favicon.ico')}}">
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
          <p>&mdash; <a href="https://github.com/ca-tim4-22/library" target="_blank"><span>[nullable]</span></a> tim</p>
          <img src="{{asset('good_bye/img/good-bye-rocket.gif')}}" alt="Good Bye!" title="Good Bye!">
      </div>
      <a href="{{route('redirect')}}">Početna stranica</a>
  </article>

</body>

</html>