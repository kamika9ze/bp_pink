<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
 //print_R($row);
?>

<div class="cart-product-item">
  <a href="javascript:void(0)" class="cart-product-item-img">
  <?php print $output; ?>
  </a>
  <div class="cart-product-item-content">
    <div class="cart-product-item-title">
      <a href="javascript:void(0)">
      <?php print $row->_field_data['field_product_commerce_product_nid']['entity']->title; ?>
      </a>
    </div>
    <div class="actions-wrap">
      <a href="javascript:void(0)" class="product-view-link">
      <i class="icon-eye"></i>
      </a>
    </div>
  </div>
</div>