<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestWafController extends Controller
{
    public function test(Request $r) {
        return [
            'msg' => 'In CLASS: TestWafController, METHOD: test()',
            'r->ip()' => $r->ip(),
            'SERVER[HTTP_HOST]' => $_SERVER['HTTP_HOST'],
        ];
    }
}
