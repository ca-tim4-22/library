@props(['count'])

<header
        class="z-20 small:hidden flex items-center text-white justify-between w-full h-[71px] pr-[30px] mx-auto bg-[#4558BE]">
    <!-- logo -->
    <div class="logo-font inline-flex bg-[#3F51B5] py-[18px] px-[30px]">
        <a class="_o6689fn" href="#">
            <div class="block">
                <a href="{{route('dashboard')}}"
                   class="text-[20px] font-medium">
                    <div class="flex">
                        <img src='{{asset('img/logo.svg')}}' alt="{{__('Online
                        biblioteka')}}" title="{{__('Online biblioteka')}}"
                        width="35px" height="35px">
                        <p class="text-[20px] mt-[5px]">&nbsp;&nbsp;{{__('Online biblioteka')}}</p>
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

                @if (Auth::user()->type->id == 2 || Auth::user()->type->id == 3)
                <!-- Notification Icon -->
                <div class="relative block">
                    <a style="pointer-events: none;" style="cursor:default"
                       href="{{route('dashboard-activity')}}"
                       class="relative inline-block px-3 py-2 focus:outline-none"
                       aria-label="Notification">
                        <div class="flex items-center h-5">
                            <div class="_xpkakx">
                                <span
                                        class="transition duration-300 ease-in bg-[#606FC7] text-[25px] rounded-full px-[11px] py-[7px] ">
                                    <i style="pointer-events:all;cursor: pointer;"
                                       class="far fa-bell" id="bell"></i>
                                </span>
                            </div>
                        </div>
                    </a>

                    @if ($count != 0)
                    <span class="absolute bg-[#EF4F4C] text-[11px] font-medium text-white right-[10px] top-[-10px] pl-[4px] pr-[5px] pt-[1px] text-center rounded no-select">
                            {{$count}}
                    </span>
                    @endif

                </div>
                <!-- Add Icon -->
                <a style="pointer-events: none;"
                   class="inline-block border-l-[1px] border-gray-300 px-3"
                   href="#" aria-label="Add something" id="dropdownCreate">
                    <span
                            class="transition duration-300 ease-in bg-[#606FC7] text-[25px] rounded-full px-[11px] py-[7px]  ">
                        <i style="pointer-events:all;cursor: pointer;"
                           class="fas fa-plus" id="plus"></i>
                    </span>
                </a>
                <div
                        class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-create">
                    <div class="absolute right-[12px] w-56 mt-[35px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                         aria-labelledby="headlessui-menu-button-1"
                         id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            @if (Auth::user()->type->id == 3)
                            <a href="{{route('store-admin')}}" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                               role="menuitem">
                                <i class=" fas fa-user-shield mr-[5px] ml-[3px] py-1"></i>
                                <span id="scale_link_ad" class="px-4 py-0">{{__('Administrator')}}</span>
                            </a>
                            <a href="{{route('new-librarian')}}" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                               role="menuitem">
                                <i class="far fa-address-book mr-[8px] ml-[5px] py-1"></i>
                                <span id="scale_link_l" class="px-4 py-0">{{__('Bibliotekar')}}</span>
                            </a>
                            @endif
                            <a href="{{route('store-student')}}" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                               role="menuitem">
                                <i class="fas fa-users mr-[5px] ml-[3px] py-1"></i>
                                <span id="scale_link_s" class="px-4 py-0">{{__('Učenik')}}</span>
                            </a>
                            <a href="{{route('new-book')}}" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                               role="menuitem">
                                <i class="far fa-copy mr-[10px] ml-[5px] py-1"></i>
                                <span id="scale_link_b" class="px-4 py-0">
                                 {{__('Knjiga')}}
                                </span>
                            </a>
                            <a href="{{route('new-author')}}" tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                               role="menuitem">
                                <i class="far fa-address-book mr-[10px] ml-[5px] py-1"></i>
                                <span id="scale_link_au" class="px-4 py-0">{{__('Autor')}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                @endif

                {{-- <!-- nullable() logo -->
                <a href="https://perisicnikola37.github.io/nullable"
                   target="_blank">
                    <img style="height: 2%;border-radius: 30px;margin-left: 15px"
                         width="38px"
                         src="https://i.postimg.cc/CMnpbPWn/nullable.jpg"
                         alt="nullable() logo">
                </a>
                <!-- school logo -->
                <a href="https://elektropg.online/ets/" target="_blank">
                    <img style="height: 2%;border-radius: 30px;margin-left: 15px"
                         width="42px"
                         src="https://i.postimg.cc/cHNTcVzk/elektro-logo.png"
                         alt="Vaso Aligrudić">
                </a> --}}

                <form class="flex" method="get"
                      action="{{ route('changeLang') }}">
                    <button class="outline-none" name="lang" type="submit"
                            value="sr" {{ session()->get('locale') == 'sr' ?
                        'selected' : '' }}>
                        <img width="30"
                             src="https://cdn.countryflags.com/thumbs/serbia/flag-round-250.png"
                             alt="{{__('Srpski')}}" title="{{__('Srpski')}}">
                    </button>

                    <button class="ml-3 outline-none" name="lang" type="submit"
                            value="en" {{ session()->get('locale') == 'en' ?
                        'selected' : '' }}>
                        <img width="30"
                             src="https://vectorflags.s3.amazonaws.com/flags/uk-circle-01.png"
                             alt="{{__('Engleski')}}"
                             title="{{__('Engleski')}}">
                    </button>

                    <button class="ml-3 outline-none" name="lang" type="submit"
                            value="it" {{ session()->get('locale') == 'it' ?
                        'selected' : '' }}>
                        <img width="30"
                             src="https://cdn.countryflags.com/thumbs/italy/flag-round-250.png"
                             alt="{{__('Italijanski')}}"
                             title="{{__('Italijanski')}}">
                    </button>

                    <button class="ml-3 outline-none" name="lang" type="submit"
                            value="fr" {{ session()->get('locale') == 'fr' ?
                        'selected' : '' }}>
                        <img width="30"
                             src="https://cdn-icons-png.flaticon.com/512/197/197560.png"
                             alt="{{__('Francuski')}}"
                             title="{{__('Francuski')}}">
                    </button>

                    <button class="ml-3 outline-none" name="lang" type="submit"
                            value="zh" {{ session()->get('locale') == 'zh' ?
                        'selected' : '' }}>
                        <img width="30"
                             src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ae/Circle_Flag_of_the_People%27s_Republic_of_China.svg/2048px-Circle_Flag_of_the_People%27s_Republic_of_China.svg.png"
                             alt="{{__('Kineski')}}" title="{{__('Kineski')}}">
                    </button>

                    <button class="ml-3 outline-none" name="lang" type="submit"
                            value="ru" {{ session()->get('locale') == 'ru' ?
                        'selected' : '' }}>
                        <img width="30"
                             src="https://cdn.countryflags.com/thumbs/russia/flag-round-250.png"
                             alt="{{__('Ruski')}}" title="{{__('Ruski')}}">
                    </button>

                    <button class="ml-3 outline-none" name="lang" type="submit"
                            value="hi" {{ session()->get('locale') == 'hi' ?
                        'selected' : '' }}>
                        <img width="30"
                             src="https://cdn-icons-png.flaticon.com/512/197/197419.png"
                             alt="{{__('Hindi')}}" title="{{__('Hindi')}}">
                    </button>
                </form>

                <!-- User Profile Photo -->
                <div class="ml-[10px] relative block">
                    <a href="#"
                       class="relative inline-block px-3 py-2 focus:outline-none"
                       id="dropdownProfile"
                       aria-label="User profile">
                        <div class="flex items-center h-5">
                            <div class="w-[40px] h-[40px] mt-[15px]">

                                @if (Auth::user()->type->name == 'librarian')
                                <img
                                        class="rounded-full"
                                        src="{{Auth::user()->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/librarians/' . Auth::user()->photo}}"
                                        alt="{{Auth::user()->username}}"
                                        title="{{Auth::user()->username}}"/>
                                @elseif(Auth::user()->type->name == 'student')
                                <img
                                        class="rounded-full"
                                        src="{{Auth::user()->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . Auth::user()->photo}}"
                                        alt="{{Auth::user()->username}}"
                                        title="{{Auth::user()->username}}"/>
                                @else
                                <img
                                        class="rounded-full"
                                        src="{{Auth::user()->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/administrators/' . Auth::user()->photo}}"
                                        alt="{{Auth::user()->username}}"
                                        title="{{Auth::user()->username}}"/>
                                @endif

                            </div>

                        </div>
                    </a>
                </div>
                <div class="z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-profile">
                    <div class="absolute right-[12px] w-56 mt-[35px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                         aria-labelledby="headlessui-menu-button-1"
                         id="headlessui-menu-items-117" role="menu">
                        <div class="py-1">
                            @if (Auth::user()->type->name == 'librarian')
                            <a href="{{route('show-librarian', Auth::user()->username)}}"
                               tabindex="0"
                               class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                               role="menuitem">
                                @elseif (Auth::user()->type->name == 'student')
                                <a href="{{route('show-student', Auth::user()->username)}}"
                                   tabindex="0"
                                   class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                   role="menuitem">
                                    @else
                                    <a href="{{route('show-admin', Auth::user()->username)}}"
                                       tabindex="0"
                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                       role="menuitem">
                                        @endif
                                        <i class="fas fa-user-circle mr-[8px] ml-[5px] py-1"></i>
                                        <span id="scale_link_profile"
                                              class="px-4 py-0">{{__('Profil')}}</span>
                                    </a>
                                    <a href="{{route('logout')}}" tabindex="0"
                                       class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                       role="menuitem">
                                        <i class="fas fa-sign-out-alt mr-[5px] ml-[5px] py-1"></i>
                                        <span id="scale_link_logout"
                                              class="px-4 py-0">{{__('Odjavi se')}}</span>
                                    </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end login -->
</header>