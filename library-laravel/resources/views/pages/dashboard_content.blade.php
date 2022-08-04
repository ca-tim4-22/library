@extends('layouts.dashboard')

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
                <div class="activity-card flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="/img/profileStudent.jpg" alt="">
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Izdavanje knjige
                                <span class="inline lowercase">
                                    - 4 days ago
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu <span class="font-medium">Tom Sojer </span>
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Peru Perovicu
                                </a>
                                dana <span class="font-medium">21.02.2021.</span>
                                <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="activity-card flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="img/profileExample.jpg" alt="">
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Izdavanje knjige
                                <span class="inline lowercase">
                                    - 4 mounths ago
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu <span class="font-medium">Robinson Kruso</span>
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Petru Njegosu
                                </a>
                                dana <span class="font-medium">12.03.2020.</span>
                                <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="activity-card flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="img/profileStudent.jpg" alt="">
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Izdavanje knjige
                                <span class="inline lowercase">
                                    - 4 days ago
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu <span class="font-medium">Tom Sojer </span>
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Peru Perovicu
                                </a>
                                dana <span class="font-medium">21.02.2021.</span>
                                <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="activity-card flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="img/profileExample.jpg" alt="">
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Izdavanje knjige
                                <span class="inline lowercase">
                                    - 4 mounths ago
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu <span class="font-medium">Robinson Kruso</span>
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Petru Njegosu
                                </a>
                                dana <span class="font-medium">12.03.2020.</span>
                                <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="activity-card flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="img/profileStudent.jpg" alt="">
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Izdavanje knjige
                                <span class="inline lowercase">
                                    - 4 days ago
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu <span class="font-medium">Tom Sojer </span>
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Peru Perovicu
                                </a>
                                dana <span class="font-medium">21.02.2021.</span>
                                <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="activity-card flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="img/profileExample.jpg" alt="">
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Izdavanje knjige
                                <span class="inline lowercase">
                                    - 4 mounths ago
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu <span class="font-medium">Robinson Kruso</span>
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Petru Njegosu
                                </a>
                                dana <span class="font-medium">12.03.2020.</span>
                                <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="activity-card flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="img/profileStudent.jpg" alt="">
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Izdavanje knjige
                                <span class="inline lowercase">
                                    - 4 days ago
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu <span class="font-medium">Tom Sojer </span>
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Peru Perovicu
                                </a>
                                dana <span class="font-medium">21.02.2021.</span>
                                <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="activity-card flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="img/profileExample.jpg" alt="">
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Izdavanje knjige
                                <span class="inline lowercase">
                                    - 4 mounths ago
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu <span class="font-medium">Robinson Kruso</span>
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Petru Njegosu
                                </a>
                                dana <span class="font-medium">12.03.2020.</span>
                                <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="activity-card flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="img/profileStudent.jpg" alt="">
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Izdavanje knjige
                                <span class="inline lowercase">
                                    - 4 days ago
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu <span class="font-medium">Tom Sojer </span>
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Peru Perovicu
                                </a>
                                dana <span class="font-medium">21.02.2021.</span>
                                <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="activity-card flex flex-row mb-[30px]">
                    <div class="w-[60px] h-[60px]">
                        <img class="rounded-full" src="img/profileExample.jpg" alt="">
                    </div>
                    <div class="ml-[15px] mt-[5px] flex flex-col">
                        <div class="text-gray-500 mb-[5px]">
                            <p class="uppercase">
                                Izdavanje knjige
                                <span class="inline lowercase">
                                    - 4 mounths ago
                                </span>
                            </p>
                        </div>
                        <div class="">
                            <p>
                                <a href="bibliotekarProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Valentina K.
                                </a>
                                je izdala knjigu <span class="font-medium">Robinson Kruso</span>
                                <a href="ucenikProfile.php" class="text-[#2196f3] hover:text-blue-600">
                                    Petru Njegosu
                                </a>
                                dana <span class="font-medium">12.03.2020.</span>
                                <a href="izdavanjeDetalji.php" class="text-[#2196f3] hover:text-blue-600">
                                    pogledaj detaljnije >>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
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
                        <a href="aktivneRezervacije.php" class="text-[#2196f3] hover:text-blue-600">
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
                            <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="izdateKnjige.php">
                                Izdate knjige
                            </a>
                            <div class="ml-[30px] bg-green-600 transition duration-200 ease-in  hover:bg-green-900 stats-bar-green h-[26px]">
                            
                            </div>
                            <p class="ml-[10px] number-green text-[#2196f3] hover:text-blue-600">
                                73
                            </p>
                        </div>
                        <div class="flex pb-[30px]">
                            <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="aktivneRezervacije.php">
                                Rezervisane knjige
                            </a>
                            <div class="ml-[30px] bg-yellow-600 transition duration-200 ease-in  hover:bg-yellow-900 stats-bar-yellow  h-[26px]">
                            
                            </div>
                            <p class="ml-[10px] text-[#2196f3] hover:text-blue-600 number-yellow">
                                44
                            </p>
                        </div>
                        <div class="flex pb-[30px]">
                            <a class="w-[145px] text-[#2196f3] hover:text-blue-600" href="knjigePrekoracenje.php">
                                Knjige u prekoračenju
                            </a>
                            <div class="ml-[30px] bg-red-600 transition duration-200 ease-in hover:bg-red-900 stats-bar-red h-[26px]">
                            
                            </div>
                            <p class="ml-[10px] text-[#2196f3] hover:text-blue-600 number-red">
                                25
                            </p>
                        </div>
                    </div>
                    <div class="absolute h-[220px] w-[1px] bg-black top-[78px] left-[174px]">
                    </div>
                    <div class="absolute flex conte left-[175px] border-t-[1px] border-[#e4dfdf] top-[248px] pr-[87px]">
                        <p class="ml-[-13px]">
                            0
                        </p>
                        <p class="ml-[57px]">
                            20
                        </p>
                        <p class="ml-[57px]">
                            40
                        </p>
                        <p class="ml-[57px]">
                            60
                        </p>
                        <p class="ml-[57px]">
                            80
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content -->
    
@endsection