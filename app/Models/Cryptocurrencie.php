<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cryptocurrencie extends Model
{
    use HasFactory;

    public function __construct($name){
        $this->name = $name;
    }



    public static function getPrice(){

        $client = new \GuzzleHttp\Client();

        $response = $client->request('GET', 'https://api.coingate.com/api/v2/currencies', [
          'headers' => [
            'accept' => 'application/json',
          ],
        ]);
        
        echo $response->getBody();
        
        // Simulacion de llamada a API de precio
      //  return rand(100, 1000);
    }
}
