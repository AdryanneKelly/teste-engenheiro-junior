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

class CreateOrder extends Component
{
    public Collection $products;
    public Collection $customers;

    #[Validate('required')]
    public array $orderItems = [];

    #[Validate('required')]
    public ?int $selectedCustomer;

    #[Validate('required|numeric')]
    public float $total = 0;

    #[Validate('required|numeric')]
    public float $discount = 0;

    public function mount(): void
    {
        $this->products = Product::all();
        $this->customers = Customer::all();
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

    public function create(): mixed
    {
        try {
            $this->validate();

            $order = Order::create([
                'customer_id' => $this->selectedCustomer,
                'total' => $this->total,
                'discount' => $this->discount,
            ]);

            foreach ($this->orderItems as $product) {
                OrderItems::create([
                    'order_id' => $order->id,
                    'product_id' => $product['product_id'],
                    'quantity' => $product['quantity'],
                ]);
            }

            return redirect()->to('/orders')->with('message', 'Pedido criado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->to('/orders')->with('message', 'Erro ao criar o pedido.');
        }
    }

    public function render(): View
    {
        return view('livewire.order.create-order');
    }
}
