<div class="flex justify-between items-center mb-2">
    <x-input type="search" placeholder="Buscar..." wire:model.live="buscar" />
    {{ $slot }}
</div>
