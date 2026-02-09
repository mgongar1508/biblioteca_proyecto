<?php

namespace App\Livewire\Category;

use App\Livewire\Forms\Categories\UpdateCategoryForm;
use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowCategories extends Component
{

    public string $campo="id";
    public string $orden="desc";
    public string $buscar="";
    public bool $openEdit = false;
    public Category $category;
    public UpdateCategoryForm $uform;

    #[On('evtCategoryCreada')]
    public function render()
    {
        $categories = Category::select('categories.*')
        ->where('nombre', 'like', "%{$this->buscar}%")
        ->orWhere('descripcion', 'like', "%{$this->buscar}%")
        ->orderBy($this->campo, $this->orden)
        ->get();
        return view('livewire.category.show-categories', compact('categories'));
    }

    public function ordenar(string $campo){
        $this->campo = $campo;
        $this->orden = ($this->orden == 'asc') ? 'desc' : 'asc';
    }

    public function updateBuscar(){
        $this->resetPage();
    }

    public function borrar(Category $category){
        $category->delete();
        $this->dispatch('mensaje', 'Categoria Borrada');
        $this->dispatch('evtCategoryCreada')->to(ShowCategories::class);
    }

    //-- Metodo para editar
    public function edit(Category $category){
        $this->uform->setCategory($category);
        $this->openEdit=true;
    }

    public function updateCategory(){
        $this->uform->editForm();
        $this->uform->cancelarForm();
        $this->dispatch('mensaje', 'Categoria actualizada');
    }

    public function cancelar(){
        $this->openEdit=false;
        $this->uform->cancelarForm();
    }
}
