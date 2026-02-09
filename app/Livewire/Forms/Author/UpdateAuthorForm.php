<?php

namespace App\Livewire\Forms\Author;

use App\Models\Author;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateAuthorForm extends Form
{
    public ?Author $author = null;

    #[Validate('required', 'string', 'min:3', 'max:150')]
    public string $nombre="";

    #[Validate('required', 'string', 'min:3', 'max:150')]
    public string $apellidos="";

    #[Validate('required', 'string', 'min:3', 'max:150')]
    public string $nacionalidad="";

    #[Validate('required', 'date')]
    public string $fecha_nacimiento="";

    #[Validate('required', 'string', 'min:5', 'max:300')]
    public string $biografia="";

    public function setAuthor(Author $author){
        $this->author = $author;
        $this->nombre = $author->nombre;
        $this->apellidos = $author->apellidos;
        $this->nacionalidad = $author->nacionalidad;
        $this->fecha_nacimiento = $author->fecha_nacimiento;
        $this->biografia = $author->biografia;
    }

    public function updateAuthorForm(){
        $datos = $this->validate();
        $this->author->update($datos);
    }
    
    public function cancelar(){
        $this->resetValidation();
        $this->reset();

    }
}
