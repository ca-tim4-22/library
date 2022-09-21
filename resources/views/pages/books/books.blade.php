@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Knjige | Online Biblioteka</title>

@endsection

@section('content')
{{-- JQuery CDN --}}
<x-jquery.jquery></x-jquery.jquery>
{{-- Searching functionality --}}
<x-jquery.search></x-jquery.search>
{{-- Preloader --}}
<div id="loader"></div>

<div style="display:none;" id="myDiv">

    <!-- Content -->
<section class="w-screen h-screen py-4 pl-[80px] text-[#333333]">
    <!-- Heading of content -->
    <div class="heading mt-[7px]" style="margin-top: 10px">
        <h1 style="font-size: 30px" class="pl-[30px] pb-[22px] border-b-[1px] border-[#e4dfdf] ">
            Knjige

{{-- Session message for book create --}}
    @if (session()->has('success-book'))
    <div id="hideDiv" class="flex p-2 mt-2 mb-1 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">Success!</span> {{session('success-book')}}
        </div>
    </div>
@endif

{{-- Session message for book delete --}}
@if (session()->has('book-deleted'))
    <div id="hideDiv" class="flex p-2 mt-2 mb-1 text-sm text-red-700 bg-red-200 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">Success!</span> {{session('book-deleted')}}
        </div>
    </div>
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
                <div class="flex items-center">
                    <div class="relative text-gray-600 focus-within:text-gray-400">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                    stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </span>
                        <input id="myInput" type="Traži.." name="q"
                            class="py-2 pl-10 text-sm text-white bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900"
                            placeholder="Traži..." autocomplete="off">
                    </div>
                </div>
            </div>
            <!-- Space for content -->
            <div class="px-[30px] pt-2 bg-white">
                <div class="w-full mt-2">

                    <table id="sort" class="w-full shadow-lg rounded-xl" id="myTable">
                        <!-- Table head-->
                     
                        @if($show == true)
                        <thead class="bg-[#EFF3F6]">
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
                                    </label>
                                </td>

                                <th class="px-4 py-4 leading-4 tracking-wider text-left" id="arrow">
                                    Naziv knjige
                                </th>

                                <!-- Autor + dropdown filter for autor -->
    
                                <form action="{{route('all-books')}}">
                                <td class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">

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
                                                        style="position: absolute;"
                                                        @if(in_array($author->id, $id_a)) checked @endif
                                                        class="opacity-0"
                                                        type="checkbox" name="id_author[]" value="{{$author->id}}">

                                                        <svg class="hidden w-4 h-4 text-green-500 pointer-events-none fill-current"
                                                             viewBox="0 0 20 20">
                                                            <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                                                        </svg>
                                                    </div>
                                                </label>
                                                <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
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

                                <!-- Kategorija + dropdown filter for kategorija -->
                                
                                <form action="{{route('all-books')}}">
                                <td class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left">

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
                                                        style="position: absolute;"
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
                                                width="30px" height="auto"
                                                src="{{$category->default == 'false' ? '/storage/settings/category/' . $category->icon : '/img/default_images_while_migrations/categories/' . $category->icon}}"
                                                alt="{{$category->name}}"
                                                title="{{$category->name}}">
                                                <p class="block p-2 text-black cursor-pointer group-hover:text-blue-600">
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
                                
                                <th class="px-4 py-4 leading-4 tracking-wider text-left" id="arrow">
                                    Na raspolaganju
                                </th>

                                <th class="px-4 py-4 leading-4 tracking-wider text-left" id="arrow">
                                    Rezervisano
                                </th>

                                <th class="px-4 py-4 leading-4 tracking-wider text-left" id="arrow">
                                    Izdato
                                </th>
                                
                                <th class="px-4 py-4 leading-4 tracking-wider text-left" id="arrow">
                                    U prekoračenju
                                </th>
                                
                                <th class="px-4 py-4 leading-4 tracking-wider text-left" id="arrow">
                                    Ukupna količina
                                </th>

                                <td class="px-4 py-4"></td>
                            </tr>
                        </thead>
                        @endif
                        
                        
                        <tbody class="bg-white" id="tablex">

                            @foreach ($books as $book)

                            @if ($searched != true)
                            <tr class="hover:bg-gray-200 hover:shadow-md  border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-4">

                                    <img 
                                    class="object-cover w-8 mr-2 h-11" 
                                    src="{{$book->placeholder == 1 ? $book->cover->photo : '/storage/book-covers/' . $book->cover->photo}}" 
                                    alt="Naslovna fotografija" 
                                    title="Naslovna fotografija" />

                                    <a href="{{route('show-book', $book->title)}}">
                                        <span class="font-medium text-center">{{$book->title}}</span>
                                    </a>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    @foreach ($book->authors as $author)
                                    {{$loop->first ? '' : '|'}}
                                    {{$author->author->NameSurname}}
                                    @endforeach
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    @foreach ($book->categories as $category)
                                    {{$loop->first ? '' : '|'}}
                                    {{$category->category->name}} 
                                    @endforeach
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$book->quantity_count - ($book->rented_count + $book->reserved_count)}}</td>
                                <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                        href="{{route('active-reservations')}}">{{$book->reserved_count}}</td>
                                <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                        href="{{route('rented-books')}}">{{$book->rented_count}}</td>

                                <td class="px-4 py-4 text-sm leading-5 text-blue-800 whitespace-no-wrap"><a
                                        href="{{route('overdue-books')}}">
                                      {{$count}}
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$book->quantity_count}}</td>
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
                                                <a href="{{route('edit-book', $book->id)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-edit mr-[6px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izmijeni knjigu</span>
                                                </a>
                                                <a href="{{route('write-off', $book->id)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Otpiši knjigu</span>
                                                </a>
                                                <a href="{{route('rent-book', $book->id)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izdaj knjigu</span>
                                                </a>
                                                <a href="{{route('return-book', $book->id)}}" tabindex="0"
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
                                                <form action="{{route('destroy-book', $book->id)}}" method="POST">
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
                            @else
                            <tr class="hover:bg-gray-200 hover:shadow-md  border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
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
                                                <a href="{{route('edit-book', $book->book->id)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-edit mr-[6px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izmijeni knjigu</span>
                                                </a>
                                                <a href="{{route('write-off', $book->book->id)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Otpiši knjigu</span>
                                                </a>
                                                <a href="{{route('rent-book', $book->book->id)}}" tabindex="0"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="far fa-hand-scissors mr-[10px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">Izdaj knjigu</span>
                                                </a>
                                                <a href="{{route('return-book', $book->book->id)}}" tabindex="0"
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
                </div>
            @if ($error == false)
            @else
            <div class=" flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">                       
            <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
            <path fill="currentColor"
                            d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
            </path>
            </svg>
            <p class="font-medium text-white">Ne postoji aktivnost sa tim kriterijumom! </p>
            </div>
            </div>
            </div>    
             @endif

             @if ($error == false && $books->count() <= 0)
             <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">                       
                <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                    <path fill="currentColor"
                            d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                    </path>
                </svg>
                <p class="font-medium text-white">Trenutno nema knjiga u bazi podataka! </p>
            </div> 
              @endif

    </section>
    <!-- End Content -->

</div>

{{-- Tailwind --}}
<script src="https://cdn.tailwindcss.com"></script>
@endsection
