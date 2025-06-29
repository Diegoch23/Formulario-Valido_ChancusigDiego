<div class="max-w-2xl mx-auto p-6 bg-white shadow rounded-xl mt-10">
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="submit" class="space-y-5">

        {{-- Nombre --}}
        <div>
            <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
            <input wire:model="nombre" type="text" id="nombre"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('nombre') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Apellido --}}
        <div>
            <label for="apellido" class="block text-sm font-medium text-gray-700">Apellido</label>
            <input wire:model="apellido" type="text" id="apellido"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('apellido') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Cédula/RUC --}}
        <div>
            <label for="cedula_ruc" class="block text-sm font-medium text-gray-700">Cédula / RUC</label>
            <input wire:model="cedula_ruc" type="text" id="cedula_ruc"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('cedula_ruc') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Teléfono --}}
        <div>
            <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
            <input wire:model="telefono" type="text" id="telefono"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('telefono') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Fecha de nacimiento --}}
        <div>
            <label for="fecha_nacimiento" class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
            <input wire:model="fecha_nacimiento" type="date" id="fecha_nacimiento"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('fecha_nacimiento') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Género --}}
        <div>
            <label for="genero" class="block text-sm font-medium text-gray-700">Género</label>
            <select wire:model="genero" id="genero"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                <option value="">Seleccione</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>
            @error('genero') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Dirección --}}
        <div>
            <label for="direccion" class="block text-sm font-medium text-gray-700">Dirección</label>
            <input wire:model="direccion" type="text" id="direccion"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('direccion') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Salario --}}
        <div>
            <label for="salario" class="block text-sm font-medium text-gray-700">Salario</label>
            <input wire:model="salario" type="number" id="salario" step="0.01"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('salario') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Email --}}
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
            <input wire:model="email" type="email" id="email"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Sitio Web --}}
        <div>
            <label for="sitio_web" class="block text-sm font-medium text-gray-700">Sitio Web</label>
            <input wire:model="sitio_web" type="url" id="sitio_web"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('sitio_web') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Contraseña --}}
        <div>
            <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
            <input wire:model="password" type="password" id="password"
                class="mt-1 block w-full rounded border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        {{-- Botón --}}
        <div class="pt-4">
            <button type="submit"
                class="w-full inline-flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none">
                Registrar
            </button>
        </div>

    </form>
</div>
