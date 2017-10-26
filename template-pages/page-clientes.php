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
 * Template Name: Clientes
 *
 * @package Wordpress_Boostrap4_Sass_Gulp
 */

get_header(); ?>

<!-- !Page Default -->
<section class="section-page-default" id="page-clientes">
	
	<?php
	$args = array(
	    'posts_per_page' => 16,
	    'post_type' => 'cliente',
	    'orderby'=> 'rand'
	);
	$wp_query = new WP_Query( $args );
	if ( $wp_query->have_posts() ) : ?>	
	<section class="page-clientes__list">
		<div class="container">
			<div class="row list__clientes">
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post();  ?>
				<div class="col-6 col-sm-6 col-md-3 col-lg-3 clientes__item">
					
					<?php 
					$image = get_field('logo');
					
					if( !empty($image) ): 
					
						// vars
						$url = $image['url'];
						$alt = $image['alt'];
					
						// thumbnail
						$size = 'logo-cliente';
						$thumb = $image['sizes'][ $size ];
						$width = $image['sizes'][ $size . '-width' ];
						$height = $image['sizes'][ $size . '-height' ]; ?>
					<figure>
						
						<?php if(get_field('url')): ?>
						<a href="<?php the_field('url') ?>" target="_blank">
						<?php endif; ?>
							
							<img src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
						
						<?php if(get_field('url')): ?>
						</a>
						<?php endif; ?>
							
					</figure>
					<?php endif; ?>	
					
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<?php endif; ?>
	
	<?php get_template_part( 'template-parts/share', 'share' ); ?>
</section><!-- !@end Page Default -->

<?php
get_footer();
