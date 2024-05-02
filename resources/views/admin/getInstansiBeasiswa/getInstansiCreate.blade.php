@extends('\admin\getInstansiBeasiswa\getInstansiBeasiswa')
@section('addDataInstansi')
<p class="text-xs font-normal -mb-2.5">Instasi Tidak Di Temukan?</p>
<form action="/dashboard-admin/create-instansi-beasiswa" method="get">
    <input type="hidden" name="redirect" value="{{ $redirect }}">
    <button type="submit" class="bg-green-500 hover:bg-green-400 p-2 pl-4 pr-4 flex justify-center items-center rounded-md mb-12 shadow-sm">
        <span class="text-xs font-normal text-white mr-3"><i class="fa-solid fa-plus"></i></span>
        <span class="text-xs font-normal text-white">Tambah Instansi</span>
    </button>
</form>
@endsection
@section('tableBodyInstansi')
@if (!empty($dataInstansi))
@foreach ($dataInstansi as $data)
<tr class="bg-transparent border-b-2 dark:bg-gray-800 dark:border-gray-700">
    <td class="px-6 py-4 font-medium">
        {{ $data->nama_instansi_beasiswa }}
    </td>
    <td class="px-6 py-4">
        {{ $data->no_telephone }}
    </td>
    <td class="px-6 py-4">
        {{ $data->alamat }}
    </td>
    <td class="px-6 py-4">
        {{ $data->email }}
    </td>
    <td class="px-6 py-4 text-right">
        <form action="/dashboard-admin/tambah-data-beasiswa" method="get" class="m-0">
            <input type="hidden" name="idInstansi" value="{{ $data->id }}">
            <button type="submit" class="font-medium text-blue-600 text-center dark:text-blue-500 hover:underline h-fit">Pilih</button>
        </form> 
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
@endsection