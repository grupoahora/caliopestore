@extends('layouts.admin')
@section('title', 'Panel administrador')
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
                Panel administrador
            </h3>
        </div>

        
            <div class="row">
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Compras</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                            @foreach ($totalcompra as $totalcompra)
                                                <h2 class="mb-0">${{ $totalcompra->total }}</h2>
                                            @endforeach
                                            <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                                <i class="far fa-clock text-muted"></i>
                                                <small class=" ml-1 mb-0">Updated: 9:10am</small>
                                            </div>
                                        </div>
                                        <small class="text-gray">Raised from 89 orders.</small>
                                        
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-chart-pie text-info icon-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-0">Ventas</h4>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-inline-block pt-3">
                                    <div class="d-md-flex">
                                        @foreach ($totalventa as $totalventa)
                                            <h2 class="mb-0">${{ $totalventa->total }}</h2>
                                        @endforeach
                                        <div class="d-flex align-items-center ml-md-2 mt-2 mt-md-0">
                                            <i class="far fa-clock text-muted"></i>
                                            <small class="ml-1 mb-0">Updated: 05:42pm</small>
                                        </div>
                                    </div>
                                    <small class="text-gray">hey, let’s have lunch together</small>
                                </div>
                                <div class="d-inline-block">
                                    <i class="fas fa-shopping-cart text-danger icon-lg"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        
        <div class="row">

            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fas fa-gift"></i>
                            Ventas diarias
                        </h4>
                        <canvas id="ventas_diarias" {{-- height="100%" --}}></canvas>
                        <div id="orders-chart-legend" class="orders-chart-legend"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fas fa-chart-line"></i>
                            Ventas - Meses
                        </h4>
                        
                        <canvas id="ventas"></canvas>
                        <div id="orders-chart-legend" class="orders-chart-legend"></div>
                    </div>
                </div>
            </div>
        </div>
            

        <div class="row">
            
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body d-flex flex-column">
                  <h4 class="card-title">
                    <i class="fas fa-chart-pie"></i>
                    Estado de Pedidos
                  </h4>
                  <div class="flex-grow-1 d-flex flex-column justify-content-between">
                    <canvas id="sales-status-chart" class="mt-3"></canvas>
                    <div class="pt-4">
                      <div id="sales-status-chart-legend" class="sales-status-chart-legend"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fas fa-chart-line"></i>
                            Compras - Meses
                        </h4>

                        <canvas id="compras"></canvas>
                        <div id="orders-chart-legend" class="orders-chart-legend"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fas fa-chart-line"></i>
                            Ventas - Productos
                        </h4>

                        <canvas id="compras_productos"></canvas>
                        <div id="orders-products-chart-legend" class="orders-chart-legend"></div>
                    </div>
                </div>
            </div>
            

        </div>

        <div class="row">
            <div class="col-12 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">
                            <i class="fas fa-envelope"></i>
                            Productos más vendidos
                        </h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th>Nombre</th>
                                        <th>Código</th>
                                        <th>Stock</th>
                                        <th>Cantidad vendida</th>
                                        <th>Ver detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productosvendidos as $product)
                                        <tr>
                                            <td>{{ $product->product->id }}</td>
                                            <td>{{ $product->product->name }}</td>
                                            <td>{{ $product->product->code }}</td>
                                            <td><strong>{{ $product->product->stock }}</strong> Unidades</td>
                                            <td><strong>{{ $product->total }}</strong> Unidades</td>
                                            <td>
                                                <a class="btn btn-primary"
                                                    href="{{ route('products.ver', $product->product->id) }}">
                                                    <i class="far fa-eye"></i>
                                                    Ver detalles
                                                </a>
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
@endsection
@section('scripts')
    {!! Html::script('melody/js/data-table.js') !!}
    {!! Html::script('melody/js/chart.js') !!}
    <script>
        $(function(){
           if ($("#sales-status-chart").length) {
                var pieChartCanvas = $("#sales-status-chart").get(0).getContext("2d");
                var pieChart = new Chart(pieChartCanvas, {
                    type: 'pie',
                    data: 
                    {
                        /* labels: 
                            [
                                <?php foreach ($order_mes as $reg) {
                                     echo '' . $reg->status . ',';
                                } ?>
                            ], */
                        datasets: 
                            [
                                {
                                    label: 'Compras',
                                    data: 
                                        [
                                            <?php foreach ($order_mes as $reg) {
                                                echo '' . $reg->count . ',';
                                            }?>
                                        ],
                                    backgroundColor: [
                                        '#392c70',
                                        '#04b76b',
                                        '#ff5e6d',
                                        '#eeeeee'
                                        ],
                                        borderColor: [
                                        '#392c70',
                                        '#04b76b',
                                        '#ff5e6d',
                                        '#eeeeee'
                                        ],
                                }
                            ],
                            labels: [
                                'PENDIENTE',
                                'APROBADO',
                                'CANCELADO',
                                'ENTREGADO'
                            ]
                    },
                    options: {
                    responsive: true,
                    animation: {
                        animateScale: true,
                        animateRotate: true
                    },
                    legend: {
                        display: false
                    },
                    legendCallback: function(chart) { 
                        var text = [];
                        text.push('<ul class="legend'+ chart.id +'">');
                        for (var i = 0; i < chart.data.datasets[0].data.length; i++) {
                        text.push('<li><span class="legend-label" style="background-color:' + chart.data.datasets[0].backgroundColor[i] + '"></span>');
                        if (chart.data.labels[i]) {
                            text.push(chart.data.labels[i]);
                        }
                        text.push('<label class="badge badge-light badge-pill legend-percentage ml-auto">'+ chart.data.datasets[0].data[i] + ' Pedidos</label>');
                        text.push('</li>');
                        }
                        text.push('</ul>');
                        return text.join("");
                    }
                    }
                });
                document.getElementById('sales-status-chart-legend').innerHTML = pieChart.generateLegend();
            }
        });
                
    </script>
    <script>
        $(function() {
            var varCompraproduct = document.getElementById('compras_productos').getContext('2d');
            var charCompraproduct = new Chart(varCompraproduct, {
                type: 'bar',
                data: 
                    {
                        labels: 
                            [
                                <?php foreach ($sale_products as $reg) {
                                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                                    $mes_traducido = $reg->name;
                                    echo '"' . $mes_traducido . '",';
                                } ?>
                            ],
                        datasets: 
                            [
                                {
                                    label: 'Compras',
                                    data: 
                                        [
                                            <?php foreach ($sale_products as $reg) {
                                                echo '' . $reg->sale_count . ',';
                                            }?>
                                        ],
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 3,
                                }
                            ],
                    },
                options: 
                    {
                        scales: 
                            {
                                yAxes: 
                                    [
                                        {
                                            ticks: 
                                                {
                                                    beginAtZero: true
                                                }
                                        }
                                    ]
                            }
                    },
            });
            
            var varCompra = document.getElementById('compras').getContext('2d');
            var charCompra = new Chart(varCompra, {
                type: 'line',
                data: 
                    {
                        labels: 
                            [
                                <?php foreach ($comprasmes as $reg) {
                                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                                    $mes_traducido = strftime('%B', strtotime($reg->mes));
                                    echo '"' . $mes_traducido . '",';
                                } ?>
                            ],
                        datasets: 
                            [
                                {
                                    label: 'Compras',
                                    data: 
                                        [
                                            <?php foreach ($comprasmes as $reg) {
                                                echo '' . $reg->totalmes . ',';
                                            }?>
                                        ],
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 3,
                                }
                            ],
                    },
                options: 
                    {
                        scales: 
                            {
                                yAxes: 
                                    [
                                        {
                                            ticks: 
                                                {
                                                    beginAtZero: true
                                                }
                                        }
                                    ]
                            }
                    },
            });
            var varVenta = document.getElementById('ventas').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'line',
                data: 
                    {
                        labels: 
                            [
                                <?php foreach ($ventasmes as $reg) {
                                    setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                                    $mes_traducido = strftime('%B', strtotime($reg->mes));
                                    echo '"' . $mes_traducido . '",';
                                } ?>
                            ],
                        datasets: 
                            [
                                {
                                    label: 'Ventas',
                                    data: 
                                        [
                                            <?php foreach ($ventasmes as $reg) {
                                                echo '' . $reg->totalmes . ',';
                                            } ?>
                                        ],
                                    borderColor: 'rgba(255, 99, 132, 1)',
                                    borderWidth: 1,
                                }
                            ],
                    },
                options: 
                    {
                        scales: 
                        {
                            yAxes: 
                            [{
                                ticks: 
                                {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
            });
            var varVenta = document.getElementById('ventas_diarias').getContext('2d');
            var charVenta = new Chart(varVenta, {
                type: 'line',
                data: 
                    {
                        labels: 
                            [
                                <?php foreach ($ventasdia as $ventadia) {
                                setlocale(LC_TIME, 'es_ES', 'Spanish_Spain', 'Spanish');
                                $dia = strftime('%d de %B del %Y', strtotime($ventadia->date));
                                echo '"' . $dia . '",';
                                } ?>
                            ],
                        datasets: 
                            [{
                                label: 'Ventas',
                                data: 
                                [
                                    <?php foreach ($ventasdia as $reg) {
                                        echo '' . $reg->count . ',';
                                    } ?>
                                ],
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1,
                            }]
                    },
                options: 
                    {
                        scales: 
                        {
                            yAxes: 
                            [{
                                ticks: 
                                {
                                    stepSize: 0.5,
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            });
    </script>

@endsection
