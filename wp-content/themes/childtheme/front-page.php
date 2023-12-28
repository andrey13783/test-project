<?php
$post = get_post(2);

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

				<h2>Города</h2>
				
				<div class="home_page row">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					
					$towns = get_posts(array(
						'posts_per_page' => '-1',
						'post_type' => 'towns',
						'posts_per_page' => 9,
					));
					foreach ($towns as $town){
				?>
					<div class="item col-lg-6 col-md-6 col-xs-12">
						<a href="<?php echo get_permalink($town) ?>">
							<img src="<?php echo get_the_post_thumbnail_url($town) ?>" alt="">
							<h3><?php echo $town->post_title ?></h3>
						</a>
					</div>
				<?php
				}
				?>
				</div>

				<h2>Объекты недвижимости</h2>
				
				<div class="home_page row">
				<?php
					$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
					
					$objects = get_posts(array(
						'posts_per_page' => '-1',
						'post_type' => 'objects',
						'posts_per_page' => 10,
					));
					foreach ($objects as $object){
				?>
					<div class="item col-lg-6 col-md-6 col-xs-12">
						<a href="<?php echo get_permalink($object) ?>">
							<img src="<?php echo get_the_post_thumbnail_url($object) ?>" alt="">
							<h3><?php echo $object->post_title ?></h3>
						</a>
						
						<table class="object_info table">
							<tr>
								<td>Площадь</td>
								<td><?php echo get_field('square', $object) ?></td>
							</tr>
							<tr>
								<td>Жилая площадь</td>
								<td><?php echo get_field('live_square', $object) ?></td>
							</tr>
							<tr>
								<td>Этаж</td>
								<td><?php echo get_field('floor', $object) ?></td>
							</tr>
							<tr>
								<td>Адрес</td>
								<td><?php echo get_field('address', $object) ?></td>
							</tr>
							<tr>
								<td>Стоимость</td>
								<td><?php echo get_field('price', $object) ?></td>
							</tr>
						</table>
					</div>
					

				<?php
				}
				?>
				</div><br>
				
				<div>
					<a href="/objects/" class="btn btn-default">Все объекты</a>
				</div>
				<br><br>
				
				<h2>Добавить объект</h2>
				
				<form id="new_object">
					<div class="row">
						<label class="col-lg-6 col-md-6 col-xs-12">
							<p>Название объекта</p>
							<input type="text" name="object[title]" class="form-control">
						</label>
						<label class="col-lg-6 col-md-6 col-xs-12">
							<p>Прощадь объекта</p>
							<input type="text" name="object[square]" class="form-control">
						</label>
						<label class="col-lg-6 col-md-6 col-xs-12">
							<p>Жилая площадь</p>
							<input type="text" name="object[live_square]" class="form-control">
						</label>
						<label class="col-lg-6 col-md-6 col-xs-12">
							<p>Этаж</p>
							<input type="text" name="object[floor]" class="form-control">
						</label>
						<label class="col-lg-6 col-md-6 col-xs-12">
							<p>Адрес</p>
							<input type="text" name="object[address]" class="form-control">
						</label>
						<label class="col-lg-6 col-md-6 col-xs-12">
							<p>Стоимость</p>
							<input type="text" name="object[price]" class="form-control">
						</label>
						<div class="submit_btn btn btn-primary">Добавить объект</div>
					</div>
				</form>
				
				<br><br>
				
				<script>
					jQuery('#new_object .submit_btn').click(function(){
						form_data = jQuery('#new_object').serialize();
						jQuery.ajax({
							type: "POST",
							url: '<?=get_template_directory_uri()?>/ajax/new_object.php',
							data: form_data,
							success: function(data){
								jQuery("#new_object input").val('')
								alert(data);
							},
							error:  function(xhr, str){
								console.log('Возникла ошибка: ' + xhr.responseCode);
							}
						});
					});
				</script>

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