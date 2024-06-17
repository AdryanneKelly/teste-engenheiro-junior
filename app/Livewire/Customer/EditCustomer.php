<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditCustomer extends Component
{
    public Customer $customer;

    #[Validate('required|string|max:255')]
    public string $name;

    #[Validate('required|email')]
    public string $email;

    public function mount(): void
    {
        $this->fill($this->customer);
    }

    public function update(): void
    {
        try {
            $this->customer->update($this->validate());
            redirect()->to('/customers')->with('message', 'Cliente atualizado com sucesso.');
        } catch (\Exception $e) {
            redirect()->to('/customers')->with('message', 'Erro ao atualizar o cliente.');
        }
    }

    public function render(): View
    {
        return view('livewire.customer.edit-customer');
    }
}
