<?php

namespace App\Http\Controllers;

use App\Order;
use App\Sale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        /* $this->middleware([
            'permission:home',
        ]); */
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comprasmes=DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes from purchases c where c.status="VALID" group by monthname(c.purchase_date) order by month(c.purchase_date) asc limit 12');
        $ventasmes=DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes from sales v where v.status="VALID" group by monthname(v.sale_date) order by month(v.sale_date) asc limit 12');
        /* $ventasdia=DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") as dia, count(*) as totaldia from sales v where v.status="VALID" group by v.sale_date order by day(v.sale_date) asc limit 15'); */
        $ventasdia = Sale::orderBy('sale_date', 'ASC')->where('status', 'VALID')->select(
            DB::raw("count(*) as count"),
            DB::raw("SUM(total) as total"),
            DB::raw("DATE_FORMAT(sale_date, '%D %M %Y') as date")
            )->groupBy('date')->take(30)->get();
        
            $order_mes = Order::select(
                DB::raw("count(*) as count"),
                DB::raw("shipping_status as status"),
                )->groupBy('status')->take(30)->get();
                
               /*  dd($order_mes); */
        $totales=DB::select('SELECT (select ifnull(sum(c.total),0) from purchases c where c.status="VALID") as totalcompra, (select ifnull(sum(v.total),0) from sales v where v.status="VALID") as totalventa');
        $productosvendidos=DB::select('SELECT p.code as code, 
        sum(dv.quantity) as quantity, p.name as name , p.id as id , p.stock as stock from products p 
        inner join sale_details dv on p.id=dv.product_id 
        inner join sales v on dv.sale_id=v.id where v.status="VALID" 
        and year(v.sale_date)=year(curdate()) 
        group by p.code ,p.name, p.id , p.stock order by sum(dv.quantity) desc limit 10');
       
       
        return view('home', compact( 'comprasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos', 'order_mes'));
    }
}
