@extends('layouts.admin')

@section('title','Editar producto')
@section('styles')
{!! Html::style('select2/dist/css/select2.min.css') !!}
  <!-- plugin css for this page -->
  {!! Html::style('melody/vendors/lightgallery/css/lightgallery.css') !!}
  <!--  plugin css for this page -->
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Edición de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edición de producto</li>
            </ol>
        </nav>
    </div>

    {!! Form::model($product,['route'=>['products.update',$product], 'method'=>'PUT','files' => true]) !!}
    <div class="row">
        <div class="col-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" 
                            name="name" 
                            value="{{ old('name', $product->name)}}" 
                            id="name"
                            class="form-control" 
                            aria-describedby="helpId" 
                            {{-- required --}}>
                            @error('name')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">Código de barras</label>
                                <input type="text" 
                                    name="code" 
                                    value="{{ old('code', $product->code)}}" 
                                    id="code"
                                    class="form-control">
                                    @error('code')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                <small id="helpId" class="text-muted">Campo opcional</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sell_price">Precio de venta</label>
                                <input type="number" 
                                    name="sell_price"
                                    value="{{ old('sell_price', $product->sell_price)}}" 
                                    id="sell_price"
                                    class="form-control" 
                                    aria-describedby="helpId" 
                                    {{-- required --}}>
                                    @error('sell_price')
                                        <small class="text-danger">
                                            {{ $message }}
                                        </small>
                                    @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="short_description">Extracto</label>
                        <textarea class="form-control" 
                            name="short_description" 
                            id="short_description"
                            rows="3">{{ old('short_description', $product->short_description)}}
                        </textarea>
                        @error('short_description')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="long_description">Descripción</label>
                        <textarea class="form-control" 
                            name="long_description" 
                            id="long_description"
                            rows="10">
                            {{ old('long_description', $product->long_description)}}
                        </textarea>
                        @error('long_description')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="category_id">Categoría</label>
                        <select class="select2" name="category_id" id="category" style="width: 100%">
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}" {{ old('category_id', $product->category_id) ==
                                $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label for="subcategory_id">Subcategoría</label>
                        <select class="select2" name="subcategory_id" id="subcategory_id" style="width: 100%">
                            <option value="" disabled selected>-- Selecciona una Categoria --</option>
                            {{-- @foreach ($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}" {{ old('subcategory_id', $product->subcategory_id) ==
                                $subcategory->id ? 'selected' : ''}}>{{$subcategory->name}}</option>
                            @endforeach --}}
                        </select>
                        @error('subcategory_id')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tags">Etiquetas</label>
                        <select class="select2" name="tags[]" id="tags" style="width: 100%" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{$tag->id}}"
                                {{ collect(old('tags', $product->tags->pluck('id')))->contains($tag->id) ? 'selected' : ''}}>
                                {{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
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
    {{-- <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Imagenes de producto</h4>
                    <input type="file" name="images[]" class="dropify" multiple />
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row grid-margin">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Galeria de imàgenes</h4>
                    <div id="lightgallery" class="row lightGallery">
                        @foreach ($product->images as $image)
                            
                        <a href="{{$image->url}}" class="image-tile"><img
                                src="{{$image->url}}" alt="image small"></a>
                        @endforeach
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary mr-2">Editar</button>
    <a href="{{route('products.index')}}" class="btn btn-light">
        Cancelar
    </a>
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
{{-- {!! Html::script('melody/js/data-table.js') !!} --}}
{!! Html::script('melody/js/dropify.js') !!}

{{-- {!! Html::script('melody/js/dropzone.js') !!} --}}
{!! Html::script('ckeditor/ckeditor.js') !!}
<script>
    CKEDITOR.replace('long_description');

</script>
<script>
    $(document).ready(function () {
        $('#category').select2();
        $('#subcategory_id').select2();
        $('#tags').select2();
    });

</script>
<!-- plugin js for this page -->
  {!! Html::script('melody/vendors/lightgallery/js/lightgallery-all.min.js') !!}
  <!-- end plugin js for this page -->
<!-- Custom js for this page-->
  {!! Html::script('melody/js/light-gallery.js') !!}
  <!-- End custom js for this page-->
<!-- Custom js for this page-->
  {{-- {!! Html::script('melody/js/jquery-file-upload.js') !!} --}}
  <script>
      
        (function($) {
            'use strict';
            if ($("#fileuploader").length) {
                $("#fileuploader").uploadFile({
                url: "/upload/product/{{$product->id}}/image",
                fileName: "image",
                
                });
            }
            
        })(jQuery);
        
  </script>
  <script>
      var category = $('#category');
      var subcategory_id = $('#subcategory_id');
      category.change(function(){
          $.ajax({
              url: "{{route('get_subcategories')}}",
              method: 'GET',
              data: {
                  category: category.val(),
              },
              success: function(data){
                  subcategory_id.empty();
                  subcategory_id.append('<option disabled selected>-- Selecciona una Subcategoria --</option>');
                  $.each(data, function(index, element){
                      subcategory_id.append('<option value="'+ element.id +'">'+ element.name +'</option>')
                  });
              }
          });
      });
    
  </script>
<!-- End custom js for this page-->
@endsection
