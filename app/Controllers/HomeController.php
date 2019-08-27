<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        require view('index.php');
    }
}