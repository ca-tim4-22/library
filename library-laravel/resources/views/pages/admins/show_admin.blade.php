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
               
                @if($admin->gender->id == 1)
                
                <img 
                class="p-2 border-2 border-gray-300"
                width="300px"
                alt="Profilna slika {{$admin->gender->id == 1 ? 'administratora' : 'administratorke'}}"
                title="Profilna slika {{$admin->gender->id == 1 ? 'administratora' : 'administratorke'}}"
                src="https://i.pinimg.com/originals/42/36/d0/4236d00b6df31c5c1dab3566fa61ff3c.gif" />

                @else 

                <img 
                class="p-2 border-2 border-gray-300"
                width="300px"
                alt="Profilna slika {{$admin->gender->id == 1 ? 'administratora' : 'administratorke'}}"
                title="Profilna slika {{$admin->gender->id == 1 ? 'administratora' : 'administratorke'}}"
                src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/39305540757277.578c758b80108.gif" />
                
                @endif

                </div>

            </div>
            </div>
        </div>
    </section>
    <!-- End Content -->
</main>
<!-- End Main content -->

@endsection