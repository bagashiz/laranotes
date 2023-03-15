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
        <a href="/"><img class="w-24" src="images/logo.png" alt="" class="logo" /></a>
        <ul class="flex space-x-6 mr-6 text-lg">
            <li>
                <a href="/register" class="hover:text-blue-500"><i class="fa-solid fa-user-plus"></i> Register</a>
            </li>
            <li>
                <a href="/login" class="hover:text-blue-500"><i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Login</a>
            </li>
        </ul>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer
        class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-blue-500 text-white h-24 mt-24 opacity-90 md:justify-center">
        <p class="ml-2">Made with &hearts; by <a class="hover:underline" href="https://github.com/bagashiz"
                target="_blank" rel="noopener noreferrer">Bagas Hizbullah</a>

            <a href="/create"
                class="absolute top-1/3 right-10 bg-white text-black py-2 px-5 hover:bg-black hover:text-white">Post
                Notes</a>
    </footer>
</body>

</html>
