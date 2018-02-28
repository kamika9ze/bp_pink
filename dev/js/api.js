var bp = {};

(function($) {

    'use strict';

    var BlackPearl = window.BlackPearl || {};

    BlackPearl = (function() {
        var BlackPearl = function() {
            this.endpoints = ['compare', 'favorite', 'cart'];
            this.route = '/api/cookie/';
			
            this.init();
        }

        return BlackPearl;
    }());

    BlackPearl.prototype.init = function() {
        var _this = this;

        this.update();

        $(document).off('click.shop:controls'); // Protect from loops
        $(document).on('click.shop:controls', '[data-toggle="shop"]', function(event) {
            event.preventDefault();
            _this.toggle(this);
        });

        $(document).off('click.shop:remove'); // Protect from loops
        $(document).on('click.shop:remove', '[data-toggle="shop-remove"]', function(event) {
            event.preventDefault();
            _this.removeProduct(this);
        });

        // Run interval to refresh the indicators
        function refresh() {
            window.setTimeout(refresh, 250);
            _this.refreshIndicators();
            _this.refreshIcons();
			
        }
        refresh();
    };

    BlackPearl.prototype.update = function() {
        var _this = this;
        
		$.each(this.endpoints, function(index, endpoint) {
            _this.get(endpoint, function(stringValues) {
                if(stringValues.length > 0) {
                    var arrayValues = stringValues.split(',');

                    if(arrayValues.length > 0) {
                        _this[endpoint] = arrayValues;
                    }
                } else {
                    _this[endpoint] = null;
                }
            });
        });
    };

    BlackPearl.prototype.get = function(endpoint, callback) {
        var _this = this;
        var callback = callback || function() {};

        var url = this.route + endpoint;
        $.getJSON(url, function(data) {
            callback(data[endpoint+'_products']);
        });
    };

    BlackPearl.prototype.set = function(elem) {
        var _this = this,
            endpoint = $(elem).attr('data-endpoint'),
            id = $(elem).attr('data-product');

        if(id) {
            
			var url = this.route + endpoint + '/' + id;
            $.getJSON(url, function() {
                _this.update();
            });
        }
    };

    BlackPearl.prototype.delete = function(elem) {
        var _this = this,
            endpoint = $(elem).attr('data-endpoint'),
            id = $(elem).attr('data-product');

        if(id) {
            var url = this.route + endpoint + '/' + id + '/delete';
            $.getJSON(url, function() {
                _this.update();
            });
        }
    };

    BlackPearl.prototype.toggle = function(elem) {
        if(!elem) {return;}
        return !$(elem).hasClass('active') ? this.set(elem) : this.delete(elem);
    };

    BlackPearl.prototype.removeProduct = function(elem) {
        var $teasers = $(elem).parents('.teasers-wrapper');
        var href = window.location.href;
        this.delete(elem);
        $(elem).parents('.product-item').hide(200, function() {
            $(elem).parents('.product-item').remove();

            console.log($teasers.find('.product-item').length);
            if($teasers.find('.product-item').length === 0) {
                window.location.href = href;
            }
        });
    };

    BlackPearl.prototype.refreshIndicators = function() {
        var _this = this;
        
		$.each(this.endpoints, function(index, endpoint) {
            var values = _this[endpoint] || null;
			
            if(values && values.length > 0) {
                $('.'+endpoint+'-status .indicator').text(values.length);
                $('.'+endpoint+'-status .indicator').show();
            } else {
                $('.'+endpoint+'-status .indicator').hide(200);
            }
        });
    };

    BlackPearl.prototype.refreshIcons = function() {
        var _this = this;
		
        $('[data-toggle="shop"]').each(function() {
            var endpoint = $(this).attr('data-endpoint');
            if(_this[endpoint] instanceof Array && _this[endpoint].indexOf($(this).attr('data-product')) > -1) {
                $(this).addClass('active');
            } else {
                $(this).removeClass('active');
            }
        });
    };

    // Make BlackPearl available in global scope
    bp = new BlackPearl();

}(jQuery));