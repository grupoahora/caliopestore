@extends('layouts.admin')
@section('title','Categoría ' .$category->name )
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }

</style>
@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Detalles de categoría {{$category->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('subcategories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
            </ol>
        </nav>
    </div>

    <div class="row">
        <div class="col-md-4 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="{{$category->icon}}"></i>
                        {{$category->name}}
                    </h4>
                    <ul class="solid-bullet-list">
                        <li>
                            <h5>Description</h5>
                            <p class="text-muted">{{$category->description}}</p>
                        </li>
                    </ul>
                    
                </div>
                <div class="card-footer text-muted">
                    {!! Form::open(['route'=>['categories.destroy',$category], 'method'=>'DELETE']) !!}
                        <a class="btn btn-info" href="{{route('categories.edit', $category)}}">Editar</a>  
                        <button type="submit" class="btn btn-danger float-right">Eliminar</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">SubCategorías</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('subcategories.create', compact('category'))}}" class="dropdown-item" {{-- data-toggle="modal"
                                    data-target="#exampleModal" --}}>Agregar</a>
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
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subcategories as $subcategory)
                                <tr>
                                    <th scope="row">{{$subcategory->id}}</th>
                                    <td>
                                        <a href="#" class="get_products"
                                            data-artid="{{$subcategory->id}}">{{$subcategory->name}}</a>
                                    </td>
                                    <td>{{$subcategory->description}}</td>
                                    <td style="width: 50px;">
                                        {!! Form::open(['route'=>['subcategories.destroy',$subcategory],
                                        'method'=>'DELETE'])
                                        !!}

                                        <a class="jsgrid-button jsgrid-edit-button"
                                            href="{{route('subcategories.edit', $subcategory)}}" title="Editar">
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
            </div>
        </div>
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Productos</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                    </div>

                    <div class="table-responsive">
                        <table id="products_listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
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
                            <td>{{$product->sell_price}}</td>


                           {{--  <td>{{$product->category->name}}</td> --}}
                            <td style="width: 50px;">
                                {!! Form::open(['route'=>['products.destroy',$product], 'method'=>'DELETE']) !!}

                                <a class="jsgrid-button jsgrid-edit-button" href="{{route('products.edit', $product)}}"
                                    title="Editar">
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
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar Subcategoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['route'=>'subcategories.store', 'method'=>'POST']) !!}
                <input type="hidden" name="category_id" value="{{$category->id}}">
                @error('category_id')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                    @error('name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="description" id="description" rows="3" required></textarea>
                    @error('description')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Registrar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@if ($errors->any())
<script>
    $(document).ready(function () {
        $("#exampleModal").modal("show");

    });

</script>
@endif
<script>
    $(function () {
        $('.get_products').click(function () {
            var elem = $(this);
            $.ajax({
                type: "GET",
                url: "/get_products_by_subcategory",
                data: "subcategory_id=" + elem.attr('data-artid'),
                dataType: "json",
                success: function (data1) {
                    console.log(data1);
                    /* Destruccion de tabla para ser recreada */
                    $('#products_listing').dataTable().fnDestroy(),
                        /* Creacion de tabla */
                        $('#products_listing').dataTable({
                            data: data1.data,
                            columns: [{
                                    "data": "id"
                                },
                                {
                                    "data": "name"
                                },
                                {
                                    "data": "sell_price"
                                },
                                {
                                    "data": "stock"
                                },
                                {
                                    "data": "btn"
                                }
                            ],
                        });
                }
            });
            return false;
        });
    });

</script>

@endsection
