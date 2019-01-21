<?php get_header(); ?>
	
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

	<article class="site-archive">
		<div class="entry-content">

			<?php the_content();?>

		</div>
	</article>
	
	<?php endwhile; ?>

<?php get_footer(); ?>