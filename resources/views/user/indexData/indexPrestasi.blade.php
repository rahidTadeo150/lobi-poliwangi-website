<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <title>Daftar Prestasi | Lobi Poliwangi</title>
</head>
<body class="">
    @include('\user\component\navbarDefault')
    <div class="w-full h-[530px]">
        <div class="w-full h-full flex flex-row relative">
            <div class="absolute inset-x-0 inset-y-0 bg-gradient-to-r from-[rgba(0,0,0,0.55)] to-sky-600 pt-28 pb-10 px-20">
                <div class="h-full flex flex-col justify-center">
                    <p class="text-2xl font-medium text-gray-50">Yuk Telusuri!</p>
                    <p class="text-3xl font-semibold text-gray-50 mt-8">Daftar Prestasi Mahasiswa</p>
                    <p class="text-4xl font-bold text-gray-50 mt-2">Politeknik Negeri 1 Banyuwangi</p>
                    <p class="text-base font-normal text-gray-50 mt-6 w-3/6">"Lelah? menyerah?, lebih baik jangan. Semua akan baik baik saja, yang terpenting bukanlah awal atau prosesnya, melainkan hasil akhirnya"</p>
                </div>
            </div>
            <img src="img-web\prestasi.jpg" class="w-full h-full bg-cover">
        </div>
    </div>
    <div class="px-20 py-10">
        <p class="text-2xl font-bold">Prestasi Mahasiwa Poliwangi</p>
        <div class="w-3/5 mt-10">
            <form>
                <div class="flex">
                    <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100" type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg></button>
                    <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdown-button">
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Mockups</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Templates</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Design</button>
                        </li>
                        <li>
                            <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100">Logos</button>
                        </li>
                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Cari Tahu Disini Yuk..." required>
                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="overflow-hidden ml-4 mt-10">
            @foreach ($prestasiAll as $dataAll)
            <div class="w-[500px] h-64 bg-slate-200 float-left px-4 py-2 mr-20 relative flex flex-col justify-center rounded-md">
                <div class="flex flex-row">
                    <img src="{{ asset('img-web\w2.jpg') }}" class="w-40 h-56 bg-cover rounded-md">
                    <div class="ml-6 h-fit py-1">
                        <p class="text-base font-semibold">{{ $dataAll->nama_mahasiswa }}</p>
                        <p class="text-sm font-medium">({{ $dataAll->nim }})</p>
                        <p class="text-xs font-normal">{{ $dataAll->prodi->nama_prodi }}, {{ $dataAll->prodi->jurusan->nama_jurusan }}</p>
                        <p class="text-sm font-medium mt-8 mb-4">{{ $dataAll->prestasi->tingkatan->tingkatan }}</p>
                        <p class="text-base font-bold">{{ $dataAll->prestasi->nama_perlombaan_prestasi }},</p>
                        <p class="text-base font-semibold">- {{ $dataAll->prestasi->nama_prestasi }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>