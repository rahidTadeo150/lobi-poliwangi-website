<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <script src="https://kit.fontawesome.com/3197b77032.js" crossorigin="anonymous"></script>
    <title>{{ $titlePage }} | Lobi Poliwangi</title>
</head>
<body class="bg-blue-200">
    <div class="flex flex-row h-fit">
        @include('\admin\component\sidebar')
        <div class="pl-64 pr-6 w-full h-full font-poppins">
            @yield('requestBody')
        </div>
    </div>
</body>
</html>