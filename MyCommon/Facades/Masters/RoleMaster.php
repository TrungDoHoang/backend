<?php

namespace MyCommon\Facades\Masters;

use Illuminate\Support\Facades\Facade;

class RoleMaster extends Facade
{
    protected static function getFacadeAccessor()
    {
        return "RoleMaster";
    }
}
