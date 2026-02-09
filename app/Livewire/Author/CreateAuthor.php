<?php

namespace App\Livewire\Author;

use App\Livewire\Forms\Author\CreateAuthorForm;
use Livewire\Attributes\On;
use Livewire\Component;
use PHPUnit\Framework\Constraint\IsFalse;

class CreateAuthor extends Component
{
    public bool $openCrear = false;
    public CreateAuthorForm $cform;
    
    public function render()
    {
        return view('livewire.author.create-author');
    }

    public function crearAuthor(){
        $this->cform->crearAuthorForm();
        $this->cancelar();
        $this->dispatch('mensaje', 'autor creado');
        $this->dispatch('evtAutorCreado')->to(ShowAuthors::class);
    }

    public function cancelar(){
        $this->openCrear=false;
        $this->cform->cancelarForm();
    }
}
