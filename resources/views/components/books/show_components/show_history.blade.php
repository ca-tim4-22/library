  <!-- Space for content -->
  <div class="section mt-[20px]">
    <div class="flex flex-row justify-between">
        <div class="mr-[30px]">
            <div class="mt-[20px]">
                <div class="scroll height-dashboard">
                    <div>
                        <!-- Space for content -->
                        <div class="flex justify-start pt-3 bg-white">
                            <div class="mt-[10px]">
                                <ul class="text-[#2D3B48]">
                                    <li class="mb-[4px]">
                                        <div class="w-[300px] pl-[32px]">
                                            <span
                                                class=" whitespace-nowrap w-full text-[25px]  flex justify-between fill-current">
                                                <div
                                                    class="py-[15px] px-[20px] w-[268px] cursor-pointer bg-[#EFF3F6] rounded-[10px]">
                                                    <a href="{{route('rented-books')}}" aria-label="Sve knjige"
                                                        class="flex items-center">
                                                        <i
                                                            class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[#576cdf] far fa-copy text-[20px]"></i>
                                                        <div>
                                                            <p
                                                                class="transition duration-300 ease-in group-hover:text-[#576cdf] text-[#576cdf] text-[15px] ml-[18px]">
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
                                                <div
                                                    class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                    <a href="vraceneKnjige.php" aria-label="Izdate knjige"
                                                        class="flex items-center">
                                                        <i
                                                            class="text-[#707070] text-[20px] fas fa-file transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                        <div>
                                                            <p
                                                                class="text-[15px] ml-[21px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                                Vracene knjige</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </span>
                                        </div>
                                    </li>
                                    <li class="mb-[4px]">
                                        <div class="w-[300px] pl-[28px]">
                                            <span
                                                class=" whitespace-nowrap w-full text-[25px] flex justify-between fill-current">
                                                <div
                                                    class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                    <a href="knjigePrekoracenje.php" aria-label="Knjige na raspolaganju"
                                                        class="flex items-center">
                                                        <i
                                                            class="text-[#707070] text-[20px] fas fa-exclamation-triangle transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                        <div>
                                                            <p
                                                                class="text-[15px] ml-[17px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                                Knjige u prekoracenju</p>
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
                                                <div
                                                    class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                    <a href="aktivneRezervacije.php" aria-label="Rezervacije"
                                                        class="flex items-center">
                                                        <i
                                                            class="text-[#707070] text-[20px] far fa-calendar-check transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                        <div>
                                                            <p
                                                                class="text-[15px] ml-[19px] transition duration-300 ease-in group-hover:text-[#576cdf]">
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
                                                <div
                                                    class="group hover:bg-[#EFF3F6] py-[15px] px-[20px] w-[268px] rounded-[10px] cursor-pointer">
                                                    <a href="arhiviraneRezervacije.php" aria-label="Rezervacije"
                                                        class="flex items-center">
                                                        <i
                                                            class="text-[#707070] text-[20px] fas fa-calendar-alt transition duration-300 ease-in group-hover:text-[#576cdf]"></i>
                                                        <div>
                                                            <p
                                                                class="text-[15px] ml-[19px] transition duration-300 ease-in group-hover:text-[#576cdf]">
                                                                Arhivirane rezervacije</p>
                                                        </div>
                                                    </a>
                                                </div>
                                            </span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
    
                            <div class="w-full mt-[10px] ml-2 px-2">
                                <table class="shadow-lg rounded-xl w-full border-[1px] border-[#e4dfdf]" id="myTable">
                                    <thead class="bg-[#EFF3F6]">
                                        <tr class="border-b-[1px] border-[#e4dfdf]">
                                            <th style="width: 150px" class="px-4 py-4 leading-4 tracking-wider text-left">
                                                Naziv knjige
                                            </th>
                                            <th style="width: 150px" class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer uceniciDrop-toggle">
                                                Izdato učeniku 
                                            </th>
    
                                            <th style="width: 180px" class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">
                                                Datum izdavanja 
                                            </th>

                                            <th style="width: 180px" class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer datumDrop-toggle">
                                                Datum vraćanja  
                                            </th>
    
                                            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer zadrzavanjeDrop-toggle">
                                                Trenutno zadržavanje knjige 
                                            </th>

                                            <th class="relative px-4 py-4 text-sm leading-4 tracking-wider text-left cursor-pointer bibliotekariDrop-toggle">
                                                Knjigu izdao 
                                            </th>

                                            <th class="px-4 py-4"> </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                               
                                     @if (count($rents) > 0)
                                     @foreach ($rents as $rent)
                                     @foreach ($rent->rent_status->where('book_status_id', 1) as $book)
                                     <tr class="hover:bg-gray-200 hover:shadow-md border-b-[1px] border-[#e4dfdf]">
                                        <td class="flex flex-row items-center px-4 py-3">
                                            <img 
                                            class="object-cover w-8 mr-2 h-11" 
                                            src="{{$book->rent->book->placeholder == 1 ? $book->rent->book->cover->photo : '/storage/book-covers/' . $book->rent->book->cover->photo}}" 
                                            alt="Naslovna fotografija" 
                                            title="Naslovna fotografija" />
                                            <a href="{{route('show-book', $book->rent->book->title)}}">
                                                <span class="font-medium text-center">{{$book->rent->book->title}}</span>
                                            </a>
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$book->rent->borrow->name}}</td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            @php
                                            echo date("d-m-Y", strtotime($book->rent->issue_date));
                                            @endphp
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            @php
                                            echo date("d-m-Y", strtotime($book->rent->return_date));
                                            @endphp
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">
                                            <div>
                                                <span>
                                                @php
                                                $datetime1 = new DateTime(($book->rent->issue_date));
                                                $datetime2 = new DateTime(($book->rent->return_date));
                                                $interval = $datetime1->diff($datetime2);
                                                echo '<span style="color: #2A4AB3">' .  $interval->format('%a dana')  .'</span>';
                                                @endphp
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm leading-5 whitespace-no-wrap">{{$book->rent->librarian->name}}
                                        </td>
                                        <td class="px-6 py-3 text-sm leading-5 text-right whitespace-no-wrap">
                                            <p class="inline cursor-pointer text-[20px] py-[10px] px-[30px] border-gray-300 dotsIzdateKnjige hover:text-[#606FC7]">
                                                <i
                                                    class="fas fa-ellipsis-v"></i>
                                            </p>
                                            <div
                                                class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 izdate-knjige">
                                                <div class="absolute right-0 w-56 mt-2 origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                                    aria-labelledby="headlessui-menu-button-1"
                                                    id="headlessui-menu-items-117" role="menu">
                                                    <div class="py-1">
                                                        <a href="{{route('rented-info', $book->rent->id)}}" tabindex="0"
                                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                            role="menuitem">
                                                             <i class="far fa-file mr-[10px] ml-[5px] py-1"></i>
                                                             <span class="px-4 py-0">Pogledaj detalje</span>
                                                         </a>
                                     
                                                         <a href="{{route('return-book', $book->rent->book->title)}}" tabindex="0"
                                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                            role="menuitem">
                                                             <i class="fas fa-redo-alt mr-[10px] ml-[5px] py-1"></i>
                                                             <span class="px-4 py-0">Vrati knjigu</span>
                                                         </a>
                                     
                                                         <a href="{{route('write-off', $book->rent->book->title)}}" tabindex="0"
                                                            class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                                            role="menuitem">
                                                             <i class="fas fa-level-up-alt mr-[14px] ml-[5px] py-1"></i>
                                                             <span class="px-4 py-0">Otpiši knjigu</span>
                                                         </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                     @endforeach
                                     @endforeach
                                     @endif

                                    </tbody>
                                </table>
    
                            </div>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
</div>
