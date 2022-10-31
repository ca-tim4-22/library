<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Title -->
    @yield('title')
    <!-- Icon -->
    <link rel="icon" type="image/x-icon" href="{{asset('library-favicon.ico')}}">
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=0"/>
    <meta http-equiv="content-language" content="en" />
    <meta name="author" content="tim nullable()" />
    <meta name="description" content="Online Biblioteka - projekat namijenjen srednjoškolcima..." />
    <meta name="keywords" content="ict cortex, cortex, coinis, srednjoškolci, učenici, programiranje, kodiranje, biblioteka" />
    <meta name="theme-color" content="#D22336">
    <!-- End Meta -->
    <!-- Styles -->
    {{-- Main style --}}
    <link rel="stylesheet" href="{{asset('css/default/style.css')}}">
    {{-- Sorting --}}
    <link rel="stylesheet" href="{{asset('css/sorting/sorting.css')}}">
    {{-- Font awesome v.5.15. --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    {{-- Preloader --}}
    <link rel="stylesheet" href="{{asset('preloader/preloader.css')}}">
    {{-- JQuery CDN --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
</head>
<body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
    @php 
    $count = $notifications;
    @endphp
    {{-- Header component --}}
    <x-header :count="$count"/>
    {{-- Sidebar component --}}
    <x-sidebar></x-sidebar>
    <!-- Main content -->
    <main class="flex flex-row small:hidden">
    @yield('content')
    </main>
    <!-- End Main content -->
    <!-- Notification for small devices -->
    <div class="py-[20px] hidden small:block bg-gradient-to-r from-red-500 mt-[100px]">
        <h1 class="text-[40px] font-medium text-center text-white">
            Trenutno nedostupno...
        </h1>
        <p class="text-[17px] text-white text-center">
            Molimo Vas da koristite veću rezoluciju.
        </p>
    </div>
    <!-- Scripts -->
    {{-- Main script --}}
    <script src="{{asset('js/app.js')}}"></script>
    {{-- Sorting  --}}
    <script src="{{asset('js/sorting-jquery.js')}}"></script>
    {{-- Session message fade out --}}
    <script src="{{asset('js/session_message_jquery.js')}}"></script>
</body>
</html>