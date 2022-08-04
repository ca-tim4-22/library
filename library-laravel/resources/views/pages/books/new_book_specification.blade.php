@extends('layouts.dashboard')
@section('content')
<main class="flex flex-row small:hidden">
    <!-- Sidebar -->
    <x-sidebar></x-sidebar>
        <!-- End Sidebar -->

    <!-- Content -->
    <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
        <!-- Heading of content -->
        <div class="heading">
            <div class="flex border-b-[1px] border-[#e4dfdf]">
                <div class="pl-[30px] py-[10px] flex flex-col">
                    <div>
                        <h1>
                            Nova knjiga
                        </h1>
                    </div>
                    <div>
                        <nav class="w-full rounded">
                            <ol class="flex list-reset">
                                <li>
                                    <a href="evidencijaKnjiga.php" class="text-[#2196f3] hover:text-blue-600">
                                        Evidencija knjiga
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="#" class="text-[#2196f3] hover:text-blue-600">
                                        Nova knjiga
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-b-[2px] py-4 text-gray-500 border-gray-300 pl-[30px]">
            <a href="novaKnjiga.php" class="inline hover:text-blue-800">
                Osnovni detalji
            </a>
            <a href="#" class="inline active-book-nav ml-[70px] hover:text-blue-800 ">
                Specifikacija
            </a>
            <a href="novaKnjigaMultimedija.php" class="inline ml-[70px] hover:text-blue-800">
                Multimedija
            </a>
        </div>
        <!-- Space for content -->
        <div class="scroll height-content section-content">
            <form class="text-gray-700 forma">
                <div class="flex flex-row ml-[30px]">
                    <div class="w-[50%] mb-[150px]">
                        <div class="mt-[20px]">
                            <p>Broj strana <span class="text-red-500">*</span></p>
                            <input type="text" name="page_count" id="brStrana" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsBrStrana()"/>
                            <div id="validateBrStrana"></div>
                        </div>
                        <div class="mt-[20px]">
                            <p>Jezik <span class="text-red-500">*</span></p>
                            <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="launguage_id" id="jezik" onclick="clearErrorsJezik()">
                                <option disabled selected></option>
                                @foreach($models['$launguages'] as $launguage)
                                <option value="{{$launguage->id}}">
                                    {{$launguage->name}}
                                </option>

                            </select>
                            <div id="validatePovez"></div>
                        </div>

                        <div class="mt-[20px]">
                            <p>Pismo <span class="text-red-500">*</span></p>
                            <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="letter_id" id="pismo" onclick="clearErrorsPismo()">
                                <option disabled selected></option>
                                @foreach($models['letters'] as $letter)
                                <option value="{{$letter->id}}">
                                    {{$letter->name}}
                                </option>

                            </select>
                            <div id="validatePismo"></div>
                        </div>

                        <div class="mt-[20px]">
                            <p>Povez <span class="text-red-500">*</span></p>
                            <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="povez" id="binding_id" onclick="clearErrorsPovez()">
                                <option disabled selected></option>
                                @foreach($models['bindings'] as $binding)
                                <option value="{{$binding->id}}">
                                    {{$binding->name}}
                                </option>
                                @endforeach
                            </select>
                            <div id="validatePovez"></div>
                        </div>

                        <div class="mt-[20px]">
                            <p>Format <span class="text-red-500">*</span></p>
                            <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="format_id" id="format" onclick="clearErrorsFormat()">
                                <option disabled selected></option>
                                @foreach($models['formats'] as $format)
                                <option value="{{$format->id}}">
                                    {{$format->name}}
                                </option>

                            </select>
                            <div id="validateFormat"></div>
                        </div>

                        <div class="mt-[20px]">
                            <p>International Standard Book Num <span class="text-red-500">*</span></p>
                            <input type="text" name="ISBN" id="isbn" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsIsbn()"/>
                            <div id="validateIsbn"></div>
                        </div>
                    </div>
                </div>
                <div class="absolute bottom-0 w-full">
                    <div class="flex flex-row">
                        <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                            <button type="button"
                                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                Ponisti <i class="fas fa-times ml-[4px]"></i>
                            </button>
                            <button id="sacuvajSpecifikaciju" type="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaSpecifikacija()">
                                Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Content -->
</main>
@endsection
