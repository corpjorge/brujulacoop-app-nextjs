@extends('admin.layout')
@section('content')
<div class="container pt-4 pb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="admin-header">
                <h1 class="admin-title">Preguuntas: {{ $survey->name }}</h1>
                <a href="{{ route('admin.questions.create', $survey) }}" class="btn btn-small btn-primary">Nueva pregunta</a>
            </div>
            <x-status-alert />
            <div class="table-responsive-md">
                <table id="table" class="table table-condensed table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Pregunta</th>
                            <th>Tipo</th>
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
            "ajax": "{{ route('admin.questions.datatable', $survey) }}",
            "pageLength": 50,
            "columns": [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'question',
                    name: 'question'
                },
                {
                    data: 'type',
                    name: 'type'
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