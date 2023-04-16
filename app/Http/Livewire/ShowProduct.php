<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

use App\Models\Product;

class ShowProduct extends ModalComponent
{

    public int|Product $product;
 
    public function mount(Product $product) {
        $this->product = $product;
    }
    public function render()
    {
        return view('livewire.show-product');
    }
}
