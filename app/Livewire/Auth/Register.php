<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{

    #[Validate('required|string|max:255')]
    public string $name;

    #[Validate('required|email')]
    public string $email;

    #[Validate('required|string|min:6|confirmed')]
    public string $password;

    #[Validate('required|string|min:6')]
    public string $password_confirmation;

    public function register()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        auth()->login($user);

        return redirect()->to('/products');
    }


    public function render()
    {
        return view('livewire.auth.register');
    }
}
