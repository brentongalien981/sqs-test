<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TestRedisController extends Controller
{
    public function get(Request $request) {
        $key = $request->key;
        return Cache::store('redisreader')->get($key);
    }



    public function put(Request $request) {

        $key = $request->key;
        $val = $request->val;

        Cache::store('redisprimary')->put($key, $val);

        return "ok";
        
    }



    public function getConnection() {

        return "METHOD: getConnection()";
        
    }
}
