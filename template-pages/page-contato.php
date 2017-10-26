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
 * Template Name: Contato
 *
 * @package Wordpress_Boostrap4_Sass_Gulp
 */

get_header(); ?>

<!-- !Page Default -->
<section class="section-page-default" id="page-contato">
	<div class="container">
		
		<div class="page-contato__horario">
			<h2><i class="fa fa-clock-o" aria-hidden="true"></i>HORÁRIO DE FUNCIONAMENTO: Segunda à quinta-feira: 8h as 18h // Sexta-feira: 8 às 17h</h2>
		</div>
		
		<?php echo do_shortcode( '[contact-form-7 id="11" title="Formulário de Contato"]' ); ?>
		
	</div>
	<section class="page-contato__map">
		<header class="map__header">
			<div class="container">
				<h3>R. Mossoró, 6 | Piraquara/PR.</h3>
			</div>
		</header>
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3602.4574144774924!2d-49.10855168440501!3d-25.456397440171365!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94dcf23cc08eeba3%3A0x4cf956d95038523d!2sR.+Mossor%C3%B3%2C+6+-+Jardim+Primavera%2C+Piraquara+-+PR%2C+83302-120!5e0!3m2!1spt-BR!2sbr!4v1508975265331" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
	</section>
	<?php get_template_part( 'template-parts/share', 'share' ); ?>
</section><!-- !@end Page Default -->

<?php
get_footer();
