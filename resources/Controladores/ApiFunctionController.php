<?php


//$nombresitio =  $_POST['nombresitio'];
///$templateid = $_POST['templateid'];
//$emailuser = $_POST['emailuser'];
$client = new \GuzzleHttp\Client();

$nombresitio = "Huevos Migue";
$templateid = '1004643' ;
$emailuser = 'correo20@correo.com';


    
    
 

    $response = $client->request('POST', 'https://api.duda.co/api/sites/multiscreen/create', [
        'body' => '{"default_domain_prefix":"pruebassss2","template_id":"'.$templateid.'"}',
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

    $response3 = $client3->request('POST', 'https://api.duda.co/api/accounts/'.$emailuser.'/sites/'.$templateid.'/permissions', [
        'body' => '{"permissions":["EDIT","E_COMMERCE","DEV_MODE","BACKUPS","BLOG","PUSH_NOTIFICATIONS","PUBLISH","REPUBLISH"]}',
        'headers' => [
        'Accept' => 'application/json',
        'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
        'Content-Type' => 'application/json',
    ],
    ]);

    $client4 = new \GuzzleHttp\Client();

    $response3 = $client4->request('GET', 'https://api.duda.co/api/accounts/sso/'.$emailuser.'/link?site_name='.$templateid.'&target=EDITOR', [
        'headers' => [
          'Accept' => 'application/json',
          'Authorization' => 'Basic MTczMDA3ZDhlNTpUUWU5Wm5WeDB2dE4=',
        ],
      ]);
    
    $site_name = json_decode($response3->getBody()->getContents());
    //$site_url = $response->url;
    $site_url = $site_name->url;


    
?>