@extends('admin.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card mt-4 mb-4">
                <div class="card-header">
                    <h1 class="login-title">Inicar sesión</h1>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"></span>
                        </button>
                    </div>
                    @endif
                    <form action="{{route('admin.signin')}}" method="post">
                        @csrf
                        <input name="email" type="email" class="form-control mb-3" placeholder="Correo electrónico" required>
                        <input name="password" type="password" class="form-control mb-3" placeholder="Contraseña" required>
                        <button type="submit" class="btn btn-block btn-primary">INGRESAR</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection