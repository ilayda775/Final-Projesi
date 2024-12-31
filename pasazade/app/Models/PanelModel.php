<?php

namespace App\Models;


class PanelModel
{
    protected $db;

    public function __construct()
    {
        $this->db = db_connect();
    }
}