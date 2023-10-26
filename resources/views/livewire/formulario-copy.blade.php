<div>

    <div class="flex justify-end mt-2 mb-8">     
        <x-button wire:click='openModalCreate'>
           Nuevo libro
        </x-button>
    </div>
    <form wire:submit="save">
        <x-dialog-modal wire:model="open">
            <x-slot name="title">
                Agregar Libro
            </x-slot>
            <x-slot name="summary">
                <div class="mb-4">
                    <x-label>
                        Nombre
                    </x-label>
                    <x-input class="w-full" wire:model="bookCreate.title" />
                    <x-input-error for="bookCreate.title" />
                </div>
                <div class="mb-4">
                    <x-label>
                        Reseña
                    </x-label>
                    <x-textarea class="w-full" wire:model="bookCreate.summary"></x-textarea>
                    <x-input-error for="bookCreate.summary" />
                </div>
                <div class="mb-4">
                    <x-label>
                        Categoria
                    </x-label>
                    <x-select class="w-full" wire:model="bookCreate.category_id">
                        <option value="" disabled>
                            Seleccione una categoria
                        </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="bookCreate.category_id" />
                </div>
                <div class="mb-4">
                    <x-label>
                        Etiquetas
                    </x-label>
                    <ul>
                        @foreach ($tags as $tag)
                            <li>
                                <label>
                                    <x-checkbox wire:model="bookCreate.tags" value="{{ $tag->id }}" />
                                    {{ $tag->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <x-input-error for="bookCreate.tags" />

                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-end mt-2">
                    <x-danger-button class="mr-3" wire:click="$set('open', false)">
                        Cancelar
                    </x-danger-button>

                    <x-button>
                        Agregar
                    </x-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    </form>


    {{-- Mostrar los books que hemos creado --}}
    <div class="bg-white  shadow rounded-lg p-6">

        <ul class="list-disc list-inside ">

            @foreach ($books as $book)
                <li class="flex justify-between mb-4 border-b border-gray-200 pb-2" wire:key="book-{{ $book->id }}">
                    {{ $book->title }}

                    <div>
                        <x-button wire:click="edit({{ $book->id }})">
                            Editar
                        </x-button>

                        <x-danger-button wire:click="destroy({{ $book->id }})">
                            Eliminar
                        </x-danger-button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    {{-- form para actualizar books --}}
    <form wire:submit="update">
        <x-dialog-modal wire:model="bookEdit.open">
            <x-slot name="title">
                Actualizar book
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label>
                        Nombre
                    </x-label>
                    <x-input class="w-full" wire:model="bookEdit.title" />
                    <x-input-error for="bookEdit.title" />
                </div>
                <div class="mb-4">
                    <x-label>
                        Contenido
                    </x-label>
                    <x-textarea class="w-full" wire:model="bookEdit.summary"></x-textarea>
                    <x-input-error for="bookEdit.summary" />
                </div>
                <div class="mb-4">
                    <x-label>
                        Categoria
                    </x-label>
                    <x-select class="w-full" wire:model="bookEdit.category_id">
                        <option value="" disabled>
                            Seleccione una categoria
                        </option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="bookEdit.category_id" />
                </div>
                <div class="mb-4">
                    <x-label>
                        Etiquetas
                    </x-label>
                    <ul>
                        @foreach ($tags as $tag)
                            <li>
                                <label>
                                    <x-checkbox wire:model="bookEdit.tags" value="{{ $tag->id }}" />
                                    {{ $tag->name }}
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <x-input-error for="bookEdit.tags" />

                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-end mt-2">
                    <x-danger-button class="mr-3" wire:click="$set('bookEdit.open', false)">
                        Cancelar
                    </x-danger-button>

                    <x-button>
                        Actualizar
                    </x-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    </form>

    @push('js')
        {{-- con este push, lo ponemos despues de haber inicializado livewire y no nos dara error de carga --}}
        <script>
            Livewire.on('book-created', function(comment) {
                // alert(comment);
                console.log(comment)
            });
        </script>
    @endpush
</div>