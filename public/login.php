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
    <title>Login | Library - ICT Cortex student project</title>
    <link rel="shortcut icon" href="img/library-favicon.ico" type="image/vnd.microsoft.icon" />
    <!-- End Title -->

    <!-- Styles -->
    <?php include('includes/layout/styles.php'); ?>
    <!-- End Styles -->
</head>

<body>
    <!-- Main content -->
    <main class="h-screen small:hidden bg-login">
        <div class="flex items-center justify-center pt-[13%]">
            <div class="w-full max-w-md">
                <form class="px-12 pt-6 pb-4 mb-4 bg-white rounded shadow-lg">
                    <!-- @csrf -->
                    <div class="flex justify-center py-2 mb-4 text-2xl text-gray-800 border-b-2">
                        Online Biblioteka
                    </div>
                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-normal text-gray-700" for="username">
                            Email
                        </label>
                        <input
                            class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            name="email" v-model="form.email" type="email" required autofocus placeholder="Email" />
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-normal text-gray-700" for="password">
                            Password
                        </label>
                        <input
                            class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                            v-model="form.password" type="password" placeholder="Password" name="password" required
                            autocomplete="current-password" />
                    </div>
                    <div class="flex items-center justify-between">
                        <a href="dashboard.php"
                            class="inline-block px-4 py-2 text-white bg-blue-500 rounded shadow-lg btn-animation hover:bg-blue-600 focus:bg-blue-700"
                            type="submit">Sign In</a>
                        <a class="inline-block text-sm font-normal text-blue-500 align-baseline hover:text-blue-800"
                            href="#">
                            Forgot Password?
                        </a>
                    </div>
                    <p class="text-xs text-center mt-[30px] text-gray-500">
                        &copy;2021 ICT Cortex. All rights reserved.
                    </p>
                </form>

            </div>
        </div>
    </main>
    <!-- End Main content -->

    <!-- Notification for small devices -->
    <?php include('includes/layout/inProgress.php'); ?>

    <!-- Scripts -->
    <?php include('includes/layout/scripts.php'); ?>
    <!-- End Scripts -->

</body>

</html>