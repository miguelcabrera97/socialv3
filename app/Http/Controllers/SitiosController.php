<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SitiosController extends Controller
{
    public function crear(Request $request){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.duda.co/api/sites/multiscreen/create', [
            'body' => '{"default_domain_prefix":"'.$request->nombre.'","template_id":"'.$request->template_id.'"}',
            'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
            'Content-Type' => 'application/json',
            ],
        ]);
        $site_name = json_decode($response->getBody()->getContents());

        $client3 = new \GuzzleHttp\Client();
        $response3 = $client3->request('POST', 'https://api.duda.co/api/accounts/'.$request->user.'/sites/'. $site_name->site_name.'/permissions', [
            'body' => '{"permissions":["EDIT","E_COMMERCE","DEV_MODE","BACKUPS","BLOG","PUSH_NOTIFICATIONS","PUBLISH","REPUBLISH"]}',
            'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
            'Content-Type' => 'application/json',
        ],
        ]);

        $client4 = new \GuzzleHttp\Client();
        $response3 = $client4->request('GET', 'https://api.duda.co/api/accounts/sso/'.$request->user.'/link?site_name='.$site_name->site_name.'&target=EDITOR', [
            'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
            ],
        ]);
        $site_name = json_decode($response3->getBody()->getContents());
        $site_url = $site_name->url;
        header("Location: ".$site_url);
        die();
    }

    public function editar($cuenta, $id){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'https://api.duda.co/api/accounts/sso/'.$cuenta.'/link?site_name='.$id.'&target=EDITOR', [
            'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
            ],
        ]);
        $site_name = json_decode($response->getBody()->getContents());
        $site_url = $site_name->url;
        header("Location: ".$site_url);
        die();
    }

    public function reset(Request $request){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.duda.co/api/sites/multiscreen/reset/'.$request->id.'', [
            'body'=>'{"template_id":"1003040"}',
            'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
            'Content-Type' => 'application/json',
        ],
        ]);
        return redirect('/crearsitio');
    }

    public function delete($site){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('DELETE', 'https://api.duda.co/api/sites/multiscreen/'.$site.'', [
        'headers' => [
            'Accept' => 'application/json',
            'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
        ],
        ]);
        return redirect('/crearsitio');
    }
}
