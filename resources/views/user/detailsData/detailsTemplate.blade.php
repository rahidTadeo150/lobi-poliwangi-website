<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <script src="https://kit.fontawesome.com/3197b77032.js" crossorigin="anonymous"></script>
    @yield('titlePage')
</head>
<body>
    @include('\user\component\navbarDefault')
    @yield('bodyDetail')
</body>
</html>