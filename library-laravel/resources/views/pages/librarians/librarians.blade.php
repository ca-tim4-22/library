@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Bibliotekari | Online Biblioteka</title>
    
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
            Bibliotekari

{{-- Session message for librarian create --}}
@if (session()->has('success-librarian'))
<div id="hideDiv" class="flex p-2 mt-2 mb-1 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">Success!</span> {{session('success-librarian')}}
    </div>
  </div>
@endif

{{-- Session message for librarian delete --}}
@if (session()->has('librarian-deleted'))
<div id="hideDiv" class="flex p-2 mt-2 mb-1 text-sm text-red-700 bg-red-200 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">Success!</span> {{session('librarian-deleted')}}
    </div>
</div>
@endif
        </h1>
    </div>

    <!-- Space for content -->
    <div class="scroll height-dashboard">
        <div class="flex items-center justify-between px-[30px] py-4 space-x-3 rounded-lg">
            <a href="{{ route('new-librarian') }}" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                <i class="fas fa-plus mr-[15px]"></i> Novi bibliotekar
            </a>
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
                    <select id="pagination">
                        <option value="5" @if($items == 5) selected @endif >5</option>
                        <option value="10" @if($items == 10) selected @endif >10</option>
                        <option value="25" @if($items == 25) selected @endif >25</option>
                        <option value="50" @if($items == 50) selected @endif >50</option>
                        <option value="100" @if($items == 100) selected @endif >100</option>
                    </select>
                </form>

                <script>
                    document.getElementById('pagination').onchange = function() {
                        window.location = "{{ $librarians->url(1) }}&items=" + this.value;
                    };
                </script>

                <div class="relative text-gray-600 focus-within:text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </button>
                    </span>
                    <input id="myInput" type="search" name="q"
                        class="py-2 pl-10 text-sm text-white bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900"
                        placeholder="Traži..." autocomplete="off">
                </div>
            </div>
        </div>
        
        <div class="inline-block min-w-full px-[30px] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">

            @if (count($librarians) <= 0)

            <div class="mx-[50px]">
                <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">                       
                    <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                        <path fill="currentColor"
                                d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                        </path>
                    </svg>
                    <p class="font-medium text-white">Trenutno nema registrovanih bibliotekara! </p>
                </div>
            </div>  
                
            @endif

            @if (count($librarians) > 0)

            <table id="sort" class="overflow shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                <thead class="bg-[#EFF3F6]">
                    <tr class="border-[1px] border-[#e4dfdf]">
                        <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox">
                            </label>
                        </th>
                        <th class="px-4 py-4 leading-4 tracking-wider text-left changeme" id="arrow">
                            Ime i prezime
                        </th>
                        
                        <th class="px-4 py-4 leading-4 tracking-wider text-left changeme" id="arrow">
                            Email
                        </th>

                        <th class="px-4 py-4 leading-4 tracking-wider text-left changeme" id="arrow">
                            Tip korisnika
                        </th>
                      
                        <th class="px-4 py-4 leading-4 tracking-wider text-left changeme" id="arrow">
                            Zadnji pristup sistemu
                        </th>

                        <th class="px-4 py-4"> </th>
                    </tr>
                </thead>
                <tbody class="bg-white" id="tablex">

                    @foreach ($librarians as $librarian)
                    <tr class="hover:bg-gray-200 hover:shadow-md border-[1px] border-[#e4dfdf]">
                        <td class="px-4 py-4 whitespace-no-wrap">
                            <label class="inline-flex items-center">
                                <input type="checkbox" id="test" class="form-checkbox">
                            </label>
                        </td>
                        <td class="flex flex-row items-center px-4 py-4">
                            
                            <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{$librarian->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/librarians/' . $librarian->photo}}"
                            alt="Profilna slika bibliotekara: {{$librarian->name}}"
                            title="Profilna slika bibliotekara: {{$librarian->name}}" />

                            <a href="{{route('show-librarian', $librarian->username)}}">
                                <span class="font-medium text-center">{{$librarian->name}}</span>
                            </a>
                        </td>
                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                            {{$librarian->email}}
                        </td>
                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">Bibliotekar</td>
                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$librarian->login_count == 0 ? 'Korisnik se nikada nije ulogovao.' : $librarian->last_login_at->diffForHumans()}}</td>
                        <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsLibrarian hover:text-[#606FC7]">
                                <i class="fas fa-ellipsis-v"></i>
                            </p>
                            <div
                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-librarian">
                                <div class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                    aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                    <div class="py-1">
                                        <a href="{{route('show-librarian', $librarian->username)}}" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Pogledaj detalje</span>
                                        </a>
                                        
                                        <a href="{{route('edit-librarian', $librarian->username)}}" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                            <span class="px-3 py-0">
                                                @if (Auth::id() == $librarian->id)
                                                Izmijeni svoj nalog 
                                                @elseif ($librarian->gender->id == 1)
                                                Izmijeni bibliotekara
                                                @else 
                                                Izmijeni bibliotekarku
                                                @endif
                                            </span>
                                        </a>

                                        <form onsubmit="return confirm('Da li ste sigurni?');" action="{{route('destroy-librarian', $librarian->username)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                    style="outline: none;border: none;"
                                                    type="submit"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                                    <span class="px-4 py-0">
                                                        @if (Auth::id() == $librarian->id)
                                                        Izbriši svoj nalog 
                                                        @elseif ($librarian->gender->id == 1)
                                                        Izbriši bibliotekara
                                                        @else 
                                                        Izbriši bibliotekarku
                                                        @endif
                                                    </span>
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

            <script src="https://cdn.tailwindcss.com"></script>
            <div class="m-3">{!! $librarians->links() !!}</div>

            </div>

            @endif
        </div>
    </div>
</div>
</section>
<!-- End Content -->

@endsection


