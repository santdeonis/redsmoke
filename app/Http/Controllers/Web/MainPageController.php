<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class MainPageController extends Controller
{
    public function __invoke(): View
    {
        $data = Product::get();
        return view('web.main.index')->with('data', $data);
    }
}
