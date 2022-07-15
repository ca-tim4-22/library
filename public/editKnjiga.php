<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="ICT Cortex Library - project for high school students..." />
    <meta name="keywords" content="ict cortex, cortex, bild, bildstudio, highschool, students, coding" />
    <meta name="author" content="bildstudio" />
    <!-- End Meta -->

    <!-- Title -->
    <title>Edit book | Library - ICT Cortex student project</title>
    <link rel="shortcut icon" href="img/library-favicon.ico" type="image/vnd.microsoft.icon" />
    <!-- End Title -->

    <!-- Styles -->
    <?php include('includes/layout/styles.php'); ?>
    <!-- End Styles -->
</head>

<body class="overflow-hidden small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
    <!-- Header -->
    <?php include('includes/layout/header.php'); ?>
    <!-- Header -->

    <!-- Main content -->
    <main class="flex flex-row small:hidden">
        <!-- Sidebar -->
        <?php include('includes/layout/sidebar.php'); ?>
        <!-- End Sidebar -->

        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] py-[10px] flex flex-col">
                        <div>
                            <h1>
                                Izmijeni podatke
                            </h1>
                        </div>
                        <div>
                            <nav class="w-full rounded">
                                <ol class="flex list-reset">
                                    <li>
                                        <a href="evidencijaKnjiga.php" class="text-[#2196f3] hover:text-blue-600">
                                            Evidencija knjiga
                                        </a>
                                    </li>
                                    <li>
                                        <span class="mx-2">/</span>
                                    </li>
                                    <li>
                                        <a href="#" class="text-gray-400 hover:text-blue-600">
                                            Izmijeni podatke
                                        </a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
                <a href="#" class="inline active-book-nav hover:text-blue-800">
                    Osnovni detalji
                </a>
                <a href="editKnjigaSpecifikacija.php" class="inline ml-[70px] hover:text-blue-800 ">
                    Specifikacija
                </a>
                <a href="editKnjigaMultimedija.php" class="inline ml-[70px] hover:text-blue-800">
                    Multimedija
                </a>
            </div>
            <!-- Space for content -->
            <div class="scroll height-content section-content">
                <form class="text-gray-700 forma">
                    <div class="flex flex-row ml-[30px] mb-[150px]">
                        <div class="w-[50%]">
                            <div class="mt-[20px]">
                                <p>Naziv knjige <span class="text-red-500">*</span></p>
                                <input type="text" name="nazivKnjigaEdit" id="nazivKnjigaEdit" value="Tom Sojer"
                                    class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                                    onkeydown="clearErrorsNazivKnjigaEdit()" />
                                <div id="validateNazivKnjigaEdit"></div>
                            </div>

                            <div class="mt-[20px]">
                                <p class="inline-block mb-2">Kratki sadrzaj</p>
                                <textarea name="kratki_sadrzaj_edit"
                                    class="flex w-[90%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]">
                                    Tom Sojer je roman koji možemo da smatramo i autobiografijom jer je utemeljen na doživljajima samog Marka Tvena. Autor ga je pisao u nekoliko navrata: prvi deo napisan je u zimu 1872. godine, drugi deo u proljeće 1875. godine, a treći na leto te iste godine. Napisan je jednostavnim stilom i uz mnogo pripovedanja i humora pa je jednako interesantan i deci i odraslima. Tven je ovim romanom hteo da odrasle čitaoce podseti na detinjstvo.Pripovedanje u romanu Tom Sojer odvija se linearno, bez paralelnih radnji. Sva dešavanja u romanu vrte se oko jednog lika, a to je Tom Sojer. On se ističe svojom inteligencijom, neobuzdanošću i humorističnom naravi. 
                                </textarea>
                            </div>

                            <div class="mt-[20px]">
                                <p>Izaberite kategorije <span class="text-red-500">*</span></p>
                                <select x-cloak id="kategorijaEdit">
                                    <option value="1">Udzbenici</option>
                                    <option value="2">Romani</option>
                                </select>

                                <div x-data="dropdown()" x-init="loadOptionsEdit()" class="flex flex-col w-[90%]">
                                    <input name="values" id="kategorijaInputEdit" type="hidden"
                                        x-bind:value="selectedValuesKategorijaEdit()">
                                    <div class="relative inline-block w-[100%]">
                                        <div class="relative flex flex-col items-center">
                                            <div x-on:click="open" class="w-full svelte-1l8159u">
                                                <div class="flex p-1 my-2 bg-white border border-gray-300 shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                                    onclick="clearErrorsKategorijaEdit()">
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
                                                    <div x-show="selected.length    == 0" class="flex-1">
                                                        <input
                                                            class="w-full h-full p-1 px-2 text-gray-800 bg-transparent outline-none appearance-none"
                                                            x-bind:value="selectedValuesKategorijaEdit()">
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
                            <div id="validateKategorijaEdit"></div>
                        </div>

                        <div class="mt-[20px]">
                            <p>Izaberite zanrove <span class="text-red-500">*</span></p>
                            <select x-cloak id="zanrEdit">
                                <option value="1">Poezija</option>
                                <option value="2">Strucna literatura</option>
                                <option value="2">Knjige za djecu</option>
                            </select>

                            <div x-data="dropdown()" x-init="loadOptionsZanroviEdit()" class="flex flex-col w-[90%]">
                                <input name="values" id="zanroviInputEdit" type="hidden" x-bind:value="selectedValuesZanrEdit()">
                                <div class="relative inline-block w-[100%]">
                                    <div class="relative flex flex-col items-center">
                                        <div x-on:click="open" class="w-full svelte-1l8159u">
                                            <div class="flex p-1 my-2 bg-white border border-gray-300 shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                                onclick="clearErrorsZanrEdit()">
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
                                                <div x-show="selected.length    == 0" class="flex-1">
                                                    <input
                                                        class="w-full h-full p-1 px-2 text-gray-800 bg-transparent outline-none appearance-none"
                                                        x-bind:value="selectedValuesZanrEdit()">
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
                        <div id="validateZanrEdit"></div>
                    </div>
            </div>

            <div class="w-[50%]">
                <div class="mt-[20px]">
                    <p>Izaberite autore <span class="text-red-500">*</span></p>
                    <select x-cloak id="autoriEdit">
                        <option value="1">Mark Twain</option>
                        <option value="2">Pero Peric</option>
                    </select>

                    <div x-data="dropdown()" x-init="loadOptionsAutoriEdit()" class="flex flex-col w-[90%]">
                        <input name="values" id="autoriInputEdit" type="hidden" x-bind:value="selectedValuesAutoriEdit()">
                        <div class="relative inline-block w-[100%]">
                            <div class="relative flex flex-col items-center">
                                <div x-on:click="open" class="w-full svelte-1l8159u">
                                    <div class="flex p-1 my-2 bg-white border border-gray-300 shadow-sm svelte-1l8159u focus-within:ring-2 focus-within:ring-[#576cdf]"
                                        onclick="clearErrorsAutoriEdit()">
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
                                            <input
                                                class="w-full h-full p-1 px-2 text-gray-800 bg-transparent outline-none appearance-none"
                                                x-bind:value="selectedValuesAutoriEdit()">
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
                <div id="validateAutoriEdit"></div>
            </div>

            <div class="mt-[20px]">
                <p>Izdavac <span class="text-red-500">*</span></p>
                <select
                    class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                    name="izdavacEdit" id="izdavacEdit" onclick="clearErrorsIzdavacEdit()">
                    <option disabled></option>
                    <option value="">
                        Izdavac 1
                    </option>
                    <option selected value="">
                        Delfi knjizare
                    </option>
                </select>
                <div id="validateIzdavacEdit"></div>
            </div>

            <div class="mt-[20px]">
                <p>Godina izdavanja <span class="text-red-500">*</span></p>
                <select
                    class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                    name="godinaIzdavanjaEdit" id="godinaIzdavanjaEdit" onclick="clearErrorsGodinaIzdavanjaEdit()">
                    <option disabled></option>
                    <option value="">
                        Godina izdavanja 1
                    </option>
                    <option selected value="">
                        30.03.2011
                    </option>
                </select>
                <div id="validateGodinaIzdavanjaEdit"></div>
            </div>

            <div class="mt-[20px]">
                <p>Kolicina <span class="text-red-500">*</span></p>
                <input type="text" name="knjigaKolicinaEdit" id="knjigaKolicinaEdit" value="30"
                    class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                    onkeydown="clearErrorsKnjigaKolicinaEdit()" />
                <div id="validateKnjigaKolicinaEdit"></div>
            </div>
            </div>
            </div>

            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-white text-right py-[7px] mr-[100px]">
                        <button type="button"
                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Ponisti <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button id="sacuvajKnjiguEdit" type="submit"
                            class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                            onclick="validacijaKnjigaEdit()">
                            Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>
            </form>
            </div>
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->

    <!-- Notification for small devices -->
    <?php include('includes/layout/inProgress.php'); ?>


    <!-- Scripts -->
    <?php include('includes/layout/scripts.php'); ?>
    <!-- End Scripts -->

    <script>
    CKEDITOR.replace('kratki_sadrzaj_edit', {
        width: "90%",
        height: "150px"
    });
    </script>
</body>

</html>