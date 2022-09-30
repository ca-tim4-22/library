@extends('layouts.dashboard')
    
@section('title')

<!-- Title -->
<title>Dashboard | Online Biblioteka</title>

@endsection

@section('content')

{{-- Sweet Alert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Content -->
<section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
    
    <!-- Heading of content -->
    <div class="heading mt-[7px]">
        <h1 class="pl-[30px] pb-[21px]  border-b-[1px] border-[#e4dfdf] ">
            Dashboard
{{-- Session message for approve reservation --}}
@if (session()->has('approve'))
<div id="hideDiv" class="flex p-4 mt-4 mb-4 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">Uspješno!</span> {{session('approve')}}
    </div>
  </div>
@endif

{{-- Session message for deny reservation --}}
@if (session()->has('deny'))
<div id="hideDiv" class="flex p-4 mt-4 mb-4 text-sm text-red-700 bg-red-200 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">Bezuspješno!</span> {{session('deny')}}
    </div>
</div>
@endif
        </h1>
    </div>
    <!-- Space for content -->
    <div class="pl-[30px] scroll height-dashboard overflow-auto mt-[20px] pb-[30px]">
        <div class="flex flex-row justify-between">
            <div class="mr-[30px]">
                <span style="font-size: 1.3em" id="tooltip_1" class="cursor-default uppercase mb-[20px]">Aktivnosti</span>
                <!-- Activity Cards -->
                
            @if (!$data == [])
             
            @foreach ($data as $rent)
               
             <div class="holder mt-[20px]">
              <div class="activity-card flex flex-row mb-[30px]">
                <div class="w-[60px] h-[60px]">
                    <img class="rounded-full" src="{{$rent->borrow->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . $rent->borrow->photo}}"
                    alt="Profilna slika učenika: {{$rent->borrow->name}}"
                    title="Profilna slika učenika: {{$rent->borrow->name}}" />
                </div>
                <div class="ml-[15px] mt-[5px] flex flex-col">
                    <div class="text-gray-500 mb-[5px]">
                        <p class="uppercase">
                            Izdavanje knjige
                            <span class="inline lowercase">
                              -
                                @php
                                    echo date("d-m-Y", strtotime($rent->issue_date));
                                @endphp
                            </span>
                        </p>
                    </div>
                    <div class="">
                        <p>

                {{-- If admin rented a book --}}
                @if ($rent->librarian->type->id == 2)
                <a href="{{route('show-librarian', $rent->librarian->username)}}" class="text-[#2196f3] hover:text-blue-600">
                    {{$rent->librarian->name}}
                <a>
                @else 
                <a href="{{route('show-admin', $rent->librarian->username)}}" class="text-[#2196f3] hover:text-blue-600">
                    {{$rent->librarian->name}}
                    <a>
                @endif

                            <a href="{{route('show-book', $rent->book->title)}}">
                                je {{$rent->librarian->gender->id == 1 ? 'izdao' : 'izdala'}} knjigu <span class="font-medium">{{$rent->book->title}} </span>
                            </a>
                            <a href="{{route('show-student', $rent->borrow->username)}}" class="text-[#2196f3] hover:text-blue-600">
                                {{$rent->borrow->name}}
                            </a>
                            dana <span class="font-medium">
                              @php
                              echo date("d-m-Y", strtotime($rent->issue_date));
                              @endphp
                          </span>
                            <a href="{{route('rented-info', $rent->id)}}" class="text-[#2196f3] hover:text-blue-600">
                                pogledaj detaljnije >>
                            </a>
                        </p>
                    </div>
                </div>
               </div>
              </div>

             @endforeach

             @foreach ($data2 as $reservation)
             <div class="holder">
                <div class="activity-card flex flex-row mb-[30px]">
                  <div class="w-[60px] h-[60px]">
                      <img 
                      class="rounded-full" 
                      src="{{$reservation->reservation->made_for->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . $reservation->reservation->made_for->photo}}"
                      alt="Profilna slika učenika: {{$reservation->reservation->made_for->name}}"
                      title="Profilna slika učenika: {{$reservation->reservation->made_for->name}}" />
                  </div>
                  <div class="ml-[15px] mt-[5px] flex flex-col">
                      <div class="text-gray-500 mb-[5px]">
                          <p class="uppercase">
                              Rezervacija knjige
                              <span class="inline lowercase">
                                -
                                  @php
                                      echo date("d-m-Y", strtotime($reservation->reservation->reservation_date));
                                  @endphp
                              </span>
                          </p>
                      </div>
                      <div class="">
                          <p>

                {{-- If admin reserved a book --}}
                @if ($reservation->reservation->made_by->type->id == 2)
          
                <a href="{{route('show-librarian', $reservation->reservation->made_by->username)}}" class="text-[#2196f3] hover:text-blue-600">
                    {{$reservation->reservation->librarian->name}}
                <a>
                @else 
                <a href="{{route('show-admin', $reservation->reservation->made_by->username)}}" class="text-[#2196f3] hover:text-blue-600">
                    {{$reservation->reservation->made_by->name}}
                <a>
                @endif

                              je {{$reservation->reservation->made_by->gender->id == 1 ? 'rezervisao' : 'rezervisala'}} knjigu <span class="font-medium">{{$reservation->reservation->book->title}} </span>
                              <a href="{{route('show-student', $reservation->reservation->made_for->username)}}" class="text-[#2196f3] hover:text-blue-600">
                                  {{$reservation->reservation->made_for->name}}
                              </a>
                              dana <span class="font-medium">
                                @php
                                echo date("d-m-Y", strtotime($reservation->reservation->reservation_date));
                                @endphp
                            </span>
                              <a href="{{route('reserved-info', $reservation->reservation->id)}}" class="text-[#2196f3] hover:text-blue-600">
                                  pogledaj detaljnije >>
                              </a>
                          </p>
                      </div>
                  </div>
                 </div>
                </div>
             @endforeach

<style>
div.holder{
  display:none;
}

a#seeMore{
  display:block;
}

a#seeMore:hover{
  opacity:1;
}
  </style>

  <script>
