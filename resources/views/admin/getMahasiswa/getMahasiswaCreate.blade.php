@extends('\admin\getMahasiswa\getMahasiswa')
@section('tableBodyInstansi')
@foreach ($data as $data)
<tr class="bg-transparent border-b-2 dark:bg-gray-800 dark:border-gray-700">
    <td class="px-6 py-4 text-sm font-norma text-gray-700 dark:text-white">
        <img src="{{ $data['foto_mahasiswa'] }}" class="w-14 h-14 rounded-full">
    </td>
    <td class="px-6 py-4 font-medium">
        {{ $data['nim']}}
    </td>
    <td class="px-6 py-4">
        {{ $data['nama_mahasiswa'] }}
    </td>
    <td class="px-6 py-4">
        {{ $data['prodi']['nama_prodi'] }}
    </td>
    <td class="px-6 py-4">
        {{ $data['prodi']['jurusan']['nama_jurusan'] }}
    </td>
    <td class="px-6 py-4 text-right">
        <form action="/dashboard-admin/tambah-data-prestasi-mahasiswa" method="get" class="m-0">
            <input type="hidden" name="idMahasiswa" value="{{ $data['nim'] }}">
            <button type="submit" class="font-medium text-blue-600 text-center dark:text-blue-500 hover:underline h-fit">Pilih</button>
        </form> 
    </td>
</tr>
@endforeach
@endsection