<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class FormularioRegistro extends Component
{
    /* ①  Declara TODAS las propiedades que usas en la vista */
    public $nombre, $apellido, $cedula_ruc, $telefono, $fecha_nacimiento,
           $genero, $direccion, $salario, $email, $sitio_web, $password;

    /* ②  Reglas de validación */
    public function rules()
    {
        return [
            'nombre'   => ['required','regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/','min:3','max:30'],
            'apellido' => ['required','regex:/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/','min:3','max:30'],

            'cedula_ruc' => ['required','digits_between:10,13','regex:/^\d{10}(\d{3})?$/'],

            'telefono' => ['required','digits:10','regex:/^[0-9]{10}$/'],

            'fecha_nacimiento' => [
                'required','date',
                'after_or_equal:1900-01-01',
                'before_or_equal:'.now()->format('Y-m-d')
            ],

            'genero'    => ['required','in:masculino,femenino,otro'],

            // 🔥 Corregido: escapamos \[  \]  \\ dentro del char-class
            'direccion' => [
                'required','string','max:20',
                'not_regex:/[<>$%^&*(){}\[\]|\\\\]/'
            ],

            'salario'   => ['required','numeric','min:470','max:5000'],

            'email'     => ['required','email','unique:users,email'],

            'sitio_web' => ['required','url'],

            'password'  => [
                'required','min:8','max:12',
                'regex:/[A-Z]/',   // Mayúscula
                'regex:/[a-z]/',   // Minúscula
                'regex:/[0-9]/',   // Número
                'regex:/[\W]/'     // Símbolo
            ],
        ];
    }


    public function messages()
    {
    return [
        // Nombre
        'nombre.required'    => 'El nombre es obligatorio.',
        'nombre.regex'       => 'El nombre solo puede contener letras y espacios.',
        'nombre.min'         => 'El nombre debe tener al menos 3 caracteres.',
        'nombre.max'         => 'El nombre no debe exceder los 30 caracteres.',

        // Apellido
        'apellido.required'  => 'El apellido es obligatorio.',
        'apellido.regex'     => 'El apellido solo puede contener letras y espacios.',
        'apellido.min'       => 'El apellido debe tener al menos 3 caracteres.',
        'apellido.max'       => 'El apellido no debe exceder los 30 caracteres.',

        // Cédula o RUC
        'cedula_ruc.required'      => 'La cédula o RUC es obligatoria.',
        'cedula_ruc.digits_between'=> 'La cédula o RUC debe tener entre 10 y 13 dígitos.',
        'cedula_ruc.regex'         => 'El formato de la cédula o RUC no es válido.',

        // Teléfono
        'telefono.required' => 'El teléfono es obligatorio.',
        'telefono.digits'   => 'El teléfono debe tener exactamente 10 dígitos.',
        'telefono.regex'    => 'El formato del teléfono no es válido.',

        // Fecha de nacimiento
        'fecha_nacimiento.required'        => 'La fecha de nacimiento es obligatoria.',
        'fecha_nacimiento.date'            => 'Debe ingresar una fecha válida.',
        'fecha_nacimiento.after_or_equal'  => 'La fecha de nacimiento no puede ser anterior a 1900-01-01.',
        'fecha_nacimiento.before_or_equal' => 'La fecha de nacimiento no puede ser posterior a hoy.',

        // Género
        'genero.required' => 'El género es obligatorio.',
        'genero.in'       => 'El género seleccionado no es válido.',

        // Dirección
        'direccion.required'   => 'La dirección es obligatoria.',
        'direccion.string'     => 'La dirección debe ser un texto.',
        'direccion.max'        => 'La dirección no debe exceder los 20 caracteres.',
        'direccion.not_regex'  => 'La dirección contiene caracteres no permitidos.',

        // Salario
        'salario.required' => 'El salario es obligatorio.',
        'salario.numeric'  => 'El salario debe ser un número.',
        'salario.min'      => 'El salario no puede ser menor a 470.',
        'salario.max'      => 'El salario no puede ser mayor a 5000.',

        // Email
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email'    => 'Debe ingresar un correo válido.',
        'email.unique'   => 'Este correo ya ha sido registrado.',

        // Sitio web
        'sitio_web.required' => 'El sitio web es obligatorio.',
        'sitio_web.url'      => 'Debe ingresar una URL válida.',

        // Contraseña
        'password.required' => 'La contraseña es obligatoria.',
        'password.min'      => 'La contraseña debe tener al menos 8 caracteres.',
        'password.max'      => 'La contraseña no debe exceder los 12 caracteres.',
        'password.regex'    => 'La contraseña debe incluir una mayúscula, una minúscula, un número y un símbolo.',
        ];
    }

    /* ③  Guardar */
    public function submit()
    {
        $this->validate($this->rules(), $this->messages());  // Livewire usará rules()

        User::create([
            'nombre'          => $this->nombre,
            'apellido'        => $this->apellido,
            'cedula_ruc'      => $this->cedula_ruc,
            'telefono'        => $this->telefono,
            'fecha_nacimiento'=> $this->fecha_nacimiento,
            'genero'          => $this->genero,
            'direccion'       => $this->direccion,
            'salario'         => $this->salario,
            'email'           => $this->email,
            'sitio_web'       => $this->sitio_web,
            'password'        => Hash::make($this->password),
        ]);

        session()->flash('success','Registro exitoso');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.formulario-registro');
    }
}
