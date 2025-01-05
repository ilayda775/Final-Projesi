<?php

namespace App\Models;

use MongoDB\Client;

class PanelModel
{
    private $mongo;

    public function __construct()
    {
        // MongoDB bağlantısını başlat
        $this->mongo = new Client("mongodb://localhost:27017"); // Bağlantı stringi doğru olmalı
    }

    // Veri ekleme
    public function saveMessage($data)
    {
        $collection = $this->mongo->mail->iletisim; // mail veritabanındaki iletisim koleksiyonu
        $collection->insertOne($data); // Veriyi koleksiyona ekleyin
    }

    // Verileri okuma
    public function getAllMessages()
    {
        $collection = $this->mongo->mail->iletisim;
        return $collection->find()->toArray(); // Veritabanından tüm verileri alın
    }
}

