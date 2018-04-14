<?php
$typename = get_category($categoryid)->name;
typetitle($typename);
$nposts = get_posts(array(
    'category' => $categoryid,
    'numberposts' => ($numberposts*2),
));
$dedupreturn = deduplication($showids,$nposts,$numberposts);
$nposts = $dedupreturn[0];
$showids = $dedupreturn[1];
if(empty($nposts)){
    echo "<center><p>暂无内容</p></center>";
} else {
    foreach($nposts as $npost){
        ?>
        <div class="racing_bigpicnews image_169_div" onclick="javascript:window.location.href='<?php echo get_permalink($npost->ID); ?>'">
            <img class="image_169" src="<?php 
            $itemimage = catch_image($npost);
            if ($itemimage == "") {
                bloginfo("template_url");
                echo "images/default.jpg";
            } else {
                echo $itemimage;
            }
            ?>" />
            <div class="pictitle"><div class="pictitletext"><?php
                if (isvideo($npost->post_content)) {
                    echo '<i class="material-icons">&#xE039;&nbsp;</i>';
                }
                echo $npost->post_title;
            ?></div></div>
        </div>
        <?php
    }
    // echo '<div class="morebtnbox"><a class="morebtn" title="更多'.$typename.'" href="'.get_category_link($categoryid).'">更多</a></div>';
}
?>