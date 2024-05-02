<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <script src="https://kit.fontawesome.com/3197b77032.js" crossorigin="anonymous"></script>
    <title>Dashboard Admin | Lobi Poliwangi</title>
</head>
<body class="bg-blue-200">
    <div class="flex flex-row">
        <div>
            @include('\admin\component\sidebar')
            @include('\admin\component\navbarAdmin')
        </div>
        <div class="pl-64 pt-16 pr-6 w-full h-full font-poppins">
            <div class="w-full min-h-[593px] h-fit bg-white p-5 pt-6 mt-6 mb-6 rounded-md">
                <p class="text-2xl font-semibold tex-gray-800 mb-24">Dashboard Admin</p>
                <div class="flex flex-row justify-between w-full mb-14">
                    <div>
                        <div class="w-fit h-fit p-3 bg-slate-100 border-l-4 border-l-sky-400 shadow-md rounded-md">
                            {{ $chartData->container() }}
                        </div>
                    </div>
                    <div class="w-[33rem] mr-3">
                        <div class="w-full h-28 bg-slate-100 p-2 pl-14 pr-14 border-l-4 border-l-sky-400 rounded-md flex flex-row justify-between items-center mb-8">
                            <div>
                                <p class="text-base font-normal mb-2">Jumlah Mahasiswa</p>
                                <p class="text-sm font-semibold text-center">900 Mahasiswa</p>
                            </div>
                            <div class=" h-3/4 border-l border-black"></div>
                            <div>
                                <p class="text-base font-normal mb-2">Jumlah Prestasi</p>
                                <p class="text-sm font-semibold text-center">{{ $jumlahPrestasi }} Mahasiswa</p>
                            </div>
                        </div>
                        <div class="w-full h-36 bg-slate-100 p-2 pl-4 border-l-4 border-l-sky-400 rounded-md">
                            <p class="text-sm font-normal mb-4">Notifikasi Request</p>
                            <div class="flex flex-row items-center mb-4">
                                @if ($notifikasiTerbaru)
                                <div class="w-12 h-12 rounded-full bg-black"></div>
                                <div class="ml-3">
                                    <p class="text-xs font-semibold">{{ $notifikasiTerbaru[0]->nama_mahasiswa }}</p>
                                    <p class="text-xs font-normal">Ingin Mengajukan Prestasi</p>
                                </div>
                                @else
                                    <p class="text-base font-medium text-gray-500 mb-4 mt-2">Tidak ada notifikasi pengajuan</p>
                                @endif
                            </div>
                            <a href="/dashboard-admin/notifikasi/prestasi">
                                <p class="text-sm text-blue-500 float-right mr-4">Cek Notifikasi</p>
                            </a>
                        </div>
                    </div>
                </div>    
                <p class="text-lg font-semibold">Data Beasiswa Terbaru</p>
                <div class="flex flex-row justify-between">
                    <p class="text-sm font-normal mb-6">Index Data Beasiswa Terbaru Di Posting</p>
                    <a href="">
                        <p class="text-sm font-normal text-blue-600 hover:underline">Pergi Ke Index</p>
                    </a>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-900 uppercase bg-slate-300">
                            <tr>
                                <th scope="col" class="text-sm font-semibold px-6 py-3">
                                    Nama Beasiswa
                                </th>
                                <th scope="col" class="text-sm font-semibold px-6 py-3">
                                    Nama Instansi
                                </th>
                                <th scope="col" class="text-sm font-semibold px-6 py-3">
                                    Alamat Instansi
                                </th>
                                <th scope="col" class="text-sm font-semibold px-6 py-3">
                                    Tingkatan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($beasiswaTerbaru)
                                @foreach ($beasiswaTerbaru as $beasiswaTerbaru)
                                <tr class="bg-white border-b dark:bg-gray-800">
                                    <th scope="row" class="px-6 text-sm py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $beasiswaTerbaru->nama_beasiswa }}
                                    </th>
                                    <td class="px-6 py-4 text-sm">
                                        {{ $beasiswaTerbaru->instansiBeasiswa->nama_instansi_beasiswa }}   
                                    </td>
                                    <td class="text-sm px-6 py-4">
                                        {{ $beasiswaTerbaru->instansiBeasiswa->alamat }} 
                                    </td>
                                    <td class="text-sm px-6 py-4">
                                        {{ $beasiswaTerbaru->tingkatan->tingkatan }} 
                                    </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="6" rowspan="2" class="text-center py-4">
                                    <p class="text-md font-medium text-gray-600">[404] Data Kosong</p>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <p class="text-lg font-semibold mt-16">Data Lomba Terbaru</p>
                <div class="flex flex-row justify-between">
                    <p class="text-sm font-normal mb-6">Index Data Lomba Terbaru Di Posting</p>
                    <a href="">
                        <p class="text-sm font-normal text-blue-600 hover:underline">Pergi Ke Index</p>
                    </a>
                </div>
                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-900 uppercase bg-slate-300">
                            <tr>
                                <th scope="col" class="text-sm font-semibold px-6 py-3">
                                    Nama Beasiswa
                                </th>
                                <th scope="col" class="text-sm font-semibold px-6 py-3">
                                    Nama Instansi
                                </th>
                                <th scope="col" class="text-sm font-semibold px-6 py-3">
                                    Alamat Instansi
                                </th>
                                <th scope="col" class="text-sm font-semibold px-6 py-3">
                                    Tingkatan
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($lombaTerbaru)
                                @foreach ($lombaTerbaru as $lombaTerbaru)
                                <tr class="bg-white border-b dark:bg-gray-800">
                                    <th scope="row" class="px-6 text-sm py-4 font-medium text-gray-900 whitespace-nowrap">
                                        {{ $lombaTerbaru->nama_lomba }}
                                    </th>
                                    <td class="px-6 py-4 text-sm">
                                        {{ $lombaTerbaru->instansiLomba->nama_instansi_lomba }}   
                                    </td>
                                    <td class="text-sm px-6 py-4">
                                        {{ $lombaTerbaru->instansiLomba->alamat }} 
                                    </td>
                                    <td class="text-sm px-6 py-4">
                                        {{ $lombaTerbaru->tingkatan->tingkatan }} 
                                    </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td colspan="6" rowspan="2" class="text-center py-4">
                                    <p class="text-md font-medium text-gray-600">[404] Data Kosong</p>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ $chartData->cdn() }}"></script>
    {{ $chartData->script() }}
</body>
</html>