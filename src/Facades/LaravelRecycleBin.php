<?php

namespace Mintellity\LaravelRecycleBin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Mintellity\LaravelRecycleBin\LaravelRecycleBin
 */
class LaravelRecycleBin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Mintellity\LaravelRecycleBin\LaravelRecycleBin::class;
    }
}
