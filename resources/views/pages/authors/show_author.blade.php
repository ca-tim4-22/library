@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Profil autora | Online Biblioteka</title>
    
@endsection

@section('content')

{{-- Sweet Alert --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

 <!-- Content -->
 <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
    <!-- Heading of content -->
    <div class="heading">
        <div class="flex justify-between border-b-[1px] border-[#e4dfdf]">
            <div class="pl-[30px] py-[10px] flex flex-col">
                <div>
                    <h1>
                        {{$author->NameSurname}}
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
                                <a href="{{route('show-author', $author)}}" class="text-gray-400 hover:text-blue-600">
                                    AUTOR-{{$author->id}}
                                </a>
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="pt-[24px] pr-[30px]">
                <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsAutor hover:text-[#606FC7]">
                    <i
                        class="fas fa-ellipsis-v"></i>
                </p>


                <div
                class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-autor">
                <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                     aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">

                        <div class="py-1">
                            <a href="{{route('edit-author', $author->NameSurname)}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Izmijeni autora</span>
                            </a>
                          
                            <button style="cursor: pointer;outline: none;" 
                            type="submit" 
                            data-id="{{$author->id}}" 
                            data-action="{{ route('destroy-author', $author->id) }}" 
                            onclick="deleteAuthor({{$author->id}})" 
                            style="outline: none;border: none;"
                            class="flex w-full px-4 py-2 text-sm text-left text-gray-700 outline-none hover:text-blue-600"
                            role="menuitem">
                            <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                            <span style="cursor: pointer" class="px-4 py-0">
                            Izbriši autora
                            </span>
                            </button>

                         {{-- Ajax --}}
                         <script type="text/javascript">
                            function deleteAuthor(id) {
                                var token = $("meta[name='csrf-token']").attr("content");
                                swal({
                                    text: "Da li ste sigurni da želite da izbrišete autora?",
                                    showCancelButton: !0,
                                    timer: '5000',
                                    animation: true,
                                    allowEscapeKey: true,
                                    allowOutsideClick: false,
                                    confirmButtonText: "Da, siguran sam!",
                                    cancelButtonText: "Ne, odustani",
                                    reverseButtons: !0,
                                    confirmButtonColor: '#14de5e',
                                    cancelButtonColor: '#f73302',
                                }).then(function (e) {
                                    if (e.value === true) {
                                        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                                        swal(
                                            'Uspješno!',
                                            'Uspješno ste izbrisali autora.',
                                            'success'
                                            ).then(function() {
                                            window.location.href = "/autori";
                                         });
                                        $.ajax({
                                            type: 'DELETE',
                                            url: "{{url('izbrisi-autora')}}/" + id,
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
        <div class="mr-[30px]">
            <div class="mt-[20px]">
                <span class="text-gray-500">Ime i prezime</span>
                <p class="font-medium">{{$author->NameSurname}}</p>
            </div>
            <div class="mt-[40px]">
                <span class="text-gray-500">Biografija</span>
                <p class="font-medium max-w-[550px]">
                    {!! $author->biography !!}
                </p>
            </div>
            <hr>
                <p class="font-medium max-w-[550px]">
                    <i class="fas fa-share"></i>
                    <a 
                    class="wikipedia-link"
                    href="{{$author->wikipedia}}" 
                    target="_blank">Pročitaj više</a>
            </div>
        </div>
    </div>
</section>
<style>
    hr {
       margin: 20px 0 20px 0;
    }
    .wikipedia-link:hover {
        color: #4558BE;
        transition: 0.25s ease-out;
    }
    
</style>
<!-- End Content -->
    
@endsection