<nav id="sidebar"
    class="fixed z-10 flex flex-col justify-between overflow-x-hidden overflow-y-auto bg-[#EFF3F6] sidebar nav-height">
    <div class="">
        <!-- Hamburger Icon -->
        <div
            class="cursor-pointer text-[#707070] pl-[30px] pt-[28px] pb-[27px] text-[25px] border-b-[1px] border-[#e4dfdf] ">
            <i id="hamburger" class="hamburger-btn fas fa-bars"></i>
        </div>
        <div class="mt-[30px]">
            <ul class="text-[#2D3B48] sidebar-nav">
                <!-- Dashboard Icon -->
                <li class="bg-[#EAEAEA] pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA]">
                    <div class="ml-[25px]">
                        <span class="flex justify-between w-full fill-current whitespace-nowrap">
                            <div class="transition duration-300 ease-in group-hover:text-[#576cdf]">
                                <a href="{{route('dashboard')}}" aria-label="Dashboard">
                                    <i class="text-white ml-1 bg-[#3F51B5] px-[5px] pt-[4px] pb-[5px] fas fa-tachometer-alt text-[19px] rounded-[3px]"></i>
                                    <div class="hidden sidebar-item">
                                        <p class="inline text-[15px] ml-[15px]">Dashboard</p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Bibliotekari Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">

                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="{{ route('all-librarian') }}" aria-label="Bibliotekari">

                                    <i class=" {{ (request()->is('bibliotekari')) ? 'text-white bg-[#3F51B5] px-[5px] pt-[4px] pb-[5px] far fa-address-book text-[19px] rounded-[3px]' : 'text-[25px] text-[#707070] far fa-address-book transition duration-300 ease-in group-hover:text-[#576cdf]' }}"></i>

                                    <div class="hidden sidebar-item">
                                        <p class=" inline text-[15px] ml-[20px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                            Bibliotekari
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Ucenici Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="{{route('all-student')}}" aria-label="Ucenici">

                                    <i class="text-[18px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] fas fa-users"></i>
                                    <div class="hidden sidebar-item">
                                        <p
                                            class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                            Učenici</p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Knjige Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="evidencijaKnjiga.php" aria-label="Knjige">
                                    <i
                                        class="text-[25px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] far fa-copy"></i>
                                    <div class="hidden sidebar-item">
                                        <p
                                            class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                            Knjige</p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Autori Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="autori.php" aria-label="Knjige">
                                    <i
                                        class="text-[25px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] far fa-address-book"></i>
                                    <div class="hidden sidebar-item">
                                        <p
                                            class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                            Autori</p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Izdavanje Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="izdateKnjige.php" aria-label="Knjige">
                                    <i
                                        class="text-[22px] transition duration-300 ease-in group-hover:text-[#576cdf] text-[#707070] fas fa-exchange-alt"></i>
                                    <div class="hidden sidebar-item">
                                        <p
                                            class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                            Izdavanje
                                            knjiga
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Expand menu example -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA]">
                    <div class="mx-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="#" aria-label="Dashboard">
                                    <i class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[25px] text-[#707070] fas fa-expand"></i>
                                    <div class="hidden sidebar-item">
                                        <p
                                            class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                            Expand</p>
                                    </div>
                                </a>
                            </div>
                            <div id="item-collapse_1"
                                class="asideArrow hidden sidebar-item transition duration-300 ease-in hover:text-[#576cdf] cursor-pointer">
                                <i id="arrow-collapse_1" class="inline arrow fas fa-angle-right"></i>
                            </div>
                        </span>
                    </div>
                </li>
                <!-- Expand menu - items -->
                <ul id="aside-item_1"
                    class="aside-item hidden pl-[70px] mt-[5px] pt-[8px] pb-[10px] text-[#778089] text-[14px]">
                    <li class="mb-[4px] py-[6px]">
                        <div class="transition duration-300 ease-in hover:text-[#2d3b48]">
                            <a href="#" aria-label="Dashboard">
                                <div class="hidden sidebar-item">
                                    <p class="inline">Expand</p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="mb-[4px] py-[6px]">
                        <div class="transition duration-300 ease-in hover:text-[#2d3b48]">
                            <a href="#" aria-label="Dashboard">
                                <div class="hidden sidebar-item">
                                    <p class="inline">Basic expand</p>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li class="mb-[4px] py-[6px]">
                        <div class="transition duration-300 ease-in hover:text-[#2d3b48]">
                            <a href="#" aria-label="Dashboard">
                                <div class="hidden sidebar-item">
                                    <p class="inline">Basic expand</p>
                                </div>
                            </a>
                        </div>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
    <div class="sidebar-nav py-[10px] border-t-[1px] border-[#e4dfdf] pt-[23px] pb-[29px]  group hover:bg-[#EFF3F6]">
        <!-- Settings Icon -->
        <a href="{{route('setting-policy')}}" aria-label="Settngs" class="ml-[30px]">
            <span class="whitespace-nowrap">
                <i
                    class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[22px] text-[#707070] fas fa-cog"></i>
                <div class="hidden sidebar-item">
                    <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                        Podešavanja</p>
                </div>
            </span>
        </a>
    </div>
</nav>