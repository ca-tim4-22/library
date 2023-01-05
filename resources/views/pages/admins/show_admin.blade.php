@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>{{__('Profil administratora | Online biblioteka')}}</title>

<!-- ijaboCropTool Style -->
<link rel="stylesheet" href="{{asset('ijaboCropTool/ijaboCropTool.min.css')}}">

@endsection

@section('content')
{{-- Preloader --}}
<script src="{{asset('preloader/preloader.js')}}"></script>
{{-- Sweet Alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500"
      onload="myFunction()">
<section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
    <!-- Space for content -->
    {{-- Preloader --}}
    <div id="loader"></div>
    <div style="display:none;" id="myDiv">
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
                                    <a href="{{route('all-admin')}}"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        {{__('Svi administratori')}}
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{route('show-admin', $admin->username)}}"
                                       class="text-[#2196f3] hover:text-blue-600">
                                        ID-{{$admin->id}}
                                    </a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="pt-[24px] pr-[30px]">
                    <a href="#" class="inline hover:text-blue-600 show-modal">
                        <i class="fas fa-redo-alt mr-[3px]"></i>
                        {{__('Resetuj lozinku')}}
                    </a>
                    <a href="{{route('edit-admin', $admin->username)}}"
                       class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                        <i class="fas fa-edit mr-[3px] "></i>
                        {{__('Izmijeni podatke')}}
                    </a>
                    <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsStudentProfile hover:text-[#606FC7]"
                       id="dropdownstudent">
                        <i class="fas fa-ellipsis-v"></i>
                    </p>
                    <div
                            class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-student-profile">
                        <div class="absolute right-0 w-16 mt-[10px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                             aria-labelledby="headlessui-menu-button-1"
                             id="headlessui-menu-items-117" role="menu">
                            <div class="py-1">
                                {{-- Delete own account --}}
                                <button type="submit"
                                    @if (Auth::id()== $admin->id)
                                    data-id="{{$admin->id}}"
                                    data-action="{{ route('destroy-admin',
                                    $admin->id) }}"
                                    onclick="deleteAccountStudent({{$admin->id}})"
                                    @else
                                    data-id="{{$admin->id}}"
                                    data-action="{{ route('destroy-yourself',
                                    $admin->id) }}"
                                    onclick="deleteYourself({{$admin->id}})"
                                    @endif
                                    style="outline: none;border: none;"
                                    class="flex w-full px-4 py-2 text-sm
                                    leading-5 text-left text-gray-700
                                    outline-none hover:text-blue-600"
                                    role="menuitem">
                                    <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                    <span class="px-4 py-0">
                                @if (Auth::id() == $admin->id)
                                {{__('Izbriši svoj nalog')}}
                                @elseif ($admin->gender->id == 1)
                                {{__('Izbriši administratora')}}
                                @else
                                {{__('Izbriši administratorku')}}
                                @endif
                                </span>
                                </button>
                                {{-- Ajax --}}
                                <script type="text/javascript">
                                    function deleteAccountStudent(id) {
                                        var token = $("meta[name='csrf-token']").attr("content");
                                        swal({
                                            text: "@lang('Da li ste sigurni da želite da izbrišete nalog?')",
                                            showCancelButton: !0,
                                            timer: '5000',
                                            animation: true,
                                            allowEscapeKey: true,
                                            allowOutsideClick: false,
                                            confirmButtonText: "@lang('Da, siguran sam!')",
                                            cancelButtonText: "@lang('Ne, odustani')",
                                            reverseButtons: !0,
                                            confirmButtonColor: '#14de5e',
                                            cancelButtonColor: '#f73302',
                                        }).then(function (e) {
                                            if (e.value === true) {
                                                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                                                swal(
                                                    'Uspješno!',
                                                    'Uspješno ste izbrisali nalog.',
                                                    'success'
                                                ).then(function () {
                                                    window.location.href = "/good-bye";
                                                });
                                                $.ajax({
                                                    type: 'DELETE',
                                                    url: "{{url('izbrisi-administratora')}}/" + id,
                                                    data: {
                                                        "_token": token,
                                                    },
                                                    success: function (results) {
                                                    }
                                                });
                                            } else {
                                                e.dismiss;
                                            }
                                        }, function (dismiss) {
                                            return false;
                                        })
                                    }

                                    function deleteYourself(id) {
                                        var token = $("meta[name='csrf-token']").attr("content");
                                        swal({
                                            text: "@lang('Da li ste sigurni da želite da izbrišete nalog?')",
                                            showCancelButton: !0,
                                            timer: '5000',
                                            animation: true,
                                            allowEscapeKey: true,
                                            allowOutsideClick: false,
                                            confirmButtonText: "@lang('Da, siguran sam!')",
                                            cancelButtonText: "@lang('Ne, odustani')",
                                            reverseButtons: !0,
                                            confirmButtonColor: '#14de5e',
                                            cancelButtonColor: '#f73302',
                                        }).then(function (e) {
                                            if (e.value === true) {
                                                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                                                swal(
                                                    'Uspješno!',
                                                    'Uspješno ste izbrisali nalog.',
                                                    'success'
                                                ).then(function () {
                                                    window.location.href = "/ucenici";
                                                });
                                                $.ajax({
                                                    type: 'DELETE',
                                                    url: "{{url('izbrisi-svoj-nalog')}}/" + id,
                                                    data: {
                                                        "_token": token,
                                                    },
                                                    success: function (results) {
                                                    }
                                                });
                                            } else {
                                                e.dismiss;
                                            }
                                        }, function (dismiss) {
                                            return false;
                                        })
                                    }
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Space for content -->
        <div class="pl-[30px] height-profile pb-[30px] scroll mt-[20px]">

            @error('password')
            <div id="hideDiv"
                 class="flex p-2 mt-2 mb-1 text-sm text-red-700 bg-red-200 rounded-lg dark:bg-red-200 dark:text-red-800"
                 role="alert">
                <svg aria-hidden="true"
                     class="flex-shrink-0 inline w-5 h-5 mr-3"
                     fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
      <span class="font-medium">{{$message}}
                </div>
            </div>
            @enderror


            {{-- Session message for student update password --}}
            @if (session()->has('password-updated'))
            <div id="hideDiv"
                 class="flex p-2 mt-2 mb-1 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800"
                 role="alert">
                <svg aria-hidden="true"
                     class="flex-shrink-0 inline w-5 h-5 mr-3"
                     fill="currentColor" viewBox="0 0 20 20"
                     xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                          clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Uspješno!</span>
                    {{session('password-updated')}}
                </div>
            </div>
            @endif

            <div class="flex flex-row">
                <div class="mr-[30px]">
                    <div class="mt-[20px]">
                        <span class="text-gray-500">{{__('Ime i prezime')}}</span>
                        <p class="font-medium">{{$admin->name}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{__('Tip korisnika')}}</span>
                        <p class="font-medium">
                            {{$admin->gender->id == 1 ? __('Administrator') :
                            __('Administratorka') }}
                        </p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{__('JMBG')}}</span>
                        <p class="font-medium">{{$admin->JMBG}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{__('Email')}}</span>
                        <a
                                href="mailto:{{$admin->email}}"
                                class="cursor-pointer block font-medium text-[#2196f3] hover:text-blue-600">{{$admin->email}}</a>

                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{__('Korisničko ime')}}</span>
                        <p class="font-medium">{{$admin->username}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{__('Pol')}}</span>
                        <p class="font-medium">{{__($admin->gender->name)}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{__('Broj logovanja')}}</span>
                        <p class="font-medium"
                        >
                            @if ($admin->login_count <= 0)
                            @if ($admin->gender->id == 1)
                            {{__('Administrator se nikada nije ulogovao na platformu.')}}
                            @else
                            {{__('Administratorka se nikada nije ulogovala na platformu.')}}
                            @endif
                            @else
                            {{$admin->login_count}}
                            @endif
                        </p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">{{__('Poslednji put')}} {{$admin->gender->id == 1 ? __('ulogovan') : __('ulogovana')}}</span>
                        <p class="font-medium">
                            @if ($admin->login_count <= 0)
                            @if ($admin->gender->id == 1)
                            {{__('Administrator se nikada nije ulogovao na platformu.')}}
                            @else
                            {{__('Administratorka se nikada nije ulogovala na platformu.')}}
                            @endif
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
                            alt="Profilna fotografija {{$admin->gender->id == 1 ? 'administratora' : 'administratorke'}}"
                            title="Profilna fotografija {{$admin->gender->id == 1 ? 'administratora' : 'administratorke'}}"
                            src="{{$admin->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/administrators/' . $admin->photo}}"/>
                </div>
                @if (Auth::id() == $admin->id)
                <div class="mt-[50px] ml-[30px]">
                    <label class="mt-6 cursor-pointer">
                        <div id="empty-cover-art"
                             class="relative w-48 h-48 py-[48px] text-center border-2 border-gray-300 border-solid">
                            <div class="py-4">
                                <svg class="mx-auto feather feather-image mb-[15px]"
                                     xmlns="http://www.w3.org/2000/svg"
                                     width="40" height="40" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor"
                                     stroke-width="1" stroke-linecap="round"
                                     stroke-linejoin="round">
                                    <rect x="3" y="3" width="18" height="18"
                                          rx="2" ry="2"></rect>
                                    <circle cx="8.5" cy="8.5" r="1.5"></circle>
                                    <polyline
                                            points="21 15 16 10 5 21"></polyline>
                                </svg>
                                <span class="px-4 py-2 mt-2 leading-normal">{{__('Izmijeni fotografiju')}}</span>
                                <input type='file' name="photo" for="photo"
                                       id="photo" class="hidden"
                                       :accept="accept"
                                       onchange="loadFileLibrarian(event)"/>
                            </div>
                            <img style="object-fit: contain"
                                 id="image-output-librarian"
                                 class="hidden absolute w-48 h-[188px] bottom-0"/>
                        </div>
                    </label>
                </div>
                @endif

            </div>
        </div>
    </div>
