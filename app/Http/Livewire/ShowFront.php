<?php

namespace App\Http\Livewire;
use Illuminate\Support\Collection;
use Livewire\Component;
use App\Models\Product;

class ShowFront extends Component
{
    public int $amount = 20;

    public int $offset = 0;

    public Collection $products;

    public bool $showLoadMoreButton;

    public function mount() {
        $this->loadProducts();
    }

    public function render()
    {
        return view('livewire.show-front');
    }


    public function loadProducts()
    {
        $products = Product::query()->offset($this->offset)->limit($this->amount)->get();
        $this->products = isset($this->products) ? $this->products->merge($products) : $products;

        $this->offset += $this->amount;

        $this->showLoadMoreButton = Product::count() > $this->offset;
    }
}
