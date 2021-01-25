<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function createUser(Request $request) {

        $u = new User();
        $u->name = $request->name;
        $u->email = $request->email;
        $u->password = $request->password;
        $u->save();

        return [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password
        ];
    }
}
