<?php

namespace App\Controllers;

use MongoDB\Client;

class MongoTest extends BaseController
{
    public function index()
    {
        try {

            $client = new Client("mongodb://localhost:27017");


            echo "MongoDB bağlantısı başarılı!";
        } catch (\Exception $e) {
            echo "MongoDB bağlantısı başarısız: " . $e->getMessage();
        }
    }
}
