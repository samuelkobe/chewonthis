<?php get_header(); ?>

	<main role="main">
    <?php if (has_post_thumbnail()) : ?>
      <?php $img_url = get_the_post_thumbnail_url(); ?>
      <section class="w-full h-[25dvh] min-h-[240px] md:min-h-[400px] md:h-[40dvh] xl:h-[60dvh] xl:min-h-[640px] bg-cover bg-[center_top_60%] bg-no-repeat relative" style="background-image: url('<?php echo $img_url; ?>');" role="banner">
      </section>
    <?php endif; ?>
		<?php the_content(); ?>
	</main>

<?php get_footer(); ?>