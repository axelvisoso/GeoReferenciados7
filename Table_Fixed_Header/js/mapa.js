

var mymap = L.map('mapid').setView([21.152639, -101.711598], 15);
const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

L.tileLayer(tilesProvider,{
    maxZoom:17,
}).addTo(mymap)
