@extends('layouts.admin')
@section('title','Editar color')
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
            Editar color
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('colors.index')}}">colores</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar color</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {!! Form::model($color,['route'=>['colors.update',$color], 'method'=>'PUT']) !!}
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" value="{{$color->name}}" class="form-control"
                            placeholder="Nombre" {{-- required --}}>
                        @error('name')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" name="description" id="description"
                            rows="3">{{$color->description}}</textarea>
                        @error('description')
                        <small class="text-danger">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>
                    

                    <button type="submit" class="btn btn-primary mr-2">Actualizar</button>
                    <a href="{{URL::previous() }}" class="btn btn-light">
                        Cancelar
                    </a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h4 class="card-title">Actualizar Textura</h4>
                        <div class="file-upload-wrapper">
                            <div id="fileuploader" >Subir</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @csrf
                    <h4 class="card-title">Galeria de Texturas</h4>
                    <div id="lightgallery" class="row lightGallery">
                        @foreach ($color->images as $image)
                            
                        <a href="{{$image->url}}" class="image-tile"><img
                                src="{{$image->url}}" alt="image small"></a>
                        
                        
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/vendors/lightgallery/js/lightgallery-all.min.js') !!}
{!! Html::script('melody/js/light-gallery.js') !!}
<script>
      
        (function($) {
            'use strict';
            if ($("#fileuploader").length) {
                $("#fileuploader").uploadFile({
                url: "/upload/color/{{$color->id}}/image",
                fileName: "image",
                
                });
            }
            
        })(jQuery);
        
  </script>
@endsection
