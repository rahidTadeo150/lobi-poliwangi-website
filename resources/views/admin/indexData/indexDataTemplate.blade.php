<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <script src="https://kit.fontawesome.com/3197b77032.js" crossorigin="anonymous"></script>
    <title>{{ $titlePage }} | Lobi Poliwangi</title>
</head>
<body class="bg-slate-100">
    <div class="flex flex-row h-fit">
        @include('\admin\component\sidebar')
        @include('\admin\component\navbarAdmin')
        <div class="pl-64 pt-20 pr-6 w-full h-full font-poppins">
            @yield('tableData')
        </div>
    </div>
    @if (session()->has('successAddedData'))
    <script>alert('{{ session("successAddedData") }}')</script>
    @endif
    @if (session()->has('dataSuccessDeleted'))
    <script>alert('{{ session("dataSuropccessDeleted") }}')</script>
    @endif
<script src="\js\admin\dropdownSearch.js"></script>
</body>
</html>