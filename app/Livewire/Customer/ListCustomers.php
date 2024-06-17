<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

class ListCustomers extends Component
{

    #[Url]
    public string $search = '';

    public string $sortColumn = 'name';
    public string $sortDirection = 'asc';

    public function customers(): Collection
    {
        return Customer::query()
            ->when($this->search, fn (Builder $q) => $q->where('name', 'like', "%$this->search%")
                ->orWhere('email', 'like', "%$this->search%"))
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

    public function delete(Customer $customer): void
    {
        try {
            $customer->delete();
            session()->flash('message', 'Cliente excluído com sucesso.');
        } catch (\Exception $e) {
            session()->flash('message', 'Erro ao excluir cliente.');
        }
    }

    public function render(): View
    {
        return view('livewire.customer.list-customers', ['customers' => $this->customers()]);
    }
}
