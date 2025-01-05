<?php

namespace Config;

use MongoDB\Client;

class MongoDB
{
    private $client;

    public function __construct()
    {
        $this->client = new Client('mongodb://127.0.0.1:27017'); // Sunucu adresi
    }

    public function getCollection($database, $collection)
    {
        return $this->client->$database->$collection;
    }
}
