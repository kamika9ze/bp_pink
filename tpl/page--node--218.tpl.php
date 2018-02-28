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
?>
<?php include_once('inc/bp_header.tpl.php'); ?>
<main>
	<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

		<?php print $user_picture; ?>

		<?php print render($title_prefix); ?>
		<?php if (!$page): ?>
			<h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
		<?php endif; ?>
		<?php print render($title_suffix); ?>

		<?php if ($display_submitted): ?>
			<div class="submitted">
				<?php print $submitted; ?>
			</div>
		<?php endif; ?>

		<div class="content"<?php print $content_attributes; ?>>
			<?php
			// We hide the comments and links now so that we can render them later.
			hide($content['comments']);
			hide($content['links']);
			print render($content);
			?>
  
    <div class="container mt-2">
      <h1 class="title-big thin text-center">Видео</h1>

      <div class="row favorite-body">
        <div class="col-12 col-lg-6 col-md-6">
          <div class="video-wrapper">
            <span class="video-wrapper-link" data-toggle="modal" data-target="#video-modal-1">
              <span class="arrow-video"></span>
              <span class="video-title">Название видео</span>
              <img src="/sites/all/themes/bp_pink/images/video-1.jpg" />
            </span>
            <div class="row">
              <div class="col-12 col-lg-6 col-md-6"><span>Название подраздела</span></div>
              <div class="col-12 col-lg-6 col-md-6 text-right">
                <span>
                  <ul class="footer-social social-share inline-menu">
                    <li><a onclick="Share.facebook('https://www.myblackpearl.ru/')"><span class="icon-social-facebook icon-social-mono"></span></a></li>
                    <li><a onclick="Share.odnoklassniki('https://www.myblackpearl.ru/')"><span class="icon-social-ok icon-social-mono"></span></a></li>
                    <li><a onclick="Share.vkontakte('https://www.myblackpearl.ru/')"><span class="icon-social-vk icon-social-mono"></span></a></li>
                  </ul>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
          <div class="video-wrapper">
            <span class="video-wrapper-link" data-toggle="modal" data-target="#video-modal-1">
              <span class="arrow-video"></span>
              <span class="video-title">Название видео</span>
              <img src="/sites/all/themes/bp_pink/images/video-2.jpg" />
            </span>
            <div class="row">
              <div class="col-12 col-lg-6 col-md-6"><span>Название подраздела</span></div>
              <div class="col-12 col-lg-6 col-md-6 text-right">
                <span>
                  <ul class="footer-social social-share inline-menu">
                    <li><a href="#"><span class="icon-social-google icon-social-mono"></span></a></li>
                    <li><a href="#"><span class="icon-social-ok icon-social-mono"></span></a></li>
                    <li><a href="#"><span class="icon-social-vk icon-social-mono"></span></a></li>
                  </ul>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12">
          <div class="video-wrapper">
             <span class="video-wrapper-link" data-toggle="modal" data-target="#video-modal-1">
              <span class="arrow-video"></span>
              <span class="video-title">Название видео</span>
              <img src="/sites/all/themes/bp_pink/images/video-3.jpg" />
            </span>
            <div class="row">
              <div class="col-12 col-lg-6 col-md-6"><span>Название подраздела</span></div>
              <div class="col-12 col-lg-6 col-md-6 text-right">
                <span>
                  <ul class="footer-social social-share inline-menu">
                    <li><a href="#"><span class="icon-social-google icon-social-mono"></span></a></li>
                    <li><a href="#"><span class="icon-social-ok icon-social-mono"></span></a></li>
                    <li><a href="#"><span class="icon-social-vk icon-social-mono"></span></a></li>
                  </ul>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
          <div class="video-wrapper">
            <span class="video-wrapper-link" data-toggle="modal" data-target="#video-modal-1">
              <span class="arrow-video"></span>
              <span class="video-title">Название видео</span>
              <img src="/sites/all/themes/bp_pink/images/video-1.jpg" />
            </span>
            <div class="row">
              <div class="col-12 col-lg-6 col-md-6"><span>Название подраздела</span></div>
              <div class="col-12 col-lg-6 col-md-6 text-right">
                <span>
                  <ul class="footer-social social-share inline-menu">
                    <li><a href="#"><span class="icon-social-google icon-social-mono"></span></a></li>
                    <li><a href="#"><span class="icon-social-ok icon-social-mono"></span></a></li>
                    <li><a href="#"><span class="icon-social-vk icon-social-mono"></span></a></li>
                  </ul>
                </span>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-6 col-md-6">
          <div class="video-wrapper">
            <span class="video-wrapper-link" data-toggle="modal" data-target="#video-modal-1">
              <span class="arrow-video"></span>
              <span class="video-title">Название видео</span>
              <img src="/sites/all/themes/bp_pink/images/video-2.jpg" />
            </span>
            <div class="row">
              <div class="col-12 col-lg-6 col-md-6"><span>Название подраздела</span></div>
              <div class="col-12 col-lg-6 col-md-6 text-right">
                <span>
                  <ul class="footer-social social-share inline-menu">
                    <li><a href="#"><span class="icon-social-google icon-social-mono"></span></a></li>
                    <li><a href="#"><span class="icon-social-ok icon-social-mono"></span></a></li>
                    <li><a href="#"><span class="icon-social-vk icon-social-mono"></span></a></li>
                  </ul>
                </span>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-12 text-center">
          <a href="" class="load-more">Загрузить еще</a>
        </div>
      </div>

    </div>
  
		<?php print render($content['links']); ?>

		<?php print render($content['comments']); ?>

	</div>
	<div class="bp-footer-vessel"></div>
</main>
<?php  include_once('inc/bp_footer.tpl.php'); ?>

<div class="modal fade modal-black modal-video" id="video-modal-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel7" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<a class="close" data-dismiss="modal" aria-label="Закрыть">
				<span aria-hidden="true" class="icon-medium icon-cross-slim"></span>
			</a>
			<div class="modal-body">
				<div class="row">
					<div class="col-12">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/ljqD7128uGU" frameborder="0" allowfullscreen></iframe>
          </div>
				</div>
        <div class="row video-description white">
          <div class="col-6">
            <span class="bold uppercase">Название раздела</span> / <span class="text-regular thin">Название подраздела</span>
          </div>
          <div class="col-6 text-right">
            <ul class="footer-social social-share inline-menu">
              <li><a href="#"><span class="icon-social-google icon-social-mono"></span></a></li>
              <li><a href="#"><span class="icon-social-ok icon-social-mono"></span></a></li>
              <li><a href="#"><span class="icon-social-vk icon-social-mono"></span></a></li>
            </ul>          
            <span class="total-views">115 просмотров</span>
          </div>
        </div>
			</div>

		</div>
	</div>
</div>
