<?php 
if(preg_match('/[^a-zA-Zа-яА-Я0-9_\/-]/', request_path())){
    if(preg_match('[^a-zA-Zа-яА-Я0-9_-]', arg(1))){
        $url_path = arg(0);
    }else{
        $url_path = arg(0).'/'.arg(1);
    }
}else{
    $url_path = request_path();
}
?>

<div class="block-answers">
  <div class="container">
    <ul class="breadcrumbs with-arrow">
      <li><a href="/">Главная</a></li>
      <li><a href="">Подбор продукта</a></li>
      <li><a href="/questions">Задайте вопрос эксперту</a></li>
      <li>Ответ эксперта</li>
    </ul>
	<?php print bp_shop_get_mobile_menu();?>
    <div class="block-answers--body row">
      <div class="col-xl-7 col-force-center">
        <h1 class="text-center thin pink"><a href="/questions"></a><?php print $term_name; ?></h1>
		<div class="block-answers--list" id="bp-answers">
          <?php foreach ($nodes as $node): ?>
		  <div class="block-answers--list-item">
            <?php $skintype_term = taxonomy_term_load($node->field_q_skin_type['und'][0]['tid']);?>
			<?php $age = (isset($node->field_q_age['und'][0]['value']) && $node->field_q_age['und'][0]['value']) ? $node->field_q_age['und'][0]['value'] : ''; ?>
			<?php $age_text = bp_pink_get_years_text($age); ?>
			<div class="author-question bold text-center"><?php print $node->field_q_name['und'][0]['value']; ?>, <?php print $age_text; ?> <?php print $skintype_term->name ?> кожа</div>
            <h3 class="text-center thin"><?php print $node->body['und'][0]['value']; ?></h3>
            <div class="answer">
              <div class="row">
                <div class="col-12 col-lg-4 col-md-3 text-center pink">
                  <div class="author-wrapper">
                    <img src="<?php print file_create_url($node->field_q_expert_image['und'][0]['uri']); ?>" />
                    <div class="author-name bold"><?php print $node->field_q_expert_name['und'][0]['value']; ?></div>
                    <div class="author-position"><?php print $node->field_q_expert_position['und'][0]['value']; ?></div>
                  </div>
                </div>
                <div class="col-12 col-lg-8 col-md-9">
                  <div class="author-text"><?php print $node->field_q_answer['und'][0]['value']; ?></div>
                </div>
              </div>
            </div>
            <div class="answer-social">
              <ul class="float-right social-share inline-menu">
                <li><a onclick="Share.facebook('https://www.myblackpearl.ru/<?= $url_path ?>')"><span class="icon-social-facebook icon-social-mono"></span></a></li>
                <li><a onclick="Share.odnoklassniki('https://www.myblackpearl.ru/<?= $url_path ?>')"><span class="icon-social-ok icon-social-mono"></span></a></li>
                <li><a onclick="Share.vkontakte('https://www.myblackpearl.ru/<?= $url_path ?>')"><span class="icon-social-vk icon-social-mono"></span></a></li>
              </ul>
            </div>
          </div>
		  <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>