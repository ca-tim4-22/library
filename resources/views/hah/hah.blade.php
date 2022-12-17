@extends('layouts.dashboard')

@section('title')

<!-- Title -->
<title>Potvrda naloga | Online biblioteka</title>
    
@endsection

@section('content')

    <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
        <!-- Heading of content -->
        <div class="heading">
            <div class="flex border-b-[1px] border-[#e4dfdf]">
                <div class="pl-[30px] py-[10px] flex flex-col">
                    <div>
                        <h1>
                            Potvrda naloga
                        </h1>
                    </div>
                    <div>
                        <nav class="w-full rounded">
                            <ol class="flex list-reset">
                                <li>
                                    <a href="" class="text-[#2196f3] hover:text-blue-600">
                                        Svi učenici
                                    </a>
                                </li>
                                <li>
                                    <span class="mx-2">/</span>
                                </li>
                                <li>
                                    <a href="" class="text-gray-400 hover:text-blue-600">
                                        Izmijeni podatke
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
            <form class="text-gray-700 text-[14px]" method="POST" action="{{route('updatic', $user->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="flex flex-row ml-[30px]">
                    <div class="w-[50%] mb-[100px]">

                        <div class="mt-[20px]">
                            <span>JMBG<span class="text-red-500">*</span></span>
                            <input type="text" name="JMBG" id="JMBG" value="{{$user->JMBG}}" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"/>
                        </div>

                        <div class="mt-[20px]">
                            <span>Tip korisnika</span>
                            <select class="flex w-[90%] mt-2 px-2 py-2 border bg-white border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="user_gender_id">
                                @foreach ($genders as $gender)
                                <option value="{{$gender->id}}">
                                    {{$gender->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-[20px]">
                        <label for="">Saberi {{$first}} + {{$second}} = ?</label>

                        <input type="number" name="result" id="result" class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"/>
                        </div>

                    </div>

                <div class="absolute bottom-0 w-full">
                    <div class="flex flex-row">
                        <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                           <button
                           type="button"
                           onclick="history.back()"
                           class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                           Poništi <i class="fas fa-times ml-[4px]"></i>
                            </button>
                            <button type="submit"
                                    class="mr-[30px] mb-[10px] btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" >
                                    Sačuvaj <i class="fas fa-check ml-[4px]"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>


@endsection
