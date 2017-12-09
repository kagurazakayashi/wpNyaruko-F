<?php
$typename = get_category($categoryid)->name;
typetitle($typename);
$nposts = get_posts(array(
	'category' => $categoryid,
	'numberposts' => $numberposts,
)); ?>
<div class="carousel-example">
	<div id="simple-content-carousel" class="carousel flexible slide" data-ride="carousel" data-interval="5000" data-wrap="true">
		<div class="items">
		<?php
			if(empty($nposts)){
				echo "<center><p>暂无内容</p></center>";
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
			}
			?>
		</div>
		<div class="carousel-inner" role="listbox">
		</div>
		<a class="left carousel-control" href="#simple-content-carousel" role="button" data-slide="prev" style="width:50px;top:50%;">
			<span class="material-icons" aria-hidden="true">keyboard_arrow_left</span>
		</a>
		<a class="right carousel-control" href="#simple-content-carousel" role="button" data-slide="next" style="width:50px;top:50%;">
			<span class="material-icons" aria-hidden="true">keyboard_arrow_right</span>
		</a>
	</div>
	<?php echo '<div class="morebtnbox"><a class="morebtn" title="更多'.$typename.'" href="'.get_category_link($categoryid).'">更多</a></div>'; ?>
</div>