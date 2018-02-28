<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all,
 *   or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct URL of the current node.
 * - $display_submitted: Whether submission information should be displayed.
 * - $submitted: Submission information created from $name and $date during
 *   template_preprocess_node().
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - node: The current template type; for example, "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
 *     listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type; for example, story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode; for example, "full", "teaser".
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $sticky: Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined; for example, $node->body becomes $body. When needing to
 * access a field's raw values, developers/themers are strongly encouraged to
 * use these variables. Otherwise they will have to explicitly specify the
 * desired field language; for example, $node->body['en'], thus overriding any
 * language negotiation rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 *
 * @ingroup themeable
 */

global $base_root;

$string = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/sites/all/themes/bp_pink/data/geodata-new.json");
//$string = file_get_contents("test.json");
$json = json_decode($string, true);

/*foreach ($json_a as $k => $v) { 
  print_R($k);
}*/
//print_R($json_a['cities']);

?>
<?php include_once('inc/bp_header.tpl.php'); ?>


<main>
    <div class="test breadcrumbs-wrapper container text-small regular mt-2">
        <ul class="breadcrumbs with-arrow">
            <li><a href="/">Главная</a></li>
            <li>Где купить</li>
        </ul>
    </div>
    <h1 class="thin text-center">Где купить</h1>
    <div class="block-map">
        <div class="block-map--banners text-center my-2 container">
            <div class="bann_item" >
            	<a href="https://www.ozon.ru/brand/18380489" target="_blank"><img src="/<?php print path_to_theme(); ?>/images/shop-banner-ozon.png"/></a>
            </div>
            <div class="bann_item" >
            	<a href="https://www.utkonos.ru/search?query=Черный+жемчуг" target="_blank"><img src="/<?php print path_to_theme(); ?>/images/shop-banner-utkonos.png"/></a>
            </div>
            <div class="bann_item" >
            	<a href="https://www.wildberries.ru/brands/cherniy-zhemchug" target="_blank"><img src="/<?php print path_to_theme(); ?>/images/wildb_logo.png"/></a> 
            </div>
            <div class="bann_item" >
            	<a href="https://www.perekrestok.ru/catalog/krasota-gigiena-bytovaya-himiya/uhod-za-kojey/sredstva-dlya-litsa/brand/chernyy-jemchug?searchPhrase=черный%20жемчуг" target="_blank"><img src="/<?php print path_to_theme(); ?>/images/perekr_logo.png"/></a>  </div>
            <div class="bann_item" >
            	<a href="https://www.okeydostavka.ru/webapp/wcs/stores/servlet/SearchDisplay?searchTermScope=&searchType=1000&filterTerm=&maxPrice=&top_category=&showResultsPage=true&langId=-20&beginIndex=0&advancedSearch=&sType=SimpleSearch&metaData=&pageSize=72&manufacturer=&resultCatEntryType=2&catalogId=12051&pageView=grid&searchTerm=черный+жемчуг+дневной&minPrice=&urlLangId=-20&categoryId=16068&storeId=10151#facet:-700000000000001615110631077108810851099108132107810771084109510911075&productBeginIndex:0&orderBy:&pageView:grid&minPrice:&maxPrice:&pageSize:&" target="_blank"><img src="/<?php print path_to_theme(); ?>/images/ok_logo.png"/></a>  
            </div> 
        </div>
        <div class="block-map--gmaps py-2">
            <div class="title pink bold text-center uppercase mb-3">Адреса магазинов где можно купить нашу продукцию
            </div>
            <div class="container">
                <form class="" action="" name="">
                    <div class="row">
                        <?php
                        global $user;
                        if (in_array('administrator', $user->roles)) {

                            //var_dump($_SERVER["DOCUMENT_ROOT"]);
                        }
                        ?>
                        <div class="col-12 col-md-4">
                            <label>Регион</label>
                            <select class="form-select form-type-region">
                                <option value="0" selected="selected">Укажите ваш регион</option>
                                <option value="16">Алтайский край</option>
                                <option value="66">Архангельская область</option>
                                <option value="13">Астраханская область</option>
                                <option value="35">Белгородская область</option>
                                <option value="37">Брянская область</option>
                                <option value="7">Владимирская область</option>
                                <option value="15">Волгоградская область</option>
                                <option value="25">Вологодская область</option>
                                <option value="4">Воронежская область</option>
                                <option value="45">Ивановская область</option>
                                <option value="52">Иркутская область</option>
                                <option value="63">Кабардино-Балкарская республика</option>
                                <option value="57">Калмыкия республика</option>
                                <option value="53">Калужская область</option>
                                <option value="59">Карачаево-Черкесская республика</option>
                                <option value="30">Кемеровская область</option>
                                <option value="55">Кировская область</option>
                                <option value="61">Костромская область</option>
                                <option value="21">Краснодарский край</option>
                                <option value="41">Красноярский край</option>
                                <option value="67">Курганская область</option>
                                <option value="5">Курская область</option>
                                <option value="56">Ленинградская область</option>
                                <option value="44">Липецкая область</option>
                                <option value="1">Москва</option>
                                <option value="2">Московская область</option>
                                <option value="50">Мурманская область</option>
                                <option value="6">Нижегородская область</option>
                                <option value="19">Новгородская область</option>
                                <option value="43">Новокузнецкая область</option>
                                <option value="12">Новосибирская область</option>
                                <option value="17">Омская область</option>
                                <option value="31">Оренбургская область</option>
                                <option value="49">Орловская область</option>
                                <option value="24">Пензенская область</option>
                                <option value="40">Пермский край</option>
                                <option value="27">Псковская область</option>
                                <option value="58">Республика Адыгея</option>
                                <option value="33">Республика Башкортостан</option>
                                <option value="20">Республика Карелия</option>
                                <option value="29">Республика Коми</option>
                                <option value="42">Республика Марий Эл</option>
                                <option value="60">Республика Мордовия</option>
                                <option value="22">Республика Татарстан</option>
                                <option value="68">Республика Хакасия</option>
                                <option value="26">Ростовская область</option>
                                <option value="8">Рязанская область</option>
                                <option value="18">Самарская область</option>
                                <option value="11">Санкт-Петербург</option>
                                <option value="51">Саранская область</option>
                                <option value="23">Саратовская область</option>
                                <option value="39">Свердловская область</option>
                                <option value="62">Северная Осетия - Алания республика</option>
                                <option value="47">Смоленская область</option>
                                <option value="46">Ставропольский край</option>
                                <option value="64">Тамбовская область</option>
                                <option value="9">Тверская область</option>
                                <option value="36">Томская область</option>
                                <option value="3">Тульская область</option>
                                <option value="14">Тюменская область</option>
                                <option value="38">Удмуртская республика</option>
                                <option value="34">Ульяновская область</option>
                                <option value="32">Ханты-Мансийский Автономный округ - Югра АО</option>
                                <option value="48">Челябинская область</option>
                                <option value="54">Чеченская республика</option>
                                <option value="28">Чувашская республика</option>
                                <option value="65">Ямало-Ненецкий АО</option>
                                <option value="10">Ярославская область</option>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Город</label>
                            <select class="form-select form-type-city">
                                <?php /*foreach ($json['cities'] as $key => $city_arr): ?>
				  <option value="<?php print $city_arr['id']; ?>"><?php print $city_arr['name']; ?></option>
				<?php endforeach; */ ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-4">
                            <label>Торговая сеть</label>
                            <select class="form-select form-type-retailer">
                                <?php /*foreach ($json['retailers'] as $key => $retailer_arr): ?>
				  <option value="<?php print $retailer_arr['id']; ?>"><?php print $retailer_arr['name']; ?></option>
				<?php endforeach; */ ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div id="map-wrapper">
                <div id="map" class="mt-2"></div>
                <script src="/sites/all/themes/bp_pink/js/markerclusterer.js"></script>
                <script>
                    var map;
                    var initialCentreLat = 55.75396;
                    var initialCentreLng = 37.620393;
                    var geoData;

                    var initialZoom = 10;
                    var markers = [];
                    var markerCluster;
                    
                    function showAll(retailer_id) {
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
                            for (var i = 0; i < geoData.length; i++) {
                                if ((retailer_id && retailer_id == geoData[i].retailer_id) || (!retailer_id)) {
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
                            markerCluster = new MarkerClusterer(map, markers, mcOptions);
                        }
                        ajax.open('GET', '/sites/all/themes/bp_pink/data/geodata-new.json', true);
                        ajax.responseType = 'json';
                        ajax.send();
                    }

                    function markerClick(i) {
                        // map.setCenter(markers[i].getPosition());
                        // map.setZoom(19);
                        google.maps.event.trigger(markers[i], "click");
                    }
                    function initMap() {
                        map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: initialCentreLat, lng: initialCentreLng},
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
                        google.maps.event.addListener(map, 'click', function () {
                            /* infowindow.close(); */
                        });

                        showAll(0);

                        /*jQuery('select.form-type-retailer').change(function(){ 

                         });*/
                    }
                    /* Geolocation */
                    var geocoder;

                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
                    }
                    //Get the latitude and the longitude;
                    function successFunction(position) {
                        var lat = position.coords.latitude;
                        var lng = position.coords.longitude;

                        map.setCenter({lat: lat, lng: lng});
                    }

                    function deleteMarkers() {
                        for (var i = 0; i < markers.length; i++) {
                            markers[i].setMap(null); //Remove the marker from the map
                        }
                        markerCluster.clearMarkers();
                        markers = [];
                    }


                    function errorFunction() {
                        console.log("Geocoder failed");
                    }
                </script>
            </div>
        </div>
        <div id="map-search-wrapper">
            <div class="container">
                <div class="row my-2">
                    <div class="col-lg-6"><h3 class="title uppercase regular text-right" style="display:none;">Введите
                            название вашего города</h2></div>
                    <div class="col-lg-6 map-search-container" style="display:none;">
                        <input type="text" id="map-search">
                        <div class="search-hints-wrapper hintsFadeIn">
                            <ul class="search-hints">
                                <li class="search-hint"><a href="#">Зеленый Луг-5, Минск, Беларусь</a></li>
                                <li class="search-hint"><a href="#">Любенский, Гомель, Беларусь</a></li>
                                <li class="search-hint"><a href="#">Новогрудок, Гродненская область, Беларусь</a></li>
                                <li class="search-hint"><a href="#">Лиозно, Витебская область, Беларусь</a></li>
                                <li class="search-hint"><a href="#">Ямницкий, Могилёв, Беларусь</a></li>
                                <li class="search-hint"><a href="#">деревня Боровляны-2, деревня Боровляны, Минский
                                        район, Минская область, Беларусь</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div id="preloader-wrapper" style="display:none;">
                        <div id="preloader">
                            <div id="preloader_1" class="preloader"></div>
                            <div id="preloader_2" class="preloader"></div>
                            <div id="preloader_3" class="preloader"></div>
                            <div id="preloader_4" class="preloader"></div>
                            <div id="preloader_5" class="preloader"></div>
                            <div id="preloader_6" class="preloader"></div>
                            <div id="preloader_7" class="preloader"></div>
                            <div id="preloader_8" class="preloader"></div>
                        </div>
                    </div>
                    <div id="search-found-count" class="col-lg-12">
                        <div class="title uppercase bold text-center mt-1 mb-3">Адреса магазинов</div>
                        <div id="buy-search-results"></div>
                        <div id="buy-search-results-nav"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bp-footer-vessel"></div>
</main>
<?php include_once('inc/bp_footer.tpl.php'); ?>
