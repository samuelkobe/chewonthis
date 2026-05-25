<section class="w-full bg-bread py-8 lg:py-16 font-semibold font-main">
	<?php if ( have_rows( 'footer_settings', 'option' ) ) : ?>
		<?php while ( have_rows( 'footer_settings', 'option' ) ) : the_row(); ?>

			<div class="container mx-auto p-6">
				<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-x-4 gap-y-8 md:gap-16 xl:gap-x-8">
					<div class="col-span-1 flex flex-col gap-y-6">
						<div>
							<?php $footer_logo = get_sub_field( 'footer_logo' ); ?>
							<?php if ( $footer_logo ) : ?>
								<img class="max-w-40" src="<?php echo esc_url( $footer_logo['url'] ); ?>" alt="<?php echo esc_attr( $footer_logo['alt'] ); ?>" />
							<?php endif; ?>
						</div>
						<div>
							<p class="lg:pr-4 xl:pr-16"><?php the_sub_field( 'company_information' ); ?></p>
						</div>
						<div class="flex flex-col gap-y-3">
							<div class="flex flex-row items-center gap-x-2">
								<div class="w-7 h-7 hidden sm:block">
									<?php require get_template_directory() . "/theme-parts/icons/phone-icon.php"; // Include phone icon ?>
								</div>
								<a class="hover:text-paprika transition-colors duration-300 w-fit text-sm" href="tel:<?php echo get_field( 'telephone_number', 'option' ); ?>"><?php echo get_field( 'telephone_number_text', 'option' ); ?></a>
							</div>
							<div class="flex flex-row items-center gap-x-2">
								<div class="w-7 h-7 hidden sm:block">
									<?php require get_template_directory() . "/theme-parts/icons/envelope-icon.php"; // Include phone icon ?>
								</div>
								<a class="hover:text-paprika transition-colors duration-300 w-fit text-sm" href="mailto:<?php echo get_field( 'email', 'option' ); ?>" target="_blank"><?php the_field( 'email', 'option' ); ?></a>
							</div>
						</div>
					</div>

					<div class="col-span-1 flex flex-col gap-y-4 md:gap-y-6">
						<div>
							<h3 class="text-caramel font-sans font-bold uppercase text-2xl md:text-4xl"><?php the_sub_field( 'col_2_title' ); ?></h3>
						</div>
						<div class="uppercase">
							<?php webokstarter_nav_footer(); ?>
						</div>
					</div>

					<div class="col-span-1 flex flex-col gap-y-4 md:gap-y-6">
						<div>
							<h3 class="text-caramel font-sans font-bold uppercase text-2xl md:text-4xl"><?php the_sub_field( 'col_3_title' ); ?></h3>
						</div>
						<div>
							<p class="lg:pr-4 xl:pr-16"><?php the_sub_field( 'company_information_2' ); ?></p>
						</div>
						<div>
							<h4 class="text-caramel font-sans font-bold uppercase text-lg md:text-2xl"><?php the_sub_field( 'col_3_subtitle' ); ?></h4>
						</div>
						<div>
							<?php require get_template_directory() . "/theme-parts/social-horizontal.php"; ?>
						</div>
					</div>

					<div class="col-span-1 flex flex-col gap-y-4 md:gap-y-6">
						<div>
							<h3 class="text-caramel font-sans font-bold uppercase text-2xl md:text-4xl"><?php the_sub_field( 'col_4_title' ); ?></h3>
						</div>
						<div>
							<p class="lg:pr-4 xl:pr-16 text-xs xl:text-sm mb-4 xl:mb-8"><?php the_sub_field( 'newsletter_cta' ); ?></p>
							<?php the_field( 'newsletter_form', 'option' ); ?>
						</div>
					</div>
				</div>
				
				<div class="w-full text-xs lg:text-sm mt-12 md:mt-16 xl:mt-32">Copyright &copy; <?php echo date('Y'); ?>. <?php the_sub_field( 'copyright_text' ); ?></div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</section>

	<?php wp_footer(); ?>
<!-- Zaui Embedded Booking API -->
<!--  <script src="https://chewonthistastytours.zaui.net/themes/default/js/zaui-embed-api-v1.js"></script> -->

	<!-- FAREHARBOUR LIGHTFRAME SCRIPT -->
	<script type="text/javascript" src="https://fareharbor.com/embeds/api/v1/?autolightframe=yes"></script>
	</body>
</html>