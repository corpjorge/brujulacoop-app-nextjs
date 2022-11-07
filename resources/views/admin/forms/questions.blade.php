@php
$route = isset($question) ? route('admin.questions.update', [
'survey' => $survey->id,
'survey_question' => $question->id
]) : route('admin.questions.store', $survey);
$questionText = isset($question) ? $question->question : "";
$order = isset($question) ? $question->order : 1;
$type = isset($question) ? $question->question_type_id : 1;
$status = isset($question) ? $question->is_active : 1;
@endphp

@extends('admin.layout')
@section('content')
<div class="container pt-4 pb-4">
    <div class="row">
        <div class="col-md-12">
            <div class="admin-header">
                <h1 class="admin-title">Agregar Pregunta: {{ $survey->name }}</h1>
                <a href="{{ route('admin.questions.index', $survey) }}" class="btn btn-small btn-danger">Volver</a>
            </div>
            <x-status-alert />
            <form action="{{ $route }}" method="post">
                @csrf
                @if (isset($question))
                @method('put')
                @endif
                <input type="hidden" name="survey_id" value="{{ $survey->id }}">
                <x-input label="Pregunta: *" type="text" name="question" value="{{ old('question', $questionText) }}" required="required" />
                <x-select label="Tipo de respuesta:" name="question_type_id" selected="{{ $type }}" :values="$types" />
                <x-input label="Orden:" type="number" name="order" value="{{ old('order', $order) }}" required="required" />
                <x-select label="Estado:" name="is_active" selected="{{ $status }}" required="required" :values="$statuses" />
                <button type="submit" class="btn btn-block btn-primary">GUARDAR</button>
            </form>
        </div>
    </div>
</div>
@endsection