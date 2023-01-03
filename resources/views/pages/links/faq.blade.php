@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>{{__('FAQ | Online biblioteka')}}</title>

@endsection

@section('content')
{{-- Preloader --}}
<script src="{{asset('preloader/preloader.js')}}" ></script>

 <!-- Content -->
 <body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500" onload="myFunction()">
 <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">

<!-- Space for content -->
{{-- Preloader --}}
<div id="loader"></div>
<div style="display:none;" id="myDiv">
    <div class="height-ucenikProfile pb-[30px] scroll">
        <!-- Space for content -->
        <div class="section">
            <div class="w-10/12 mx-auto mt-8 text-oscuro">
                <div>
                      <section class="text-gray-700">
                        <div class="container px-5 py-24 mx-auto mt-40">
                          <div class="text-center mb-20">
                            <h1 class="sm:text-3xl text-2xl font-medium text-center title-font text-gray-900 mb-4">
                              {{__('Najčešće postavljana pitanja')}}
                            </h1>
                          </div>
                          <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                            <div class="w-full lg:w-1/2 px-4 py-2">
                              <details class="mb-4">
                                <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                  {{__('Koliko često se dodaju nove knjige?')}}
                                </summary>
                
                                <span class="px-4 py-2">
                                  {{__('Knjige se dodaju u bazu čim stignu u realnoj školskoj biblioteci.')}}
                                </span>
                              </details>
                              <details class="mb-4">
                                <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                  {{__('Koliko mogu da rezervišem/pozajmim knjiga?')}}
                                </summary>
                
                                <span class="px-4 py-2">
                                  {{__('U istom vremenu možete rezervisati/pozajmiti samo jedan primjerak knjige.')}}
                                </span>
                              </details>
                              <details class="mb-4">
                                <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                  {{__('Da li mogu odmah preuzeti rezervisanu knjigu?')}}
                                </summary>
                
                                <span class="px-4 py-2">
                                 {{__('Morate sačekati da bibliotekar/ka potvrdi Vaš zahtjev za rezervaciju. Nakon toga možete preuzeti Vašu knjigu.')}}
                                </span>
                              </details>
                              <details class="mb-4">
                                <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                  {{__('Koliko se vremena čeka za prihvatanje rezervacije?')}}
                                </summary>
                
                                <span class="px-4 py-2">
                                  {{__('Prosječno svaka rezervacija bude razmotrena u toku 24h od podnošenja iste, izuzev vikenda.')}}
                                </span>
                              </details>
                              <details class="mb-4">
                                <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                  {{__('Koliko ukupno ima knjiga u biblioteci?')}}
                                </summary>
                
                                <span class="px-4 py-2">
                                  {{__('Ukupan broj knjiga:')}} {{$count}}
                                </span>
                              </details>
                              <details class="mb-4">
                                <summary class="font-semibold  bg-gray-200 rounded-md py-2 px-4">
                                  {{__('Koga mogu kontaktirati za više informacija?')}}
                                </summary>
                
                                <span>
                                  {{__('Škola - kontakt telefona')}} -> <a href="tel:+382 20 237 120">+382 20 237 120</a>
                                  <br>
                                  {{__('Škola - lokacija')}} -> Vasa Raičkovića 26, Podgorica, Crna Gora
                                  <br>
                                  {{__('Razvojni tim - email adresa')}} -> <a href="mailto:nullable@gmail.com">nullable@gmail.com</a>
                                </span>
                              </details>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>
        </div>
    </div>
 </section>

@endsection
