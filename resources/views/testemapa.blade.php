<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <title>Teste Mapa Leaflet</title>
    <link
        rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        crossorigin=""
    />
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>

<h1>Teste do mapa</h1>

<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" crossorigin=""></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script>
    console.log('Inicializando mapa Leaflet...');
    const lat = -23.55052;
    const lng = -46.633308;

    const map = L.map('map').setView([lat, lng], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution:
            '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    const marker = L.marker([lat, lng], { draggable: true }).addTo(map);

    marker.on('dragend', function () {
        const pos = marker.getLatLng();
        console.log('Marcador movido para:', pos.lat, pos.lng);
    });

    L.Control.geocoder().addTo(map);
</script>

</body>
</html>
