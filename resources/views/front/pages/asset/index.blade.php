@extends('front.app')

@section('seo')
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $meta_description }}">
    <meta name="keywords" content="{{ $meta_keywords }}">

    <meta property="og:title" content="{{ $title }}">
    <meta property="og:description" content="{{ $meta_description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ route('asset') }}">
    <link rel="canonical" href="{{ route('asset') }}">
    <meta property="og:image" content="{{ Storage::url($favicon) }}">
@endsection

@section('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <style>
        #map {
            height: 800px;
            border-radius: 10px;
            z-index: 1;
        }

        .list-group {
            max-height: 700px;
            margin-bottom: 10px;
            overflow: scroll;
            -webkit-overflow-scrolling: touch;
            scrollbar-width: none;
        }

        .card {
            border-radius: 10px;
            border: none;
            height: 800px;
        }

        .card-header {
            border-radius: 10px 10px 0 0;
            background-color: #f8f9fa;
            border-bottom: none;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: 700;
            margin: 0;
        }

        @media (max-width: 968px) {
            #map {
                height: 500px;
                margin-bottom: 40px;
            }

            .card {
                height: 500px;
            }

            .list-group {
                max-height: 400px;
            }
        }
    </style>
@endsection

@section('content')
    <main class="m-5">
        <h1 class="text-center">Aset Pimpinan Daerah Muhammadiyah</h1>
        <h2 class="text-center mb-5">
            Kota Bukiittinggi
        </h2>
        <div class="row">
            <div class="col-md-10">
                <div class="shadow-sm" id="map"></div>
            </div>
            <div class="col-md-2">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h2 class="card-title">Legenda</h2>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @foreach ($assets_type as $asset)
                                <li class="list-group-item">
                                    <img src="{{ asset('storage/' . $asset->icon) }}" alt="{{ $asset->name }}"
                                        width="32" height="32" style="object-fit: cover;" class="me-2">
                                    {{ $asset->name }}
                                    <strong>({{ $asset->assets->count() }})</strong>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        var data = @json($assets_type);

        // Define groups for each asset type
        var assetGroups = {};

        data.forEach(function(type) {
            // Create a new layer group for each asset type
            var group = L.layerGroup();
            assetGroups[type.name] = group;

            // Create custom icon for each asset type
            var icon = L.icon({
                iconUrl: `/storage/${type.icon}`, // Modify path according to your structure
                iconSize: [32, 32], // Adjust size as needed
                iconAnchor: [16, 32], // Point of the icon which will correspond to marker's location
                popupAnchor: [0, -32] // Point from which the popup should open relative to the iconAnchor
            });

            type.assets.forEach(function(asset) {
                if (asset.latitude && asset.longitude) {
                    var marker = L.marker([asset.latitude, asset.longitude], {
                        icon: icon
                    }).addTo(group);
                    marker.bindPopup(
                        '<b style="font-size: 1rem">' + asset.name + '</b><br>' +
                        '<center><img src=' + (asset.image ? `/storage/${asset.image}` :
                            'https://upload.wikimedia.org/wikipedia/commons/thumb/6/65/No-Image-Placeholder.svg/330px-No-Image-Placeholder.svg.png'
                        ) + ' width="150" height="150" style="object-fit: cover;"></center><br>' +
                        asset.description + '<br>' +
                        '<br><table border=0>' +
                        '<tr><td style="vertical-align:top">Alamat</td><td style="vertical-align:top">:</td><td>' +
                        asset.address + '</td></tr>' +
                        '<tr><td style="vertical-align:top">Website</td><td style="vertical-align:top">:</td><td><a href="' +
                        asset.website + '" target="_blank">' + asset.website + '</a></td></tr>' +
                        '<tr><td style="vertical-align:top">Telepon</td><td style="vertical-align:top">:</td><td><a href="tel:' +
                        asset.phone + '">' + asset.phone + '</a></td></tr>' +
                        '<tr><td style="vertical-align:top">Email</td><td style="vertical-align:top">:</td ><td><a href="mailto:' +
                        asset.email + '">' + asset.email + '</a></td></tr>' +
                        '</table><br>' +
                        '<table border=0>' +
                        '<tr><td colspan="5" style="vertical-align:top; height: 25px">Sosial Media :</td></tr>' +
                        '<tr><td style="vertical-align:top; width: 40px"><a href="' + asset.facebook +
                        '" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" width="25" height="25"></a></td>' +
                        '<td style="vertical-align:top; width: 40px"><a href="' + asset.instagram +
                        '" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" width="25" height="25"></a></td>' +
                        '<td style="vertical-align:top; width: 40px"><a href="' + asset.twitter +
                        '" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Logo_of_Twitter.svg/512px-Logo_of_Twitter.svg.png" width="25" height="25"></a></td>' +
                        '<td style="vertical-align:top; width: 40px"><a href="' + asset.youtube +
                        '" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" width="25" height="25"></a></td>' +
                        '<td style="vertical-align:top; width: 40px"><a href="' + asset.linkedin +
                        '" target="_blank"><img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/LinkedIn_logo_initials.png" width="25" height="25"></a></td></tr>' +
                        '</table>'

                    );
                }
            });
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

        const baseLayers = {
            'OpenStreetMap': osm,
            'OpenStreetMap.HOT': osmHOT,
            'OpenTopoMap': openTopoMap
        };

        var map = L.map('map', {
            center: [-0.5418118504114846, 100.7088467498262],
            zoom: 10,
            layers: [osm, new L.LayerGroup(Object.values(assetGroups))]
        });

        // Add the groups to the map with layer control
        L.control.layers(baseLayers, assetGroups).addTo(map);

        // Add all groups to the map by default
        for (var groupName in assetGroups) {
            assetGroups[groupName].addTo(map);
        }
    </script>
@endsection
