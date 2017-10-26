<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wordpress_Boostrap4_Sass_Gulp
 */

?>

</main>

<!-- !Footer -->
<footer class="layout-footer" id="layout-footer">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-12 col-md-4 mb-4 mb-sm-0">
				<img class="img-fluid" src="<?php echo get_bloginfo('template_directory');?>/assets/img/selo-rodape.png" alt="selo-rodape" width="153" height="62" />
			</div>
			<div class="col-12 col-md-4 mb-4 mb-sm-0">
				<p>(41) 3590-3100<br><a href="mailto:vendas@guardanaposleal.com.br" title="vendas@guardanaposleal.com.br" target="_blank">vendas@guardanaposleal.com.br</a></p>
			</div>
			<div class="col-12 col-md-4 mb-0">
				<a class="footer__logo" href="https://www.formatocomunicacao.com.br/" title="Formato Comunicação"><img src="<?php echo get_bloginfo('template_directory');?>/assets/img/logo-formatos.png" alt="logo-formatos" width="18" height="20" /></a>
			</div>
		</div>
	</div>
</footer><!-- !@end Footer -->

<?php wp_footer(); ?>
</body>
</html>
