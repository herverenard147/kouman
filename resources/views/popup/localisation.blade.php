{{-- <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Choisir votre position</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.11.0/dist/geosearch.css"/>

    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
        }
        #map {
            height: calc(100vh - 70px);
            width: 100%;
        }
        .footer-bar {
            height: 70px;
            background: #fff;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1rem;
        }
        .btn {
            background-color: #10b981;
            color: white;
            border: none;
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #059669;
        }
        #lat, #lng {
            font-weight: bold;
        }
    </style>
</head>
<body>

    <div id="map"></div>

    <div class="footer-bar">
        <div class="text-sm text-gray-700">
            Latitude: <span id="lat">–</span>, Longitude: <span id="lng">–</span>
        </div>
        <button class="btn" onclick="validerPosition()">Valider ma position</button>
    </div>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <!-- Geosearch JS -->
    <script src="https://unpkg.com/leaflet-geosearch@3.11.0/dist/bundle.min.js"></script>

    <script>
        let map, marker;

        function updateCoordsUI(lat, lng) {
            document.getElementById('lat').innerText = lat.toFixed(6);
            document.getElementById('lng').innerText = lng.toFixed(6);
        }

        function validerPosition() {
            if (!marker) return;
            const pos = marker.getLatLng();
            window.opener.postMessage({
                latitude: pos.lat,
                longitude: pos.lng
            }, window.location.origin);
            window.close();
        }

        function initMap(lat, lng) {
            map = L.map('map').setView([lat, lng], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap',
                maxZoom: 19
            }).addTo(map);

            marker = L.marker([lat, lng], { draggable: true }).addTo(map);
            updateCoordsUI(lat, lng);

            marker.on('dragend', function () {
                const pos = marker.getLatLng();
                updateCoordsUI(pos.lat, pos.lng);
            });

            // Barre de recherche avec GeoSearch (OpenStreetMap)
            const provider = new window.GeoSearch.OpenStreetMapProvider();
            const search = new window.GeoSearch.GeoSearchControl({
                provider: provider,
                style: 'bar',
                autoClose: true,
                searchLabel: 'Rechercher une adresse...',
                retainZoomLevel: false,
            });
            map.addControl(search);

            map.on('geosearch/showlocation', function (result) {
                const { x, y } = result.location;
                marker.setLatLng([y, x]);
                map.setView([y, x], 15);
                updateCoordsUI(y, x);
            });
        }

        // Géolocalisation initiale
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(
                position => {
                    initMap(position.coords.latitude, position.coords.longitude);
                },
                () => {
                    // Fallback si refusé : Abidjan
                    initMap(5.3489, -4.0031);
                }
            );
        } else {
            initMap(5.3489, -4.0031);
        }
    </script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Choisir votre position</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Leaflet + Geosearch -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.11.0/dist/geosearch.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-geosearch@3.11.0/dist/bundle.min.js"></script>

    <style>
        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
        }
        #map {
            height: calc(100vh - 100px);
            width: 100%;
        }
        .footer-bar {
            height: 100px;
            background: #fff;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1rem;
            flex-wrap: wrap;
            gap: 10px;
        }
        .btn {
            background-color: #10b981;
            color: white;
            border: none;
            padding: 0.5rem 1.25rem;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #059669;
        }
        #lat, #lng {
            font-weight: bold;
        }
        .btn-outline {
            background-color: white;
            border: 1px solid #10b981;
            color: #10b981;
        }
        .btn-outline:hover {
            background-color: #e6fef3;
        }
    </style>
</head>
<body>

    <div id="map"></div>

    <div class="footer-bar">
        <div class="text-sm text-gray-700">
            Latitude: <span id="lat">–</span>, Longitude: <span id="lng">–</span><br>
            <span id="reverseAddress" class="text-xs text-gray-500">Adresse : —</span>
        </div>
        <div>
            <button class="btn-outline btn" onclick="useCurrentLocation()">📍 Utiliser ma position</button>
            <button class="btn" onclick="validerPosition()">✅ Valider</button>
        </div>
    </div>

    <script>
        let map, marker;
        let currentAddress = {
            adresse: '',
            ville: '',
            pays: ''
        };

        function updateCoordsUI(lat, lng) {
            document.getElementById('lat').innerText = lat.toFixed(6);
            document.getElementById('lng').innerText = lng.toFixed(6);
        }

        function updateAddressText(text) {
            document.getElementById('reverseAddress').innerText = 'Adresse : ' + text;
        }


        function reverseGeocode(lat, lng) {
            fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lng}&format=json`)
                .then(res => res.json())
                .then(data => {
                    console.log('reverseGeocode data.address:', data.address);
                    const display = data.display_name || '';
                    updateAddressText(display);

                    currentAddress.adresse = display;
                    currentAddress.ville =  data.address.city ||
                                            data.address.city_district || // ici on récupère "Abidjan"
                                            data.address.town ||
                                            data.address.village ||
                                            data.address.hamlet ||
                                            data.address.municipality ||
                                            data.address.state_district ||
                                            data.address.county ||
                                            data.address.state ||
                                            '';
                    currentAddress.pays = data.address.country || '';
                })
                .catch(() => {
                    updateAddressText('Indisponible');
                });
        // console.log('Adresse complète retournée :', data.address);

        }

        function setMarker(lat, lng) {
            marker.setLatLng([lat, lng]);
            map.setView([lat, lng], 15);
            updateCoordsUI(lat, lng);
            reverseGeocode(lat, lng);
        }

        function validerPosition() {
            const pos = marker.getLatLng();
            window.opener.postMessage({
                latitude: pos.lat,
                longitude: pos.lng,
                adresse: currentAddress.adresse,
                ville: currentAddress.ville,
                pays: currentAddress.pays
            }, window.location.origin);
            window.close();
        }

        function useCurrentLocation() {
            navigator.geolocation.getCurrentPosition(position => {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;
                setMarker(lat, lng);
            }, () => {
                alert("Impossible de récupérer votre position.");
            });
        }


        function initMap(lat, lng) {
            map = L.map('map').setView([lat, lng], 13);

            // Satellite Layer
            const satellite = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap'
            }).addTo(map);

            marker = L.marker([lat, lng], { draggable: true }).addTo(map);

            marker.on('dragend', function () {
                const pos = marker.getLatLng();
                updateCoordsUI(pos.lat, pos.lng);
                reverseGeocode(pos.lat, pos.lng);
            });

            updateCoordsUI(lat, lng);
            reverseGeocode(lat, lng);

            // Search bar
            const provider = new window.GeoSearch.OpenStreetMapProvider();
            const search = new window.GeoSearch.GeoSearchControl({
                provider: provider,
                style: 'bar',
                searchLabel: '🔍 Rechercher une adresse...',
                autoClose: true,
                retainZoomLevel: false,
                keepResult: true,
            });
            map.addControl(search);

            map.on('geosearch/showlocation', function (result) {
                const { x, y } = result.location;
                setMarker(y, x);
            });
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(position => {
                initMap(position.coords.latitude, position.coords.longitude);
            }, () => {
                initMap(5.3489, -4.0031); // fallback: Abidjan
            });
        } else {
            initMap(5.3489, -4.0031);
        }
    </script>
</body>
</html>
