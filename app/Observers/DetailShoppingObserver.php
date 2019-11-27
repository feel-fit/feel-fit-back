<?php

namespace App\Observers;

use App\Models\Product;
use App\Models\DetailShopping;

class DetailShoppingObserver
{
    public function created(DetailShopping $detailShopping)
    {
        $product = Product::find($detailShopping->product_id);
        $product->quantity-=$detailShopping->quantity;
        $product->save();
    }
}
