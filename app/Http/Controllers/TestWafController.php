<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestWafController extends Controller
{
    public function testDdos(Request $r)
    {
        // sleep(2);
        $theHeaders = getallheaders();


        return [
            'msg' => 'In CLASS: TestWafController, METHOD: testDdos()',
            'X-Forwarded-For (ISP)' => $theHeaders['X-Forwarded-For'],
            'User-Agent (BROWSER)' => $theHeaders['User-Agent'],
            'Host (CLOSEST-NODE-TO-SERVER)' => $theHeaders['Host'],
            'Origin (HOST-OF-FRONTEND)' => $theHeaders['Origin'],
            'Referer (HOST-OF-FRONTEND?)' => $theHeaders['Referer'],
        ];
    }



    public function test2(Request $r)
    {
        return [
            'msg' => 'In CLASS: TestWafController, METHOD: test2()',
            'r->ip()' => $r->ip(),
            'getallheaders' => getallheaders()
        ];
    }




    public function test(Request $r)
    {
        return [
            'msg' => 'In CLASS: TestWafController, METHOD: test()',
            'r->ip()' => $r->ip(),
            'SERVER[HTTP_HOST]' => $_SERVER['HTTP_HOST'],
            'SERVER[HTTP_REFERER]' => $_SERVER['HTTP_REFERER'] ?? "null referer",
            'SERVER[HTTP_USER_AGENT]' => $_SERVER['HTTP_USER_AGENT'],
            'SERVER[REMOTE_ADDR]' => $_SERVER['REMOTE_ADDR'],
            'SERVER[REMOTE_HOST]' => $_SERVER['REMOTE_HOST'] ?? "null remote-host",
            'SERVER[SERVER_ADDR]' => $_SERVER['SERVER_ADDR'],
            'SERVER[SERVER_NAME]' => $_SERVER['SERVER_NAME'],
            'SERVER[SERVER_SOFTWARE]' => $_SERVER['SERVER_SOFTWARE'],
            'SERVER[SERVER_PROTOCOL]' => $_SERVER['SERVER_PROTOCOL'],
            'getallheaders' => getallheaders()
        ];
    }
}
