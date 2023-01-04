@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>{{__('Radno vrijeme | Online biblioteka')}}</title>

@endsection

@section('content')
{{-- Preloader --}}
<script src="{{asset('preloader/preloader.js')}}"></script>

<!-- Content -->
<body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500"
      onload="myFunction()">
<section class="w-screen h-screen pl-[80px] py-4 text-gray-700">

    <!-- Space for content -->
    {{-- Preloader --}}
    <div id="loader"></div>
    <div style="display:none;" id="myDiv">
        <div class="height-ucenikProfile pb-[30px] scroll">
            <!-- Space for content -->
            <div class="section">
                <div class="w-10/12 mx-auto mt-8 text-oscuro">
                    <div class="text-center">
                        <ul id="working_time_list">

                            @if ($status->checkStatus())
                            <center><img src="{{asset('img/opened.gif')}}">
                            </center>
                            @else
                            <center><img src="{{asset('img/closed.gif')}}">
                            </center>
                            @endif

                            <li>{{__('Ponedeljak')}}: <span
                                        class="ttb">7h</span>-<span class="ttb">13h</span>
                            </li>
                            <li>{{__('Utorak')}}: <span
                                        class="ttb">7h</span>-<span class="ttb">13h</span>
                            </li>
                            <li>{{__('Srijeda')}}: <span
                                        class="ttb">7h</span>-<span class="ttb">13h</span>
                            </li>
                            <li>{{__('Četvrtak')}}: <span class="ttb">7h</span>-<span
                                        class="ttb">13h</span></li>
                            <li>{{__('Petak')}}: <span
                                        class="ttb">7h</span>-<span class="ttb">13h</span>
                            </li>
                            <li>{{__('Vikend')}}: <span class="ttr">{{__('Ne radimo')}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
</section>

@endsection
