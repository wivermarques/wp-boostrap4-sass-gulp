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
 * Template Name: Apresentação
 *
 * @package Wordpress_Boostrap4_Sass_Gulp
 */

get_header(); ?>

<!-- !Page Default -->
<section class="section-page-default" id="page-leal">
	<div class="container">
		<div class="row">
			<div class="col-12 col-sm-12 col-md-6">
				<article class="page-default__content">
					<figure class="mb-5"><img class="img-fluid" src="<?php echo get_bloginfo('template_directory');?>/assets/img/apresentacao-01.jpg" alt="apresentacao-01" width="482" height="172" /></figure>
					<h2 class="page-default__title">Sobre a Leal</h2>
					<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
					<p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>
				</article>
			</div>
			<div class="col-12 col-sm-12 col-md-6">
				<article class="page-default__content">
					<figure class="mb-5"><img class="img-fluid" src="<?php echo get_bloginfo('template_directory');?>/assets/img/apresentacao-02.jpg" alt="apresentacao-02" width="482" height="172" /></figure>
					<h3 class="page-default__title">Missão</h3>
					<p>Garantir a excelência na entrega de produtos com foco na competitividade, rentabilidade e responsabilidade social e ambiental.</p>
					<h4 class="page-default__title">Visão</h4>
					<p>Ser referência no setor de embalagens para alimentação.</p>
					<h4 class="page-default__title">Valores</h4>
					<p>Harmonia com o meio ambiente<br>Responsabilidade social<br>Segurança e higiene no ambiente de trabalho<br>Pessoas comprometidas e realizadas<br>Qualidade em tudo que faz<br>Inovação<br>Integridade<br>Confiança<br>Respeito</p>
				</article>
			</div>
		</div>
	</div>
	<section class="page-leal__lei">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-5 col-md-4 mb-4 mb-sm-0">
					<img class="img-fluid" src="<?php echo get_bloginfo('template_directory');?>/assets/img/selo-apresentacao.png" alt="selo-apresentacao" width="328" height="133" />
				</div>
				<div class="col-12 col-sm-7 col-md-8 page-default__content">
					<h4 class="page-default__title">A Leal possui selo FSC!</h4>
					<p>FSC certifica áreas e produtos florestais. O primeiro tipo atesta que a floresta é manejada de acordo com princípios e critérios estabelecidos pelo FSC. Já a certificação de produtos se dá com base na rastreabilidade da cadeia de custódia, ou seja, a certificadora verifica se a matéria-prima utilizada vem de uma área certificada. Nesse caso, todos os agentes pelos quais passa o material até se transformar no produto final também devem receber um certificado. </p>
				</div>
			</div>
		</div>
	</section>
	<?php get_template_part( 'template-parts/share', 'share' ); ?>
</section><!-- !@end Page Default -->

<?php
get_footer();
