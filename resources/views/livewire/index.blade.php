<div class="relative">

    
        <div class="  bg-gray-800 h-auto justify-items-center   py-4 ">
            <header>

                <div class="mx-[500px] mt-2">
                    <x-input class="w-full px-2 h-7 rounded border border-[#acaaaa] outline-none  focus:ring-white"
                        placeholder="buscar" wire:model.live="search" type="search" />
                </div>
                <nav>
                    <div class="container h-auto grid md:grid-cols-6  w-auto  p-4 mx-auto mt-3 ">
                        @if (Route::has('login'))
                            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right ">
                                @auth
                                    <a href="{{ url('/dashboard') }}"
                                        class="font-semibold text-gray-400 hover:text-gray-500 focus:outline focus:outline-2 rounded-lg px-3 py-2 border border-lime-600 focus:rounded-sm focus:outline-gray-600">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}"
                                        class="font-semibold text-gray-400 hover:text-gray-500 focus:outline focus:outline-2 rounded-lg px-3 py-2 border border-lime-600 focus:rounded-sm focus:outline-gray-600">Soy
                                        vendedor</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}"
                                            class="ml-4 font-semibold text-gray-400 hover:text-gray-500 rounded-lg focus:outline px-3 py-2 border border-amber-500 focus:outline-2 focus:rounded-sm focus:outline-gray-600">Quiero
                                            ser vendedor</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </div>
                </nav>
            </header>
        </div>
    
    <header id="header"
        class="header bg-fixed h-72 sm:h-1/2 mb-24 bg-[url('public\storage\images\bg-library.avif')]">
        <p class=" sm:p-40 brightness-none text-[#623307] text-3xl sm:text-7xl italic font-bold text-center">Biblioteca
        </p>

    </header>

    <div class="container mx-auto mt-5 text-center rounded-lg  ">
        <!-- select-show -->
        <label class="ml-5 text-lg text[#ACAAAA]">Show
            <select class=" w-24 text-[#9c9c9c] ml-5 text-base border-none outline-none  focus:ring-white"
                wire:model.live="paginacion">
                <option>10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </label>

        <div class=" grid lg:grid-cols-2  mb-16   2xl:grid-cols-3  bg-orange-50  mt-4 sm:px-1 sm:py-1  rounded-lg ">
            @foreach ($books as $book)
                <div wire:click="$set('open', true)"
                    class="flex flex-col overflow-hidden shadow-lg text-overflow rounded-lg bg-white w-4/5 h-80 sm:h-80 md:h-60 mx-auto mb-12 mt-8 md:max-w-lg md:flex-row ">
                    <img class="h-48 w-full rounded-t-lg object-cover sm:h-48  md:w-48 md:h-auto md:rounded-none md:rounded-l-lg"
                        src="/storage/{{ $book->path_cover }}">
                    <div class="flex flex-col sm:h-80 justify-start p-6">
                        <h5 class="mb-2 text-sm sm:text-lg font-medium text-neutral-800">
                            {{ $book->title }}
                        </h5>
                        <p class="mb-5">
                            {{ Str::limit($book->summary, 50) }}
                        </p>
                        <p>
                            {{ $book->author }}
                        </p>

                        {{ $book->user_id }}

                    </div>
                </div>
            @endforeach
        </div>


        <form wire:submit.live="show">
            <x-dialog-modal wire:model="open">
                <x-slot name="title">
                    show book
                </x-slot>
                <x-slot name="content">
                    <div class="mb-4">
                        <x-label>
                            Titulo
                        </x-label>

                        <div
                            class=" grid lg:grid-cols-2  mb-16   2xl:grid-cols-3  bg-orange-50  mt-4 sm:px-1 sm:py-1  rounded-lg ">
                            @foreach ($books as $book)
                                <div
                                    class="flex flex-col overflow-hidden shadow-lg text-overflow rounded-lg bg-white w-4/5 h-80 sm:h-80 md:h-60 mx-auto mb-12 mt-8 md:max-w-lg md:flex-row ">
                                    <img class="h-48 w-full rounded-t-lg object-cover sm:h-48  md:w-48 md:h-auto md:rounded-none md:rounded-l-lg"
                                        src="/storage/{{ $book->path_cover }}">
                                    <div class="flex flex-col sm:h-80 justify-start p-6">
                                        <h5 class="mb-2 text-sm sm:text-lg font-medium text-neutral-800">
                                            {{ $book->title }}
                                        </h5>


                                        <div class="mb-4">
                                            <x-label>
                                                Reseña
                                            </x-label>
                                            <p class="mb-5">
                                                {{ Str::limit($book->summary, 50) }}
                                            </p>
                                        </div>
                                        <p>
                                            {{ $book->author }}
                                        </p>

                                        {{ $book->user_id }}

                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>

                </x-slot>
                <x-slot name="footer">
                    <div class="flex justify-end mt-2">
                        <x-danger-button class="mr-3" wire:click="$set('open', false)">
                            Cancelar
                        </x-danger-button>
                    </div>
                </x-slot>
            </x-dialog-modal>

        </form>
        <div class="mb-8">
            {{ $books->links() }}
        </div>
    </div>

</div>
