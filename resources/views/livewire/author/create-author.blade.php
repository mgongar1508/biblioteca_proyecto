<x-miscomponentes.base>
    <x-button wire:click="$set('openCrear', true)" class='text-white bg-green-400 hover:bg-green-600'>
        <i class='fas fa-add mr-2'></i>NUEVO
    </x-button>
    <x-dialog-modal maxWidth="2xl" wire:model='openCrear'>
        <x-slot name="title">Nuevo Autor</x-slot>
        <x-slot name="content">
            <x-label value='nombre' for="nombre" class='mb-1'></x-label>
            <x-input type='text' class='w-full mb-4' id='nombre' wire:model='cform.nombre'></x-input>
            <x-input-error for='nombre'></x-input-error>
            <x-label value='apellidos' for="apellidos" class='mb-1'></x-label>
            <x-input type='text' class='w-full mb-4' id='apellidos' wire:model='cform.apellidos'></x-input>
            <x-input-error for='apellidos'></x-input-error>
            <x-label value='nacionalidad' for="nacionalidad" class='mb-1'></x-label>
            <x-input type='text' class='w-full mb-4' id='nacionalidad' wire:model='cform.nacionalidad'></x-input>
            <x-input-error for='nacionalidad'></x-input-error>
            <x-label value='fecha_nacimiento' for="fecha_nacimiento" class='mb-1'></x-label>
            <x-input type='date' class='w-full mb-4' id='fecha_nacimiento' wire:model='cform.fecha_nacimiento'></x-input>
            <x-input-error for='fecha_nacimiento'></x-input-error>
            <x-label value='biografia' for="biografia" class='mb-1'></x-label>
            <x-input type='text' class='w-full mb-4' id='biografia' wire:model='cform.biografia'></x-input>
            <x-input-error for='biografia'></x-input-error>
        </x-slot>
        <x-slot name="footer">
            <div>
                <x-button type="submit" wire:click='crearAuthor' wire:loading.attr='disable' class="bg-blue-500 text-white">
                    Guardar
                </x-button>
                <x-button wire:click='cancelar' class="bg-red-500 text-white">
                    Cancelar
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</x-miscomponentes.base>