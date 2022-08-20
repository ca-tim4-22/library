@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Dashboard Aktivnost | Online Biblioteka</title>

@endsection

@section('content')

<?php
    if($_SERVER['REQUEST_METHOD'] == "GET") {
        if(isset($_GET['knjiga'])) {
            $knjiga = $_GET['knjiga'];
        } else {
            $knjiga = "Sve";
        }
    } else {
        $e = new Exception('Error', 222);
        echo '<h1>'.$e->getCode().' '.$e->getMessage().'</h1>';
    }
?>

<!-- Content -->
<section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
    <!-- Heading of content -->
    <div class="heading mt-[7px]">
        <h1 class="pl-[30px] pb-[21px]  border-b-[1px] border-[#e4dfdf] ">
            Prikaz aktivnosti
        </h1>
    </div>
    <!-- Space for content -->
    <div class="pl-[30px] overflow-auto scroll height-dashboard pb-[30px] mt-[20px]">
        <div class="flex flex-row justify-between">
            <div class="mr-[30px]">
                <div class="text-[14px] flex flex-row mb-[30px]">
                    <div class="">
                        <div class="rounded">
                            <div class="relative">
                                <button class="w-auto rounded focus:outline-none uceniciDrop-toggle">
                                    <span class="float-left">Učenici: Svi <i
                                            class="px-[7px] fas fa-angle-down"></i></span>
                                </button>
                                <div id="uceniciDropdown"
                                    class="uceniciMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-l border-2 border-gray-300">
                                    <ul class="border-b-2 border-gray-300 list-reset">
                                        <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                            <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                placeholder="Traži"
                                                onkeyup="filterFunction('searchUcenici', 'uceniciDropdown', 'dropdown-item-izdato')"
                                                id="searchUcenici"><br>
                                            <button
                                                class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </li>
                                        <div class="h-[200px] scroll">
                                            <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-izdato">
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
                                                <img width="40px" height="30px" class="ml-[15px] rounded-full"
                                                    src="img/profileStudent.jpg">
                                                <p
                                                    class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                    Ucenik Ucenikovic
                                                </p>
                                            </li>
                                            <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-izdato">
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
                                                <img width="40px" height="30px" class="ml-[15px] rounded-full"
                                                    src="img/profileStudent.jpg">
                                                <p
                                                    class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                    Pero Perovic
                                                </p>
                                            </li>
                                            <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-izdato">
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
                                                <img width="40px" height="30px" class="ml-[15px] rounded-full"
                                                    src="img/profileStudent.jpg">
                                                <p
                                                    class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                    Marko Markovic
                                                </p>
                                            </li>
                                            <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-izdato">
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
                                                <img width="40px" height="30px" class="ml-[15px] rounded-full"
                                                    src="img/profileStudent.jpg">
                                                <p
                                                    class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                    Nikola Nikolic
                                                </p>
                                            </li>
                                            <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-izdato">
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
                                                <img width="40px" height="30px" class="ml-[15px] rounded-full"
                                                    src="img/profileStudent.jpg">
                                                <p
                                                    class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                    Zivko Zivkovic
                                                </p>
                                            </li>
                                            <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-izdato">
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
                                                <img width="40px" height="30px" class="ml-[15px] rounded-full"
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
                                            Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                        </a>
                                        <a href="#"
                                            class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                            Ponisti <i class="fas fa-times ml-[4px]"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-[25px]">
                        <div class="rounded">
                            <div class="relative">
                                <button class="w-auto rounded focus:outline-none bibliotekariDrop-toggle">
                                    <span class="float-left">Bibliotekari: Svi <i
                                            class="px-[7px] fas fa-angle-down"></i></span>
                                </button>
                                <div id="bibliotekariDropdown"
                                    class="bibliotekariMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                                    <ul class="border-b-2 border-gray-300 list-reset">
                                        <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                            <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                placeholder="Traži"
                                                onkeyup="filterFunction('searchBibliotekari', 'bibliotekariDropdown', 'dropdown-item-bibliotekar')"
                                                id="searchBibliotekari"><br>
                                            <button
                                                class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </li>
                                        <div class="h-[200px] scroll">

                                            
                                            <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-bibliotekar">
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
                                                <img width="40px" height="30px" class="ml-[15px] rounded-full"
                                                    src="img/profileExample.jpg">
                                                <p
                                                    class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                    Bibliotekar Bulatovic
                                                </p>
                                            </li>
                             
                                        </div>
                                    </ul>
                                    <div class="flex pt-[10px] text-white ">
                                        <a href="#"
                                            class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                            Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                        </a>
                                        <a href="#"
                                            class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                            Ponisti <i class="fas fa-times ml-[4px]"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-[25px]">
                        <div class="rounded">
                            <div class="relative">
                                <button class="w-auto rounded focus:outline-none" id="knjigeMenu">
                                    <?php if($knjiga==="Sve") {
                                        echo "<span class='float-left'>";
                                    } else {
                                        echo "<span class='float-left bg-blue-200 text-blue-800 px-[8px] py-[2px]'>";
                                    }
                                    ?>
                                    Knjiga: <?php echo $knjiga ?> <i class="px-[7px] fas fa-angle-down"></i></span>
                                </button>
                                <div id="knjigeDropdown"
                                    class="knjigeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                                    <ul class="border-b-2 border-gray-300 list-reset">
                                        <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                            <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                placeholder="Traži"
                                                onkeyup="filterFunction('searchKnjige', 'knjigeDropdown', 'dropdown-item-knjiga')"
                                                id="searchKnjige"><br>
                                            <button
                                                class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </li>
                                        <div class="h-[200px] scroll">

                                            @foreach ($books as $book)

                                            <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-knjiga">
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
                                                <img width="30px" height="30px" class="ml-[15px]"
                                                    src="{{'/storage/book-covers/' . $book->gallery->photo}}">
                                                <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
                                                    {{$book->title}}
                                                </p>
                                            </li>
                                                
                                            @endforeach

                                        </div>
                                    </ul>
                                    <div class="flex pt-[10px] text-white ">
                                        <a href="#"
                                            class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                            Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                        </a>
                                        <a href="#"
                                            class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                            Ponisti <i class="fas fa-times ml-[4px]"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-[25px]">
                        <div class="rounded">
                            <div class="relative">
                                <button class="w-auto rounded focus:outline-none" id="transakcijeMenu">
                                    <span class="float-left">Transakcije: Sve <i
                                            class="px-[7px] fas fa-angle-down"></i></span>
                                </button>
                                <div id="transakcijeDropdown"
                                    class="transakcijeMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                                    <ul class="border-b-2 border-gray-300 list-reset">
                                        <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                            <input class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                placeholder="Traži"
                                                onkeyup="filterFunction('searchTransakcije', 'transakcijeDropdown', 'dropdown-item-transakcije')"
                                                id="searchTransakcije"><br>
                                            <button
                                                class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </li>
                                        <div class="h-[200px] scroll">
                                            <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
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
                                                    Izdavanje knjiga
                                                </p>
                                            </li>
                                            <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
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
                                                    Vracanje knjiga
                                                </p>
                                            </li>
                                            <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
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
                                                    Unos nove knjige
                                                </p>
                                            </li>
                                            <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-transakcije">
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
                                                    Brisanje knjige
                                                </p>
                                            </li>
                                        </div>
                                    </ul>
                                    <div class="flex pt-[10px] text-white ">
                                        <a href="#"
                                            class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#009688] bg-[#46A149] rounded-[5px]">
                                            Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                        </a>
                                        <a href="#"
                                            class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                            Ponisti <i class="fas fa-times ml-[4px]"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ml-[25px]">
                        <div class="rounded">
                            <div class="relative">
                                <button class="w-auto rounded focus:outline-none datumDrop-toggle">
                                    <span class="float-left">Datum: Svi <i
                                            class="px-[7px] fas fa-angle-down"></i></span>
                                </button>
                                <div id="datumDropdown"
                                    class="datumMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md pin-t pin-l border-2 border-gray-300">
                                    <div
                                        class="flex justify-between flex-row p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                        <div>
                                            <label class="font-medium text-gray-500">Period od:</label>
                                            <input type="date" class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                        </div>
                                        <div class="ml-[50px]">
                                            <label class="font-medium text-gray-500">Period do:</label>
                                            <input type="date" class="border-[1px] border-[#e4dfdf]  cursor-pointer focus:outline-none">
                                        </div>
                                    </div>
                                    <div class="flex pt-[10px] text-white ">
                                        <a href="#"
                                            class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#009688] bg-[#46A149] rounded-[5px]">
                                            Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                        </a>
                                        <a href="#"
                                            class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                            Poništi <i class="fas fa-times ml-[4px]"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="ml-[35px] cursor-pointer hover:text-blue-600">
                        <button style="outline: none;" onclick="location.reload();"><i class="fas fa-sync-alt"></i></button>
                    </div>


                </div>
                <!-- Activity Cards -->
           

                @if (!$data == [])
                 
                 @foreach ($data as $rent)

                <div class="activity-card flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="{{$rent->borrow->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . $rent->borrow->photo}}"
                        alt="Profilna slika učenika: {{$rent->borrow->name}}"
                        title="Profilna slika učenika: {{$rent->borrow->name}}" />
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Izdavanje knjige
                                <span class="inline lowercase">
                                    - {{$rent->issue_date}}
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <a href="{{route('show-librarian', $rent->librarian->username)}}" class="text-[#2196f3] hover:text-blue-600">
                                    {{$rent->librarian->name}}
                                </a>
                                je izdao/la knjigu <span class="font-medium">{{$rent->book->title}} </span>
                                <a href="{{route('show-student', $rent->borrow->username)}}" class="text-[#2196f3] hover:text-blue-600">
                                    {{$rent->borrow->name}}
                                </a>
                                dana <span class="font-medium">21.02.2021.</span>
                                <a href="{{route('rented-books')}}" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                   </div>
                

                 @endforeach

                @else

                <div class="mx-[50px]">
                    <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">                       
                        <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                            <path fill="currentColor"
                                    d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                            </path>
                        </svg>
                        <p class="font-medium text-white">Trenutno nema aktivnosti za prikazivanje! </p>
                    </div>
                </div>

                @endif
        
                <div class="inline-block w-full mt-4">
                    <button type="button"
                        class="btn-animation w-full px-4 py-2 text-sm tracking-wider text-gray-600 transition duration-300 ease-in border-[1px] border-gray-400 rounded activity-showMore hover:bg-gray-200 focus:outline-none focus:ring-[1px] focus:ring-gray-300">
                        Show more
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->
    
@endsection