<x-app-layout>
    <h1 class="mx-auto p-4 sm:p-6 lg:p-8">Movimientos</h1>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <a href="{{ route('movimientos.create') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">Agregar movimiento</a>
        </div>
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
                        @if (count($cuenta->movimientos) > 0)
                        <tr>
                            <td colspan="3">
                                <table class="ml-6 p-4 sm:p-6 lg:p-8">
                                    <thead>
                                        <tr>
                                            <th>Movimiento</th>
                                            <th>Cantidad</th>
                                            <th>Categoría</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cuenta->movimientos as $movimiento)
                                            <tr>
                                                <td>{{ $movimiento->tipo }}</td>
                                                <td>{{ $movimiento->cantidad }}</td>
                                                <td>{{ $movimiento->categoria }}</td>
                                                <td>{{ $movimiento->fecha }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>    
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>