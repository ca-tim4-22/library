@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Podešavanja | Statistika - Online biblioteka</title>

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
                    Podešavanja
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
            <p class="counter" data-count="{{$adminCount}}"></p>
            <p>Administratori</p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-user-friends"></i>
            <br>
            <p class="counter" data-count="{{$librarianCount}}"></p>
            <p>Bibliotekari</p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-users"></i>
            <br>
            <p class="counter" data-count="{{$studentCount}}"></p>
            <p>Učenici</p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-book"></i>
            <br>
            <p class="counter" data-count="{{$bookCount}}"></p>
            <p>Knjige</p>
        </div>
      </div>

      <h1 class="text-center" style="margin-bottom: -120px;margin-top: -50px">Prethodna 24 časa <br>
      <i class="fas fa-chevron-down"></i>
      </h1>    
      <div class="flexx">
        <div class="one" style="margin: 0px 100px;font-size: 50px">
            <i class="fas fa-user-shield"></i>
            <br>
            <p class="counter" data-count="{{$adminToday}}"></p>
            <p>Administratori</p>
        </div>
        <div class="one" style="margin: 0px 100px;font-size: 50px">
            <i class="fas fa-user-friends"></i>
            <br>
            <p class="counter" data-count="{{$librarianToday}}"></p>
            <p>Bibliotekari</p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-users"></i>
            <br>
            <p class="counter" data-count="{{$studentToday}}"></p>
            <p>Učenici</p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-book"></i>
            <br>
            <p class="counter" data-count="{{$bookCount}}"></p>
            <p>Knjige</p>
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
