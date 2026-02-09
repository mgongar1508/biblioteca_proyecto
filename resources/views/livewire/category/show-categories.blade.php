<x-miscomponentes.base>
    <x-miscomponentes.buscarCrear>
        @livewire('category.create-category')
    </x-miscomponentes.buscarCrear>
    <div class="overflow-x-auto">
        <table class="min-w-full border border-gray-200 rounded-lg">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">
                        <i class="fa-solid fa-hashtag mr-1"></i>
                        ID
                    </th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">
                        <i class="fa-solid fa-user mr-1"></i>
                        Nombre
                    </th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">
                        <i class="fa-solid fa-align-left mr-1"></i>
                        Descripción
                    </th>
                    <th class="px-4 py-3 text-left text-sm font-semibold text-gray-700">
                        <i class="fa-solid fa-align-left mr-1"></i>
                        Acciones
                    </th>
                </tr>
            </thead>

            <tbody>
                @foreach ($categories as $item)
                    <tr class="border-t">
                        <td class="px-4 py-3 text-sm text-gray-800">
                            {{ $item->id }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-800">
                            {{ $item->nombre }}
                        </td>
                        <td class="px-4 py-3">
                            <textarea
                                class="w-full rounded-md border border-gray-300 p-2 text-sm focus:border-blue-500 focus:ring focus:ring-blue-200"
                                rows="3" placeholder="Escribe la descripción...">{{ $item->descripcion }}</textarea>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex justify-start gap-4">
                                <button wire:click='edit({{ $item->id }})' title="Editar"
                                    class="text-blue-600 hover:text-blue-900 transition-colors">
                                    <i class="fa-solid fa-pen-to-square text-lg"></i>
                                </button>
                                <button title="Borrar" wire:click='borrar({{ $item->id }})'
                                    class="text-red-600 hover:text-red-900 transition-colors">
                                    <i class="fa-solid fa-trash text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- ------------------------------- Modal para editar ----------------------------- -->

    <x-dialog-modal wire:model='openEdit'>
        <x-slot name="title">
            Editar Categoria
        </x-slot>
        <x-slot name="content">
            <form class="max-w-md mx-auto bg-white p-6 rounded-lg shadow">

                <!-- Nombre -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fa-solid fa-tag mr-1"></i>
                        Nombre
                    </label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ingrese el nombre" value='{{ $uform->nombre }}'
                        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
                </div>
                <x-input-error for="uform.nombre" />

                <!-- Descripción -->
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">
                        <i class="fa-solid fa-align-left mr-1"></i>
                        Descripcion
                    </label>
                    <textarea name="descripcion" id="descripcion" rows="4" placeholder="Ingrese la descripción" 
                        class="w-full rounded-md border border-gray-300 px-3 py-2 text-sm focus:border-blue-500 focus:ring focus:ring-blue-200">{{ $uform->descripcion }}</textarea>
                </div>
                <x-input-error for="uform.descripcion" />
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-row-reverse">
                <x-button class="bg-blue-500 hover:bg-blue-700 text-white" wire:click="updateCategory"
                    wire:loading.attr="disabled">
                    <i class="fas fa-add mr-1"></i>Editar
                </x-button>
                <x-button class="bg-red-500 hover:bg-ted-700 text-white mr-2" wire:click="cancelar">
                    <i class="fas fa-xmark mr-1"></i>CANCELAR
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>


</x-miscomponentes.base>
