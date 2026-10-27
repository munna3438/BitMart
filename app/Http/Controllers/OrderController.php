<?php

namespace App\Http\Controllers;

use App\Support\Catalog;
use Illuminate\View\View;

class OrderController extends Controller
{
    public function success(): View
    {
        return view('order.success', [
            'order' => Catalog::order(),
        ]);
    }

    public function failed(): View
    {
        $order = Catalog::order();
        $order['number'] = 'BM-2026-018430';
        $order['paymentStatus'] = 'Failed';

        return view('order.failed', [
            'order' => $order,
        ]);
    }
}
