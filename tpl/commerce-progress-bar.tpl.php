<div class="cart-tabs justify-wrap">
  <?php foreach ($items as $item):?>
    <div class="cart-tabs-link <?php print implode(' ', $item['class']); ?>">
	  <?php print $item['data']; ?>
    <?php 
      if($item['class'][0] == 'active'){
        $page_title = substr($item['data'], 3);
      }
    ?>
	</div>
  <?php endforeach;?>
  <!--<div class="cart-tabs-link">
    1. Моя корзина
  </div>
  <div class="cart-tabs-link active">
    2. Способ доставки
  </div>
  <div class="cart-tabs-link">
    3. Способ оплаты
  </div>
  <div class="cart-tabs-link">
    4. Подтверждение
  </div>-->
</div>
<h1 class="title-big text-center thin">Заказы. <?php print $page_title; ?></h1>