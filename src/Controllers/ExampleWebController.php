<?php

namespace Wing\Example\Controllers;

use Zhiyi\Plus\Http\Controllers\Controller;
use function Wing\Example\view;

class ExampleWebController extends Controller
{
    public function example()
    {
        return view('example');
    }

    public function admin()
    {
        return view('example');
    }
}
