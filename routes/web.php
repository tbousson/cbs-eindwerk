<?php

use Illuminate\Http\Request;
use app\User;
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



Auth::routes();

Route::get('/', 'Front@index')->name('home');
Route::get('/shop', 'Front@shop')->name('shop');
Route::get('/comics', 'Front@comics')->name('comics');
Route::get('/comic/{id}','Front@comic')->name('comic');
Route::get('/author/{id}','Front@author')->name('author');
Route::get('/serie/{id}','Front@serie')->name('serie');
Route::get('/publisher/{id}','Front@publisher')->name('publisher');
Route::get('/genre/{id}','Front@genre')->name('genre');
Route::get('/contact', 'Front@contact')->name('contact');
Route::get('/about', 'Front@about')->name('about');



// Payment system



Auth::routes();
//  Route::get('/admin','AdminController@index')->name('admin');
 
// Route::group(['middleware'=>'auth','prefix' => 'admin'],function(){
//     Route::group(['middleware'=>'isAdmin'], function(){
//             Route::resource('users','AdminUserController');
//             Route::resource('authors','AuthorController');
//             Route::resource('series','SerieController');
//             Route::resource('comics','ComicController');
//             Route::resource('genres','GenreController');
//             Route::resource('publishers','PublisherController');
//             Route::resource('roles','RoleController');
//     });
// });

Route::group(['middleware'=>'auth'],function(){
    Route::get('/profile/{id}', 'Front@profile')->name('profile');
    Route::get('/cart', 'Front@cart')->name('cart');
Route::post('/cart','Front@cart');
Route::get('/clear-cart', 'Front@clear_cart')->name('clear_cart');
Route::post('/checkout', function(Request $request){
    $user = Auth::user();
    
    $gateway = new Braintree\Gateway([
        'environment' => config('services.braintree.environment'),
        'merchantId' => config('services.braintree.merchantId'),
        'publicKey' => config('services.braintree.publicKey'),
        'privateKey' => config('services.braintree.privateKey')
    ]);
    $amount = $request->amount;
    $nonce = $request->payment_method_nonce;
    /***betaling transactie zelf**/
    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
        ],
    ]);
    /** gegevens van de klant bewaren in de vault van braintree***/
    $result2 = $gateway->customer()->create([
        'firstName' => $user->name,
        'email' =>$user->email,
        'phone' => $user->phone,
    ]);// keuze ofwel naar braintree ofwel naar tabel in database
    if ($result->success) {
        $transaction = $result->transaction;
        $cart = Cart::content();
        $mytransaction = 'Gelukt, ' . $transaction->id;
        
        return view('completed', compact('mytransaction','cart'));
    } else {
        $errorString = "";
        foreach($result->errors->deepAll() as $error) {
            $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
        }
        //$_SESSION["errors"] = $errorString;
        //header("Location: " . $baseUrl . "index.php");
        return back()->with('error','An error occurred with the message: '.$result->message);
    }
});
Route::get('/completed', 'OrderController@index')->name('completed');
});


//admin version 2
Route::get('/admin/v2','v2\AdminController@index')->name('admin');
Route::group(['middleware'=>'auth','prefix' => 'admin/v2','namespace' => 'v2'],function(){
    Route::group(['middleware'=>'isAdmin'], function(){
            Route::resource('users','AdminUserController');
            Route::resource('authors','AuthorController');
            Route::patch('series','SerieController@restore')->name('series.restore');
            Route::resource('series','SerieController');
            
            Route::resource('comics','ComicController');
            Route::resource('genres','GenreController');
            Route::resource('publishers','PublisherController');
            Route::resource('roles','RoleController');

    });
});

