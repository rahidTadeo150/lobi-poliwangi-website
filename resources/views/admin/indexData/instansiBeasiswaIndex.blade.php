@extends('\admin\indexData\indexDataTemplate')
@section('tableData')
<div class="w-full min-h-[593px] h-fit bg-white p-5 pt-6 mt-6 mb-6 rounded-md">
    <p class="text-2xl font-semibold mb-8">{{ $titlePage }}</p>
    <form action="/dashboard-admin/create-instansi-beasiswa" method="get">
        <input type="hidden" name="redirect" value="index">
        <button type="submit" class="bg-green-500 hover:bg-green-400 p-2 pl-4 pr-4 flex mb-6 justify-center items-center rounded-md shadow-sm">
            <span class="text-xs font-normal text-white mr-3"><i class="fa-solid fa-plus"></i></span>
            <span class="text-xs font-normal text-white">Tambah Instansi</span>
        </button>
    </form>
    <div class="flex flex-row justify-between items-center mb-2">
        <div class="w-3/5">
            <form action="{{ route('indexInstansiBeasiswa') }}" method="get">
                @csrf
                <div class="flex">
                    <button id="searchDropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-xs font-normal text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 relative" type="button">Search By <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
              </svg></button>
                    <div id="dropdownCard" class="z-10 absolute mt-12 hidden bg-white divide-y divide-gray-100 rounded-lg shadow-xl border border-slate-200 w-44 dark:bg-gray-700">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200">
                        <li>
                            <button type="button" id="typeSearch" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Nama Instansi</button>
                        </li>
                        <li>
                            <button type="button" id="typeSearch" class="inline-flex w-full px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">No Telephone</button>
                        </li>
                        </ul>
                    </div>
                    <div class="relative w-full">
                        <input type="search" name="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-xs text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 outline-0 placeholder:text-xs placeholder:font-ligh placeholder:italic focus:ring-blue-500 focus:border-blue-500" placeholder="Masukan Keyword Pencarian" required autocomplete="off">
                        @if($codeRequest == 'history')
                            <input type="hidden" name="codeRequest" value="history">
                        @endif
                        <input type="hidden" id="typeSearching" name="typeSearching" value="Nama Instansi">
                        <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700 hover:bg-blue-800">
                            <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                            <span class="sr-only">Search</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @if($titlePage != 'History Data Instansi')
        <form action="{{ route('indexInstansiBeasiswa') }}" method="get">
            <input type="hidden" name="codeRequest" value="history">
            <button type="submit" class="bg-slate-300 p-2 pl-3 pr-3 rounded-md w-fit">
                <p class="text-sm"><span class="mr-2"><i class="fa-solid fa-clock-rotate-left"></i></span>History Data</p>
            </button>
        </form>
        @else
        <form action="{{ route('indexInstansiBeasiswa') }}" method="get">
            <button type="submit" class="bg-slate-300 p-2 pl-3 pr-3 rounded-md w-fit">
                <p class="text-sm font-normal">Kembali Ke Index</p>
            </button>
        </form>
        @endif
    </div>
    <p class="text-sm font-light mb-4">Data Yang Di Temukan: {{ $jumlahData }}</p>
    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rounded-md rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-900 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Nama Instansi
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        no telephone
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                        email
                    </th>
                    <th scope="col" class="px-6 py-3 font-semibold">
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($data))
                @foreach ($data as $data)
                <tr class="bg-transparent border-b border-gray-300 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4 text-sm font-normal text-gray-700 dark:text-white">
                        {{ $data->nama_instansi_beasiswa }}
                    </td>
                    <td class="px-6 py-4 text-sm font-normal text-gray-700 dark:text-white">
                        {{ $data->alamat }}
                    </td>
                    <td class="px-6 py-4 text-sm font-normal text-gray-700 dark:text-white">
                        {{ $data->no_telephone }}
                    </td>
                    <td class="px-6 py-4 text-sm font-normal text-gray-700 dark:text-white">
                        {{ $data->email }}
                    </td>
                    <td class="px-6 py-4 text-sm font-normal text-gray-700 dark:text-white text-center">
                        <a href="/dashboard-admin/index-data-instansi-beasiswa/preview/{{ $data->id }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
