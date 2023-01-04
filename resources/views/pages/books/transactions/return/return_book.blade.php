@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Vrati knjigu | Online biblioteka</title>

@endsection

@section('content')
{{-- Search --}}
<script src="{{asset('js/search-jquery.js')}}"></script>

 <!-- Content -->
 <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
    <!-- Heading of content -->
    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="py-[10px] flex flex-row">
                <div class="w-[77px] pl-[30px]">
                    <img 
                    src="{{$get_book->placeholder == 1 ? $get_book->cover->photo : '/storage/book-covers/' . $get_book->cover->photo}}" 
                    alt="Naslovna fotografija" 
                    title="Naslovna fotografija" />
                </div>
                <div class="pl-[15px]  flex flex-col">
                    <div>
                        <h1>
                            {{$get_book->title}}
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
                                    <a href="{{route('show-book', $get_book->title)}}"
                                        class="text-[#2196f3] hover:text-blue-600">
                                        KNJIGA-{{$get_book->id}}
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{route('return-book', $get_book->title)}}" class="text-[#2196f3] hover:text-blue-600">
                                        Vrati knjigu
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pt-[24px] mr-[30px]">
                <a href="{{route('write-off', $get_book->title)}}" class="inline hover:text-blue-600">
                    <i class="fas fa-level-up-alt mr-[3px]"></i>
                    Otpiši knjigu
                </a>
                <a href="{{route('rent-book', $get_book->title)}}" class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                    <i class="far fa-hand-scissors mr-[3px]"></i>
                    Izdaj knjigu
                </a>
                <a href="{{route('reserve-book', $get_book->title)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                    <i class="far fa-calendar-check mr-[3px] "></i>
                    Rezerviši knjigu
                </a>
                <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsVratiKnjigu hover:text-[#606FC7]">
                    <i class="fas fa-ellipsis-v"></i>
                </p>
                <div
                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-vrati-knjigu">
                    <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            <a href="{{route('edit-book', $get_book->title)}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Izmijeni knjigu</span>
                            </a>

                            <form action="{{route('destroy-book', $get_book->id)}}" method="POST">
                                @csrf 
                                @method('DELETE')
                                <button
                                        style="outline: none;border: none;"
                                        type="submit"
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

    <div class="scroll height-dashboard px-[30px]">
        <div class="flex items-center justify-between py-4 pt-[20px] space-x-3 rounded-lg">
            <h3>
                Vrati knjigu
            </h3>
            <div class="relative text-gray-600 focus-within:text-gray-400">
                <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                    <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                            <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </button>
                </span>
                <input type="search" id="myInput"
                    class="py-2 pl-10 border-[#e4dfdf] text-sm text-white border-[1px] bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900"
                    placeholder="{{__('Traži..')}}" autocomplete="off">
            </div>
        </div>

        <div
            class="inline-block min-w-full pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">

            <form action="{{route('store-return-book')}}" method="POST">
            @csrf

            @if (!$data == [])

            <table class="min-w-full border-[1px] border-[#e4dfdf]" id="vratiKnjiguTable">
                <thead class="bg-[#EFF3F6]">
                    <tr class="border-b-[1px] border-[#e4dfdf]">
                        <th class="px-4 py-3 leading-4 tracking-wider text-left text-blue-500">
                            <label class="inline-flex items-center">
                                <input type="checkbox" class="select-all form-checkbox">
                            </label>
                        </th>
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">
                            Izdato učeniku
                        </th>
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">
                            Datum izdavanja
                        </th>
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">
                            Trenutno zadržavanje knjige
                        </th>
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">
                            Prekoračenje u danima
                        </th>
                        <th class="px-4 py-4 leading-4 tracking-wider text-left">
                            Knjigu izdao
                        </th>
                    </tr>
                </thead>

                <tbody id="tablex" class="bg-white">

                   @foreach ($data as $rent)
                   
                   <tr class="border-b-[1px] border-[#e4dfdf]">
                    <td class="px-4 py-4 whitespace-no-wrap">
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="id2" value="{{$rent->rent->id}}" class="form-checkbox">
                        </label>
                    </td>
                    <td class="flex flex-row items-center px-4 py-4">
                            <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{$rent->rent->borrow->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . $rent->rent->borrow->photo}}"
                            alt="Profilna fotografija učenika: {{$rent->rent->borrow->name}}"
                            title="Profilna fotografija učenika: {{$rent->rent->borrow->name}}" />
                        <a href="{{route('show-student', $rent->rent->borrow->username)}}">
                            <span class="font-medium text-center">{{$rent->rent->borrow->name}}</span>
                        </a>
                    </td>
                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                     @php
                     echo date("d-m-Y", strtotime($rent->rent->issue_date));
                     @endphp
                    </td>
                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                        <span>

                            <?php
                             if ($variable->value % 10 == 1 || $variable->value % 10 == 11 || $variable->value == 1) {
                             $day = "dan";
                             } else {
                             $day = "dana";
                             }  
                            $datetime1 = new DateTime(($rent->rent->issue_date));
                            $datetime2 = new DateTime(($rent->rent->return_date));
                            $interval = $datetime1->diff($datetime2);
                            echo '<span style="color: #2A4AB3">' .  $interval->format('%a '. $day)  .'</span>';
                            ?>
                            </span>
                    </td>
                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">Nema prekoračenja</td>
                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$rent->rent->librarian->name}}</td>
                   </tr>

                   @endforeach

                </tbody>
            </table>

        </div>

        @else

        <div class="mx-[50px]">
            <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">
                <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                    <path fill="currentColor"
                            d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                    </path>
                </svg>
                <p class="font-medium text-white">Trenutno nema izdatih knjiga za vraćanje! </p>
            </div>
        </div>
    </div>

    @endif
   
    <div class="absolute bottom-0 w-full">
        <div class="flex flex-row">
            <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">

                <button type="button" onclick="history.back()"
                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                    Poništi <i class="fas fa-times ml-[4px]"></i>
                </button>

                <button type="submit"
                class="mr-[50px] mb-[10px] btn-animation disabled-btn shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                disabled>
                Vrati knjigu <i class="fas fa-check ml-[4px]"></i>
               </button>
               </form>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->

@endsection
