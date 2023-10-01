<x-app-layout>
    <h1>Agregar nueva cuenta</h1>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('cuentas.store') }}">
            @csrf
            <input type="text"
                name="nombre"
                placeholder="{{ __('Nombre de la cuenta') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            />
            @csrf
            <select 
                name="tipo"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                <option disabled="disabled" selected="selected">Seleccionar tipo de cuenta</option>
                <option value="efectivo">Efectivo</option>
                <option value="debito">Débito</option>
                <option value="credito">Crédito</option>
            </select>
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Agregar cuenta') }}</x-primary-button>
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
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>