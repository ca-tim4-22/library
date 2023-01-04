@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Vraćene knjige | Online biblioteka</title>

@endsection

@section('content')
{{-- Preloader --}}
<link rel="stylesheet" href="{{asset('preloader/preloader2.css')}}">
<script src="{{asset('preloader/preloader2.js')}}"></script>
{{-- Search --}}
<script src="{{asset('js/search-jquery.js')}}"></script>

<!-- Content -->
<body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500"
      onload="myFunction()">
<section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
    <!-- Heading of content -->
    <div class="heading mt-[7px]" style="margin-top: 11px">
        <h1 style="font-size: 30px"
            class="pl-[30px] pb-[21px] border-b-[1px] border-[#e4dfdf] ">
            Vraćene knjige
        </h1>
    </div>

    <div class="flex items-center px-6 py-4 space-x-3 rounded-lg ml-[292px]">
        <div class="flex items-center">
            <div class="relative text-gray-600 focus-within:text-gray-400">
                <input type="search" id="myInput"
                       class="py-2 pl-2 text-sm bg-white border-2 border-gray-200 rounded-md focus:outline-none focus:bg-white focus:text-gray-900"
                       placeholder="{{__('Traži..')}}" autocomplete="off">
            </div>
        </div>
    </div>

    {{-- Books side --}}
    <x-books.book_side></x-books.book_side>

    <div class="w-full mt-[10px] ml-2 px-2">

        {{-- Preloader --}}
        <div id="loader2"></div>
        <div style="display:none;" id="myDiv2">
            @if ($data != 'no-values')

            <table class="shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf]"
                   id="sort">

                {{-- Session message for return book --}}
                @if (session()->has('return-success'))
                <div id="hideDiv2"
                     class="flex p-4 mt-4 mb-4 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800"
                     role="alert">
                    <svg aria-hidden="true"
                         class="flex-shrink-0 inline w-5 h-5 mr-3"
                         fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Uspješno!</span>
                        {{session('return-success')}}
                    </div>
                </div>
                @endif

                <thead class="bg-[#EFF3F6]">

                <tr class="border-b-[1px] border-[#e4dfdf]">
                    <th class="px-4 py-4 leading-4 tracking-wider text-left"
                        id="arrow">
                        Naziv knjige
                    </th>

                    <!-- Izdato uceniku + dropdown filter for ucenik -->
                    <td
                            class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer uceniciDrop-toggle">
                        <span style="font-weight: bold">Izdato učeniku</span><i
                                class="ml-2 fas fa-filter"></i>
                        <div id="uceniciDropdown"
                             class="uceniciMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300">
                            <ul class="border-b-2 border-gray-300 list-reset">
                                <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                    <input
                                            class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                            placeholder="{{__('Traži..')}}"
                                            onkeyup="filterFunction('searchUcenici', 'uceniciDropdown', 'dropdown-item-ucenik')"
                                            id="searchUcenici"><br>
                                    <button
                                            class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </li>
                                <div class="h-[200px] scroll font-normal">
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-ucenik">
                                        <label class="flex items-center justify-start">
                                            <div
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox"
                                                       class="absolute opacity-0">
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px"
                                             class="ml-[15px] rounded-full"
                                             src="img/profileStudent.jpg">
                                        <p
                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            Ucenik Ucenikovic
                                        </p>
                                    </li>
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-ucenik">
                                        <label class="flex items-center justify-start">
                                            <div
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox"
                                                       class="absolute opacity-0">
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px"
                                             class="ml-[15px] rounded-full"
                                             src="img/profileStudent.jpg">
                                        <p
                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            Pero Perovic
                                        </p>
                                    </li>
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-ucenik">
                                        <label class="flex items-center justify-start">
                                            <div
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox"
                                                       class="absolute opacity-0">
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px"
                                             class="ml-[15px] rounded-full"
                                             src="img/profileStudent.jpg">
                                        <p
                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            Marko Markovic
                                        </p>
                                    </li>
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-ucenik">
                                        <label class="flex items-center justify-start">
                                            <div
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox"
                                                       class="absolute opacity-0">
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px"
                                             class="ml-[15px] rounded-full"
                                             src="img/profileStudent.jpg">
                                        <p
                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            Nikola Nikolic
                                        </p>
                                    </li>
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-ucenik">
                                        <label class="flex items-center justify-start">
                                            <div
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox"
                                                       class="absolute opacity-0">
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px"
                                             class="ml-[15px] rounded-full"
                                             src="img/profileStudent.jpg">
                                        <p
                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            Zivko Zivkovic
                                        </p>
                                    </li>
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-ucenik">
                                        <label class="flex items-center justify-start">
                                            <div
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox"
                                                       class="absolute opacity-0">
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px"
                                             class="ml-[15px] rounded-full"
                                             src="img/profileStudent.jpg">
                                        <p
                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            Petar Petrovic
                                        </p>
                                    </li>
                                </div>
                            </ul>
                            <div class="flex pt-[10px] text-white ">
                                <a href="#"
                                   class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                    Sačuvaj <i
                                            class="fas fa-check ml-[4px]"></i>
                                </a>
                                <a href="#"
                                   class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Poništi <i
                                            class="fas fa-times ml-[4px]"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                    <!-- Datum izdavanja + dropdown filter for date -->
                    <td
                            class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">
                        <span style="font-weight: bold"> Datum izdavanja</span><i
                                class="fas fa-filter"></i>
                        <div id="datumDropdown"
                             class="datumMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-l border-2 border-gray-300">
                            <div
                                    class="flex justify-between flex-row p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                <div>
                                    <label class="font-medium text-gray-500">Period
                                        od:</label>
                                    <input type="date"
                                           class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                </div>
                                <div class="ml-[50px]">
                                    <label class="font-medium text-gray-500">Period
                                        do:</label>
                                    <input type="date"
                                           class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                </div>
                            </div>
                            <div class="flex pt-[10px] text-white ">
                                <a href="#"
                                   class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                    Sačuvaj <i
                                            class="fas fa-check ml-[4px]"></i>
                                </a>
                                <a href="#"
                                   class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Poništi <i
                                            class="fas fa-times ml-[4px]"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                    <!-- Datum vracanja + dropdown filter for date -->
                    <td
                            class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer vracanjeDrop-toggle">
                        <span style="font-weight: bold">Datum vraćanja</span><i
                                class="fas fa-filter"></i>
                        <div id="vracanjeDropdown"
                             class="vracanjeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] right-0 border-2 border-gray-300">
                            <div
                                    class="flex justify-between flex-row p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                <div>
                                    <label class="font-medium text-gray-500">Period
                                        od:</label>
                                    <input type="date"
                                           class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                </div>
                                <div class="ml-[50px]">
                                    <label class="font-medium text-gray-500">Period
                                        do:</label>
                                    <input type="date"
                                           class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                </div>
                            </div>
                            <div class="flex pt-[10px] text-white ">
                                <a href="#"
                                   class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                    Sačuvaj <i
                                            class="fas fa-check ml-[4px]"></i>
                                </a>
                                <a href="#"
                                   class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Poništi <i
                                            class="fas fa-times ml-[4px]"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                    <!-- Zadrzavanje knjige + dropdown filter for date -->
                    <td
                            class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer zadrzavanjeDrop-toggle">
                        <span style="font-weight: bold">Zadržavanje knjige</span>
                        <i class="fas fa-filter"></i>
                        <div id="zadrzavanjeDropdown"
                             class="zadrzavanjeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] right-0 border-2 border-gray-300">
                            <div
                                    class="flex justify-between flex-row p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                <div>
                                    <label class="font-medium text-gray-500">Period
                                        od:</label>
                                    <input type="date"
                                           class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                </div>
                                <div class="ml-[50px]">
                                    <label class="font-medium text-gray-500">Period
                                        do:</label>
                                    <input type="date"
                                           class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                </div>
                            </div>
                            <div class="flex pt-[10px] text-white ">
                                <a href="#"
                                   class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                    Sačuvaj <i
                                            class="fas fa-check ml-[4px]"></i>
                                </a>
                                <a href="#"
                                   class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Poništi <i
                                            class="fas fa-times ml-[4px]"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                    <!-- Knjigu izdao + dropdown filter for bibliotekari -->
                    <td
                            class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer bibliotekariDrop-toggle">
                        <span style="font-weight: bold">Knjigu izdao</span><i
                                class="fas fa-filter"></i>
                        <div id="bibliotekariDropdown"
                             class="bibliotekariMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] right-0 border-2 border-gray-300">
                            <ul class="border-b-2 border-gray-300 list-reset">
                                <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                    <input
                                            class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                            placeholder="{{__('Traži..')}}"
                                            onkeyup="filterFunction('searchBibliotekari', 'bibliotekariDropdown', 'dropdown-item-bibliotekar')"
                                            id="searchBibliotekari"><br>
                                    <button
                                            class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </li>
                                <div class="h-[200px] scroll font-normal">
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-bibliotekar">
                                        <label class="flex items-center justify-start">
                                            <div
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox"
                                                       class="absolute opacity-0">
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px"
                                             class="ml-[15px] rounded-full"
                                             src="img/profileExample.jpg">
                                        <p
                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            Bibliotekar Bulatovic
                                        </p>
                                    </li>
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-bibliotekar">
                                        <label class="flex items-center justify-start">
                                            <div
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox"
                                                       class="absolute opacity-0">
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px"
                                             class="ml-[15px] rounded-full"
                                             src="img/profileExample.jpg">
                                        <p
                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            Pero Perovic
                                        </p>
                                    </li>
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-bibliotekar">
                                        <label class="flex items-center justify-start">
                                            <div
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox"
                                                       class="absolute opacity-0">
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px"
                                             class="ml-[15px] rounded-full"
                                             src="img/profileExample.jpg">
                                        <p
                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            Marko Markovic
                                        </p>
                                    </li>
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-bibliotekar">
                                        <label class="flex items-center justify-start">
                                            <div
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox"
                                                       class="absolute opacity-0">
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px"
                                             class="ml-[15px] rounded-full"
                                             src="img/profileExample.jpg">
                                        <p
                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            Nikola Nikolic
                                        </p>
                                    </li>
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-bibliotekar">
                                        <label class="flex items-center justify-start">
                                            <div
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox"
                                                       class="absolute opacity-0">
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px"
                                             class="ml-[15px] rounded-full"
                                             src="img/profileExample.jpg">
                                        <p
                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            Zivko Zivkovic
                                        </p>
                                    </li>
                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-bibliotekar">
                                        <label class="flex items-center justify-start">
                                            <div
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                <input type="checkbox"
                                                       class="absolute opacity-0">
                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                     viewBox="0 0 20 20">
                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z"/>
                                                </svg>
                                            </div>
                                        </label>
                                        <img width="40px" height="30px"
                                             class="ml-[15px] rounded-full"
                                             src="img/profileExample.jpg">
                                        <p
                                                class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                            Petar Petrovic
                                        </p>
                                    </li>
                                </div>
                            </ul>
                            <div class="flex pt-[10px] text-white ">
                                <a href="#"
                                   class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                    Sačuvaj <i
                                            class="fas fa-check ml-[4px]"></i>
                                </a>
                                <a href="#"
                                   class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Poništi <i
                                            class="fas fa-times ml-[4px]"></i>
                                </a>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-4"></td>
                </tr>
                </thead>

                <tbody id="tablex">

                @foreach ($data->get() as $book)

                <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                    <td class="flex flex-row items-center px-4 py-3">
                        <img
                                class="object-cover w-8 mr-2 h-11"
                                src="{{$book->rent->book->placeholder == 1 ? $book->rent->book->cover->photo : '/storage/book-covers/' . $book->rent->book->cover->photo}}"
                                alt="Naslovna fotografija"
                                title="Naslovna fotografija"/>
                        <a href="{{route('show-book', $book->rent->book->title)}}">
                            <span class="font-medium text-center">{{$book->rent->book->title}}</span>
                        </a>
                    </td>
                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                        {{$book->rent->borrow->name}}
                    </td>
                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                        @php
                        echo date("d-m-Y", strtotime($book->rent->issue_date));
                        @endphp
                    </td>
                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                        @php
                        echo date("d-m-Y", strtotime($book->rent->return_date));
                        @endphp
                    </td>

                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                        <div>
                                            <span>
                                            @php
                                            $datetime1 = new DateTime(($book->rent->issue_date));
                                            $datetime2 = new DateTime(($book->rent->return_date));
                                            $interval = $datetime1->diff($datetime2);
                                            echo '<span style="color: #2A4AB3">' .  $interval->format('%a dana')  .'</span>';
                                            @endphp
                                            </span>
                        </div>
                    </td>
                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                        {{$book->rent->librarian->name}}
                    </td>
                    <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                        <p
                                class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsVraceneKnjige hover:text-[#606FC7]">
                            <i class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 vracene-knjige">
                            <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                 aria-labelledby="headlessui-menu-button-1"
                                 id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <a href="{{route('returned-info', $book->rent->id)}}"
                                       tabindex="0"
                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                       role="menuitem">
                                        <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Pogledaj detalje</span>
                                    </a>

                                    <a href="{{route('rent-book', $book->rent->book->title)}}"
                                       tabindex="0"
                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                       role="menuitem">
                                        <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Izdaj knjigu</span>
                                    </a>

                                    <a href="{{route('write-off', $book->rent->book->title)}}"
                                       tabindex="0"
                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                       role="menuitem">
                                        <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Otpiši knjigu</span>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>

            {{--
            <script src="https://cdn.tailwindcss.com"></script>
            <div class="m-4">{!! $paginate->links() !!}</div>
            --}}

            @else

            <div class="mx-[50px]">
                <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">
                    <svg viewBox="0 0 24 24"
                         class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                        <path fill="currentColor"
                              d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                        </path>
                    </svg>
                    <p class="font-medium text-white">Trenutno nema vraćenih
                        knjiga! </p>
                </div>
            </div>
            @endif
        </div>
    </div>
    </div>

    </div>
</section>

<!-- End Content -->
</main>
<!-- End Main content -->

@endsection

