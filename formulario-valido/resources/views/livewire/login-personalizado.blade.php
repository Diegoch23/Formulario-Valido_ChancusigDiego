<div>
    @if (session()->has('error'))
        <div>{{ session('error') }}</div>
    @endif

    <form wire:submit.prevent="login">
        <input type="text" wire:model="nombre" placeholder="Nombre" required>
        <input type="text" wire:model="apellido" placeholder="Apellido" required>
        <input type="password" wire:model="password" placeholder="Contraseña" required>
        <button type="submit">Iniciar Sesión</button>
    </form>
</div>
