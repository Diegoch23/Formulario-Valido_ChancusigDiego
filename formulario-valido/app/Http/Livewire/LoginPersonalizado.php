<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginPersonalizado extends Component
{
    public $nombre, $apellido, $password;

    protected $rules = [
        'nombre' => 'required|string',
        'apellido' => 'required|string',
        'password' => 'required|string',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'password' => $this->password
        ])) {
            session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        session()->flash('error', 'Credenciales incorrectas.');
    }

    public function render()
    {
        return view('livewire.login-personalizado');
    }
}
