@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Knjige u prekoračenju | Online Biblioteka</title>

@endsection

@section('content')

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
                            
                            @if ($data != 'no-values')

                            @if ($data->book_status->whereDate('return_time', '<', date('Y-m-d'))->count())

                            <table class="shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf]" id="myTable">
                                <thead class="bg-[#EFF3F6]">
                                <tr class="border-b-[1px] border-[#e4dfdf]">
                                    <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox">
                                        </label>
                                    </th>
                                    <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                        Naziv knjige
                                        <a href="#"><i class="ml-2 fa-lg fas fa-long-arrow-alt-down"
                                                       onclick="sortTable()"></i>
                                        </a>
                                    </th>
                                    <!-- Datum izdavanja + dropdown filter for date -->
                                    <th
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">
                                        Datum izdavanja<i class="ml-2 fas fa-filter"></i>
                                        <div id="datumDropdown"
                                             class="datumMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-l border-2 border-gray-300">
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
                                    <!-- Izdato uceniku + dropdown filter for ucenik -->
                                    <th
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer uceniciDrop-toggle">
                                        Izdato učeniku<i class="fas fa-filter"></i>
                                        <div id="uceniciDropdown"
                                             class="uceniciMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300">
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
                                    <!-- Prekoracenje u danima -->
                                    <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">
                                        Prekoračenje u danima
                                    </th>
                                    <!-- Trenutno zadrzavanje knjige + dropdown filter for date -->
                                    <th
                                        class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer zadrzavanjeDrop-toggle">
                                        Trenutno zadržavanje knjige<i class="fas fa-filter"></i>
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
                                    <th class="px-4 py-4"> </th>
                                </tr>
                                </thead>
                                
@foreach ($data->book_status->whereDate('return_time', '<', date('Y-m-d'))->get() as $book_status)
                                    
                                <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                    <td class="px-4 py-3 whitespace-no-wrap">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="form-checkbox">
                                        </label>
                                    </td>
                                    <td class="flex flex-row items-center px-4 py-3">
                                        <img class="object-cover w-8 mr-2 h-11" src="{{'/storage/book-covers/' . $book_status->rent_status->rent->book->gallery->photo}}" alt="Naslovna" />
                                        <a href="{{route('show-book', $book_status->rent_status->rent->book->id)}}">
                                            <span class="font-medium text-center">{{$book_status->rent_status->rent->book->title}}</span>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$book_status->rent_status->rent->issue_date}}</td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$book_status->rent_status->rent->borrow->name}}</td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                        <div class="inline-block px-[6px] py-[2px] font-medium bg-red-200 rounded-[10px]">
                                            <span class="text-xs text-red-800">
@php

$date1 = new DateTime("now");
$date2 = new DateTime($book_status->rent_status->book_status->return_time);
$interval = $date1->diff($date2);

echo $interval->days;
// if ($date1 > $date2) {
//     if ($interval->days == 1) {
//        echo "1 dan";
//     } elseif ($interval->days == 0) {
//         $interval = 1;
//         echo $interval . ' dan'; 
//     } else {
//         echo $interval->format('%a dana');
//     }
// }

@endphp
                                            </span>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                        <div>
                                            <span>
                                            
                                                @php
                                                $datetime1 = new DateTime(($book_status->rent_status->rent->issue_date));
                                                $datetime2 = new DateTime(($book_status->rent_status->rent->return_date));
                                                $interval = $datetime1->diff($datetime2);
                                                echo '<span style="color: #2A4AB3">' .  $interval->format('%a dana')  .'</span>';
                                                @endphp
                   
                                                </span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                        <p
                                            class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsKnjigePrekoracenje hover:text-[#606FC7]">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </p>
                                        <div
                                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 knjige-prekoracenje">
                                            <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                 aria-labelledby="headlessui-menu-button-1"
                                                 id="headlessui-menu-items-117" role="menu">
                                                <div class="py-1">
                                                    <a href="izdavanjeDetalji.php" tabindex="0"
                                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                       role="menuitem">
                                                        <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Pogledaj detalje</span>
                                                    </a>

                                                    <a href="{{route('rent-book', $book_status->rent_status->rent->book->id)}}" tabindex="0"
                                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                       role="menuitem">
                                                        <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Izdaj knjigu</span>
                                                    </a>

                                                    <a href="{{route('return-book', $book_status->rent_status->rent->book->id)}}" tabindex="0"
                                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                       role="menuitem">
                                                        <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Vrati knjigu</span>
                                                    </a>

                                                    <a href="rezervisiKnjigu.php" tabindex="0"
                                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                       role="menuitem">
                                                        <i
                                                            class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Rezerviši knjigu</span>
                                                    </a>

                                                    <a href="otpisiKnjigu.php" tabindex="0"
                                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                       role="menuitem">
                                                        <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Otpiši knjigu</span>
                                                    </a>

                                                    <form action="{{route('destroy-book', $book_status->rent_status->rent->book->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                                style="outline: none;border: none;"
                                                                type="submit"
                                                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                                role="menuitem">
                                                            <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                                            <span class="px-4 py-0">Izbriši knjigu</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>    
                                    
                                @endforeach
                                
                                </tbody>
                            </table>
                            
                            @else 

                            <div class="mx-[50px]">
                                <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">                       
                                    <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                                        <path fill="currentColor"
                                                d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                                        </path>
                                    </svg>
                                    <p class="font-medium text-white">Trenutno nema knjiga u prekoračenju! </p>
                                </div>
                            </div>  

                            @endif

                            @endif
                            
                            </div>  

                   
                </div>
            </div>
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->

    <x-jquery.jquery></x-jquery.jquery>
@endsection
