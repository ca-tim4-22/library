@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Podešavanja | Polise - Online Biblioteka</title>

@endsection

@section('content')
<x-jquery.jquery></x-jquery.jquery>

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
                        <span class="font-medium">Success!</span> {{session('success')}}
                    </div>
                </div>
                @endif
                </h1>

            </div>
        </div>
    </div>

    {{-- Component for menu --}}
    <x-settings.menu></x-settings.menu>

    <div class="height-ucenikProfile pb-[30px] scroll">
        <!-- Space for content -->
        <div class="section-">

            <div class="flex flex-col">
                <div class="pl-[30px] py-[20px] flex border-b-[1px] border-[#e4dfdf]">

                    <div class="file-drop-area">
                    <form action="{{ route('save') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <span class="fake-btn">Dodajte CSV fajl</span>
                    <span class="file-msg">ili prevucite Vaš fajl ovdje</span>
                    <input class="file-input" type="file" multiple name="csv">
                    </div>
                

                    <button style="margin-left: 20px;outline:none;" class="btn-animation inline-flex items-center text-sm py-2.5 px-5 rounded-[5px] tracking-wider text-white bg-[#3f51b5] hover:bg-[#4558BE]">
                    <i class="fas fa-database"></i>&nbsp; Popunite bazu
                    </button>
                    
                    </form>
                
                    <style>
                        

section {
  flex-grow: 1;
}

.file-drop-area {
  position: relative;
  display: flex;
  align-items: center;
  width: 450px;
  max-width: 100%;
  padding: 15px;
  border-radius: 5px;
  cursor: pointer;
  transition: 0.2s;
  &.is-active {
    background-color: rgba(255, 255, 255, 0.05);
  }
}

.fake-btn {
  flex-shrink: 0;
  background-color: rgba(255, 255, 255, 0.04);
  border: 1px solid rgba(255, 255, 255, 0.1);
  border-radius: 3px;
  padding: 8px 15px;
  margin-right: 10px;
  font-size: 12px;
  text-transform: uppercase;
}

.file-msg {
  font-size: small;
  font-weight: 300;
  line-height: 1.4;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}

.file-input {
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  cursor: pointer;
  opacity: 0;
  &:focus {
    outline: none;
  }
}

footer {
  margin-top: 50px;
  a {
    color: rgba(255, 255, 255, 0.4);
    font-weight: 300;
    font-size: 14px;
    text-decoration: none;
    &:hover {
      color: white;
    }
  }
}
.file-drop-area {
background: linear-gradient(to right, #4568dc, #4558BE);
  color: #D7D7EF;
  font-family: 'Lato', sans-serif;
}
                        </style> 
                        <script>
                            var $fileInput = $('.file-input');
var $droparea = $('.file-drop-area');

// highlight drag area
$fileInput.on('dragenter focus click', function() {
  $droparea.addClass('is-active');
});

// back to normal state
$fileInput.on('dragleave blur drop', function() {
  $droparea.removeClass('is-active');
});

// change inner text
$fileInput.on('change', function() {
  var filesCount = $(this)[0].files.length;
  var $textContainer = $(this).prev();

  if (filesCount === 1) {
    // if single file is selected, show file name
    var fileName = $(this).val().split('\\').pop();
    $textContainer.text(fileName);
  } else {
    // otherwise show number of files
    $textContainer.text(filesCount + ' prevučeno');
  }
});
                        </script>
                </div>
            </div>
        </div>
    </div>
 </section>

@endsection
