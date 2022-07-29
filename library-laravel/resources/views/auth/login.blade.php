@extends('layouts.app')

<title>Uloguj se - Online Biblioteka</title>

{{-- Style --}}
<link rel="stylesheet" href="{{ asset('custom-style/style.css') }}">

<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="ICT Cortex Library - project for high school students..." />
    <meta name="keywords" content="ict cortex, cortex, coinis, highschool, students, coding" />
    <meta name="author" content="Coinis" />
    <!-- End Meta -->

    <!-- Styles -->
    <?php include('includes/layout/styles.php'); ?>
    <!-- End Styles -->
</head>

<body>
    <!-- Main content -->
    <main class="h-screen small:hidden bg-login">
        <div class="flex items-center justify-center pt-[13%]">
            <div class="w-full max-w-md">
                <form class="px-12 pt-6 pb-4 mb-4 bg-white rounded shadow-lg" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="flex justify-center py-2 mb-4 text-2xl text-gray-800 border-b-2">
                        Online Biblioteka 
                        <img height="5px" width="34px" class="ml-2" src="{{ asset('img/library-favicon.ico') }}" alt="">
                    </div>

                    <div class="mb-4">
                        @error('email')
                        <span style="color: #CD1A2B;font-size: 15px">{{$message}}</span>
                        @enderror
                    
                        <label for="email" class="block mt-2 mb-2 text-sm font-normal text-gray-700">
                            Email adresa
                        </label>
                        <input
                            class="w-full px-3 py-2 text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="email"
                            name="email" 
                            v-model="form.email" 
                            type="email" 
                            required 
                            autofocus 
                            value="{{ old('email') }}"/>
                    </div> 
                    
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-normal text-gray-700" for="password">
                            Lozinka
                        </label>
                        <input
                            class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            v-model="form.password" 
                            type="password" 
                            name="password" 
                            required
                            id="password"
                            autocomplete="current-password" />
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600 no-select">{{ __('Zapamti') }}</span>
                            </label>
                    </div>

                    <div class="flex items-center justify-between">

                        <button
                        type="submit"
                        class="inline-block px-4 py-2 text-white bg-blue-500 rounded shadow-lg btn-animation hover:bg-blue-600 focus:bg-blue-700
                        type="submit">Uloguj se</button>
                            
                    @if (Route::has('password.request'))
                    <a 
                    class="inline-block text-sm font-normal text-black align-baseline transition-custom hover:text-blue-800"
                    href="{{ route('password.request') }}">
                            Zaboravili ste lozinku?
                    </a>
                    @endif
                        
                    </div>
                    <p class="text-xs text-center mt-[30px] text-gray-500">
                        &copy; @php echo date('Y') @endphp ICT Cortex. All rights reserved.
                    </p>
                </form>

            </div>
        </div>
    </main>
    <!-- End Main content -->

    <!-- Notification for small devices -->
    <?php include('includes/layout/inProgress.php'); ?>

    <!-- Scripts -->
    <?php include('includes/layout/scripts.php'); ?>
    <!-- End Scripts -->

</body>

</html>



















