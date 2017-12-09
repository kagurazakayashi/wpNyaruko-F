<?php
$typename = get_category($categoryid)->name;
typetitle($typename);
$nposts = get_posts(array(
	'category' => $categoryid,
	'numberposts' => $numberposts,
));
if(empty($nposts)){
	echo "<center><p>暂无内容</p></center>";
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
	// echo '<div class="morebtnbox"><a class="morebtn" title="更多'.$typename.'" href="'.get_category_link($categoryid).'">更多</a></div>';
}
?>