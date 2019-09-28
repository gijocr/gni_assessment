<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Config;

class ConfigController extends Controller
{
    public function getConfigs()
    {
        $configs = Config::first();

        return response()->json($configs->content);
    }
}
