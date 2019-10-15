<?php

namespace App\Observers;

use App\Models\DetailShopping;
use App\Models\Product;

class DetailShoppingObserver
{
    public function created(DetailShopping $detailShopping)
    {
        $product = Product::find($detailShopping->product_id);
        $product->quantity--;
        $product->save();
    }
}
