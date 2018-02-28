<?php

/**
 * @file
 * Default theme implementation to provide an HTML container for comments.
 *
 * Available variables:
 * - $content: The array of content-related elements for the node. Use
 *   render($content) to print them all, or
 *   print a subset such as render($content['comment_form']).
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default value has the following:
 *   - comment-wrapper: The current template type, i.e., "theming hook".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * The following variables are provided for contextual information.
 * - $node: Node object the comments are attached to.
 * The constants below the variables show the possible values and should be
 * used for comparison.
 * - $display_mode
 *   - COMMENT_MODE_FLAT
 *   - COMMENT_MODE_THREADED
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess_comment_wrapper()
 *
 * @ingroup themeable
 */
 
 $comments_count = db_query("SELECT COUNT(cid) AS count FROM {comment} WHERE nid =:nid AND status=1",array(":nid" => $node->nid))->fetchField();
 $comments_count_text = 'На данный момент нет ни одного отзыва';
 if ($comments_count > 0) {
   //$comments_count_text = $comments_count . ' отзывов';
   $comments_count_text = format_plural($comments_count, '1 review', '@count reviews');
 }
 ?>
<?php
    $reviews_count = 0;
?>
<div id="comments" class="<?php print $classes; ?>"<?php print $attributes; ?>>
    <div class="reviews pt-1">
        <h2 class="text-center thin mb-2">Написать отзыв</h2>
    </div>

    <div class="my-2 text-center">
        
        <?php if($content['comment_form']): ?>
            <?php print render($content['comment_form']); ?>
        <?php endif; ?>
    </div>
    
    <div class="comments-count mb-2"><span class="pink bold regular"><?php print $comments_count_text; ?></span></div>
    
    <div class="reviews-list" id="bp-reviews">
        <?php print render($content['comments']); ?>
    </div>    
    
</div>