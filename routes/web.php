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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');
});

Route::get('/crearsitio', function(){
    $client = new \GuzzleHttp\Client();

    $response = $client->request('GET', 'https://api.duda.co/api/sites/multiscreen/templates', [
    'headers' => [
        'Accept' => 'application/json',
        'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
    ],
    ]);

    $templates = json_decode($response->getBody());
    return view('templates',compact('templates'));
})->name('crearsitio');

Route::get('/crear/{template_id}/{correo}',function($template_id, $correo){

    $client = new \GuzzleHttp\Client();

    $response = $client->request('POST', 'https://api.duda.co/api/sites/multiscreen/create', [
        'body' => '{"template_id":'.$template_id.',"lang":"es"} ',
        'headers' => [
        'Accept' => 'application/json',
        'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
        'Content-Type' => 'application/json',
    ],
    ]);

    $site_name = json_decode($response->getBody()->getContents());

    //header("Location: ".$site_url);
    //die();

    $client2 = new \GuzzleHttp\Client();


    $response2 = $client2->request('POST', 'https://api.duda.co/api/accounts/create', [
    'body' => '{"account_type":"CUSTOMER","account_name":"'.$correo.'"}',
    'headers' => [
        'Accept' => 'application/json',
        'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
        'Content-Type' => 'application/json',
    ],
    ]);

    echo $response2->getBody();


    $client3 = new \GuzzleHttp\Client();

    $response3 = $client3->request('POST', 'https://api.duda.co/api/accounts/'.$correo.'/sites/'. $site_name->site_name.'/permissions', [
        'body' => '{"permissions":["EDIT","E_COMMERCE","DEV_MODE","BACKUPS","BLOG","PUSH_NOTIFICATIONS"]}',
        'headers' => [
        'Accept' => 'application/json',
        'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
        'Content-Type' => 'application/json',
    ],
    ]);

    $client4 = new \GuzzleHttp\Client();

    $response3 = $client4->request('GET', 'https://api.duda.co/api/accounts/sso/'.$correo.'/link?site_name='.$site_name->site_name.'&target=EDITOR', [
        'headers' => [
          'Accept' => 'application/json',
          'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
        ],
      ]);
    
    $site_name = json_decode($response3->getBody()->getContents());
    //$site_url = $response->url;
    $site_url = $site_name->url;

    header("Location: ".$site_url);
    die();
});