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

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">
                               
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
                                     
                                     </tr>
                                     @endforeach
                                     @endforeach

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
