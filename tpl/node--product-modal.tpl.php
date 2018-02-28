<div class="modal-body">
    <div class="row">
        <div class="col-10 col-force-center">
            <div class="row mt-3 product-view">
                <div class="hidden-md-down col-lg-5">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="product-gallery-gutter">
                                <?php for($i = 0; $i < count($bp_field_image); $i++): ?>
                                  <div class="product-gallery-thumb" data-slide="<?php print $i; ?>"><img src="<?php print $bp_field_image[$i]['src']; ?>" class="img-fluid" alt="<?php print $bp_field_image[$i]['alt']; ?>" title="<?php print $bp_field_image[$i]['title']; ?>"></div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="product-gallery">
                                <?php for($j = 0; $j < count($bp_field_image); $j++): ?>
                                  <div class="product-gallery-slide" data-slide="<?php print $j; ?>">
                                      <img class="center-block img-fluid" src="<?php print $bp_field_image[$j]['src']; ?>" alt="<?php print $bp_field_image[$j]['alt']; ?>" title="<?php print $bp_field_image[$j]['title']; ?>">
                                  </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <?php if($bp_field_new): ?>
                      <div class="btn-wrapper text-center text-lg-left mb-1"><span class="bp-card-label title-normal light bg-grey-trans" tabindex="0">Новинка</span></div>
                    <?php endif; ?>
                    <h1 class="text-center text-lg-left title-big thin mb-1"><?php print $title; ?></h1>

                    <div class="hidden-lg-up mobile-product-img active mt-1">
                        <img class="center-block img-fluid" src="<?php print $bp_field_image[0]['src']; ?>" alt="<?php print $bp_field_image[0]['alt']; ?>" title="<?php print $bp_field_image[0]['title']; ?>">
                    </div>
                    <div class="hidden-lg-up text-center product-controls mt-1">
                        <a href="#" class="pink" data-endpoint="compare" data-product="<?php print $node->nid; ?>" data-toggle="shop"><span class="icon-big bp-icon-compare"></span></a>
                        <a href="#" class="pink" data-endpoint="favorite" data-product="<?php print $node->nid; ?>" data-toggle="shop"><span class="icon-big bp-icon-favorite"></span></a>
                    </div>
                    <span class="text text-big bold pink regular volume"><?php print $bp_field_volume; ?></span>
                    <table class="product-specs text-small mt-1">
                        <?php foreach($bp_product_details as $detail_key => $detail_value): ?>
                            <?php if(!empty($detail_value)) :?>
                            <tr>
                                <td class="text-left detail-name bold"><span class="regular"><?php print $detail_key; ?></span></td>
                                <td class="regular detail-desc"><?php print $detail_value; ?></td>
                            </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="clearfix"></div>
            </div>
              <div class="row product-page-controls product-controls text-center">
                  <div class="col-xl-5 col-5">
                    <a href="#" class="hidden-md-down pink" data-endpoint="compare" data-product="<?php print $node->nid; ?>" data-toggle="shop"><span class="icon-big bp-icon-compare balance"></span><div>Сравнить</div></a>
                    <a href="#" class="hidden-md-down pink" data-endpoint="favorite" data-product="<?php print $node->nid; ?>" data-toggle="shop"><span class="icon-big bp-icon-favorite heart"></span><div>В избранное</div></a>                      
                  </div>
                  <div class="col-xl-7 col-7">
                    <div class="float-right product-rating fix-rate">
                        <span class="title pink mr-1">Рейтинг</span>
                        <?php $fivestar_widget = bp_fivestar_widget_get_callback($node->nid); ?>
						<?php print render($fivestar_widget); ?>
                    </div>                      
                    <div class="text-left"><?php print bp_commerce_get_add_to_cart_button($node->field_product['und'][0]['product_id']); ?></div>
                  </div>
              </div>
        </div>
    </div>
</div>
<div class="modal-controls product-control">
    <div class="btn-wrapper py-1 text-center mt-2">
        <a href="/<?php print drupal_get_path_alias('node/' . $node->nid); ?>" class="pink">Подробнее о продукте<span class="icon-arrow-right"></span></a>
    </div>
    <div class="my-2 socials">
        <div class="social-share-wrapper row">
            <?php include_once('inc/bp_social_share.tpl.php'); ?>
        </div>
    </div>
</div>