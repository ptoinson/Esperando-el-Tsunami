<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	
	<!--  facebook  -->
	<link rel="image_src" href="<?php echo mr_image_url('lulacruza-esperando-md.jpg'); ?>" />
	<meta property="og:image" content="<?php echo mr_image_url('lulacruza-esperando-md.jpg'); ?>" />
	
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" />
	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

	<?php wp_head(); ?>
	
</head>

<body <?php body_class(array('single-page')); ?>>
	
	<div id="page-wrap">

<?php 
			while (have_posts())
			{
				the_post();
				$post_slug = $post->post_name;

				$innerQuery = new WP_Query();
				$innerArgs = array(
				  'post_type' => 'page',
				  'post_parent' => 2,
				  'order_by' => 'order',
				  'order' => 'ASC'
				  );
			  
			  $innerQuery->query($innerArgs);
			  if($innerQuery->have_posts())
			  {
			  	echo '<div id="menu-main">' . "\n";
					
				  while($innerQuery->have_posts()) 
				  {	
				  	  $innerQuery->the_post();
				  	  echo '    <a id="btn-' . $post->post_name . '" class="menu-main-item" href="' . get_bloginfo('url', 'display') .'#' . $post->post_name . '">'.  strtoupper (the_title('', '', false)) . '</a>';
				  	  if ( $innerQuery->current_post + 1 < $innerQuery->post_count )
			  			{
					  		echo '<img class="menu-main-sep" src="' . mr_image_url("menu-sep.gif") . '"/>';
			  			}
				  }
				  
				  echo '</div>' . "\n";
			  }
			}
?>
		<!--  
		<div id="header">
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<div class="description"><?php bloginfo('description'); ?></div>
		</div>
		-->

