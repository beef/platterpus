<?php get_header(); ?>
	
	<!-- Section -->
	<section>
	
		<h1>Tag Archive: <?php echo single_tag_title('', false); ?></h1>
	
		<?php get_template_part('loop'); ?>
		
		<!-- Pagination -->
		<div id="pagination">
			<?php html5wp_pagination(); ?>
		</div>
		<!-- /Pagination -->
	
	</section>
	<!-- /Section -->
	
<?php get_sidebar(); ?>

<?php get_footer(); ?>