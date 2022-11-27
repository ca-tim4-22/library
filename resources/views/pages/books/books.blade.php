@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Knjige | Online Biblioteka</title>

@endsection

@section('content')
{{-- Preloader --}}
<script src="{{asset('preloader/preloader.js')}}" ></script>
{{-- Sweet Alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
{{-- Tailwind --}}
<script src="https://cdn.tailwindcss.com"></script>
{{-- Trash delete icon --}}
<link rel="stylesheet" href="{{asset('trash_delete/trash_delete.css')}}">
{{-- Csrf Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">

<div id="loader"></div>

<div style="display:none;" id="myDiv">

<!-- Content -->
<body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500" onload="myFunction()">
<section class="w-screen h-screen py-4 pl-[80px] text-[#333333]">
    <!-- Heading of content -->
    <div class="heading mt-[7px]" style="margin-top: 10px">
        <h1 style="font-size: 30px" class="pl-[30px] pb-[22px] border-b-[1px] border-[#e4dfdf] ">
            Knjige

{{-- Session message for book create --}}
@if (session()->has('success-book'))
<script>
    swal({
       title: "Uspješno!", 
       text: "Uspješno ste dodali knjigu!", 
       timer: 2500,
       type: "success",
    });
</script>
@endif

{{-- Session message for book delete --}}
@if (session()->has('book-deleted'))
<script>
    swal({
       title: "Uspješno!", 
       text: "Uspješno ste izbrisali knjigu!", 
       timer: 2500,
       type: "success",
    });
</script>
@endif

            </h1>
        </div>
        <!-- Space for content -->
        <div class="scroll height-evidencija">
            <div class="flex items-center justify-between px-[30px] py-4 space-x-3 rounded-lg">
                @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
                <a href="{{route('new-book')}}"
                    class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]">
                    <i class="fas fa-plus mr-[15px]"></i> Nova knjiga
                </a>
                @else
                <div  class="inline-flex items-center"></div>
                @endif

                @if ($books->count())
                <div class="flex items-center">
                
                    <style>
                        #pagination {
                            border-left: 1px solid #4558BE;
                            border-bottom: 0.4px solid #000;
                            cursor: pointer;
                        }
                    </style>
                    <form> 
                        Broj redova po strani:
                        <select id="pagination" style="outline: none">
                            <option value="5" @if($items == 5) selected @endif >5</option>
                            <option value="10" @if($items == 10) selected @endif >10</option>
                            <option value="25" @if($items == 25) selected @endif >25</option>
                            <option value="50" @if($items == 50) selected @endif >50</option>
                            <option value="100" @if($items == 100) selected @endif >100</option>
                            <option
                            title="{{$show_all}}"
                            value="{{$show_all}}" @if($items == $show_all) selected @endif>Prikaži sve</option>
                        </select>
                    </form>
    
                    @if (!is_a($books, 'Illuminate\Database\Eloquent\Collection'))
                    <script>
                        document.getElementById('pagination').onchange = function() {
                            window.location = "{{ $books->url(1) }}&items=" + this.value;
                        };
                    </script>
                    @endif
    
                    <form method="GET" action="{{ route('all-books') }}">
                        <div class="relative text-gray-600 focus-within:text-gray-400">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                    <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                        <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </button>
                            </form>
                            </span>
                            <input type="search" name="trazeno" value="{{$searched_book}}"
                                class="py-2 pl-10 text-sm bg-white rounded-md focus:outline-none focus:text-gray-900"
                                placeholder="Traži..." autocomplete="off">
                        </div>
                        </div>
                        </form>
                @endif

            </div>
            <!-- Space for content -->
            <div class="px-[30px] pt-2 bg-white">
                <div class="w-full mt-2">

                    @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3 && $books->count())
                    <button type="submit" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE] button delete-all-books"  data-url="">
                        <div class="icon">
                            <svg class="top">
                                <use xlink:href="#top">
                            </svg>
                            <svg class="bottom">
                                <use xlink:href="#bottom">
                            </svg>
                        </div>
                        <span>Izbriši</span>
                    </button>
                    
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="top">
                            <path d="M15,4 C15.5522847,4 16,4.44771525 16,5 L16,6 L18.25,6 C18.6642136,6 19,6.33578644 19,6.75 C19,7.16421356 18.6642136,7.5 18.25,7.5 L5.75,7.5 C5.33578644,7.5 5,7.16421356 5,6.75 C5,6.33578644 5.33578644,6 5.75,6 L8,6 L8,5 C8,4.44771525 8.44771525,4 9,4 L15,4 Z M14,5.25 L10,5.25 C9.72385763,5.25 9.5,5.47385763 9.5,5.75 C9.5,5.99545989 9.67687516,6.19960837 9.91012437,6.24194433 L10,6.25 L14,6.25 C14.2761424,6.25 14.5,6.02614237 14.5,5.75 C14.5,5.50454011 14.3231248,5.30039163 14.0898756,5.25805567 L14,5.25 Z"></path>
                        </symbol>
                        <symbol xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="bottom">
                            <path d="M16.9535129,8 C17.4663488,8 17.8890201,8.38604019 17.9467852,8.88337887 L17.953255,9.02270969 L17.953255,9.02270969 L17.5309272,18.3196017 C17.5119599,18.7374363 17.2349366,19.0993109 16.8365446,19.2267053 C15.2243631,19.7422351 13.6121815,20 12,20 C10.3878264,20 8.77565288,19.7422377 7.16347932,19.226713 C6.76508717,19.0993333 6.48806648,18.7374627 6.46907425,18.3196335 L6.04751853,9.04540766 C6.02423185,8.53310079 6.39068134,8.09333626 6.88488406,8.01304774 L7.02377738,8.0002579 L16.9535129,8 Z M9.75,10.5 C9.37030423,10.5 9.05650904,10.719453 9.00684662,11.0041785 L9,11.0833333 L9,16.9166667 C9,17.2388328 9.33578644,17.5 9.75,17.5 C10.1296958,17.5 10.443491,17.280547 10.4931534,16.9958215 L10.5,16.9166667 L10.5,11.0833333 C10.5,10.7611672 10.1642136,10.5 9.75,10.5 Z M14.25,10.5 C13.8703042,10.5 13.556509,10.719453 13.5068466,11.0041785 L13.5,11.0833333 L13.5,16.9166667 C13.5,17.2388328 13.8357864,17.5 14.25,17.5 C14.6296958,17.5 14.943491,17.280547 14.9931534,16.9958215 L15,16.9166667 L15,11.0833333 C15,10.7611672 14.6642136,10.5 14.25,10.5 Z"></path>
                        </symbol>
                    </svg>
                    @endif
        
        <script>
            document.querySelectorAll(".button").forEach(button =>
          button.addEventListener("click", e => {
            if (!button.classList.contains("delete")) {
              button.classList.add("delete");
        
              setTimeout(() => button.classList.remove("delete"), 2200);
            }
            e.preventDefault();
          })
        );
        </script>

                    <table id="sort" class="w-full shadow-lg rounded-xl" id="myTable">
                        <!-- Table head-->
                     
                        @if($show == true)
                        <thead class="bg-[#EFF3F6]">
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                    <label class="inline-flex items-center">
                                       @if (Auth::user()->user_type_id != 1)
                                       <input type="checkbox" id="check_all">
                                       @endif
                                    </label>
                                </td>

                                <td class="px-3 py-5 leading-4 tracking-wider text-left sakriveno checkme2">
                                    <button
                                    onclick="showBook()"
                                    style="outline: none;border: none;font-weight: bold;"
                                        class="flex w-full px-1 text-sm leading-5 text-left text-blue-600 outline-none"
                                        role="menuitem">
                                        <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                        <span style="padding-top: 1px;">Pogledaj detalje</span>
                                    </button>
                                </td>

                                <th class="px-4 py-4 leading-4 tracking-wider text-left checkme" id="arrow">
                                    Naziv knjige
                                </th>

                                <!-- Autor + dropdown filter for autor -->
    
                                <form action="{{route('all-books')}}">
                                <td class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left checkme">

                                    <button 
                                    type="button"
                                    class="uceniciDrop-toggle" 
                                    style="outline: none;cursor: pointer;font-weight: bold;">
                                    @if ($selected_a != [])
                                    Autor: 
                                    @foreach ($selected_a as $author)
                                    {{$loop->first ? '' : '|'}}
                                    {{$author->NameSurname}}
                                    @endforeach
                                    @else
                                    Autori: Svi
                                    @endif
                                    <i class="ml-2 fas fa-filter"></i>
                                    </button>
    
                                    <div id="uceniciDropdown"
                                         class="uceniciMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300">
                                        <ul class="border-b-2 border-gray-300 list-reset">
                                            <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                <input
                                                    class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                    placeholder="Traži.."
                                                    onkeyup="filterFunction('searchUcenici', 'uceniciDropdown', 'dropdown-item-ucenik')"
                                                    id="searchUcenici">
                                                <br>
                                                <button
                                                    class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </li>
                                            <div class="h-[200px] scroll font-normal">
    
                                              @foreach ($authors as $author)
                                              
                                              <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-ucenik">
                                                <label class="flex items-center justify-start">

                                                        <div
                                                        style="position: relative"
                                                        class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">

                                                        <input
                                                        style="position: absolute;cursor: pointer;"
                                                        @if(in_array($author->id, $id_a)) checked @endif
                                                        class="opacity-0"
                                                        type="checkbox" name="id_author[]" value="{{$author->id}}">

                                                        <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                             viewBox="0 0 20 20">
                                                            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                        </svg>
                                                    </div>
                                                </label>
                                                <p class="block p-2 text-black cursor-default group-hover:text-blue-600">

                                                {{$author->NameSurname}}

                                                </p>
                                            </li>
    
                                              @endforeach
                                              
                                            </div>
                                        </ul>
                                        <div class="flex pt-[10px] text-white ">
                                        <button 
                                        type="submit"
                                        style="outline: none;"
                                        class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                        Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                        </button>
                                            <a href="{{route('all-books')}}"
                                               class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                                Poništi <i class="fas fa-times ml-[4px]"></i>
                                            </a>
                                        </form>
                                        </div>
                                    </div>
                                </td>

                                    
                                <td class="px-3 py-5 leading-4 tracking-wider text-left sakriveno checkme2">
                                    <button
                                    onclick="editBook()"
                                    style="outline: none;border: none;font-weight: bold;"
                                    class="flex w-full px-1 text-sm leading-5 text-left text-blue-600 outline-none"
                                    role="menuitem">
                                    <i class="fas fa-edit mr-[3px] ml-[5px] py-1"></i>
                                    <span style="padding-top: 1px;">Izmijeni knjigu
                                    </span>
                                    </button>
                                </td>

                                <!-- Kategorija + dropdown filter for kategorija -->
                                
                                <form action="{{route('all-books')}}">
                                <td class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left checkme">

                                    <button 
                                    type="button"
                                    class="bibliotekariDrop-toggle" 
                                    style="outline: none;cursor: pointer;font-weight: bold;">
                                    @if ($selected_c != [])
                                    Kategorija: 
                                    @foreach ($selected_c as $category)
                                    {{$loop->first ? '' : '|'}}
                                    {{$category->name}}
                                    @endforeach
                                    @else
                                    Kategorije: Sve
                                    @endif
                                    <i class="ml-2 fas fa-filter"></i>
                                    </button>
    
                                    <div id="bibliotekariDropdown"
                                         class="bibliotekariMenu hidden absolute rounded bg-white min-w-[310px] p-[10px] shadow-md top-[42px] pin-t pin-l border-2 border-gray-300">
                                        <ul class="border-b-2 border-gray-300 list-reset">
                                            <li class="p-2 pb-[15px] border-b-[2px] relative border-gray-300">
                                                <input
                                                    class="w-full h-10 px-2 border-2 rounded focus:outline-none"
                                                    placeholder="Traži.."
                                                    onkeyup="filterFunction('searchBibliotekari', 'bibliotekariDropdown', 'dropdown-item-bibliotekar')"
                                                    id="searchBibliotekari"><br>
                                                <button
                                                    class="absolute block text-xl text-center text-gray-400 transition-colors w-7 h-7 leading-0 top-[14px] right-4 focus:outline-none hover:text-gray-900">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </li>
                                            <div class="h-[200px] scroll font-normal">
    
                                              @foreach ($categories as $category)
                                              
                                              <li class="flex p-2 mt-[2px] pt-[15px] group hover:bg-gray-200 dropdown-item-bibliotekar">
                                                <label class="flex items-center justify-start">
                                                    <div
                                                    style="position: relative"
                                                    class="flex items-center justify-center flex-shrink-0 w-[16px] h-[16px] mr-2 bg-white border-2 border-gray-400 rounded focus-within:border-blue-500">

                                                        <input
                                                        style="position: absolute;cursor: pointer;"
                                                        @if(in_array($category->id, $id_c)) checked @endif
                                                        class="opacity-0"
                                                        type="checkbox" name="id_category[]" value="{{$category->id}}">

                                                        <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                             viewBox="0 0 20 20">
                                                            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                        </svg>
                                                    </div>
                                                </label>
                                                <img 
                                                style="height:30px" 
                                                src="{{$category->default == 'false' ? '/storage/settings/category/' . $category->icon : $category->icon}}" 
                                                alt="{{$category->name}}"
                                                title="{{$category->name}}">
                                                <p class="block p-2 text-black cursor-default group-hover:text-blue-600">
                                                {{$category->name}}
                                                </p>
                                            </li>
    
                                              @endforeach
                                              
                                            </div>
                                        </ul>
                                        <div class="flex pt-[10px] text-white ">
                                            <button 
                                            type="submit"
                                            style="outline: none;"
                                            class="btn-animation py-2 px-[20px] transition duration-300 ease-in hover:bg-[#46A149] bg-[#4CAF50] rounded-[5px]">
                                            Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                                            </button>
                                            <a href="{{route('all-books')}}"
                                            class="btn-animation ml-[20px] py-2 px-[20px] transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                            Poništi <i class="fas fa-times ml-[4px]"></i>
                                            </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-3 py-5 leading-4 tracking-wider text-left sakriveno checkme2">
                                    <button
                                    onclick="writeOffBook()"
                                    style="outline: none;border: none;font-weight: bold;"
                                    class="flex w-full px-1 text-sm leading-5 text-left text-blue-600 outline-none"
                                    role="menuitem">
                                    <i class="fas fa-level-up-alt mr-[5px] ml-[5px] py-1"></i>
                                    <span style="padding-top: 1px;">Otpiši knjigu
                                    </span>
                                    </button>
                                </td>
                                
                                <th class="px-4 py-4 leading-4 tracking-wider text-left checkme" id="arrow">
                                    Na raspolaganju
                                </th>

                                <td class="px-3 py-5 leading-4 tracking-wider text-left sakriveno checkme2">
                                    <button
                                    onclick="rentBook()"
                                    style="outline: none;border: none;font-weight: bold;"
                                    class="flex w-full px-1 text-sm leading-5 text-left text-blue-600 outline-none"
                                    role="menuitem">
                                    <i class="far fa-hand-scissors mr-[5px] ml-[5px] py-1"></i>
                                    <span style="padding-top: 1px;">Izdaj knjigu
                                    </span>
                                    </button>
                                </td>

                                <th class="px-4 py-4 leading-4 tracking-wider text-left checkme" id="arrow">
                                    Rezervisano
                                </th>

                                <td class="px-3 py-5 leading-4 tracking-wider text-left sakriveno checkme2">
                                    <button
                                    onclick="returnBook()"
                                    style="outline: none;border: none;font-weight: bold;"
                                    class="flex w-full px-1 text-sm leading-5 text-left text-blue-600 outline-none"
                                    role="menuitem">
                                    <i class="fas fa-redo-alt mr-[5px] ml-[5px] py-1"></i>
                                    <span style="padding-top: 1px;">Vrati knjigu
                                    </span>
                                    </button>
                                </td>

                                <th class="px-4 py-4 leading-4 tracking-wider text-left checkme" id="arrow">
                                    Izdato
                                </th>

                                <td class="px-3 py-5 leading-4 tracking-wider text-left sakriveno checkme2">
                                    <button
                                    onclick="reserveBook()"
                                    style="outline: none;border: none;font-weight: bold;"
                                    class="flex w-full px-1 text-sm leading-5 text-left text-blue-600 outline-none"
                                    role="menuitem">
                                    <i class="far fa-calendar-check mr-[5px] ml-[5px] py-1"></i>
                                    <span style="padding-top: 1px;">Rezerviši knjigu
                                    </span>
                                    </button>
                                </td>
                                
                                <th class="px-4 py-4 leading-4 tracking-wider text-left checkme" id="arrow">
                                    U prekoračenju
                                </th>

                                <td class="px-3 py-5 leading-4 tracking-wider text-left sakriveno checkme2">
                                    <button
                                    style="outline: none;border: none;font-weight: bold;"
                                    class="flex w-full px-1 text-sm leading-5 text-left text-blue-600 outline-none delete-all-books" 
                                    role="menuitem"
                                    type="submit"
                                    data-url="">
                                        <i class="fas fa-trash mr-[3px] ml-[5px] py-1"></i>
                                        <span style="padding-top: 1px;">Izbriši knjigu</span>
                                    </button>
                                </td>
                                
                                <th class="px-4 py-4 leading-4 tracking-wider text-left checkme" id="arrow">
                                    Ukupna količina
                                </th>

                                <td class="px-3 py-5 leading-4 tracking-wider text-left sakriveno checkme2">
                                </td>

                                <td class="px-4 py-4" id="toggle"></td>
                            </tr>
                        </thead>
                        @endif
                        
                    <tbody class="bg-white" id="tablex">

                     @foreach ($books as $book)

                        @if ($searched != true)
                            <tr class="hover:bg-gray-200 hover:shadow-md  border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input 
                                        type="checkbox" 
                                        id="check" 
                                        value="{{$book->title}}"
                                        data-id="{{$book->id}}"
                                        class="form-checkbox checkbox">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-4">
                                    
                                    <img 
                                    class="object-cover w-8 mr-2 h-11" 
                                    src="{{$book->cover->photo : '/storage/book-covers/' . $book->cover->photo}}" 
                                    alt="Naslovna fotografija" 
                                    title="Naslovna fotografija" />

                                    <a href="{{route('show-book', $book->title)}}">
                                        <span class="font-medium text-center">{{$book->title}}</span>
                                    </a>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                   @if ($book->authors->count() > 0)
                                   @foreach ($book->authors as $author)
                                   {{$loop->first ? '' : '|'}}
                                   {{$author->author->NameSurname}}
                                   @endforeach 
                                   @else  
                                   Nepoznato
                                   @endif
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    @if ($book->categories->count() > 0)
                                    @foreach ($book->categories as $category)
                                    {{$loop->first ? '' : '|'}}
                                    {{$category->category->name}} 
                                    @endforeach
                                    @else  
                                    Nepoznato
                                    @endif
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    {{-- Prevent negative values --}}
                                    @if ($book->quantity_count - ($book->rented_count + $book->reserved_count) < 0)
                                    0
                                    @else
                                    {{$book->quantity_count - ($book->rented_count + $book->reserved_count)}}
                                    @endif
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                        href="{{route('active-reservations')}}">{{$book->reserved_count}}</td>
                                <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                        href="{{route('rented-books')}}">{{$book->rented_count}}</td>

                                <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                        href="{{route('overdue-books')}}">
                                      {{$count}}
                                </td>

                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap checkme">
                                    {{$book->quantity_count}}
                                </td>

                                <td class="px-6 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsKnjige hover:text-[#606FC7]">
                                        <i
                                            class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-knjige">
                                        <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                            aria-labelledby="headlessui-menu-button-1"
                                            id="headlessui-menu-items-117" role="menu">
                                            <div class="py-1">
                                                <a href="{{route('show-book', $book->title)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Pogledaj detalje</span>
                                                </a>
                                                @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
                                                <a href="{{route('edit-book', $book->title)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-edit mr-[6px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izmijeni knjigu</span>
                                                </a>
                                                <a href="{{route('write-off', $book->title)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Otpiši knjigu</span>
                                                </a>
                                                <a href="{{route('rent-book', $book->title)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izdaj knjigu</span>
                                                </a>
                                                <a href="{{route('return-book', $book->title)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Vrati knjigu</span>
                                                </a>
                                                @endif
                                                <a href="{{route('reserve-book', $book->title)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Rezerviši knjigu</span>
                                                </a>
                                            @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
                                            <button 
                                            data-id="{{ $book->id }}" 
                                            data-action="{{ route('books.destroy', $book->id) }}" onclick="deleteConfirmation({{$book->id}})"
                                            style="outline: none;border: none;"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600">
                                            <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">
                                            Izbriši knjigu
                                            </span>
                                            </button> 
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @else
                            <tr class="hover:bg-gray-200 hover:shadow-md  border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input 
                                        type="checkbox" 
                                        id="check" 
                                        value="{{$book->title}}"
                                        data-id="{{$book->id}}"
                                        class="form-checkbox checkbox">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-4">

                                    <img 
                                    class="object-cover w-8 mr-2 h-11" 
                                    src="{{$book->book->placeholder == 1 ? $book->book->cover->photo : '/storage/book-covers/' . $book->book->cover->photo}}" 
                                    alt="Naslovna fotografija" 
                                    title="Naslovna fotografija" />

                                    <a href="{{route('show-book', $book->book->title)}}">
                                        <span class="font-medium text-center">{{$book->book->title}}</span>
                                    </a>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    @foreach ($book->book->authors as $author)
                                    {{$loop->first ? '' : '|'}}
                                    {{$author->author->NameSurname}}
                                    @endforeach
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    @foreach ($book->book->categories as $category)
                                    {{$loop->first ? '' : '|'}}
                                    {{$category->category->name}} 
                                    @endforeach
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$book->book->quantity_count - ($book->book->rented_count + $book->book->reserved_count)}}</td>
                                <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                        href="{{route('active-reservations')}}">{{$book->book->reserved_count}}</td>
                                <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                        href="{{route('rented-books')}}">{{$book->book->rented_count}}</td>

                                <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                        href="{{route('overdue-books')}}">
                                      {{$count}}
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$book->book->quantity_count}}</td>
                                <td class="px-6 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                                    <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsKnjige hover:text-[#606FC7]">
                                        <i
                                            class="fas fa-ellipsis-v"></i>
                                    </p>
                                    <div
                                        class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-knjige">
                                        <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                            aria-labelledby="headlessui-menu-button-1"
                                            id="headlessui-menu-items-117" role="menu">
                                            <div class="py-1">
                                                <a href="{{route('show-book', $book->book->title)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Pogledaj detalje</span>
                                                </a>
                                                @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
                                                <a href="{{route('edit-book', $book->book->title)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-edit mr-[6px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izmijeni knjigu</span>
                                                </a>
                                                <a href="{{route('write-off', $book->book->title)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Otpiši knjigu</span>
                                                </a>
                                                <a href="{{route('rent-book', $book->book->title)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izdaj knjigu</span>
                                                </a>
                                                <a href="{{route('return-book', $book->book->title)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Vrati knjigu</span>
                                                </a>
                                                @endif
                                                <a href="{{route('reserve-book', $book->book->title)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="far fa-calendar-check mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Rezerviši knjigu</span>
                                                </a>
                                                @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
                                                <form action="{{route('destroy-book', $book->book->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button style="outline: none" type="submit" tabindex="0"
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="fa fa-trash mr-[10px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">Izbriši knjigu</span>
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endif

                     @endforeach

                    </tbody>
                    </table>
                  
                    @if (!is_a($books, 'Illuminate\Database\Eloquent\Collection'))
                         <div class="m-3">{!! $books->links() !!}</div> 
                    @endif

                </div>
            @if ($error == false)
            @else
            <div class=" flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">                       
            <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
            <path fill="currentColor"
                            d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
            </path>
            </svg>
            <p class="font-medium text-white">Ne postoji rezultat sa tim kriterijumom! </p>
            </div>
            </div>
            </div>    
             @endif

            @if ($error == false && $books->count() <= 0 && $show_criterium == false)
            <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg 
             @if(Auth::user()->type->id == 1) mt-[-30px] @endif
             ">                       
                <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                    <path fill="currentColor"
                            d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                    </path>
                </svg>
                <p class="font-medium text-white">Trenutno nema knjiga u bazi podataka!</p>
            </div>
            @endif

        @if ($show_criterium == true)
            <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg 
            @if(Auth::user()->type->id == 1) mt-[-30px] @endif
            ">     
               <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                   <path fill="currentColor"
                           d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                   </path>
               </svg>
               <p class="font-medium text-white">Trenutno nema rezultata za "{{$searched_book}}".. &#128533;</p>
           </div>
           <a 
           class="btn-animation inline-flex items-center text-sm py-2 px-3 transition duration-300 ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]"
           href="{{route('all-books')}}"><i class="fas fa-arrow-left mr-[5px]"></i>Nazad</a>
        @endif 
          

    </section>
    <!-- End Content -->

