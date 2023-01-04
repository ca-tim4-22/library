<!DOCTYPE html>
<html lang="en">
<head><title>Uloguj se - Online biblioteka</title>
    <link rel="icon" type="image/x-icon"
          href="{{asset('library-favicon.ico')}}">
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
    <meta name="theme-color" content="#D22336">
    <link rel="stylesheet" href="{{asset('css/default/style.css')}}">
    <style>a {
            text-decoration: none !important
        }

        .background {
            background-image: url("login.jpg");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat
        }

        .no-select {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }

        .transition-custom {
            transition: .25s ease-out
        }</style>
</head>
<body>{{-- Background photo customize /public/style.css --}}
<main class="h-screen small:hidden bg-login">
    <div class="flex items-center justify-center pt-[13%]">
        <div class="w-full max-w-md">
            <form class="px-12 pt-6 pb-4 mb-4 bg-white rounded shadow-lg"
                  method="POST" action="{{route('login')}}"> @csrf
                <div class="flex justify-center py-2 mb-4 text-2xl text-gray-800 border-b-2">
                    Online biblioteka <img height="5px" width="34px"
                                           class="ml-2"
                                           src="{{asset('library-favicon.ico')}}"
                                           alt="Online biblioteka"
                                           title="Online biblioteka"></div>
                <div class="mb-4"> @error('email') <span
                            style="color: #CD1A2B;font-size: 15px">{{$message}}</span>
                    @enderror <label for="email"
                                     class="block mt-2 mb-2 text-sm font-normal text-gray-700">
                        Email adresa </label> <input
                            class="w-full px-3 py-2 text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            id="email" name="email" v-model="form.email"
                            type="email" required autofocus
                            value="{{old('email')}}"
                            oninvalid="this.setCustomValidity('Unesite email adresu')"
                            oninput="setCustomValidity('')"/></div>
                <div class="mb-6"><label
                            class="block mb-2 text-sm font-normal text-gray-700"
                            for="password"> Lozinka </label> <input
                            class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            v-model="form.password" type="password"
                            name="password" id="password" required
                            oninvalid="this.setCustomValidity('Unesite lozinku')"
                            oninput="setCustomValidity('')" id="password"
                            autocomplete="current-password"/> <label
                            for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox"
                               class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                               name="remember"> <span
                                class="ml-2 text-sm text-gray-600 no-select">{{__('Zapamti')}}</span>
                    </label></div>
                <div class="flex items-center justify-between">
                    <button style="outline: none" type="submit"
                            class="inline-block px-4 py-2 text-white bg-blue-500 rounded shadow-lg btn-animation hover:bg-blue-600 focus:bg-blue-700"
                            type="submit">Uloguj se
                    </button>
                    @if (Route::has('password.request')) <a
                            class="inline-block text-sm font-normal text-black align-baseline transition-custom hover:text-blue-800 "
                            href="{{route( 'password.request')}}"> Zaboravili
                        ste lozinku? </a> @endif <a href="/sign-in/github"
                                                    class="inline-block px-4 py-2 text-white bg-blue-500 rounded shadow-lg btn-animation hover:bg-blue-600 focus:bg-blue-700"
                                                    type="submit">Pomoću
                        GitHub-a <img style="display: inline;margin-left: 5px"
                                      height="60px" width="20px"
                                      src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Octicons-mark-github.svg/2048px-Octicons-mark-github.svg.png"
                                      alt=""> </a></div>
                <p class="text-xs text-center mt-[30px] text-gray-500 "> &copy;
                    @php echo date('Y') @endphp ICT Cortex. Sva prava
                    zadržana. </p></form>
        </div>
    </div>
</main>
<div class="py-[20px] hidden small:block bg-gradient-to-r from-red-500 mt-[100px] ">
    <h1 class="text-[40px] font-medium text-center text-white "> Trenutno
        nedostupno... </h1>
    <p class="text-[17px] text-white text-center "> Molimo Vas da koristite veću
        rezoluciju. </p></div>
</body>
</html>