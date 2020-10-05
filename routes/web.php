<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/ajax-load/login', function () {
    return view('login-form');
});

Route::get('register', 'Auth\RegisterController@showRegistrationForm');


Route::get('/hebergement', 'FrontController@hebergement')->name('hebergement');
Route::get('/resultat_domain', 'FrontController@resultatDomain')->name('resultat_domain');
Route::get('/tarifs', 'FrontController@tarifs')->name('tarifs');
Route::get('/welcome', 'FrontController@index')->name('welcome');
Route::get('/enregistrement', 'FrontController@enregistrement')->name('enregistrement');
Route::get('/websms', 'FrontController@websms')->name('websms');
Route::get('/choix_formule', 'FrontController@choix_formule')->name('choix_formule');
Route::get('/recap_formule', 'FrontController@recap_formule')->name('recap_formule');
Route::get('/enregistrementbyextension', 'FrontController@enregistrementByExtension')->name('enregistrementbyextension');
Route::get('/resultatdomain_for_extension', 'FrontController@resultatDomainExtension')->name('resultat_domain_for_extension');

Route::middleware('auth')->post('/paiement', 'FrontController@paiement')->name('paiement');

Auth::routes();

Route::get('/paiement/back', 'FrontController@postNotifyPayment')->name('back_paiement');


Route::middleware('auth')->group(function () {
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/home', 'FrontController@index')->name('home');
Route::get('/mydashboard', 'DashboardController@index')->name('dashboard');
Route::post('/paiement/notify', 'FrontController@notifCinetPay')->name('notify_paiement');
Route::get('/paiement/cancel', 'FrontController@cancelPayment')->name('cancel_paiement');

Route::get('/dns', 'FrontController@dns')->name('dns');
Route::prefix('dashboard')->group(function () {
    Route::get('/index','DashboardController@index')->name('dashboard.index');
    Route::resource('domains', 'DomainController');

    Route::resource('domains_transferts', 'DomainTransfertController');
    Route::post('/domain_state', 'DomainController@updateState')->name('domain.updatestate');
    Route::resource('users', 'UserController')->middleware('auth');
    Route::resource('payments', 'PaymentController')->only(
        [
            'index', 'show'
        ]
    );
    Route::get('/demande/type/{type?}','DemandeController@index')->name('demande.index');
    Route::get('/demande/edit/{id}','DemandeController@edit')->name('demande.edit');
    Route::post('/demande/update','DemandeController@update')->name('demande.update');
    Route::get('/demande/new','DemandeController@new')->name('demande.new');
    Route::post('/demande/create','DemandeController@create')->name('demande.create');

});


Route::prefix('admin')->group(function () {
    Route::get('/','AdminController@login')->name('admin.login');
});
});
