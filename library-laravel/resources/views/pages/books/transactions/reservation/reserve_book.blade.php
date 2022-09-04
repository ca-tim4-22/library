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
                    <img src="{{'/storage/book-covers/' . $book->gallery->photo}}" alt="Naslovna" title="Naslovna">
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
                                    <a href="{{route('show-book', $book->id)}}"
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
            <div class="pt-[24px] mr-[30px]">
                <a href="otpisiKnjigu.php" class="inline hover:text-blue-600">
                    <i class="fas fa-level-up-alt mr-[3px]"></i>
                    Otpiši knjigu
                </a>
                <a href="{{route('rent-book', $book->id)}}" class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                    <i class="far fa-hand-scissors mr-[3px]"></i>
                    Izdaj knjigu
                </a>
                <a href="{{route('return-book', $book->id)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
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
                            <a href="{{route('edit-book', $book->id)}}" tabindex="0"
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
        </div>
    </div>
    <!-- Space for content -->
    <div class="scroll height-content section-content">

        <form class="text-gray-700" action="{{route('store-reserve-book', $book->id)}}" method="POST">
            @csrf
            @method('POST')

            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[100px]">
                    <h3 class="mt-[20px] mb-[10px]">Rezerviši knjigu</h3>
                    <div class="mt-[20px]">
                        <p>Izaberi učenika za koga se knjiga rezerviše <span class="text-red-500">*</span></p>
                       <select class="flex w-[90%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                    name="reservationMadeFor_user_id" id="ucenikIzdavanje" onclick="clearErrorsUcenikIzdavanje()">
                                    <option disabled selected></option>
                                    @foreach($students as $student)
                                    <option value="{{$student->id}}">
                                        {{$student->name}}
                                    </option>
                                    @endforeach
                                </select>
                        <div id="validateUcenikRezervisanje"></div>
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
                        <button type="button"
                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Poništi <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button id="rezervisiKnjigu" type="submit"
                            class="btn-animation shadow-lg disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                            onclick="validacijaRezervisanje()">
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