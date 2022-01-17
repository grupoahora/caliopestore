<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use App\Purchase;
use App\Sale;
use App\saleDetail;
use Illuminate\Database\Eloquent\Builder;
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
    public function index(Product $product)
    {
        /* $comprasmes=DB::select('SELECT monthname(c.purchase_date) as mes, sum(c.total) as totalmes 
        from purchases c where c.status="VALID" group by monthname(c.purchase_date) 
        order by month(c.purchase_date) asc limit 12'); */
        /* dd($comprasmes); */
        $comprasmes = Purchase::orderBy('purchase_date', 'ASC')->where('status', 'VALID')->select(
            
            DB::raw("SUM(total) as totalmes"),
            DB::raw("DATE_FORMAT(purchase_date, '%M') as mes")
            )->groupBy('mes')->take(12)->get();
        /* dd($comprasmes); */
        

        /* $ventasmes=DB::select('SELECT monthname(v.sale_date) as mes, sum(v.total) as totalmes 
        from sales v where v.status="VALID" group by monthname(v.sale_date) 
        order by month(v.sale_date) asc limit 12'); */

        $ventasmes = Sale::orderBy('sale_date', 'ASC')->where('status', 'VALID')->select(

            DB::raw("SUM(total) as totalmes"),
            DB::raw("DATE_FORMAT(sale_date, '%M') as mes")
        )->groupBy('mes')->take(12)->get();
        

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
        
        $sale_products = Product::withCount(['saleDetails as sale_count' => function ($query) {
            $query->select(DB::raw('sum((quantity))'));
            /* $query->select(DB::raw("product_id as product")); */
        }])->orderByDesc('sale_count')->take(12)->get();
        /* dd($sale_products); */
        /*  dd($order_mes); */
        /* $totales = DB::select('SELECT (select ifnull(sum(c.total),0) from purchases c 
        where c.status="VALID") as totalcompra, (select ifnull(sum(v.total),0) from sales v 
        where v.status="VALID") as totalventa'); */
        $totalventa = Sale::where('status', 'VALID')->select(
            DB::raw("SUM(total) as total")
        )->get();
        /* dd($totalventa); */
        $totalcompra = Purchase::where('status', 'VALID')->select(
            DB::raw("SUM(total) as total")
        )->get();

       
        $productosvendidos = saleDetail::select(DB::raw('SUM(quantity) as total, product_id'))
              ->groupBy('product_id')
              ->get();
        
        

       
       
        return view('home', compact( 'comprasmes', 'ventasmes', 
        'ventasdia', 'totalventa', 'totalcompra', 'order_mes', 
        'sale_products','productosvendidos'))/* ->with('productosvendidos', json_encode($productosvendidos, JSON_NUMERIC_CHECK)) */;
    }
}
