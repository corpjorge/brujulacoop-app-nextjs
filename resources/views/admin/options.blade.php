@extends('admin.layout')
@section('content')
<div class="container pt-4 pb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="admin-header">
                <h1 class="admin-title">Opciones: {{ $surveyQuestion->question }}</h1>
                <a href="{{ route('admin.options.create', $surveyQuestion) }}" class="btn btn-small btn-primary">Nueva opción</a>
            </div>
            <x-status-alert />
            <div class="table-responsive-md">
                <table id="table" class="table table-condensed table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Respuesta</th>
                            <th>Condicionada</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        oTable = $('#table').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": "{{ route('admin.options.datatable', $surveyQuestion) }}",
            "pageLength": 50,
            "columns": [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'response',
                    name: 'response'
                },
                {
                    data: 'its_conditional',
                    name: 'its_conditional'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'actions',
                    name: 'actions'
                },
            ]
        });
    });
</script>
@endsection