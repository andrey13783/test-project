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
				
				<div class="objects_page row">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					
					$objects = get_posts(array(
						'posts_per_page' => '-1',
						'post_type' => 'objects',
						'posts_per_page' => 10,
						'post_parent'   => $post->ID,
					));
					foreach ($objects as $object){
				?>
					<div class="item col-lg-6 col-md-6 col-xs-12">
						<a href="<?php echo get_permalink($object) ?>">
							<img src="<?php echo get_the_post_thumbnail_url($object) ?>" alt="">
							<h3><?php echo $object->post_title ?></h3>
						</a>
					</div>
				<?php
				}
				?>
				</div>

			</main>

			<?php
			// Do the right sidebar check and close div#primary.
			get_template_part( 'global-templates/right-sidebar-check' );
			?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #archive-wrapper -->

<?php
get_footer();