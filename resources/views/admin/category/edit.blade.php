@extends('layouts.admin')
@section('title','Editar categoría')
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
            Editar categoría
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar categoría</li>
            </ol>
        </nav>
    </div>
    {!! Form::model($category,['route'=>['categories.update',$category], 'method'=>'PUT','files' => true]) !!}
    <div class="row">
        <div class="col-8 grid-margin">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar categoría</h4>
                    </div>
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" value="{{$category->name}}" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea class="form-control" 
                            name="description" 
                            id="description"
                            rows="10">
                            {{ old('description', $category->description)}}
                        </textarea>
                        @error('description')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$categories->render()}}
                </div>  --}}
            </div>
        </div>
        <div class="col-4 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <h4 class="card-title">Subir imágenes</h4>
                        <div class="file-upload-wrapper">
                            <div id="fileuploader" >Subir</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Galeria de imàgenes</h4>
                    <div id="lightgallery" class="row lightGallery">
                        @foreach ($category->images as $image)
                            
                        <a href="{{$image->url}}" class="image-tile"><img
                                src="{{$image->url}}" alt="image small"></a>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mr-2">Editar</button>
    <a href="{{route('categories.index')}}" class="btn btn-light">
        Cancelar
    </a>
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('ckeditor/ckeditor.js') !!}
{!! Html::script('melody/vendors/lightgallery/js/lightgallery-all.min.js') !!}
{!! Html::script('melody/js/light-gallery.js') !!}


<script>
    CKEDITOR.replace('description');

</script>
<script>
      
        (function($) {
            'use strict';
            if ($("#fileuploader").length) {
                $("#fileuploader").uploadFile({
                url: "/upload/category/{{$category->id}}/image",
                fileName: "image",
                
                });
            }
            
        })(jQuery);
        
  </script>
@endsection
