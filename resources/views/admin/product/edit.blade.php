@extends('layouts.admin')

@section('title','Editar producto')
@section('styles')
{!! Html::style('select2/dist/css/select2.min.css') !!}
{!! Html::style('fileinput/css/fileinput.min.css') !!}
{!! Html::style('css/jquery-ui.min.css') !!}
<link href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css" rel="stylesheet" type="text/css" />
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
                        <label for="status">Estado de Producto</label>
                        <select class="select2" name="status" id="status" style="width: 100%">
                            @foreach (get_product_statuses() as $status)
                            <option value="{{$status['code']}}" >{{$status['name']}}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>
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
                        <label for="colors">Colores</label>
                        <select class="select2" name="colors[]" id="colors" style="width: 100%" multiple>
                            @foreach ($colors as $color)
                            <option value="{{$color->id}}"
                                {{ collect(old('colors', $product->colors->pluck('id')))->contains($color->id) ? 'selected' : ''}}>
                                {{$color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sizes">Tamaños</label>
                        <select class="select2" name="sizes[]" id="sizes" style="width: 100%" multiple>
                            @foreach ($sizes as $size)
                            <option value="{{$size->id}}"
                                {{ collect(old('sizes', $product->sizes->pluck('id')))->contains($size->id) ? 'selected' : ''}}>
                                {{$size->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="form-group">
                        <h4 class="card-title">Subir imágenes</h4>
                        <div class="file-upload-wrapper">
                            <div id="fileuploader" >Subir</div>
                        </div>
                    </div> --}}
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
                    <input type="hidden" id="csrf_token" name="_token" value="{{ csrf_token() }}">
                    <label for="files">Galería de imàgenes</label>
                    <div class="file-loading" id="sortable">
                        <input id="files" name="files[]" type="file" multiple>
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

{!! Html::script('js/jquery-ui.min.js') !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
{!! Html::script('fileinput/js/fileinput.min.js') !!}
{!! Html::script('fileinput/js/locales/es.js') !!}
{!! Html::script('fileinput/themes/fas/theme.js') !!}
{!! Html::script('ckeditor/ckeditor.js') !!}
<script>
    CKEDITOR.replace('long_description');

</script>



<script>
    $(document).ready(function () {
        $('#category').select2();
        $('#status').select2();
        $('#subcategory_id').select2();
        $('#tags').select2();
        $('#colors').select2();
        $('#sizes').select2();
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
  <script>
    $(document).ready(function() {
        var krajeeGetCount = function(id) {
            var cnt = $('#' + id).fileinput('getFilesCount');
            return cnt === 0 ? 'You have no files remaining.' :
                'You have ' +  cnt + ' file' + (cnt > 1 ? 's' : '') + ' remaining.';
        };
        $("#files").fileinput({
            language: "es",
            theme: "fas",
            browseOnZoneClick: true,
            uploadUrl: "../../upload_images_product/{{$product->id}}",
          
  
            showClose: false,
            uploadExtraData:{'_token':$("#csrf_token").val()},

            initialPreview: [
                <?php foreach ($product->images as $image)
                {
                  echo '"'.asset($image->url).'",';
                } ?>
            ],
            initialPreviewAsData: true,
            initialPreviewFileType: 'image',
            initialPreviewConfig: [<?php foreach ($product->images as $image)
            {
                echo '{width:"120px",key:'.$image->id.'},';
            } ?>],
            overwriteInitial: false,
            validateInitialCount: true,
            minFileCount: 1,
            maxFileCount: 5,
            maxFileSize: 2100,
            browseClass: "btn btn-primary btn-block",
            showCaption: false,
            showRemove: false,
            showUpload: false,
            deleteUrl: "../../file_delete",
            deleteExtraData:{'_token':$("#csrf_token").val()},
        }).on('filebeforedelete', function() {
            return new Promise(function(resolve, reject) {
                $.confirm({
                    title: 'Confirmación!',
                 content: '¿Estás seguro de que quieres eliminar este archivo?',
                    type: 'red',
                    buttons: {   
                        ok: {
                            btnClass: 'btn-primary text-white',
                            keys: ['enter'],
                            action: function(){
                                resolve();
                            }
                        },
                        cancel: function(){
                           $.alert ('¡Se canceló la eliminación del archivo!');
                        }
                    }
                });
            });
        }).on('filedeleted', function() {
            setTimeout(function() {
               $.alert('¡La eliminación del archivo se realizó correctamente! ' );
            }, 900);
        });
    });
</script>
<!-- End custom js for this page-->
@endsection
