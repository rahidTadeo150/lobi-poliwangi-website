@extends('\admin\CRUD\read\previewTemplate')
@section('titlePage')
<title>{{ $dataInstansi->nama_instansi_beasiswa }} | Lobi Poliwangi</title>
@endsection

@section('mainArea')
<div class="w-full h-fit p-6 pt-14 pb-12 rounded-md bg-blue-500 flex flex-col justify-center items-center text-gray-100">
    <div>
        <p class="text-3xl font-bold">{{ $dataInstansi->nama_instansi_beasiswa }}</p>
    </div>
    <div class="mt-2">
        <p class="text-sm font-medium"><span class="mr-2"><i class="fa-solid fa-location-dot"></i></span>{{ $dataInstansi->alamat }}</p>
    </div>
</div>
<div class="w-full h-fit bg-slate-200 rounded-md mt-4 pl-12 pr-12 pb-8">
    <div class="h-full flex flex-row items-center">
        <div class="flex flex-col justify-center items-center">
            <p class="text-base font-semibold mb-4 mt-4">Postingan Yang Terkait Dengan Instansi Ini</p>
            @if ($containData)
            <div class="w-80 h-80 rounded-md relative">
                <img src="{{ asset('/storage/' . $dataInstansi->beasiswa[0]->data_foto) }}" class="w-full h-full rounded-md">
                <div class="bg-[rgba(0,0,0,0.40)] backdrop-blur-[2px] absolute w-full h-full -translate-y-full opacity-0 p-3 pl-5 pr-5 hover:opacity-100">
                    <div class="w-full h-full flex flex-col justify-center">
                        <div>
                            <p class="text-xl w-full text-gray-100 font-semibold mb-4">{{ $dataInstansi->beasiswa[0]->nama_beasiswa }}</p>
                            <p class="text-base w-full text-gray-100 font-semibold">Dibuat Pada</p>
                            <p class="text-sm w-full text-gray-100 font-normal">{{ $dataInstansi->beasiswa[0]->created_at }}</p>
                            <p class="text-base w-full text-gray-100 font-semibold mt-4">Diupdate Pada</p>
                            <p class="text-sm w-full text-gray-100 font-normal">{{ $dataInstansi->beasiswa[0]->updated_at }}</p>
                            <a href="/dashboard-admin/index-data-beasiswa/preview/{{ $dataInstansi->beasiswa[0]->id }}">
                                <button class="p-2 pl-3 pr-3 bg-blue-600 text-gray-100 rounded-md text-xs font-medium mt-8">Kunjungi</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="w-80 h-80 border-2 border-dashed border-black rounded-md">
                <div class="h-full flex flex-col justify-center items-center">
                    <div class="text-4xl"><i class="fa-solid fa-link-slash"></i></div>
                    <p class="text-sm font-medium text-center w-4/5 mt-2">Instansi Ini Tidak Memiliki Postingan Apapun</p>
                </div>
            </div>
            @endif
        </div>
        <div class="w-80 h-fit ml-32 pt-6 pb-6">
            <p class="text-xl font-semibold">Detail Instansi</p>
            <p class="text-sm font-normal mt-">Dibuat Pada : {{ $dataInstansi->created_at }}</p>
            <p class="text-sm font-normal mt-">Status : @if($containData) <span class="text-emerald-700 font-semibold">Aktif</span> @else <span class="text-red-600 font-semibold">Nonaktif</span> @endif</p>
            <p class="text-lg font-semibold mt-4 mb-1">Kontak Instansi</p>
            <div class="">
                <p class="text-sm font-normal"><span class="mr-2"><i class="fa-regular fa-envelope"></i></span>{{ $dataInstansi->email }}</p>
                <p class="text-sm font-normal"><span class="mr-2"><i class="fa-solid fa-phone"></i></span>{{ $dataInstansi->no_telephone }}</p>
            </div>
            <p class="mt-5 text-base font-semibold mb-2">Di Buat Atau Di Edit Oleh</p>
            <div class="flex flex-row items-center">
                <div class="w-12 h-12 rounded-full bg-slate-500"></div>
                <div class="-mt-1">
                    <p class="text-sm font-medium ml-2">{{ $dataInstansi->accountAdmin->username }}</p>
                    <p class="text-xs font-normal ml-2">Di Ubah Pada {{ $dataInstansi->updated_at }}</p>
                </div>
            </div>
            @if ($containData)
            <div class="w-fit pr-6 pl-6 p-3 bg-red-50 mt-10 rounded-md border border-red-200">
                <p class="text-xs font-normal text-red-700"><span class="mr-2"><i class="fa-solid fa-circle-info"></i></span>Data Tidak Bisa Di Hapus, Di Karenakan Data Ini Masih Di Gunakan</p>
            </div>
            <div class="w-full flex flex-row mt-10 justify-between">
            @else
            <div class="w-full flex flex-row mt-10 justify-between">
            @endif
                @if (!$dataInstansi->deleted_at)
                <a href="/dashboard-admin/index-data-instansi-beasiswa/edit-data/{{ $dataInstansi->id }}" class="text-sm w-fit h-fit p-3 bg-slate-300 rounded cursor-pointer bg-yellow-500 text-gray-100" type="submit"><span class="mr-2"><i class="fa-solid fa-pen-to-square"></i></span>Edit Data Ini</a>
                @if ($containData)
                <button class="w-fit h-fit p-3 bg-red-500 rounded cursor-pointer text-sm text-gray-200" type="submit" disabled><span class="mr-2"><i class="fa-solid fa-trash"></i></span>Nonaktifkan Data</button>
                @else
                <form action="/dashboard-admin/delete-data-instansi-beasiswa/{{ $dataInstansi->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="w-fit h-fit p-3 bg-red-900 hover:bg-red-500 text-sm text-gray-200 rounded cursor-pointer" type="submit"><span class="mr-2"><i class="fa-solid fa-trash"></i></span>Nonaktifkan Data</button>
                </form>
                @endif
                @else
                <form action="/dashboard-admin/delete-data-instansi-lomba/{{ $dataInstansi->id }}" method="post">
                    @csrf
                    <button class="w-fit h-fit p-3 bg-Blue-600 text-sm text-gray-200 rounded cursor-pointer" type="submit"><span class="mr-2"><i class="fa-solid fa-trash"></i></span>Restore Data</button>
                </form>
                @endif
            </div>
            @endsection
        </div>
    </div>
</div>