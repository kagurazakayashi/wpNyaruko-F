<?php get_header(); ?>
<div class="racing_listbox">
	<div class="racing_list">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="racing_list_left">
			<div class="racing_list_left_class"><?php 
			$category = get_the_category();
			echo '<a href="'.get_category_link(end($category)->term_id ).'">'.end($category)->cat_name.'</a>';
			?></div>
			<img class="racing_list_left_img" src="<?php 
			$itemimage = catch_that_image();
			if ($itemimage == "") {
				bloginfo("template_url");
				echo "images/default.jpg";
			} else {
				echo $itemimage;
			}
			?>" alt="">
			</div>
			<div class="racing_list_right" onclick="javascript:window.location.href='<?php the_permalink(); ?>'">
				<div class="racing_list_right_title"><?php the_title(); ?></div>
				<div class="racing_list_right_content"><?php the_excerpt(); ?></div>
				<div class="racing_list_right_bottom">
					<div class="racing_list_right_bottom_time"><?php the_time('Y-m-d'); ?></div>
					<div class="racing_list_right_bottom_img material-icons">person</div>
				</div>
			</div>
		<?php endwhile; ?>
	</div>
	<?php previous_posts_link('&lt;&lt; 查看新文章', 0); ?> <?php next_posts_link(' 查看旧文章 &gt;&gt;', 0); ?>
	<?php else : ?>
		<h3 class="title"><a href="#" rel="bookmark">未找到</a></h3>
		<p>没有找到任何文章！</p>
	<?php endif; ?>
<div class="racing_sidebarbox"><?php get_sidebar("indexsidebar"); ?></div>
</div>
<?php get_footer(); ?>