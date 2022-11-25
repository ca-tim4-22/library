@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Podešavanja | Dodatno - Online Biblioteka</title>

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
            .fas{
                font-size: 25px;
            }
            .count {
                color: #4558BE;
                font-size: 35px;
            }
        </style>

      <div class="flexx">
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-user-shield"></i>
            <br>
            <p class="count">8</p>
            <p>Administratori</p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-user-friends"></i>
            <br>
            <p class="count">12</p>
            <p>Bibliotekari</p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-users"></i>
            <br>
            <p class="count">32</p>
            <p>Učenici</p>
        </div>
        <div class="one" style="margin: 100px;font-size: 50px">
            <i class="fas fa-book"></i>
            <br>
            <p class="count">128</p>
            <p>Knjige</p>
        </div>
      </div>

    </div>

</div>
 </section>

@endsection
