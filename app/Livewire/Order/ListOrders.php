<?php

namespace App\Livewire\Order;

use App\Enums\StatusOrderEnum;
use App\Models\Order;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Url;
use Livewire\Component;

class ListOrders extends Component
{

    #[Url]
    public string $search = '';
    public string $status = '';
    public string $sortColumn = 'orders.id';
    public string $sortDirection = 'asc';

    public function orders(): Collection
    {
        return Order::query()
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->when($this->search, fn ($query) => $query->where('orders.id', 'like', "%$this->search%"))
            ->when($this->search, fn ($query) => $query->orWhere('customers.name', 'like', "%$this->search%"))
            ->when($this->status, fn ($query) => $query->orWhere('orders.status', $this->status))
            ->when($this->search, fn ($query) => $query->orWhere('orders.total', 'like', "%$this->search%"))
            ->select('orders.*', 'customers.name as customer_name')
            ->orderBy($this->sortColumn, $this->sortDirection)->get();
    }

    public function delete($id): void
    {
        Order::find($id)->delete();
    }

    public function status($orderStatus): string
    {
        return StatusOrderEnum::from($orderStatus)->labels();
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

    public function render(): View
    {
        return view('livewire.order.list-orders', ['orders' => $this->orders()]);
    }
}
