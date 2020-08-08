<?php

namespace App\Http\Controllers;

use App\Contracts\TestContract;
use Illuminate\Http\Request;

class TestTwoController extends Controller implements TestContract
{


    public function load()
    {
        print 'TestTwo';
    }
}
