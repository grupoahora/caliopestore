@extends('layouts.admin')
@section('title','Gestión de productos')
@section('styles')
<style type="text/css">
 .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>
{!! Html::style('/editable/jqueryui-editable/css/jqueryui-editable.css') !!}
</style>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Productos
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Productos</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Productos</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <button type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal-2">Agregar</button>
                               {{--  <a href="{{route('products.create')}}" class="dropdown-item">Agregar</a> --}}
                                <a class="dropdown-item" href="{{route('print_barcode')}}">Exportar códigos de
                                    barras</a>
                                {{--  <button class="dropdown-item" type="button">Another action</button>
                              <button class="dropdown-item" type="button">Something else here</button>  --}}
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr>
                                    <th scope="row">{{$product->id}}</th>
                                    <td>
                                        <a href="{{route('products.show',$product)}}">{{$product->name}}</a>
                                    </td>
                                    <td>{{$product->stock}}</td>
                                    <td>
                                        <a
                                        href="#"
                                        id="product_status"
                                        class="editable"
                                        data-type="select"
                                        data-pk="{{$product->id}}"
                                        data-url="{{url("/products_update/$product->id")}}"
                                        data-title="Estado"
                                        data-value="{{$product->status}}"
                                        >{{$product->product_status()}}
                                        </a>
                                    </td>
                                    @if ($product->category_id == '')
                                    <td>
                                        no tiene categoria
                                    </td>
                                        @else
                                        <td>{{$product->category->name}}</td>
                                    @endif
                                     
                                    
                                   
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['products.destroy',$product], 'method'=>'DELETE']) !!}

                                        <a class="jsgrid-button jsgrid-edit-button"
                                            href="{{route('products.edit', $product)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit"
                                            title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button>

                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$products->render()}}
            </div> --}}
        </div>
    </div>
</div>
</div>


<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Registrar Nuevo Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route'=>'products.store', 'method'=>'POST']) !!}
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nombre del Producto</label>
                    <input type="text" name="name" id="title" value="{{old('name')}}" class="form-control" required>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Continuar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
{!! Html::script('/editable/jqueryui-editable/js/jqueryui-editable.min.js') !!}
<script>
    $.fn.editable.defaults.mode = 'inline';
    $.fn.editable.defaults.ajaxOptions = {type: 'PUT'};
    $(document).ready(function() {
        $('.editable').editable({
            source:[
                
                {value: "DRAFT", text: "BORRADOR"},
                {value: "SHOP", text: "TIENDA"},
                {value: "POS", text: "PUNTO DE VENTA"},
                {value: "BOTH", text: "AMBOS"},
                {value: "DISABLED", text: "DESACTIVADO"},
            ]
        });
    });
</script>
@endsection
