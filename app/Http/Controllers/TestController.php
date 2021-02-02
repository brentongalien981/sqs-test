<?php

namespace App\Http\Controllers;

use App\Jobs\AddMultipleUsers;
use App\Jobs\AddUser;
use App\Jobs\ProcessPodcast;
use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function dispatchMultipleUserIds(Request $request)
    {
        $name = $request->name;
        $name2 = $request->name2;

        $multipleUserData = [];
        for ($i=0; $i < 10; $i++) { 
            $multipleUserData[] = [
                'name' => $name . $i,
                'email' => $name . $i . '@gmail.com',
                'password' => $name . $i . '123'
            ];
        }

        
        // $multipleUserData2 = [];
        // for ($i=0; $i < 5; $i++) { 
        //     $multipleUserData2[] = [
        //         'name' => $name2 . $i,
        //         'email' => $name2 . $i . '@gmail.com',
        //         'password' => $name2 . $i . '123'
        //     ];
        // }

        AddMultipleUsers::dispatch($multipleUserData);
        // AddMultipleUsers::dispatch($multipleUserData2);


        return [
            'msg' => 'METHOD: dispatchMultipleUserIds()',
            'data' => $multipleUserData,
            // 'data2' => $multipleUserData2,
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
