@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title> Detalji rezervacije knjige | Online biblioteka</title>

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
                            src="{{'/storage/book-covers/' . $reservation->book->cover->photo}}"
                            alt="Naslovna fotografija"
                            title="Naslovna fotografija"/>
                </div>
                <div class="pl-[15px]  flex flex-col">
                    <div>
                        <h1>
                            {{$reservation->book->title}}
                        </h1>
                    </div>
                    <div>
                        <nav class="w-full rounded">
                            <ol class="flex list-reset">
                                <li>
                                    <a href="{{route('all-books')}}"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        Evidencija knjiga
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{route('show-book', $reservation->book->title)}}"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        KNJIGA-{{$reservation->book->id}}
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{route('reserved-info', $reservation->id)}}"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        REZERVACIJA-{{$reservation->id}}
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pt-[24px] mr-[30px]">
                <a href="{{route('write-off', $reservation->book->title)}}"
                   class="inline hover:text-blue-600">
                    <i class="fas fa-level-up-alt mr-[3px]"></i>
                    Otpiši knjigu
                </a>
                <a href="{{route('rent-book', $reservation->book->title)}}"
                   class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                    <i class="far fa-hand-scissors mr-[3px]"></i>
                    Izdaj knjigu
                </a>
                <a href="{{route('return-book', $reservation->book->title)}}"
                   class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                    <i class="fas fa-redo-alt mr-[3px] "></i>
                    Vrati knjigu
                </a>
                <a href="{{route('reserve-book', $reservation->book->title)}}"
                   class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
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
                         aria-labelledby="headlessui-menu-button-1"
                         id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            <a href="{{route('edit-book', $reservation->book->title)}}"
                               tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                               role="menuitem">
                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Izmijeni knjigu</span>
                            </a>
                            <form action="{{route('destroy-book', $reservation->book->id)}}"
                                  method="POST">
                                @csrf @honeypot
                                @method('DELETE')
                                <button style="outline: none" type="submit"
                                        tabindex="0"
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
                                Rezervacija knjige
                            </p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Datum akcije</span>
                            <p class="font-medium">
                                @php
                                echo date("d-m-Y",
                                strtotime($reservation->reservation_date));
                                @endphp
                            </p>
                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">Trenutno zadržavanje knjige</span>
                            <p class="font-medium">
                                @php
                                $datetime1 = new
                                DateTime(($reservation->reservation_date));
                                $datetime2 = new
                                DateTime(($reservation->request_date));
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
                                $date2 = new
                                DateTime($reservation->request_date);
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
                            <span class="text-gray-500">{{$reservation->made_by->gender->id == 1 ? 'Bibliotekar' : 'Bibliotekarka'}}</span>

                            {{-- If admin reserved a book --}}
                            @if ($reservation->made_by->type->id == 2)
                            <a href="{{route('show-librarian', $reservation->made_by->username)}}"
                               class="block font-medium text-[#2196f3] hover:text-blue-600">
                                {{$reservation->made_by->name}}
                                <a>
                                    @else
                                    <a href="{{route('show-admin', $reservation->made_by->username)}}"
                                       class="block font-medium text-[#2196f3] hover:text-blue-600">
                                        {{$reservation->made_by->name}}
                                        <a>
                                            @endif

                        </div>
                        <div class="mt-[40px]">
                            <span class="text-gray-500">{{$reservation->made_for->gender->id == 1 ? 'Učenik' : 'Učenica'}}</span>
                            <a href="{{route('show-student', $reservation->made_for->username)}}"
                               class="block font-medium text-[#2196f3] hover:text-blue-600">{{$reservation->made_for->name}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->
</main>
<!-- End Main content -->


@endsection
