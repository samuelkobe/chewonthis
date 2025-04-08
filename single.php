<?php get_header(); ?>

	<main role="main">

    <?php if (has_post_thumbnail()) : ?>
      <?php $img_url = get_the_post_thumbnail_url(); ?>
      <section class="bg-paprika">
        <div class="container mx-auto w-full h-[25dvh] min-h-[240px] md:min-h-[400px] md:h-[40dvh] xl:h-[60dvh] xl:min-h-[640px] bg-cover bg-[center_top_60%] bg-no-repeat relative" style="background-image: url('<?php echo $img_url; ?>');" role="banner">
          <div class="w-full h-full bg-dark bg-opacity-50 flex items-center justify-center">
            <h1 class="text-white text-center text-4xl lg:text-5xl xl:text-6xl font-condensed font-semibold uppercase tracking-wider"><?php the_title(); ?></h1>
          </div>
        </div>
      </section>
    <?php endif; ?>

    <section class="bg-white">
      <div class="container mx-auto grid grid-cols-12">

        <div class="col-span-12 md:col-span-12 2xl:col-span-12 wysiwyg p-6 xl:pt-12">
          <?php the_content(); ?>
        </div>
        
        <div class="col-span-12 md:col-span-12 2xl:col-span-12 p-6 xl:pb-12">
          <?php if ( is_single() ) {
            $args = array(
              'post_type' => 'post',
              'posts_per_page' => 5,
              'post__not_in' => array( get_the_ID() ), // Exclude the current post
              'orderby' => 'date',
              'order' => 'DESC'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              ?>
              <div class="recent-posts">
                <h2 class="text-3xl xl:text-5xl font-condensed text-dark uppercase mb-3 xl:mb-6">Recent Posts</h2>
                <ul class="flex flex-col lg:flex-row lg:flex-wrap lg:gap-x-12 gap-y-4 lg:gap-y-4">
                  <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php $post_title = get_the_title(); ?>
                    <li class="font-semibold">
                      <a class="text-caramel hover:text-caramel-vivid transition-colors duration-300" href="<?php the_permalink(); ?>"><?php echo my_custom_title($post_title); ?></a>
                    </li>
                  <?php endwhile; ?>
                </ul>
              </div>
              <?php
            endif;
            wp_reset_postdata();
          } ?>
        </div>
                  
      </div>
    </section>

	</main>

<?php get_footer(); ?>
