<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class BackgroundController extends BaseController
{
    public function random_background()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.unsplash.com/photos/random?client_id='. env("CLIENT_ID") .'&orientation=landscape&topics=6sMVjTLSkeQ',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        echo $response;
    }
}

