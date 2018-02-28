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
?>
<div class="count-wrap">
    <a href="javascript:void(0)" class="count-nav count-nav-minus">
		<i class="icon-arrow-left-thick"></i>
	</a>
	<div class="count-field">
		<?php print $output; ?>
	</div>
	<a href="javascript:void(0)" class="count-nav count-nav-plus">
	<i class="icon-arrow-right-thick"></i>
	</a>
	<div class="count-hint">
      в наличии
	</div>
</div>