</section>
<!-- End Content -->
</main>
<!-- End Main content -->

<!-- This code will show up when we press reset password -->
<div
        style="z-index: 11"
        class="fixed top-0 left-0 flex items-center justify-center hidden w-full h-screen bg-black bg-opacity-50 modal">
    <!-- Modal -->
    <div class="w-[500px] bg-white rounded shadow-lg md:w-1/3">
        <!-- Modal Header -->
        <div class="flex items-center justify-between px-[30px] py-[20px] border-b">
            <h3>{{__('Resetuj lozinku')}}: {{$admin->name}}</h3>

            <button
                    style="outline: none;border: none;"
                    class="close-modal button-close">
                <i class="fas fa-times"></i>
            </button>

        </div>
        <!-- Modal Body -->
        <form method="POST" action="{{route('resetPassword', $admin->id)}}">
            @csrf @honeypot
            <div class="flex flex-col px-[30px] py-[30px]">
                <div class="flex flex-col pb-[30px]">
                    <span>{{__('Unesite novu lozinku')}} <span
                                class="text-red-500">*</span></span>
                    <input
                            style="border: 0.4px solid #223394 !important"
                            class="remove h-[40px] px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-[#576cdf] mt-2"
                            type="password"
                            id="password"
                            data-strength class="form-control input-lg"
                            name="password">
                    <span toggle="#password"
                          class="password-eye-reset-modal fa fa-fw fa-eye field-icon toggle-password">
                </span>
                </div>
                <div class="flex flex-col pb-[30px]">
                    <span>{{__('Ponovite lozinku')}} <span
                                class="text-red-500">*</span></span>
                    <input
                            id="password"
                            name="password_confirmation"
                            style="border: 0.4px solid #223394 !important"
                            class="remove h-[40px] px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-[#576cdf] mt-2"
                            type="password">
                </div>
            </div>
            <div class="flex items-center justify-end px-[30px] py-[20px] border-t w-100 text-white">
                <button type="button" id="remove-values"
                        class="close-modal shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                    {{__('Poništi')}} <i class="fas fa-times ml-[4px]"></i>
                </button>

                <button type="submit"
                        class="shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]">
                    {{__('Sačuvaj')}} <i class="fas fa-check ml-[4px]"></i>
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Scripts --}}
<script src="{{asset('ijaboCropTool/ijaboCropTool.min.js')}}"></script>

