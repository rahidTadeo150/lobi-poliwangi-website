<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <title>Lomba Index | Lobi Poliwangi</title>
</head>
<body class="">
    @include('\user\component\navbarDefault')
    <div class="pt-14">
        <div class="w-full h-[450px] relative">
            <img src="{{ asset('img-web\beasiswa.jpg') }}" class="w-full h-full bg-cover">
            <div class="bg-gradient-to-l from-[rgba(0,0,0,0.55)] to-sky-600 absolute w-full h-full -translate-y-full flex flex-col justify-center items-center">
                <p class="text-3xl font-bold text-white -mt-6">Cari Lomba Yang Cocok Untukmu Disini.</p>
            </div>
            <div class="bg-slate-100 border border-slate-300 h-44 rounded-md shadow-md inset-x-32 -translate-y-1/2 absolute flex flex-row justify-between px-20 py-2 items-center">
                <div class="text-center">
                    <p class="text-xl font-semibold">lomba Tersedia</p>
                    <p class="text-2xl font-semibold">{{ $jumlahLomba }}</p>
                </div>
                <div class="text-center">
                    <p class="text-xl font-semibold">lomba lokal</p>
                    <p class="text-2xl font-semibold">{{ $jumlahLokal }}</p>
                </div>
                <div class="text-center">
                    <p class="text-xl font-semibold">lomba internasional</p>
                    <p class="text-2xl font-semibold">{{ $jumlahInternasional }}</p>
                </div>
            </div>
        </div>
        <div class="mt-32 px-16 pb-14">
            <p class="text-2xl font-bold mb-4">Informasi terbaru minggu ini</p>
            <div class="overflow-hidden ml-4">
                @if($lombaAll->isNotEmpty())
                @foreach ($lombaTerbaru as $dataTerbaru)
                <div class="w-80 h-80 bg-slate-200 float-left mr-20 relative rounded-md">
                    <div class="rounded-md opacity-0 hover:opacity-100 w-full h-full bg-[rgba(0,0,0,0.5)] absolute py-2 px-4 flex flex-col justify-center">
                        <p class="text-2xl font-semibold text-gray-100">{{ $dataTerbaru->nama_lomba }}</p>
                        <p class="text-lg font-semibold text-gray-100">{{ $dataTerbaru->instansiLomba->nama_instansi_lomba }}</p>
                        <p class="text-sm font-medium text-gray-100 mt-6">Tingkatan : {{ $dataTerbaru->tingkatan->tingkatan }}</p>
                        <p class="text-sm font-medium text-gray-100">Registrasi terakhir : {{ $dataTerbaru->tanggal_penutupan }}</p>
                        <a href="/detail-beasiswa/{{ $dataTerbaru->id }}">
                            <button class="text-sm font-medium text-white w-fit-h-fit py-1 px-4 bg-blue-600 mt-12 rounded hover:bg-blue-500">Lihat Postingan</button>
                        </a>
                    </div>
                    <img src="{{ asset('storage/' . $dataTerbaru->data_foto) }}" class="w-full h-full bg-cover rounded-md">
                </div>
                @endforeach
                @else
                <div class="w-full h-80 flex flex-col justify-center items-center">
                    <p class="text-xl font-medium text-gray-500">[404] Data Tidak Tersedia</p>
                </div>
                @endif
            </div>
            <p class="mt-10 text-xl font-bold">Daftar informasi Lomba</p>
            <div class="mt-3 flex items-center">
                <div class="w-3/6 mr-3 h-fit">
                    <form class="mb-0">
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <svg class="w-3 h-3 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" class="block w-full px-4 py-3 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari informasi lomba disini..." required>
                            <button type="submit" class="text-white absolute end-2.5 bottom-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2">Search</button>
                        </div>
                    </form>
                </div>
                <div>
                    <button class="w-fit h-fit px-3 py-2 bg-blue-500 rounded-md text-sm">Filter Searching</button>
                </div>
            </div>
            <p class="text-sm font-medium mt-4">Tag informasi</p>
            <div class="w-full h-fit py-2 flex flex-row">
                <form action="" method="get">
                    <input type="hidden" name="tags" value="">
                    <button class="w-fit h-fit px-5 py-1.5 rounded-lg border-2 border-blue-500 text-blue-700 mr-4 hover:bg-blue-500 hover:text-white">
                        <p class="text-sm font-medium">Terbaru</p>
                    </button>
                </form>
                <form action="" method="get">
                    <button class="w-fit h-fit px-5 py-1.5 rounded-lg border-2 border-blue-500 text-blue-700 mr-4 hover:bg-blue-500 hover:text-white">
                        <p class="text-sm font-medium">Terlama</p>
                    </button>
                </form>
                <form action="" method="get">
                    <button class="w-fit h-fit px-5 py-1.5 rounded-lg border-2 border-blue-500 text-blue-700 mr-4 hover:bg-blue-500 hover:text-white">
                        <p class="text-sm font-medium">Internasional</p>
                    </button>
                </form>
                <form action="" method="get">
                    <button class="w-fit h-fit px-5 py-1.5 rounded-lg border-2 border-blue-500 text-blue-700 mr-4 hover:bg-blue-500 hover:text-white">
                        <p class="text-sm font-medium">Lokal</p>
                    </button>
                </form>
            </div>
            <div class="overflow-hidden ml-4 mt-4">
                @foreach ($lombaAll as $data)
                <div class="w-80 h-80 bg-slate-200 float-left mr-20 relative flex flex-col justify-end rounded-md">
                    <div class="bg-slate-100 w-full h-20 absolute py-1 px-2">
                        <p class="text-base font-semibold">{{ $data->nama_lomba }}</p>
                        <p class="text-sm font-semibold">{{ $data->instansiLomba->nama_instansi_lomba }}</p>
                        <div class="flex flex-row justify-between">
                            <div></div>
                            <a href="/detail-lomba/{{ $data->id }}">
                                <button class="py-1 text-sm px-2 bg-blue-500 text-gray-100 rounded-md">
                                    Lihat
                                </button>
                            </a>
                        </div>
                    </div>
                    <img src="{{ asset('storage/' . $data->data_foto ) }}" class="w-80 h-80 bg-cover rounded-md">
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>