<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestDbTransactionController extends Controller
{
    public function save()
    {
        DB::beginTransaction();

        for ($i = 0; $i < 5; $i++) {
            DB::update("update users set name = 'bonito' where name like '%gasol%' ");
        }

        DB::commit();

        sleep(10);
        DB::rollBack();

        


        // throw new Exception('weeheheheh');

        return "CLASS: TestDbTransactionController, METHOD: save()";
    }
}
