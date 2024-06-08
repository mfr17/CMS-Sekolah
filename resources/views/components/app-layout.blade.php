<!DOCTYPE html>
<html class="h-full bg-gray-100" lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @isset($tittle)
            {{ $tittle }}
        @else
            Landing Page
        @endisset
    </title>
    <style>
        figcaption {
            display: none;
        }
    </style>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    @vite('resources/js/app.js')
    @vite('resources/css/app.css')
</head>

<body class="flex flex-col h-screen">

    <x-navbar />

    <div class="container mx-auto flex-grow">
        {{ $slot }}
    </div>

    <x-footer />
    <script src="https://unpkg.com/@material-tailwind/html@latest/scripts/collapse.js"></script>
</body>

</html>
