 <!-- Content -->
 <section style="margin-top: 20px" class="w-screen h-screen pl-[0px] pb-2 text-gray-700">
    <!-- Space for content -->
    <div class="scroll height-content section-content">
        <form class="text-gray-700 forma">
            <div class="flex flex-row ml-[30px]">
                <div class="w-[50%] mb-[150px]">
                    <div class="mt-[20px]">
                        <p>Broj strana <span class="text-red-500">*</span></p>
                        <input type="text" name="brStrana" id="brStrana" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsBrStrana()"/>
                        <div id="validateBrStrana"></div>
                    </div>

                    <div class="mt-[20px]">
                        <p>Pismo <span class="text-red-500">*</span></p>
                        <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="pismo" id="pismo" onclick="clearErrorsPismo()">
                            <option disabled selected></option>
                            <option value="">
                                Cirilica
                            </option>
                            <option value="">
                                Latinica
                            </option>
                            <option value="">
                                Arapsko
                            </option>
                            <option value="">
                                Kinesko
                            </option>
                        </select>
                        <div id="validatePismo"></div>
                    </div>

                    <div class="mt-[20px]">
                        <p>Povez <span class="text-red-500">*</span></p>
                        <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="povez" id="povez" onclick="clearErrorsPovez()">
                            <option disabled selected></option>
                            <option value="">
                                Tvrdi
                            </option>
                            <option value="">
                                Meki
                            </option>
                        </select>
                        <div id="validatePovez"></div>
                    </div>

                    <div class="mt-[20px]">
                        <p>Format <span class="text-red-500">*</span></p>
                        <select class="flex w-[45%] mt-2 px-2 py-2 border bg-white border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#576cdf]" name="format" id="format" onclick="clearErrorsFormat()">
                            <option disabled selected></option>
                            <option value="">
                                A1
                            </option>
                            <option value="">
                                A2
                            </option>
                        </select>
                        <div id="validateFormat"></div>
                    </div>

                    <div class="mt-[20px]">
                        <p>International Standard Book Num <span class="text-red-500">*</span></p>
                        <input type="text" name="isbn" id="isbn" class="flex w-[45%] mt-2 px-2 py-2 text-base bg-white border border-gray-300 shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-[#576cdf]" onkeydown="clearErrorsIsbn()"/>
                        <div id="validateIsbn"></div>
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
                        <button style="margin-right: 30px" id="sacuvajSpecifikaciju" type="submit"
                            class="btn-animation shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]" onclick="validacijaSpecifikacija()">
                            Sacuvaj <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- End Content -->