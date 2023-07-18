<?php
namespace App\Http\Controllers\Web;


use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __invoke(Request $request): View
    {
        $productId = $request->route('id');
        $data = Product::findOrFail($productId);

        return view('web.product.product')->with('data', $data);
    }
}
