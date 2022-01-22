<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\WebController;
use App\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//==================== envio de correos ===================
Route::resource('contact_mail', 'MailController')->names('contact.mail');

Route::get('/compra', 'WebController@wishlist')->name('web.wishlist');
Route::get('/nosotros', 'WebController@about_us')->name('web.about_us');
Route::get('/pagar', 'MyAccountController@checkout')->name('web.checkout');
Route::get('/blog_details', 'WebController@blog_details')->name('web.blog_details');
Route::get('/blog', 'WebController@blog')->name('web.blog');
Route::get('/carrito', 'WebController@cart')->name('web.cart');
Route::get('/contacto', 'WebController@contact_us')->name('web.contact_us');
Route::get('/registro', 'WebController@login_register')->name('web.login_register');
Route::get('/productos', 'WebController@shop_grid')->name('web.shop_grid');
Route::get('/detalles', 'WebController@product_details')->name('web.product_details');
Route::get('/micuenta', 'MyAccountController@my_account')->name('web.my_account');
Route::get('/mis_ordenes', 'MyAccountController@orders')->name('web.orders');
Route::get('/mis_ordenes/pedido/{order}', 'MyAccountController@order_details')->name('web.order_details');
Route::get('/detalles_de_la_cuenta', 'MyAccountController@account_info')->name('web.account_info');
Route::get('/editar_direccion', 'MyAccountController@address_edit')->name('web.address_edit');
Route::get('/cambiar_contrasena', 'MyAccountController@change_password')->name('web.change_password');
Route::put('/update_client/{user}/update', 'UserController@update_client')->name('web.update_client');
Route::put('/update_profile/{profile}/update', 'ProfileController@update')->name('update_profile');
Route::put('/update_password/{user}/update', 'UserController@update_password')->name('web.update_password');
Route::get('/', 'WebController@welcome')->name('web.welcome');
//=====================================rutas del cliente =============================================//
Route::post('/payments/pay', 'PaymentController@pay')->name('pay');
Route::get('/payments/approval', 'PaymentController@approval')->name('approval');
Route::get('/payments/cancelled', 'PaymentController@cancelled')->name('cancelled');
Route::get('product/{product}', 'WebController@product_details')->name('web.product_details');
Route::get('subcategoria/{subcategory}', 'WebController@subcategory_details')->name('web.subcategory_details');
Route::resource('shopping_cart_detail', 'ShoppingCartDetailController')->only([ 'update'])->names('shopping_cart_details');
Route::get('shopping_cart_detail/{shopping_cart_detail}/destroy', 'ShoppingCartDetailController@destroy')->name('shopping_cart_details.destroy');
Route::post('add_to_shopping_cart/{product}/store', 'ShoppingCartDetailController@store')->name('shopping_cart_details.store');
Route::get('add_a_product_to_the_shopping_cart/{product}/store', 'ShoppingCartDetailController@store_a_product')->name('store_a_product');
Route::get('mi_carrito_de_compras', 'WebController@cart')->name('web.cart');
Route::put('shopping_cart', 'ShoppingCartController@update')->name('shopping_cart.update');
//=====================================rutas del productos =============================================//
Route::get('products/json', 'WebController@products')->name('products.json');
Route::get('verproducto/{product}', 'WebController@products_ver')->name('products.ver');
Route::get('products/resultado/', 'WebShopController@search_products')->name('web.search_products');

Route::get('products/subcategory/resultado/', 'WebShopController@search_subcategories_by_category')->name('web.search_subcategories_by_category');
Route::get('products/category/resultado/', 'WebShopController@search_products_by_category')->name('web.search_products_by_category');
Route::get('products/subcategory/resultado/', 'WebShopController@search_products_by_subcategory')->name('web.search_products_by_subcategory');
Route::get('products/tag/resultado/', 'WebShopController@search_products_by_tag')->name('web.search_products_by_tag');
Route::post('subscription_email', 'WebShopController@subscription_email')->name('web.subscription_email');
Route::post('rate_product/{product}', 'WebShopController@rate_product')->name('web.rate_product');
//=====================================fin  =============================================//

