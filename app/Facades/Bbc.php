<?php

namespace App\Facades;

class Bbc extends \Illuminate\Support\Facades\Facade
{
    public static function getFacadeAccessor()
    {
        return 'bbc';
    }
}