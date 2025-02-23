@extends('layouts.template_sujeto')

@section('content')
<div class="card">
    <h5 class="card-title text-center" style="color: #848483 ;font-size:200%;font-family:inter;">Modificar línea estratégica</h5>
    <div class="card-body">
        @include('alertas.alerta')
        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" id="error_alert" role="alert">
            <div class="errors">
                Por favor corrige los siguientes errores
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" arial-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form action="{{ route('estrategia.update', $estrategia) }}" method="POST">
            @csrf @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <div class="mt-2">
                        <label for="number" class="col-md-4 col-form-label" style="font-size:120%;font-family:inter;"> Numero de la Estrategia</label>
                        <input type="text" name="number" class="form-control @error('number') is-invalid @enderror" id="number" placeholder="Numero de la Estrategia"  required value="{{ old('number', $estrategia->number) }}"></input>
                        @error('number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="name" class="col-md-4 col-form-label" style="font-size:120%;font-family:inter;"> Nombre</label>
                        <textarea type="text" name="name" cols="20" rows="5" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nombre de la línea estratégica" required >{{ old('name', $estrategia->name) }}</textarea>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="problematica_id" class="col-md-4 col-form-label" style="font-size:120%;font-family:inter;"">Problematica </label>
                            <div>
                            <select name="problematica_id" id="problematica_id" class="form-control @error('problematica_id') is-invalid @enderror" aria-label="Default select example" required>
                            <option value="">-- Elige una Problematica --</option>
                            @foreach ($problematicas as $problematica)
                            <option value="{{$problematica -> id}}" {{$problematica ->id == $estrategia -> problematica_id ? 'selected' : '' }}>{{ $problematica -> name }}</option>
                            @endforeach
                            </select>
                            @error('problematica_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer" justify-content-between>
                <a type="button" class="btn btn-outline-danger" href="{{ route('estrategias.index') }}">Cancelar</a>
                <button type="submit" class="btn btn-outline-primary" data-dismiss="modal" style="color: white; background:#059B97;">Actualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection