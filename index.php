<!-- 1顶端大图 -->
<?php get_header(); ?>
<!-- 2焦点新闻 -->
<?php typetitle("今日焦点"); 
$categoryid = 4;
$nposts = get_posts(array(
	'category' => $categoryid,
	'numberposts' => 1,
));
if(empty($nposts)){
	echo "<p>暂无内容</p>";
} else {
	foreach($nposts as $npost){
		?>
		大图
		<a title="<?php echo $npost->post_title; ?>" href="<?php echo get_permalink($npost->ID); ?>" ><?php echo $npost->post_title; ?></a>
		<img class="temp" src="<?php 
			$itemimage = catch_image($npost);
			if ($itemimage == "") {
				bloginfo("template_url");
				echo "images/default.jpg";
			} else {
				echo $itemimage;
			}
			?>" alt="<?php echo $npost->post_title; ?>" />
		<?php
	}
	echo '<a href="'.get_category_link($categoryid).'" >更多 >>></a>';
}
?>
<!-- 3三个次焦点新闻 -->
<?php typetitle("关注内容"); ?>
<div class="racing_listbox">
	<div class="racing_list">
		<?php $categoryid = 5; 
		$nposts = get_posts(array(
			'category' => $categoryid,
			'numberposts' => 3,
		));
		if(empty($nposts)){
			echo "<p>暂无内容</p>";
		} else {
			foreach($nposts as $npost){
		?>
		<div class="racing_list_left">
			<div class="racing_list_left_class">
			12345
			</div>
			<img class="racing_list_left_img" src="<?php 
			$itemimage = catch_image($npost);
			if ($itemimage == "") {
				bloginfo("template_url");
				echo "images/default.jpg";
			} else {
				echo $itemimage;
			}
			?>" alt="<?php echo $npost->post_title; ?>" />
		</div>
		<div class="racing_list_right" onclick="javascript:window.location.href='<?php echo get_permalink($npost->ID); ?>'">
			<div class="racing_list_right_title"><?php echo $npost->post_title; ?></div>
			<div class="racing_list_right_content"><?php echo $npost->post_content; ?></div>
			<div class="racing_list_right_bottom">
				<div class="racing_list_right_bottom_time"><?php echo mysql2date('Y-m-d　h:i',$npost->post_date); ?></div>
				<div class="racing_list_right_bottom_img material-icons">person</div>
			</div>
		</div>
		<?php
			}
			echo '</div></div><a href="'.get_category_link($categoryid).'" >更多 >>></a>';
		}
		?>
<!-- 4横排视频 -->
<?php typetitle("精彩视频"); ?>
《 视频块1，视频块2，视频块3 ... 》
<!-- 5流新闻列表 -->
<?php typetitle("新闻中心"); ?>
...
<!-- 6横排图片 -->
<?php typetitle("炫酷图片"); ?>
《 图片块1，图片块2，图片块3 ... 》
<!-- 7页脚 -->
<?php get_footer(); ?>