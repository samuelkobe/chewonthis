<?php if ( have_rows( 'social_media_accounts', 'option' ) ) : ?>
	<ul class="flex flex-col space-y-4" role="navigation" aria-label="Social Media Navigation">
	<?php while ( have_rows( 'social_media_accounts', 'option' ) ) : the_row(); ?>
		<?php if ( get_sub_field( 'activate' ) == 1 ) : ?>
			<?php $icon = get_sub_field( 'icon' ); ?>
			<li class="w-6 list-none">
				<a class="fill-caramel" href="<?php echo get_sub_field( 'url' ); ?>" name="Icon link to <?php echo get_sub_field( 'name' ); ?>" target="_blank">
					<?php if ( is_string( $icon ) ) :
						echo $icon;
					endif; ?>
				</a>
			</li>
		<?php endif; ?>
	<?php endwhile; ?>
	</ul>
<?php endif; ?>