<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\View\View;
use Livewire\Component;

class ViewProduct extends Component
{
    public Product $product;

    public string $name;
    public string $description;
    public float $price;

    public function mount(): void
    {
        $this->fill($this->product);
    }

    public function render(): View
    {
        return view('livewire.product.view-product');
    }
}
