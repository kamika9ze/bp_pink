<?php

/**
 * @file
 * Default theme implementation for comments.
 *
 * Available variables:
 * - $author: Comment author. Can be link or plain text.
 * - $content: An array of comment items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $created: Formatted date and time for when the comment was created.
 *   Preprocess functions can reformat it by calling format_date() with the
 *   desired parameters on the $comment->created variable.
 * - $changed: Formatted date and time for when the comment was last changed.
 *   Preprocess functions can reformat it by calling format_date() with the
 *   desired parameters on the $comment->changed variable.
 * - $new: New comment marker.
 * - $permalink: Comment permalink.
 * - $submitted: Submission information created from $author and $created during
 *   template_preprocess_comment().
 * - $picture: Authors picture.
 * - $signature: Authors signature.
 * - $status: Comment status. Possible values are:
 *   comment-unpublished, comment-published or comment-preview.
 * - $title: Linked title.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - comment: The current template type, i.e., "theming hook".
 *   - comment-by-anonymous: Comment by an unregistered user.
 *   - comment-by-node-author: Comment by the author of the parent node.
 *   - comment-preview: When previewing a new or edited comment.
 *   The following applies only to viewers who are registered users:
 *   - comment-unpublished: An unpublished comment visible only to administrators.
 *   - comment-by-viewer: Comment by the user currently viewing the page.
 *   - comment-new: New comment since last the visit.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * These two variables are provided for context:
 * - $comment: Full comment object.
 * - $node: Node object the comments are attached to.
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_comment()
 * @see template_process()
 * @see theme_comment()
 *
 * @ingroup themeable
 */
?>
<?php
    // Convinient variables
    $review = $comment->comment_body['und'][0]['value'];
    $url = isset($comment->field_url['und'][0]['value']) ? $comment->field_url['und'][0]['value'] : null;
    $rating = isset($comment->field_review_rating['und'][0]['value']) ? $comment->field_review_rating['und'][0]['value'] : null;

    $source = '';
    $length = rand(100, 300);
    if($url && !empty($url)) {
        $source = '<a href="'.$url.'" target="_blank">irecommend.ru</a>';
    }
    if(mb_strlen($review) > $length) {
        $review = mb_substr($review, 0, $length - 10) . '...';
    }

    // Removes reply link
    unset($content['links']['comment']['#links']['comment-reply']);

    global $reviews_count;
    $reviews_count++;
	//print_R($content);
	
?>
<?php
//
/*$user = user_load($comment->uid);
$fivestar_values = fivestar_get_votes('node', $node->nid, 'vote', $user->uid);
if (isset($fivestar_values['user']['value'])) {  
  $class = array(1 => '', 2 => '', 3 => '', 4 => '', 5 => '');
  switch($fivestar_values['user']['value']) {
	case 20:
      $class[1] = 'on';
	  break;
	
	case 40:
      $class[1] = 'on';
	  $class[2] = 'on';
	  break;
	
	case 60:
      $class[1] = 'on';
	  $class[2] = 'on';
	  $class[3] = 'on';
	  break;
	
	case 80:
      $class[1] = 'on';
	  $class[2] = 'on';
	  $class[3] = 'on';
	  $class[4] = 'on';
	  break;
	
	case 100:
      $class[1] = 'on';
	  $class[2] = 'on';
	  $class[3] = 'on';
	  $class[4] = 'on';
	  $class[5] = 'on';
	  break;	
  }
}*/
?>

<div class="review-new <?php print $classes; ?>">
  <div class="row">
    <div class="col-12 col-review-date">
      <div class="review-date thin pink"><?php print $created; ?></div>
    </div>
    <div class="col-12 col-review-name">
      <div class="review-name regular pink bold"><?php print $author; ?></div>
    </div>
    <div class="col-12 col-review-text">
      <div class="review-text text-small regular"><?php print $review; ?></div>
    </div>
    <div class="col-12 col-review-rating">
    <div class="label pink mr-1">Рейтинг продукта</div>
    <?php print bp_user_get_static_fivestar_rating($node->nid, $comment->uid);?>	
    </div>
  </div>
</div>