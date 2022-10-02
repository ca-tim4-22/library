@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Podešavanja | Dodatno - Online Biblioteka</title>

@endsection

@section('content')
{{-- Preloader --}}
<script src="{{asset('preloader/preloader.js')}}" ></script>

 <!-- Content -->
 <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
    <!-- Heading of content -->
    <div class="heading mt-[7px]">
        <div class="border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[30px] pb-[21px]">
                <h1>
                    Podešavanja

                {{-- Database successfully filled --}}
                @if (session()->has('success'))
                <div style="width:30%" id="hideDiv" class="flex p-2 mt-2 mb-1 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Uspješno!</span> {{session('success')}}
                    </div>
                </div>
                @endif
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
    <div class="height-ucenikProfile pb-[30px] scroll">
        <!-- Space for content -->
        <div class="section-">
            <div class="flex flex-col">
              <a href="{{route('readme')}}" class="ml-[30px] mt-[10px] " style="font-size: 20px">
               <span id="readme">Pročitajte uputstvo</span> <i style="cursor: default;color: #4558BE" class="fas fa-book-reader"></i>
              </a>
              <hr class="mt-[10px]">
              <h2 class="ml-[30px] mt-[10px]" style="font-size: 25px">Autori 
                @error('csv_author')
                <span style="color: red;font-size: 20px" class="mt-[10px]">| {{$message}}</span>
                @enderror</h2>
                <div class="pl-[30px] py-[20px] flex border-b-[1px] border-[#e4dfdf]">
                    <div class="file-drop-area @error('csv_author') error-border @enderror">
                    <form action="{{ route('csvAuthors') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @error('csv_author') <i class="fas fa-exclamation mr-[5px]" id="icon"></i> @enderror
                    <span class="fake-btn">Dodajte CSV fajl</span>
                    <span class="file-msg">ili prevucite Vaš fajl ovdje</span>
                    <input class="file-input" type="file" multiple name="csv_author">
                    </div>
                    <button style="margin-left: 20px;outline:none;" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]">
                    <i class="fas fa-database"></i>&nbsp; Popunite bazu
                    </button>
                    </form>
                </div>

                <h2 class="ml-[30px] mt-[10px]" style="font-size: 25px">Knjige
                @error('csv_book')
                <span style="color: red;font-size: 20px" class="mt-[10px]">| {{$message}}</span>
                @enderror
                </h2>
                <div class="pl-[30px] py-[20px] flex border-b-[1px] border-[#e4dfdf]">
                    <div class="file-drop-area @error('csv_book') error-border @enderror">
                    <form action="{{ route('csvBooks') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @error('csv_book') <i class="fas fa-exclamation mr-[5px]" id="icon"></i> @enderror
                    <span class="fake-btn">Dodajte CSV fajl</span>
                    <span class="file-msg">ili prevucite Vaš fajl ovdje</span>
                    <input class="file-input" type="file" multiple name="csv_book">
                    </div>
                    <button style="margin-left: 20px;outline:none;" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]">
                    <i class="fas fa-database"></i>&nbsp; Popunite bazu
                    </button>
                    </form>
                </div>

                <h2 class="ml-[30px] mt-[10px]" style="font-size: 25px">Galerija
                    @error('csv_gallery')
                    <span style="color: red;font-size: 20px" class="mt-[10px]">| {{$message}}</span>
                    @enderror</h2>
                <div class="pl-[30px] py-[20px] flex border-b-[1px] border-[#e4dfdf]">
                    <div class="file-drop-area @error('csv_gallery') error-border @enderror">
                    <form action="{{ route('csvGallery') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @error('csv_gallery') <i class="fas fa-exclamation mr-[5px]" id="icon"></i> @enderror
                    <span class="fake-btn">Dodajte CSV fajl</span>
                    <span class="file-msg">ili prevucite Vaš fajl ovdje</span>
                    <input class="file-input" type="file" multiple name="csv_gallery">
                    </div>
                    <button style="margin-left: 20px;outline:none;" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]">
                    <i class="fas fa-database"></i>&nbsp; Popunite bazu
                    </button>
                    </form>
                </div>
                
                <h2 class="ml-[30px] mt-[10px]" style="font-size: 25px">Knjiga - Autor
                    @error('csv_book_author')
                    <span style="color: red;font-size: 20px" class="mt-[10px]">| {{$message}}</span>
                    @enderror</h2>
                <div class="pl-[30px] py-[20px] flex border-b-[1px] border-[#e4dfdf]">
                    <div class="file-drop-area @error('csv_book_author') error-border @enderror">
                    <form action="{{ route('csvBookAuthors') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @error('csv_book_author') <i class="fas fa-exclamation mr-[5px]" id="icon"></i> @enderror
                    <span class="fake-btn">Dodajte CSV fajl</span>
                    <span class="file-msg">ili prevucite Vaš fajl ovdje</span>
                    <input class="file-input" type="file" multiple name="csv_book_author">
                    </div>
                    <button style="margin-left: 20px;outline:none;" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]">
                    <i class="fas fa-database"></i>&nbsp; Popunite bazu
                    </button>
                    </form>
                </div>
                
                <h2 class="ml-[30px] mt-[10px]" style="font-size: 25px">Knjiga - Kategorija
                    @error('csv_book_category')
                    <span style="color: red;font-size: 20px" class="mt-[10px]">| {{$message}}</span>
                    @enderror</h2>
                <div class="pl-[30px] py-[20px] flex border-b-[1px] border-[#e4dfdf]">
                    <div class="file-drop-area @error('csv_book_category') error-border @enderror">
                    <form action="{{ route('csvBookCategories') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @error('csv_book_category') <i class="fas fa-exclamation mr-[5px]" id="icon"></i> @enderror
                    <span class="fake-btn">Dodajte CSV fajl</span>
                    <span class="file-msg">ili prevucite Vaš fajl ovdje</span>
                    <input class="file-input" type="file" multiple name="csv_book_category">
                    </div>
                    <button style="margin-left: 20px;outline:none;" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]">
                    <i class="fas fa-database"></i>&nbsp; Popunite bazu
                    </button>
                    </form>
                </div>

                <h2 class="ml-[30px] mt-[10px]" style="font-size: 25px">Knjiga - Žanr
                    @error('csv_book_genre')
                    <span style="color: red;font-size: 20px" class="mt-[10px]">| {{$message}}</span>
                    @enderror</h2>
                <div class="pl-[30px] py-[20px] flex border-b-[1px] border-[#e4dfdf]">
                    <div class="file-drop-area @error('csv_book_genre') error-border @enderror">
                    <form action="{{ route('csvBookGenres') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @error('csv_book_genre') <i class="fas fa-exclamation mr-[5px]" id="icon"></i> @enderror
                    <span class="fake-btn">Dodajte CSV fajl</span>
                    <span class="file-msg">ili prevucite Vaš fajl ovdje</span>
                    <input class="file-input" type="file" multiple name="csv_book_genre">
                    </div>
                    <button style="margin-left: 20px;outline:none;" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]">
                    <i class="fas fa-database"></i>&nbsp; Popunite bazu
                    </button>
                    </form>
                </div>
                

            </div>
        </div>
    </div>
 </section>

 <style>
  .error-border {
    border: 2.3px dotted red;
  }
  #icon {
    animation: alert 1s infinite ease-in;
  }
  @keyframes alert {
    
    0% { color: red; }
      50% { color: #fff; }
      100% { color: red; }
  }
</style> 

{{-- Tippy JS --}}
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
<script src="{{asset('tippy_js/tippy.js')}}"></script>
@endsection
