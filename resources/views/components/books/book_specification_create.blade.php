<!-- Content -->
<section style="margin-top: 20px"
         class="w-screen h-screen pl-[0px] pb-2 text-gray-700">
    <!-- Space for content -->
    <div class="scroll height-content section-content">
        <div class="flex flex-row ml-[30px]">
            <div class="w-[50%] mb-[150px]">
                <div class="mt-[20px]">
                    <p>Broj strana <span class="text-red-500">* @error('page_count') {{$message}} @enderror</span>
                    </p>
                    <input type="number" name="page_count" id="brStrana"
                           class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                           onkeydown="clearErrorsBrStrana()"
                           value="{{old('page_count')}}"/>
                </div>

                <div class="mt-[20px]">
                    <p>Jezik <span class="text-red-500">* @error('language_id') {{$message}} @enderror</span>
                    </p>
                    <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                            name="language_id" id="jezik"
                            onclick="clearErrorsJezik()">
                        <option disabled selected></option>

                        @foreach ($models['languages'] as $language)

                        <option value="{{$language->id}}" {{ old(
                        'language_id') == $language->id ? 'selected' : ''
                        }}>{{$language->name}}
                        </option>

                        @endforeach

                    </select>
                </div>

                <div class="mt-[20px]">
                    <p>Pismo <span class="text-red-500">* @error('letter_id') {{$message}} @enderror</span>
                    </p>
                    <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                            name="letter_id" id="pismo"
                            onclick="clearErrorsPismo()">
                        <option disabled selected></option>

                        @foreach ($models['letters'] as $letter)

                        <option value="{{$letter->id}}" {{ old(
                        'letter_id') == $letter->id ? 'selected' : ''
                        }}>{{$letter->name}}
                        </option>

                        @endforeach

                    </select>
                </div>

                <div class="mt-[20px]">
                    <p>Povez <span class="text-red-500">* @error('binding_id') {{$message}} @enderror</span>
                    </p>
                    <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                            name="binding_id" id="povez"
                            onclick="clearErrorsPovez()">
                        <option disabled selected></option>

                        @foreach ($models['bindings'] as $binding)

                        <option value="{{$binding->id}}" {{ old(
                        'binding_id') == $binding->id ? 'selected' : ''
                        }}>{{$binding->name}}
                        </option>

                        @endforeach

                    </select>
                </div>

                <div class="mt-[20px]">
                    <p>Format <span class="text-red-500">* @error('format_id') {{$message}} @enderror</span>
                    </p>
                    <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                            name="format_id" id="format"
                            onclick="clearErrorsFormat()">
                        <option disabled selected></option>

                        @foreach ($models['formats'] as $format)

                        <option value="{{$format->id}}" {{ old(
                        'format_id') == $format->id ? 'selected' : ''
                        }}>{{$format->name}}
                        </option>

                        @endforeach

                    </select>
                </div>

                <div class="mt-[20px]">
                    <p>Međunarodni standardni broj knjige
                        <span class="text-red-500">* @error('ISBN') {{$message}} @enderror</span>
                        <span style="margin-left: 10px" class="hide_this color"
                              id="characters-counter">13</span>
                        <i style="color: rgb(3, 241, 3);margin-left: 10px"
                           class="show_this hidden fas fa-check"></i>
                    </p>
                    <input id="count" type="tel" name="ISBN" id="isbn"
                           class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]"
                           onkeydown="clearErrorsIsbn()"
                           placeholder="978-3-16-148410-0"
                           value="{{old('ISBN')}}"/>
                </div>

                <style>
                    .color {
                        color: #4558BE;
                    }

                    .hide_counter {
                        display: none;
                    }

                    .hidden {
                        display: none;
                    }

                    .red {
                        color: red !important;
                    }
                </style>

                {{-- ISBN counter --}}
                <script src="{{asset('isbn_counter/isbn_counter.js')}}"></script>

            </div>
        </div>
    </div>
</section>
<!-- End Content -->
