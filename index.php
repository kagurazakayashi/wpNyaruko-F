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
			TEST!
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
<?php typetitle("精彩视频"); ?>
<div class="carousel-example">
		<div id="simple-content-carousel" class="carousel flexible slide" data-ride="carousel" data-interval="5000" data-wrap="true">
			<div class="items">
				
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
				</div>
				<?php
					}
					echo '<a href="'.get_category_link($categoryid).'" >更多 >>></a>';
				}
				?>
				
				<!-- <div class="flex-item">
					<img class="img-responsive" src="images/item1.jpg"/>
				</div>
			
				<div class="flex-item">
					<img class="img-responsive" src="images/item2.jpg"/>
				</div>
				
				<div class="flex-item">
					<img class="img-responsive" src="images/item3.jpg"/>
				</div>
				
				<div class="flex-item">
					<img class="img-responsive" src="images/item4.jpg"/>
				</div>
				
				<div class="flex-item">
					<img class="img-responsive" src="images/item5.jpg"/>
				</div>
				
				<div class="flex-item">
					<img class="img-responsive" src="images/item6.jpg"/>
				</div> -->
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