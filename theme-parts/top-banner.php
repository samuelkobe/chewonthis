	<?php if ( get_field( 'display_top_banner_toggle', 'option' ) == 1 ) : ?>
		<?php // Top Banner > Chew Settings ?>
		<section class="h-20 xl:h-16 py-1 xl:p-0 bg-caramel text-white text-xs xl:text-sm 2xl:text-base font-semibold !font-main relative z-20">

			<div class="container mx-auto px-4 xl:px-8 h-full flex items-center justify-start">

				<div class="w-full h-full flex flex-wrap flex-row items-center justify-evenly md:justify-between relative">
					
					<?php if ( have_rows( 'banner_links', 'option' ) ) : ?>
						<?php while ( have_rows( 'banner_links', 'option' ) ) : the_row(); ?>
							
								<?php if ( get_sub_field( 'linked_toggle' ) == 1 ) : ?>
									<?php $link = get_sub_field( 'link' ); ?>
								<?php endif; ?>


									<?php if ( get_sub_field( 'icon_toggle' ) == 1 ): ?>
									<?php $item_icon = get_sub_field( 'item_icon' ); ?>
										<div class="flex flex-row items-center justify-center">
											<img class="h-6 pb-1 pr-2" src="<?php echo esc_url( $item_icon['url'] ); ?>" alt="<?php echo esc_attr( $item_icon['alt'] ); ?>" />
											<?php if ( get_sub_field( 'linked_toggle' ) == 1 ) : ?>
												<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
											<?php else : ?>
												<p><?php echo get_sub_field( 'item_text' ); ?></p>
											<?php endif; ?>
										</div>
										<?php else: ?>
											<?php if ( get_sub_field( 'linked_toggle' ) == 1 ) : ?>
												<a href="<?php echo esc_url( $link['url'] ); ?>" target="<?php echo esc_attr( $link['target'] ); ?>"><?php echo esc_html( $link['title'] ); ?></a>
											<?php else : ?>
												<p><?php echo get_sub_field( 'item_text' ); ?></p>
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