	if ($('#map-contact').length) {
		var map = L.map('map-contact', {
			zoom: 11,
			maxZoom: 20,
			tap: false,
			gestureHandling: true,
			center: [-25.706288, 27.240085]
		});

		map.scrollWheelZoom.disable();

		var OpenStreetMap_Mapnik = L.tileLayer('https://{s}.tile.openstreetmap.de/tiles/osmde/{z}/{x}/{y}.png', {
			scrollWheelZoom: false,
			attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
		}).addTo(map);

		var icon = L.divIcon({
			html: '<i class="fa fa-building"></i>',
			iconSize: [50, 50],
			iconAnchor: [50, 50],
			popupAnchor: [-20, -42]
		});

		var marker = L.marker([-25.706288, 27.240085], {
			icon: icon
		}).addTo(map);
	}
