@extends('web.my_account')
@section('content_tab')
<div class="col-lg- col-md-8">
    {{-- <div class="tab-content" id="myaccountContent"> --}}
    <div class="myaccount-content">
        <h3>Billing Address</h3>
        <address>
            <p><strong>Alex Tuntuni</strong></p>
            <p>1355 Market St, Suite 900 <br>
                San Francisco, CA 94103</p>
            <p>Mobile: (123) 456-7890</p>
        </address>
        <a href="#" class="check-btn sqr-btn " data-toggle="modal" data-target="#modal-default"><i
                class="fa fa-edit"></i> Editar Dirección</a>
    </div>
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h4 class="modal-title">Editar Dirección</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="single-input-item">
                        <label for="email" class="required">Dirección de envío</label>
                        <input type="text" id="address" placeholder="Dirección de envío" />
                    </div>
                    <div class="single-input-item">
                        <label for="email" class="required">Número de teléfono/celular</label>
                        <input type="number" id="phone" placeholder="Número de teléfono/celular" />
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="check-btn sqr-btn">Guardar cambios</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>

</div>
@endsection
