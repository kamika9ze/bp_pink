(function($) {

    Drupal.behaviors.shopPages = {
        attach: function() {

            // Compare Page
            if($('.compare-table').length > 0) {
                if($('#bp-carousel-compare-content .product-item').length > 0) {
                    $('#add-to-compare').hide();
                    $('#compare-table-wrapper').show();
                    Drupal.behaviors.slickCarousels.compare();
                    Drupal.behaviors.shopPages.equalizeCellHeights();
                } else {
                    $('#compare-table-wrapper').hide();
                    $('#add-to-compare').show();
                }
            }

            // Cart Page
            if($('.cart-table').length > 0) {
                // Checkout form
                var firstname = '',
                    lastname = '',
                    cell = '',

                    delivery = '',
                    deliveryPrice = 0,

                    payment = '',

                    city = $('select[name="personal_data_city"]').val().trim(),
                    street = '',
                    building = '',
                    flat = '',
                    entrance = '',
                    code = '',
                    floor = '',

                    day = $('select[name="date_day"]').val().trim(),
                    time = $('select[name="date_time"]').val().trim();

                function checkoutActions() {

                    // Trigger Checkout
                    $('#shop').on('change', function() {
                        if($(this).val() !== '') {
                            $('.cart-subtotal, .cart-checkout-prompt').hide();
                            $('.trigger-checkout').parent().show();
                            $('.trigger-modal').parent().show();
                        }
                    });

                    // See if user has logged in and selected the shop
                    var query = window.location.search;
                    var shopID = query.substr(query.search('=')+1, query.length);
                    if(shopID.length > 0) {
                        $('#shop').val(shopID).change();
                    }

                    // Trigger Checkout
                    $('.trigger-checkout').on('click', function(e) {
                        e.preventDefault();
                        $('.checkout-wrapper').show();
                        $('.trigger-checkout').parent().hide();
                        $('.trigger-checkout-delivery-method').parent().show();
                    });

                    // Trigger Checkout Delivery Method
                    $('.trigger-checkout-delivery-method').on('click', function(e) {
                        e.preventDefault();
                        if($('input[name="delivery_method"]:checked').length > 0) {
                            $('.trigger-checkout-delivery-method').parent().hide();
                            $('.checkout-payment-method').show();
                            $('.trigger-checkout-payment-method').parent().show();
                        }
                    });

                    // Trigger Checkout Payment Method
                    $('.trigger-checkout-payment-method').on('click', function(e) {
                        e.preventDefault();
                        if($('input[name="payment_method"]:checked').length > 0) {
                            $('.trigger-checkout-payment-method').parent().hide();
                            $('.checkout-personal-data').show();
                            $('.trigger-checkout-personal-data').parent().show();
                        }
                    });

                    // Trigger Checkout Personal Data
                    $('.trigger-checkout-personal-data').on('click', function(e) {
                        e.preventDefault();
                        if(
                            $('input[name="personal_data_firstname"]').val() !== '' &&
                            $('input[name="personal_data_lastname"]').val() !== '' &&
                            $('input[name="personal_data_cell"]').val() !== '' &&
                            $('input[name="personal_data_street"]').val() !== '' &&
                            $('input[name="personal_data_building"]').val() !== ''
                        ) {
                            $('.trigger-checkout-personal-data').parent().hide();
                            $('.checkout-date').show();
                            $('.trigger-checkout-date').parent().show();
                        }
                    });

                    // Trigger Checkout Date
                    $('.trigger-checkout-date').on('click', function(e) {
                        e.preventDefault();
                        $('.trigger-checkout-date').parent().hide();
                        $('.checkout-confirmation').show();
                        $('.trigger-checkout-confirmation').parent().show();
                    });

                    // Trigger Checkout Confirmation
                    $('.trigger-checkout-confirmation').on('click', function(e) {
                        
                    });
                }

                function getSubTotal() {
                    var sum = 0;
                    $('.cart-table-body tr').each(function() {
                        var qty = parseInt($(this).find('.quantity').val());
                        if(qty) {
                            var price = parseFloat($(this).find('.price-value').text().trim().replace(',', '.').replace(' ', ''));
                            sum += price * qty;
                        }
                    });
                    return sum;
                }

                function updateTotal() {
                    var total = getSubTotal() + deliveryPrice;
                    $('.cart-subtotal-sum').text(getSubTotal() + ',00');
                    $('.cart-total-sum').html('<strong>'+total + '</strong>,00');
                    $('.cart-delivery-sum').text(deliveryPrice + ',00');
                }

                function receiver() {
                    if(firstname.length > 0 && lastname.length > 0 && cell.length > 0) {
                        return firstname + ' ' + lastname + '<br>' + cell;
                    }
                    return '';
                }

                function deliveryMethod() {
                    if(delivery.length > 0) {
                        return delivery;
                    }
                    return '';
                }

                function paymentMethod() {
                    if(payment.length > 0) {
                        return payment;
                    }
                    return '';
                }

                function deliveryDate() {
                    if(day.length > 0 && time.length > 0) {
                        return 'Доставка ' + day + ', ' + time;
                    }
                    return '';
                }

                function address() {
                    var output = '';

                    output += city.length > 0 ? city : '';
                    output += street.length > 0 ? ', ' + street : '';
                    output += building.length > 0 ? ', дом ' + building : '';
                    output += flat.length > 0 ? ', кв. ' + flat : '';
                    output += entrance.length > 0 ? ', подъезд ' + entrance : '';
                    output += code.length > 0 ? ', код домофона ' + code : '';
                    output += floor.length > 0 ? ', этаж ' + floor : '';

                    return output;
                }

                checkoutActions();

                $('input[name="delivery_method"]').on('change', function() {
                    delivery = $(this).val().trim();
                    deliveryPrice = parseFloat($('.'+$(this).attr('id')).text().replace(',', '.').replace(' ', ''));
                });
                $('input[name="payment_method"]').on('change', function() {
                    payment = $(this).val().trim();
                });
                $('input[name="personal_data_firstname"]').on('change', function() {
                    firstname = $(this).val().trim();
                });
                $('input[name="personal_data_lastname"]').on('change', function() {
                    lastname = $(this).val().trim();
                });
                $('input[name="personal_data_cell"]').on('change', function() {
                    cell = $(this).val().trim();
                });
                $('select[name="date_day"]').on('change', function() {
                    day = $(this).val().trim();
                });
                $('select[name="date_time"]').on('change', function() {
                    time = $(this).val().trim();
                });
                $('select[name="personal_data_city"]').on('change', function() {
                    city = $(this).val().trim();
                });
                $('input[name="personal_data_street"]').on('change', function() {
                    street = $(this).val().trim();
                });
                $('input[name="personal_data_building"]').on('change', function() {
                    building = $(this).val().trim();
                });
                $('input[name="personal_data_flat"]').on('change', function() {
                    flat = $(this).val().trim();
                });
                $('input[name="personal_data_entrance"]').on('change', function() {
                    entrance = $(this).val().trim();
                });
                $('input[name="personal_data_code"]').on('change', function() {
                    code = $(this).val().trim();
                });
                $('input[name="personal_data_floor"]').on('change', function() {
                    floor = $(this).val().trim();
                });

                var checkoutInterval = setInterval(function() {
                    $('.confirmation-personal-data p').html(receiver());
                    $('.confirmation-delivery-method p').html(deliveryMethod());
                    $('.confirmation-payment-method p').html(paymentMethod());
                    $('.confirmation-date p').html(deliveryDate());
                    $('.confirmation-address p').html(address());
                    updateTotal();
                    Drupal.behaviors.shopPages.updateQuantity();
                }, 1000);
            }
            if($('.cart-total').length === 0) {
                $('.trigger-clear-cart').off('click');
                $('.trigger-clear-cart').on('click', function(e) {
                    e.preventDefault();
                });
            }
            if($('.cart-table').length > 0) {
                $('.trigger-trash').off('click');
                $('.trigger-trash').on('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    Drupal.behaviors.shopCart.removeProduct(this);
                    setTimeout(function() {
                        if(parseInt($('.cart-status .indicator').text().trim()) === 0) {
                            window.location = '/cart';
                        }
                    }, 1000);
                });
            }
        },
        equalizeCellHeights: function() {
            var rows = {};

            // Populate the rows object with maximum height of cells in a row
            $('.compare-table').each(function() {
                $(this).find('.compare-cell').each(function(cellIndex) {
                    if(typeof rows[cellIndex] === 'undefined') {
                        rows[cellIndex] = 0;
                    }
                    if($(this).outerHeight() > rows[cellIndex]) {
                        rows[cellIndex] = $(this).outerHeight();
                    }
                });
            });

            // Resize the cells according to maximum height to make them even
            $('.compare-table').each(function() {
                for(var index in rows) {
                    $(this).find('.compare-cell').eq(index).css('height', rows[index] + 25);
                }
            });
        },
        updateQuantity: function() {
            var text = '';
            var qty = parseInt($('.cart-status .indicator').text().trim());

            if(qty === 1) {
                text = '1 продукт';
            } else if(qty > 1 && qty < 5) {
                text = qty + ' продукта';
            } else {
                text = qty + ' продуктов';
            }

            $('.cart-subtotal-products').text(text);
        }
    }

    /**
     * Catalogue Page
     */
    Drupal.behaviors.shopCataloguePage = {
        attach: function() {
            function build_query() {
                query = {"type": "html", "image_style": "teaser_normal"};
                $('.catalogue-forms .accordion').each(function() {
                    var $form = $(this);
                    var trigger = $form.find('.trigger-catalogue-form');
                    var field = $(trigger).attr('data-field');
                    var type = $(trigger).attr('type');

                    switch(type) {
                        case 'radio':
                            var value = $('.catalogue-forms input[name="'+field+'"]:checked').val();
                            if($('.catalogue-forms input[name="'+field+'"]:checked').length > 0) {
                                query[field] = value;
                            }
                            break;

                        case 'checkbox':
                            var value = '';
                            $('.catalogue-forms input[data-field="'+field+'"]').each(function() {
                                if($(this).is(':checked')) {
                                    if(value.length > 0) {
                                        value += ',';
                                    }
                                    value += $(this).val();
                                }
                            });
                            if($('.catalogue-forms input[data-field="'+field+'"]:checked').length > 0) {
                                query[field] = value;
                            }
                            break;

                        default:
                            break;
                    }
                });
                return query;
            }

            function init_query() {
                var params = build_query();
                var url = '/api/get/products/';
                $('.catalogue-products .ajax-loader').show();
                $('#catalogue-products-view').css('opacity', .25);

                $.get(url, params, function(data) {
                    $('.catalogue-products .ajax-loader').hide();
                    $('#catalogue-products-view').css('opacity', 1).html(data);
                });
            }
            if($('.catalogue-forms').length > 0) {
                $('.trigger-catalogue-form').on('click', function(e) {
                    init_query();
                });
                init_query();
            }
        }
    }

    /**
     * General Methods
     */
    Drupal.behaviors.shopProductsByIds = {
        get: function(ids, func) {
            $.getJSON('/api/get/products/', {"ids": ids, "type": "json"}, function(data) {
                func(data);
            });
        }
    }

}(jQuery));