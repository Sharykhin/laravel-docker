<?php

namespace App\Http\Controllers;

/**
 * Class TestController
 * @package App\Http\Controllers
 */
class TestController extends Controller
{
    public function index()
    {
        $i= 10;
        echo $i;
    }
}