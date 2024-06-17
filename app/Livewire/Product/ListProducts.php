<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

class ListProducts extends Component
{

    #[Url]
    public string $search = '';

    public string $sortColumn = 'name';
    public string $sortDirection = 'asc';

    public function products(): mixed
    {
        return Product::query()
            ->when($this->search, fn (Builder $q) => $q->where('name', 'like', "%$this->search%")
                ->orWhere('description', 'like', "%$this->search%")
                ->orWhere('price', 'like', "%$this->search%"))
            ->orderBy($this->sortColumn, $this->sortDirection)->get();
    }

    public function sortBy($column): void
    {
        if ($this->sortColumn === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortColumn = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function delete(Product $product): void
    {
        try {
            $product->delete();
            session()->flash('message', 'Produto excluído com sucesso.');
        } catch (\Exception $e) {
            session()->flash('message', 'Erro ao excluir produto.');
        }
    }

    public function render(): View
    {
        return view('livewire.product.list-products', ['products' => $this->products()]);
    }
}
