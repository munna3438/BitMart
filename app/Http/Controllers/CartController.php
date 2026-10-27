<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\View\View;

class CartController extends Controller
{
    public function index(): View
    {
        $lines = Catalog::cart();

        return view('cart', [
            'lines' => $lines,
            'summary' => Catalog::summary($lines),
            'suggestions' => Catalog::related('premium-cotton-t-shirt', 5),
            'freeDeliveryThreshold' => 2000,
        ]);
    }
}
