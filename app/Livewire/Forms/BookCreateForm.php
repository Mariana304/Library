<?php

namespace App\Livewire\Forms;

use App\Models\Book;
use Livewire\Attributes\Rule;
use Livewire\Form;

class BookCreateForm extends Form
{
    #[Rule('required')]
    public $title;

    #[Rule('required')]
    public $summary ;

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



    public function save(){
        $this->validate();
        $user = auth()->user();
        $book = new Book;
        $book->title = $this->title;
        $book->summary = $this->summary;
        $book->author = $this->autor;
        $book->pages = $this->paginas;
        $book->price = $this->precio;
        $book->category_id = $this->category_id;
        $book->user_id = $user->id; // Asigna la variable $miVariable al campo user_id
        $book->save();
        $book->tags()->attach($this->tags);
        $this->reset();
    }
}
