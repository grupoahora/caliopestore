<?php
if (!function_exists('active_class')) {
        function active_class($url)
    {
        $current_url = url()->current();
        if ($url == $current_url) {
            return 'active';
        }
    }
}
function get_product_statuses()
{
    $a = [
        0=>[
            'code' => 'DRAFT',
            'name' => 'Borrador',
        ],
        1 => [
            'code' => 'SHOP',
            'name' => 'Tienda',
        ],
        2 => [
            'code' => 'POS',
            'name' => 'Punto de Venta',
        ],
        3 => [
            'code' => 'BOTH',
            'name' => 'Ambos',
        ],
        4 => [
            'code' => 'DISABLED',
            'name' => 'Desactivado',
        ],
    ];
    return $a;
}