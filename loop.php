<?php if (have_posts()): ?>
	<div class="grid grid-cols-12 gap-y-8 sm:gap-8 xl:gap-x-20 xl:gap-y-16">
		<?php while (have_posts()) : the_post(); ?>
			<?php if (get_post_type() === 'post'): ?>
				<?php $post_excerpt = get_the_excerpt(); ?>
				<?php if (is_sticky() && get_query_var( 'paged' ) == 0 ) : ?>
					<div class="bg-[#ffffff] max-w-[320px] mx-auto w-full md:max-w-full col-span-12 shadow-md rounded-2xl overflow-hidden <?php if (is_sticky()) { echo 'sticky-post'; } ?>">
					<?php $bg_bar_colour = 'bg-honey'; ?>
				<?php else : ?>
					<div class="bg-[#ffffff] max-w-[320px] mx-auto md:mx-0 md:max-w-none col-span-12 md:col-span-6 lg:col-span-4 2xl:col-span-3 xl:max-w-[360px] xl:mx-auto shadow-md rounded-2xl overflow-hidden">
					<?php $bg_bar_colour = 'bg-paprika'; ?>
				<?php endif; ?>
						<div class="flex justify-center w-full h-auto rounded-2xl">
							<div class="rounded-2xl flex flex-col w-full h-full">

								<a class="h-56 xl:h-64 flex w-full relative" href="<?php the_permalink(); ?>" title="View the <?php the_title(); ?> post." aria-label="Open the <?php the_title(); ?> post.">
									<?php if ( has_post_thumbnail()) : ?>
										<?php the_post_thumbnail('full', array('class' => 'object-cover h-full w-full')); ?>
									<?php endif; ?>
									<span class="capitalize font-main italic font-semibold tracking-wider text-sm lg:text-xs xl:text-sm antialiased <?php echo $bg_bar_colour; ?> absolute bottom-0 left-0 right-0 text-center text-white p-1"><?php the_time('M j, Y'); ?></span>
								</a>

								<div class="min-h-[280px] lg:h-auto p-6 flex items-center justify-between flex-col gap-y-2">
									<div class="flex flex-col justify-between">
										<a href="#" class="flex items-center">
											<?php $post_title = get_the_title(); ?>
											<h2 class="font-condensed font-semibold uppercase tracking-wide text-3xl lg:text-2xl xl:text-3xl text-dark text-center w-full"><?php echo my_custom_title($post_title); ?></h2>
										</a>
									</div>
									<div class="flex items-center">
										<p class="text-center font-main text-sm lg:text-bse xl:text-lg max-w-[800px] py-2">
											<?php if (is_sticky() && get_query_var( 'paged' ) == 0 ) : ?>
												<?php echo custom_post_excerpt($post_excerpt, 32); ?>
											<?php else : ?>
												<?php echo custom_post_excerpt($post_excerpt, 12); ?>
											<?php endif; ?>
											</p>
									</div>
									<div class="flex flex-col items-center justify-center mb-4">
										<a class="btn small hover:!<?php echo $bg_bar_colour; ?>" href="<?php the_permalink(); ?>" title="View the <?php the_title(); ?> post." aria-label="Open the <?php the_title(); ?> post.">
											View Post
										</a>
									</div>
								</div>

							</div>
						</div>
					</div>
			<?php endif; ?>
		
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</div>
<?php else: ?>
	<h2 class="leading-normal text-xl lg:text-3xl">Oops, looks like there are no posts at this time. Go back <a class="border-b-2" rel="Back home" href="<?php echo esc_url( home_url() ); ?>">home</a> to navigate the website.</h2>
<?php endif; ?>

