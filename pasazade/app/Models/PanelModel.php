<?php

namespace App\Models;

use MongoDB\Client;

class PanelModel
{
    private $mongo;

    public function __construct()
    {

        $this->mongo = new Client("mongodb://localhost:27017");
    }


    public function saveMessage($data)
    {
        $collection = $this->mongo->mail->iletisim;
        $collection->insertOne($data);
    }


    public function getAllMessages()
    {
        $collection = $this->mongo->mail->iletisim;
        return $collection->find()->toArray();
    }

    public function updateMessage($id, $cevap)
    {
        $collection = $this->mongo->mail->iletisim;
        $collection->updateOne(
            ['_id' => $id],
            ['$set' => ['cevap' => $cevap]]
        );
    }


}

