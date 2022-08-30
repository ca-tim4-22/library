    @extends('layouts.dashboard')

    @section('title')

    <!-- Title -->
    <title>Dashboard | Online Biblioteka</title>
    
    @endsection

    @section('content')

    <!-- Content -->
    <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
        
        <!-- Heading of content -->
        <div class="heading mt-[7px]">
            <h1 class="pl-[30px] pb-[21px]  border-b-[1px] border-[#e4dfdf] ">
                Dashboard
            </h1>
        </div>
        <!-- Space for content -->
        <div class="pl-[30px] scroll height-dashboard overflow-auto mt-[20px] pb-[30px]">
            <div class="flex flex-row justify-between">
                <div class="mr-[30px]">
                    <h3 class="uppercase mb-[20px]">Aktivnosti</h3>
                    <!-- Activity Cards -->


                @if (!$data == [])
                 
                 @foreach ($data as $rent)
                   
                 <div class="activity-card flex flex-row mb-[30px]">
                  <div class="w-[60px] h-[60px]">
                      <img class="rounded-full" src="{{$rent->borrow->photo == 'placeholder' ? '/img/profileImg-default.jpg' : '/storage/students/' . $rent->borrow->photo}}"
                      alt="Profilna slika učenika: {{$rent->borrow->name}}"
                      title="Profilna slika učenika: {{$rent->borrow->name}}" />
                  </div>
                  <div class="ml-[15px] mt-[5px] flex flex-col">
                      <div class="text-gray-500 mb-[5px]">
                          <p class="uppercase">
                              Izdavanje knjige
                              <span class="inline lowercase">
                                  - {{$rent->issue_date}}
                              </span>
                          </p>
                      </div>
                      <div class="">
                          <p>
                              <a href="{{route('show-librarian', $rent->librarian->username)}}" class="text-[#2196f3] hover:text-blue-600">
                                  {{$rent->librarian->name}}
                              </a>
                              je izdao/la knjigu <span class="font-medium">{{$rent->book->title}} </span>
                              <a href="{{route('show-student', $rent->borrow->username)}}" class="text-[#2196f3] hover:text-blue-600">
                                  {{$rent->borrow->name}}
                              </a>
                              dana <span class="font-medium">{{$rent->issue_date}}</span>
                              <a href="{{route('rented-books')}}" class="text-[#2196f3] hover:text-blue-600">
                                  pogledaj detaljnije >>
                              </a>
                          </p>
                      </div>
                  </div>
                 </div>

                 @endforeach

                 @else 

                 <div class="mx-[50px]">
                    <div class="w-[400px] flex items-center px-6 py-4 my-4 text-lg bg-[#3f51b5] rounded-lg">                       
                        <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-white sm:w-5 sm:h-5">
                            <path fill="currentColor"
                                    d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                            </path>
                        </svg>
                        <p class="font-medium text-white">Trenutno nema aktivnosti za prikazivanje! </p>
                    </div>
                </div>

                @endif

                    <div class="inline-block w-full mt-4">
                        <a href="{{route('dashboard-activity')}}" 
                            class="btn-animation block text-center w-full px-4 py-2 text-sm tracking-wider text-gray-600 transition duration-300 ease-in border-[1px] border-gray-400 rounded hover:bg-gray-200 focus:outline-none focus:ring-[1px] focus:ring-gray-300">
                            Prikaži
                        </a>
                    </div>
                </div>
                <div class="mr-[50px] ">
                    <h3 class="uppercase mb-[20px] text-left">
                        Rezervacije knjiga
                    </h3>
                    <div>
                        <table class="w-[560px] table-auto">
                            <tbody class="bg-gray-200">
                                <tr class="bg-white border-b-[1px] border-[#e4dfdf]">
                                    <td class="flex flex-row items-center px-2 py-4">
                                        <img class="object-cover w-8 h-8 rounded-full "
                                            src="img/profileStudent.jpg" alt="" />
                                        <a href="ucenikProfile.php" class="ml-2 font-medium text-center">Pero Perovic</a>
                                    <td>
                                    </td>
                                    <td class="px-2 py-2">
                                        <a href="knjigaOsnovniDetalji.php">
                                        Ep o Gilgamesu
                                        </a>
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="px-[10px] py-[3px] bg-gray-200 text-gray-800 px-[6px] py-[2px] rounded-[10px]">05.11.2020</span>
                                    </td>
                                    <td class="px-2 py-2">
                                        <a href="#" class="hover:text-green-500 mr-[5px]">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <a href="#" class="hover:text-red-500 ">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b-[1px] border-[#e4dfdf]">
                                    <td class="flex flex-row items-center px-2 py-4">
                                        <img class="object-cover w-8 h-8 rounded-full "
                                        src="img/profileStudent.jpg" alt="" />
                                        <a href="ucenikProfile.php" class="ml-2 font-medium text-center">Pero Perovic</a>
                                    <td>
                                    </td>
                                    <td class="px-2 py-2">
                                        <a href="knjigaOsnovniDetalji.php">
                                            Tom Sojer
                                        </a>
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="px-[10px] py-[3px] bg-gray-200 text-gray-800 px-[6px] py-[2px] rounded-[10px]">31.04.2019</span>
                                    </td>
                                    <td class="px-2 py-2">
                                        <a href="#" class="hover:text-green-500 mr-[5px]">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <a href="#" class="hover:text-red-500 ">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b-[1px] border-[#e4dfdf]">
                                    <td class="flex flex-row items-center px-2 py-4">
                                        <img class="object-cover w-8 h-8 rounded-full "
                                        src="img/profileStudent.jpg" alt="" />
                                        <a href="ucenikProfile.php" class="ml-2 font-medium text-center">Pero Perovic</a>
                                    <td>
                                    </td>
                                    <td class="px-2 py-2">
                                        <a href="knjigaOsnovniDetalji.php">
                                            Ilijada
                                        </a>
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="px-[10px] py-[3px] bg-gray-200 text-gray-800 px-[6px] py-[2px] rounded-[10px]">05.11.2020</span>
                                    </td>
                                    <td class="px-2 py-2">
                                        <a href="#" class="hover:text-green-500 mr-[5px]">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <a href="#" class="hover:text-red-500 ">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr class="bg-white border-b-[1px] border-[#e4dfdf]">
                                    <td class="flex flex-row items-center px-2 py-4">
                                        <img class="object-cover w-8 h-8 rounded-full "
                                        src="img/profileStudent.jpg" alt="" />
                                        <a href="ucenikProfile.php" class="ml-2 font-medium text-center">Pero Perovic</a>
                                    <td>
                                    </td>
                                    <td class="px-2 py-2">
                                        <a href="knjigaOsnovniDetalji.php">
                                            Tom Sojer
                                        </a>          
                                    </td>
                                    <td class="px-2 py-2">
                                        <span class="px-[10px] py-[3px] bg-gray-200 text-gray-800 px-[6px] py-[2px] rounded-[10px]">31.02.2021</span>
                                    </td>
                                    <td class="px-2 py-2">
                                        <a href="#" class="hover:text-green-500 mr-[5px]">
                                            <i class="fas fa-check"></i>
                                        </a>
                                        <a href="#" class="hover:text-red-500 ">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="text-right mt-[5px]">
                            <a href="{{route('active-reservations')}}" class="text-[#2196f3] hover:text-blue-600">
                                <i class="fas fa-calendar-alt mr-[4px]" aria-hidden="true"></i>
                                Prikaži sve
                            </a>
                        </div>
                    </div>
                    <div class="relative">
                        <h3 class="uppercase mb-[20px] text-left py-[30px]">
                            Statistika
                        </h3>
                        <div class="text-right">
                            <div class="flex pb-[30px]">
                                <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="{{route('rented-books')}}">
                                    Izdate knjige
                                </a>
                                <div class="ml-[30px] bg-green-600 transition duration-200 ease-in  hover:bg-green-900 stats-bar-green h-[26px]">
                                
                                </div>
                                <p class="ml-[10px] number-green text-[#2196f3] hover:text-blue-600">
                                    {{$rented_books}}
                                </p>
                            </div>
                            <div class="flex pb-[30px]">
                                <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="{{route('active-reservations')}}">
                                    Rezervisane knjige
                                </a>
                                <div class="ml-[30px] bg-yellow-600 transition duration-200 ease-in  hover:bg-yellow-900 stats-bar-yellow  h-[26px]">
                                
                                </div>
                                <p class="ml-[10px] text-[#2196f3] hover:text-blue-600 number-yellow">
                                    {{$reserved_books}}
                                </p>
                            </div>
                            <div class="flex pb-[30px]">
                                <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="{{route('overdue-books')}}">
                                    Knjige u prekoračenju
                                </a>

                    <div class="ml-[30px] bg-red-600 transition duration-200 ease-in hover:bg-red-900 stats-bar-red h-[26px]">
                    </div>

<style>
@keyframes red-bar {
from {
  width: 0%;
}
to {
  width: {{$overdue_books}}px;
}
}

@keyframes green-bar { 
from {
  width: 0%;
}
to {
  width: {{$rented_books}}px;
}
}

@keyframes yellow-bar {
from {
    width: 0%;
}
    to {
      width: {{$reserved_books}}px;
}
}
</style>

                                <p class="ml-[10px] text-[#2196f3] hover:text-blue-600 number-red">
                               {{$overdue_books}}
                                </p>
                            </div>
                        </div>
                        <div class="absolute h-[220px] w-[1px] bg-black top-[78px] left-[174px]">
                        </div>
                        <div class="absolute flex conte left-[175px] border-t-[1px] border-[#e4dfdf] top-[248px] pr-[87px]">
                            <p class="">
                            0
                            </p>
                            <p class="ml-[30px]">
                            50
                            </p>
                            <p class="ml-[30px]">
                            100
                            </p>
                            <p class="ml-[30px]">
                            150
                            </p>
                            <p class="ml-[30px]">
                            200
                            </p>
                            <p class="ml-[30px]">
                            250
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Content -->
        
    @endsection



