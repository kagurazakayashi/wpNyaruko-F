<?php get_header(); ?>
	<!-- Column 1 / Content -->
	<?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
	<h2 class="grid_12 caption clearfix"><?php the_title(); ?></h2>
	<div class="grid_8">
		<?php the_content(); ?>
		<?php comments_template(); ?>
	</div>
	<?php else : ?>
	<div class="grid_8">
		û���ҵ�����Ҫ��ҳ�棡
	</div>
	<?php endif; ?>
	<?php get_sidebar(); ?>
<?php get_footer(); ?>