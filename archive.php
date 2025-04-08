<?php get_header(); ?>

	<main role="main">
		<?php if ( $page_id = get_option( 'page_for_posts' ) ) :
    	if (has_post_thumbnail($page_id)) :
      $img_url = get_the_post_thumbnail_url($page_id); ?>
      <section class="w-full h-[25dvh] min-h-[240px] md:min-h-[400px] md:h-[40dvh] xl:h-[60dvh] xl:min-h-[640px] bg-cover bg-[center_top_60%] bg-no-repeat relative" style="background-image: url('<?php echo $img_url; ?>');" role="banner">
      </section>
    <?php endif;
			// the_content() doesn't accept a post ID parameter
			if ( $post = get_post( $page_id ) ) :
					setup_postdata( $post ); //  "posts" page is now current post for most template tags        
					the_content();
					wp_reset_postdata(); // So everything below functions as normal
			endif;
		endif; ?>

		<section class="bg-white">
			<div class="container mx-auto px-6 py-12 xl:py-28">
				<?php get_template_part('pagination'); ?>
				<?php get_template_part('loop'); ?>
			</div>
		</section>
	</main>

<?php get_footer(); ?>