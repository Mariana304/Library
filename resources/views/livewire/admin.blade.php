<div>
    <div class="bg-white  shadow rounded-lg p-6">


        <ul class="list-disc list-inside ">

            @foreach ($users as $user)
                <div class="bg-white  shadow rounded-lg p-6">

                    <ul class="list-disc list-inside ">


                        <li class="flex justify-between mb-4 border-b border-gray-200 pb-2"
                            wire:key="user-{{ $user->id }}">
                            {{ $user->name }}

                            <div>
                                <x-button wire:click="Edit({{ $user->id }})">
                                    Editar
                                </x-button>

                                <x-danger-button wire:click="destroy({{ $user->id }})">
                                    Eliminar
                                </x-danger-button>
                            </div>
                        </li>
                    </ul>
                </div>
            @endforeach
        </ul>
    </div>
    <form wire:submit.live="update">
        <x-dialog-modal wire:model="open">
            <x-slot name="title">
                Actualizar book
            </x-slot>
            <x-slot name="content">
                <div class="mb-4">
                    <x-label>
                        Titulo
                    </x-label>
                    <x-input class="w-full" wire:model="name" />
                    <x-input-error for="name" />
                </div>
                <div class="mb-4">
                    <x-label>
                        Reseña
                    </x-label>
                    <x-textarea class="w-full" wire:model="email"></x-textarea>
                    <x-input-error for="email" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <div class="flex justify-end mt-2">
                    <x-danger-button class="mr-3" wire:click="$set('open', false)">
                        Cancelar
                    </x-danger-button>
                    <x-button>
                        Actualizar
                    </x-button>
                </div>
            </x-slot>
        </x-dialog-modal>
    </form>
</div>
