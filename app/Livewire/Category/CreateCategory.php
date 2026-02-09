<?php

namespace App\Livewire\Category;

use App\Livewire\Forms\Categories\CreateCategoryForm;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateCategory extends Component
{
    public CreateCategoryForm $cform;
    public Category $category;

    public bool $openCrear = false;
    public function render()
    {
        return view('livewire.category.create-category');
    }

    public function createCategory(){
        $this->cform->crearCategoryForm();
        $this->cancelar();
        $this->dispatch('mensaje', 'Categoria creada con exito.');
        $this->dispatch('evtCategoryCreada')->to(ShowCategories::class);
    }

    public function cancelar(){
        $this->openCrear = false;
        $this->cform->cancelarForm();
    }
}
