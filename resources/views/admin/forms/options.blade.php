@php
$route = isset($surveyOption) ? route('admin.options.update', [
'survey_question' => $surveyQuestion->id,
'survey_option' => $surveyOption->id
]) : route('admin.options.store', $surveyQuestion);
$response = isset($surveyOption) ? $surveyOption->response : "";
$order = isset($surveyOption) ? $surveyOption->order : 1;
$question_id = isset($surveyOption) ? $surveyOption->question_id : "";
$status = isset($surveyOption) ? $surveyOption->is_active : 1;
@endphp

@extends('admin.layout')
@section('content')
<div class="container pt-4 pb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="admin-header">
                <h1 class="admin-title">Agregar Opción: {{ $surveyQuestion->question }}</h1>
                <a href="{{ route('admin.options.index', $surveyQuestion) }}" class="btn btn-small btn-danger">Volver</a>
            </div>
            <x-status-alert />
            <form action="{{ $route }}" method="post">
                @csrf
                @if (isset($surveyOption))
                @method('put')
                @endif
                <input type="hidden" name="survey_question_id" value="{{ $surveyQuestion->id }}">
                <x-input label="Respuesta: *" type="text" name="response" value="{{ old('question', $response) }}" required="required" />
                <x-input label="Orden:" type="number" name="order" value="{{ old('order', $order) }}" required="required" />
                <x-select label="Estado:" name="is_active" selected="{{ $status }}" required="required" :values="$statuses" />
                <x-select label="Seleccionar si abre otra pregunta:" name="question_id" selected="{{ $question_id }}" :values="$questions" />
                <button type="submit" class="btn btn-block btn-primary">GUARDAR</button>
            </form>
        </div>
    </div>
</div>
@endsection