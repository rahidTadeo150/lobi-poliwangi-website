 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <script src="https://kit.fontawesome.com/3197b77032.js" crossorigin="anonymous"></script>
    <title>Pilih Mahasiswa | Lobi Poliwangi</title>
 </head>
 <body class="bg-blue-200">  
    <div class="flex flex-row h-fit">
        @include('\admin\component\sidebar')
        <div class="pl-64 pt-6 pr-6 w-full h-full font-poppins">
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-gray-50 pl-5 pr-5">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 mb-4">
                    <p class="p-5 text-2xl font-semibold text-left rtl:text-right text-gray-900 bg-white dark:text-white dark:bg-gray-800 -ml-5 -mr-5">
                        Daftar Mahasiswa
                    </p>
                    <p class="-mt-4 text-sm font-normal text-gray-500 dark:text-gray-400 mb-5">Pilih Mahasiswa yang ingin di input data.</p>
                    <div class="w-full border-t-gray-900 border mb-6"></div>
                    <form>
                        <div class="flex w-10/12 mb-5">
                            <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-xs font-light text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" type="button">Search By <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                      </svg></button>
                            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mockups</button>
                                </li>
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Templates</button>
                                </li>
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Design</button>
                                </li>
                                <li>
                                    <button type="button" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Logos</button>
                                </li>
                                </ul>
                            </div>
                            <div class="relative w-full">
                                <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-xs text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 outline-0 placeholder:text-xs placeholder:font-ligh placeholder:italic focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Masukan Keyword Pencarian" required>
                                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </div>
                        </div>
                    </form>
                    <thead class="text-xs text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Foto Mahasiswa
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Nim
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Nama Mahasiwa
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Prodi
                            </th>
                            <th scope="col" class="px-6 py-3 font-semibold">
                                Jurusan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                <span class="sr-only">Preview</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @yield('tableBodyInstansi') 
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @if (session()->has('instansiSuccessAdded'))
        <script>alert("{{ session('instansiSuccessAdded') }}")</script>
    @endif
</body>
 </html>