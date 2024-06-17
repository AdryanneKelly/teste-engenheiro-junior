<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCustomer extends Component
{
    #[Validate('required|string|max:255')]
    public string $name;

    #[Validate('required|email')]
    public string $email;

    public function create(): mixed
    {
        try {
            Customer::create($this->validate());
            return redirect()->to('/customers')->with('message', 'Cliente criado com sucesso.');
        } catch (\Exception $e) {
            return redirect()->to('/customers')->with('message', 'Erro ao criar o cliente.');
        }
    }

    public function render()
    {
        return view('livewire.customer.create-customer');
    }
}
