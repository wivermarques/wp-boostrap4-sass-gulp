<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 *
 * Template Name: Home
 *
 * @package Wordpress_Boostrap4_Sass_Gulp
 */

get_header(); ?>

<!-- !Page Default -->
<section class="page-home">
	
	<section class="section-home__banner">
		<div class="container">
			<button class="banner__prev"></button>
			<div class="banner__carousel" id="carousel-home">
				<div class="carousel__item">
					<div class="row align-items-center">
						<div class="col-12 col-sm-6 col-md-6 col-lg-5 ml-auto">
							<h2>Empresa certificada</h2>
							<h3>Marca da gestão florestal responsável.</h3>
						</div>
						<div class="col-12 col-sm-6 hidden-sm-down">
							<img class="img-fluid" src="<?php echo get_bloginfo('template_directory');?>/assets/img/img-banner-01.png" alt="img-banner-01" width="379" height="230" />
						</div>
					</div>
				</div>
				<div class="carousel__item">
					<div class="row align-items-center">
						<div class="col-12 col-sm-6 col-md-6 col-lg-5 ml-auto">
							<h2>Empresa certificada</h2>
							<h3>Marca da gestão florestal responsável.</h3>
						</div>
						<div class="col-12 col-sm-6 hidden-sm-down">
							<img class="img-fluid" src="<?php echo get_bloginfo('template_directory');?>/assets/img/img-banner-01.png" alt="img-banner-01" width="379" height="230" />
						</div>
					</div>
				</div>
			</div>
			<button class="banner__next"></button>
		</div>
	</section>
	
	<?php
	$args = array(
	    'posts_per_page' => 4,
	    'post_type' => 'produto'
	);
	$wp_query = new WP_Query( $args );
	if ( $wp_query->have_posts() ) : ?>	
	<section class="section-produtos">
		<header class="header-section">
			<div class="container">
				<h3><i class="header__icon"></i>Guia rápido de produtos</h3>
			</div>
		</header>
		<div class="container">
			<div class="row produtos-list">
				
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();  ?>
				<div class="col-6 col-sm-6 col-md-3 col-lg-3 list__item">
					
					<?php 
					$image = get_field('imagem_destaque');
					
					if( !empty($image) ): 
					
						// vars
						$url = $image['url'];
						$alt = $image['alt'];
					
						// thumbnail
						$size = 'thumb-produto';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ]; ?>
					<figure>
						<a href="<?php the_permalink() ?>">
							<img class="img-fluid" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
						</a>
					</figure>
					<?php endif; ?>
					
					<p><?php the_title() ?></p>
				</div>
				<?php endwhile; ?>
				
			</div>
		</div>
	</section>
	<?php endif; ?>
	
	<?php get_template_part( 'template-parts/info', 'info' ); ?>
</section><!-- !@end Page Default -->

<?php
get_footer();
