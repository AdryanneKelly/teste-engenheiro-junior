<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditProduct extends Component
{
    public Product $product;

    #[Validate('required')]
    public string $name;

    #[Validate('required|numeric')]
    public float $price;

    #[Validate('required')]
    public $description;

    public function mount(): void
    {
        $this->fill($this->product);
    }

    public function update(): void
    {
        try {
            $this->product->update($this->validate());
            redirect()->to('/products')->with('message', 'Produto atualizado com sucesso.');
        } catch (\Exception $e) {
            redirect()->to('/products')->with('message', 'Erro ao atualizar o produto.');
        }
    }

    public function render(): View
    {
        return view('livewire.product.edit-product');
    }
}
