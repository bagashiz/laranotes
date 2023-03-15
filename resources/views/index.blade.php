<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href=" {{ asset('images/favicon/apple-touch-icon.png') }} ">
    <link rel="icon" type="image/png" sizes="32x32" href=" {{ asset('images/favicon/favicon-32x32.png') }} ">
    <link rel="icon" type="image/png" sizes="16x16" href=" {{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href=" {{ asset('images/favicon/site.webmanifest') }} ">
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/da28ab5279.js" crossorigin="anonymous"></script>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com/?plugins=forms"></script>
    <title>LaraNotes | Simple Notes Web App</title>
</head>

<body class="mb-48">
    <nav class="flex justify-between items-center mb-4">
        <a href="index.html"><img class="w-24" src="images/logo.png" alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <a href="register.html" class="hover:text-blue-500"><i class="fa-solid fa-user-plus"></i> Register</a>
            </li>
            <li>
                <a href="login.html" class="hover:text-blue-500"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a>
            </li>
        </ul>
    </nav>

    <!-- Hero -->
    <section class="relative h-72 bg-blue-500 flex flex-col justify-center align-center text-center space-y-4 mb-4">
        <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"
            style="background-image: url('images/laravel-logo.png')"></div>

        <div class="z-10">
            <h1 class="text-6xl font-bold uppercase text-white">
                Lara<span class="text-black">Notes</span>
            </h1>
            <p class="text-2xl text-white font-bold my-4">
                Your Personal Notes
            </p>
            <div>
                <a href="register.html"
                    class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">Sign
                    Up to Create a Note</a>
            </div>
        </div>
    </section>

    <main>
        <!-- Search -->
        <form action="">
            <div class="relative border-2 border-gray-100 m-4 rounded-lg">
                <div class="absolute top-4 left-3">
                    <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i>
                </div>
                <input type="text" name="search"
                    class="h-14 w-full pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none"
                    placeholder="Search Notes..." />
                <div class="absolute top-2 right-2">
                    <button type="submit" class="h-10 w-20 text-white rounded-lg bg-blue-500 hover:bg-blue-600">
                        Search
                    </button>
                </div>
            </div>
        </form>

        <div class="lg:grid lg:grid-cols-3 gap-4 space-y-4 md:space-y-0 mx-4">
            <!-- Item 1 -->
            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                <div class="flex">
                    <div>
                        <h3 class="text-2xl font-bold">
                            <a href="show.html">Title</a>
                        </h3>
                        <div class="text-xl mb-4">Subtitle</div>
                        <ul class="flex">
                            <li
                                class="flex items-center justify-center bg-blue-500 text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                <a href="#">Important</a>
                            </li>
                            <li
                                class="flex items-center justify-center bg-blue-500 text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                <a href="#">School</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-blue-500 text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Made with &hearts; by <a class="hover:underline" href="https://github.com/bagashiz"
                target="_blank" rel="noopener noreferrer">Bagas Hizbullah</a>

            <a href="create.html" class="absolute top-1/3 right-10 bg-white text-black py-2 px-5 hover:bg-black hover:text-white">Post Notes</a>
    </footer>
</body>

</html>
