@extends('layouts.master')

@section('content')
   {!! $dataTable->table()  !!}
@stop

@push('scripts')
<script>
$(function() {
    $('#karyawand.data').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('karyawand.data') !!}',
        columns: [
            {data: 'id', name: 'id'},
            {data: 'nik', name: 'nik'},
            {data: 'npwp', name: 'npwp'},
            {data: 'npwp', name: 'npwp'},
            {data: 'npwp', name: 'npwp'},
            {data: 'npwp', name: 'npwp'}
        ]
    });
});
</script>
@endpush