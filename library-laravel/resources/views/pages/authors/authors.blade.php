@extends('layouts.dashboard')

<!-- Title -->
<title>Autori | Online Biblioteka</title>

@section('content')

 <!-- Content -->
 <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
    <!-- Heading of content -->
    <div class="heading mt-[7px]">
        <div class="border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[30px] pb-[21px]">
                <h1>
                    Autori

{{-- Session message for author create --}}
@if (session()->has('success-author'))
<div class="flex p-2 mt-2 mb-1 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">Success!</span> {{session('success-author')}}
    </div>
  </div>
@endif

{{-- Session message for author delete --}}
@if (session()->has('author-deleted'))
<div class="flex p-2 mt-2 mb-1 text-sm text-red-700 bg-red-200 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">Success!</span> {{session('author-deleted')}}
    </div>
  </div>
@endif

                </h1>
            </div>
        </div>
    </div>
    <div class="height-autori pb-[30px] scroll">
        <div class="flex items-center px-[30px] py-4 space-x-3 rounded-lg justify-between">
            <a href="{{route('new-author')}}"
                class="btn-animation inline-flex items-center text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] tracking-wider text-white bg-[#3f51b5] rounded hover:bg-[#4558BE]">
                <i class="fas fa-plus mr-[15px]"></i> Novi autor
            </a>
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
                    <input type="search" name="q"
                        class="py-2 pl-10 text-sm text-white bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900"
                        placeholder="Traži..." autocomplete="off">
                </div>
            </div>
        </div>

        <div class="inline-block min-w-full px-[30px] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">

            @if (count($authors) > 0)

            <table class="overflow shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                <thead class="bg-[#EFF3F6]">
                    <tr class="border-b-[1px] border-[#e4dfdf]">
                        <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox">
                            </label>
                        </th>
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">Naziv autora<a href="#"><i
                                    class="ml-3 fa-lg fas fa-long-arrow-alt-down" onclick="sortTable()"></i></a>
                        </th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Opis</th>
                        <th class="px-4 py-4"> </th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($authors as $author)

                    <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                        <td class="px-4 py-3 whitespace-no-wrap">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox">
                            </label>
                        </td>
                        <td class="flex flex-row items-center px-4 py-3">
                            {{-- <img class="object-cover w-8 mr-2 h-11" src="img/profileStudent.jpg" alt="" /> --}}
                            <a href="{{route('show-author', $author->id)}}">
                                <span class="mr-2 font-medium text-center">{{$author->NameSurname}}</span>
                            </a>
                        </td>
                        </td>
                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$author->biography}}</td>
                        <td class="px-4 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsAutori hover:text-[#606FC7]">
                                <i class="fas fa-ellipsis-v"></i>
                            </p>
                            <div
                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-autori">
                                <div class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                    aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                    <div class="py-1">
                                        <a href="{{route('show-author', $author->id)}}" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Pogledaj detalje</span>
                                        </a>
                                        <a href="{{route('edit-author', $author->id)}}" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Izmijeni autora</span>
                                        </a>
                                        <form action="{{ route('destroy-author', $author->id) }}" method="post">
                                            @csrf
                                             @method('DELETE')
                                            <button type="submit" 
                                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                        role="menuitem">
                                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                                        <span class="px-4 py-0">{{Auth::user()->id == $author->id ? "Izbriši nalog" : "Izbriši korisnika"}}</span>
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

            <div class="flex flex-row items-center justify-end mt-2">
                <div>
                    <p class="inline text-md">
                        Broj redova po strani:
                    </p>
                    <select
                        class=" text-gray-700 bg-white rounded-md w-[46px] focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-md"
                        name="ucenici">
                        <option value="">
                            5
                        </option>
                        <option value="">
                            10
                        </option>
                        <option value="">
                            15
                        </option>
                        <option value="">
                            20
                        </option>
                        <option value="">
                            50
                        </option>
                    </select>
                </div>

                <div>
                    <nav class="relative z-0 inline-flex">
                        <div>
                            <a href="#"
                                class="relative inline-flex items-center px-4 py-2 -ml-px font-medium leading-5 transition duration-150 ease-in-out bg-white text-md focus:z-10 focus:outline-none">
                                1 od 1
                            </a>
                        </div>
                        <div>
                            <a href="#"
                                class="relative inline-flex items-center px-2 py-2 font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white text-md rounded-l-md hover:text-gray-400 focus:z-10 focus:outline-none"
                                aria-label="Previous"
                                v-on:click.prevent="changePage(pagination.current_page - 1)">
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                        <div v-if="pagination.current_page < pagination.last_page">
                            <a href="#"
                                class="relative inline-flex items-center px-2 py-2 -ml-px font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white text-md rounded-r-md hover:text-gray-400 focus:z-10 focus:outline-none"
                                aria-label="Next">
                                <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        </div>
                    </nav>
                </div>
            </div>

        </div>
    </div>

    @else

    <div class="mx-[50px]">
        <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">                       
            <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                <path fill="currentColor"
                        d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                </path>
            </svg>
            <p class="font-medium text-white">Trenutno nema autora u bazi podataka! </p>
        </div>
    </div>  

    @endif

</section>
<!-- End Content -->
    
@endsection