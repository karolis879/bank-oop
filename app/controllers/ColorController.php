<?php

namespace Bank\Controllers;

use Bank\App;

class ColorController
{
    public function index()
    {
        return App::view('color/index', [
            'pageTitle' => 'Color - Colors',
        ]);
    }

    public function list()
    {
        return json_encode(['html' => 'Hello from list']);
    }

}