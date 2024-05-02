@extends('\admin\getInstansiBeasiswa\getInstansiBeasiswa')
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
        <form action="/dashboard-admin/index-data-beasiswa/edit-data/{{ $idBeasiswa->id }}" method="get" class="m-0">
            @csrf
            <input type="hidden" name="idInstansi" value="{{ $data->id }}">
            <input type="hidden" name="codeRequest" value="update">
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