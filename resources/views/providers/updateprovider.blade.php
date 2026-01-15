<x-app>
    <div class="max-w-xl mx-auto bg-white border border-gray-200 rounded-xl shadow-sm p-6">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Editar proveedor
        </h1>

        @include('providers._form', ['provider' => $provider])

    </div>
</x-app>
