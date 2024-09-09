<?php

namespace App\Controllers;

class PageController extends BaseController
{
    public function about()
    {
        return view('about');
    }
}
