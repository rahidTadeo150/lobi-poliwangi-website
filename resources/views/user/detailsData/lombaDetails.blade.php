@extends('\user\detailsData\detailsTemplate')
@section('titlePage')
    <title>{{ $dataLomba->nama_lomba }} | Lobi Poliwangi</title>
@endsection
@section('bodyDetail')
    <div class="pt-20 px-10 h-screen w-full">
        <div class="flex flex-col justify-center items-center w-full h-full">
            <div class="flex flex-row items-center w-full px-10 bg-slate-50 shadow-lg border border-gray-200 rounded-md py-10">
                <img src="{{ asset('storage/' . $dataLomba->data_foto) }}" class="w-96 h-96 mx-20">
                <div class="ml-4 w-full">
                    <p class="text-xs font-medium text-gray-400 mb-2">Diposting pada {{ $dataLomba->created_at }}</p>
                    <div class="flex flex-row items-start justify-between">
                        <div class="w-fit h-fit">
                            <p class="text-3xl font-bold">{{ $dataLomba->nama_lomba }}</p>
                            <p class="text-base text-gray-900 font-medium">{{ $dataLomba->instansiLomba->nama_instansi_lomba }}</p>
                        </div>
                        <div class="w-fit h-fit flex flex-row">
                            <div class="px-6 py-1.5 bg-lime-500 w-fit h-fit rounded-lg shadow mb-4 mt-2 mr-2">
                                <p class="text-sm font-medium text-slate-50">Lomba</p>   
                            </div>
                            <div class="px-6 py-1.5 bg-blue-700 w-fit h-fit rounded-lg shadow mb-4 mt-2">
                                <p class="text-sm font-medium text-slate-50">{{ $dataLomba->tingkatan->tingkatan }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="my-4">
                        <p class="mb-1 text-sm font-medium">Status Lomba : <span class="text-green-600">{{ $dataLomba->status->status }}</span></p>
                        <p class="text-sm font-medium mb-1">Register ditutup pada</p>
                        <div class="px-4 py-1.5 bg-blue-500 w-fit h-fit rounded">
                            <p class="text-xs font-medium text-gray-50"><span class="mr-2 text-sm"><i class="fa-solid fa-calendar-check"></i></span>{{ $dataLomba->tanggal_penutupan }}</p>
                        </div>
                    </div>
                    <p class="mb-1 text-sm font-semibold">Persyaratan</p>
                    <div class="w-full h-fit p-2 bg-slate-100 rounded-md">
                        <p class="text-sm font-medium text-gray-600">{{ $dataLomba->persyaratan }}</p>
                    </div>
                    <p class="mt-8 mb-1 text-sm font-semibold">Link Registrasi</p>
                    <div class="py-1.5 px-3 bg-slate-100 w-4/6 rounded-md">
                        <p class="text-sm font-medium text-blue-500">{{ $dataLomba->link_pendaftaran }}</p>
                    </div>
                    <div class="flex mt-14 flex-row">
                        <a href="/index-lomba">
                            <button class="w-fit h-fit bg-slate-200 rounded text-sm font-medium px-4 py-1.5 mr-4">Kembali</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@endsection