<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ContentComponent extends Component
{

    use WithPagination;
    public $users;
    public $search = '';
    public $paginacion = '25';
    public $open = false;
    public $showBook;
    public $bookId = '';
    public $title;
    public $summary;
    public $path_cover;
    public $price;
    public $author; 
    public $pages; 


    public function update()
    {
       

        $this->showBook = Book::all();

    }

    public function Edit($bookId)
    {

        $this->open = true;
        $this->bookId = $bookId;
        $book = Book::find($bookId);
        $this->title = $book->title;
        $this->summary = $book->summary;
        $this->path_cover = $book->path_cover;
        $this->price = $book->price;
        $this->author = $book->author;
        $this->pages = $book->pages;
        
    }


    public function mount()
    {
        $this->users= User::all();
     
    }


    public function render()
    {

        $books = Book::where('title', 'like', '%' . $this->search . '%')
        ->orWhere('price', 'like', '%' . $this->search . '%')
        ->orWhere('author', 'like', '%' . $this->search . '%')
        ->orderBy('id', 'desc')
        ->paginate($this->paginacion);
       

        return view('livewire.content-component', compact('books'));
    }
}
