<?php if (have_posts()): while (have_posts()) : the_post(); ?>
	
	<!-- Article -->
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
		<!-- Post Thumbnail -->
		<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<?php the_post_thumbnail(array(120,120)); // Declare pixel size you need inside the array ?>
			</a>
		<?php endif; ?>
		<!-- /Post Thumbnail -->
		
		<!-- Post Title -->
		<h2>
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<!-- /Post Title -->
		
		<!-- Post Details -->
		<span class="date"><?php the_time('F j, Y'); ?> <?php the_time('g:i a'); ?></span>
		<span class="author">Published by <?php the_author_posts_link(); ?></span>
		<span class="comments"><?php comments_popup_link('Leave your thoughts','1 Comment','% Comments'); ?></span>
		<!-- /Post Details -->
		
		<?php the_excerpt(); ?>
		
		<?php edit_post_link(); ?>
		
	</article>
	<!-- /Article -->
	
<?php endwhile; ?>

<?php else: ?>

	<!-- Article -->
	<article>
		<h2>Sorry, nothing to display.</h2>
	</article>
	<!-- /Article -->

<?php endif; ?>