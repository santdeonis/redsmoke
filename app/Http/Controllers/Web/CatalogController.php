<?php

namespace App\Http\Controllers\Web;

use App\Filters\Products\ProductFilter;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function __invoke(Request $request, ProductFilter $filter): View
    {
        $filterValues = $request->toArray();
        $categories = Category::all();
        $manufacturers = array_unique(array_column(Product::select('manufacturer')->get()->toArray(), 'manufacturer') );
        $data = Product::filter($filter)->paginate(20);
        return view('web.catalog.catalog')->with('data', $data)
            ->with('filterValues', $filterValues)
            ->with('categories', $categories)
            ->with('manufacturers', $manufacturers);
    }
}
