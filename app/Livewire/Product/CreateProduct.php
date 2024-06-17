<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateProduct extends Component
{
    #[Validate('required|string|max:255')]
    public string $name;

    #[Validate('required|numeric')]
    public float $price;

    #[Validate('required|string|max:1000')]
    public string $description;

    public function create(): mixed
    {
        try {
            Product::create($this->validate());
            return redirect()->to('/products')->with('message', 'Produto criado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->to('/products')->with('message', 'Erro ao criar o produto.');
        }
    }
    
    public function render(): View
    {
        return view('livewire.product.create-product');
    }
}
