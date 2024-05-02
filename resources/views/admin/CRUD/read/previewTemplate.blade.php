<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <script src="https://kit.fontawesome.com/3197b77032.js" crossorigin="anonymous"></script>
    @yield('titlePage')
</head>
<body class="bg-blue-100">
    <!-- Flexing Sidebar dan Body -->
    <div class="flex flex-row h-fit">
    @include('\admin\component\sidebar')
    @include('\admin\component\navbarAdmin')
    <div class="pl-64 pr-4 pt-16 mb-6 mt-6 w-full h-full font-poppins">
        @yield('mainArea')
    </div>
</body>
</html>