<script>
    $('#photo').ijaboCropTool({
        preview: '.image-previewer',
        setRatio: 1,
        allowedExtensions: ['jpg', 'jpeg', 'png'],
        buttonsText: ['{{__('Sačuvaj')}}', '{{__('Otkaži')}}'],
        buttonsColor: ['#4558BE', '#ee5155', -15],
        processUrl: '{{route('admin.crop')}}',
        withCSRF: ['_token', '{{csrf_token()}}'],
        onSuccess: function (message, element, status) {
            swal({
                title: "@lang('Uspješno!')",
                text: "Uspješno ste izmijenili profilnu fotografiju!",
                type: "success",
                timer: 1000,
                confirmButtonText: "@lang('U redu')",
                allowEscapeKey: false,
                allowOutsideClick: false,
            }).then(function () {
                window.location.reload();
            });
        },
        onError: function (message, element, status) {
            swal({
                title: "@lang('Greška!')",
                text: "Zahtijevana ekstenzija nije podržana!",
                type: "error",
                timer: 1500,
                confirmButtonText: "@lang('U redu')",
                allowEscapeKey: false,
                allowOutsideClick: false,
            });
        }
    });
</script>

{{-- Toggle password script --}}
<script src="{{asset('toggle_password/toggle_password.js')}}"></script>
{{-- Password Strength --}}
<script src="{{asset('password_strength/password_strength.js')}}"></script>
@endsection