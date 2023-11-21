<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $users;
    public $search = '';
    public $paginacion = '25';
    public $open = false;
    public $showBook;


    public function update()
    {

        $this->showBook = Book::all();

    }


    public function mount()
    {

        $this->users = User::all();
    }
    public function render()
    {
        $books = Book::where('title', 'like', '%' . $this->search . '%')
        ->orWhere('price', 'like', '%' . $this->search . '%')
        ->orWhere('author', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate($this->paginacion);

        return view('livewire.index', compact('books'));
    }
}
