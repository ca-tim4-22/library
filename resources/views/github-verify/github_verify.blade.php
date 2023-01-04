@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>{{__('Potvrda naloga | Online biblioteka')}}</title>

@endsection

@section('content')

<section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
    <!-- Heading of content -->
    <div class="heading">
        <div class="flex border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[30px] py-[10px] flex flex-col">
                <div>
                    <h1>
                        Potvrda naloga
                    </h1>
                </div>
                <div>
                    <nav class="w-full rounded">
                        <ol class="flex list-reset">
                            <li>
                                <a href=""
                                   class="text-[#2196f3] hover:text-blue-600">
                                    Svi učenici
                                </a>
                            </li>
                            <li>
                                <span class="mx-2">/</span>
                            </li>
                            <li>
                                <a href=""
                                   class="text-gray-400 hover:text-blue-600">
                                    Izmijeni podatke
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Space for content -->
    <div class="scroll height-content section-content">
        <form class="text-gray-700 text-[14px]" method="POST"
              action="{{route('approve-update', $user->id)}}"
              enctype="multipart/form-data">
            @csrf @honeypot
            @method('PUT')
            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[100px]">

                    <div style="margin-top: 1rem;" class="text-base">
                        S obzirom da ste se registrovali koristeći third party
                        aplikaciju bićete primorani da izvršite <u>potvrdu</u>
                        svog naloga. Popunite sledeća polja ispravnim podacima i
                        pritisnite dugme "{{__('Sačuvaj')}}".
                    </div>

                    <div class="mt-[20px]">
                        <span>JMBG <span class="text-red-500">*</span></span>
                        @error('JMBG')
                        <span style="color:#cd1a2b;font-size:15px">{{$message}}</span>
                        @enderror
                        <input type="number" name="JMBG" id="JMBG" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none 
                            @if(!$errors->any()) focus:ring-2 focus:ring-[#576cdf]  @endif
                            @error('JMBG') error-border @enderror"
                               value="{{old('JMBG')}}"/>
                    </div>

                    <div class="mt-[20px]">
                        <span>Vaš pol  <span
                                    class="text-red-500">*</span></span></span>
                        <select
                                required
                                oninvalid="this.setCustomValidity('Morate odabrati pol')"
                                oninput="setCustomValidity('')"
                                style="cursor: pointer"
                                class="flex w-[90%] mt-2 px-2 py-2 border shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                id="user_gender_id" for="user_gender_id"
                                name="user_gender_id">
                            <option>
                                Odaberite
                            </option>
                            <option value="1" {{ old(
                            'user_gender_id') == '1' ? 'selected' : '' }}>
                            Muški
                            </option>
                            <option value="2" {{ old(
                            'user_gender_id') == '2' ? 'selected' : '' }}>
                            Ženski
                        </select>
                    </div>
                    <div class="mt-[20px]">
                        <label>Saberite 12 + 12 = ? <span
                                    class="text-red-500">*</span></span></label>
                        @error('result')
                        <span style="color:#cd1a2b;font-size:15px">{{$message}}</span>
                        @enderror
                        <input type="number" name="result" id="result" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none 
                            @if(!$errors->any()) focus:ring-2 focus:ring-[#576cdf]  @endif
                            @error('result') error-border @enderror"
                               value="{{old('result')}}"/>
                    </div>
                    <br>
                    @error('g-recaptcha-response') <span
                            style="color:#cd1a2b;font-size:15px">{{$message}}</span>
                    @enderror
                    {!! NoCaptcha::renderJs() !!}
                    {!! NoCaptcha::display() !!}
                </div>

                <div class="absolute bottom-0 w-full">
                    <div class="flex flex-row">
                        <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                            <button
                                    type="button"
                                    onclick="history.back()"
                                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                {{__('Poništi')}} <i class="fas fa-times ml-[4px]"></i>
                            </button>
                            <button type="submit"
                                    class="mr-[30px] mb-[10px] btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                                {{__('Sačuvaj')}} <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
        </form>
    </div>
</section>


@endsection
