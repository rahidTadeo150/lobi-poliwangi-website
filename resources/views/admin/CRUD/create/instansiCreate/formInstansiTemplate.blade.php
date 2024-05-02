<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <script src="https://kit.fontawesome.com/3197b77032.js" crossorigin="anonymous"></script>
    <title>{{ $titlePage }} | Lobi Poliwangi</title>
</head>
<body>
    <div class="flex flex-row h-fit">
        @include('\admin\component\sidebar')
        <div class="pl-64 pt-6 pr-6 w-full h-full">
            <div class="w-full h-96 bg-white rounded-md p-3 pl-5 pr-5">
                <p class="text-lg font-semibold">Tambah Instansi Baru</p>
                <p class="text-sm font-normal text-gray-500 mb-5">Masukan Data Instansi Dengan Teliti</p>
                @yield('pushUpload')
                    @csrf
                    <div>
                        <div class="relative z-0 w-96 mb-5">
                            <input name="namaInstansi" autocomplete="off" type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                            <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Nama Instansi</label>
                        </div>
                        <div class="relative z-0 w-96 mb-5">
                            <input name="noTelephone" autocomplete="off" type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                            <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">No Telephone</label>
                        </div>
                        <div class="relative z-0 w-96 mb-5">
                            <input name="alamatInstansi" autocomplete="off" type="text" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                            <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Alamat Instansi</label>
                        </div>
                        <div class="relative z-0 w-96 mb-5">
                            <input name="emailInstansi" autocomplete="off" type="email" id="floating_standard" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" />
                            <label for="floating_standard" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">Email Instansi</label>
                        </div>
                        <div class="flex mt-14">
                            <div class="flex items-center h-5">
                                <input id="helper-checkbox" aria-describedby="helper-checkbox-text" type="checkbox" value="" class="w-5 h-5 text-blue-600 bg-gray-100 border-gray-300 rounded dark:bg-gray-700 dark:border-gray-600 mt-4 outline-0">
                            </div>
                            <div class="ms-4 text-sm">
                                <label for="helper-checkbox" class="font-bold text-base text-gray-900 dark:text-gray-300">Harap Cek lagi Kevalidan Data</label>
                                <p id="helper-checkbox-text" class="text-sm font-normal text-gray-500 dark:text-gray-300">Pastikan Data Valid Dan Benar Sebelum di Post </p>
                            </div>
                        </div>
                        <div class="flex flex-row">
                            <a href="/dashboard-admin/select-instansi-lomba" type="submit" class="p-3 pl-8 pr-8 bg-slate-400 mt-10 mb-10 w-fit rounded-md">
                                <p class="text-gray-900 text-md font-semibold">Cancel</p>
                            </a>
                            <button type="submit" class="ml-5 p-3 pl-8 pr-8 bg-blue-500 mt-10 mb-10 w-96 rounded-md">
                                <p class="text-gray-100 text-md font-semibold" onclick="confirm('Ingin Menyimpan Instansi Ini')">Simpan Instansi</p>
                            </button>
                        </div>
                    </div>
                </form>
            </div>  
        </div>
    </div>
</body>
</html>