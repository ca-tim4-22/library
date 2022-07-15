<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="content-language" content="en" />
    <meta name="description" content="ICT Cortex Library - project for high school students..." />
    <meta name="keywords" content="ict cortex, cortex, bild, bildstudio, highschool, students, coding" />
    <meta name="author" content="bildstudio" />
    <!-- End Meta -->

    <!-- Title -->
    <title>Vrati knjigu | Library - ICT Cortex student project</title>
    <link rel="shortcut icon" href="img/library-favicon.ico" type="image/vnd.microsoft.icon" />
    <!-- End Title -->

    <!-- Styles -->
    <?php include('includes/layout/styles.php'); ?>
    <!-- End Styles -->
</head>

<body class="small:bg-gradient-to-r small:from-green-400 small:to-blue-500">
    <!-- Header -->
    <?php include('includes/layout/header.php'); ?>
    <!-- Header -->

    <!-- Main content -->
    <main class="flex flex-row small:hidden">
        <!-- Sidebar -->
        <?php include('includes/layout/sidebar.php'); ?>
        <!-- End Sidebar -->

        <!-- Content -->
        <section class="w-screen h-screen pl-[80px] pb-2 text-gray-700">
            <!-- Heading of content -->
            <div class="heading">
                <div class="flex flex-row justify-between border-b-[1px] border-[#e4dfdf]">
                    <div class="py-[10px] flex flex-row">
                        <div class="w-[77px] pl-[30px]">
                            <img src="img/tomsojer.jpg" alt="">
                        </div>
                        <div class="pl-[15px]  flex flex-col">
                            <div>
                                <h1>
                                    Tom Sojer
                                </h1>
                            </div>
                            <div>
                                <nav class="w-full rounded">
                                    <ol class="flex list-reset">
                                        <li>
                                            <a href="evidencijaKnjiga.php" class="text-[#2196f3] hover:text-blue-600">
                                                Evidencija knjiga
                                            </a>
                                        </li>
                                        <li>
                                            <span class="mx-2">/</span>
                                        </li>
                                        <li>
                                            <a href="knjigaOsnovniDetalji.php"
                                                class="text-[#2196f3] hover:text-blue-600">
                                                KNJIGA-467
                                            </a>
                                        </li>
                                        <li>
                                            <span class="mx-2">/</span>
                                        </li>
                                        <li>
                                            <a href="vratiKnjigu.php" class="text-[#2196f3] hover:text-blue-600">
                                                Vrati knjigu
                                            </a>
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="pt-[24px] mr-[30px]">
                        <a href="otpisiKnjigu.php" class="inline hover:text-blue-600">
                            <i class="fas fa-level-up-alt mr-[3px]"></i>
                            Otpisi knjigu
                        </a>
                        <a href="izdajKnjigu.php" class="inline hover:text-blue-600 ml-[20px] pr-[10px]">
                            <i class="far fa-hand-scissors mr-[3px]"></i>
                            Izdaj knjigu
                        </a>
                        <a href="vratiKnjigu.php" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                            <i class="fas fa-redo-alt mr-[3px] "></i>
                            Vrati knjigu
                        </a>
                        <a href="rezervisiKnjigu.php" class="hover:text-blue-600 inline ml-[20px] pr-[10px]">
                            <i class="far fa-calendar-check mr-[3px] "></i>
                            Rezervisi knjigu
                        </a>
                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsVratiKnjigu hover:text-[#606FC7]">
                            <i
                                class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-vrati-knjigu">
                            <div class="absolute right-0 w-56 mt-[7px] origin-top-right bg-white border border-gray-200 divide-y divide-gray-100 rounded-md shadow-lg outline-none"
                                aria-labelledby="headlessui-menu-button-1" id="headlessui-menu-items-117" role="menu">
                                <div class="py-1">
                                    <a href="editKnjiga.php" tabindex="0"
                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                        role="menuitem">
                                        <i class="fas fa-edit mr-[1px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Izmijeni knjigu</span>
                                    </a>
                                    <a href="#" tabindex="0"
                                        class="flex w-full px-4 py-2 text-sm leading-5 text-left text-gray-700 outline-none hover:text-blue-600"
                                        role="menuitem">
                                        <i class="fa fa-trash mr-[5px] ml-[5px] py-1"></i>
                                        <span class="px-4 py-0">Izbrisi knjigu</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="scroll height-dashboard px-[30px]">
                <div class="flex items-center justify-between py-4 pt-[20px] space-x-3 rounded-lg">
                    <h3>
                        Vrati knjigu
                    </h3>
                    <div class="relative text-gray-600 focus-within:text-gray-400">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                            <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" class="w-6 h-6">
                                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </button>
                        </span>
                        <input type="search" name="q"
                            class="py-2 pl-10 border-[#e4dfdf] text-sm text-white border-[1px] bg-white rounded-md focus:outline-none focus:bg-white focus:text-gray-900"
                            placeholder="Search..." autocomplete="off">
                    </div>
                </div>

                <div
                    class="inline-block min-w-full pt-3 align-middle bg-white rounded-bl-lg rounded-br-lg shadow-dashboard">
                    <table class="min-w-full border-[1px] border-[#e4dfdf]" id="vratiKnjiguTable">
                        <thead class="bg-[#EFF3F6]">
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <th class="px-4 py-3 leading-4 tracking-wider text-left text-blue-500">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="select-all form-checkbox">
                                    </label>
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Izdato uceniku
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Datum izdavanja
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Trenutno zadrzavanje knjige
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Prekoracenje u danima
                                </th>
                                <th class="px-4 py-4 leading-4 tracking-wider text-left">
                                    Knjigu izdao
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-4">
                                    <img class="object-cover w-8 h-8 mr-2 rounded-full" src="img/profileStudent.jpg"
                                        alt="" />
                                    <a href="ucenikProfile.php">
                                        <span class="font-medium text-center">Pero Perovic</span>
                                    </a>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">21.02.2021</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">2 nedelje i 3 dana</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">Nema prekoracenja</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            </tr>
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-4">
                                    <img class="object-cover w-8 h-8 mr-2 rounded-full" src="img/profileStudent.jpg"
                                        alt="" />
                                    <a href="ucenikProfile.php">
                                        <span class="font-medium text-center">Pero Perovic</span>
                                    </a>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">15.05.2020</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">5 dana</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">Nema prekoracenja</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            </tr>
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-4">
                                    <img class="object-cover w-8 h-8 mr-2 rounded-full" src="img/profileStudent.jpg"
                                        alt="" />
                                    <a href="ucenikProfile.php">
                                        <span class="font-medium text-center">Pero Perovic</span>
                                    </a>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">09.04.2020</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">3 mjeseca i 2 nedelje</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    <span class="px-[6px] py-[2px] bg-red-200 text-red-800 rounded-[10px]">
                                        75 dana
                                    </span>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            </tr>
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-4">
                                    <img class="object-cover w-8 h-8 mr-2 rounded-full" src="img/profileStudent.jpg"
                                        alt="" />
                                    <a href="ucenikProfile.php">
                                        <span class="font-medium text-center">Pero Perovic</span>
                                    </a>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">21.02.2021</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">1 mjesec i 3 dana</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">
                                    <span class="px-[6px] py-[2px] bg-red-200 text-red-800 rounded-[10px]">
                                        13 dana
                                    </span>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            </tr>
                            <tr class="border-b-[1px] border-[#e4dfdf]">
                                <td class="px-4 py-4 whitespace-no-wrap">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" class="form-checkbox">
                                    </label>
                                </td>
                                <td class="flex flex-row items-center px-4 py-4">
                                    <img class="object-cover w-8 h-8 mr-2 rounded-full" src="img/profileStudent.jpg"
                                        alt="" />
                                    <a href="ucenikProfile.php">
                                        <span class="font-medium text-center">Pero Perovic</span>
                                    </a>
                                </td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">12.05.2020</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">1 nedelje i 4 dana</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">Nema prekoracenja</td>
                                <td class="px-4 py-4 text-sm leading-5 whitespace-no-wrap">Valentina Kascelan</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="flex flex-row items-center justify-end my-2">
                        <div>
                            <p class="inline text-md">
                                Rows per page:
                            </p>
                            <select
                                class=" text-gray-700 bg-white rounded-md w-[46px] focus:outline-none focus:ring-primary-500 focus:border-primary-500 text-md"
                                name="ucenici">
                                <option value="">
                                    20
                                </option>
                                <option value="">
                                    Option1
                                </option>
                                <option value="">
                                    Option2
                                </option>
                                <option value="">
                                    Option3
                                </option>
                                <option value="">
                                    Option4
                                </option>
                            </select>
                        </div>

                        <div>
                            <nav class="relative z-0 inline-flex">
                                <div>
                                    <a href="#"
                                        class="relative inline-flex items-center px-4 py-2 -ml-px font-medium leading-5 transition duration-150 ease-in-out bg-white text-md focus:z-10 focus:outline-none">
                                        1 of 1
                                    </a>
                                </div>
                                <div>
                                    <a href="#"
                                        class="relative inline-flex items-center px-2 py-2 font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white text-md rounded-l-md hover:text-gray-400 focus:z-10 focus:outline-none"
                                        aria-label="Previous"
                                        v-on:click.prevent="changePage(pagination.current_page - 1)">
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                                <div v-if="pagination.current_page < pagination.last_page">
                                    <a href="#"
                                        class="relative inline-flex items-center px-2 py-2 -ml-px font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white text-md rounded-r-md hover:text-gray-400 focus:z-10 focus:outline-none"
                                        aria-label="Next">
                                        <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </a>
                                </div>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
            <div class="absolute bottom-0 w-full">
                <div class="flex flex-row">
                    <div class="inline-block w-full text-right py-[7px] mr-[100px] text-white">
                        <button type="button"
                            class="btn-animation shadow-lg mr-[15px] w-[150px] focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in bg-[#F44336] hover:bg-[#F55549] rounded-[5px]">
                            Ponisti <i class="fas fa-times ml-[4px]"></i>
                        </button>
                        <button type="submit"
                            class="btn-animation disabled-btn shadow-lg w-[150px] disabled:opacity-50 focus:outline-none text-sm py-2.5 px-5 transition duration-300 ease-in rounded-[5px] hover:bg-[#46A149] bg-[#4CAF50]"
                            disabled>
                            Vrati knjigu <i class="fas fa-check ml-[4px]"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Content -->
    </main>
    <!-- End Main content -->

    <!-- Notification for small devices -->
    <?php include('includes/layout/inProgress.php'); ?>


    <!-- Scripts -->
    <?php include('includes/layout/scripts.php'); ?>
    <!-- End Scripts -->

</body>

</html>