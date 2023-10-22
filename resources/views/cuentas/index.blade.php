<x-app-layout>
    <h1 class="mx-auto p-4 sm:p-6 lg:p-8">Mis cuentas</h1>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <a href="{{ route('cuentas.create') }}" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">Agregar cuenta</a>
        </div>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-y">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tipo</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Fecha de corte</th>
                    </tr>
                </thead>
                <tbody>
            @foreach ($cuentas as $cuenta)
                <tr class="odd:bg-white even:bg-gray-100 dark:odd:bg-slate-900 dark:even:bg-slate-800">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">{{ $cuenta->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                    @switch($cuenta->tipo)
                        @case('efectivo')
                            Efectivo
                            @break
                    
                        @case('debito')
                            Débito
                            @break
                    
                        @case('credito')
                            Crédito
                            @break
                    @endswitch
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                    @if ($cuenta->fecha_corte != '')
                        {{ $cuenta->fecha_corte }}
                    @else
                        N/A
                    @endif
                    </td>
                </tr>
            @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>