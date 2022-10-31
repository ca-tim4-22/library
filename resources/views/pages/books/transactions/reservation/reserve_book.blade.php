@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Rezerviši knjigu | Online Biblioteka</title>

@endsection

@section('content')

 <!-- Content -->
 <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
    <!-- Heading of content -->
    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="py-[10px] flex flex-row">
                <div class="w-[77px] pl-[30px]">
                    <img 
                    src="{{$book->placeholder == 1 ? $book->cover->photo : '/storage/book-covers/' . $book->cover->photo}}" 
                    alt="Naslovna fotografija" 
                    title="Naslovna fotografija" />
                </div>
                <div class="pl-[15px]  flex flex-col">
                    <div>
                        <h1>
                            {{$book->title}}
                        </h1>
                    </div>
                    <div>
                        <nav class="w-full rounded">
                            <ol class="flex list-reset">
                                <li>
                                    <a href="{{route('all-books')}}" class="text-[#2196f3] hover:text-blue-600">
                                        Evidencija knjiga
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{route('show-book', $book->title)}}"
                                        class="text-[#2196f3] hover:text-blue-600">
                                        KNJIGA-{{$book->id}}
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{route('reserve-book', $book->title)}}"
                                        class="text-[#2196f3] hover:text-blue-600">
                                        Rezerviši knjigu
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
            <div class="pt-[24px] mr-[30px]">
                <a href="{{route('write-off', $book->title)}}" class="inline hover:text-blue-600">
                    <i class="fas fa-level-up-alt mr-[3px]"></i>
                    Otpiši knjigu
                </a>
                <a href="{{route('rent-book', $book->title)}}" class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                    <i class="far fa-hand-scissors mr-[3px]"></i>
                    Izdaj knjigu
                </a>
                <a href="{{route('return-book', $book->title)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                    <i class="fas fa-redo-alt mr-[3px] "></i>
                    Vrati knjigu
                </a>
                <a href="{{route('reserve-book', $book->title)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                    <i class="far fa-calendar-check mr-[3px] "></i>
                    Rezerviši knjigu
                </a>
                <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsRezervisiKnjigu hover:text-[#606FC7]">
                    <i
                        class="fas fa-ellipsis-v"></i>
                </p>
                <div
                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-rezervisi-knjigu">
                    <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            <a href="{{route('edit-book', $book->title)}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Izmijeni knjigu</span>
                            </a>

                            <form action="{{route('destroy-book', $book->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button style="outline: none" type="submit"  tabindex="0"
                                   class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                   role="menuitem">
                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                    <span class="px-4 py-0">Izbriši knjigu</span>
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <!-- Space for content -->
    <div class="scroll height-content section-content">

        <form class="text-gray-700" action="{{route('store-reserve-book', $book->id)}}" method="POST">
            @csrf
            @method('POST')

            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[100px]">
                    <h3 class="mt-[20px] mb-[10px]">Rezerviši knjigu

{{-- Session message for successfully sent reservation request --}}
@if (session()->has('reservation-sent'))
<div id="hideDiv" class="flex p-2 mt-2 mb-1 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">Uspješno!</span> {{session('reservation-sent')}}
    </div>
  </div>
@endif   

{{-- Session message for failed reservation request --}}
@if (session()->has('reservation-failed'))
<div id="hideDiv" class="flex p-3 mt-2 mb-1 text-sm text-red-700 bg-red-200 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">Bezuspješno!</span> {{session('reservation-failed')}}
    </div>
</div>
<div class="flex p-4 mt-2 mb-1 text-sm text-white bg-blue-700 rounded-lg" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
        <span class="font-medium">Informacija!</span> Kontaktirajte bibliotekara kako biste mogli istovremeno rezervisati više knjiga (promijenite paket).
    </div>
</div>
@endif   



                    </h3>
                    <div class="mt-[20px]">
                        @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
                        <span>Izaberi učenika za koga se knjiga rezerviše <span class="text-red-500">* @error('reservationMadeFor_user_id'){{$message}} @enderror</span></span>
                       <select class="flex w-[90%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="reservationMadeFor_user_id">
                        <option disabled selected></option>
                        @foreach($students as $student)
                            <option value="{{$student->id}}">
                                {{$student->name}}
                            </option>
                        @endforeach
                        @else
                        <span>Korisnik</span>

                        <select class="flex w-[90%] mt-2 px-2 py-2 border bg-gray-300 border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" id="reservationMadeFor_user_id" for="reservationMadeFor_user_id" name="reservationMadeFor_user_id">
                            <option value="{{Auth::id()}}">
                                {{Auth::user()->name}}
                            </option>
                        </select>  
                        
                        @endif
                        </select>
                    </div>
                    <div class="mt-[20px]">
                        <p>Datum rezervisanja <span class="text-red-500">*</span></p>
                        <label class="text-gray-700" for="date">
                            <input type="date" name="reservation_date" id="datumRezervisanja"
                                class="flex w-[50%] mt-2 px-4 py-2 text-base placeholder-gray-400 bg-white border border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                onclick="clearErrorsDatumRezervisanja()"
                                max="{{$max_date}}"
                                value="{{$today}}"
                                />

                        </label>
                        <div id="validateDatumRezervisanja"></div>
                    </div>
                </div>
            </div>

            <div class="absolute bottom-0 w-full bg-white">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                        <button type="button" onclick="history.back()"
                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Poništi <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button id="rezervisiKnjigu" type="submit"
                            class="mr-[40px] mb-[10px] btn-animation shadow-lg disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                            Rezerviši knjigu <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- End Content -->

@endsection
