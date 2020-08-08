<?php

namespace App\Http\Controllers;

use App\Contracts\TestContract;
use Illuminate\Http\Request;

class TestController extends Controller implements TestContract
{

    public function load()
    {
        print 'Test';
    }
}
