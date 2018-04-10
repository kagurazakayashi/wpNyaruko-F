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
	if(empty($nposts)){
		echo "<center><p>暂无内容</p></center>";
	} else {
		foreach($nposts as $npost){
			$itemimage = catch_image($npost);
			if ($itemimage == "") {
				bloginfo("template_url");
				echo "'images/default.jpg',";
			} else {
				echo "'".$itemimage."',";
			}
		}
	}
	//$npost->post_title;
	echo "null];console.log(scrollimgs);</script>";
	echo '<div class="morebtnbox"><a class="morebtn" title="更多'.$typename.'" href="'.get_category_link($categoryid).'">更多</a></div>'; ?>
</div>