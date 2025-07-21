<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Localiser l'excursion</title>
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
            Lat: <span id="lat">–</span>, Lng: <span id="lng">–</span><br>
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
                    const display = data.display_name || '';
                    updateAddressText(display);

                    currentAddress.adresse = display;
                    currentAddress.ville = data.address.city || data.address.town || data.address.village || '';
                    currentAddress.pays = data.address.country || '';
                })
                .catch(() => {
                    updateAddressText('Indisponible');
                });
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
                from: 'localisation-popup'
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
