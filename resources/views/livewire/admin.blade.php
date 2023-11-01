<div>
    <div class="bg-white  shadow rounded-lg p-6">


        <ul class="list-disc list-inside ">

            @foreach ($users as $user)
                <li class="flex justify-between mb-4 border-b border-gray-200 pb-2">
                    {{ $user->name }}

                    <span>{{ $user->email }}</span>


                    <div>
                        <x-button>
                            Editar
                        </x-button>

                        <x-danger-button>
                            Eliminar
                        </x-danger-button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
