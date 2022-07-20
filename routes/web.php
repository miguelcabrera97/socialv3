<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DudaController;
use App\Http\Controllers\SitiosController;
use Laravel\Jetstream\Rules\Role;

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


Route::post('/crear',[SitiosController::class, 'crear'])->name('crear');

Route::get('/sitios/{user}', function($user){
    $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.duda.co/api/accounts/grant-access/'.$user.'/sites/multiscreen', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
        ],
        ]);
        
        $sitios= json_decode($response->getBody()->getContents());
        return view('sitios', compact('sitios'));
});

