<?php

namespace App\Livewire\Author;

use App\Livewire\Forms\Author\UpdateAuthorForm;
use App\Models\Author;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowAuthors extends Component
{
    public string $campo="id";
    public string $orden="desc";
    public string $buscar="";
    public bool $openEdit=false;
    public Author $author;
    public UpdateAuthorForm $uform;

    #[On('evtAutorCreado')]
    public function render()
    {
        $authors = Author::select('authors.*')
        ->where(function($q){
            $q->where('nombre', 'like', "%{$this->buscar}%")
            ->orwhere('apellidos', 'like', "%{$this->buscar}%")
            ->orwhere('nacionalidad', 'like', "%{$this->buscar}%");
        })
        ->orderBy($this->campo, $this->orden)
        ->get();
        return view('livewire.author.show-authors', compact('authors'));
    }

    public function ordenar(string $campo)
    {
        $this->orden = ($this->orden == 'asc') ? 'desc' : 'asc';
        $this->campo = $campo;
    }

    //borrado
    public function mostrarConfirmacion(Author $author)
    {
        $this->author = $author;
        $this->dispatch('evtBorrarAutor', destino: 'cursos.show-user-cursos');
    }

    #[On('evtBorrarAutor')]
    public function delete(){
        $this->author->delete();
        $this->dispatch('mensaje', 'autor borrado');
        $this->reset('author');
    }

    //update
    public function edit(Author $author){
        $this->uform->setAuthor($author);
        $this->openEdit = true;
    }

    public function update(){
        $this->uform->updateAuthorForm();
        $this->cancelarEdit();
        $this->dispatch('mensaje', 'Autor actualizado');
    }

    public function cancelarEdit(){
        $this->openEdit = false;
        $this->uform->cancelar();
    }

}
