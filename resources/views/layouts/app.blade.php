<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Title --}}
    <title>{{__('Online biblioteka')}}</title>

    {{-- Icon --}}
    <link rel="icon" type="image/x-icon"
          href="{{ asset('library-favicon.ico') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito"
          rel="stylesheet">

    {{-- Vite slow loading --}}
    {{-- <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
</head>
<body>
<div id="app">
    <nav style="background: #F0F0F0" class="shadow-sm navbar navbar-expand-md navbar-light">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{__('Online biblioteka')}}
            </a>
            <button class="navbar-toggler" type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>
                <form class="flex" method="get"
                action="{{ route('changeLang') }}">
              <button class="outline-none" name="lang" type="submit"
                      value="sr" {{ session()->get('locale') == 'sr' ?
                  'selected' : '' }}>
                  <img width="25"
                       src="https://cdn.countryflags.com/thumbs/serbia/flag-round-250.png"
                       alt="{{__('Srpski')}}" title="{{__('Srpski')}}">
              </button>

              <button class="ml-3 outline-none" name="lang" type="submit"
                      value="en" {{ session()->get('locale') == 'en' ?
                  'selected' : '' }}>
                  <img width="25"
                       src="https://vectorflags.s3.amazonaws.com/flags/uk-circle-01.png"
                       alt="{{__('Engleski')}}"
                       title="{{__('Engleski')}}">
              </button>

              <button class="ml-3 outline-none" name="lang" type="submit"
                      value="it" {{ session()->get('locale') == 'it' ?
                  'selected' : '' }}>
                  <img width="25"
                       src="https://cdn.countryflags.com/thumbs/italy/flag-round-250.png"
                       alt="{{__('Italijanski')}}"
                       title="{{__('Italijanski')}}">
              </button>

              <button class="ml-3 outline-none" name="lang" type="submit"
                      value="fr" {{ session()->get('locale') == 'fr' ?
                  'selected' : '' }}>
                  <img width="25"
                       src="https://cdn-icons-png.flaticon.com/512/197/197560.png"
                       alt="{{__('Francuski')}}"
                       title="{{__('Francuski')}}">
              </button>

              <button class="ml-3 outline-none" name="lang" type="submit"
                      value="zh" {{ session()->get('locale') == 'zh' ?
                  'selected' : '' }}>
                  <img width="25"
                       src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Circle_Flag_of_the_People%27s_Republic_of_China.svg/2048px-Circle_Flag_of_the_People%27s_Republic_of_China.svg.png"
                       alt="{{__('Kineski')}}" title="{{__('Kineski')}}">
              </button>

              <button class="ml-3 outline-none" name="lang" type="submit"
                      value="ru" {{ session()->get('locale') == 'ru' ?
                  'selected' : '' }}>
                  <img width="25"
                       src="https://cdn.countryflags.com/thumbs/russia/flag-round-250.png"
                       alt="{{__('Ruski')}}" title="{{__('Ruski')}}">
              </button>

              <button class="ml-3 outline-none" name="lang" type="submit"
                      value="hi" {{ session()->get('locale') == 'hi' ?
                  'selected' : '' }}>
                  <img width="25"
                       src="https://cdn-icons-png.flaticon.com/512/197/197419.png"
                       alt="{{__('Hindi')}}" title="{{__('Hindi')}}">
              </button>
          </form>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{
                            __('Uloguj se') }}</a>
                    </li>
                    @endif

                    @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{
                            __('Registruj se') }}</a>
                    </li>
                    @endif
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle"
                           href="#" role="button" data-bs-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end"
                             aria-labelledby="navbarDropdown">
                            <a class="dropdown-item"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Odjavi se') }}
                            </a>

                            <form id="logout-form"
                                  action="{{ route('logout') }}" method="POST"
                                  class="d-none">
                                @csrf @honeypot
                            </form>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

<style>
    button {
        border: none;
    }
</style>

</html>
