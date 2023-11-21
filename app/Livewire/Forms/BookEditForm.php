<?php

namespace App\Livewire\Forms;

use App\Models\Book;
use Livewire\Attributes\Rule;
use Livewire\Features\SupportFileUploads\WithFileUploads;
use Livewire\Form;

class BookEditForm extends Form
{
    use WithFileUploads;

    #[Rule('required')]
    public $path_cover;


    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $summary;

    #[Rule('required|exists:categories,id')]
    public $category_id = '';

    #[Rule('required|array')]
    public $tags = [];

    #[Rule('required')]
    public $autor;

    #[Rule('required')]
    public $paginas;

    #[Rule('required')]
    public $precio;


    public $bookId = '';
    public $open = false;


    public function Edit($bookId)
    {
        $this->open = true;
        $this->bookId = $bookId;
        $book = Book::find($bookId);
        $this->category_id = $book->category_id;
        $this->title = $book->title;
        $this->summary = $book->summary;
        $this->autor = $book->author;
        $this->paginas = $book->pages;
        $this->precio = $book->price;
        $this->path_cover = $book->path_cover;
        $this->tags = $book->tags->pluck('id')->toArray();
    }


    public function update()
    {

        $this-> validate();
        $book = Book::find($this->bookId);
        $book->update($this->only('category_id', 'title', 'summary')
        );
        $book->tags()->sync($this->tags);
        $this->reset(['bookEditId', 'bookEdit', 'open']);
    }
}
