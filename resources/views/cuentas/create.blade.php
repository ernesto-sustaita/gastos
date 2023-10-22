<x-app-layout>
    <h1 class="mx-auto p-4 sm:p-6 lg:p-8">Agregar nueva cuenta</h1>
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
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                onchange="mostrarOcultarFecha()">
                <option disabled="disabled" selected="selected">Seleccionar tipo de cuenta</option>
                <option value="efectivo">Efectivo</option>
                <option value="debito">Débito</option>
                <option value="credito">Crédito</option>
            </select>
            @csrf
            <label class="hidden" for="fechaCorte">Fecha de corte</label>
            <input type="date" id="fechaCorte" name="fecha_corte" 
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm hidden" />
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
            <x-input-error :messages="$errors->get('tipo')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Agregar cuenta') }}</x-primary-button>
        </form>
    </div>
</x-app-layout>
<script>
    function mostrarOcultarFecha() {
        if(document.getElementsByName('tipo')[0].value == 'credito') {
            document.getElementById('fechaCorte').style.display = 'block';
            document.querySelector("label[for='fechaCorte']").style.display = 'block';
        } else {
            document.getElementById('fechaCorte').style.display = 'none';
            document.getElementById('fechaCorte').value = '';
            document.querySelector("label[for='fechaCorte']").style.display = 'none';
        }
    }
</script>