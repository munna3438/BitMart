<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function index(): View
    {
        $lines = Catalog::cart();

        return view('checkout', [
            'lines' => $lines,
            'summary' => Catalog::summary($lines),
            'districts' => Catalog::districts(),
        ]);
    }
}
