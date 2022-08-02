@extends('layouts.dashboard')

@section('content')

    <title>Učenici | Online Biblioteka</title>
    <x-sidebar></x-sidebar>
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
                                        Svi Učenici
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="{{route('show-student', $student->id)}}" class="text-[#2196f3] hover:text-blue-600">
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
                        Resetuj šifru
                    </a>
                    <a href="{{route('edit-student', $student->id)}}" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                        <i class="fas fa-edit mr-[3px] "></i>
                        Izmjeni podatke
                    </a>
                    <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-gray-300 dotsLibrarianProfile hover:text-[#606FC7]"
                       id="dropdownStudent">
                        <i
                            class="fas fa-ellipsis-v"></i>
                    </p>
                    <div
                        class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-librarian-profile">
                        <div class="absolute right-0 w-56 mt-[10px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                             aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                            <div class="py-1">
                                <form action="{{ route('destroy-student', $student->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                            role="menuitem">
                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">{{Auth::user()->id == $student->id ? "Izbriši nalog" : "Izbriši korisnika"}}</span>
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
            <div class="flex flex-row">
                <div class="mr-[30px]">
                    <div class="mt-[20px]">
                        <span class="text-gray-500">Ime i prezime</span>
                        <p class="font-medium">{{$student->name}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Tip korisnika</span>
                        <p class="font-medium">{{$student->user_type_id == 1 ? 'Učenik' : 'Bibliotekar'}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">JMBG</span>
                        <p class="font-medium">{{$student->JMBG}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Email</span>
                        <a
                            class="cursor-pointer block font-medium text-[#2196f3] hover:text-blue-600">{{$student->email}}</a>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Korisničko ime</span>
                        <p class="font-medium">{{$student->username}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Broj logovanja</span>
                        <p class="font-medium">{{$student->login_count}}</p>
                    </div>
                    <div class="mt-[40px]">
                        <span class="text-gray-500">Poslednji put logovan/a</span>
                        <p class="font-medium">{{$student->last_login_at->diffForHumans()}}</p>
                    </div>

                </div>
                <div class="ml-[100px]  mt-[20px]">
                    <img
                        class="p-2 border-2 border-gray-300"
                        width="300px"
                        src="{{$student->photo == 'placeholder' ? '/img/profileExample.jpg' : '/storage/students/' . $student->photo}}"
                        alt="User Photo"
                        title="User Photo" />
                </div>
            </div>
        </div>
    </section>

@endsection
