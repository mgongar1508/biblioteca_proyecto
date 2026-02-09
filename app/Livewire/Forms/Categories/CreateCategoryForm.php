<?php

namespace App\Livewire\Forms\Categories;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CreateCategoryForm extends Form
{
    #[Validate(['required', 'string', 'min:3', 'max:100'])]
    public string $nombre='';

    #[Validate(['required', 'string', 'min:5', 'max:300'])]
    public string $descripcion='';

    public function crearCategoryForm(){
        $this->validate();
        Category::create($this->all());
    }

    public function cancelarForm(){
        $this->resetValidation();
        $this->reset();
    }
}
