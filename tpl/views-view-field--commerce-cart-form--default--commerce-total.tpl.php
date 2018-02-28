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
 $counter_parts = explode('+_=+', $output);
 $output = $counter_parts[1];
 $pts = explode(' руб.', $output);
 $parts = explode(',', $pts[0]);
 //print_R($row);
?>
<div class="cart-form-price">
             <?php print $parts[0]; ?>, <span><?php print $parts[1]; ?></span> <i class="icon-rubble"></i>
            </div>
<!-- <button type="submit" class="remove-from-cart delete-line-item form-submit ajax-processed" id="edit-edit-delete-0" name="delete-line-item-0"></button> -->
<?php 
	//$link = str_replace('input', 'button', $pts[1]);
	//print $link . '</button>'; 
	//print_R($pts[1]);
	//print $pts[1];
	//print_r($pts[1]); exit();
	//$pts1 = explode('input', $pts[1]);
	//print_R($pts);
	//exit();
	//$pts2 = explode('"',$pts1[1]);
	print '<button type="submit" class="remove-from-cart delete-line-item form-submit ajax-processed" id="edit-edit-delete-' . ($counter_parts[0]*1-1) .'" name="delete-line-item-' . ($counter_parts[0]*1-1) . '"></button>'; 
?>