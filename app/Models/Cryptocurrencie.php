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

        $data = $response->getBody() ;
        $jsonArray = json_decode($data, true);
        //dd($jsonArray);
        return $jsonArray;

    }
}
