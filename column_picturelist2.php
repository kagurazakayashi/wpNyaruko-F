<?php
$typename = get_category($categoryid)->name;
typetitle($typename);
$nposts = get_posts(array(
	'category' => $categoryid,
	'numberposts' => $numberposts,
)); ?>
<div class="carouseljs">
	<?php
	echo "<script>var scrollimgs = [";
	$scrollimgsfirst = true;
	if(empty($nposts)){
		echo "";
	} else {
		foreach($nposts as $npost){
			if ($scrollimgsfirst) {
				$scrollimgsfirst = false;
			} else {
				echo ",";
			}
			echo "['".$npost->post_title."',";
			$itemimage = catch_image($npost);
			if ($itemimage == "") {
				bloginfo("template_url");
				echo "'images/default.jpg',";
			} else {
				echo "'".$itemimage."',";
			}
			echo "'".get_permalink($npost->ID)."']";
		}
	}
	echo "];console.log(scrollimgs);</script>";
	echo '<div class="morebtnbox"><a class="morebtn" title="更多'.$typename.'" href="'.get_category_link($categoryid).'">更多</a></div>'; ?>
</div>