var cantidad = 0;
var arreglo = [];

var mymap = L.map('mapid').setView([21.152639, -101.711598], 15);
const tilesProvider = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

L.tileLayer(tilesProvider,{
    maxZoom:17,
}).addTo(mymap)

mymap.doubleClickZoom.disable()
///////////////////////////////////

var mymap2 = L.map('mapid2').setView([21.152639, -101.711598], 15);
const tilesProvider2 = 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png'

L.tileLayer(tilesProvider2,{
    maxZoom:17,
}).addTo(mymap2)

mymap2.doubleClickZoom.disable()


mymap.on('click',function(e){
    let latLng = mymap.mouseEventToLatLng(e.originalEvent)
    L.marker([latLng.lat,latLng.lng]).addTo(mymap)

    arreglo.push(latLng);
  
        //const tilesProvider = ['http://a.tile.openstreetmap.fr/hot/$%7Bz%7D/$%7Bx%7D/$%7By%7D.png',
       // 'https://tiles.wmflabs.org/osm-no-labels/$%7Bz%7D/$%7Bx%7D/$%7By%7D.png', 'http://a.tile.stamen.com/toner/$%7Bz%7D/$%7Bx%7D/$%7By%7D.png'];

   // const random = Math.floor(Math.random() * tilesProvider.length);
  // L.tileLayer(tilesProvider[random],{maxZoom:17,}).addTo(mymap)
 // L.tileLayer(tilesProvider = 'https://cartodb-basemaps-/%7Bs%7D.global.ssl.fastly.net/dark_all/%7Bz%7D/%7Bx%7D/%7By%7D.png').addTo(mymap)
  
 
    
        if(arreglo.length >= cantidad || cantidad > 10)
        {
                   const tilesProvider = ['https://cartodb-basemaps-/%7Bs%7D.global.ssl.fastly.net/light_all/%7Bz%7D/%7Bx%7D/%7By%7D.png',
       'https://cartodb-basemaps-{s}.global.ssl.fastly.net/dark_all/{z}/{x}/{y}.png'];

   const random = Math.floor(Math.random() * tilesProvider.length);
  L.tileLayer(tilesProvider[random],{maxZoom:17,}).addTo(mymap)
 
            var poligono = L.polygon(arreglo).addTo(mymap);
            var poligono = L.polygon(arreglo).addTo(mymap2);
            var pop = L.popup().setLatLng([21.152639, -101.711598]).setContent(arreglo).openOn(mymap);
            arreglo = [];
        }
    
    
    
})

function puntos(){
    let n = document.getElementById('nodos');
    cantidad = parseInt(n.value);
    n.value = '';
}
