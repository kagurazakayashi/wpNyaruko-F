<?php
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
			echo "<center><p>暂无内容</p></center>";
		} else {
			foreach($nposts as $npost){
				$isvideo = isvideo($npost->post_title);
		?>
		<div class="racing_item" onclick="javascript:window.location.href='<?php echo get_permalink($npost->ID); ?>'">
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
		</div>
		<?php
			}
		}
		?>
	</div>
	<?php echo '<div class="morebtnbox"><a class="morebtn" title="更多'.$typename.'" href="'.get_category_link($categoryid).'">更多</a></div>'; ?>
</div>