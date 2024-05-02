@extends('\admin\indexData\indexDataTemplate')
@section('tableData')
<div class="w-full min-h-[593px] h-fit bg-white p-5 pt-6 mb-6 rounded-md">
    <p class="text-2xl font-semibold mb-8">{{ $titlePage }}</p>
    <form action="/dashboard-admin/select-instansi-lomba" method="get">
        <input type="hidden" name="redirect" value="getInstansiCreate">
        <button class="w-fit h-fit p-2 pl-5 pr-5 bg-green-500 text-xs text-white mb-8 rounded"><span class="mr-2"><i class="fa-solid fa-plus"></i></span>Tambah Data</button>
    </form>
    <div class="flex flex-row justify-between mb-3">
        <form action="/dashboard-admin/index-data-lomba" method="get">
            @csrf
            <div class="flex w-96">
                <button id="searchDropdown" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-xs font-light text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600 relative" type="button">Search By <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg></button>
                <div id="dropdownCard" class="z-10 absolute mt-12 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-xl border border-slate-200 w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdown-button">
                    <li>
                        <button type="button" id="typeSearch" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nama Lomba</button>
                    </li>
                    <li>
                        <button type="button" id="typeSearch" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nama Instansi</button>
                    </li>
                    </ul>
                </div>
                <div class="relative w-full">
                    <input type="search" name="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-xs text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 outline-0 placeholder:text-xs placeholder:font-ligh placeholder:italic focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-s-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Masukan Keyword Pencarian" required autocomplete="off">
                    @if($codeRequest == 'history')
                        <input type="hidden" name="codeRequest" value="history">
                    @endif
                    <input type="hidden" id="typeSearching" name="typeSearching" value="Nama Lomba">
                    <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                        </svg>
                        <span class="sr-only">Search</span>
                    </button>
                </div>
            </div>
        </form>
        <div class="flex flex-row">
            <div class="mr-3">
                <a href="/dashboard-admin/index-data-instansi-lomba">
                    <div class="w-fit py-2 px-3 bg-slate-300 rounded-md">
                        <p class="text-sm"><span class="mr-2"><i class="fa-solid fa-building-user"></i></span>Daftar Instansi</p>
                    </div>
                </a>
            </div>
            <div>
                <form action="/dashboard-admin/index-data-lomba" method="get">
                    @csrf
                    <input type="hidden" name="codeRequest" value="history">
                    <button type="submit" class="w-fit py-2 px-3 bg-slate-300 rounded-md">
                        <p class="text-sm"><span class="mr-2"><i class="fa-solid fa-clock-rotate-left"></i></span>History Data</p>
                    </button>
                </form>
            </div>
        </div>
    </div>
    <p class="text-sm text-slate-800 mb-3">Data Yang Ditemukan : {{ $jumlahData }}</p>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rounded-md rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-900 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Foto Brosur
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Nama Lomba
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Nama Instansi
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Tanggal Register Terakhir
                    </th>
                    @if($codeRequest == 'history')
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Tanggal Dinonaktifkan
                    </th>
                    @endif
                    
                    <th scope="col" class="px-6 py-3 font-semibold">
                        action
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($dataLombaAll))
                @foreach ($dataLombaAll as $data)
                <tr class="bg-transparent border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 text-sm font-normal text-gray-700 dark:text-white">
                        <img src="{{ asset('/storage/' . $data->data_foto) }}" class="w-20 h-20 rounded">
                    </th>
                    <td class="px-6 py-4 text-sm font-normal text-gray-700 dark:text-white">
                        {{ $data->nama_lomba }}
                    </td>
                    <td class="px-6 py-4 text-sm font-normal text-gray-700 dark:text-white">
                        {{ $data->nama_instansi_lomba }}
                    </td>
                    <td class="px-6 py-4 text-sm font-normal text-gray-700 dark:text-white">
                        {{ $data->tanggal_penutupan }}
                    </td>
                     @if($codeRequest == 'history')
                    <th scope="col" class="px-6 py-3 font-semibold">
                        {{ $data->deleted_at }}
                    </th>
                    @endif
                    <td class="px-6 py-4 text-sm font-normal text-gray-700 dark:text-white text-center">
                        <a href="/dashboard-admin/index-data-lomba/preview/{{ $data->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Preview</a>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="6" class="text-center py-4">
                        <p class="text-md font-medium text-gray-600">[404] Data Kosong</p>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>    
@endsection
