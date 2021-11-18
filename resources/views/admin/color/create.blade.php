@extends('layouts.admin')
@section('title','Registrar color')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de colors
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('colors.index')}}">colores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de colors</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de colors</h4>
                    </div>
                    {!! Form::open(['route'=>'colors.store', 'method'=>'POST', 'files' => true]) !!}
                    <div class="form-group">
                        <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                    </div> 
                    {{-- <div class="form-group">
                        <label for="slug">Slug</label>
                        <textarea class="form-control" name="slug" id="slug" rows="3"></textarea>
                    </div> --}}
                    
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Imagenes de producto</h4>
                                    <input type="file" name="images[]" class="dropify" multiple />
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                    <a href="{{URL::previous() }}" class="btn btn-light">
                       Cancelar
                    </a>
                    {!! Form::close() !!}
                </div>
                
                
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/dropify.js') !!}

{!! Html::script('melody/js/dropzone.js') !!}
@endsection
