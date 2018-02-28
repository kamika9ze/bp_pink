jQuery(document).ready(function ($) {
	if($("div").hasClass("block-map")){
	$.getJSON('https://www.myblackpearl.ru/sites/all/themes/bp_pink/data/geodata-new.json', function (data) {
		
        $('.form-select.form-type-city').append("<option value='0'>Укажите ваш город</option>");
        $('.form-select.form-type-retailer').append("<option value='0'>Укажите торговую сеть</option>");        
        
        
        //вывод всех городов
        $.each(data.cities, function (i, city) {
            $('.form-select.form-type-city').append("<option value='" + city.id + "' data-lat = '" + city.lat + "' data-lon = '" + city.lon + "'>" + city.name + "</option>");         
        });
        
        //Выбор сетей в зависимости от региона
        $('.form-select.form-type-region').change(function () {
            var region_select_id = $(this).val();
            $('.form-select.form-type-city').empty();
            $('.form-select.form-type-city').append("<option value='0'>Укажите ваш город</option>");
            $('.form-select.form-type-retailer').empty();
            $('.form-select.form-type-retailer').append("<option value='0'>Укажите торговую сеть</option>");
            var init_array = [];
            if(region_select_id != '0'){
	            $.each(data.cities, function (i, city) {
	                if (region_select_id == city.region_id) {
	                    $('.form-select.form-type-city').append("<option value='" + city.id + "' data-lat = '" + city.lat + "' data-lon = '" + city.lon + "'>" + city.name + "</option>");
	                }                
	            });
	            $.each(data.stores, function (i, shop) {
                	if (init_array.indexOf(shop.retailer_id) == -1 && shop.region_id == region_select_id) {
                		init_array.push(shop.retailer_id);
                        $('.form-select.form-type-retailer').append("<option value='" + shop.id + "' data-lat = '" + shop.lat + "' data-lon = '" + shop.lon + "' data-retailer = '" + shop.retailer_id  + "'>" + shop.name + "</option>");
                    }
                });
	            showAlld(region_select_id, 'region');
            }else{
            	$.each(data.cities, function (i, city) {
                    $('.form-select.form-type-city').append("<option value='" + city.id + "' data-lat = '" + city.lat + "' data-lon = '" + city.lon + "'>" + city.name + "</option>");              
	            });
        		$.each(data.stores, function (i, shop) {
                	if (init_array.indexOf(shop.retailer_id) == -1) {
                		init_array.push(shop.retailer_id);
                        $('.form-select.form-type-retailer').append("<option value='" + shop.id + "' data-lat = '" + shop.lat + "' data-lon = '" + shop.lon + "' data-retailer = '" + shop.retailer_id  + "'>" + shop.name + "</option>");
                    }
                });
            	showAll(0);
            }
        });
        
        //вывод сетей
        var init_array_stores = [];
		$.each(data.stores, function (i, shop) {
        	if (init_array_stores.indexOf(shop.retailer_id) == -1) {
        		init_array_stores.push(shop.retailer_id);
                $('.form-select.form-type-retailer').append("<option value='" + shop.id + "' data-lat = '" + shop.lat + "' data-lon = '" + shop.lon + "' data-retailer = '" + shop.retailer_id  + "'>" + shop.name + "</option>");
            }
        });
        
		init_array_stores = [];
		
		//вывод сетей в зависимости от города
        $('.form-select.form-type-city').change(function () {
            var city_select_id = $(this).val();
            $('.form-select.form-type-retailer').empty();
            $('.form-select.form-type-retailer').append("<option value='0'>Укажите торговую сеть</option>");
            var search_array = [];
            
            if(city_select_id != '0'){
	            $('#buy-search-results').empty();
	            $.each(data.stores, function (i, shop) {
	            	if (city_select_id == shop.city_id && search_array.indexOf(shop.retailer_id) == -1) {
	            		$('#buy-search-results').append("<div class='buy-search-result-item'><p class='text'>" + shop.addr + "</p><div class='title-retailer pink'>" + shop.name + "</div></div>");
	                	search_array.push(shop.retailer_id);
	                    $('.form-select.form-type-retailer').append("<option value='" + shop.id + "' data-lat = '" + shop.lat + "' data-lon = '" + shop.lon + "' data-retailer = '" + shop.retailer_id  + "'>" + shop.name + "</option>");
	                }
	            });
	            var city_lat = $('.form-select.form-type-city option[value=' + city_select_id + ']').attr('data-lat');
	            var city_lon = $('.form-select.form-type-city option[value=' + city_select_id + ']').attr('data-lon');
	            
	            newInit(city_lat, city_lon, city_select_id);
            }else{
            	var region_id = $('.form-select.form-type-region').val();

            	if(region_id == '0'){
            		$.each(data.stores, function (i, shop) {
                    	if (search_array.indexOf(shop.retailer_id) == -1) {
                    		search_array.push(shop.retailer_id);
                            $('.form-select.form-type-retailer').append("<option value='" + shop.id + "' data-lat = '" + shop.lat + "' data-lon = '" + shop.lon + "' data-retailer = '" + shop.retailer_id  + "'>" + shop.name + "</option>");
                        }
                    });
            		
            		showAll(0);
            	}else{
            		$.each(data.stores, function (i, shop) {
                    	if (search_array.indexOf(shop.retailer_id) == -1 && shop.region_id == region_id) {
                    		search_array.push(shop.retailer_id);
                            $('.form-select.form-type-retailer').append("<option value='" + shop.id + "' data-lat = '" + shop.lat + "' data-lon = '" + shop.lon + "' data-retailer = '" + shop.retailer_id  + "'>" + shop.name + "</option>");
                        }
                    });
            		showAlld(region_id, 'region');
            	}
            }
            
            $('#buy-search-results').empty();
        	$.each(data.stores, function (i, shop) {
            	if (city_select_id == shop.city_id){
            		$('#buy-search-results').append("<div class='buy-search-result-item'><p class='text'>" + shop.addr + "</p><div class='title-retailer pink'>" + shop.name + "</div></div>");
            	}
            });
            
        });
        
        $('.form-select.form-type-retailer').change(function(){
        	var city_id = $('.form-select.form-type-city').val();
        	var retailer_id = $('.form-select.form-type-retailer :selected').attr('data-retailer');
        	var region_id = $('.form-select.form-type-region').val();
        	if(!retailer_id){
        		retailer_id = '0';
        	}

        	$('#buy-search-results').empty();
        	$.each(data.stores, function (i, shop) {
            	if (city_id == shop.city_id && retailer_id == shop.retailer_id){
            		$('#buy-search-results').append("<div class='buy-search-result-item'><p class='text'>" + shop.addr + "</p><div class='title-retailer pink'>" + shop.name + "</div></div>");
            	}
            });
        	if(region_id == '0' && city_id == '0' && retailer_id != '0'){
        		//console.log(1);
        		showAlld(retailer_id, 'retail');
        	}else if (region_id != '0' && city_id != '0' && retailer_id == '0'){
        		//console.log(2);
        		showAlld(city_id, 'city');
        	}else if (region_id != '0' && city_id == '0' && retailer_id != '0'){
        		//console.log(3);
        		showAlld(region_id, 'region_retail', retailer_id);
        	}else if (region_id != '0' && retailer_id == '0' && city_id == '0'){
        		//console.log(4);
        		showAlld(region_id, 'region');
        	}else if(region_id == '0' && city_id != '0' && retailer_id != '0'){
        		//console.log(5);
        		showAlld(city_id, 'city_retail', retailer_id);
        	}else if(region_id == '0' && city_id != '0' && retailer_id == '0'){
        		//console.log(6);
        		showAlld(city_id, 'city');
        	}else if(region_id != '0' && city_id != '0' && retailer_id != '0'){ 
        		//console.log(7);
        		showAlld(city_id, 'city_retail', retailer_id);
        	}else{
        		//console.log(8);
        		showAll(0);
        	}
        });
        
        function newInit(data_lat = 55.75396, data_lon = 37.620393, retail_id = 0){

        	map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: +data_lat, lng: +data_lon},
                zoom: initialZoom,
                zoomControl: true,
                zoomControlOptions: {
                    position: google.maps.ControlPosition.LEFT_CENTER
                },
                mapTypeControl: false,
                streetViewControl: false,
                rotateControl: false,
                scrollwheel: false
            });
            
        	//var city_id = $('.form-select.form-type-city').val();
        	
            if($('.form-select.form-type-city').val() !== "0"){
            	map.panTo(new google.maps.LatLng(data_lat, data_lon)); 
            }
            
            showAlld(retail_id, 'city');
        }
        
        function showAlld(param_id, type = 0, retail_id = 0) {
            var ajax = new XMLHttpRequest();
            ajax.onload = function (e) {
                geoData = e.target.response.stores;
                var infowindow = new google.maps.InfoWindow();
                var mcOptions = {
                    maxZoom: 16, styles: [{
                        height: 36,
                        url: "/sites/all/themes/bp_pink/images/ico-marker-group1.png",
                        width: 36,
                        textColor: '#ffffff'
                    },
                        {
                            height: 38,
                            url: "/sites/all/themes/bp_pink/images/ico-marker-group2.png",
                            width: 38,
                            textColor: '#ffffff'
                        },
                        {
                            height: 40,
                            url: "/sites/all/themes/bp_pink/images/ico-marker-group3.png",
                            width: 40,
                            textColor: '#ffffff'
                        },
                        {
                            height: 42,
                            url: "/sites/all/themes/bp_pink/images/ico-marker-group4.png",
                            width: 42,
                            textColor: '#ffffff'
                        },
                        {
                            height: 44,
                            url: "/sites/all/themes/bp_pink/images/ico-marker-group5.png",
                            width: 44,
                            textColor: '#ffffff'
                        }]
                };
                
                if(type == 'city'){
                	deleteMarkers();
                	for (var i = 0; i < geoData.length; i++) {
                        if (param_id == geoData[i].city_id) {

                            var pos = new google.maps.LatLng(geoData[i].lat, geoData[i].lon);
                            var marker = new google.maps.Marker({
                                position: pos,
                                map: map,
                                icon: '/sites/all/themes/bp_pink/images/ico-marker-new.png'
                            });
                            var info = geoData[i].name;
                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                return function () {
                                    infowindow.setContent('<div class="gm-content-wrapper"><div class="pink bold">' + geoData[i].name + '</div>' + geoData[i].addr + '</div>');
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                            
                            markers.push(marker);
                        }
                    }
                }else if (type == 'region'){
                	deleteMarkers();
                	var check = true;
                	for (var i = 0; i < geoData.length; i++) {
                        if (param_id == geoData[i].region_id) {
                        	if(check){
                    			map.panTo(new google.maps.LatLng(geoData[i].lat, geoData[i].lon));
                    			check = false;
                        	}
                            var pos = new google.maps.LatLng(geoData[i].lat, geoData[i].lon);
                            var marker = new google.maps.Marker({
                                position: pos,
                                map: map,
                                icon: '/sites/all/themes/bp_pink/images/ico-marker-new.png'
                            });
                            var info = geoData[i].name;
                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                return function () {
                                    infowindow.setContent('<div class="gm-content-wrapper"><div class="pink bold">' + geoData[i].name + '</div>' + geoData[i].addr + '</div>');
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                            markers.push(marker);
                        }
                    }
            	}else if(type == 'retail'){
            		deleteMarkers();
            		for (var i = 0; i < geoData.length; i++) {
                        if (param_id == geoData[i].retailer_id) {
                            var pos = new google.maps.LatLng(geoData[i].lat, geoData[i].lon);
                            var marker = new google.maps.Marker({
                                position: pos,
                                map: map,
                                icon: '/sites/all/themes/bp_pink/images/ico-marker-new.png'
                            });
                            var info = geoData[i].name;
                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                return function () {
                                    infowindow.setContent('<div class="gm-content-wrapper"><div class="pink bold">' + geoData[i].name + '</div>' + geoData[i].addr + '</div>');
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                            markers.push(marker);
                        }
                    }
            	}else if(type == 'region_retail'){
            		deleteMarkers();
            		for (var i = 0; i < geoData.length; i++) {
                        if (param_id == geoData[i].region_id && retail_id == geoData[i].retailer_id) {
 
                            var pos = new google.maps.LatLng(geoData[i].lat, geoData[i].lon);
                            var marker = new google.maps.Marker({
                                position: pos,
                                map: map,
                                icon: '/sites/all/themes/bp_pink/images/ico-marker-new.png'
                            });
                            var info = geoData[i].name;
                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                return function () {
                                    infowindow.setContent('<div class="gm-content-wrapper"><div class="pink bold">' + geoData[i].name + '</div>' + geoData[i].addr + '</div>');
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                            markers.push(marker);
                        }
                    }
            	}else if(type == 'city_retail'){
            		deleteMarkers();
            		for (var i = 0; i < geoData.length; i++) {
                        if (param_id == geoData[i].city_id && retail_id == geoData[i].retailer_id) {
                            var pos = new google.maps.LatLng(geoData[i].lat, geoData[i].lon);
                            var marker = new google.maps.Marker({
                                position: pos,
                                map: map,
                                icon: '/sites/all/themes/bp_pink/images/ico-marker-new.png'
                            });
                            var info = geoData[i].name;
                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                return function () {
                                    infowindow.setContent('<div class="gm-content-wrapper"><div class="pink bold">' + geoData[i].name + '</div>' + geoData[i].addr + '</div>');
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                            markers.push(marker);
                        }
                    }
            	}else{
            		deleteMarkers();
                	for (var i = 0; i < geoData.length; i++) {
                        if (type == geoData[i].retailer_id && param_id == geoData[i].city_id) {
                            var pos = new google.maps.LatLng(geoData[i].lat, geoData[i].lon);
                            var marker = new google.maps.Marker({
                                position: pos,
                                map: map,
                                icon: '/sites/all/themes/bp_pink/images/ico-marker-new.png'
                            });
                            var info = geoData[i].name;
                            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                                return function () {
                                    infowindow.setContent('<div class="gm-content-wrapper"><div class="pink bold">' + geoData[i].name + '</div>' + geoData[i].addr + '</div>');
                                    infowindow.open(map, marker);
                                }
                            })(marker, i));
                            markers.push(marker);
                        }
                    }
                }
                //deleteMarkers();
                markerCluster = new MarkerClusterer(map, markers, mcOptions);
                //deleteMarkers();
            }

            ajax.open('GET', '/sites/all/themes/bp_pink/data/geodata-new.json', true);
            ajax.responseType = 'json';
            ajax.send();
        }
    });
	}
});