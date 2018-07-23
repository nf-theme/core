<?php

namespace NF\Logs;

use Illuminate\Support\ServiceProvider;
use NF\Facades\App;
use NF\Logs\Common\Config;

class VLogServiceProvider extends ServiceProvider 
{
    public function register()
    {
        if (!file_exists(get_stylesheet_directory() . '/config/logs.php')) {
            copy(get_stylesheet_directory() . '/logs/src/config/logs.php', get_stylesheet_directory() . '/config/logs.php');
        }

        $this->app->singleton('Config', function ($app) {
            return new Config;
        });
    }
}
