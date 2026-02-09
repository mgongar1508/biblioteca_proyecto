<div>
    <button class="p-2 rounded-lg text-white font-bold bg-green-500 hover:bg-green-700"
        wire:click="$set('openCrear', true)">
        <i class="fas fa-add mr-1"></i>NUEVA
    </button>
    <x-dialog-modal  wire:model='openCrear'>
        <x-slot name="title">
            Crear categoria nueva
        </x-slot>

        <x-slot name="content">
            <form class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">

                <!-- Nombre -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fa-solid fa-tag mr-1"></i>
                        Nombre
                    </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre" wire:model="cform.nombre"
                        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>
                <x-input-error for="cform.nombre" />

                <!-- Descripción -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fa-solid fa-align-left mr-1"></i>
                        Descripción
                    </label>
                    <textarea name="descripcion" id="descripcion" rows="4" placeholder="Ingrese la descripción" wire:model="cform.descripcion"
                        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring focus:ring-blue-200"></textarea>
                </div>
                <x-input-error for="uform.descripcion" />
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row-reverse">
                <x-button class="bg-blue-500 hover:bg-blue-700 text-white" wire:click="createCategory"
                    wire:loading.attr="disabled">
                    <i class="fas fa-add mr-1"></i>CREAR
                </x-button>
                <x-button class="bg-red-500 hover:bg-ted-700 text-white mr-2" wire:click="cancelar">
                    <i class="fas fa-xmark mr-1"></i>CANCELAR
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
