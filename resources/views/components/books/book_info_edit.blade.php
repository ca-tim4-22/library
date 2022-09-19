{{-- JQuery CDN --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" referrerpolicy="no-referrer"></script>
{{-- Session message fade out js file --}}
<script src="{{asset('js/session_message_jquery.js')}}"></script>

 <!-- Main content -->
 <main class="flex flex-row small:hidden">

    <!-- Content -->
    <section style="margin-top: 20px" class="w-screen h-screen pl-[0px] pb-2 text-gray-700">

{{-- Session message for book update --}}
@if (session()->has('update-book'))
    <div id="hideDiv" class="flex p-2 mt-2 mb-1 text-sm text-green-700 bg-green-200 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Info</span>
        <div>
            <span class="font-medium">Success!</span> {{session('update-book')}}
        </div>
    </div>
@endif

        <!-- Space for content -->
        <div class="scroll height-content section-content">
            <form class="text-gray-700">
                <div class="flex flex-row ml-[30px] mb-[150px]">
                    <div class="w-[50%]">
                        <div class="mt-[20px]">
                            <p>Naziv knjige <span class="text-red-500">*</span></p>
                            <input type="text" name="title" id="nazivKnjiga"
                                class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                onkeydown="clearErrorsNazivKnjiga()" value="{{$book->title}}"/>
                        </div>

                        <div class="mt-[20px]">
                            <p class="inline-block mb-2">Kratki sadržaj</p>
                            <textarea 
                            name="body"
                            class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">
                            {{$book->body}}
                            </textarea>
                        </div>

                        <div class="mt-[20px]">
                            <p>Izaberite kategorije <span class="text-red-500">*</span>
                            @if ($book->categories->count() > 1)
                            <b>Trenutne kategorije</b>:
                            @elseif ($book->categories->count() == 1)
                            <b>Trenutna kategorija</b>:
                            @endif
                            @foreach ($book->categories as $category)
                            {{$loop->first ? '' : '|'}}
                            <span style="color: #4558BE;font-weight: bold"> {{$category->category->name}} </span>
                            @endforeach
                            </p>
                            <select x-cloak id="kategorija" name="category_id">
                           
                            @foreach ($models['categories'] as $category)
                            
                              <option value="{{$category->id}}">{{$category->name}}</option> 

                            @endforeach

                            </select>

                            <div x-data="dropdown()" x-init="loadOptions()" class="flex flex-col w-[90%]">
                                <input name="category_id" id="kategorijaInput" type="hidden"
                                    x-bind:value="selectedValues()">
                                <div class="relative inline-block w-[100%]">
                                    <div class="relative flex flex-col items-center">
                                        <div x-on:click="open" class="w-full svelte-1l8159u">
                                            
                                            <div class="flex p-1 my-2 bg-white border border-gray-300 shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                                onclick="clearErrorsKategorija()">
                                                <div class="flex flex-wrap flex-auto">
                                                    <template x-for="(option,index) in selected"
                                                        :key="options[option].value">
                                                        <div
                                                            class="flex items-center justify-center px-[6px] py-[2px] m-1 text-blue-800 bg-blue-200 rounded-[10px] ">
                                                            <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                                                options[option] x-text="options[option].text"></div>
                                                            <div class="flex flex-row-reverse flex-auto">
                                                                <div x-on:click="remove(index,option)">
                                                                    <svg class="w-6 h-6 fill-current " role="button"
                                                                        viewBox="0 0 20 20">
                                                                        <path
                                                                            d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                                        c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                                        l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                                        C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                                    </svg>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                                </template>
                                                <div x-show="selected.length == 0" class="flex-1">
                                                    <input name="category_id"
                                                        class="w-full h-full p-1 px-2 text-gray-800 bg-transparent outline-none appearance-none"
                                                        x-bind:value="selectedValues()">
                                                </div>
                                            </div>

                                            <div
                                                class="flex items-center w-8 py-1 pl-2 pr-1 text-gray-300 svelte-1l8159u">
                                                <button type="button" x-show="isOpen() === true" x-on:click="open"
                                                    class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                                    <svg version="1.1" class="w-[10px] h-[9px] ml-[15px]"
                                                        viewBox="0 0 20 20" stroke="#374151" stroke-width="3">
                                                        <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                        c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                        L17.418,6.109z" />
                                                    </svg>
                                                </button>
                                                <button type="button" x-show="isOpen() === false" @click="close"
                                                    class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                                    <svg version="1.1" class="w-[10px] h-[9px] ml-[15px]"
                                                        viewBox="0 0 20 20" stroke="#374151" stroke-width="3">
                                                        <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                        c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                        L17.418,6.109z" />
                                                    </svg>
                                                </button>
                                            </div>








                                            
                                        </div>
                                    </div>
                                    <div class="w-full">
                                        <div x-show.transition.origin.top="isOpen()"
                                            class="z-40 w-full overflow-y-auto bg-white rounded shadow max-h-select svelte-5uyqqj"
                                            x-on:click.away="close">
                                            <div class="flex flex-col w-full">
                                                <template x-for="(option,index) in options" :key="option">
                                                    <div>
                                                        <div class="w-full border-b border-gray-100 rounded-t cursor-pointer hover:bg-teal-100"
                                                            @click="select(index,$event)">
                                                            <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                                                class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">
                                                                <div class="flex items-center w-full">
                                                                    <div class="mx-2 leading-6" x-model="option"
                                                                        x-text="option.text"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-[20px]">
                        <p>Izaberite žanrove <span class="text-red-500">*</span>
                            @if ($book->genres->count() > 1)
                            <b>Trenutni</b> žanrovi:
                            @elseif ($book->genres->count() == 1)
                            <b>Trenutni žanr</b>:
                            @endif
                            @foreach ($book->genres as $genre)
                            {{$loop->first ? '' : '|'}}
                            <span style="color: #4558BE;font-weight: bold"> {{$genre->genre->name}} </span>
                            @endforeach
                            </p>
                        <select x-cloak id="zanr" name="genre_id">

                            @foreach ($models['genres'] as $genre)

                               <option value="{{$genre->id}}">{{$genre->name}}</option>

                            @endforeach

                        </select>

                        <div x-data="dropdown()" x-init="loadOptionsZanrovi()" class="flex flex-col w-[90%]">
                            <input name="genre_id" id="zanroviInput" type="hidden" x-bind:value="selectedValues()">
                            <div class="relative inline-block w-[100%]">
                                <div class="relative flex flex-col items-center">
                                    <div x-on:click="open" class="w-full svelte-1l8159u">
                                        <div class="flex p-1 my-2 bg-white border border-gray-300 shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                            onclick="clearErrorsZanr()">
                                            <div class="flex flex-wrap flex-auto">
                                                <template x-for="(option,index) in selected"
                                                    :key="options[option].value">
                                                    <div
                                                        class="flex items-center justify-center px-[6px] py-[2px] m-1 text-blue-800 bg-blue-200 rounded-[10px] ">
                                                        <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                                            options[option] x-text="options[option].text"></div>
                                                        <div class="flex flex-row-reverse flex-auto">
                                                            <div x-on:click="remove(index,option)">
                                                                <svg class="w-6 h-6 fill-current " role="button"
                                                                    viewBox="0 0 20 20">
                                                                    <path
                                                                        d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                                        c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                                        l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                                        C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                                </svg>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                            </template>
                                            <div x-show="selected.length == 0" class="flex-1">
                                                <input name="genre_id"
                                                    class="w-full h-full p-1 px-2 text-gray-800 bg-transparent outline-none appearance-none"
                                                    x-bind:value="selectedValues()">
                                            </div>
                                        </div>
                                        <div
                                            class="flex items-center w-8 py-1 pl-2 pr-1 text-gray-300 svelte-1l8159u">
                                            <button type="button" x-show="isOpen() === true" x-on:click="open"
                                                class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                                <svg version="1.1" class="w-[10px] h-[9px] ml-[15px]"
                                                    viewBox="0 0 20 20" stroke="#374151" stroke-width="3">
                                                    <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                        c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                        L17.418,6.109z" />
                                                </svg>
                                            </button>
                                            <button type="button" x-show="isOpen() === false" @click="close"
                                                class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                                <svg version="1.1" class="w-[10px] h-[9px] ml-[15px]"
                                                    viewBox="0 0 20 20" stroke="#374151" stroke-width="3">
                                                    <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                        c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                        L17.418,6.109z" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="w-full">
                                    <div x-show.transition.origin.top="isOpen()"
                                        class="z-40 w-full overflow-y-auto bg-white rounded shadow max-h-select svelte-5uyqqj"
                                        x-on:click.away="close">
                                        <div class="flex flex-col w-full">
                                            <template x-for="(option,index) in options" :key="option">
                                                <div>
                                                    <div class="w-full border-b border-gray-100 rounded-t cursor-pointer hover:bg-teal-100"
                                                        @click="select(index,$event)">
                                                        <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                                            class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">
                                                            <div class="flex items-center w-full">
                                                                <div class="mx-2 leading-6" x-model="option"
                                                                    x-text="option.text"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <div class="w-[50%]">
            <div class="mt-[20px]">
                <p>Izaberite autore <span class="text-red-500">*</span>
                @if ($book->authors->count() > 1)
                <b>Trenutni</b> autori:
                @elseif ($book->authors->count() == 1)
                <b>Trenutni autor</b>:
                @endif
                @foreach ($book->authors as $author)
                {{$loop->first ? '' : '|'}}
                <span style="color: #4558BE;font-weight: bold"> {{$author->author->NameSurname}} </span>
                @endforeach
                </p>
                <select x-cloak id="autori" name="author_id">

                    @foreach ($models['authors'] as $author)

                    <option value="{{$author->id}}">{{$author->NameSurname}}</option>

                    @endforeach

                </select>

                <div x-data="dropdown()" x-init="loadOptionsAutori()" class="flex flex-col w-[90%]">
                    <input name="author_id" id="autoriInput" type="hidden" x-bind:value="selectedValues()">
                    <div class="relative inline-block w-[100%]">
                        <div class="relative flex flex-col items-center">
                            <div x-on:click="open" class="w-full svelte-1l8159u">
                                <div class="flex p-1 my-2 bg-white border border-gray-300 shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                    onclick="clearErrorsAutori()">
                                    <div class="flex flex-wrap flex-auto">
                                        <template x-for="(option,index) in selected" :key="options[option].value">
                                            <div
                                                class="flex items-center justify-center px-[6px] py-[2px] m-1 text-blue-800 bg-blue-200 rounded-[10px] ">
                                                <div class="text-xs font-normal leading-none max-w-full flex-initial x-model="
                                                    options[option] x-text="options[option].text"></div>
                                                <div class="flex flex-row-reverse flex-auto">
                                                    <div x-on:click="remove(index,option)">
                                                        <svg class="w-6 h-6 fill-current " role="button"
                                                            viewBox="0 0 20 20">
                                                            <path
                                                                d="M14.348,14.849c-0.469,0.469-1.229,0.469-1.697,0L10,11.819l-2.651,3.029c-0.469,0.469-1.229,0.469-1.697,0
                                                                                        c-0.469-0.469-0.469-1.229,0-1.697l2.758-3.15L5.651,6.849c-0.469-0.469-0.469-1.228,0-1.697s1.228-0.469,1.697,0L10,8.183
                                                                                        l2.651-3.031c0.469-0.469,1.228-0.469,1.697,0s0.469,1.229,0,1.697l-2.758,3.152l2.758,3.15
                                                                                        C14.817,13.62,14.817,14.38,14.348,14.849z" />
                                                        </svg>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                    </template>
                                    <div x-show="selected.length    == 0" class="flex-1">
                                        <input name="author_id"
                                            class="w-full h-full p-1 px-2 text-gray-800 bg-transparent outline-none appearance-none"
                                            x-bind:value="selectedValues()">
                                    </div>
                                </div>
                                <div class="flex items-center w-8 py-1 pl-2 pr-1 text-gray-300 svelte-1l8159u">
                                    <button type="button" x-show="isOpen() === true" x-on:click="open"
                                        class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                        <svg version="1.1" class="w-[10px] h-[9px] ml-[15px]" viewBox="0 0 20 20"
                                            stroke="#374151" stroke-width="3">
                                            <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                        c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                        L17.418,6.109z" />
                                        </svg>
                                    </button>
                                    <button type="button" x-show="isOpen() === false" @click="close"
                                        class="w-6 h-6 text-gray-600 outline-none cursor-pointer focus:outline-none">
                                        <svg version="1.1" class="w-[10px] h-[9px] ml-[15px]" viewBox="0 0 20 20"
                                            stroke="#374151" stroke-width="3">
                                            <path d="M17.418,6.109c0.272-0.268,0.709-0.268,0.979,0s0.271,0.701,0,0.969l-7.908,7.83
                                                                        c-0.27,0.268-0.707,0.268-0.979,0l-7.908-7.83c-0.27-0.268-0.27-0.701,0-0.969c0.271-0.268,0.709-0.268,0.979,0L10,13.25
                                                                        L17.418,6.109z" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="w-full">
                            <div x-show.transition.origin.top="isOpen()"
                                class="z-40 w-full overflow-y-auto bg-white rounded shadow max-h-select svelte-5uyqqj"
                                x-on:click.away="close">
                                <div class="flex flex-col w-full">
                                    <template x-for="(option,index) in options" :key="option">
                                        <div>
                                            <div class="w-full border-b border-gray-100 rounded-t cursor-pointer hover:bg-teal-100"
                                                @click="select(index,$event)">
                                                <div x-bind:class="option.selected ? 'border-teal-600' : ''"
                                                    class="relative flex items-center w-full p-2 pl-2 border-l-2 border-transparent">
                                                    <div class="flex items-center w-full">
                                                        <div class="mx-2 leading-6" x-model="option"
                                                            x-text="option.text"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-[20px]">
            <p>Izdavač <span class="text-red-500">*</span></p>
            <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="publisher_id" id="izdavac" onclick="clearErrorsIzdavac()">
                <option disabled selected></option>

                    @foreach ($models['publishers'] as $publisher)

                    @if ($publisher->id == $book->publisher->id)
                    <option selected value="{{$publisher->id}}">{{$publisher->name}}</option>
                    @else
                    <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                    @endif

                    @endforeach

            </select>
        </div>

          <div class="mt-[20px]">
            <p>Godina izdavanja <span class="text-red-500">*</span></p>
            <select
                class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                name="year" id="godinaIzdavanja" onclick="clearErrorsGodinaIzdavanja()">
                <option selected>{{$book->year}}</option>
                @php
                $year = date("Y");
                @endphp
                @for ($counter = 2000; $counter <= $year; $counter++)
                <option value="{{$counter}}">{{$counter}}</option>
                @endfor
            </select>
        </div>

        <div class="mt-[20px]">
            <p>Količina <span class="text-red-500">*</span></p>
            <input type="number" name="quantity_count" id="knjigaKolicina"
                class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                onkeydown="clearErrorsKnjigaKolicina()" value="{{$book->quantity_count}}"/>
        </div>
        </div>
        </div>
    </section>
    <!-- End Content -->
</main>
<!-- End Main content -->


<x-scripts></x-scripts>

<script>
    CKEDITOR.replace('body', {
        width: "90%",
        height: "150px"
    });
</script>
