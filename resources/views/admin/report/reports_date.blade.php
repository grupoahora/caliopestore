@extends('layouts.admin')
@section('title','Reporte por rango de fecha')
@section('styles')

<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
    }

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
            Reporte por rango de fecha
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reporte por rango de fecha</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    

                    {!! Form::open(['route'=>'report.results', 'method'=>'POST']) !!}

                    <div class="row ">
                        
                        <div class="col-12 col-md-3">
                            <span class="card-description">Fecha de inicio</span>
                            <div id="datepicker1" class="input-group date datepicker">
                                <input class="form-control" type="text" 
                                    value="{{old('fecha_ini')}}" 
                                    name="fecha_ini" id="fecha_ini" >
                                    <span class="input-group-addon input-group-append border-left">
                                        <span class="far fa-calendar input-group-text"></span>
                                    </span>
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <span class="card-description">Fecha de final</span>
                            <div id="datepicker2" class="input-group date datepicker">
                                <input class="form-control" type="text" 
                                value="{{old('fecha_fin')}}"
                                name="fecha_fin" id="fecha_fin" data-date="">
                                    <span class="input-group-addon input-group-append border-left">
                                        <span class="far fa-calendar input-group-text"></span>
                                    </span>
                            </div>
                        </div>
                        
                        <div class="col-12 col-md-3 text-center mt-4">
                            <div class="form-group">
                               <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                            </div>
                        </div>
                         
                        <div class="col-12 col-md-3 text-center my-auto">
                            <span>Total de ingresos: <b> </b></span>
                            <div class="form-group">
                                <strong>COP {{$total}}</strong>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                    
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Estado</th>
                                    <th style="width:50px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sales as $sale)
                                <tr>
                                    <th scope="row">
                                        <a href="{{route('sales.show', $sale)}}">{{$sale->id}}</a>
                                    </th>
                                    <td>
                                        {{\Carbon\Carbon::parse($sale->sale_date)->format('d M y h:i a')}}
                                    </td>
                                    <td>COP {{$sale->total}}</td>
                                    <td>{{$sale->status}}</td>
                                    <td style="width: 50px;">

                                        <a href="{{route('sales.pdf', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                        <a href="{{route('sales.print', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>
                                        <a href="{{route('sales.show', $sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                   
                                      
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$sales->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/jCOPdata-table.js') !!}

<script>

    var fecha_ini = $('#fecha_ini').value;
    $(function(){
        $('#datepicker1').datepicker({
    format: 'yyyy/mm/dd',
    startDate: fecha_ini,
    disabledDays: [],
});
      
      $('#datepicker2').datepicker({
    format: 'yyyy/mm/dd',
    startDate: fecha_ini,
    disabledDays: [],
});
    });
</script>
<script>
    window.onload = function(){
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
          dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
          mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('fecha_fin').value=ano+"/"+mes+"/"+dia;
        document.getElementById('fecha_ini').value=ano+"/01/01";

      }
    var fechafin = $('#datepicker2');
    fechafin.click(function(){
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
          dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
          mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('fecha_fin').value=ano+"-"+mes+"-"+dia;
    });
    /*  */
</script>

@endsection
