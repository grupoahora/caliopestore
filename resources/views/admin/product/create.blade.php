@extends('layouts.admin')
@section('title','Registrar producto')
@section('styles')
{!! Html::style('select2/dist/css/select2.min.css') !!}

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registro de productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de productos</li>
            </ol>
        </nav>
    </div>
    {!! Form::open(['route'=>'products.store', 'method'=>'POST','files' => true]) !!}
    <div class="row">
        <div class="col-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" class="form-control" aria-describedby="helpId"
                            required>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="code">Código de barras</label>
                                <input type="text" name="code" id="code" class="form-control">
                                <small id="helpId" class="text-muted">Campo opcional</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sell_price">Precio de venta</label>
                                <input type="number" name="sell_price" id="sell_price" class="form-control"
                                    aria-describedby="helpId" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="short_description">Extracto</label>
                        <textarea class="form-control" name="short_description" id="short_description"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="long_description">Descripción</label>
                        <textarea class="form-control" name="long_description" id="long_description"
                            rows="10"></textarea>
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
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory_id">Subcategoría</label>
                        <select class="select2" name="subcategory_id" id="subcategory_id" style="width: 100%">
                            @foreach ($subcategories as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tags">Etiquetas</label>
                        <select class="select2" name="tags[]" id="tags" style="width: 100%" multiple>
                            @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="colors">Colores</label>
                        <select class="select2" name="colors[]" id="colors" style="width: 100%" multiple>
                            @foreach ($colors as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sizes">Tamaños</label>
                        <select class="select2" name="sizes[]" id="sizes" style="width: 100%" multiple>
                            @foreach ($sizes as $size)
                            <option value="{{$size->id}}">{{$size->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
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
    <a href="{{route('products.index')}}" class="btn btn-light">
        Cancelar
    </a>
    {!! Form::close() !!}
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('melody/js/dropify.js') !!}

{!! Html::script('melody/js/dropzone.js') !!}
{!! Html::script('ckeditor/ckeditor.js') !!}
<script>
    CKEDITOR.replace('long_description');

</script>
<script>
    $(document).ready(function () {
        $('#category').select2();
        $('#subcategory_id').select2();
        $('#tags').select2();
        $('#colors').select2();
        $('#sizes').select2();
    });

</script>
@endsection
