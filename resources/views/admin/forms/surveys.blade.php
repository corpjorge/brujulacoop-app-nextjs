@php
$route = isset($survey) ? route('admin.surveys.update', $survey) : route('admin.surveys.store');
$name = isset($survey) ? $survey->name : "";
$description = isset($survey) ? $survey->description : "";
$attempts = isset($survey) ? $survey->attempts : 1;
$order = isset($survey) ? $survey->order : 1;
$status = isset($survey) ? $survey->is_active : 1;
@endphp

@extends('admin.layout')
@section('content')
<div class="container pt-4 pb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="admin-header">
                <h1 class="admin-title">Agregar Encuesta</h1>
                <a href="{{ route('admin.surveys.index') }}" class="btn btn-small btn-danger">Volver</a>
            </div>
            <x-status-alert />
            <form action="{{ $route }}" method="post">
                @csrf
                @if (isset($survey))
                @method('put')
                @endif
                <x-input label="Nombre: *" type="text" name="name" value="{{ old('name', $name) }}" required="required" />
                <x-textarea label="Descriptción:" name="description" value="{{ old('description', $description) }}" rows="5" />
                <x-input label="Intentos:" type="number" name="attempts" value="{{ old('attempts', $attempts) }}" required="required" />
                <x-input label="Orden:" type="number" name="order" value="{{ old('order', $order) }}" required="required" />
                <x-select label="Estado:" name="is_active" selected="{{ $status }}" required="required" :values="$statuses" />
                <button type="submit" class="btn btn-block btn-primary">GUARDAR</button>
            </form>
        </div>
    </div>
</div>
@endsection