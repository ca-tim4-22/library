@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Učenici | Online Biblioteka</title>
    
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
<section class="w-screen h-screen py-4 pl-[60px] text-[#212121]">
    <!-- Heading of content -->
    <div class="heading mt-[7px]" style="margin-top: 10px">
        <h1 style="font-size: 30px" class="pl-[50px] pb-[21px]  border-b-[1px] border-[#e4dfdf]">
            Učenici

    {{-- Session message for student create --}}
    @if (session()->has('success-student'))
        <div id="hideDiv" class="flex p-2 mt-2 mb-1 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Success!</span> {{session('success-student')}}
            </div>
        </div>
    @endif

    {{-- Session message for student delete --}}
    @if (session()->has('student-deleted'))
        <div id="hideDiv" class="flex p-2 mt-2 mb-1 text-sm text-red-700 bg-red-200 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Success!</span> {{session('student-deleted')}}
            </div>
        </div>
    @endif
        </h1>
    </div>
    <!-- Space for content -->
    <div class="scroll height-dashboard">
        <div class="flex items-center justify-between px-[50px] py-4 space-x-3 rounded-lg">
            <a href="{{route('new-student')}}" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                <i class="fas fa-plus mr-[15px]"></i> Novi učenik
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
                        window.location = "{{ $students->url(1) }}&items=" + this.value;
                    };
                </script>

                <div class="relative text-gray-600 focus-within:text-gray-400">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </button>
                    </span>
                    <input id="myInput" type="search" name="q" class="py-2 pl-10 text-sm text-white bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900" placeholder="Traži..." autocomplete="off">
                </div>
            </div>            
        </div>


        <div class="inline-block min-w-full px-[50px] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">
        
            @if (count($students) <= 0)

            <div class="mx-[50px]">
                <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">                       
                    <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                        <path fill="currentColor"
                                d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                        </path>
                    </svg>
                    <p class="font-medium text-white">Trenutno nema registrovanih učenika! </p>
                </div>
            </div>  
                
            @endif


            @if (count($students) > 0)

            <table id="sort" class="shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                <thead class="bg-[#EFF3F6]">
                    <tr class="border-b-[1px] border-[#e4dfdf]">
                        <th class="px-4 py-3 leading-4 tracking-wider text-left text-blue-500">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox">
                            </label>
                        </th>
                        <th class="px-4 py-4 leading-4 tracking-wider text-left" id="arrow">Ime i prezime<a href="#"></a></th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left" id="arrow">Email</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left" id="arrow">Tip korisnika</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left" id="arrow">Zadnji pristup sistemu</th>
                        <th class="px-4 py-4"> </th>
                    </tr>
                </thead>
                <tbody class="bg-white" id="tablex">

                    @foreach ($students as $student)

                     <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                        <td class="px-4 py-4 whitespace-no-wrap">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox">
                            </label>
                        </td>
                        <td class="flex flex-row items-center px-4 py-4">
                                                    
                            <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{$student->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . $student->photo}}"
                            alt="Profilna slika učenika: {{$student->name}}"
                            title="Profilna slika učenika: {{$student->name}}" />

                            <a href="{{route('show-student', $student->username)}}">
                                <span class="font-medium text-center">{{$student->name}}</span>
                            </a>
                        </td>
                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$student->email}}</td>
                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">Učenik</td>
                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$student->login_count == 0 ? 'Korisnik se nikada nije ulogovao.' : $student->last_login_at->diffForHumans()}}</td>
                        <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsStudent hover:text-[#606FC7]">
                                <i class="fas fa-ellipsis-v"></i>
                            </p>
                            <div
                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-student">
                                <div class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                    aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                    <div class="py-1">
                                        <a href="{{route('show-student', $student->username)}}" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Pogledaj detalje</span>
                                        </a>
                                        <a href="{{route('edit-student', $student->username)}}" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">{{Auth::id() == $student->id ? "Izmijeni svoj nalog" : 'Izmijeni učenika'}}</span>
                                        </a>
                                        <form action="{{route('destroy-student', $student->username)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button 
                                                    style="outline: none;border: none;"
                                                    type="submit"
                                                    class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                    role="menuitem">
                                                <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">{{Auth::id() == $student->id ? 'Izbriši svoj nalog' : 'Izbriši učenika'}}</span>
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
            <div class="m-3">{!! $students->links() !!}</div> 
                
            @endif
           
            </div>

        </div>
    </div>

</section>
<!-- End Content -->

</div>

@endsection
