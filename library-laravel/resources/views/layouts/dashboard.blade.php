<!DOCTYPE html>

<html lang="en">

<head>
    
    <!-- Title -->
    @yield('title')

    <!-- Icon -->
    <link rel="shortcut icon" href="{{asset('library-favicon.ico')}}" type="image/vnd.microsoft.icon" />

    <!-- Meta -->
    <x-meta></x-meta>

    <!-- Styles -->
    <x-styles></x-styles>
        
</head>

<body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500" onload="myFunction()">

    <x-header></x-header>
    
    <x-sidebar></x-sidebar>
    
    <!-- Main content -->
    <main class="flex flex-row small:hidden">
        
    @yield('content')
    
    </main>
    <!-- End Main content -->

    <!-- Notification for small devices -->
    <x-inProgress></x-inProgress>

    <!-- Scripts -->
    <x-scripts></x-scripts>

</body>

</html>