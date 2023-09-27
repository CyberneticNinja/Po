<?php

namespace App\Livewire\Login;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Login extends Component
{
    public $email = '';
    public $password = '';

    public function render()
    {
        return view('livewire.login.login');
    }

    public function login()
    {
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {

            // Authentication successful
            return redirect('/dashboard'); // Redirect to the dashboard
        } else {
            // Authentication failed
            session()->flash('error', 'Invalid credentials. Please try again.');
            return redirect('/login');
        }
    }
}
