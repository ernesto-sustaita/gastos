<x-app-layout>
    <h1>Agregar nuevo movimiento</h1>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('movimientos.store') }}">
            @csrf
            <select name="cuenta_id"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option disabled="disabled" selected="selected">Seleccionar cuenta</option>
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
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Fecha de corte</th>
                    </tr>
                </thead>
                <tbody>
            @foreach ($cuentas as $cuenta)
                <tr>
                    <td>{{ $cuenta->nombre }}</td>
                    <td>{{ $cuenta->tipo }}</td>
                    <td>{{ $cuenta->fecha_corte }}</td>
                </tr>
                @foreach ($cuenta->movimientos as $movimiento)
                    <tr>
                        <td>{{ $movimiento->tipo }}</td>
                        <td>{{ $movimiento->cantidad }}</td>
                        <td>{{ $movimiento->fecha }}</td>
                    </tr>
                @endforeach
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>