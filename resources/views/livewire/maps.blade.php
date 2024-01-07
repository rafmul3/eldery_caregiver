<div>
    <div class="m-3 text-center"> 
        <div class="mx-auto " wire:ignore id='map' style='width: 600px; height: 450px;'></div>
    </div>
    <hr>

<div class="icons">
    <ul class="h5">
        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
            <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
            <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg>
            Alamat Rumah Pengasuh 
    </ul>
    {{-- {{ $long }} and {{ $lat }} --}}
    <p style="margin-left: 65px">{{ $alamat }}</p>
    <br>

    <a href="/infopengasuh/{{ $user_id }}" class="btn btn-primary mb-5 ms-4">Selengkapnya</a>

    {{-- <ul class="h5">
        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
            <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
        </svg>
    </ul>
    <br>

    <ul class="h5">
        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" fill="currentColor" class="bi bi-compass" viewBox="0 0 16 16">
            <path d="M8 16.016a7.5 7.5 0 0 0 1.962-14.74A1 1 0 0 0 9 0H7a1 1 0 0 0-.962 1.276A7.5 7.5 0 0 0 8 16.016zm6.5-7.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
            <path d="m6.94 7.44 4.95-2.83-2.83 4.95-4.949 2.83 2.828-4.95z"/>
        </svg>
            22.5 Km
    </ul>
    <br> --}}

    
</div>

    {{-- Knowing others is intelligence; knowing yourself is true wisdom. --}}
</div>

@push('scripts')
    
    <script>

    document.addEventListener('livewire:load', () => {

    const defaultlocation = [107.60531614849594, -6.9355762735191036]
    
    mapboxgl.accessToken = '{{ env('MAPBOX_KEY') }}';
    var map = new mapboxgl.Map({
        container: 'map',
        center: defaultlocation,
        zoom: 12.10,
        style: 'mapbox://styles/mapbox/streets-v11'
    });

    map.addControl(new mapboxgl.NavigationControl())

    const loadlocations = (geoJson) => {
        geoJson.features.forEach((location) => {
            const {geometry, properties} = location
            const {image, locationId, alamat} = properties

            let markerElement = document.createElement('div')
            markerElement.className = 'marker'
            markerElement.id = locationId
            markerElement.style.backgroundImage = image
            markerElement.style.backgroundSize = 'cover'
            markerElement.style.width = '50px'
            markerElement.style.height = '50px'

            new mapboxgl.Marker(markerElement)
            .setLngLat(geometry.coordinates)
            .addTo(map)

            markerElement.addEventListener('click', (e) => {
                const locationId = e.target.id
                @this.findlocation(locationId)

                
            } )

        } )
    }

    loadlocations({!! $geoJson !!})

    map.on('click', (e) => {
        const longtitude = e.lngLat.lng
        const lattitude = e.lngLat.lat

        @this.long = longtitude
        @this.lat = lattitude
        
        })
    })
    
    </script>

@endpush
