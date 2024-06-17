<?php

namespace App\Livewire\Order;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderItems;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditOrder extends Component
{
    public Order $order;

    public Collection $products;
    public Collection $customers;

    #[Validate('required')]
    public ?string $status;

    #[Validate('numeric')]
    public float $total;

    #[Validate('required|numeric')]
    public float $discount;

    #[Validate('required')]
    public array $orderItems = [];

    #[Validate('required')]
    public ?string $selectedCustomer;

    public function mount(): void
    {
        $this->products = Product::all();
        $this->customers = Customer::all();
        $this->fill($this->order);
        $this->orderItems = $this->order->items->toArray();
        $this->selectedCustomer = $this->order->customer_id;
    }

    public function addProduct(): void
    {
        $this->orderItems[] = ['product_id' => '', 'quantity' => 1];
    }

    public function calculateTotal(): void
    {
        $this->total = 0;
        foreach ($this->orderItems as $product) {
            try {
                $this->total += Product::find($product['product_id'])->price * $product['quantity'];
            } catch (\Exception $e) {
                $this->total += 0;
            }
        }
        $this->total -= $this->discount;
    }

    public function removeProduct($index): void
    {
        unset($this->orderItems[$index]);
        $this->orderItems = array_values($this->orderItems);
        $this->calculateTotal();
    }

    public function update(): void
    {
        try {
            $this->validate();

            $this->order->update([
                'customer_id' => $this->selectedCustomer,
                'total' => $this->total,
                'discount' => $this->discount,
                'status' => $this->status,
            ]);

            $this->order->items()->delete();

            foreach ($this->orderItems as $item) {
                $this->order->items()->create([
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                ]);
            }

            redirect()->to('/orders')->with('message', 'Pedido atualizado com sucesso.');
        } catch (\Exception $e) {
            redirect()->to('/orders')->with('message', 'Erro ao atualizar o pedido.');
        }
    }

    public function render(): View
    {
        return view('livewire.order.edit-order');
    }
}
