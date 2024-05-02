<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <script src="https://kit.fontawesome.com/3197b77032.js" crossorigin="anonymous"></script>
    <title>Index Data Beasiswa | Lobi Poliwangi</title>
</head>
<body class="">  
    <div class="flex flex-row h-fit">
        @include('\admin\component\sidebar')
        @include('\admin\component\navbarAdmin')
        <div class="pl-72 pr-6 pt-20 w-full h-full">
            <div>
                <p class="text-2xl font-bold text-gray-900 mb-6">Form Pengisian Prestasi Mahasiswa</p>
                <div class="mb-6">
                <div class="block -ml-4 max-w-sm min-w-full p-3 pl-6 pr-6 pb-2  bg-white border border-gray-200 rounded-lg shadow border-l-8 border-l-sky-400">
                    <div class="flex flex-row items-center">
                        <div class="mr-4 mt-3">
                            <img src="{{ $data['foto_mahasiswa'] }}" class="w-16 h-16 rounded-full">
                        </div>
                        <div>indexdata
                            <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{ $data['nama_mahasiswa'] }}</h5>
                            <p class="text-sm font-normal text-gray-700 dark:text-gray-400">{{ $data['nim'] }}</p>
                            <p class="mt-1.5 text-xs font-semibold text-gray-700 dark:text-gray-400">{{ $data['prodi']['nama_prodi'] }} ({{ $data['prodi']['jurusan']['nama_jurusan'] }})</p>
                        </div>    
                    </div>
                    <form class="w-full text-end" action="/dashboard-admin/select-mahasiswa" method="get">
                        @csrf
                        <button type="submit" class="hover:underline hover:decoration-blue-500">
                            <p class="text-sm font-semibold text-blue-500">Ganti Mahasiswa</p>
                        </button>
                    </form>
                </div>
                </div>
                <div>
                    <form action="/dashboard-admin/tambah-data-prestasi-mahasiswa" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="flex flex-row justify-between items-center mb-4">
                            <div class="h-80 pt-4">
                                <div class="relative z-0 w-96 mb-5">
                                    <input name="namaPerlombaan" type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                                    <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama Perlombaan</label>
                                    @error ('namaPerlombaan')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="relative z-0 w-96 mb-9">
                                    <input name="namaPrestasi" type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                                    <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Kedudukan/Ranking Prestasi</label>
                                    @error ('namaPrestasi')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="relative z-0 w-80 mb-9">
                                    <select name="tingkatan" type="date" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer">
                                        <option value="1" class="text-sm font-normal pl-2 pr-2">Lokal</option>
                                        <option value="2" class="text-sm font-normal pl-2 pr-2">International</option>
                                    </select>
                                    <label for="floating_standard" class="absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-8 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-9 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Tingkatan Prestasi</label>
                                </div>
                                <div class="relative z-0 w-64 mb-9">
                                    <input name="tanggalPerlombaan" autocomplete="off" type="date" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                                    <label for="floating_standard" class="absolute text-lg text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-7 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-9 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">tanggal perlombaan</label>
                                    @error ('tanggalPenutupan')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="flex mt-34">
                                    <div class="flex items-center h-5">
                                        <input id="helper-checkbox" type="checkbox" value="" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 mt-4 outline-0">
                                    </div>
                                    <div class="ms-4 text-sm">
                                        <label for="helper-checkbox" class="font-bold text-base text-gray-900 dark:text-gray-300">Harap Cek lagi Kevalidan Data</label>
                                        <p id="helper-checkbox-text" class="text-sm font-normal text-gray-500 dark:text-gray-300">Pastikan Data Valid Dan Benar Sebelum di Post</p>
                                    </div>
                                </div>
                            </div>
                            <div class="w-fit">
                                <p class="text-lg font-semibold mb-3 mt-3">Upload Foto Bukti Prestasi</p>
                                <div class="flex items-center w-80 mr-32">
                                    <div class="flex flex-col items-center justify-center w-full h-96 border-2 border-gray-300 border-dashed rounded-lg bg-gray-50">
                                        <div>
                                            <img class="bg-contain w-full h-96" id="previewImage">
                                        </div>
                                        <input id="dataImage" name="dataImage" type="file" class="hidden">
                                    </div>
                                </div>
                                @error ('dataImage')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Oops!</span>{{$message }}</p>
                                @enderror
                                <div class="mt-4 w-80 flex justify-center">
                                    <label for="dataImage" class="w-fit h-fit bg-blue-500 p-1.5 px-5 text-sm text-gray-100 rounded cursor-pointer">
                                        <span><i class="fa-solid fa-file-circle-plus"></i></span>
                                        <span class="ml-1">Tambah Foto</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <a href="/dashboard-admin/select-instansi-beasiswa" type="submit" class="p-3 pl-8 pr-8 bg-slate-400 mt-10 mb-10 w-fit rounded-md ">
                                <p class="text-gray-100 text-md font-semibold">Cancel</p>
                            </a>
                            <input type="hidden" name="nimMahasiswa" value="{{ $data['nim'] }}">
                            <button type="submit" class="ml-5 p-3 pl-8 pr-8 bg-blue-500 mt-10 mb-10 w-96 rounded-md">
                                <p class="text-gray-100 text-md font-semibold">Posting Prestasi Mahasiswa</p>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="\js\admin\prevGambar.js"></script>
</body>
</html>