</div>
  
  <script type="text/javascript">
     function deleteConfirmation(id) {
         swal({
             title: "Izbriši?",
             text: "Da li ste sigurni da želite da izbrišete knjigu?",
             type: "warning",
             showCancelButton: !0,
             timer: '5000',
             animation: true,
             allowEscapeKey: true,
             allowOutsideClick: false,
             confirmButtonText: "Da, siguran sam!",
             cancelButtonText: "Ne, odustani",
             reverseButtons: !0,
             confirmButtonColor: '#14de5e',
             cancelButtonColor: '#f73302',
         }).then(function (e) {
             if (e.value === true) {
                 var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                 swal(
                     'Uspješno!',
                     'Knjiga je uspješno izbrisana.',
                     'success'
                     ).then(function() {
                      window.location.href = "/knjige";
                     });
                 $.ajax({
                     type: 'POST',
                     url: "{{url('/knjige')}}/" + id,
                     data: {_token: CSRF_TOKEN},
                     dataType: 'JSON',
                     success: function (results) {
                     }
                 });
             } else {
                 e.dismiss;
             }
         }, function (dismiss) {
             return false;
         })
     }
     $(document).ajaxStop(function(){
  // window.location.reload();
  // window.location.href = "/knjige";
  });
  
  // Script for show a book top header
  function showBook() {
  var title = $('#check:checked').val();
  window.location.href = "/knjiga/" + title;
  }
  // Script for edit a book top header
  function editBook() {
  var title = $('#check:checked').val();
  window.location.href = "/izmijeni-knjigu/" + title;
  }
  // Script for write off a book top header
  function writeOffBook() {
  var title = $('#check:checked').val();
  window.location.href = "/otpisi-knjigu/" + title;
  }
  // Script for rent a book top header
  function rentBook() {
  var title = $('#check:checked').val();
  window.location.href = "/izdaj-knjigu/" + title;
  }
  // Script for return a book top header
  function returnBook() {
  var title = $('#check:checked').val();
  window.location.href = "/vrati-knjigu/" + title;
  }
  // Script for reserve a book top header
  function reserveBook() {
  var title = $('#check:checked').val();
  window.location.href = "/rezervisi-knjigu/" + title;
  }
  </script>
  
  <style>
    .show {
        /* display: inline-block !important; */
    }
    .hidden_header {
        display: none !important;
    }
    .sakriveno {display: none !important}
    .sakriveno_email {display: none !important}
    .hide_toggle {display: none !important}
