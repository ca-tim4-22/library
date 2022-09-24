@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title> Detalji vraćanja knjige | Online Biblioteka</title>

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
                    src="{{$rent->book->placeholder == 1 ? $rent->book->cover->photo : '/storage/book-covers/' . $rent->book->cover->photo}}" 
                    alt="Naslovna fotografija" 
                    title="Naslovna fotografija" />
                </div>
                <div class="pl-[15px]  flex flex-col">
                    <div>
                        <h1>
                            {{$rent->book->title}}
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
                                    <a href="{{route('show-book', $rent->book->title)}}"
                                        class="text-[#2196f3] hover:text-blue-600">
                                        KNJIGA-{{$rent->book->id}}
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{route('rented-info', $rent->id)}}"
                                        class="text-[#2196f3] hover:text-blue-600">
                                        IZDAVANJE-{{$rent->id}}
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pt-[24px] mr-[30px]">
                <a href="{{route('write-off', $rent->book->id)}}" class="inline hover:text-blue-600">
                    <i class="fas fa-level-up-alt mr-[3px]"></i>
                    Otpiši knjigu
                </a>
                <a href="{{route('rent-book', $rent->book->id)}}" class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                    <i class="far fa-hand-scissors mr-[3px]"></i>
                    Izdaj knjigu
                </a>
                <a href="{{route('return-book', $rent->book->id)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                    <i class="fas fa-redo-alt mr-[3px] "></i>
                    Vrati knjigu
                </a>
                <a href="{{route('reserve-book', $rent->book->title)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                    <i class="far fa-calendar-check mr-[3px] "></i>
                    Rezerviši knjigu
                </a>
                <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsIzdavanjeDetalji hover:text-[#606FC7]">
                    <i
                        class="fas fa-ellipsis-v"></i>
                </p>
                <div
                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-izdavanje-detalji">
                    <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            <a href="{{route('edit-book', $rent->book->title)}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Izmijeni knjigu</span>
                            </a>
                            <form action="{{route('destroy-book', $rent->book->id)}}" method="POST">
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
    <div class="flex flex-row height-detaljiIzdavanje scroll pb-[20px]">
        <div class="">
            <!-- Space for content -->
            <div class="pl-[30px] section- mt-[20px]">
                <div class="flex flex-row justify-between">
                    <div class="mr-[30px]">
                        <div class="mt-[20px]">
                            <span class="text-gray-500">Tip transakcije</span><br>
                            <p
                                class="inline-block bg-blue-200 text-blue-800 rounded-[10px] text-center px-[6px] py-[2px]">
                                Vraćanje knjige
                            </p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Datum akcije</span>
                            <p class="font-medium">
                            @php
                            echo date("d-m-Y", strtotime($rent->issue_date));
                            @endphp
                            </p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Trenutno zadržavanje knjige</span>
                            <p class="font-medium">
                                @php
                                $datetime1 = new DateTime(($rent->issue_date));
                                $datetime2 = new DateTime(($rent->return_date));
                                $interval = $datetime1->diff($datetime2);
                                echo '<span style="color: #2A4AB3">' .  $interval->format('%a dana')  .'</span>';
                                @endphp
                            </p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Prekoračenje</span>
                            <p class="font-medium">
                                @php
                                $date1 = new DateTime("now");
                                $date2 = new DateTime($rent->return_date);
                                $interval = $date1->diff($date2);

                                if ($date1 > $date2) {
                                    if ($interval->days == 1) {
                                       echo "1 dan";
                                    } elseif ($interval->days == 0) {
                                        $interval = 1;
                                        echo $interval . ' dan';
                                    } else {
                                        echo $interval->format('%a dana');
                                    }
                                } else {
                                    echo "Nema prekoračenja";
                                }
                                @endphp
                            </p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Bibliotekar</span>
                            <a href="{{route('show-librarian', $rent->librarian->username)}}"
                                class="block font-medium text-[#2196f3] hover:text-blue-600">{{$rent->librarian->name}}</a>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Učenik</span>
                            <a href="{{route('show-student', $rent->borrow->username)}}"
                                class="block font-medium text-[#2196f3] hover:text-blue-600">{{$rent->borrow->name}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="absolute bottom-0 w-full">
        <div class="flex flex-row">
            <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                <button type="submit"
                    class="btn-animation show-otpisiModal shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#FF470E] bg-[#FF5722]">
                    <i class="fas fa-level-up-alt mr-[4px] "></i> Otpiši knjigu
                </button>
                <button type="submit"
                    class="ml-[10px] btn-animation show-vratiModal shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                    <i class="fas fa-redo-alt mr-[4px] "></i> Vrati knjigu
                </button>
                <button type="button"
                    class="ml-[10px] btn-animation show-izbrisiModal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                    <i class="fas fa-trash mr-[4px]"></i> Izbriši zapis
                </button>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->
</main>
<!-- End Main content -->

<!-- Modal - Vrati Knjigu -->
<div
class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 vrati-modal">
<!-- Modal -->
<div class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
    <!-- Modal Header -->
    <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
        <h3>Da li zelite da vratite knjigu "Tom Sojer" za ucenika "Milos Milosevic"</h3>
    </div>
    <!-- Modal Body -->
    <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
        <button type="button" onclick="history.back()"
            class="close-modal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
            Ponisti <i class="fas fa-times ml-[4px]"></i>
        </button>
        <button type="submit"
            class="shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"">
            Potvrdi <i class="fas fa-check ml-[4px]"></i>
        </button>
    </div>
</div>
</div>

<!-- Modal - Otpisi Knjigu -->
<div
class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 otpisi-modal">
<!-- Modal -->
<div class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
    <!-- Modal Header -->
    <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
        <h3>Da li zelite da otpisete knjigu "Tom Sojer" za ucenika "Milos Milosevic?"</h3>
    </div>
    <!-- Modal Body -->
    <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
        <button type="button" onclick="history.back()"
            class="close-modal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
            Ponisti <i class="fas fa-times ml-[4px]"></i>
        </button>
        <button type="submit"
            class="shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"">
            Potvrdi <i class="fas fa-check ml-[4px]"></i>
        </button>
    </div>
</div>
</div>

<!-- Modal - Izbrisi Zapis -->
<div
class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 izbrisi-modal">
<!-- Modal -->
<div class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
    <!-- Modal Header -->
    <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
        <h3>Da li zelite da izbrisete zapis knjige "Tom Sojer" za ucenika "Milos Milosevic?"</h3>
    </div>
    <!-- Modal Body -->
    <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
        <button type="button" onclick="history.back()"
            class="close-modal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
            Ponisti <i class="fas fa-times ml-[4px]"></i>
        </button>
        <button type="submit"
            class="shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"">
            Potvrdi <i class="fas fa-check ml-[4px]"></i>
        </button>
    </div>
</div>
</div>


@endsection
