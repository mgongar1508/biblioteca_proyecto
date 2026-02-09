<x-miscomponentes.base>
    <div class='flex flex-row-reverse'>
        @livewire('author.create-author')
    </div>

    <div class="container mx-auto py-8 px-4">
        <div class="overflow-x-auto bg-white rounded-lg shadow-md border border-gray-200">
            <table class="min-w-full leading-normal">
                <thead class="bg-gray-100 border-b-2 border-gray-200">
                    <tr>
                        <th scope="col"
                            class="py-3 px-6 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                            ID
                        </th>
                        <th scope="col"
                            class="py-3 px-6 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                            Nombre
                        </th>
                        <th scope="col"
                            class="py-3 px-6 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                            Apellidos
                        </th>
                        <th scope="col"
                            class="py-3 px-6 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                            Nacionalidad
                        </th>
                        <th scope="col"
                            class="py-3 px-6 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                            Fecha Nacimiento
                        </th>
                        <th scope="col"
                            class="py-3 px-6 text-left text-xs font-bold text-gray-600 uppercase tracking-wider">
                            Biografía
                        </th>
                        <th scope="col"
                            class="py-3 px-6 text-center text-xs font-bold text-gray-600 uppercase tracking-wider">
                            Acciones
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                    @foreach ($authors as $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="py-4 px-6 text-sm font-medium text-gray-900">
                                {{ $item->id }}
                            </td>

                            <td class="py-4 px-6 text-sm font-medium text-gray-900">
                                {{ $item->nombre }}
                            </td>

                            <td class="py-4 px-6 text-sm text-gray-700">
                                {{ $item->apellidos }}
                            </td>

                            <td class="py-4 px-6 text-sm text-gray-700">
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">
                                    {{ $item->nacionalidad }}
                                </span>
                            </td>

                            <td class="py-4 px-6 text-sm text-gray-700">
                                {{ $item->fecha_nacimiento }}
                            </td>

                            <td class="py-4 px-6 text-sm text-gray-600 max-w-xs">
                                <p class="truncate">
                                    {{ $item->biografia }}
                                </p>
                            </td>

                            <td class="py-4 px-6 text-sm font-medium text-center space-x-3">
                                <button wire:click='edit({{ $item->id }})' class="text-indigo-600 hover:text-indigo-900 transition-colors" title="Editar">
                                    <i class="fas fa-edit text-lg"></i>
                                </button>

                                <button wire:click='mostrarConfirmacion({{ $item->id }})'
                                    class="text-red-600 hover:text-red-900 transition-colors" title="Eliminar">
                                    <i class="fas fa-trash text-lg"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if($uform->author)
    <x-dialog-modal maxWidth="2xl" wire:model='openEdit'>
        <x-slot name="title">Editar Autor</x-slot>
        <x-slot name="content">
            <x-label value='nombre' for="nombre" class='mb-1'></x-label>
            <x-input type='text' class='w-full mb-4' id='nombre' value="{{ @old('nombre') }}"
                wire:model='uform.nombre'></x-input>
            <x-input-error for='uform.nombre'></x-input-error>
            <x-label value='apellidos' for="apellidos" class='mb-1'></x-label>
            <x-input type='text' class='w-full mb-4' id='apellidos' wire:model='uform.apellidos'></x-input>
            <x-input-error for='uform.apellidos'></x-input-error>
            <x-label value='nacionalidad' for="nacionalidad" class='mb-1'></x-label>
            <x-input type='text' class='w-full mb-4' id='nacionalidad' wire:model='uform.nacionalidad'></x-input>
            <x-input-error for='uform.nacionalidad'></x-input-error>
            <x-label value='fecha_nacimiento' for="fecha_nacimiento" class='mb-1'></x-label>
            <x-input type='date' class='w-full mb-4' id='fecha_nacimiento'
                wire:model='uform.fecha_nacimiento'></x-input>
            <x-input-error for='uform.fecha_nacimiento'></x-input-error>
            <x-label value='biografia' for="biografia" class='mb-1'></x-label>
            <x-input type='text' class='w-full mb-4' id='biografia' wire:model='uform.biografia'></x-input>
            <x-input-error for='uform.biografia'></x-input-error>
        </x-slot>
        <x-slot name="footer">
            <div>
                <x-button type="submit" wire:click='update' wire:loading.attr='disable'
                    class="bg-blue-500 text-white">
                    Actualizar
                </x-button>
                <x-button wire:click='cancelarEdit' class="bg-red-500 text-white">
                    Cancelar
                </x-button>
            </div>
        </x-slot>
    </x-dialog-modal>
    @endif
</x-miscomponentes.base>
