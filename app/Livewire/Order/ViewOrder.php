<?php

namespace App\Livewire\Order;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

class ViewOrder extends Component
{
    public Order $order;
    public Collection $products;
    public string $status;
    public float $total;
    public float $discount;
    public array $orderItems = [];
    public int $selectedCustomer;

    public function mount(): void
    {
        $this->products = Product::all();
        $this->fill($this->order);
        $this->orderItems = $this->order->items->toArray();
        $this->selectedCustomer = $this->order->customer_id;
    }

    public function render(): View
    {
        return view('livewire.order.view-order');
    }
}
