@extends('layouts.dashboard')

<!-- Title -->
<title>Bibliotekari | Online Biblioteka</title>

@section('content')

<x-sidebar></x-sidebar>

<!-- Content -->
<section class="w-screen h-screen py-4 pl-[80px] text-[#333333]">
    <!-- Heading of content -->
    <div class="heading mt-[7px]">
        <h1 class="pl-[30px] pb-[21px] border-b-[1px] border-[#e4dfdf] ">
            Bibliotekari

{{-- Session message for librarian create --}}
@if (session()->has('success-librarian'))
<div class="flex p-2 mt-2 mb-1 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">Success!</span> {{session('success-librarian')}}
    </div>
  </div>
@endif

{{-- Session message for librarian delete --}}
@if (session()->has('librarian-deleted'))
<div class="flex p-2 mt-2 mb-1 text-sm text-red-700 bg-red-200 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
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

        <div
            class="inline-block min-w-full px-[30px] pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">
            <table class="overflow shadow-lg rounded-xl min-w-full border-[1px] border-[#e4dfdf]" id="myTable">
                <thead class="bg-[#EFF3F6]">
                    <tr class="border-[1px] border-[#e4dfdf]">
                        <th class="px-4 py-4 leading-4 tracking-wider text-left text-blue-500">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox">
                            </label>
                        </th>
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">Ime i prezime<a href="#"><i
                                    class="ml-3 fa-lg fas fa-long-arrow-alt-down" onclick="sortTable()"></i></a>
                        </th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Email</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Tip korisnika</th>
                        <th class="px-4 py-4 text-sm leading-4 tracking-wider text-left">Zadnji pristup sistemu
                        </th>
                        <th class="px-4 py-4"> </th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($librarians as $librarian)
                    <tr class="hover:bg-gray-200 hover:shadow-md border-[1px] border-[#e4dfdf]">
                        <td class="px-4 py-4 whitespace-no-wrap">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="form-checkbox">
                            </label>
                        </td>
                        <td class="flex flex-row items-center px-4 py-4">
                            <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{$librarian->photo == 'placeholder' ? '/img/profileExample.jpg' : '/storage/librarians/' . $librarian->photo}}"
                            alt="User Photo"
                            title="User Photo" />
                            <a href="{{route('show-librarian', $librarian->id)}}">
                                <span class="font-medium text-center">{{$librarian->name}}</span>
                            </a>
                        </td>
                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                            {{$librarian->email}}
                        </td>
                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">Bibliotekar</td>
                        <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$librarian->last_login_at->diffForHumans()}}</td>
                        <td class="px-4 py-4 text-sm leading-5 text-right whitespace-no-wrap">
                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsLibrarian hover:text-[#606FC7]">
                                <i class="fas fa-ellipsis-v"></i>
                            </p>
                            <div
                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-librarian">
                                <div class="absolute right-[25px] w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                    aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                    <div class="py-1">
                                        <a href="{{route('show-librarian', $librarian->id)}}" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="far fa-file mr-[5px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Pogledaj detalje</span>
                                        </a>
                                        
                                        <a href="{{route('edit-librarian', $librarian->id)}}" tabindex="0"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">Izmijeni korisnika</span>
                                        </a>

                                        <form action="{{route('destroy-librarian', $librarian->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                role="menuitem">
                                                <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                                <span class="px-4 py-0">Izbriši korisnika</span>
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
            <x-table_settings></x-table_settings>
            {!! $librarians->links() !!}
            </div>

        </div>
    </div>

</section>
<!-- End Content -->
@endsection

