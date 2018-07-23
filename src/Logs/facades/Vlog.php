<?php

namespace NF\Logs\Facades;

use Illuminate\Support\Facades\Facade;
use NF\Logs\VicodersLog;

class Vlog extends Facade
{
    protected static function getFacadeAccessor()
    {
        return new VicodersLog;
    }
}
