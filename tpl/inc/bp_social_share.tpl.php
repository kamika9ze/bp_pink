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
<div class="col-xl-12 text-center">
    <p class="text-small regular">Поделиться в соцсетях:</p>
    <ul class="social-share inline-menu d-inline-block">
      	<li class="fb"><a class="nav-link" onclick="Share.facebook('https://www.myblackpearl.ru/<?=$url_path?>')"><span class="icon-social-facebook"></span></a></li>
        <li class="ok"><a class="nav-link" onclick="Share.odnoklassniki('https://www.myblackpearl.ruf/<?=$url_path?>')"><span class="icon-social-ok"></span></a></li>
        <li class="vk"><a class="nav-link" onclick="Share.vkontakte('https://www.myblackpearl.ru/<?=$url_path?>')"><span class="icon-social-vk"></span></a></li>
    </ul>
</div>