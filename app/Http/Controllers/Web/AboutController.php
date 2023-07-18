<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use View;

class AboutController extends Controller
{
    public function __invoke(): View
    {
        return view('web.about.index');
    }

}
