<!-- 1顶端大图 -->
<?php get_header(); ?>
<!-- 2焦点新闻 -->
<?php typetitle("今日焦点"); ?>
大图
<!-- 3三个次焦点新闻 -->
<?php typetitle("关注内容"); ?>
资讯1<br>
资讯2<br>
资讯3<br>
<!-- 4横排视频 -->
<?php typetitle("精彩视频"); ?>
《 视频块1，视频块2，视频块3 ... 》
<!-- 5流新闻列表 -->
<?php typetitle("新闻中心"); ?>
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
<!-- 6横排图片 -->
<?php typetitle("炫酷图片"); ?>
《 图片块1，图片块2，图片块3 ... 》
<!-- 7页脚 -->
<?php get_footer(); ?>