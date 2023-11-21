<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Admin extends Component
{

    public $users;
    public $userId = '';
    public $open = false;


    #[Rule('required')]
    public $name;

    #[Rule('required')]
    public $email;
    

    public function destroy($userId)
    {
        $user = User::find($userId);
        $user->delete();
        $this->users = User::all();
    }

    public function Edit($userId)
    {
        $this->open = true;
        $this->userId = $userId;
        $user = User::find($userId);
        // $this->category_id = $book->category_id;
        $this->name = $user->name;
        $this->email = $user->email;
    }


    public function update()
    {
        $this-> validate();
        $user = User::find($this->userId);
        $user->update($this->only('name', 'email'));
        $this->reset(['userId', 'open']);


    }


    public function mount()
    {
        $this->users= User::all();
    }

    public function render()
    {
        return view('livewire.admin');
    }
}
