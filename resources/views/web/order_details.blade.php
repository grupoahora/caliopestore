@extends('web.my_account')
@section('content_tab')
<div class="col-lg- col-md-8">
    {{-- <div class="tab-content" id="myaccountContent"> --}}
        
        {{-- <div class="tab-pane fade" id="orders" role="tabpanel"> --}}
            <div class="myaccount-content">
                <h3>Detalles de pedido</h3>
                <div class="myaccount-table {{-- table-responsive --}} text-center">
                    <table id="saleDetails" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Producto</th>
                                <th>Precio Venta (PEN)</th>
                                <th>Cantidad</th>
                                <th>SubTotal(PEN)</th>
                            </tr>
                        </thead>
                        <tfoot>

                            <tr>
                                <th colspan="3">
                                    <p align="right">SUBTOTAL:</p>
                                </th>
                                <th>
                                    <p align="right">${{$order->subtotal()}}</p>
                                </th>
                            </tr>

                            {{-- <tr>
                                <th colspan="4">
                                    <p align="right">TOTAL IMPUESTO ({{$order->tax}}%):</p>
                                </th>
                                <th>
                                    <p align="right">${{number_format($order->totaltax(),2)}}</p>
                                </th>
                            </tr> --}}
                            <tr>
                                <th colspan="3">
                                    <p align="right">TOTAL:</p>
                                </th>
                                <th>
                                    <p align="right">${{number_format($order->subtotal(),2)}}</p>
                                </th>
                            </tr>

                        </tfoot>
                        <tbody>
                            @foreach($order->order_details as $detail)
                            <tr>
                                <td>{{$detail->product->name}}</td>
                                <td>${{$detail->price}}</td>
                                <td>{{$detail->quantity}}</td>
                                <td>${{number_format($detail->total(),2)}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
</div>
@endsection
