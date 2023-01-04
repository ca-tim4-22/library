<!-- Space for content -->
<div class="scroll height-dashboard">
    <div>
        <!-- Space for content -->
        <div class="flex justify-start pt-3 bg-white">
            <div class="mt-[10px]">
                <ul class="text-[#2D3B48]">

                    <li class="mb-[4px]">
                        <div class="w-[300px] pl-[32px]">
                            <span
                                    class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                <div class="{{(request()->is('izdate-knjige')) ? 'bg-[#EFF3F6] group-hover:text-[#576cdf] text-[#576cdf] text-[15px]' : ''}} group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                    <a href="{{route('rented-books')}}"
                                       aria-label="Izdate knjige"
                                       class="flex items-center">
                                    <i class="{{(request()->is('izdate-knjige')) ? 'text-[#576cdf]' : ''}} text-[#707070] text-[20px] far fa-copy transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                        <div>
                                            <p
                                                    class="text-[15px] ml-[21px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                Izdate knjige</p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>

                    <li class="mb-[4px]">
                        <div class="w-[300px] pl-[32px]">
                            <span
                                    class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                <div class="{{(request()->is('vracene-knjige')) ? 'bg-[#EFF3F6] group-hover:text-[#576cdf] text-[#576cdf] text-[15px]' : ''}} group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                    <a href="{{route('returned-books')}}"
                                       aria-label="Izdate knjige"
                                       class="flex items-center">
                                    <i class="{{(request()->is('vracene-knjige')) ? 'text-[#576cdf]' : ''}}text-[#707070] text-[20px] fas fa-file transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                        <div>
                                            <p
                                                    class="text-[15px] ml-[21px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                Vraćene knjige</p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>

                    <li class="mb-[4px]">
                        <div class="w-[300px] pl-[32px]">
                            <span
                                    class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                <div class="{{(request()->is('knjige-u-prekoracenju')) ? 'bg-[#EFF3F6] group-hover:text-[#576cdf] text-[#576cdf] text-[15px]' : ''}} group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                    <a href="{{route('overdue-books')}}"
                                       aria-label="Izdate knjige"
                                       class="flex items-center">
                                    <i class="{{(request()->is('knjige-u-prekoracenju')) ? 'text-[#576cdf]' : ''}} text-[#707070] text-[20px] fas fa-exclamation-triangle transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                        <div>
                                            <p class="text-[15px] ml-[17px] transition duration-300 ease-in group-hover:text-[#576cdf]">Knjige u prekoračenju</p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>

                    <li class="mb-[4px]">
                        <div class="w-[300px] pl-[32px]">
                            <span
                                    class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                <div class="{{(request()->is('aktivne-rezervacije')) ? 'bg-[#EFF3F6] group-hover:text-[#576cdf] text-[#576cdf] text-[15px]' : ''}} group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                    <a href="{{route('active-reservations')}}"
                                       aria-label="Izdate knjige"
                                       class="flex items-center">
                                    <i class="{{(request()->is('aktivne-rezervacije')) ? 'text-[#576cdf]' : ''}} text-[#707070] text-[20px] far fa-calendar-check transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                        <div>
                                            <p class="text-[15px] ml-[21px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                Aktivne rezervacije</p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>

                    <li class="mb-[4px]">
                        <div class="w-[300px] pl-[32px]">
                            <span
                                    class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                <div class="{{(request()->is('arhivirane-rezervacije')) ? 'bg-[#EFF3F6] group-hover:text-[#576cdf] text-[#576cdf] text-[15px]' : ''}} group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                    <a href="{{route('archived-reservations')}}"
                                       aria-label="Izdate knjige"
                                       class="flex items-center">
                                    <i class="{{(request()->is('arhivirane-rezervacije')) ? 'text-[#576cdf]' : ''}} text-[#707070] text-[20px] fas fa-calendar-alt transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                        <div>
                                            <p
                                                    class="text-[15px] ml-[21px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                Arhivirane rezervacije</p>
                                        </div>
                                    </a>
                                </div>
                            </span>
                        </div>
                    </li>
                </ul>
            </div>