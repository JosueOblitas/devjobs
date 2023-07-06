<form class="md:w-1/2 flex flex-col space-y-5" wire:submit.prevent="crearVacante">
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model="titulo" :value="old('email')" placeholder="Titulo Vacante"/>
        <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
    </div>
    <div class="">
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select
            id="salario"
            wire:model="salario"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:border-indigo-300
            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
        >
            <option value="">-- Selecciona un rol --</option>

            @foreach ($salarios as $salario)
                <option value="{{$salario->id}}">{{ $salario->salario }}</option>
                
            @endforeach

        </select>
        <x-input-error :messages="$errors->get('salario')" class="mt-2" />
    </div>
    <div class="">
        <x-input-label for="categoria" :value="__('Categoría')" />
        <select
            id="categoria"
            wire:model="categoria"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:border-indigo-300
            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
        >
            <option value="">-- Selecciona un rol --</option>
            @forelse ($categorias as $categoria)
                <option value="{{$categoria->id}}">{{ $categoria->categoria }}</option>
            @endforeach
        </select>
        <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model="empresa" :value="old('email')" placeholder="Empresa: ej. Netflix, Uber, Shoopify"/>
        <x-input-error :messages="$errors->get('empresa')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo día para postular')" />
        <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')" placeholder="Ultimo día para postularse"/>
        <x-input-error :messages="$errors->get('ultimo_dia')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="descripcion" :value="__('Descripçión Puesto')" />
        <textarea
        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:border-indigo-300
            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
            wire:model="descripcion" id="descripcion" placeholder="Descripción general del puesto, experiencia"></textarea>
        <x-input-error :messages="$errors->get('descripcion')" class="mt-2" />
    </div>
    <div class="my-10">
        <x-input-label for="imagen" :value="__('Imagen')" />
        <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen"/>
        <div class="my-5 w-80">
            @if ($imagen)
                <img src="{{ $imagen->temporaryUrl() }}" alt="Imagen Vacante">
            @endif
        </div>
        <x-input-error :messages="$errors->get('imagen')" class="mt-2" />
    </div>
    <x-primary-button class="mt-5 justify-center">
        {{ __('Crear vacante') }}
    </x-primary-button>
</form>