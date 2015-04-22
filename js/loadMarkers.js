function loadVillages () {
    var countMarkers = 0;
    for (var i = 0; i < markerData.length; i++) {
        var location = new google.maps.LatLng(markerData[i][0].Latitude, markerData[i][0].Longitude);
        var newMarker = new google.maps.Marker({
            position: location,
            map: map,
            animation: google.maps.Animation.DROP,
            title: markerData[i][0].location,
            icon: "img/house170.png"
        });
        console.log(markerData[i][0].location);

        markers.push(newMarker);
        with ({foo: i}) {
            google.maps.event.addListener(markers[countMarkers], 'click', function () {
                document.getElementById("myModalLabel").innerHTML = markerData[foo][0].location;
                var modalBody = document.getElementById('modalBody');
                for (var i = 0; i < markerData[foo].length; i++) {
                    var titleProp = document.createElement('div');
                    titleProp.setAttribute('class', 'row');
                    titleProp.setAttribute('style', 'text-align: center');
                    var sale = "For Sale";
                    if (markerData[foo][i].forSale == 0) {
                        sale = "For Rent";
                    }
                    var beds = "Plot: ";
                    var met = "m²";
                    if (markerData[foo][i].type == "Apartment" || markerData[foo][i].type == "House") {
                        beds = "Bedrooms: ";
                        met = "";
                    }
                    titleProp.innerHTML = '<h4>' + markerData[foo][i].type + '</h4><div class="col-md-12">' +
                    '<img src="' + markerData[foo][i].img + '"><p>' + sale + '</p><p>' + beds +
                    markerData[foo][i].bedrooms + met + '</p><p>Price: €' + markerData[foo][i].price +
                    '</p><p><a href="' + markerData[foo][i].link + '">More informations..</a></p> <hr>';
                    modalBody.appendChild(titleProp);
                }
                $('#showProperty').modal('toggle');
            });
        }
        countMarkers++;
    }
}


function loadHouses(){

    for (var i = 0; i < markesDataHouses.length; i++) {
        var location = new google.maps.LatLng(markesDataHouses[i].Latitude, markesDataHouses[i].Longitude);
        var newMarker = new google.maps.Marker({
            position: location,
            map: map,
            animation: google.maps.Animation.DROP,
            title: markesDataHouses[i].type,
            icon: "house170.png"
        });

        markersHouses.push(newMarker);

        with ({foo: i}) {
            google.maps.event.addListener(markersHouses[foo], 'click', function () {

                var sale = "For Sale";
                if (markesDataHouses[foo].forSale == 0) {
                    sale = "For Rent";
                }
                var beds = "Plot: ";
                var met = "m²";
                if (markesDataHouses[foo].type == "Apartment-Flat" || markesDataHouses[foo].type == "House-Villa") {
                    beds = "Bedrooms: ";
                    met = "";
                }

                var contentString = '<div id="content">' +
                    '<div id="siteNotice">' +
                    '</div>' +
                    '<h1 id="firstHeading" class="firstHeading">' + markesDataHouses[foo].type + '</h1>' +
                    '<div id="bodyContent">' +
                    '<p><img src="' + markesDataHouses[foo].img + '"></p>' + sale + '</p><p>' + beds +
                    markesDataHouses[foo].bedrooms + met + '</p><p>Price: €' + markesDataHouses[foo].price +
                    '</p><p><a href="' + markesDataHouses[foo].link + '">More informations..</a></p>' +
                    '</div>' +
                    '</div>';

                var infowindow = new google.maps.InfoWindow({
                    content: contentString,
                    maxWidth: 250
                });

                if(!markersHouses[foo].open) {
                    infowindow.open(map, markersHouses[foo]);
                    markersHouses[foo].open = true;
                }else {
                    infowindow.close();
                    markersHouses[foo].open = false;
                }
                google.maps.event.addListener(map, 'click', function() {
                    infowindow.close();
                    markersHouses[foo].open = false;
                });
            });
        }

    }
}
