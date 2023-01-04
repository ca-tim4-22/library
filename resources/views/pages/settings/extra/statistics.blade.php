@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>{{__('Podešavanja | Statistika - Online biblioteka')}}</title>

@endsection

@section('content')
{{-- Preloader --}}
<script src="{{asset('preloader/preloader.js')}}" ></script>

 <!-- Content -->
 <body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500" onload="myFunction()">
 <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
    <!-- Heading of content -->
    <div class="heading mt-[7px]">
        <div class="border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[30px] pb-[21px]">
                <h1>
                    {{__('Podešavanja')}}
                </h1>
            </div>
        </div>
    </div>

    {{-- Component for menu --}}
    <x-settings.menu></x-settings.menu>

<!-- Space for content -->

{{-- Preloader --}}
<div id="loader"></div>
<div style="display:none;" id="myDiv">
    <div class="pb-[30px] scroll">

        <style>
            .flexx {
                display: flex;
                justify-content: center;
                align-items: center;
                user-select: none;
            }
            .one {
                width: auto;
                text-align: center;
            }
            .one p {
                text-align: center !important;
                text-transform: uppercase;
                font-weight: 500;
            }
            .one .fas {   
                font-size: 25px;
            }
            .counter {
                color: #4558BE;
                font-size: 35px;
            }
            .fa-chevron-down {
                color: #4558BE;
            }
        </style>
      <div class="flexx">
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-user-shield"></i>
            <br>
            <p class="counter" data-count="{{$data['adminCount']}}"></p>
            <p>
                @php
                if($data['adminCount'] % 10 == 1 && $data['adminCount'] != 11) {
                    echo __('Admininistrator');
                } else {
                    echo __('Administratora');
                }
                @endphp
            </p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-user-friends"></i>
            <br>
            <p class="counter" data-count="{{$data['librarianCount']}}"></p>
            <p>
                @php
                if($data['librarianCount'] % 10 == 1 && $data['librarianCount'] != 11) {
                    echo __('Bibliotekar');
                } else {
                    echo __('Bibliotekara');
                }
                @endphp
            </p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-users"></i>
            <br>
            <p class="counter" data-count="{{$data['studentCount']}}"></p>
            <p>
                @php
                if($data['studentCount'] % 10 == 1 && $data['studentCount'] != 11) {
                    echo __('Učenik');
                } else {
                    echo __('Učenika');
                }
                @endphp
            </p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-book"></i>
            <br>
            <p class="counter" data-count="{{$data['bookCount']}}"></p>
            {{-- leave blank space --}}
            <p>{{__('Knjiga ')}}</p>
        </div>
      </div>

      <h1 class="text-center" style="margin-bottom: -120px;margin-top: -50px">{{__('Prethodna 24 časa')}}<br>
      <i class="fas fa-chevron-down"></i>
      </h1>    
      <div class="flexx">
        <div class="one" style="margin: 0px 100px;font-size: 50px">
            <i class="fas fa-user-shield"></i>
            <br>
            <p class="counter" data-count="{{$data['adminToday']}}"></p>
            <p>
                @php
                if($data['adminToday'] % 10 == 1 && $data['adminToday'] != 11) {
                    echo __('Admininistrator');
                } else {
                    echo __('Administratora');
                }
                @endphp
            </p>
        </div>
        <div class="one" style="margin: 0px 100px;font-size: 50px">
            <i class="fas fa-user-friends"></i>
            <br>
            <p class="counter" data-count="{{$data['librarianToday']}}"></p>
            <p>
                @php
                if($data['librarianToday'] % 10 == 1 && $data['librarianToday'] != 11) {
                    echo __('Bibliotekar');
                } else {
                    echo __('Bibliotekara');
                }
                @endphp
            </p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-users"></i>
            <br>
            <p class="counter" data-count="{{$data['studentToday']}}"></p>
            <p>
                @php
                if($data['studentToday'] % 10 == 1 && $data['studentToday'] != 11) {
                    echo __('Učenik');
                } else {
                    echo __('Učenika');
                }
                @endphp
            </p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-book"></i>
            <br>
            <p class="counter" data-count="{{$data['bookCount']}}"></p>
            {{-- leave blank space --}}
            <p>{{__('Knjiga ')}}</p>
        </div>
      </div>
      <hr>
    </div>

<script>
$(document).ready(function () {
$(".counter").each(function () {
   var count = $(this);
   var countTo = count.attr('data-count');
   $({countNum:count.text()}).animate({
           countNum:countTo,
       },
       {
           duration:2000,
           easing:'linear',
           step:function(){
               count.text(Math.floor(this.countNum));
           },
           complete:function(){
               count.text(this.countNum);
           }
       });
});
});
</script>

</div>
</section>

@endsection
