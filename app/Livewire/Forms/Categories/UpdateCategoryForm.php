<?php

namespace App\Livewire\Forms\Categories;

use App\Models\Category;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UpdateCategoryForm extends Form
{
    public ?Category $category = null;
    
    #[Validate(['required', 'string', 'min:3', 'max:100'])]
    public string $nombre='';

    #[Validate(['required', 'string', 'min:5', 'max:300'])]
    public string $descripcion='';

    public function setCategory(Category $category){
        $this->category = $category;
        $this->nombre = $category->nombre;
        $this->descripcion = $category->descripcion;
    }

    public function editForm(){
        $this->validate();
        $this->category->update($this->all());
    }

    public function cancelarForm(){
        $this->reset('nombre', 'descripcion');
        $this->resetValidation();
    }
}
