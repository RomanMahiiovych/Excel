<?php

namespace App\Http\Controllers;

use App\Contracts\TestContract;
use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    private $source;

    public function setSource(TestContract $source)
    {
        $this->source = $source;
    }
    public function load()
    {
        return $this->source->load();
    }

}



