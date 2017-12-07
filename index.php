<!-- 1顶端大图 -->
<?php get_header(); ?>
<!-- 2焦点新闻 -->
<?php $categoryid = 4; $numberposts = 1;
typetitle(get_category($categoryid)->name);
$nposts = get_posts(array(
	'category' => $categoryid,
	'numberposts' => $numberposts,
));
if(empty($nposts)){
	echo "<p>暂无内容</p>";
} else {
	foreach($nposts as $npost){
		?>
		<div class="racing_bigpicnews" style="background-image: url(<?php 
			$itemimage = catch_image($npost);
			if ($itemimage == "") {
				bloginfo("template_url");
				echo "images/default.jpg";
			} else {
				echo $itemimage;
			}
			?>)" onclick="javascript:window.location.href='<?php echo get_permalink($npost->ID); ?>'">
			<div class="pictitle"><?php
				$ivideo = isvideo($npost->post_title);
				if ($ivideo[0] == true) {
					echo '<i class="material-icons">play_circle_outline</i> ';
				}
				echo $ivideo[1];
			?></div>
		</div>
		<?php
	}
	// echo '<a href="'.get_category_link($categoryid).'" >更多 >>></a>';
}
?>
<!-- 3三个次焦点新闻 -->
<?php $categoryid = 5; $numberposts = 3;
$typename = get_category($categoryid)->name;
typetitle($typename);
$nposts = get_posts(array(
	'category' => $categoryid,
	'numberposts' => $numberposts,
)); ?>
<div class="racing_listbox">
	<div class="racing_list">
		<?php  
		if(empty($nposts)){
			echo "<p>暂无内容</p>";
		} else {
			foreach($nposts as $npost){
				$isvideo = isvideo($npost->post_title);
		?>
		<div class="racing_list_left">
			<div class="racing_list_left_class"><?php
				$ntypename = wp_get_post_tags($npost->ID)[0]->name;
				if ($ntypename == "") {
					$ntypename = $typename;
				}
				echo $ntypename;
			?></div>
			<img class="racing_list_left_img" src="<?php 
			$itemimage = catch_image($npost);
			if ($itemimage == "") {
				bloginfo("template_url");
				echo "images/default.jpg";
			} else {
				echo $itemimage;
			}
			?>" alt="<?php echo $isvideo[1]; ?>" />
			<?php if ($isvideo[0] == true) { echo '<div class="racing_list_left_play material-icons">play_circle_outline</div>'; } ?>
		</div>
		<div class="racing_list_right" onclick="javascript:window.location.href='<?php echo get_permalink($npost->ID); ?>'">
			<div class="racing_list_right_title"><?php echo $isvideo[1]; ?></div>
			<div class="racing_list_right_content"><?php clearcontent($npost); ?></div>
			<div class="racing_list_right_bottom">
				<div class="racing_list_right_bottom_time"><?php cleardate($npost); ?></div>
			</div>
		</div>
		<?php
			}
			echo '</div></div><a href="'.get_category_link($categoryid).'" >更多 >>></a>';
		}
		?>
<!-- 4横排视频 -->
<?php $categoryid = 6; $numberposts = 3;
typetitle(get_category($categoryid)->name);
$nposts = get_posts(array(
	'category' => $categoryid,
	'numberposts' => $numberposts,
)); ?>
<div class="carousel-example">
	<div id="simple-content-carousel" class="carousel flexible slide" data-ride="carousel" data-interval="5000" data-wrap="true">
		<div class="items">
		<?php
			if(empty($nposts)){
				echo "<p>暂无内容</p>";
			} else {
				foreach($nposts as $npost){
					$isvideo = isvideo($npost->post_title);
			?>
			<div class="flex-item">
				<a href="<?php echo get_permalink($npost->ID); ?>" title="<?php echo $npost->post_title; ?>">
				<img class="img-responsive" src="<?php 
					$itemimage = catch_image($npost);
					if ($itemimage == "") {
						bloginfo("template_url");
						echo "images/default.jpg";
					} else {
						echo $itemimage;
					}
				?>" alt="<?php echo $npost->post_title; ?>" />
				</a>
				<?php if ($isvideo[0] == true) {
				echo '<div class="racing_list_left_play material-icons">play_circle_outline</div>'; }?>
			</div>
			<?php
				}
				echo '<a href="'.get_category_link($categoryid).'" >更多 >>></a>';
			}
			?>
		</div>
		<div class="carousel-inner" role="listbox">
		</div>
		<a class="left carousel-control" href="#simple-content-carousel" role="button" data-slide="prev" style="width:50px;top:50%;">
			<span class="material-icons" aria-hidden="true">keyboard_arrow_left</span>
			<!-- <span class="material-icons">keyboard_arrow_left</span> -->
		</a>
		<a class="right carousel-control" href="#simple-content-carousel" role="button" data-slide="next" style="width:50px;top:50%;">
			<span class="material-icons" aria-hidden="true">keyboard_arrow_right</span>
			<!-- <span class="material-icons">keyboard_arrow_right</span> -->
		</a>
	</div>
</div>
<!-- 5流新闻列表 -->
<?php typetitle("新闻中心"); ?>
...
<!-- 6横排图片 -->
<?php typetitle("炫酷图片"); ?>
《 图片块1，图片块2，图片块3 ... 》
<!-- 7页脚 -->
<?php get_footer(); ?>