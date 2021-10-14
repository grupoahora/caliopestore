@extends('web.my_account')
@section('content_tab')
<div class="col-lg- col-md-8">
    {{-- <div class="tab-content" id="myaccountContent"> --}}

    {{-- <div class="tab-pane fade" id="users" role="tabpanel"> --}}

    <!-- Single Tab Content Start -->
    {{-- <div class="tab-pane fade" id="address-edit" role="tabpanel">
        <div class="myaccount-content">
            <h3>Billing Address</h3>
            <address>
                <p><strong>Alex Tuntuni</strong></p>
                <p>1355 Market St, Suite 900 <br>
                    San Francisco, CA 94103</p>
                <p>Mobile: (123) 456-7890</p>
            </address>
            <a href="#" class="check-btn sqr-btn "><i class="fa fa-edit"></i> Edit
                Address</a>
        </div>
    </div> --}}
    <!-- Single Tab Content End -->

    <!-- Single Tab Content Start -->
    <div class="myaccount-content">
        <h3>Account Details</h3>
        <div class="account-details-form">
            <form action="#">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="first-name" class="required">Nombre</label>
                            <input type="text" id="name" placeholder="Nombre" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="last-name" class="required">Apellido</label>
                            <input type="text" id="surname" placeholder="Apellido" />
                        </div>
                    </div>
                </div>
                <div class="single-input-item">
                    <label for="email" class="required">Correo Electrónico</label>
                    <input type="email" id="email" placeholder="Correo Electrónico" />
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="new-pwd" class="required">Número de Identificación</label>
                            <input type="number" id="new-pwd" placeholder="Número de Identificación" />
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="single-input-item">
                            <label for="confirm-pwd" class="required">Número de RUC</label>
                            <input type="number" id="confirm-pwd" placeholder="Número de RUC" />
                        </div>
                    </div>
                </div>
                <fieldset>
                    <legend>Cambio de contraseña</legend>
                    <div class="single-input-item">
                        <label for="current-pwd" class="required">Contraseña Actual</label>
                        <input type="password" id="current-pwd" placeholder="Contraseña Actual" />
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="new-pwd" class="required">Nueva Contraseña</label>
                                <input type="password" id="new-pwd" placeholder="Nueva Contraseña" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="single-input-item">
                                <label for="confirm-pwd" class="required">Confirmar Contraseña</label>
                                <input type="password" id="confirm-pwd" placeholder="Confirmar Contraseña" />
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="single-input-item">
                    <button class="check-btn sqr-btn ">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

    {{-- </div> --}}
    {{-- </div> --}}
</div>
@endsection