$(document).ready(function(){
$(".holder").slice(0,1).show();
$("#seeMore").click(function(e){
    e.preventDefault();
    $(".holder:hidden").slice(0,1).fadeIn("slow"); 
if($(".holder:hidden").length == 0){
    $('#seeMore').css('display', 'none');
}
});

if($(".holder:hidden").length == 0){
    $('#seeMore').css('display', 'none');
} else {
    $('#seeMore').css('display', 'inline-block');
}
})
</script>

             @else 

             <div class="mx-[50px]">
                <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">                       
                    <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                        <path fill="currentColor"
                                d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                        </path>
                    </svg>
                    <p class="font-medium text-white">Nema današnjih aktivnosti!</p>
                </div>
            </div>

            @endif

                <div class="inline-block w-full mt-4">
                    <a 
                    id="seeMore" 
                    style="cursor: pointer;display: none;"
                    class="btn-animation block text-center w-full px-4 py-2 text-sm tracking-wider text-gray-600 transition duration-300 ease-in border-[1px] border-gray-400 rounded hover:bg-gray-200 focus:outline-none focus:ring-[1px] focus:ring-gray-300">
                    Prikaži još
                    </a>
                    @if ($data_await != [] && $data != [])
                    @if ($data_await->count() > 0 || $data->count() > 0)
                    <a 
                    href="{{route('dashboard-activity')}}"
                    style="cursor: pointer"
                    class="mt-4 btn-animation block text-center w-full px-4 py-2 text-sm tracking-wider text-gray-600 transition duration-300 ease-in border-[1px] border-gray-400 rounded hover:bg-gray-200 focus:outline-none focus:ring-[1px] focus:ring-gray-300">
                    Prikaži sve
                    </a>
                    @endif
                    @endif
                </div>
            </div>
  
            <div class="mr-[50px]">
                <span id="tooltip_2" style="font-size: 1.3em" class="cursor-default uppercase mr-[0px] text-left" 
                >
                    Rezervacije knjiga
                  
                </span>
             
                <div class="mt-[20px]">
                    <table class="w-[560px] table-auto">
                        <tbody class="bg-gray-200">

                            @if ($data_await->count() > 0 )
                                
                            @foreach ($data_await as $await_reservation)
                            
                            <tr class="bg-white border-b-[1px] border-[#e4dfdf]">
                                <td class="flex flex-row items-center px-2 py-4">

                                    <img 
                                    class="object-cover w-8 h-8 rounded-full" 
                                    src="{{$await_reservation->reservation->made_for->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . $await_reservation->reservation->made_for->photo}}" />

                                    <a href="{{route('show-student', $await_reservation->reservation->made_for->username)}}" class="ml-2 font-medium text-center">{{$await_reservation->reservation->made_for->name}}</a>
                                <td>
                                </td>
                                <td class="px-2 py-2">
                                    <a href="{{route('show-book', $await_reservation->reservation->book->title)}}">
                                    {{$await_reservation->reservation->book->title}}
                                    </a>
                                </td>
                                <td class="px-2 py-2">
                                    <span class="px-[10px] py-[3px] bg-gray-200 text-gray-800 px-[6px] py-[2px] rounded-[10px]">
                                        @php
                                        echo date("d-m-Y", strtotime($await_reservation->reservation->reservation_date));
                                        @endphp
                                    </span>
                                </td>

                                @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
                                   <td class="px-2 py-2">
                                    <form style="display: inline" action="{{route('approve', ['id' => $await_reservation->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button style="outline: none;" href="#" class="hover:text-green-500 mr-[5px]">
                                            <i class="fas fa-check reservedStatus"></i>
                                    </button>
                                    </form>
                                    <form style="display: inline" action="{{route('deny', ['id' => $await_reservation->id])}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button style="outline: none;" href="#" class="hover:text-red-500 ">
                                            <i class="fas fa-times deniedStatus"></i>
                                    </button>
                                    </form>
                                    </td>
                                @else
                                <td class="px-2 py-2">
                                    <button 
                                    style="outline: none;"
                                    onclick="permission()" 
                                    class="hover:text-green-500 mr-[5px]">
                                            <i class="fas fa-check"></i>
                                    </button>
                                    <button 
                                    style="outline: none;"
                                    onclick="permission()"   
                                    class="hover:text-red-500">
                                            <i class="fas fa-times deniedStatus"></i>
                                    </button>
                                </td>
                                @endif

                             </tr>

                            <style>
                            .swal2-modal .swal2-styled:focus {
	                        -webkit-box-shadow: none !important;
	                        box-shadow: none !important;
                            }
                            </style>

                             <script>
                                function permission() {
                                    swal.fire({
                                    icon: 'error',
                                    confirmButtonColor: '#4558BE',
                                    title: 'Oops...',
                                    text: 'Nemate ovlašćenje za ovu operaciju!',
                                  })}
                             </script>

                            @endforeach

                            @else 

                            <div class="mx-[50px]">
                                <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">                       
                                    <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                                        <path fill="currentColor"
                                                d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                                        </path>
                                    </svg>
                                    <p class="font-medium text-white">Trenutno nema rezervacija na čekanju! </p>
                                </div>
                            </div>

                            @endif
                          
                        </tbody>
                    </table>
                    <div class="text-right mt-[5px]">
                        <a href="{{route('active-reservations')}}" class="text-[#2196f3] hover:text-blue-600">
                            <i style="cursor: default" class="fas fa-calendar-alt mr-[4px]" aria-hidden="true"></i>
                            Prikaži sve
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <h3 class="uppercase mb-[20px] text-left py-[30px] cursor-default">
                        Statistika
                    </h3>
                    <div class="text-right">
                        <div class="flex pb-[30px]">
                            <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="{{route('rented-books')}}">
                                Izdate knjige
                            </a>
                            <div class="ml-[30px] bg-green-600 transition duration-200 ease-in  hover:bg-green-900 
                            @if($rented_books > $reserved_books && $rented_books > $overdue_books)
                            stats-bar-red
                            @elseif($rented_books < $reserved_books)
                            stats-bar-green
                            @elseif($rented_books > $reserved_books && $rented_books < $overdue_books)
                            stats-bar-green
                            @elseif($rented_books == $reserved_books && $rented_books > $overdue_books)
                            stats-bar-red
                            @elseif($rented_books < $overdue_books && $rented_books == $reserved_books)
                            stats-bar-yellow
                            @elseif($rented_books == $overdue_books)
                            stats-bar-red
                            @endif
                            h-[26px]">
                            
                            </div>
                            <p  
                            style="cursor: default"
                            data-tooltip-content="{{$rented_real}}" 
                            class="with-tooltip2 ml-[10px] number-green text-[#2196f3] hover:text-blue-600">
                                {{$rented_real > 300 ? '300+' : $rented_real}}
                            </p>
                        </div>
                        <div class="flex pb-[30px]">
                            <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="{{route('active-reservations')}}">
                                Rezervisane knjige
                            </a>
                            <div class="ml-[30px] bg-yellow-600 transition duration-200 ease-in  hover:bg-yellow-900
                            @if($reserved_books > $rented_books && $reserved_books > $overdue_books || $reserved_books > $overdue_books && $reserved_books == $rented_books)
                            stats-bar-red
                            @elseif($overdue_books == $rented_books)
                            stats-bar-green
                            @elseif($reserved_books < $rented_books && $reserved_books < $overdue_books && $rented_books < $overdue_books)
                            stats-bar-yellow
                            @elseif($reserved_books < $rented_books && $reserved_books < $overdue_books && $rented_books > $overdue_books)
                            stats-bar-green
                            @elseif($reserved_books < $rented_books && $reserved_books < $overdue_books)
                            stats-bar-green
                            @elseif($reserved_books < $rented_books && $reserved_books > $overdue_books)
                            stats-bar-yellow
                            @elseif($reserved_books < $rented_books && $reserved_books < $overdue_books)
                            stats-bar-green
                            @elseif($reserved_books < $rented_books || $reserved_books < $overdue_books)
                            stats-bar-yellow
                            @elseif($reserved_books == $rented_books || $reserved_books == $overdue_books)
                            stats-bar-red
                            @endif
                            h-[26px]">
                            
                            </div>
                            <p
                            style="cursor: default"
                            data-tooltip-content="{{$reserved_real}}"  
                            class="with-tooltip2 ml-[10px] text-[#2196f3] hover:text-blue-600 number-yellow">
                                {{$reserved_real >= 300 ? '300+' : $reserved_real}}
                            </p>
                        </div>
                        <div class="flex pb-[30px]">
                            <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="{{route('overdue-books')}}">
                                Knjige u prekoračenju
                            </a>

                <div class="ml-[30px] bg-red-600 transition duration-200 ease-in hover:bg-red-900 
                @if($overdue_books > $rented_books && $overdue_books > $reserved_books)
                stats-bar-red
                @elseif($overdue_books == $reserved_books && $overdue_books == $rented_books)
                stats-bar-red
                @elseif($overdue_books > $reserved_books && $overdue_books < $rented_books)
                stats-bar-yellow
                @elseif($overdue_books != $rented_books && $overdue_books == $reserved_books)
                stats-bar-green
                @elseif($overdue_books == $rented_books && $overdue_books != $reserved_books)
                stats-bar-yellow
                @elseif($overdue_books == $reserved_books || $overdue_books == $rented_books)
                stats-bar-red
                @elseif($rented_books < $reserved_books && $overdue_books < $rented_books && $overdue_books < $reserved_books)
                stats-bar-yellow
                @elseif($rented_books < $reserved_books && $rented_books < $overdue_books && $rented_books != $overdue_books)
                stats-bar-yellow
                @elseif($rented_books > $reserved_books && $rented_books > $overdue_books || $rented_books == $reserved_books || $rented_books != $reserved_books && $rented_books < $reserved_books)
                stats-bar-green
                @elseif($rented_books > $reserved_books && $rented_books > $overdue_books || $rented_books == $reserved_books || $rented_books != $reserved_books && $rented_books > $reserved_books)
                stats-bar-yellow
                @endif
                h-[26px]">
                </div>

<style>
@keyframes red-bar {
from {
width: 0%;
}
to {
width: {{$width}}px;
}
}

@keyframes green-bar { 
from {
width: 0%;
}

to {
width: {{$prefix_green}}px;
}
}

@keyframes yellow-bar {
from {
width: 0%;
}
to {
  width: {{$prefix_yellow}}px;
}
}
</style>

                            <p
                            style="cursor: default"
                            data-tooltip-content="{{$overdue_real}}"  
                            class="with-tooltip2 ml-[10px] text-[#2196f3] hover:text-blue-600 number-red">
                                {{$overdue_real >= 300 ? '300+' : $overdue_real}}
                            </p>
                        </div>
                    </div>
                    <div class="absolute h-[220px] w-[1px] bg-black top-[78px] left-[174px]">
                    </div>
                    <div class="absolute flex conte left-[175px] border-t-[1px] border-[#e4dfdf] top-[248px] pr-[87px]">
                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->

{{-- Tippy JS --}}
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
<script src="{{asset('tippy_js/tippy.js')}}"></script>

@endsection



