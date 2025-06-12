@if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
        <strong>Erros encontrados:</strong>
        <ul class="mt-2 list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@csrf

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Nome</label>
    <input type="text" name="nome" value="{{ old('nome', $job_offer->nome ?? '') }}"
        class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Tipo</label>
    <input type="text" name="tipo" value="{{ old('tipo', $job_offer->tipo ?? '') }}"
        class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Descrição</label>
    <textarea name="descricao"
        class="form-textarea mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500"
        rows="3">{{ old('descricao', $job_offer->descricao ?? '') }}</textarea>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Cidade</label>
    <select name="cidade_id"
        class="form-select mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
        <option value="">Selecione uma cidade</option>
        @foreach($cities as $cidade)
            <option value="{{ $cidade->id }}"
                {{ old('cidade_id', $job_offer->cidade_id ?? '') == $cidade->id ? 'selected' : '' }}>
                {{ $cidade->nome }} - {{ $cidade->estado }}
            </option>
        @endforeach
    </select>
</div>

<!-- Inputs lat/lng -->
<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Latitude</label>
    <input id="input-latitude" type="text" name="lat" value="{{ old('lat', $job_offer->lat ?? '') }}"
        class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
</div>

<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700">Longitude</label>
    <input id="input-longitude" type="text" name="lng" value="{{ old('lng', $job_offer->lng ?? '') }}"
        class="form-input mt-1 block w-full rounded-md shadow-sm border-gray-300 focus:ring-indigo-500 focus:border-indigo-500" required>
</div>

<!-- Mapa -->
<div class="mb-4">
    <label class="block font-medium text-sm text-gray-700 mb-2">Selecione no mapa</label>
    <div id="map" style="height: 400px; width: 100%; border-radius: 8px;"></div>
</div>
@push('styles')
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-sA+td0NEmCZ+xZSyGkKPyqbltTz8DmwzS0BfXkMJg0M="
        crossorigin=""
    />
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css"
    />

    #map {
        height: 400px;
        width: 100%;
        border-radius: 8px;
    }

@endpush

@push('scripts')
    <script
        src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-o9N1j+2l9WdrYVMaN4owZ0F3kD4tdn2nL9Zwtf9MGsM="
        crossorigin=""
    ></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const latInput = document.getElementById('input-latitude');
            const lngInput = document.getElementById('input-longitude');
            let lat = parseFloat(latInput.value) || -23.55052;
            let lng = parseFloat(lngInput.value) || -46.633308;

            const map = L.map('map').setView([lat, lng], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
            }).addTo(map);

            let marker = L.marker([lat, lng], { draggable: true }).addTo(map);

            marker.on('dragend', function (e) {
                const position = marker.getLatLng();
                latInput.value = position.lat.toFixed(7);
                lngInput.value = position.lng.toFixed(7);
            });

            L.Control.geocoder({
                defaultMarkGeocode: false
            })
            .on('markgeocode', function(e) {
                const bbox = e.geocode.bbox;
                const center = e.geocode.center;
                marker.setLatLng(center);
                map.fitBounds(bbox);
                latInput.value = center.lat.toFixed(7);
                lngInput.value = center.lng.toFixed(7);
            })
            .addTo(map);
        });
    </script>
@endpush
