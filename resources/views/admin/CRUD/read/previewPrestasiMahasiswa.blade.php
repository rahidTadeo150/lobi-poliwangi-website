<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    @include('\font\poppins')
    <title>Preview Data Beasiswa | Lobi Poliwangi</title>
</head>
<body>
    <div class="flex flex-row h-fit">
    @include('\admin\component\sidebar')
    @include('\admin\component\navbarAdmin')
    <div class="pl-64 pr-4 pt-20 w-full h-full font-poppins">
        <div class="ml-4">
            <div class="flex flex-row justify-between items-center">
                <div>
                    <div>
                        <p class="text-3xl font-bold mt-10">{{ $data->nama_mahasiswa }}</p>
                        <p class="mt-2 w-fit h-fit p-1.5 pl-4 pr-4 bg-blue-500 rounded-lg text-sm text-slate-100 font-medium">{{ $data->nim }}</p>
                    </div>
                    <div class="mt-6">
                        <p class="text-sm font-semibold">Prodi</p>
                        <p class="text-xs font-medium">{{ $data->prodi->nama_prodi }}</p>
                    </div>
                    <div class="mt-6">
                        <p class="text-sm font-semibold">Jurusan</p>
                        <p class="text-xs font-medium">{{ $data->prodi->jurusan->nama_jurusan }}</p>
                    </div>
                    <div class="mt-6">
                        <p class="text-sm font-semibold">Tingkatan Beasiswa</p>
                        <p class="text-xs font-medium">{{ $data->prestasi->tingkatan->tingkatan }}</p>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm font-semibold">Nama Perlombaan</p>
                        <p class="w-fit min-w-[75%] h-fit p-2 pl-3 pr-3 bg-slate-300 rounded-md text-xs font-normal">{{ $data->prestasi->nama_perlombaan_prestasi }}</p>
                    </div>
                    <div class="mt-4">
                        <p class="text-xs font-semibold">Prestasi</p>
                        <p class="w-fit min-w-[75%] h-fit p-2 pl-3 pr-3 bg-slate-300 rounded-md text-xs font-normal">{{ $data->prestasi->nama_prestasi }}</p>
                    </div>
                </div>
                <div class="w-52 h-94">
                    <img src="{{ asset('storage/' . $data->foto_mahasiswa) }}" class="w-52 h-94">
                </div>
            </div>
            <p class="text-xl font-bold mt-10">Detail Lainnya</p>
            <div class="w-full h-[1px] bg-black mt-3"></div>
            <div></div>
            <div class="mt-6">
                <p class="text-sm font-semibold">Uploader</p>
                <p class="text-sm font-medium -mt-0.5">{{ $data->accountAdmin->username }}</p>
            </div>
            <div class="mt-6">
                <p class="text-sm font-semibold">Tanggal Upload</p>
                <p class="text-sm font-medium -mt-0.5">{{ $data->created_at }}</p>
            </div>
            <div class="mt-6">
                <p class="text-sm font-semibold">Tanggal Edit</p>
                <p class="text-sm font-medium -mt-0.5">{{ $data->updated_at }}</p>
            </div>
            <div class="w-6/12 flex flex-row mt-10 mb-10 justify-between">
                <a href="" class="w-fit h-fit flex p-3 bg-slate-300 rounded-md ">Kembali Ke Index</a>
                <a href="/dashboard-admin/index-data-prestasi-mahasiswa/edit-data/{{ $data->id }}" class="w-fit h-fit p-3 bg-slate-300 rounded cursor-pointer" type="submit">Edit Data Ini</a>
                <form action="/dashboard-admin/delete-data/{{ $data->id }}" method="post">
                    @csrf
                    @method('delete')
                    <button class="w-fit h-fit p-3 bg-slate-300 rounded cursor-pointer" type="submit">Hapus Data</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>