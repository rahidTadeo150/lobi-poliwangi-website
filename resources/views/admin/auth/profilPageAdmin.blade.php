<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <script src="https://kit.fontawesome.com/3197b77032.js" crossorigin="anonymous"></script>
    <title>My Profile | Lobi Poliwangi</title>
</head>
<body class="w-full h-screen">
    <!-- Flexing Sidebar dan Body -->
    <div class="flex flex-row h-fit">
    @include('\admin\component\sidebar')
    @include('\admin\component\navbarAdmin')
        <div class="pl-60 pt-16 w-full h-full">
            <div class="w-full h-56 bg-gradient-to-r from-sky-500 via-indigo-500 to-pink-500 pt-4">
                <a href="/dashboard-admin">
                    <p class="ml-6 text-sm font-medium text-gray-100 flex flex-row items-center cursor-pointer">
                        <span class="mr-2 text-xl"><i class="fa-solid fa-arrow-left"></i></span>Kembali
                    </p>
                </a>
            </div>
            <div class="w-full h-fit">
                <div class="w-full h-fit bg-slate-100 mt-2 rounded-md flex flex-col items-center">
                    <div class="w-5/6 h-40 relative px-10">
                        <div class="w-48 h-48 rounded-full bg-slate-200 border-4 border-gray-100 absolute -translate-y-16"></div>
                        <div class="ml-56 py-6 px-2">
                            <p class="text-2xl font-bold">{{ $account->username }}</p>
                            <p class="text-base font-medium">ID : {{ $account->id }}</p>
                        </div>
                    </div>
                </div>
                <div class="w-full h-fit py-10 px-14 bg-slate-100 mt-4">
                    <div class="mt-12">
                        <p class="text-sm font-medium mb-3">Anda Ingin Keluar Dari Account?</p>
                        <a href="/my-profile/logout-admin">
                            <button class="px-8 py-3 bg-red-600 rounded-md text-gray-100 text-sm font-semibold" onclick="return('Anda yakin ingin logout dari akun ini?')">Log Out Account</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>