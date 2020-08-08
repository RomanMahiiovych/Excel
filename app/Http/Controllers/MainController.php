<?php

namespace App\Http\Controllers;

use App\Contracts\TestContract;
use Illuminate\Http\Request;
use App\Http\Controllers\TestController;
use App\Http\Controllers\RepositoryController;
class MainController extends Controller
{
//    public $rep;
    public function call(TestContract::class, function ()
{
    $component = new TestController();
    dd($component->load());
});
}
