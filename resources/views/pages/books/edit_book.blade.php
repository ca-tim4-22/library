@extends('layouts.dashboard')

@section('title')

    <!-- Title -->
    <title>Izmijeni knjigu | Online Biblioteka</title>

@endsection

@section('content')

    <main class="flex flex-row small:hidden">

        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                Izmijeni knjigu
                            </h1>

                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="{{route('all-books')}}" class="text-[#2196f3] hover:text-blue-600">
                                            Evidencija knjiga
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="{{route('edit-book', $book->title)}}" class="text-[#2196f3] hover:text-blue-600">
                                            Izmijeni knjigu
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Form for update a book --}}
            <form action="{{route('update-book', $book->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-books.jquery_edit :models="$models" :book="$book"></x-books.jquery_edit>
            </form>
    </main>


@endsection
