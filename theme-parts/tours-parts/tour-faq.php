<style type="text/css">
	<?php echo '#faq_' . $tour_id; ?> {
		/* Add styles that use ACF values here */
	}
</style>


<?php
	// Get the colour scheme
	$heading = get_field( 'heading_faqs' );
	$content = get_field( 'content_faqs' );
?>

<section id="<?php echo esc_attr( $tour_id); ?>" class="scroll-m-20 bg-bread">

	<div class="container px-6 py-12 xl:py-28 xl:px-48 2xl:px-[20rem] mx-auto">

		<h2 class="heading-one text-center w-full mb-4 xl:mb-6 text-dark"><?php echo $heading; ?></h2>

		<?php if ($content != ''): ?>
			<p class="w-full text-center content large px-0 lg:px-1/8 xl:px-[15%] text-dark wysiwyg"><?php echo $content; ?></p>
		<?php endif; ?>

    <ul class="py-12">
			<?php if ( have_rows( 'experience_faqs' ) ) : ?>
				<?php $i = 0; ?>
				<?php while ( have_rows( 'experience_faqs' ) ) : the_row(); ?>
					<li class="faq mb-8">
						<h2 class="question uppercase font-sans font-semibold tracking-widest text-base xl:text-2xl w-full mt-3 xl:mt-6 text-paprika flex flex-row gap-x-2" @click="faqs_open_<?php echo $i; ?> = !faqs_open_<?php echo $i; ?>">
							<?php the_sub_field( 'question' ); ?>
								<div class="fill-paprika flex w-7 xl:w-8 h-7 xl:h-8">
									<svg x-show="!faqs_open_<?php echo $i; ?>" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12.002 2c5.518 0 9.998 4.48 9.998 9.998 0 5.517-4.48 9.997-9.998 9.997-5.517 0-9.997-4.48-9.997-9.997 0-5.518 4.48-9.998 9.997-9.998zm0 1.5c-4.69 0-8.497 3.808-8.497 8.498s3.807 8.497 8.497 8.497 8.498-3.807 8.498-8.497-3.808-8.498-8.498-8.498zm-.747 7.75h-3.5c-.414 0-.75.336-.75.75s.336.75.75.75h3.5v3.5c0 .414.336.75.75.75s.75-.336.75-.75v-3.5h3.5c.414 0 .75-.336.75-.75s-.336-.75-.75-.75h-3.5v-3.5c0-.414-.336-.75-.75-.75s-.75.336-.75.75z" fill-rule="nonzero"/></svg>
									<svg x-show="faqs_open_<?php echo $i; ?>" clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="m12.002 2.005c5.518 0 9.998 4.48 9.998 9.997 0 5.518-4.48 9.998-9.998 9.998-5.517 0-9.997-4.48-9.997-9.998 0-5.517 4.48-9.997 9.997-9.997zm0 1.5c-4.69 0-8.497 3.807-8.497 8.497s3.807 8.498 8.497 8.498 8.498-3.808 8.498-8.498-3.808-8.497-8.498-8.497zm4.253 7.75h-8.5c-.414 0-.75.336-.75.75s.336.75.75.75h8.5c.414 0 .75-.336.75-.75s-.336-.75-.75-.75z" fill-rule="nonzero"/></svg>
								</div>
						</h2>
						<div class="answer wysiwyg font-main font-normal text-base leading-[2rem] xl:text-lg xl:leading-[2.5rem] mt-4 xl:mt-6 wysiwyg text-dark" x-show="faqs_open_<?php echo $i; ?>">
							<?php echo get_sub_field( 'answer' ); ?>
						</div>
					</li>
					<?php $i++; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</ul>

	</div>

</section>