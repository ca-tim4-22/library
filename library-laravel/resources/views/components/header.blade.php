<header
    class="z-20 small:hidden flex items-center text-white justify-between w-full h-[71px] pr-[30px] mx-auto bg-[#4558BE]">
    <!-- logo -->
    <div class="logo-font inline-flex bg-[#3F51B5] py-[18px] px-[30px]">
        <a class="_o6689fn" href="#">
            <div class="block">
                <a href="{{route('dashboard')}}" class="text-[20px] font-medium">
                    <div class="flex">
                        <img src='{{asset('img/logo.svg')}}' alt="Online Biblioteka" title="Online Biblioteka" width="35px" height="35px">
                        <p class="text-[20px] mt-[5px]">&nbsp;&nbsp;Online Biblioteka</p>
                    </div>

                </a>
            </div>
        </a>
    </div>
    <!-- end logo -->

    <!-- login -->
    <div class="flex-initial">
        <div class="relative flex items-center justify-end">
            <div class="flex items-center">
                <!-- Notification Icon -->
                <div class="relative block">
                    <a href="{{route('dashboard-activity')}}" class="relative inline-block px-3 py-2 focus:outline-none"
                        aria-label="Notification">
                        <div class="flex items-center h-5">
                            <div class="_xpkakx">
                                <span
                                    class="transition duration-300 ease-in bg-[#606FC7] text-[25px] rounded-full px-[11px] py-[7px] ">
                                    <i class="far fa-bell"></i>
                                </span>
                            </div>
                        </div>
                    </a>

                    <span class="absolute bg-[#EF4F4C] text-[11px] font-medium text-white right-[10px] top-[-10px] pl-[4px] pr-[5px] pt-[1px] text-center rounded">
                        12 
                    </span>

                </div>
                <!-- Add Icon -->
                <a class="inline-block border-l-[1px] border-gray-300 px-3" href="#" aria-label="Add something" id="dropdownCreate">
                    <span
                        class="transition duration-300 ease-in bg-[#606FC7] text-[25px] rounded-full px-[11px] py-[7px]  ">
                        <i class="fas fa-plus"></i>
                    </span>
                </a>

                <div
                    class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-create">
                    <div class="absolute right-[12px] w-56 mt-[35px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            <a href="{{route('new-librarian')}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="far fa-address-book mr-[8px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Bibliotekar</span>
                            </a>
                            <a href="{{route('store-student')}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="fas fa-users mr-[5px] ml-[3px] py-1"></i>
                                <span class="px-4 py-0">Učenik</span>
                            </a>
                            <a href="{{route('new-book')}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="far fa-copy mr-[10px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Knjiga</span>
                            </a>
                            <a href="{{route('new-author')}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="far fa-address-book mr-[10px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Autor</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Coinis Icon -->
                <a href="https://coinis.com" target="_blank">
                    <img style="height: 2%" width="35px" src="{{asset('img/welcome/coinis_logo.jpg')}}" alt="Coinis Logo" title="Coinis Logo">
                </a>
                <!-- User Profile Icon -->
                <div class="ml-[10px] relative block">
                    <a href="#" class="relative inline-block px-3 py-2 focus:outline-none" id="dropdownProfile"
                        aria-label="User profile">
                        <div class="flex items-center h-5">
                            <div class="w-[40px] h-[40px] mt-[15px]">

                                @if (Auth::user()->type->name == 'librarian')
                                <img 
                                class="rounded-full" 
                                src="{{Auth::user()->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/librarians/' . Auth::user()->photo}}" 
                                alt="{{Auth::user()->username}}" 
                                title="{{Auth::user()->username}}">

                                @else

                                <img 
                                class="rounded-full" 
                                src="{{Auth::user()->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . Auth::user()->photo}}" 
                                alt="{{Auth::user()->username}}" 
                                title="{{Auth::user()->username}}">
                                @endif

                            </div>
                        </div>
                    </a>
                </div>
                <div
                    class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-profile">
                    <div class="absolute right-[12px] w-56 mt-[35px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                        aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            @if (Auth::user()->type->name == 'librarian')
                            <a href="{{route('show-librarian', Auth::user()->username)}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                            @else
                            <a href="{{route('show-student', Auth::user()->username)}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                    
                            @endif
                                <i class="fas fa-file mr-[8px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Profil</span>
                            </a>
                            <a href="{{route('logout')}}" tabindex="0"
                                class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                role="menuitem">
                                <i class="fas fa-sign-out-alt mr-[5px] ml-[5px] py-1"></i>
                                <span class="px-4 py-0">Odjavi se</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end login -->
</header>