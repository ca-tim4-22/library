 <!-- Content -->
 <section style="margin-top: 20px" class="w-screen h-screen pl-[0px] pb-2 text-gray-700">
    <!-- Space for content -->
    <div class="scroll height-content section-content">
            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[150px]">
                    <div class="mt-[20px]">
                        <p>Broj strana <span class="text-red-500">*</span></p>
                        <input type="number" name="page_count" id="brStrana" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsBrStrana()" value="{{$book->page_count}}" />
                        <div id="validateBrStrana"></div>
                    </div>

                    <div class="mt-[20px]">
                        <p>Jezik <span class="text-red-500">*</span></p>
                        <select id="select_box" class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="language_id" id="jezik" onclick="clearErrorsJezik()">

                    <option selected>{{$book->language->name}}</option>

                    @foreach ($models['languages'] as $language)

                    <option value="{{$language->id}}">{{$language->name}}</option>

                    @endforeach

                        </select>
                        <div id="validatePismo"></div>
                    </div>

                    <div class="mt-[20px]">
                        <p>Pismo <span class="text-red-500">*</span></p>
                        <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="letter_id" id="pismo" onclick="clearErrorsPismo()">
                    <option disabled selected></option>

                    <option selected>{{$book->letter->name}}</option>

                    @foreach ($models['letters'] as $letter)

                    <option value="{{$letter->id}}">{{$letter->name}}</option>

                    @endforeach

                        </select>
                        <div id="validatePismo"></div>
                    </div>

                    <div class="mt-[20px]">
                        <p>Povez <span class="text-red-500">*</span></p>
                        <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="binding_id" id="povez" onclick="clearErrorsPovez()">
                        <option selected>{{$book->binding->name}}</option>

                        @foreach ($models['bindings'] as $binding)

                        <option value="{{$binding->id}}">{{$binding->name}}</option>

                        @endforeach

                        </select>
                        <div id="validatePovez"></div>
                    </div>

                    <div class="mt-[20px]">
                        <p>Format <span class="text-red-500">*</span></p>
                        <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="format_id" id="format" onclick="clearErrorsFormat()">

                    <option selected>{{$book->format->name}}</option>

                    @foreach ($models['formats'] as $format)

                    <option value="{{$format->id}}">{{$format->name}}</option>

                    @endforeach

                        </select>
                        <div id="validateFormat"></div>
                    </div>

                    <div class="mt-[20px]">
                        <p>Međunarodni standardni broj knjige <span class="text-red-500">* @error('ISBN') {{$message}} @enderror</span></p>
                        <input type="number" name="ISBN" id="isbn" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsIsbn()" placeholder="978-3-16-148410-0" value="{{$book->ISBN}}"/>
                        <div id="validateIsbn"></div>
                    </div>
                </div>
            </div>
    </div>
</section>
<!-- End Content -->
