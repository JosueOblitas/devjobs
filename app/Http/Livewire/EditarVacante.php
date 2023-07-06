<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditarVacante extends Component
{
    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nuevo;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|min:3',
        'salario' => 'required',
        'categoria' => 'required',
        'empresa' => 'required',
        'ultimo_dia' => 'required',
        'descripcion' => 'required',
        'imagen_nuevo' => 'required|image|max:1024'
    ];

    public function mount(Vacante $vacante){
        $this->vacante_id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }
    
    public function editarVacante(){
        $datos = $this->validate();

        $vacante = Vacante::find($this->vacante_id);

        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];

        $vacante->save();

        session()->flash('mensaje','La Vacante se actualizó correctamente');
        return redirect()->route('vacantes.index');

    }

    public function render()
    {
        //Consultar BD
        $salario = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante',[
            'salarios' => $salario,
            'categorias' => $categorias
        ]);
    }
}
