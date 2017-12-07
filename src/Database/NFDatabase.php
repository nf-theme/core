<?php

namespace NFWP\Database;

use NF\Database\DBManager;
use NF\Facades\App;

class NFDatabase
{
    public function __construct($plugin_file = __FILE__)
    {
        App::make(DBManager::class)->bootEloquent();

        if (method_exists($this, 'up')) {
            register_activation_hook($plugin_file, [$this, 'up']);
        }
        if (method_exists($this, 'down')) {
            register_uninstall_hook($plugin_file, [$this, 'down']);
        }
    }
}
