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
    <title>Izdaj knjigu | Library - ICT Cortex student project</title>
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
                                            <a href="izdajKnjigu.php" class="text-[#2196f3] hover:text-blue-600">
                                                Izdaj knjigu
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
                        <p class="inline cursor-pointer text-[25px] py-[10px] pl-[30px] border-l-[1px] border-[#e4dfdf] dotsIzdajKnjiguError hover:text-[#606FC7]">
                            <i
                                class="fas fa-ellipsis-v"></i>
                        </p>
                        <div
                            class="relative z-10 hidden transition-all duration-300 origin-top-right transform scale-95 -translate-y-2 dropdown-izdaj-knjigu-error">
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

            <div class="flex flex-row overflow-auto height-izdajKnjigu">
                <div class="">
                    <!-- Space for content -->
                    <div class="pl-[30px] section- mt-[20px]">
                        <div class="flex flex-row justify-between">
                            <div class="mr-[30px]">
                                <!-- Alert Error -->
                                <div class="flex items-center px-6 py-4 my-4 text-lg bg-red-200 rounded-lg">
                                    <svg viewBox="0 0 24 24" class="w-5 h-5 mr-3 text-red-600 sm:w-5 sm:h-5">
                                        <path fill="currentColor"
                                            d="M11.983,0a12.206,12.206,0,0,0-8.51,3.653A11.8,11.8,0,0,0,0,12.207,11.779,11.779,0,0,0,11.8,24h.214A12.111,12.111,0,0,0,24,11.791h0A11.766,11.766,0,0,0,11.983,0ZM10.5,16.542a1.476,1.476,0,0,1,1.449-1.53h.027a1.527,1.527,0,0,1,1.523,1.47,1.475,1.475,0,0,1-1.449,1.53h-.027A1.529,1.529,0,0,1,10.5,16.542ZM11,12.5v-6a1,1,0,0,1,2,0v6a1,1,0,1,1-2,0Z">
                                        </path>
                                    </svg>
                                    <p class="font-medium text-red-600"> Sve knjige su izdate ili rezervisane </p>
                                </div>
                                <!-- End Alert Error -->
                                <div class="px-6 py-4 bg-gray-200 rounded-lg">
                                    <p class="font-medium">
                                        Da bi izdali knjigu korisnik koji ju je zaduzio prvo mora vratiti. U nastavku su
                                        detalji o poslednjem izdavanju.
                                    </p>
                                    <div class="mt-[20px] flex-row flex">
                                        <div class="flex flex-col text-gray-500">
                                            <span class="mt-[20px]">Na raspolaganju:</span>
                                            <span class="mt-[20px]">Rezervisano:</span>
                                            <span class="mt-[20px]">Izdato:</span>
                                            <span class="mt-[20px]">U prekoracenju:</span>
                                            <span class="mt-[20px]">Ukupna kolicina:</span>
                                        </div>
                                        <div class="flex flex-col text-center ml-[30px]">
                                            <a href="#"
                                                class="mt-[20px] block ml-[30px] bg-green-200 text-green-800 rounded-[10px] px-[6px] py-[2px]">
                                                0 primjeraka
                                            </a>
                                            <a href="iznajmljivanjeAktivne.php"
                                                class="mt-[19px] block ml-[30px] bg-yellow-200 text-yellow-700 rounded-[10px] px-[6px] py-[2px]">
                                                4 primjerka
                                            </a>
                                            <a href="iznajmljivanjeIzdate.php"
                                                class="mt-[19px] block ml-[30px] bg-blue-200 text-blue-800 rounded-[10px] px-[6px] py-[2px]">
                                                10 primjeraka
                                            </a>
                                            <a href="iznajmljivanjePrekoracenje.php"
                                                class="mt-[19px] block ml-[30px] bg-red-200 text-red-800 rounded-[10px] px-[6px] py-[2px]">
                                                2 primjerka
                                            </a>
                                            <a href="#"
                                                class="mt-[19px] block ml-[30px] border-[1px] border-green-700 text-green-700 rounded-[10px] px-[6px] py-[2px]">
                                                14 primjeraka
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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