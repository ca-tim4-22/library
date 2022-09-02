@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Aktivne rezervacije | Online Biblioteka</title>

@endsection

@section('content')

    <x-sidebar></x-sidebar>
    <!-- Main content -->
    <main class="flex flex-row small:hidden">

        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading mt-[7px]">
                <h1 class="pl-[30px] pb-[21px] border-b-[1px] border-[#e4dfdf] ">
                    Izdavanje knjiga
                </h1>
            </div>
           
             {{-- Books side --}}
             <x-books.book_side></x-books.book_side>

                        <div class="w-full mt-[10px] ml-2 px-2">
                            <table class="shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf] rezervacije" id="myTable">
                                <thead class="bg-[#EFF3F6]">
                                <tr class="border-b-[1px] border-[#e4dfdf]">
                                    <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox">
                                        </label>
                                    </th>
                                    <th class="flex items-center px-4 py-4 leading-4 tracking-wider text-left">Naziv
                                        knjige<a href="#"><i class="ml-2 fa-lg fas fa-long-arrow-alt-down"
                                                             onclick="sortTable()"></i></a>
                                    </th>

                                    <!-- Datum rezervacije + dropdown filter for date -->
                                    <th
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">
                                        Datum rezervacije<i class="ml-2 fas fa-filter"></i>
                                        <div id="datumDropdown"
                                             class="datumMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-l border-2 border-gray-300">
                                            <div
                                                class="flex justify-between flex-row p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                <div>
                                                    <label class="font-medium text-gray-500">Period od:</label>
                                                    <input 
                                                    type="date"
                                                    min="2019-06-02" max="2019-06-08"
                                                    class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                                </div>
                                                <div class="ml-[50px]">
                                                    <label class="font-medium text-gray-500">Period do:</label>
                                                    <input type="date"
                                                           class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                                </div>
                                            </div>
                                            <div class="flex pt-[10px] text-white ">
                                                <a href="#"
                                                   class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                                    Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                                                </a>
                                                <a href="#"
                                                   class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                                    Ponisti <i class="fas fa-times ml-[4px]"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <!-- Rezervacija istice + dropdown filter for date -->
                                    <th
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer zadrzavanjeDrop-toggle">
                                        Rezervacija
                                        ističe<i class="ml-2 fas fa-filter"></i>
                                        <div id="zadrzavanjeDropdown"
                                             class="zadrzavanjeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] right-0 border-2 border-gray-300">
                                            <div
                                                class="flex justify-between flex-row p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                <div>
                                                    <label class="font-medium text-gray-500">Period od:</label>
                                                    <input type="date"
                                                           class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                                </div>
                                                <div class="ml-[50px]">
                                                    <label class="font-medium text-gray-500">Period do:</label>
                                                    <input type="date"
                                                           class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                                </div>
                                            </div>
                                            <div class="flex pt-[10px] text-white ">
                                                <a href="#"
                                                   class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                                    Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                                                </a>
                                                <a href="#"
                                                   class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                                    Ponisti <i class="fas fa-times ml-[4px]"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <!-- Rezervaciju podnio + dropdown filter for ucenik -->
                                    <th
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer uceniciDrop-toggle">
                                        Rezervaciju
                                        podnio<i class="ml-2 fas fa-filter"></i>
                                        <div id="uceniciDropdown"
                                             class="uceniciMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px]  right-0 border-2 border-gray-300">
                                            <ul class="border-b-2 border-gray-300 list-reset">
                                                <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <input
                                                        class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                        placeholder="Search"
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
                                                                <input type="checkbox" class="absolute opacity-0">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                     viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
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
                                                                <input type="checkbox" class="absolute opacity-0">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                     viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
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
                                                                <input type="checkbox" class="absolute opacity-0">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                     viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
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
                                                                <input type="checkbox" class="absolute opacity-0">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                     viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
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
                                                                <input type="checkbox" class="absolute opacity-0">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                     viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
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
                                                                <input type="checkbox" class="absolute opacity-0">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                     viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
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
                                                    Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                                                </a>
                                                <a href="#"
                                                   class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                                    Ponisti <i class="fas fa-times ml-[4px]"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>

                                    <!-- Status + dropdown filter for status -->
                                    <th
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer statusDrop-toggle">
                                        Status<i class="ml-2 fas fa-filter"></i>
                                        <div id="statusDropdown"
                                             class="statusMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] right-0 border-2 border-gray-300">
                                            <ul class="border-b-2 border-gray-300 list-reset">
                                                <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                    <input
                                                        class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                        placeholder="Search"
                                                        onkeyup="filterFunction('searchStatus', 'statusDropdown')"
                                                        id="searchStatus"><br>
                                                    <button
                                                        class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </li>
                                                <div class="h-[200px] scroll font-normal">
                                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">
                                                        <label class="flex items-center justify-start">
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                <input type="checkbox" class="absolute opacity-0">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                     viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                </svg>
                                                            </div>
                                                        </label>
                                                        <p
                                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                            Rezervisano
                                                        </p>
                                                    </li>
                                                    <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200">
                                                        <label class="flex items-center justify-start">
                                                            <div
                                                                class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">
                                                                <input type="checkbox" class="absolute opacity-0">
                                                                <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                                     viewBox="0 0 20 20">
                                                                    <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                                </svg>
                                                            </div>
                                                        </label>
                                                        <p
                                                            class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                            Odbijeno
                                                        </p>
                                                    </li>
                                                </div>
                                            </ul>
                                            <div class="flex pt-[10px] text-white ">
                                                <a href="#"
                                                   class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                                    Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                                                </a>
                                                <a href="#"
                                                   class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                                    Ponisti <i class="fas fa-times ml-[4px]"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </th>
                                    <th class="px-4 py-4"> </th>
                                </tr>
                                </thead>

                                <tbody class="bg-white">

                                @foreach ($data_await as $await_reservation)

                                <tr class="hover:bg-gray-200 hover:shadow-md bg-gray-200 border-b-[1px] border-[#e4dfdf] changeBg">

                                    <td class="px-4 py-3 whitespace-no-wrap">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox">
                                        </label>
                                    </td>
                                    <td class="flex flex-row items-center px-4 py-3">
                                        
                                        <img class="object-cover w-8 mr-2 h-11" src="{{'/storage/book-covers/' . $await_reservation->reservation->book->gallery->photo}}" alt="Naslovna" title="Naslovna" />

                                        <a href="{{route('show-book', $await_reservation->reservation->book->id)}}">
                                            <span class="font-medium text-center">{{$await_reservation->reservation->book->title}}</span>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$await_reservation->reservation->reservation_date}}</td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$await_reservation->reservation->request_date}}
                                    </td>

                                    <td class="flex flex-row items-center px-4 py-3">
                                       
                                        <img 
                                        class="object-cover w-8 h-8 rounded-full" 
                                        src="{{$await_reservation->reservation->made_for->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . $await_reservation->made_for->photo}}" />

                                        <a href="{{route('show-student', $await_reservation->reservation->made_for->username)}}" class="ml-2 font-medium text-center">{{$await_reservation->reservation->made_for->name}}</a>
                                       
                                    </td>

                                    <td class="px-4 py-3 changeStatus">

                                    <form style="display: inline" action="{{route('approve', ['id' => $await_reservation->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                        <button style="outline: none;" href="#" class="hover:text-green-500 mr-[5px]">
                                            <i class="fas fa-check reservedStatus"></i>
                                        </button>
                                    </form>

                                    <form style="display: inline" action="{{route('deny', ['id' => $await_reservation->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                        <button style="outline: none;" href="#" class="hover:text-red-500 ">
                                            <i class="fas fa-times deniedStatus"></i>
                                        </button>
                                    </form>

                                    </td>
                                
                                    <td class="hidden px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                        <div
                                            class="inline-block px-[6px] py-[2px] font-medium bg-yellow-200 rounded-[10px]">
                                            <span class="text-xs text-yellow-700">Rezervisano</span>
                                        </div>
                                    </td>
                                    <td class="hidden px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                        <div
                                            class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                            <span class="text-xs text-red-800">Odbijeno</span>
                                        </div>
                                    </td>

                                    <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                        <p
                                            class="hidden inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsAktivneRezervacije hover:text-[#606FC7]">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </p>
                                        <div
                                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 aktivne-rezervacije">
                                            <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                 aria-labelledby="headlessui-menu-button-1"
                                                 id="headlessui-menu-items-117" role="menu">
                                                <div class="py-1">
                                                    <a href="{{route('rent-book', $await_reservation->reservation->book->id)}}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                         <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                         <span class="px-4 py-0">Izdaj knjigu</span>
                                                     </a>

                                                    <a href="#" tabindex="0"
                                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                       role="menuitem">
                                                        <i class="fas fa-undo mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Arhiviraj rezervaciju</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                </td>
                                       
                                </tr>
                                
                                @endforeach

                                @foreach ($data_true as $true_reservation)
                                
                                <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                    <td class="px-4 py-3 whitespace-no-wrap">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox">
                                        </label>
                                    </td>
                                    <td class="flex flex-row items-center px-4 py-3">

                                        <img class="object-cover w-8 mr-2 h-11" src="{{'/storage/book-covers/' . $true_reservation->reservation->book->gallery->photo}}" alt="Naslovna" title="Naslovna" />

                                        <a href="{{route('show-book', $true_reservation->reservation->book->id)}}">
                                            <span class="font-medium text-center">{{$true_reservation->reservation->book->title}}</span>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$true_reservation->reservation->reservation_date}}</td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$true_reservation->reservation->request_date}}</td>
                                    <td class="flex flex-row items-center px-4 py-3">
                                       
                                        <img 
                                        class="object-cover w-8 h-8 rounded-full" 
                                        src="{{$true_reservation->reservation->made_for->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . $true_reservation->reservation->made_for->photo}}" />

                                        <a href="{{route('show-student', $true_reservation->reservation->made_for->username)}}" class="ml-2 font-medium text-center">{{$true_reservation->reservation->made_for->name}}</a>

                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                        <div
                                            class="inline-block px-[6px] py-[2px] font-medium bg-yellow-200 rounded-[10px]">
                                            <span class="text-xs text-yellow-700">Rezervisano</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                        <p
                                            class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsAktivneRezervacije hover:text-[#606FC7]">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </p>
                                        <div
                                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 aktivne-rezervacije">
                                            <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                 aria-labelledby="headlessui-menu-button-1"
                                                 id="headlessui-menu-items-117" role="menu">
                                                <div class="py-1">
                                                    <a href="{{route('rent-book', $true_reservation->reservation->book->id)}}" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                         <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                         <span class="px-4 py-0">Izdaj knjigu</span>
                                                     </a>

                                                    <a href="#" tabindex="0"
                                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                       role="menuitem">
                                                        <i class="fas fa-undo mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Arhiviraj</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach

                                @foreach ($data_false as $false_reservation)
                                
                                <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                    <td class="px-4 py-3 whitespace-no-wrap">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox">
                                        </label>
                                    </td>
                                    <td class="flex flex-row items-center px-4 py-3">

                                        <img class="object-cover w-8 mr-2 h-11" src="{{'/storage/book-covers/' . $false_reservation->reservation->book->gallery->photo}}" alt="Naslovna" title="Naslovna" />

                                        <a href="{{route('show-book', $false_reservation->reservation->book->id)}}">
                                            <span class="font-medium text-center">{{$false_reservation->reservation->book->title}}</span>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$false_reservation->reservation->reservation_date}}</td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$false_reservation->reservation->request_date}}</td>
                                    <td class="flex flex-row items-center px-4 py-3">
                                       
                                        <img 
                                        class="object-cover w-8 h-8 rounded-full" 
                                        src="{{$false_reservation->reservation->made_for->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . $false_reservation->reservation->made_for->photo}}" />

                                        <a href="{{route('show-student', $false_reservation->reservation->made_for->username)}}" class="ml-2 font-medium text-center">{{$false_reservation->reservation->made_for->name}}</a>

                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 text-blue-900 whitespace-no-wrap">
                                        <div
                                            class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                            <span class="text-xs text-red-800">Odbijeno</span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                        <p
                                            class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsAktivneRezervacije hover:text-[#606FC7]">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </p>
                                        <div
                                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 aktivne-rezervacije">
                                            <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                 aria-labelledby="headlessui-menu-button-1"
                                                 id="headlessui-menu-items-117" role="menu">
                                                <div class="py-1">
                                                    <a href="{{route('rent-book', $false_reservation->reservation->book->id)}}" tabindex="0"
                                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                       role="menuitem">
                                                        <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Izdaj knjigu</span>
                                                    </a>

                                                    <a href="#" tabindex="0"
                                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                       role="menuitem">
                                                        <i class="fas fa-undo mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Arhiviraj</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                @endforeach



                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->
@endsection
