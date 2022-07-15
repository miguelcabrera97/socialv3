<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class DudaController extends Controller{
    // Mostrar lista de templates
    public function show(){
        $client = new \GuzzleHttp\Client();
    
        $response = $client->request('GET', 'https://api.duda.co/api/sites/multiscreen/templates', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
        ],
        ]);
    
        $templates = json_decode($response->getBody());
        return view('templates',compact('templates'));
    }

    // Crea sitio con template elegido
    public function crear($template_id){
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

        
    }
    
    public function cuenta($correo){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.duda.co/api/accounts/create', [
        'body' => '{"account_type":"CUSTOMER","account_name":"'.$correo.'"}',
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
            'Content-Type' => 'application/json',
        ],
        ]);

        echo $response->getBody();
    }
}

