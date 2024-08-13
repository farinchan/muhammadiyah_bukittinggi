@extends('front.app')

@section('seo')
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #map {
            height: 800px;
            border-radius: 10px;
        }
        .card {
            border-radius: 10px;
            border: none;
        }
        .card-body {
            padding: 1.25rem;
        }
        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
        }
        .card-text {
            font-size: 1rem;
            font-weight: 400;
        }
        
    </style>
@endsection

@section('content')
    <main class="m-5">
        <h1 class="text-center">Aset Pimpinan Daerah Muhammadiyah</h1>
        <h2 class="text-center mb-5">
             Kota Bukiittinggi
        </h2>
        <div class="row mb-3">
            <div class="col-md-3">
                <div class="card mb-3 shadow-lg ">
                    <div class="row no-gutters">
                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-school ms-2" style=" font-size: 50px; color: #2c368b;"></i>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h3 class="card-title">Sekolah</h3>
                                <p class="card-text">Total: 10</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3 shadow-lg ">
                    <div class="row no-gutters">
                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-university ms-2" style=" font-size: 50px; color: #2c368b;"></i>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h3 class="card-title">Universitas</h3>
                                <p class="card-text">Total: 10</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3 shadow-lg ">
                    <div class="row no-gutters">
                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                            <i class="fas fa-hospital ms-2" style=" font-size: 50px; color: #2c368b;"></i>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h3 class="card-title">Rumah Sakit</h3>
                                <p class="card-text">Total: 10</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-3 shadow-lg ">
                    <div class="row no-gutters">
                        <div class="col-md-3 d-flex align-items-center justify-content-center">
                            <i class="far fa-heart-circle ms-2" style=" font-size: 50px; color: #2c368b;"></i>
                        </div>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h3 class="card-title">panti Asuhan</h3>
                                <p class="card-text">Total: 10</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="shadow-lg" id="map"></div>
    </main>
@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        const cities = L.layerGroup();
        // Untuk menambahkan marker ke layer group, kita bisa menggunakan method addTo().
        const mLittleton = L.marker([39.61, -105.02]).bindPopup('This is Littleton, CO.').addTo(cities);
        const mDenver = L.marker([39.74, -104.99]).bindPopup('This is Denver, CO.').addTo(cities);
        const mAurora = L.marker([39.73, -104.8]).bindPopup('This is Aurora, CO.').addTo(cities);
        const mGolden = L.marker([39.77, -105.23]).bindPopup('This is Golden, CO.').addTo(cities);

        const osm = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        });

        const osmHOT = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
        });

        const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
        });

        const map = L.map('map', {
            center: [39.73, -104.99],
            zoom: 10,
            layers: [osm, cities]
        });

        const baseLayers = {
            'OpenStreetMap': osm,
            'OpenStreetMap.HOT': osmHOT,
            'OpenTopoMap': openTopoMap
        };

        const overlays = {
            'Cities': cities
        };

        const layerControl = L.control.layers(baseLayers, overlays).addTo(map);

        const crownHill = L.marker([39.75, -105.09]).bindPopup('This is Crown Hill Park.');
        const rubyHill = L.marker([39.68, -105.00]).bindPopup('This is Ruby Hill Park.');

        const parks = L.layerGroup([crownHill, rubyHill]);


        layerControl.addOverlay(parks, 'Parks');
    </script>
@endsection
