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


/* ==== FUNÇÕES NO MAPA ==== */
document.getElementById('addLinha').addEventListener('click', function () {
							    map.addLayer({
							        "id": "route",
							        "type": "line",
							        "source": {
							            "type": "geojson",
							            "data": {
							                "type": "Feature",
							                "geometry": {
							                    "type": "LineString",
							                    "coordinates": [
							                        [-122.43, 37.77], //origem
							                        [-46.625, -23.53] // destino
							                    ]
							                }
							            }
							        },
							        "paint": {
							            "line-color": "rgba(255,0,0,.75)",
							            "line-width": 2
							        }
							    }),
							    map.addLayer({
							        "id": "route2",
							        "type": "line",
							        "source": {
							            "type": "geojson",
							            "data": {
							                "type": "Feature",
							                "geometry": {
							                    "type": "LineString",
							                    "coordinates": [
							                        [2.349014, 48.864716],
							                        [-46.625, -23.53]
							                    ]
							                }
							            }
							        },
							        "paint": {
							            "line-color": "rgba(0,0,255,.75)",
							            "line-width": 2
							        }
							    });
});

document.getElementById('addCirculo').addEventListener('click', function () {
    map.addLayer({
        "id": "point",
        "type": "circle",
        "source": {
        	"type": "geojson",
			"data":{
				"type": "Feature",
				"geometry": {
					"type": "LineString",
					"coordinates": [
							    [2.349014, 48.864716],
							    [-46.625, -23.53]
					]
				}
			}
        },
        "paint": {
            "circle-radius": 20,
            "circle-color": "#007cbf"
        }
    });
});

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


