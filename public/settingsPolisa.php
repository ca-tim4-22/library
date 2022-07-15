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
    <title>Polisa | Library - ICT Cortex student project</title>
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
        <section class="w-screen h-screen pl-[80px] py-4 text-gray-700">
            <!-- Heading of content -->
            <div class="heading mt-[7px]">
                <div class="border-b-[1px] border-[#e4dfdf]">
                    <div class="pl-[30px] pb-[21px]">
                        <h1>
                            Settings
                        </h1>
                    </div>
                </div>
            </div>
            <div class="py-4 text-gray-500 border-b-[1px] border-[#e4dfdf] pl-[30px]">
                <a href="settingsPolisa.php" class="inline hover:text-blue-800 active-book-nav">
                    Polisa
                </a>
                <a href="settingsKategorije.php" class="inline ml-[70px] hover:text-blue-800">
                    Kategorije
                </a>
                <a href="settingsZanrovi.php" class="inline ml-[70px] hover:text-blue-800">
                    Zanrovi
                </a>
                <a href="settingsIzdavac.php" class="inline ml-[70px] hover:text-blue-800">
                    Izdavac
                </a>
                <a href="settingsPovez.php" class="inline ml-[70px] hover:text-blue-800">
                    Povez
                </a>
                <a href="settingsFormat.php" class="inline ml-[70px] hover:text-blue-800">
                    Format
                </a>
                <a href="settingsPismo.php" class="inline ml-[70px] hover:text-blue-800">
                    Pismo
                </a>
            </div>
            <div class="height-ucenikProfile pb-[30px] scroll">
                <!-- Space for content -->
                <div class="section- mt-[20px]">
                    <div class="flex flex-col">
                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  pb-[20px]">
                            <div>
                                <h3>
                                    Rok za rezervaciju
                                </h3>
                                <p class="pt-[15px] max-w-[400px]">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eligendi nihil, vel
                                    necessitatibus saepe laboriosam! Perspiciatis laboriosam culpa veritatis ea
                                    voluptatum commodi tempora unde, dolorum debitis quia id dicta vitae.
                                </p>
                            </div>
                            <div class="relative flex ml-[60px] mt-[20px]">
                                <input type="text"
                                    class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                    placeholder="..." />
                                <p class="ml-[10px] mt-[10px]">dana</p>
                            </div>
                        </div>
                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                            <div>
                                <h3>
                                    Rok vracanja
                                </h3>
                                <p class="pt-[15px] max-w-[400px]">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eligendi nihil, vel
                                    necessitatibus saepe laboriosam! Perspiciatis laboriosam culpa veritatis ea
                                    voluptatum commodi tempora unde, dolorum debitis quia id dicta vitae.
                                </p>
                            </div>
                            <div class="relative flex ml-[60px] mt-[20px]">
                                <input type="text"
                                    class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                    placeholder="..." />
                                <p class="ml-[10px] mt-[10px]">dana</p>
                            </div>
                        </div>
                        <div class="pl-[30px] flex border-b-[1px] border-[#e4dfdf]  py-[20px]">
                            <div>
                                <h3>
                                    Rok konflikta
                                </h3>
                                <p class="pt-[15px] max-w-[400px]">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum eligendi nihil, vel
                                    necessitatibus saepe laboriosam! Perspiciatis laboriosam culpa veritatis ea
                                    voluptatum commodi tempora unde, dolorum debitis quia id dicta vitae.
                                </p>
                            </div>
                            <div class="relative flex ml-[60px] mt-[20px]">
                                <input type="text"
                                    class="h-[50px] flex-1 w-full px-4 py-2 text-sm text-gray-700 placeholder-gray-400 bg-white border-[1px]  border-[#e4dfdf]  rounded-lg shadow-sm appearance-none focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent"
                                    placeholder="..." />
                                <p class="ml-[10px] mt-[10px]">dana</p>
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