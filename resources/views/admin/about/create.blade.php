@extends('admin.layouts.main')
@push('style')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css"
        integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <style>
        #map {
            height: 500px;
        }

    </style>
@endpush
@section('content')
    <div class="section-header">
        <h1>Tentang Form</h1>
    </div>

    <div class="section-body">
        <h2 class="section-title">Tentang Form</h2>
        @include('admin.partials.errors')
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Tentang</h4>
                    </div>
                    <div class="card-body">
                        <form
                            action="@isset($about) {{ route('about.update', $about->id) }} @endisset @empty($about) {{ route('about.store') }} @endempty"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @isset($about)
                                @method('PUT')
                            @endisset
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="description" class="summernote" cols="30" rows="10"
                                    required>{{ isset($about) ? $about->description : '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Keterangan Investasi</label>
                                <textarea name="investation" class="summernote" cols="30" rows="10"
                                    required>{{ isset($about) ? $about->investation : '' }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Location</label>
                                <div id="map"></div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label>Latitude</label>
                                        <input type="text" class="form-control" id="latitude" name="lat"
                                            value="{{ isset($about) ? $about->lat : '' }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Longtitude</label>
                                        <input type="text" class="form-control" id="longtitude" name="lng"
                                            value="{{ isset($about) ? $about->lng : '' }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js"
        integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <script>
        var map = L.map('map').locate({
            setView: true,
        });
        var lat, lng, marker;
        @isset($about)
        var old_lat = {{$about->lat}};
        var old_lng = {{$about->lng}};
        @endisset
        var greenIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });
        var yellowIcon = new L.Icon({
            iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
            shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
            iconSize: [25, 41],
            iconAnchor: [12, 41],
            popupAnchor: [1, -34],
            shadowSize: [41, 41]
        });

        var geocoder = L.Control.Geocoder.nominatim();
        if (typeof URLSearchParams !== 'undefined' && location.search) {
            var params = new URLSearchParams(location.search);
            var geocoderString = params.get('geocoder');
            if (geocoderString && L.Control.Geocoder[geocoderString]) {
                geocoder = L.Control.Geocoder[geocoderString]();
            } else if (geocoderString) {
                console.warn('Unsupported geocoder', geocoderString);
            }
        }
        var control = L.Control.geocoder({
            placeholder: 'Search here...',
            geocoder: geocoder
        }).addTo(map);
        @isset ($about)
            L.marker([old_lat, old_lng],{
                icon: yellowIcon
            }).addTo(map)
        @endif
        map.on("click", function(e) {
            if (marker) map.removeLayer(marker);
            lat = e.latlng.lat;
            lng = e.latlng.lng;
            $('#latitude').val(lat);
            $('#longtitude').val(lng);
            marker = L.marker([lat, lng], {
                icon: greenIcon
            }).addTo(map);
        });


        L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            maxZoom: 18,
            id: 'mapbox/streets-v11',
            tileSize: 512,
            zoomOffset: -1,
            accessToken: 'pk.eyJ1Ijoic2F0cmlvdG9sIiwiYSI6ImNrc3E1YTh0NzAzdWMyb3BicTUxbnMxY3YifQ.XfiYl1qOEFzjRsPs3TDijw'
        }).addTo(map);
    </script>
@endpush
