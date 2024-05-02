<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <script src="https://kit.fontawesome.com/3197b77032.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    @include('\user\component\navbarDefault')
    <div class="w-full h-56 bg-gradient-to-r from-sky-500 via-indigo-500 to-pink-500 pt-16"></div>
    <div class="w-full h-fit px-5">
        <div class="w-full h-fit bg-slate-100 mt-2 rounded-md flex flex-col items-center">
            <div class="w-5/6 h-40 relative px-10">
                <div class="w-48 h-48 rounded-full bg-slate-200 border-4 border-gray-100 absolute -translate-y-16"></div>
                <div class="ml-56 py-6 px-2">
                    <p class="text-2xl font-bold">{{ $account->nama_mahasiswa }}</p>
                    <p class="text-base font-medium">{{ $account->nim }}</p>
                </div>
            </div>
        </div>
        <div class="w-full h-fit py-10 px-14 bg-slate-100 mt-4">
            <div class="flex flex-row justify-between">
                <a href="/my-profil/pengajuan-prestasi" class="w-80 h-fit bg-blue-600 hover:bg-blue-500 rounded-md px-8 py-4 shadow-md cursor-pointer border border-gray-300">
                    <div class="h-full flex flex-row justify-between items-center my-8">
                        <div class="text-5xl text-gray-100">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <p class="text-3xl font-bold text-gray-100 w-4/6 text-end">Pengajuaan Prestasi</p>
                    </div>
                    <p class="text-center text-sm font-medium text-gray-50 float-right">Ajukan Sekarang<span class="ml-2"><i class="fa-solid fa-arrow-right"></i></span></p>
                </a>
                <div class="w-80 h-fit bg-blue-600 hover:bg-blue-500 rounded-md px-8 py-4 shadow-md cursor-pointer border border-gray-300">
                    <div class="h-full flex flex-row justify-between items-center my-8">
                        <div class="text-5xl text-gray-100">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <p class="text-3xl font-bold text-gray-100 w-4/6 text-end">Pengajuaan Beasiswa</p>
                    </div>
                    <p class="text-center text-sm font-medium text-gray-50 float-right">Ajukan Sekarang<span class="ml-2"><i class="fa-solid fa-arrow-right"></i></span></p>
                </div>
                <div class="w-80 h-fit bg-blue-600 hover:bg-blue-500 rounded-md px-8 py-4 shadow-md cursor-pointer border border-gray-300">
                    <div class="h-full flex flex-row justify-between items-center my-8">
                        <div class="text-5xl text-gray-100">
                            <i class="fa-solid fa-medal"></i>
                        </div>
                        <p class="text-3xl font-bold text-gray-100 w-4/6 text-end">Pengajuaan Lomba</p>
                    </div>
                    <p class="text-center text-sm font-medium text-gray-50 float-right">Ajukan Sekarang<span class="ml-2"><i class="fa-solid fa-arrow-right"></i></span></p>
                </div>
            </div>
            <div class="mt-12">
                <p class="text-sm font-medium mb-3">Anda Ingin Keluar Dari Account?</p>
                <a href="/oauth/logout">
                    <button class="px-8 py-3 bg-red-600 rounded-md text-gray-100 text-sm font-semibold" onclick="return('Anda yakin ingin logout dari akun ini?')">Log Out Account</button>
                </a>
            </div>
        </div>
    </div>
    @if (session()->has('pengajuanSended'))
    <script>alert('{{ session("pengajuanSended") }}')</script>
    @endif
</body>
</html>