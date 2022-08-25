@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Profil učenika | Online Biblioteka</title>

<!-- ijaboCropTool Style -->
<link rel="stylesheet" href="{{asset('ijaboCropTool/ijaboCropTool.min.css')}}">
    
@endsection

@section('content')
<x-jquery.jquery></x-jquery.jquery>

    <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
       <!-- Heading of content -->
       <div class="heading">
        <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[30px] py-[10px] flex flex-col">
                <div>
                    <h1>
                        {{$student->name}}
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
                                    <a href="{{route('show-student', $student->username)}}" class="text-[#2196f3] hover:text-blue-600">
                                        ID-{{$student->id}}
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="pt-[24px] pr-[30px]">
                    <a href="#" class="inline hover:text-blue-600 show-modal">
                        <i class="fas fa-redo-alt mr-[3px]"></i>
                        Resetuj lozinku
                    </a>
                    <a href="{{route('edit-student', $student->id)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                        <i class="fas fa-edit mr-[3px] "></i>
                        Izmijeni podatke
                    </a>
                    <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsStudentProfile hover:text-[#606FC7]"
                        id="dropdownstudent">
                        <i
                            class="fas fa-ellipsis-v"></i>
                    </p>
                    <div
                        class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-student-profile">
                        <div class="absolute right-0 w-56 mt-[10px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                            aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                            <div class="py-1">
                                <form action="{{route('destroy-student', $student->username)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                            style="outline: none;border: none;"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                            <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                            <span class="px-4 py-0">{{Auth::user()->id == $student->id ? "Izbriši svoj nalog" : "Izbriši učenika"}}</span>
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<!-- Space for content -->     
<div class="pl-[30px] height-profile pb-[30px] scroll mt-[20px]">

@error('password')            
    <div class="flex p-2 mt-2 mb-1 text-sm text-red-700 bg-red-200 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
    <span class="sr-only">Info</span>
    <div>
      <span class="font-medium">{{$message}}
    </div>
    </div>
@enderror


{{-- Session message for student update password --}}
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
                        <p class="font-medium">{{$student->name}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Tip korisnika</span>
                        <p class="font-medium">{{$student->user_type_id == 2 ? 'Bibliotekar' : 'Učenik'}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">JMBG</span>
                        <p class="font-medium">{{$student->JMBG}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Email</span>
                        <a
                        href="mailto:{{$student->email}}"
                        class="cursor-pointer block font-medium text-[#2196f3] hover:text-blue-600">{{$student->email}}</a>

                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Korisničko ime</span>
                        <p class="font-medium">{{$student->username}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Broj logovanja</span>
                        <p class="font-medium">{{$student->login_count != 0 ? $student->login_count : "Učenik se nikada nije ulogovao na platformu."}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Poslednji put logovan/a</span>
                        <p class="font-medium">{{$student->login_count <= 0 ? 'Učenik se nikada nije ulogovao na platformu.' : $student->last_login_at->diffForHumans()}}</p>
                    </div>

                </div>
                <div class="ml-[100px]  mt-[20px]">

                    @if (Auth::user()->id == $student->id)
                     <div class="mb-3 w-96">
                        <label for="formFileSm" class="inline-block mb-2 text-gray-700 form-label">Izmijeni fotografiju</label>
                        <input 
                        type="file"
                        class="block w-full px-2 py-1 m-0 text-sm font-normal text-gray-700 transition ease-in-out bg-white border border-gray-300 border-solid rounded form-control bg-clip-padding focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" 
                        name="photo" 
                        id="photo" >
                     </div>
                    @endif

                    <img 
                    class="p-2 border-2 border-gray-300" 
                    width="300px"
                    src="{{$student->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . $student->photo}}"
                    alt="Profilna slika učenika"
                    title="Profilna slika učenika" />
                </div>
            </div>
        </div>
    </section>
    <!-- End Content -->
</main>
<!-- End Main content -->

<!-- This code will show up when we press reset password -->
<div
    class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 modal">
    <!-- Modal -->
    <div class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
            <h3>Resetuj lozinku: {{$student->name}}</h3>
            
        <style>
        .button-hover:hover {
            color: #4558BE;
            transition: 0.25s;
            }
        </style>

        <button 
        style="outline: none;border: none;"
        class="close-modal button-hover">
        <i class="fas fa-times"></i>
        </button>
        
        </div>
        <!-- Modal Body -->
        <form method="POST" action="{{route('resetPassword', $student->id)}}">
            @csrf
              
            <div class="flex flex-col px-[30px] py-[30px]">
                <div class="flex flex-col pb-[30px]">
                    <span>Unesi novu lozinku <span class="text-red-500">*</span></span>
                    <input class="h-[40px] px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" type="password" name="password" id="password" onkeydown="clearErrorsPwResetBibliotekar()" required>
                    <div id="validatePwResetBibliotekar"></div>
                </div>
                <div class="flex flex-col pb-[30px]">
                    <span>Ponovi lozinku <span class="text-red-500">*</span></span>
                    <input class="h-[40px] px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" type="password" name="password_confirmation" id="password_confirmation" onkeydown="clearErrorsPw2ResetBibliotekar()">
                    <div id="validatePw2ResetBibliotekar"></div>
                </div>
            </div>
            <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
                <button type="button"
                    class="close-modal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                    Poništi <i class="fas fa-times ml-[4px]"></i>
                </button>
                <button id="resetujSifruBibliotekar" type="submit"
                    class="shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                    onclick="validacijaSifraBibliotekar()">
                    Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Scripts --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{asset('ijaboCropTool/ijaboCropTool.min.js')}}"></script>

<script>
    $('#photo').ijaboCropTool({
          preview : '.image-previewer',
          setRatio:1,
          allowedExtensions: ['jpg', 'jpeg','png'],
          buttonsText:['Sačuvaj','Otkaži'],
          buttonsColor:['#4558BE','#ee5155', -15],
          processUrl:'{{route('student.crop')}}',
          withCSRF:['_token', '{{csrf_token()}}'],
          onSuccess:function(message, element, status){
             alert(message);
          },
          onError:function(message, element, status){
            alert(message);
          }
       });
</script>
    
@endsection