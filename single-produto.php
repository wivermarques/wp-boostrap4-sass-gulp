<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Wordpress_Boostrap4_Sass_Gulp
 */

get_header(); ?>

<!-- !Page Default -->
<section class="section-page-default" id="single-produto">
	<div class="container">
		<article class="row page-default__content">
			
			<?php 
			$image = get_field('imagem_destaque');
			
			if( !empty($image) ): 
			
				// vars
				$url = $image['url'];
				$alt = $image['alt'];
			
				// thumbnail
				$size = 'single-produto-destaque';
				$thumb = $image['sizes'][ $size ];
				$width = $image['sizes'][ $size . '-width' ];
				$height = $image['sizes'][ $size . '-height' ]; ?>
			<div class="col-12 col-sm-12 col-md-6">
				<figure>
					<img class="img-fluid" src="<?php echo $thumb; ?>" alt="<?php echo $alt; ?>" width="<?php echo $width; ?>" height="<?php echo $height; ?>" />
				</figure>
			</div>
			<?php endif; ?>
			
			<div class="col-12 col-sm-12 col-md-6">
				<h2 class="page-default__title"><?php the_title() ?></h2>
				<p><?php the_field('texto') ?></p>
			</div>
			
		</article>
	</div>	
	
	<?php
	$images = get_field('galeria_de_fotos');
	
	if( $images ): ?>
	<section class="single-produto__galeria">
		<header class="header-section">
			<div class="container">
				<h3><i class="header__icon"></i>Galeria de fotos</h3>
			</div>
		</header>
		
		<div class="container">
			<div class="row produtos-list">
				
				<?php foreach( $images as $image ): ?>
				<div class="col-6 col-sm-6 col-md-3 col-lg-3 list__item">
					<figure>
						<a data-fancybox="gallery" href="<?php echo $image['url']; ?>">
							<img class="img-fluid" src="<?php echo $image['sizes']['thumb-produto']; ?>" alt="<?php echo $image['alt']; ?>" />
						</a>
					</figure>
					<?php endforeach; ?>
				</div>
				<?php //endwhile; ?>
				
			</div>
		</div>
	</section>
	<?php endif; ?>
	
	<section class="single-produto__form">
		<header class="header-section">
			<div class="container">
				<h3><i class="header__icon"></i>Mais informações? Entre em contato!</h3>
			</div>
		</header>
		<div class="container">
			<?php echo do_shortcode( '[contact-form-7 id="28" title="Formulário de Produto"]' ); ?>
		</div>
	</section>
	
	<?php get_template_part( 'template-parts/info', 'info' ); ?>
	<?php get_template_part( 'template-parts/share', 'share' ); ?>
</section><!-- !@end Page Default -->

<?php
get_footer();
