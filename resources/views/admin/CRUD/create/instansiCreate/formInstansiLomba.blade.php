@extends('\admin\CRUD\create\instansiCreate\formInstansiTemplate')
@section('pushUpload')
<form action="/dashboard-admin/create-instansi-lomba" method="post">
    <input type="hidden" name="redirect" value='{{ $redirect }}'>
@endsection
                    