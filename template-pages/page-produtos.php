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
 * Template Name: Produtos
 *
 * @package Wordpress_Boostrap4_Sass_Gulp
 */

get_header(); ?>

<!-- !Page Default -->
<section class="section-page-default" id="page-produtos">
	
	<?php
	$args = array(
	    'posts_per_page' => 16,
	    'post_type' => 'produto'
	);
	$wp_query = new WP_Query( $args );
	if ( $wp_query->have_posts() ) : ?>	
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
	<?php endif; ?>
	
	<?php get_template_part( 'template-parts/info', 'info' ); ?>
	<?php get_template_part( 'template-parts/share', 'share' ); ?>
</section><!-- !@end Page Default -->

<?php
get_footer();
