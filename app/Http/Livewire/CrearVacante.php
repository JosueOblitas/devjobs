<?php

namespace App\Http\Livewire;

use App\Models\Salario;
use App\Models\Categoria;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|min:3',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen' => 'required|image|max:1024'
    ];
    public function crearVacante(){
       $datos = $this->validate();
       //Almacenar imagen

       $imagen  = $this->imagen->store('public/vacantes');
       $datos["imagen"] = str_replace('public/vacantes/', '', $imagen);
       //Crear vacante
        Vacante::create([
            'titulo' => $datos['titulo'],
            'imagen' => $datos['imagen'], 
            'descripcion' => $datos['descripcion'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'categoria_id' => $datos['categoria'],
            'salario_id' => $datos["salario"],
            'user_id' => auth()->user()->id,
        ]);
       //Crear Mensaje
       session()->flash('mensaje','La Vacante se publicó correctamente');

       //Redireccionar al usuario
       return redirect()->route('vacantes.index');
    }

    public function render()
    {
        //Consultar BD
        $salario = Salario::all();
        $categorias = Categoria::all();
        return view('livewire.crear-vacante',
        [
            'salarios' => $salario,
            'categorias' => $categorias
        ]);
    }
}
