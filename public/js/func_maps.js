/* ==== CRIAÇÃO DO MAPA ====*/

var bounds = [
    [-220, -90], // Southwest coordinates
    [220, 90],
      // Northeast coordinates
];
//mapbox://styles/phx678/cjh7vhhz90j8g2sp0x0kkr7co
//pk.eyJ1IjoicGh4Njc4IiwiYSI6ImNqZjVpb2RieTBudnMzM2x0eXUzZHUxdnoifQ.Dev7xcoIcb2V3lIJ8FvOAw
mapboxgl.accessToken = 'pk.eyJ1IjoicGh4Njc4IiwiYSI6ImNqZjVpb2RieTBudnMzM2x0eXUzZHUxdnoifQ.Dev7xcoIcb2V3lIJ8FvOAw';
	var map = new mapboxgl.Map({
		container: 'map',
		style: 'mapbox://styles/phx678/cjh7vhhz90j8g2sp0x0kkr7co', 
		center: [15,18],
		zoom: 1,
		maxBounds: bounds
});


/* ==== FERRAMENTAS ==== */
map.addControl(new mapboxgl.NavigationControl(),'top-left');
map.addControl(new mapboxgl.FullscreenControl(),'top-left');

document.getElementById('listing-group').addEventListener('change', function(e) {
		var handler = e.target.id;
		if (e.target.checked) {
			map[handler].enable();
		} else {
			map[handler].disable();
			
		}
});

function addCirculo(lat, long, cont, color) {
    map.addLayer({
        "id": "point"+cont,
        "type": "circle",
        "source": {
        	"type": "geojson",
			"data":{
				"type": "Feature",
				"geometry": {
					"type": "LineString",
					"coordinates": [[lat,long], [null, null]]
				}
			}
        },
        "paint": {
            "circle-radius": 2,
            "circle-color": color
        }
    });
};

document.getElementById('visaoGeral').addEventListener('click', function () {
    map.flyTo({
        center: [15,18],
		zoom: 1
    });
});

document.getElementById('europa').addEventListener('click', function () {
    map.flyTo({
        center: [15.35,48.8566],
		zoom: 3
    });
});

document.getElementById('amNorte').addEventListener('click', function () {
    map.flyTo({
        center: [-98.4194,50],
		zoom: 2
    });
});

document.getElementById('amSul').addEventListener('click', function () {
    map.flyTo({
        center: [-47,-15],
		zoom: 2
    });
});
document.getElementById('asia').addEventListener('click', function () {
    map.flyTo({
        center: [105,30],
		zoom: 3
    });
});
document.getElementById('africa').addEventListener('click', function () {
    map.flyTo({
        center: [25,5],
		zoom: 2
    });
});
document.getElementById('oceania').addEventListener('click', function () {
    map.flyTo({
        center: [135,-25],
		zoom: 2
    });
});
document.getElementById('russia').addEventListener('click', function () {
    map.flyTo({
        center: [100,65],
		zoom: 2
    });
});

/* ==== TIME LINE ==== */


