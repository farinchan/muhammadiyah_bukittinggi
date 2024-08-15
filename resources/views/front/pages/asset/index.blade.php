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
        const univ = L.layerGroup();
        // Untuk menambahkan marker ke layer group, kita bisa menggunakan method addTo().

        var universitasLocations = [{
                "name": "Universitas Andalas",
                "lat": -0.914813,
                "lng": 100.460876
            },
            {
                "name": "Universitas Negeri Padang",
                "lat": -0.8972724900287691, 
                "lng": 100.35061477324751
            },
            {
                "name": "Universitas Islam Negeri Imam Bonjol",
                "lat": -0.8100989270369154, 
                "lng": 100.37334154680434
            },
            {
                "name": "Universitas Bung Hatta",
                "lat": -0.9066453864034234, 
                "lng": 100.34470417093685
            },
            {
                "name": "Universitas Muhammadiyah Sumatera Barat",
                "lat": -0.8553985695569838, 
                "lng": 100.33291359720299
            },
            {
                "name": "Universitas Baiturrahmah",
                "lat": -0.8704467611252126,
                "lng": 100.38347468100913
            },
            {
                "name": "Universitas Ekasakti",
                "lat": -0.9378040665446706, 
                "lng": 100.35627777974007
            },
            {
                "name": "Universitas Dharma Andalas",
                "lat": -0.9445212514838189, 
                "lng": 100.37558009635165
            },
            {
                "name": "Universitas Mahaputra Muhammad Yamin",
                "lat": -0.7892970593922869,
                "lng": 100.65456901169297
            },
            {
                "name": "Universitas Mohammad Natsir",
                "lat": -0.3112661664753203, 
                "lng": 100.37019799528474
            },
            {
                "name": "Universitas Islam Negeri Mahmud Yunus",
                "lat": -0.459558231324075, 
                "lng": 100.57351191439211
            },
            {
                "name": "Universitas Islam Negeri Sjech M. Djamil Djambek",
                "lat": -0.3217818130015428,
                "lng": 100.39779632518409
            },
            {
                "name": "Universitas Putra Indonesia YPTK",
                "lat": -0.9581727350118766, 
                "lng": 100.39664548285819
            },
            {
                "name": "Universitas Tamansiswa Padang",
                "lat": -0.9292118522310547, 
                "lng": 100.36517826751603
            },
            {
                "name": "Universitas Adzkia",
                "lat": -0.9197257313274185, 
                "lng": 100.39365679422642
            },
            {
                "name": "Universitas Dharmas Indonesia",
                "lat": -1.0584182398388875, 
                "lng": 101.6438041540233
            },
            {
                "name": "Universitas Fort De Kock",
                "lat": -0.2977131701640359, 
                "lng": 100.38814488100635
            },
            {
                "name": "Universitas Islam Sumatera Barat",
                "lat": -0.8330788597514805, 
                "lng": 100.34221803963446
            },
            {
                "name": "Universitas Nahdlatul Ulama Sumatera Barat",
                "lat": -0.9177999322607213, 
                "lng": 100.35028402703564
            },
            {
                "name": "Universitas Perintis Indonesia",
                "lat": -0.8385342822066764, 
                "lng": 100.33165976751552
            },
            {
                "name": "Universitas Prima Nusantara",
                "lat": -0.288825670104837, 
                "lng": 100.37243791169055
            },
            {
                "name": "Universitas PGRI Sumatera Barat",
                "lat": -0.9098160417944778, 
                "lng": 100.36751706751588
            },
        ];

        universitasLocations.forEach(function(location) {
            var marker = L.marker([location.lat, location.lng]).addTo(univ)
                .bindPopup(location.name);
        });

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
            center: [-0.5418118504114846, 100.7088467498262],
            zoom: 10,
            layers: [osm, univ]
        });

        const baseLayers = {
            'OpenStreetMap': osm,
            'OpenStreetMap.HOT': osmHOT,
            'OpenTopoMap': openTopoMap
        };

        const overlays = {
            'Universitas': univ
        };

        const layerControl = L.control.layers(baseLayers, overlays).addTo(map);

        const crownHill = L.marker([39.75, -105.09]).bindPopup('This is Crown Hill Park.');
        const rubyHill = L.marker([39.68, -105.00]).bindPopup('This is Ruby Hill Park.');

        const parks = L.layerGroup([crownHill, rubyHill]);


        layerControl.addOverlay(parks, 'Parks');
    </script>
@endsection
