<div id="map" style="height: 377px; margin-bottom: 10px"></div>


<script>
    function Map(){        
    };
    
    Map.prototype.init = function (){

        var latitude = $("#latitude").val();
        var longtitude = $("#longtitude").val();
        if (latitude !== '' && longtitude !== '') {
            Map.prototype.coords = [latitude, longtitude];
        } else {
            Map.prototype.coords = [43.0367, 44.6678];
            $("#latitude").val(Map.prototype.coords[0]);
            $("#longtitude").val(Map.prototype.coords[1]);
        }

        this.myMap = new ymaps.Map('map', {
            center: Map.prototype.coords,
            zoom: 10
        });
        this.myMap.controls.remove('trafficControl');
        
        //Отслеживаем событие щелчка по карте
        this.myMap.events.add('click', function (e) {        
            Map.prototype.coords = e.get('coords');
            Map.prototype.savecoordinats();
        });
        
        // Метка-МФЦ
        Map.prototype.myGeoObject = new ymaps.GeoObject({
            geometry: {
                type: "Point",
                coordinates: Map.prototype.coords
            },
            properties: {
                iconContent: 'МФЦ',
                hintContent: 'Перетащи меня на нужное место'
            }
        }, {
            preset: 'islands#blackStretchyIcon',
            draggable: true
        });
                
        //Отслеживаем событие перемещения метки
        Map.prototype.myGeoObject.events.add("dragend", function (e) {			
            Map.prototype.coords = this.geometry.getCoordinates();
            Map.prototype.savecoordinats();
        }, Map.prototype.myGeoObject);
        
        this.myMap.geoObjects.add(Map.prototype.myGeoObject);
    };

    Map.prototype.savecoordinats = function (){
        var new_coords = [Map.prototype.coords[0].toFixed(4), Map.prototype.coords[1].toFixed(4)];	
        Map.prototype.myGeoObject.geometry.setCoordinates(new_coords);
        $("#latitude").val(new_coords[0]);
        $("#longtitude").val(new_coords[1]);	
    };

    var map = new Map();

    ymaps.ready(map.init);
</script>
