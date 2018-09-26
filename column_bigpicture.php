<?php
$typename = get_category($categoryid)->name;
typetitle($typename);
$usededuplication = 1;
if(@$wpNyarukoOption['wpNyarukoDeduplication0']!='' && @$wpNyarukoOption['wpNyarukoDeduplication1']!='') {
    $usededuplication = 2;
}
$nposts = get_posts(array(
    'category' => $categoryid,
    'numberposts' => ($numberposts*$usededuplication),
));
$dedupreturn = deduplication($showids,$nposts,$numberposts);
if (@$wpNyarukoOption['wpNyarukoDeduplication0']!='' && @$wpNyarukoOption['wpNyarukoDeduplication1']!='') {
    $nposts = $dedupreturn[0];
}
if (@$wpNyarukoOption['wpNyarukoDeduplication0']!='' && @$wpNyarukoOption['wpNyarukoDeduplication1M']!='') {
    $showids = $dedupreturn[1];
}
if(empty($nposts)){
    echo "<center><p>暂无内容</p><p>&emsp;</p></center>";
} else {
    foreach($nposts as $npost){
        ?>
        <div class="racing_bigpicnews" id="racing_bigpicnews_<?php echo $categoryid; ?>" onclick="openlink('<?php echo get_permalink($npost->ID); ?>');">
            <img id="racing_bigpicnews_<?php echo $categoryid; ?>img" src="<?php 
            $itemimage = catch_image($npost);
            if ($itemimage == "") {
                bloginfo("template_url");
                echo "images/default.jpg";
            } else {
                echo $itemimage;
            }
            ?>" onload="resizebignews(<?php echo $categoryid; ?>);"/>
            <!-- <div class="pictitle"><div class="pictitletext"><?php
                if (isvideo($npost->post_content)) {
                    echo '<i class="material-icons">&#xE039;&nbsp;</i>';
                }
                echo $npost->post_title;
            ?></div></div> -->
        </div>
        <div class="pictitle2">
        <div class="pictitle2b">
            <span class="pictitletable">
            <?php
            $posttitle = '<span class="pictitletablecell" id="pictitletablecellr">'.$npost->post_title.'</span>';
            if (isvideo($npost->post_content)) {
                if (isvideo($npost->post_content)) {
                    echo '<span class="pictitletablecell" id="pictitletablecelll"><i class="material-icons">&#xE039;&nbsp;</i></span>';
                }
            }
            echo $posttitle;
            ?>
            </span>
        </div>
        </div>
        <?php
    }
    // echo '<div class="morebtnbox"><a class="morebtn" title="更多'.$typename.'" href="'.get_category_link($categoryid).'">更多</a></div>';
}
?>