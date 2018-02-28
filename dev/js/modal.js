(function($) {

    Drupal.behaviors.modalOpen = {
        attach: function() {
            $('#product-modal').on('show.bs.modal', function(event) {
                var $button = $(event.relatedTarget);
                var id = $button.attr('data-product');
                if(id) {
                    $.ajax('/modal/product/'+id).done(function(data) {
                        $('#product-modal .modal-body').remove();
                        $('#product-modal .modal-controls').remove();
                        $('#product-modal .modal-content').append(data);
                        Drupal.behaviors.productGallery.attach();
                        Drupal.behaviors.ratingTrigger.attach();
                    });
                }
            });
            $('#product-selection').on('show.bs.modal', function(event) {
                var params = {"type": "html", "image_style": "teaser_small", "max": 30, "trigger": "compare"};

                $.get('/api/get/products', params, function(response) {
                    $('#catalogue-products-small-view').html(response);
                    $('#catalogue-products-small-view .product-item a').on('click', function(e) {
                        e.preventDefault();
                    });
                });
            });
        }
    }

}(jQuery));