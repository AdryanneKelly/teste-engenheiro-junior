<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Illuminate\View\View;
use Livewire\Component;

class ViewCustomer extends Component
{
    public Customer $customer;

    public string $name;
    public string $email;

    public function mount(): void
    {
        $this->fill($this->customer);
    }

    public function render() : View
    {
        return view('livewire.customer.view-customer');
    }
}
