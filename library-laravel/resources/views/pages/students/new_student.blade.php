@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Registracija novog učenika | Online Biblioteka</title>
    
@endsection

@section('content')

    <!-- Content -->
    <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
        <!-- Heading of content -->
        <div class="heading">
            <div class="flex border-b-[1px] border-[#e4dfdf]">
                <div class="pl-[30px] py-[10px] flex flex-col">
                    <div>
                        <h1>
                            Novi učenik
                        </h1>
                    </div>
                    <div>
                        <nav class="w-full rounded">
                            <ol class="flex list-reset">
                                <li>
                                    <a href="{{route('all-student')}}" class="text-[#2196f3] hover:text-blue-600">
                                        Svi učenici
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{route('new-student')}}" class="text-gray-400 hover:text-blue-600">
                                        Novi učenik
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
            <form class="text-gray-700 text-[14px]" method="POST" action="{{route('store-student')}}" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-row ml-[30px]">
                    <div class="w-[50%] mb-[100px]">
                        <div class="mt-[20px]">
                            <span>Ime i prezime <span class="text-red-500">*</span></span>
                            <input type="text" name="name" id="name" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsNameUcenik()" placeholder="@error('name'){{$message}} @enderror" value="{{ old('name') }}"/>
                            <div id="validateNameUcenik"></div>
                        </div>

                        <div class="mt-[20px]">
                            <span>Tip korisnika</span>
                            <select class="flex w-[90%] mt-2 px-2 py-2 border bg-gray-300 border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" id="user_type_id" for="user_type_id" name="user_type_id" disabled>
                                <option value="1">
                                    Učenik
                                </option>
                            </select>
                        </div>

                        <div class="mt-[20px]">
                            <span>Pol <span class="text-red-500">*</span></span>
                            <select 
                            required
                            oninvalid="this.setCustomValidity('Ovo polje je obavezno')"
                            class="flex w-[90%] mt-2 px-2 py-2 border shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" id="user_gender_id" for="user_gender_id" name="user_gender_id">
                                <option value="">
                                    Odaberite
                                    </option>
                                <option value="1">
                                    Muški
                                </option>
                                <option value="2">
                                    Ženski
                                </option>
                            </select>
                        </div>

                        <div class="mt-[20px]">
                            <span>JMBG <span class="text-red-500">*</span></span>
                            <input type="number" name="JMBG" id="JMBG" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsJmbgUcenik()" placeholder="@error('JMBG'){{$message}} @enderror"  value="{{ old('JMBG') }}"/>
                            <div id="validateJmbgUcenik"></div>
                        </div>

                        <div class="mt-[20px]">
                            <span>E-mail <span class="text-red-500">*</span></span>
                            <input type="email" name="email" id="email" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf] @error('email') error-border @enderror" onkeydown="clearErrorsEmailUcenik()" placeholder="@error('email'){{$message}} @enderror"  value="{{ old('email') }}"/>
                            <div id="validateEmailUcenik"></div>
                        </div>

                        <div class="mt-[20px]">
                            <span>Korisničko ime <span class="text-red-500">* @error('username'){{$message}} @enderror</span></span>
                            <input type="text" name="username" id="username" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsUsernameUcenik()" value="{{ old('username') }}"/>
                            <div id="validateUsernameUcenik"></div>
                        </div>

                        <div class="mt-[20px]">
                            <span>Lozinka <span class="text-red-500">* @error('password'){{$message}} @enderror</span></span>
                            <input type="password" name="password" id="password" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsPwUcenik()" />
                            <div id="validatePwUcenik"></div>
                        </div>

                        <div class="mt-[20px]">
                            <span>Ponovite lozinku <span class="text-red-500">*</span></span>
                            <input type="password" name="password_confirmation" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsPw2Ucenik()"/>
                            <div id="validatePw2Ucenik"></div>
                        </div>
                    </div>

                    <div class="mt-[50px]">
                        <label class="mt-6 cursor-pointer">
                            <div id="empty-cover-art" class="relative w-48 h-48 py-[48px] text-center border-2 border-gray-300 border-solid">
                                <div class="py-4">
                                    <svg class="mx-auto feather feather-image mb-[15px]" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21 15 16 10 5 21"></polyline>
                                    </svg>
                                    <span class="px-4 py-2 mt-2 leading-normal">Dodaj fotografiju</span>
                                    <input type='file' name="photo" for="photo" id="photo" class="hidden" :accept="accept" onchange="loadFileStudent(event)" />
                                </div>
                                <img name="photo" id="image-output-student" class="hidden absolute w-48 h-[188px] bottom-0" />
                            </div>
                        </label>
                    </div>
                </div>

                <div class="absolute bottom-0 w-full">
                    <div class="flex flex-row">
                        <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                            <button type="button"
                                    class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                                Poništi <i class="fas fa-times ml-[4px]"></i>
                            </button>
                            <button id="sacuvajUcenika" type="submit"
                                    class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaUcenik()">
                                Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </section>
    <!-- End Content -->

@endsection
