<?php

/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?><!DOCTYPE html>
<html lang="<?php print $language->language; ?>">
<head>
    <?php print $head; ?>
    <title><?php print $head_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <?php if (arg(0) == 'node' && is_numeric(arg(1))): // Вывод метатегов нод ?>
		
		<?php $node = node_load(arg(1)); ?>
        
		<?php if (isset($node->field_seo_title['und'][0]['value'])): ?>
		  <meta name="title" content="<?php print $node->field_seo_title['und'][0]['value']; ?>">
		<?php endif; ?>
		
		<?php if (isset($node->field_seo_description['und'][0]['value'])): ?>
		  <meta name="description" content="<?php print $node->field_seo_description['und'][0]['value']; ?>">
		<?php endif; ?>
		
		<?php if (isset($node->	field_seo_keywords['und'][0]['value'])): ?>
		  <meta name="keywords" content="<?php print $node->field_seo_keywords['und'][0]['value']; ?>">
		<?php endif; ?>
		
	<?php endif; ?>
	<?php if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
		    //$styles = str_replace('http', 'https', $styles); 
		    //$scripts = str_replace('http', 'https', $scripts);
			//$_SERVER['HTTPS'] = 'on';
		  }
		?>
		<!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WSQNZQC');</script>
        <!-- End Google Tag Manager -->
	<?php print $styles; ?>
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WSQNZQC"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->


  <!-- Your share button code -->
	<?php
        // Makes all styles inline for performance
        // $chunks = explode(" ", $styles);
        // $https = array();
        // for($i=0; $i<count($chunks); $i++) {
        //     if(strpos($chunks[$i], 'http')) {
        //         $start = strpos($chunks[$i], 'http');
        //         $end = strpos($chunks[$i], '.css');
        //         $raw_http = str_replace('"', '', substr($chunks[$i], $start, $end));
        //         $http = str_replace(' ', '', $raw_http);
        //         array_push($https, $http);
        //     }
        // }
        // for($h=0; $h<count($https); $h++) {
        //     $style = file_get_contents($https[$h]);
        //     print '<style scoped>';
        //     print $style;
        //     print '</style>';
        // }
    ?>
    <div id="skip-link">
        <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
    </div>
    <?php print $page_top; ?>
    <?php print $page; ?>
    <?php print $page_bottom; ?>
    <?php global $user; 

    //var_dump($scripts);
        //if ($user->uid != "142"):?>
    <?php print $scripts; ?>
     <?php /*
     
     //Snow
      
      <script type="text/javascript"> 
    imageDir = "http://mvcreative.ru/example/6/2/snow/"; 
    sflakesMax = 65; 
    sflakesMaxActive = 65; 
    svMaxX = 2; 
    svMaxY = 6; 
    ssnowStick = 1; 
    ssnowCollect = 0; 
    sfollowMouse = 1; 
    sflakeBottom = 0; 
    susePNG = 1; 
    sflakeTypes = 5; 
    sflakeWidth = 15; 
    sflakeHeight = 15; 
    </script> 
  <script type="text/javascript" src="/sites/all/themes/bp_pink/js/snow.js"></script> */?>
  
    <?php //endif;?>
    
    <?php if(request_uri() == '/'){  ?>  
        <!-- CONVERSION TAG -->
        <script type="text/javascript" src="https://cstatic.weborama.fr/js/advertiserv2/adperf_conversion.js"></script>
        <script type="text/javascript">
        var adperftrackobj = {
            fullhost : 'unilever2.solution.weborama.fr'
            ,site : 3471
            ,conversion_page : 560
        };
        try{adperfTracker.track( adperftrackobj );}catch(err){}
        </script>
        <script>
            jQuery(function () {
                jQuery('a[href="/y-zone"]').on('click', function () {
                    var i = document.createElement('img');
                    i.src = 'https://unilever2.solution.weborama.fr/fcgi-bin/dispatch.fcgi?a.A=co&a.si=3471&a.cp=765&a.ct=d';
                });
                jQuery('a[href="/dreamcream"]').on('click', function () {
                    var i = document.createElement('img');
                    i.src = 'https://unilever2.solution.weborama.fr/fcgi-bin/dispatch.fcgi?a.A=co&a.si=3471&a.cp=766&a.ct=d';
                });
                jQuery('a[href="http://www.xn--80aaahk6af1acchhigq.xn--p1ai/"]').on('click', function () {
                    var i = document.createElement('img');
                    i.src = 'https://unilever2.solution.weborama.fr/fcgi-bin/dispatch.fcgi?a.A=co&a.si=3471&a.cp=767&a.ct=d';
                });
            })
        </script>
	<?php } ?>
    
</body>
</html>