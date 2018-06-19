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
        $b = 20;

        $c = 10;
        $d = $c / 2;
        $e = $d / 2;
        $t = $e / 2;

        $c = 10;
        $d = $c / 2;
        $e = $d / 2;
        $t = $e / 2;

        echo "12";
    }

    public function bad()
    {
        $c = 10;
        $d = $c / 2;
        $e = $d / 2;
        $t = $e / 2;

        $c = 10;
        $d = $c / 2;
        $e = $d / 2;
        $t = $e / 2;
    }
}
