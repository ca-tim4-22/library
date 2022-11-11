@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Novi autor | Online Biblioteka</title>

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
                        Novi autor
                    </h1>
                </div>
                <div>
                    <nav class="w-full rounded">
                        <ol class="flex list-reset">
                            <li>
                                <a href="{{route('all-author')}}" class="text-[#2196f3] hover:text-blue-600">
                                    Evidencija autora
                                </a>
                            </li>
                            <li>
                                <span class="mx-2">/</span>
                            </li>
                            <li>
                                <a href="{{route('new-author')}}" class="text-gray-400 hover:text-blue-600">
                                    Novi autor
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
        <form class="text-gray-700" method="POST" action="{{route('new-author')}}">
            @csrf
            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[150px]">
                    <div class="mt-[20px]">
                        <p>Ime i prezime <span class="text-red-500">* @error('NameSurname') {{$message}} @enderror</span></p>
                        <input type="text" name="NameSurname" id="NameSurname" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" value="{{old('NameSurname')}}"/>
                    </div>
                   
                    <div class="mt-[20px]">
                        <p>Vikipedija <span class="text-red-500">* @error('wikipedia') {{$message}} @enderror</span></p>
                        <input type="text" name="wikipedia" id="wikipedia" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" value="{{old('wikipedia')}}"/>
                    </div>

                    <div class="mt-[20px]">
                        <p class="inline-block mb-2">Biografija <span class="text-red-500">* @error('biography') {{$message}} @enderror</span></p>

                        <textarea name="biography" id="biography" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">
                        {{old('biography')}}
                        </textarea>
                    </div>
                    
                </div>

                <div class="mt-[50px]">
                    <label class="mt-6 cursor-pointer">
                        @error('photo')
                        <span class="text-red-500">{{$message}}</span>
                        @enderror
                        <div id="empty-cover-art" class="relative w-48 h-48 py-[48px] text-center border-2 border-gray-300 border-solid">
                            <div class="py-4">
                                <svg class="mx-auto feather feather-image mb-[15px]" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <span class="px-4 py-2 mt-2 leading-normal no-select">Dodaj fotografiju</span>
                                <input type='file' name="photo" for="photo" id="photo" class="hidden" :accept="accept" onchange="loadFileLibrarian(event)" />
                            </div>
                            <img style="object-fit: contain" id="image-output-librarian" class="hidden absolute w-48 h-[188px] bottom-0" />	
                        </div>
                    </label>   
                </div>
            </div>
            
            </div>
            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                        <button type="button" onclick="history.back()"
                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Poništi <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button id="sacuvajAutora" type="submit"
                            class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" >
                            Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- End Content -->

{{-- CKEditor --}}
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('biography', {
        width: "90%",
        height: "150px"
    });
</script>

@endsection