Route::get('sales/reports_day', 'ReportController@reports_day')->name('reports.day');
Route::get('sales/reports_date', 'ReportController@reports_date')->name('reports.date');

Route::post('sales/report_results', 'ReportController@report_results')->name('report.results');

Route::resource('business', 'BusinessController')->names('business')->only([
    'index', 'update'
]);
Route::resource('printers', 'PrinterController')->names('printers')->only([
    'index', 'update'
]);

Route::resource('categories', 'CategoryController')->names('categories');
Route::resource('clients', 'ClientController')->names('clients');
Route::resource('products', 'ProductController')->names('products');
Route::resource('tags', 'TagController')->names('tags');
Route::resource('colors', 'ColorController')->names('colors');
Route::resource('sizes', 'SizeController')->names('sizes');
Route::resource('images', 'ImageController')->names('images');

/* Route::post('upload/product/{id}/image', 'ProductController@upload_image')->name('upload.product.image'); */
Route::post('upload_image/{id}', 'ProductController@upload_image')->name('upload.image');
Route::post('upload_texture/{id}', 'ProductController@upload_texture')->name('upload.texture');
Route::post('/upload/category/{id}/image', 'CategoryController@upload_image')->name('upload.category.image');
Route::post('/upload/subcategory/{id}/image', 'SubcategoryController@upload_image')->name('upload.color.image');
Route::post('file_delete', 'ProductController@file_delete')->name('file.delete');
Route::post('file_delete_texture', 'ProductController@file_delete_texture')->name('file.delete.texture');

Route::resource('providers', 'ProviderController')->names('providers');
Route::resource('purchases', 'PurchaseController')->names('purchases')->except([
    'edit', 'update', 'destroy'
]);
Route::resource('sales', 'SaleController')->names('sales')->except([
    'edit', 'update', 'destroy'
]);
Route::get('purchases/pdf/{purchase}', 'PurchaseController@pdf')->name('purchases.pdf');
Route::get('sales/pdf/{sale}', 'SaleController@pdf')->name('sales.pdf');
Route::get('sales/print/{sale}', 'SaleController@print')->name('sales.print');

Route::get('purchases/upload/{purchase}', 'PurchaseController@upload')->name('upload.purchases');

Route::get('change_status/products/{product}', 'ProductController@change_status')->name('change.status.products');
Route::get('change_status/purchases/{purchase}', 'PurchaseController@change_status')->name('change.status.purchases');
Route::get('change_status/sales/{sale}', 'SaleController@change_status')->name('change.status.sales');

Route::resource('users', 'UserController')->names('users');

Route::resource('roles', 'RoleController')->names('roles');

Route::get('get_products_by_barcode', 'ProductController@get_products_by_barcode')->name('get_products_by_barcode');

Route::get('get_products_by_id', 'ProductController@get_products_by_id')->name('get_products_by_id');

Route::get('print_barcode', 'ProductController@print_barcode')->name('print_barcode');

Route::get('/prueba', function () {
    return view('prueba');
});
Route::get('get_subcategories','AjaxController@get_subcategories')->name('get_subcategories');
Route::get('get_compras', 'AjaxController@get_compras')->name('get.compras');
Route::get('get_products_by_subcategory', 'AjaxController@get_products_by_subcategory')->name('get_products_by_subcategory');
Route::get('get_product_by_product', 'AjaxController@get_product_by_product')->name('get_product_by_product');

// rutas para las subcategorias
Route::resource('subcategories', 'SubcategoryController')->names('subcategories');


Route::get('/barcode', function () {
    $products = Product::get();
    return view('admin.product.barcode', compact('products'));
});

Auth::routes();
/* Auth::routes(['register' => false]); */
Route::get('/home', 'HomeController@index')->name('home');

/*Ruta para las Órdenes*/ 

Route::resource('orders', 'OrderController')->names('orders')->only(['index', 'show']);
Route::put('orders_update/{id}', 'OrderController@orders_update')->name('orders_update');
Route::put('products_update/{id}', 'WebController@products_update')->name('products_update');