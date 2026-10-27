<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function show(string $slug): View
    {
        $product = Catalog::find($slug);

        abort_if($product === null, 404);

        return view('product', [
            'product' => $product,
            'related' => Catalog::related($slug),
            'discount' => $product['originalPrice']
                ? round((1 - $product['price'] / $product['originalPrice']) * 100)
                : null,
        ]);
    }
}
