<?php

namespace App\Livewire;

use App\Livewire\Forms\BookCreateForm;
use App\Livewire\Forms\BookEditForm;
use App\Models\Book;
use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Formulario extends Component
{
    use WithFileUploads;

    public $categories, $tags;

    public BookCreateForm $bookCreate;
    public BookEditForm $bookEdit;

    public $books;

    public $open = false;
    public function edit($bookId)
    {
        $this->resetValidation();
        $this->bookEdit->edit($bookId);
    }


    //METODO ACTUALIZAR
    public function update()
    {
        $this->bookEdit->update();
        $this->books = Book::all();

        $this->dispatch('book-created', 'Articulo editado');
    }

    public function destroy($bookId)
    {
        $book = Book::find($bookId);
        $book->delete();
        $this->books = Book::all();
        $this->dispatch('book-created', 'Articulo eliminado');
    }


    public function openModalCreate()
    {
        $this->open = true;
    }


    //METODO GUARDAR
    public function save()
    {
        $this->bookCreate->save();
        $this->books = Book::all(); //despues de que lo creo compacto nuevmente el modelo, para que se actualice
        $this->reset('open');
        $this->dispatch('book-created', 'Nuevo articulo creado'); //le pasamos como parametro lo que quiero que se agregue al array comments
    }

    //Ciclo de vida de un componente 
    //Metodo que se ejecuta cada vez que se reenderice a este componente, seria el equivalente al constructor en POO
    public function mount()
    {
        $this->categories = Category::all();
        $this->tags = Tag::all();
        $this->books = Book::all();
    }

    public function updating($property, $value)
    {

        if ($property == 'bookCreate.category_id') {
            if ($value > 8) {
                throw new \Exception("No puedes seleccionar esta propiedad");
            }
        }
    }
    public function render()
    {
        $user = auth()->user();

        if ($user) {
            $books = Book::where('user_id', $user->id)->get();
        } else {
            $books = collect(); // Si el usuario no está autenticado, crea una colección vacía
        }

        $this->books = $books;
        return view('livewire.formulario');
    }
}
