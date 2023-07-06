<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;

class MostrarVacante extends Component
{
    public function render()
    {

        $vacantes = Vacante::where('user_id',auth()->user()->id)->paginate(10);
        return view('livewire.mostrar-vacante',[
            'vacantes' => $vacantes
        ]);
    }
}
