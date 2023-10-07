<?php

namespace MyCommon\Libraries\Masters;

class RoleMaster extends Master
{
    const ADMIN = 1;

    const USER = 2;

    public function __construct()
    {
        $this->init();
    }

    /*
        roles = [
            // {id: 1, name: 'admin},
            // {id: 2, name: 'user},

            1 => 'admin',
            2 => 'user
        ]
    */

    public function init()
    {
        $this->master = [
            self::ADMIN => 'admin',
            self::USER => 'user'
        ];
    }
}
