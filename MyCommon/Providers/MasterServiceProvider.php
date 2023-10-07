<?php

namespace MyCommon\Providers;

use Illuminate\Support\ServiceProvider;

class MasterServiceProvider extends ServiceProvider
{
    public function boot()
    {
    }
    public function register()
    {
        /*
        singleton binding và binding
        + singleton binding: nó sẽ chỉ resolve 1 lần -> Những lần sau sẽ sủ dụng instance cũ
        + binding: sẽ tạo ra instance mỗi lần khởi chạy.
         */

        $this->app->singleton('RoleMaster', function () {
            return new \MyCommon\Libraries\Masters\RoleMaster();
        });
    }
}
