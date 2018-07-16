window.MapComponent = (function (window, document, api) {

    mapboxgl.accessToken = "pk.eyJ1IjoiamVwZXRvbGltIiwiYSI6ImNqamFsMm1kczFwangzcHN3dGtkajQ0NmMifQ.7QVsW6I5anRzfjw13sWZtg";

    var map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v9',
        center: [ -97.74306079999997 , 30.267153],
        zoom: 9
    });
    
})(window, window.document, window.ApiComponent);