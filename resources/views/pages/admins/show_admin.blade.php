@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Profil administratora | Online Biblioteka</title>

<!-- ijaboCropTool Style -->
<link rel="stylesheet" href="{{asset('ijaboCropTool/ijaboCropTool.min.css')}}">
    
@endsection

@section('content')
{{-- JQuery CDN --}}
<x-jquery.jquery></x-jquery.jquery>
<script src="{{asset('js/session_message_jquery.js')}}"></script>
{{-- Sweet Alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

    <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
       <!-- Heading of content -->
       <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[30px] py-[10px] flex flex-col">
                <div>
                    <h1>
                        {{$admin->name}}
                    </h1>
                </div>
                <div>
                    <nav class="w-full rounded">
                        <ol class="flex list-reset">
                            <li>
                                <a href="{{route('all-admin')}}" class="text-[#2196f3] hover:text-blue-600">
                                    Svi administratori
                                </a>
                            </li>
                            <li>
                                <span class="mx-2">/</span>
                            </li>
                            <li>
                                <a href="{{route('show-admin', $admin->username)}}" class="text-[#2196f3] hover:text-blue-600">
                                    ID-{{$admin->id}}
                                </a>
                            </li>
                        </ol>
                    </nav>
                    </div>
                </div>
             
            </div>
        </div>
        
<!-- Space for content -->     
<div class="pl-[30px] height-profile pb-[30px] scroll mt-[20px]">

@error('password')            
    <div id="hideDiv" class="flex p-2 mt-2 mb-1 text-sm text-red-700 bg-red-200 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">{{$message}}
    </div>
    </div>
@enderror

{{-- Session message for admin update password --}}
@if (session()->has('password-updated'))
<div id="hideDiv" class="flex p-2 mt-2 mb-1 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">Success!</span> {{session('password-updated')}}
    </div>
  </div>
@endif

            <div class="flex flex-row">
                <div class="mr-[30px]">
                    <div class="mt-[20px]">
                        <span class="text-gray-500">Ime i prezime</span>
                        <p class="font-medium">{{$admin->name}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Tip korisnika</span>
                        <p class="font-medium">
                            @if ($admin->user_type_id == 3)
                            {{$admin->gender->id == 1 ? 'Administrator' : 'Administratorka'}}
                            @endif
                        </p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">JMBG</span>
                        <p class="font-medium">{{$admin->JMBG}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Email</span>
                        <a
                        href="mailto:{{$admin->email}}"
                        class="cursor-pointer block font-medium text-[#2196f3] hover:text-blue-600">{{$admin->email}}</a>

                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Korisničko ime</span>
                        <p class="font-medium">{{$admin->username}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Pol</span>
                        <p class="font-medium">{{$admin->gender->name}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Broj logovanja</span>
                        <p class="font-medium">
                            @if ($admin->login_count != 0)
                            {{$admin->login_count}} 
                            @else
                            {{$admin->gender->id == 1 ? 'Admin' : 'Administratorka'}} se nikada nije {{$admin->gender->id == 1 ? 'ulogovao' : 'ulogovala'}} na platformu.
                            @endif
                        </p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Poslednji put {{$admin->gender->id == 1 ? 'ulogovan' : 'ulogovana'}}</span>
                        <p class="font-medium">
                            @if ($admin->login_count <= 0)
                            {{$admin->gender->id == 1 ? 'Admin' : 'Administratorka'}} se nikada nije {{$admin->gender->id == 1 ? 'ulogovao' : 'ulogovala'}} na platformu.
                            @else 
                            {{$admin->last_login_at->diffForHumans()}}
                            @endif
                        </p>
                    </div>

                </div>
                <div class="ml-[100px]  mt-[20px]">
               
                    <img 
                    class="p-2 border-2 border-gray-300"
                    width="300px"
                    id="loaded1" 
                    alt="Profilna slika {{$admin->gender->id == 1 ? 'administratora' : 'administratorke'}}"
                    title="Profilna slika {{$admin->gender->id == 1 ? 'administratora' : 'administratorke'}}"
                    src="{{$admin->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/administrators/' . $admin->photo}}" />
                    </div>
    
                    <div class="mt-[50px] ml-[30px]">
                        <label class="mt-6 cursor-pointer">
                            <div id="empty-cover-art" class="relative w-48 h-48 py-[48px] text-center border-2 border-gray-300 border-solid">
                                <div class="py-4">
                                    <svg class="mx-auto feather feather-image mb-[15px]" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                                        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
                                        <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                        <polyline points="21 15 16 10 5 21"></polyline>
                                    </svg>
                                    <span class="px-4 py-2 mt-2 leading-normal">Izmijeni fotografiju</span>
                                    <input type='file' name="photo" for="photo" id="photo" class="hidden" :accept="accept" onchange="loadFileLibrarian(event)" />
                                </div>
                                <img name="photo" id="image-output-librarian" class="hidden absolute w-48 h-[188px] bottom-0" />	
                            </div>
                        </label>   
                    </div>

                </div>

            </div>
            </div>
        </div>
    </section>
    <!-- End Content -->
</main>
<!-- End Main content -->

{{-- Scripts --}}
<script src="{{asset('ijaboCropTool/ijaboCropTool.min.js')}}"></script>

<script>
    $('#photo').ijaboCropTool({
          preview : '.image-previewer',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['Sačuvaj','Otkaži'],
          buttonsColor:['#4558BE','#ee5155', -15],
          processUrl:'{{route('admin.crop')}}',
          withCSRF:['_token', '{{csrf_token()}}'],
          onSuccess:function(message, element, status){
            swal({
           title: "Uspješno!",
           text: "Uspješno ste izmijenili profilnu fotografiju!",
           type: "success",
           timer: 1000,
           confirmButtonText: 'U redu',
           allowEscapeKey: false,
           allowOutsideClick: false,
           }).then(function() {
            window.location.reload();
           });
          },
          onError:function(message, element, status){
            swal({
          title: "Greška!",
          text: "Zahtijevana ekstenzija nije podržana!",
          type: "error",
          timer: 1500,
          confirmButtonText: 'U redu',
          allowEscapeKey: false,
          allowOutsideClick: false,
          });
          }
       });
</script>

@endsection