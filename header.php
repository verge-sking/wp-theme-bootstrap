<?php
if ( is_front_page() ){
  $addClass = '';
} else {
  $addClass = 'interior';
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<link rel="profile" href="https://gmpg.org/xfn/11">
	  <link href="//www.google-analytics.com" rel="dns-prefetch">
	  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <meta name="description" content="<?php bloginfo('description'); ?>">
		
		<title><?php bloginfo('title') . wp_title(' | ');?></title>

		<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri(); ?>/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri(); ?>/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri(); ?>/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri(); ?>/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri(); ?>/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo get_template_directory_uri(); ?>/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri(); ?>/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/favicon-16x16.png">
		<link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<?php wp_head(); ?>

	  <?php
	  // add any other pages that need the VC stylesheet
	  if (!isset($post) || is_404() || is_search() || $post->post_name=='search'){
	  ?>
	    <link rel='stylesheet' id='js_composer_front-css'  href='/wp-content/plugins/js_composer/assets/css/js_composer.min.css?ver=5.4.2' media='all' />
	  <?php } ?>

  	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/app-min.css">
  
  	<!-- BUGHERD PROJECT 
	  <script type='text/javascript'>
	  (function (d, t) {
	    var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
	    bh.type = 'text/javascript';
	    bh.src = 'https://www.bugherd.com/sidebarv2.js?apikey=jytmhhjfcpjrrbpumnj7jq';
	    s.parentNode.insertBefore(bh, s);
	    })(document, 'script');
	  </script>
		-->

	</head>
	
	<body <?php body_class($addClass); ?>>
		
		<!--Header-->
	
  <header class="header" role="masthead">
    <div class="vc_row wpb_row vc_row-fluid collapse">
      <div class="wpb_column vc_column_container vc_col-sm-12">
        <div class="vc_column-inner">
          <div class="wpb_wrapper">

          	header

          </div>
        </div>
      </div>
    </div>
  </header>

	<main id="main" class="site-main">