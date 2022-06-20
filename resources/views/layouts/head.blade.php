<!-- Title -->
<title> Maktaby </title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('assets/img/brand/favicon.png')}}" type="image/x-icon"/>
<!-- Icons css -->
<link href="{{URL::asset('assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('assets/css-rtl/sidemenu.css')}}">
@yield('css')
<!--- Style css -->
<link href="{{URL::asset('assets/css-rtl/style.css')}}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('assets/css-rtl/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('assets/css-rtl/skin-modes.css')}}" rel="stylesheet">

<script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous">

</script>

<script>
    var locations = [

        ['Title A', 3.180967, 101.715546, 1],

    ];

    var marker;

    function initMap() {
        const myLatlng = { lat: 31.51433912315498, lng: 34.4508120099573 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 10,
            center: myLatlng,
        });

        @if(Route::is('places.edit'))
            @php
            $position = explode(',',$Places->address);
            $lat = $position[0];
            $lng = $position[1];
            @endphp
            marker = new google.maps.Marker({
            draggable: true,
            position: {lat:{{$lat}},lng:{{$lng}}},
            map: map,
        });

        marker.addListener('dragend',function(event){
            $("#address").val(event.latLng.lat()+","+event.latLng.lng());
        });
        @else
        google.maps.event.addListener(map, 'click', function(event) {
            //var result = prompt("Enter a value of comment for Marker.");
            if(marker) marker.setMap(null);
            marker = new google.maps.Marker({
                draggable: true,
                position: myLatlng,
                map: map
            });
            // attachMessage(marker, result);
            marker.setPosition(event.latLng);
            $("#address").val(event.latLng.lat()+","+event.latLng.lng());
        });
        @endif
        function attachMessage(marker, message) {
            var infowindow = new google.maps.InfoWindow({
                content: message
            });
            marker.addListener('click', function() {
                infowindow.open(map, marker);
            });
        }}

</script>

<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVj1EjzA1oCqpX31GGSuUJMIjgCg2LZuA&callback=initMap"
    defer
></script>



