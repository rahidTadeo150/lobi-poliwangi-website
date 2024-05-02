@extends('\admin\notifikasiRequest\index\indexRequestTemplate')
@section('requestBody')
<div class="w-full min-h-[593px] h-fit bg-white p-5 pt-6 mt-6 mb-6 rounded-md">
    <div class="flex flex-row justify-between items-center h-fit">
        <div class="w-fit">
            <p class="text-xl font-semibold">Notifikasi beasiswa</p>
            <p class="text-sm font-normal">Daftar notifikasi pengajuan beasiswa</p>
        </div>
        <div class="w-2/5 flex flex-row justify-between">
            <button class="w-32 h-8 flex flex-col justify-center items-center rounded bg-sky-500 text-white">
                <p class="text-sm font-medium" disabled>Beasiswa</p>
            </button>
            <a href="/dashboard-admin/notifikasi/lomba">
                <button class="w-32 h-8 flex flex-col justify-center items-center rounded border text-sky-500 border-sky-500">
                    <p class="text-sm font-medium">Lomba</p>
                </button>
            </a>
            <a href="/dashboard-admin/notifikasi/prestasi">
                <button class="w-32 h-8 flex flex-col justify-center items-center rounded border text-sky-500 border-sky-500">
                    <p class="text-sm font-medium">Prestasi</p>
                </button>
            </a>
        </div>
    </div>
    <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 mt-4">
        <ul class="flex flex-wrap -mb-px">
            <li class="me-2">
                <a href="#" class="inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg">Belum Terbaca</a>
            </li>
            <li class="me-2">
                <a href="#" class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">History</a>
            </li>
        </ul>
    </div>
    <div class="py-3">
        <div class="w-full h-fit  bg-white rounded shadow-md px-6 py-4 border-b border-gray-300 mt-3">
            <div class="w-full h-full flex flex-col justify-center">
                <div class="flex flex-row items-center">
                    <div class="w-12 h-12 rounded-full bg-slate-500"></div>
                    <div class="-mt-2">
                        <p class="text-sm font-semibold ml-2">Username</p>
                        <p class="text-xs font-normal ml-2">Username ingin mengajukan beasiswa, lihat detail sekarang</p>
                    </div>
                </div>
                <a href="">
                    <p class="text-blue-600 font-medium text-xs hover:underline float-right">Lihat detail</p>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection