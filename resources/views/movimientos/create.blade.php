<x-app-layout>
    <h1 class="mx-auto p-4 sm:p-6 lg:p-8">Agregar nuevo movimiento</h1>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('movimientos.store') }}">
            <span>Movimiento </span> 
            <input type="radio" name="movimiento_cuentas" id="unacuenta" checked="checked" onchange="cambiarCantidadCuentas()"> <label for="unacuenta"> en una sola cuenta</label>
            <input type="radio" name="movimiento_cuentas" id="entrecuentas" onchange="cambiarCantidadCuentas()"> <label for="entrecuentas"> entre cuentas</label>
            @csrf
            <select name="cuenta_origen_id" style="display: none;"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option disabled="disabled" selected="selected">Seleccionar cuenta origen</option>
                @foreach ($cuentas as $cuenta)
                    <option value="{{ $cuenta->id }}">{{ $cuenta->nombre }} - {{ $cuenta->tipo }}</option>
                @endforeach
            </select>
            @csrf
            <select name="cuenta_id"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option disabled="disabled" selected="selected">Seleccionar cuenta destino</option>
                @foreach ($cuentas as $cuenta)
                    <option value="{{ $cuenta->id }}">{{ $cuenta->nombre }} - {{ $cuenta->tipo }}</option>
                @endforeach
            </select>
            @csrf
            <select 
                name="tipo"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option disabled="disabled" selected="selected">Seleccionar tipo de movimiento</option>
                <option value="ingreso">Ingreso</option>
                <option value="egreso">Egreso</option>
            </select>
            @csrf
            <select 
                name="categoria"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option disabled="disabled" selected="selected">Seleccionar categoria de movimiento</option>
                <option value="despensa">Despensa</option>
                <option value="luz">Luz</option>
                <option value="celular">Celular</option>
                <option value="renta">Renta</option>
                <option value="michis">Michis</option>
                <option value="diversion">Diversión</option>
                <option value="restaurantes">Restaurantes</option>
            </select>
            @csrf
            <input type="number"
                step="0.1"
                name="cantidad"
                placeholder="{{ __('Cantidad') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            @csrf
            <input type="date" id="start" name="fecha" 
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm" />
            <x-input-error :messages="$errors->get('cantidad')" class="mt-2" />
            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Agregar movimiento') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
<script>
    function cambiarCantidadCuentas(){
        if(document.getElementById('unacuenta').checked) {
            document.getElementsByName('cuenta_origen_id')[0].style.display = 'none';
            document.getElementsByName('cuenta_origen_id')[0].options[0].selected = true;
        } else {
            document.getElementsByName('cuenta_origen_id')[0].style.display = 'block';
        }
    }
</script>