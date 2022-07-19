<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DudaController;



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('home');
});

Route::get('/crearsitio', [DudaController::class,'show'])->name('crearsitio');

// Route::get('/crears/{template_id}', [DudaController::class,'crear'])->name('crears');


Route::get('/crears/{template_id}/{correo}',function($template_id, $correo){

    $client = new \GuzzleHttp\Client();
    
    // $response = $client->request('POST', 'https://api.duda.co/api/sites/multiscreen/create', [
    //     'body' => '{"template_id":'.$template_id.',"lang":"es"} ',
    //     'headers' => [
    //     'Accept' => 'application/json',
    //     'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
    //     'Content-Type' => 'application/json',
    // ],
    // ]);

    $response = $client->request('POST', 'https://api.duda.co/api/sites/multiscreen/create', [
        'body' => '{"default_domain_prefix":"pruebassss2","template_id":"'.$template_id.'"}',
        'headers' => [
          'Accept' => 'application/json',
          'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
          'Content-Type' => 'application/json',
        ],
      ]);
      


    $site_name = json_decode($response->getBody()->getContents());

    //header("Location: ".$site_url);
    //die();

    $client3 = new \GuzzleHttp\Client();

    $response3 = $client3->request('POST', 'https://api.duda.co/api/accounts/'.$correo.'/sites/'. $site_name->site_name.'/permissions', [
        'body' => '{"permissions":["EDIT","E_COMMERCE","DEV_MODE","BACKUPS","BLOG","PUSH_NOTIFICATIONS","PUBLISH","REPUBLISH"]}',
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