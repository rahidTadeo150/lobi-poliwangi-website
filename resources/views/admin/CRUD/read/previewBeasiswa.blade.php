@extends('\admin\CRUD\read\previewTemplate')
@section('titlePage')
<title>{{ $dataBeasiswa->nama_beasiswa }} | Lobi Poliwangi</title>
@endsection

@section('mainArea')
    <div class=" h-96 overflow-hidden relative -ml-4 -mr-4">
        <img class=" h-80 absolute shadow-xl border border-gray-700 z-20 rounded-md -translate-y-[50%] -translate-x-[50%] top-[50%] left-[50%]" src="{{ asset('storage/' . $dataBeasiswa->data_foto) }}">
        <div class="w-full h-full bg-black opacity-40 absolute z-10"></div>
        <img class="w-full bg-contain z-0 -translate-y-1/4 blur-sm" src="{{ asset('storage/' . $dataBeasiswa->data_foto) }}">
    </div>
    <div class="w-full flex flex-row justify-between mt-8">
        @if ($dataBeasiswa->status_id == 1)
        <div class="w-2/6 bg-slate-100 shadow-lg border border-gray-300 border-l-4 border-l-emerald-700 pt-8 pb-14 pl-8 pr-8 rounded-md">
        @else
        <div class="w-2/6 bg-slate-100 shadow-lg border border-gray-300 border-l-4 border-l-red-500 pt-8 pb-14 pl-8 pr-8 rounded-md">
        @endif
            <div>
                <p class="text-3xl font-bold mb-2">{{ $dataBeasiswa->nama_beasiswa }}</p>
                <p class="w-fit h-fit p-1.5 pl-4 pr-4 bg-blue-500 rounded-lg text-sm text-slate-100 font-medium">{{ $dataInstansi->nama_instansi_beasiswa }}</p>
            </div>
            <div class="mt-6">
                <p class="text-sm font-medium">Status Saat Ini</p>
                @if ($dataBeasiswa->status_id == 1)
                <p class="text-sm font-semibold text-emerald-700">
                    <span class="mr-2"><i class="fa-solid fa-circle-check"></i></span>{{ $dataBeasiswa->status->status }}
                </p>
                @else
                <p class="text-sm font-semibold text-red-700">
                    <span class="mr-2"><i class="fa-solid fa-circle-xmark"></i></span>{{ $dataBeasiswa->status->status }}
                </p>
                @endif
            </div>
            <div class="mt-6">
                <p class="text-sm font-medium">Tanggal Penutupan Register</p>
                <p class="text-sm font-semibold"><span class="mr-2"><i class="fa-regular fa-calendar"></i></span>{{ $dataBeasiswa->tanggal_penutupan }}</p>
            </div>
            <div class="mt-6">
                <p class="text-sm font-medium">Tingkatan Beasiswa</p>
                <p class="text-sm font-semibold"><span class="mr-2"><i class="fa-solid fa-earth-americas"></i></span>{{ $dataBeasiswa->tingkatan->tingkatan }}</p>
            </div>
        </div>
        @if ($dataBeasiswa->status_id == 1)
        <div class="w-[43rem] bg-slate-100 shadow-lg border border-gray-300 border-l-4 border-l-emerald-700 rounded-md p-6">
        @else
        <div class="w-[43rem] bg-slate-100 shadow-lg border border-gray-300 border-l-4 border-l-red-500 rounded-md p-6">
        @endif
            <div class="">
                <p class="text-base font-semibold mb-2">Persyaratan Beasiswa</p>
                <div class="w-full py-2 px-3 bg-slate-50 rounded-md">
                    <p class="text-sm font-normal">{{ $dataBeasiswa->persyaratan }}</p>
                </div>
            </div>
            <div class="mt-4">
                <p class="text-base font-semibold mb-2">Link Pendaftaran Beasiswa</p>
                <div class="w-full py-2 px-3 bg-slate-50 rounded-md">
                    <a href="{{ $dataBeasiswa->link_pendaftaran }}">
                        <p class="text-sm text-blue-600 font-normal hover:underline"><span class="mr-2 text-black"><i class="fa-solid fa-link"></i></span>{{ $dataBeasiswa->link_pendaftaran }}</p>
                    </a>
                </div>
            </div>
            <p class="mt-5 text-base font-semibold mb-2">Di Buat Atau Di Edit Oleh</p>
            <div class="flex flex-row items-center">
                <div class="w-12 h-12 rounded-full bg-slate-500"></div>
                <div class="-mt-1">
                    <p class="text-sm font-medium ml-2">{{ $dataBeasiswa->accountAdmin->username }}</p>
                    <p class="text-xs font-normal ml-2">Pada {{ $dataBeasiswa->updated_at }}</p>
                </div>
            </div>
            <div class="w-full flex flex-row mt-10">
                @if (!$dataInstansi->deleted_at)
                <a href="/dashboard-admin/index-data-beasiswa/edit-data/{{ $dataBeasiswa->id }}" class="text-sm w-fit h-fit p-3 bg-slate-300 rounded cursor-pointer bg-yellow-500 text-gray-100 mr-4" type="submit"><span class="mr-2"><i class="fa-solid fa-pen-to-square"></i></span>Edit Data Ini</a>
                <form action="/dashboard-admin/delete-data-beasiswa/{{ $dataBeasiswa->id }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="idInstansiLama" value="{{ $dataBeasiswa->id }}">
                    <button class="w-fit h-fit p-3 bg-red-600 hover:bg-red-500 text-sm text-gray-200 rounded cursor-pointer"type="submit"><span class="mr-2"><i class="fa-solid fa-trash"></i></span>Nonaktifkan Data</button>
                </form>
                @else
                <form action="/dashboard-admin/delete-data-instansi-lomba/{{ $dataInstansi->id }}" method="post">
                    @csrf
                    <button class="w-fit h-fit p-3 bg-Blue-600 text-sm text-gray-200 rounded cursor-pointer" type="submit"><span class="mr-2"><i class="fa-solid fa-trash"></i></span>Restore Data</button>
                </form>
                @endif
            </div>
        </div>
    </div>
    @endsection