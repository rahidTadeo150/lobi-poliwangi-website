@extends('\admin\CRUD\read\previewTemplate')
@section('titlePage')
<title>{{ $dataLomba->nama_lomba }} | Lobi Poliwangi</title>
@endsection

@section('mainArea')
    <div class=" h-96 overflow-hidden relative -ml-4 -mr-4">
        <img class=" h-80 absolute shadow-xl border border-gray-700 z-20 rounded-md -translate-y-[50%] -translate-x-[50%] top-[50%] left-[50%]" src="{{ asset('storage/' . $dataLomba->data_foto) }}">
        <div class="w-full h-full bg-black opacity-40 absolute z-10"></div>
        <img class="w-full bg-contain z-0 -translate-y-1/4 blur-sm" src="{{ asset('storage/' . $dataLomba->data_foto) }}">
    </div>
    <div class="w-full flex flex-row justify-between mt-8">
        <div class="w-2/6 h-fit pt-8 pb-12 pl-8 pr-8 bg-slate-100 rounded-md">
            <div>
                <p class="text-3xl font-bold mb-2">{{ $dataLomba->nama_lomba }}</p>
                <p class="w-fit h-fit p-1.5 pl-4 pr-4 bg-blue-500 rounded-lg text-sm text-slate-100 font-medium">{{ $dataInstansi->nama_instansi_lomba }}</p>
            </div>
            <div class="mt-6">
                <p class="text-sm font-medium">Status Saat Ini</p>
                @if ($dataLomba->status_id === 1)
                <p class="text-sm font-semibold text-emerald-700">
                    <span class="mr-2"><i class="fa-solid fa-circle-check"></i></span>{{ $dataLomba->status->status }}
                </p>
                @else
                <p class="text-sm font-semibold text-red-700">
                    <span class="mr-2"><i class="fa-solid fa-circle-xmark"></i></span>{{ $dataLomba->status->status }}
                </p>
                @endif
            </div>
            <div class="mt-6">
                <p class="text-sm font-medium">Tanggal Penutupan Register</p>
                <p class="text-sm font-semibold"><span class="mr-2"><i class="fa-regular fa-calendar"></i></span>{{ $dataLomba->tanggal_penutupan }}</p>
            </div>
            <div class="mt-6">
                <p class="text-sm font-medium">Tingkatan Lomba</p>
                <p class="text-sm font-semibold"><span class="mr-2"><i class="fa-solid fa-earth-americas"></i></span>{{ $dataLomba->tingkatan->tingkatan }}</p>
            </div>
        </div>
        <div class="w-[43rem] bg-slate-100 p-6">
            <div class="">
                <p class="text-base font-semibold">Persyaratan Lomba</p>
                <p class="text-sm font-normal">{{ $dataLomba->persyaratan }}</p>
            </div>
            <div class="mt-4">
                <p class="text-base font-semibold">Link Pendaftaran Lomba</p>
                <a href="{{ $dataLomba->link_pendaftaran }}">
                    <p class="text-sm font-normal"><span class="mr-2"><i class="fa-solid fa-link"></i></span>{{ $dataLomba->link_pendaftaran }}</p>
                </a>
            </div>
            <p class="mt-5 text-base font-semibold mb-2">Di Buat Atau Di Edit Oleh</p>
            <div class="flex flex-row items-center">
                <div class="w-12 h-12 rounded-full bg-slate-500"></div>
                <div class="-mt-1">
                    <p class="text-sm font-medium ml-2">{{ $dataLomba->accountAdmin->username }}</p>
                    <p class="text-xs font-normal ml-2">Pada {{ $dataLomba->updated_at }}</p>
                </div>
            </div>
            <div class="w-full flex flex-row mt-10">
                <a href="/dashboard-admin/index-data-lomba/edit-data/{{ $dataLomba->id }}" class="text-sm w-fit h-fit p-3 bg-slate-300 rounded cursor-pointer bg-yellow-500 text-gray-100 mr-4" type="submit"><span class="mr-2"><i class="fa-solid fa-pen-to-square"></i></span>Edit Data Ini</a>
                <form action="/dashboard-admin/index-data-lomba/delete-data/{{ $dataLomba->id }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="idInstansiLama" value="{{ $dataInstansi->id }}">
                    <button class="w-fit h-fit p-3 bg-red-600 hover:bg-red-500 text-sm text-gray-200 rounded cursor-pointer"type="submit"><span class="mr-2"><i class="fa-solid fa-trash"></i></span>Nonaktifkan Data</button>
                </form>
            </div>
        </div>
    </div>
    @endsection