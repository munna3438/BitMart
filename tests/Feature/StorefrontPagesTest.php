<?php

use App\Support\Catalog;

test('the homepage renders', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('BitMart', escape: false);
});

test('a product page renders with its details', function () {
    $product = Catalog::find('premium-cotton-t-shirt');

    $this->get(route('products.show', 'premium-cotton-t-shirt'))
        ->assertOk()
        ->assertSee($product['name'])
        ->assertSee('৳'.number_format($product['price']))
        ->assertSee('Add to Cart', escape: false)
        ->assertSee('Ratings &amp; reviews', escape: false);
});

test('an unknown product returns 404', function () {
    $this->get(route('products.show', 'not-a-real-product'))->assertNotFound();
});

test('the cart page renders items and the summary', function () {
    $this->get(route('cart.index'))
        ->assertOk()
        ->assertSee('Shopping Cart')
        ->assertSee('Order Summary')
        ->assertSee('data-cart-row', escape: false);
});

test('the checkout page renders every step', function () {
    $this->get(route('checkout.index'))
        ->assertOk()
        ->assertSee('Checkout')
        ->assertSee('Contact details')
        ->assertSee('Delivery method')
        ->assertSee('Payment method')
        ->assertSee('data-place-order', escape: false);
});

test('the order success page renders the confirmed order', function () {
    $this->get(route('order.success'))
        ->assertOk()
        ->assertSee('Order confirmed')
        ->assertSee('Order progress')
        ->assertSee('Payment summary');
});

test('the order failed page renders the failure state', function () {
    $this->get(route('order.failed'))
        ->assertOk()
        ->assertSee('Payment failed')
        ->assertSee('Retry payment')
        ->assertSee('No money has been taken');
});
