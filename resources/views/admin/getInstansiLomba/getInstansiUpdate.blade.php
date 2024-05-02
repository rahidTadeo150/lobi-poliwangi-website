@extends('\admin\getInstansiLomba\getInstansiLomba')
@section('tableBodyInstansi')
@foreach ($dataInstansi as $data)
<tr class="bg-transparent border-b-2 dark:bg-gray-800 dark:border-gray-700">
    <td class="px-6 py-4 font-medium">
        {{ $data->nama_instansi_lomba }}
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
        <form action="/dashboard-admin/index-data-lomba/edit-data/{{ $idLomba->id }}" method="get" class="m-0">
            @csrf
            <input type="hidden" name="idInstansi" value="{{ $data->id }}">
            <input type="hidden" name="codeRequest" value="update">
            <button type="submit" class="font-medium text-blue-600 text-center dark:text-blue-500 hover:underline h-fit">Pilih</button>
        </form> 
    </td>
</tr>
@endforeach
@endsection