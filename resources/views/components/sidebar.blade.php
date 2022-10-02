<nav id="sidebar"
    class="fixed z-10 flex flex-col justify-between overflow-x-hidden overflow-y-auto bg-[#EFF3F6] sidebar nav-height">
    <div class="">
        <!-- Hamburger Icon -->
        <div
            class="text-[#707070] pl-[30px] pt-[28px] pb-[27px] text-[25px] border-b-[1px] border-[#e4dfdf] ">
            <i id="hamburger" class="hamburger-btn fas fa-bars cursor-pointer"></i>
        </div>
        <div class="mt-[30px]">
            <ul class="text-[#2D3B48] sidebar-nav">
                <!-- Dashboard Icon -->

                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">

                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="{{route('dashboard')}}" aria-label="Dashboard">
                                    <i 
                                    style="font-size: 21px"
                                    class="{{ (request()->is('dashboard')) ? 'text-[25px] text-[#707070] 
                                    fas fa-tachometer-alt transition duration-300 ease-in text-[#576cdf]' : 'text-[25px] text-[#707070] fas fa-tachometer-alt  transition duration-300 ease-in group-hover:text-[#576cdf]'}}"></i>
                                    <div class="hidden sidebar-item">
                                        <p class=" inline text-[15px] ml-[20px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                            Dashboard
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>

                @if (Auth::user()->type->id == 3)
                <!-- Administrator Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">

                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="{{route('all-admin')}}" aria-label="Administratori">
                                    <i 
                                    style="font-size: 20px"
                                    class="{{ (request()->is('administratori')) ? 'text-[25px] text-[#707070] 
                                    fas fa-user-shield transition duration-300 ease-in text-[#576cdf]' : 'text-[25px] text-[#707070] fas fa-user-shield  transition duration-300 ease-in group-hover:text-[#576cdf]'}}"></i>
                                    <div class="hidden sidebar-item">
                                        <p class=" inline text-[15px] ml-[20px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                            Administratori
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                @endif


                @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
                <!-- Librarians Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">

                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="{{route('all-librarian')}}" aria-label="Bibliotekari">
                                    <i class="{{ (request()->is('bibliotekari')) ? 'text-[25px] text-[#707070] far fa-address-book transition duration-300 ease-in text-[#576cdf]' : 'text-[25px] text-[#707070] far fa-address-book transition duration-300 ease-in group-hover:text-[#576cdf]'}}"></i>
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
                @endif



                @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
                <!-- Students Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="{{route('all-student')}}" aria-label="Ucenici">
                                    <i class="{{(request()->is('ucenici')) ? 'text-[18px] text-[#707070] fas fa-users transition duration-300 ease-in text-[#576cdf]' : 'text-[18px] text-[#707070] fas fa-users transition duration-300 ease-in group-hover:text-[#576cdf]'}}"></i>
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
                @endif

                <!-- Knjige Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="{{route('all-books')}}" aria-label="Knjige">
                                    <i 
                                    style="font-size: 25px"
                                    class="{{ (request()->is('knjige')) ? 'text-[25px] text-[#707070] 
                                    far fa-copy transition duration-300 ease-in text-[#576cdf]' : 'text-[25px] text-[#707070]   far fa-copy  transition duration-300 ease-in group-hover:text-[#576cdf]'}}"></i>
                                    <div class="hidden sidebar-item">
                                        <p class=" inline text-[15px] ml-[20px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                            Knjige
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>

                @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
                <!-- Autori Icon -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA] h-[60px]">
                    <div class="ml-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="{{route('all-author')}}" aria-label="Autori">
                                    <i 
                                    style="font-size: 21px"
                                    class="{{ (request()->is('autori')) ? 'text-[25px] text-[#707070] 
                                    fas fa-user-edit transition duration-300 ease-in text-[#576cdf]' : 'text-[25px] text-[#707070] fas fa-user-edit transition duration-300 ease-in group-hover:text-[#576cdf]'}}"></i>
                                    <div class="hidden sidebar-item">
                                        <p class=" inline text-[15px] ml-[20px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                            Autori
                                        </p>
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
                           <a href="{{route('rented-books')}}" aria-label="Knjige">
                              <i class="{{(request()->is('izdate-knjige')) || (request()->is('vracene-knjige')) || (request()->is('knjige-u-prekoracenju')) || (request()->is('aktivne-rezervacije')) || (request()->is('arhivirane-rezervacije')) ? 'text-[25px] text-[#707070] fas fa-exchange-alt transition duration-300 ease-in text-[#576cdf]' : 'text-[25px] text-[#707070] fas fa-exchange-alt transition duration-300 ease-in group-hover:text-[#576cdf]'}}"></i>
                                    <div class="hidden sidebar-item">
                                        <p
                                            class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                                            Transakcije
                                        </p>
                                    </div>
                                </a>
                            </div>
                        </span>
                    </div>
                </li>
                @endif

                <!-- Expand menu example -->
                <li class="pt-[18px] pb-[14px] mb-[4px] group hover:bg-[#EAEAEA]">
                    <div class="mx-[30px]">
                        <span class="flex justify-between w-full whitespace-nowrap">
                            <div>
                                <a href="#" id="btnFullscreen" aria-label="Fullscreen">

                                    {{-- Before fullscreen --}}
                                    <i id="expand" class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[25px] text-[#707070] fas fa-expand"></i>

                                    {{-- While fullscreen mode --}}
                                    <i id="expand2" class="hidden_expand transition duration-300 ease-in group-hover:text-[#576cdf] text-[25px] text-[#707070] fas fa-compress-alt"></i>

                                    <div class="hidden sidebar-item">
                                <button
                                  id="btnFullscreen"
                                  type="button"
                                  style="outline: none;border: none;"
                                  class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">Fullscreen
                                </button>
                            {{-- Script for fullscreen - JQuery --}}
                            <script src="{{asset('js/fullscreen-jquery.js')}}"></script>
                            </div>
                            </a>
                            </div>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
    <div class="sidebar-nav py-[10px] border-t-[1px] border-[#e4dfdf] pt-[23px] pb-[29px] group hover:bg-[#EFF3F6]">
        <!-- Settings Icon -->
        <a id="gear_text" href="{{route('setting-policy')}}" aria-label="Podešavanja" class="ml-[30px]">
            <span class="whitespace-nowrap">
                <i id="gear" class="{{(request()->is('podesavanja/*')) ? 'text-[25px] text-[#707070] fas fa-cog transition duration-300 ease-in text-[#576cdf]' : 'text-[25px] text-[#707070] fas fa-cog transition duration-300 ease-in group-hover:text-[#576cdf]'}}"></i>

                <div class="hidden sidebar-item">
                    <p class="transition duration-300 ease-in group-hover:text-[#576cdf] inline text-[15px] ml-[20px]">
                        Podešavanja</p>
                </div>
            </span>
        </a>
    </div>

    @endif
   
</nav>
