<?php
get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>
<div class="wrapper" id="archive-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<?php
			// Do the left sidebar check and open div#primary.
			get_template_part( 'global-templates/left-sidebar-check' );
			?>

			<main class="site-main" id="main">

				<h1><?php echo $post->post_title ?></h1>
				<img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
				
				<br><br>
				
				<table class="object_info table">
					<tr>
						<td>Площадь</td>
						<td><?php echo get_field('square') ?></td>
					</tr>
					<tr>
						<td>Жилая площадь</td>
						<td><?php echo get_field('live_square') ?></td>
					</tr>
					<tr>
						<td>Этаж</td>
						<td><?php echo get_field('floor') ?></td>
					</tr>
					<tr>
						<td>Адрес</td>
						<td><?php echo get_field('address') ?></td>
					</tr>
					<tr>
						<td>Стоимость</td>
						<td><?php echo get_field('price') ?></td>
					</tr>
				</table><br>
				
				<?php
				if (!empty(get_field('images'))){
				?>
				<h2>Дополнительные фото</h2>
				
				<div class="object_images row">
				<?php
					$images = get_field('images');
					
					foreach ($images as $image){
				?>
					<div class=" col-lg-4 col-md-4 col-xs-6">
						<a href="<?php echo $image['url'] ?>">
							<img src="<?php echo $image['url'] ?>" alt="">
						</a>
					</div>
				<?php } ?>
				</div>
				<?php } ?>

			</main>

			<?php
			// Display the pagination component.
			understrap_pagination();

			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();