</style>

<script>
    $('input#check').on('change', function() {  
        if($(this).is(":checked")) {
          var length = $('input#check:checked').length;
          if (length == 1) {
            $('.checkme').addClass('hidden_header');    
            $('.checkme2').addClass('show');    
            $('.checkme2').removeClass('sakriveno');   
            $('#toggle').addClass('hide_toggle');    
           } else {
            $('.checkme').removeClass('hidden_header');    
            $('.checkme2').removeClass('show');    
            $('.checkme2').addClass('sakriveno'); 
            $('#toggle').removeClass('hide_toggle');     
           }
        } else {
            $('.checkme').removeClass('hidden_header');    
            $('.checkme2').removeClass('show');    
            $('.checkme2').addClass('sakriveno');    
            $('#toggle').removeClass('hide_toggle');     
        }
    });
    </script>

  
  <script type="text/javascript">
      $(document).ready(function () {
      $('#check_all').on('click', function(e) {
      if($(this).is(':checked',true))  
      {
      $(".checkbox").prop('checked', true);  
      } else {  
      $(".checkbox").prop('checked',false);  
      }  
      });
      $('.checkbox').on('click',function(){
      if($('.checkbox:checked').length == $('.checkbox').length){
      $('#check_all').prop('checked',true);
      }else{
      $('#check_all').prop('checked',false);
      }
      });
      $('.delete-all-books').on('click', function(e) {
      var idsArr = [];  
      $(".checkbox:checked").each(function() {  
      idsArr.push($(this).attr('data-id'));
      });  
      if(idsArr.length <=0)  
      {  
      swal({
       title: "Greška!",
       text: "Morate selektovati makar jednu knjigu.",
       type: "error",
       timer: 1500,
       confirmButtonText: 'U redu',
       allowEscapeKey: false,
       allowOutsideClick: false,
       });
  
      }  else {  
      if(confirm("Da li ste sigurni?")){  
      var strIds = idsArr.join(","); 
      $.ajax({
      url: "{{ route('delete-all-books') }}",
      type: 'DELETE',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
      data: 'ids='+strIds,
      success: function (data) {
      if (data['status']==true) {
      $(".checkbox:checked").each(function() {  
      $(this).parents("tr").remove();
      });
      alert(data['message']);
      } 
      else {
      swal({
       title: "Uspješno!",
       type: "success",
       timer: 1000,
       confirmButtonText: 'U redu',
       allowEscapeKey: false,
       allowOutsideClick: false,
       }).then(function() {
          window.location.href = "/knjige";
       });
      }
      },
      error: function (data) {
      alert(data.responseText);
      }
      });
      }  
      }  
      });
    //   $('[data-toggle=confirmation]').confirmation({
    //   rootSelector: '[data-toggle=confirmation]',
    //   onConfirm: function (event, element) {
    //   element.closest('form').submit();
    //   }
    //   });   
      });
      </script>
@endsection
