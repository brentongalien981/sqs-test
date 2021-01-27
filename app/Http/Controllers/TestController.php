<?php

namespace App\Http\Controllers;

use App\Jobs\AddUser;
use App\Jobs\ProcessPodcast;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function dispatchQueue()
    {
        ProcessPodcast::dispatch(1);

        return "job dispatched!";
    }



    public function delayCreateUser(Request $request)
    {

        $u = new User();
        $u->name = $request->name;
        $u->email = $request->email;
        $u->password = $request->password;

        AddUser::dispatch($u);

        return [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'msg' => 'JOB: AddUser dispatched...'
        ];
    }



    public function createUser(Request $request)
    {

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
