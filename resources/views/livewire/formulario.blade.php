<div>

    <div class="flex justify-end mt-2 mb-8">
        <x-button wire:click='openModalCreate'>
            Nuevo libro
        </x-button>
    </div>
    <form wire:submit="save" enctype="multipart/form-data">
        <x-dialog-modal wire:model="open">
            <x-slot name="title">
                Agregar Libro
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label>
                        Titulo
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
                        Autor
                    </x-label>
                    <x-input class="w-full" wire:model="bookCreate.autor" />
                    <x-input-error for="bookCreate.autor" />
                </div>

                <div>
                    <label for="bookCreate.path_cover" class="block font-semibold mb-2">Agregar portada</label>
                    <input type="file" class="w-full p-2 border rounded-md" wire:model="bookCreate.path_cover">
                    @error('bookCreate.path_cover')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                @if ($bookCreate->path_cover)
                    <img class="w-36 h-36" src="{{ $bookCreate->path_cover->temporaryUrl() }}" alt="">
                @endif

                <div class="mb-4">
                    <x-label>
                        Numero de páginas
                    </x-label>
                    <x-input type='number' class="w-full" wire:model="bookCreate.paginas" />
                    <x-input-error for="bookCreate.paginas" />
                </div>

                <div class="mb-4">
                    <x-label>
                        Precio
                    </x-label>
                    <x-input type='number' class="w-full" wire:model="bookCreate.precio" />
                    <x-input-error for="bookCreate.precio" />
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
    <form wire:submit="update" enctype="multipart/form-data">
        <x-dialog-modal wire:model="bookEdit.open">
            <x-slot name="title">
                Actualizar book
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label>
                        Titulo
                    </x-label>
                    <x-input class="w-full" wire:model="bookEdit.title" />
                    <x-input-error for="bookEdit.title" />
                </div>
                <div class="mb-4">
                    <x-label>
                        Reseña
                    </x-label>
                    <x-textarea class="w-full" wire:model="bookEdit.summary"></x-textarea>
                    <x-input-error for="bookEdit.summary" />
                </div>

                <div class="mb-4">
                    <x-label>
                        Autor
                    </x-label>
                    <x-input class="w-full" wire:model="bookEdit.autor" />
                    <x-input-error for="bookEdit.autor" />
                </div>

                <div>
                    <label for="bookEdit.path_cover" class="block font-semibold mb-2">Agregar portada</label>
                    <input type="file" class="w-full p-2 border rounded-md" value="{{ old('bookEdit.path_cover') }}"
                        wire:model="bookEdit.path_cover">
                    @error('bookEdit.path_cover')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                


                <div class="mb-4">
                    <x-label>
                        Número de páginas
                    </x-label>
                    <x-input type='number' class="w-full" wire:model="bookEdit.paginas" />
                    <x-input-error for="bookEdit.paginas" />
                </div>


                <div class="mb-4">
                    <x-label>
                        Precio
                    </x-label>
                    <x-input type='number' class="w-full" wire:model="bookEdit.precio" />
                    <x-input-error for="bookEdit.precio" />
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
