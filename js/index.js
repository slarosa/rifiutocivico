/******************************************************************************
 *
 * Purpose: title
 * Author:  Salvatore Larosa
 *
 ******************************************************************************/

var map = L.map('map', {
	// center: [params.lat || -41.2728, params.lng || 173.2996],
	// center: [39.3544, 16.2402],
	maxZoom : 19,
	zoomControl : true,
	// zoom: params.zoom || 6,
	// zoom: 8,
	// worldCopyJump : false,
	//visualClick: false, //can be disabled
	// visualClickMode : 'touch', //A default detection is done, but you can override...
	visualClickEvents : 'click contextmenu' //can be multiple space-seperated events, like 'click', 'contextmenu', 'dblclick'...
});

// Crea capa openstreetmap
var osm = L.tileLayer.provider('OpenStreetMap.BlackAndWhite').addTo(map);

// Crea capa stamen lite
var lite = L.tileLayer.provider('Stamen.TonerLite');

// Crea capa imagen de esri
var esri_img = L.tileLayer.provider('Esri.WorldImagery');

L.control.layers({
	"OpenStreetMap" : osm,
	"Stamen toner-lite" : lite,
	"Satellite" : esri_img
}, {}).addTo(map);

var photoLayer = L.photo.cluster({
	spiderfyDistanceMultiplier : 1.2
}).on('click', function(evt) {
	evt.layer.bindPopup(L.Util.template('<img src="{url}"/></a><p>{caption}</p>', evt.layer.photo), {
		className : 'leaflet-popup-photo',
		minWidth : 400
	}).openPopup();
});

reqwest({
	url : 'data.json',
	type : 'json',
	method : 'post',
	contentType : 'application/json',
	success : function(data) {
		var photos = [];
		data = data;
		//alert(data.length);

		for (var i = 0; i < data.length; i++) {
			var photo = data[i];
			if (photo.geo_is_public) {
				var pos = [photo.latitude, photo.longitude];
				var monthNames = ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"];
				var d = new Date(photo.datetaken);
				photos.push({
					lat : pos[0],
					lng : pos[1],
					url : photo.url_z,
					caption : '	<table width="100%"> ' + '		<tr> ' + '<td>' + photo.title + '</td>' + '<td style="text-align: right"><a href="' + photo.url_z + '" target="_blank">Visualizza</a></td>' + '</tr>' + '<tr>' + '<td>Data: ' + d.getDate() + ' ' + monthNames[d.getMonth()] + ' ' + d.getFullYear() + '</td>' + '<td style="text-align: right"><a href="http://maps.google.com/maps?f=d&hl=it&daddr=' + pos[0] + ',' + pos[1] + '&ie=UTF8&0&om=0&output=kml" target="_blank">Raggiungi il sito</a></td>' + '</tr>' + '</table>',

					// photo.title + '<br>Data: ' + d.getDate() + ' ' + monthNames[d.getMonth()] + ' ' + d.getFullYear()
					// + '<br><a href="' + photo.url_z + '" target="_blank">Visualizza</a>'
					// + '<br><a href="http://maps.google.com/maps?f=d&hl=it&daddr=' + pos[0] + ',' + pos[1] + '&ie=UTF8&0&om=0&output=kml" target="_blank">Raggiungi il sito</a>',
					// //'<br>Ora: ' + d.getHours() + ':' + (d.getMinutes() < 10 ? '0' : '') + d.getMinutes(),
					thumbnail : photo.url_t
				});
			}
		}

		photoLayer.add(photos).addTo(map);
		// map.fitBounds([[36.806, 5.795], [46.84, 19.831]]);
		map.fitBounds(photoLayer.getBounds());
		var hash = new L.Hash(map);
	}
});

var isMobile = window.matchMedia("only screen and (max-width: 760px)");
if (!isMobile.matches) {
	L.control.coordinates({
		position : "bottomright",
		decimals : 5,
		decimalSeperator : ".",
		labelTemplateLat : "Lat: {y}",
		labelTemplateLng : "Lon: {x}"
	}).addTo(map);

	var sidebar = L.control.sidebar('sidebar', {
		position : 'right'
	}).addTo(map);
	sidebar.open('table');

}

// L.control.navbar().addTo(map);
// var zoomHome = L.Control.zoomHome();
// zoomHome.addTo(map);
L.control.scale().addTo(map);

// L.easyButton('fa-globe fa-2x', function(btn, map){
// // helloPopup.setLatLng(map.getCenter()).openOn(map);
// }).addTo( map );

if (!isMobile.matches) {
	var featuresLayer = new L.GeoJSON.AJAX(["comuni.geojson"]);

	var searchControl = new L.Control.Search({
		layer : featuresLayer,
		textErr : 'Comune non trovato!',
		textCancel : 'Cancella',
		textPlaceholder : 'Ricerca Comune...',
		propertyName : 'comune',
		marker : false,
		moveToLocation : function(latlng, title, map) {
			//map.fitBounds( latlng.layer.getBounds() );
			var zoom = map.getBoundsZoom(latlng.layer.getBounds());
			map.setView(latlng, zoom);
			// access the zoom
		}
	});

	map.addControl(searchControl);
	map.removeLayer(featuresLayer);
}
