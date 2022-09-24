@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Izdaj knjigu | Online Biblioteka</title>

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
                                                {{$book->title}}
                                            </a>
                                        </li>
                                        <li>
                                            <span class="mx-2">/</span>
                                        </li>
                                        <li>
                                            <a href="{{route('rent-book', $book->id)}}"
                                               class="text-[#2196f3] hover:text-blue-600">
                                                Izdaj knjigu
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
                        <a href="{{route('return-book', $book->id)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                            <i class="fas fa-redo-alt mr-[3px] "></i>
                            Vrati knjigu
                        </a>
                        <a href="{{route('reserve-book', $book->title)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                            <i class="far fa-calendar-check mr-[3px] "></i>
                            Rezerviši knjigu
                        </a>
                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsIzdajKnjigu hover:text-[#606FC7]">
                            <i
                                class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-izdaj-knjigu">
                            <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                 aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <a href="{{route('edit-book', $book->title)}}" tabindex="0"
                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                       role="menuitem">
                                        <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Izmijeni knjigu</span>
                                    </a>
                                    <a href="{{route('destroy-book', $book->id)}}" tabindex="0"
                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                       role="menuitem">
                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Izbriši knjigu</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Space for content -->
            <div class="scroll height-content section-content">
                <form class="text-gray-700" action="{{route('store-rent-book', $book->id)}}" method="POST">
                    {{ csrf_field() }}
                    @method('POST')
                    <div class="flex flex-row ml-[30px]">
                        <div class="w-[50%] mb-[100px] mr-[100px]">
                            <h3 class="mt-[20px] mb-[10px]">Izdaj knjigu</h3>
                            <div class="mt-[20px]">
                                <span>Izaberi učenika koji zadužuje knjigu <span class="text-red-500">* @error('borrow_user_id'){{$message}} @enderror</span></span>
                                <select
                                    class="flex w-[90%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                    name="borrow_user_id" id="borrow_user_id" onclick="clearErrorsUcenikIzdavanje()">
                                    <option disabled selected></option>
                                    @foreach($students as $student)
                                    <option value="{{$student->id}}">
                                        {{$student->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-[20px] flex justify-between w-[90%]">
                                <div class="w-[50%]">
                                    <p>Datum izdavanja <span class="text-red-500">*</span></p>
                                    <label class="text-gray-700" for="date">
                                        <input type="date" value="{{$current_one}}" name="issue_date" id="datumIzdavanja"
                                               class="flex w-[90%] mt-2 px-4 py-2 text-base placeholder-gray-400 bg-white border border-gray-300 appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                               onclick="clearErrorsDatumIzdavanja();"
                                               onchange="funkcijaDatumVracanja();" />
                                    </label>
                                    <div id="validateDatumIzdavanja"></div>
                                </div>
                                <div class="w-[50%]">
                                    <p>Datum vraćanja</p>
                                    <label class="text-gray-700" for="date">
                                        <input type="text" name="return_date" id="datumVracanja"
                                               class="flex w-[90%] mt-2 px-2 py-2 text-base text-gray-400 bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" value="{{$current_two}}" readonly="readonly"
                                              />
                                    </label>

                                    {{-- Script for return date --}}
                                    <script>
                                        function funkcijaDatumVracanja() {
                                        var selectedDate = new Date($('#datumIzdavanja').val());
                                        var numberOfDaysToAdd = {{$variable->value}};

                                        selectedDate.setDate(selectedDate.getDate() + numberOfDaysToAdd);

                                        var day = selectedDate.getDate();
                                        var month = selectedDate.getMonth() + 1;
                                        var year = selectedDate.getFullYear();

                                        var newDate = [month, day, year].join('/');

                                        document.getElementById('datumVracanja').value = newDate;
                                     }
                                    </script>

                                    <div>
                                        <p>Rok vraćanja: <span class="color">{{$variable->value}} dana</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-[50%] mb-[100px]">
                            <div class="border-[1px] border-[#e4dfdf] w-[360px] mt-[75px]">
                                <h2 class="mt-[20px] ml-[30px]">KOLIČINE</h2>
                                <div class="ml-[30px] mr-[70px] mt-[20px] flex flex-row justify-between">
                                    <div class="text-gray-500 ">
                                        <p>Na raspolaganju:</p>
                                        <p class="mt-[20px]">Rezervisano:</p>
                                        <p class="mt-[20px]">Izdato:</p>
                                        <p class="mt-[20px]">U prekoračenju:</p>
                                        <p class="mt-[20px]">Ukupna količina:</p>
                                    </div>
                                    <div class="text-center pb-[30px]">
                                        <p class=" bg-green-200 text-green-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                            {{$book->quantity_count - ($book->rented_count + $book->reserved_count) >= 0 ? $book->quantity_count - ($book->rented_count + $book->reserved_count) : "0"}}
                                            @php
                                            if ($book->quantity_count - ($book->rented_count + $book->reserved_count) % 10 == 1 || $book->quantity_count - ($book->rented_count + $book->reserved_count) % 10 == 11 || $book->quantity_count - ($book->rented_count + $book->reserved_count) == 1) {
                                            echo "primjerak";
                                            } elseif ($book->quantity_count - ($book->rented_count + $book->reserved_count) % 10 == 2 || $book->quantity_count - ($book->rented_count + $book->reserved_count) % 10 == 3 || $book->quantity_count - ($book->rented_count + $book->reserved_count) % 10 == 4) {
                                             echo "primjerka";
                                            } else {
                                            echo "primjeraka";
                                            }
                                            @endphp
                                        </p>
                                        <a href="{{route('active-reservations')}}">
                                            <p class=" mt-[16px] bg-yellow-200 text-yellow-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                            {{$book->reserved_count >= 0 ? $book->reserved_count : "0"}}
                                            @php
                                            if ($book->reserved_count % 10 == 1 || $book->reserved_count % 10 == 11 || $book->reserved_count == 1) {
                                            echo "primjerak";
                                            } elseif ($book->reserved_count % 10 == 2 || $book->reserved_count % 10 == 3 || $book->reserved_count % 10 == 4) {
                                            echo "primjerka";
                                            } else {
                                            echo "primjeraka";
                                            }
                                            @endphp
                                        </p>
                                        </a>
                                        <a href="{{route('rented-books')}}">
                                            <p class=" mt-[16px] bg-blue-200 text-blue-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                            {{$book->rented_count >= 0 ? $book->rented_count : "0"}}
                                            @php
                                            if ($book->rented_count % 10 == 1 || $book->rented_count % 10 == 11) {
                                            echo "primjerak";
                                            } elseif ($book->rented_count % 10 == 2 || $book->rented_count % 10 == 3 || $book->rented_count % 10 == 4) {
                                            echo "primjerka";
                                            } else {
                                            echo "primjeraka";
                                            }
                                            @endphp
                                        </a>

                                        <a href="{{route('overdue-books')}}">
                                            <p class=" mt-[16px] bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                                {{$count}} {{$text}}
                                            </p>
                                        </a>
                                        <p class=" mt-[16px] border-[1px] border-green-700 text-green-700 rounded-[10px] px-[6px] py-[2px] text-[14px]">
                                    {{$book->quantity_count >= 0 ? $book->quantity_count : "0"}}
                                    @php
                                    if ($book->quantity_count % 10 == 1 && $book->quantity_count != 11) {
                                    echo "primjerak";
                                    } elseif ($book->quantity_count % 10 == 2 || $book->quantity_count % 10 == 3 || $book->quantity_count % 10 == 4) {
                                    echo "primjerka";
                                    } else {
                                    echo "primjeraka";
                                    }
                                    @endphp
                                            </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="absolute bottom-0 w-full">
                        <div class="flex flex-row">
                            <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                                <button type="reset" onclick="history.back()"
                                        class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                    Poništi <i class="fas fa-times ml-[4px]"></i>
                                </button>
                                <button id="izdajKnjigu" type="submit"
                                        class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                                        onclick="validacijaIzdavanje()">
                                    Izdaj knjigu <i class="fas fa-check ml-[4px]"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- End Content -->

        <x-jquery.jquery></x-jquery.jquery>

@endsection
