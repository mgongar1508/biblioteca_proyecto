<?php

namespace App\Livewire\Forms\Author;

use App\Models\Author;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateAuthorForm extends Form
{
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

    public function crearAuthorForm(){
        $datos = $this->validate();
        Author::create($datos);
    }

    public function cancelarForm(){
        $this->resetValidation();
        $this->reset();
    }

}
