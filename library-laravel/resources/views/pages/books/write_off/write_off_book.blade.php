@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Otpiši knjigu | Online Biblioteka</title>

@endsection

@section('content')

 <!-- Content -->
 <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
    <!-- Heading of content -->
    <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="py-[10px] flex flex-row">
                <div class="w-[77px] pl-[30px]">
                    @foreach ($book->gallery->where('cover', 1)->get() as $cover_photo)
                    <img 
                    src="{{'/storage/book-covers/' . $cover_photo->photo}}" 
                    alt="Naslovna fotografija" 
                    title="Naslovna fotografija" />
                    @endforeach
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
                                    <a href="{{route('write-off', $book->id)}}" class="text-[#2196f3] hover:text-blue-600">
                                        Otpiši knjigu
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="pt-[24px] mr-[30px]">
                <a href="{{route('write-off', $book->id)}}" class="inline hover:text-blue-600">
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
                <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsOtpisiKnjigu hover:text-[#606FC7]">
                    <i
                        class="fas fa-ellipsis-v"></i>
                </p>
                <div
                    class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-otpisi-knjigu">
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

    <div class="scroll height-dashboard px-[30px]">
        <div class="flex items-center justify-between py-4 pt-[20px] space-x-3 rounded-lg">
            <h3>
                Otpiši knjigu
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
                <input type="search" name="q"
                    class="py-2 pl-10 border-[#e4dfdf] text-sm text-white border-[1px] bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900"
                    placeholder="Traži..." autocomplete="off">
            </div>
        </div>

        <div
            class="inline-block min-w-full pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">

            <form action="{{route('update-write-off', $book->id)}}" method="POST">
            @csrf

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
                <tbody class="bg-white">

                  @foreach ($book->rent as $rent)

                  <tr class="border-b-[1px] border-[#e4dfdf]">
                    <td class="px-4 py-4 whitespace-no-wrap">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox" value="{{$rent->borrow->id}}" name="checkbox">
                        </label>
                    </td>
                    <td class="flex flex-row items-center px-4 py-4">
                        <img class="object-cover w-8 h-8 mr-2 rounded-full" src="{{$rent->borrow->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . $rent->borrow->photo}}"
                        alt="Profilna slika učenika: {{$rent->borrow->name}}"
                        title="Profilna slika učenika: {{$rent->borrow->name}}" />
                        <a href="{{route('show-student', $rent->borrow->username)}}">
                            <span class="font-medium text-center">{{$rent->borrow->name}}</span>
                        </a>
                    </td>
                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                        @php
                        echo date("d-m-Y", strtotime($rent->issue_date));
                        @endphp
                    </td>
                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                    @php
                        $datetime1 = new DateTime(($rent->issue_date));
                        $datetime2 = new DateTime(($rent->return_date));
                        $interval = $datetime1->diff($datetime2);
                        echo '<span style="color: #2A4AB3">' .  $interval->format('%a dana')  .'</span>';
                    @endphp
                    </td>
                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                        <span class="px-[6px] py-[2px] bg-red-200 text-red-800 rounded-[10px]">
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
                            echo "0 dana";
                        }
                        @endphp
                        </span>
                    </td>
                    <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">{{$rent->librarian->name}}</td>
                  </tr>

                  @endforeach

                </tbody>
            </table>

        </div>
    </div>
    <div class="absolute bottom-0 w-full">
        <div class="flex flex-row">
            <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                <button type="button" onclick="history.back()"
                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                    Poništi <i class="fas fa-times ml-[4px]"></i>
                </button>
                <button type="submit"
                    class="btn-animation disabled-btn shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                    disabled onclick="validacijaUcenik()">
                    Otpiši knjigu <i class="fas fa-check ml-[4px]"></i>
                </button>
            </form>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->

@endsection
