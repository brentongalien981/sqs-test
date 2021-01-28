<?php

namespace App\Http\Controllers;

use App\Jobs\AddUser;
use App\Jobs\ProcessPodcast;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function dispatchMultipleUserIds()
    {
        return [
            'msg' => 'METHOD: dispatchMultipleUserIds()'
        ];
    }



    public function dispatchQueue()
    {
        ProcessPodcast::dispatch(1);

        return "job dispatched yo!";
    }



    public function dispatchOnQueueQOrders(Request $request)
    {
        $userData['name'] = $request->name;
        $userData['email'] = $request->email;
        $userData['password'] = $request->password;

        AddUser::dispatch($userData)->onQueue('QOrders');

        return [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'msg' => 'JOB: AddUser dispatched on queue: QOrders...'
        ];
    }



    public function delayCreateUser(Request $request)
    {
        $userData['name'] = $request->name;
        $userData['email'] = $request->email;
        $userData['password'] = $request->password;

        AddUser::dispatch($userData);

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
