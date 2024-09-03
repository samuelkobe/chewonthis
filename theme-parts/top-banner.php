	<?php if ( get_field( 'display_top_banner_toggle', 'option' ) == 1 ) : ?>
		<?php // Top Banner > Chew Settings ?>
		<section class="h-20 xl:h-28 py-3 xl:p-0 bg-caramel text-white text-xs md:text-sm xl:text-base 2xl:text-[18px] font-semibold !font-main">

			<div class="container mx-auto px-4 xl:px-8 h-full flex items-center justify-start">

				<div class="w-full h-full flex flex-wrap flex-row items-center justify-evenly md:justify-between relative">
					
					<?php if ( have_rows( 'banner_links', 'option' ) ) : ?>
						<?php while ( have_rows( 'banner_links', 'option' ) ) : the_row(); ?>
							<?php $link = get_sub_field( 'link' ); ?>
							<?php if ( $link ) : ?>

								<?php if ( get_sub_field( 'icon_toggle' ) == 1 ) : ?>
									<?php $link_icon = get_sub_field( 'link_icon' ); ?>
									<?php if ( $link_icon ) : ?>
										<div class="flex flex-row items-center justify-center">
											<img class="h-6 pb-1 pr-2" src="<?php echo esc_url( $link_icon['url'] ); ?>" alt="<?php echo esc_attr( $link_icon['alt'] ); ?>" />
											<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
										</div>
									<?php endif; ?>
								<?php else: ?>
									<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
								<?php endif; ?>

							<?php endif; ?>
						<?php endwhile; ?>
					<?php else : ?>
						<?php // No rows found ?>
					<?php endif; ?>

					<?php if ( get_field( 'award_icon_toggle', 'option' ) == 1 ) : ?>
						<?php $award_icon = get_field( 'award_icon', 'option' ); ?>
						<?php if ( $award_icon ) : ?>
							<div class="hidden xl:flex w-24 h-28 max-h-full relative">
								<img class="max-h-full w-full object-contain absolute right-0 top-0 py-3" src="<?php echo esc_url( $award_icon['url'] ); ?>" alt="<?php echo esc_attr( $award_icon['alt'] ); ?>" />
							</div>
						<?php endif; ?>
					<?php endif; ?>

				</div>

			</div>

		</section>
	<?php endif; ?>