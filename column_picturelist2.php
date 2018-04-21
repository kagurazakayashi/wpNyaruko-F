<?php
$typename = get_category($categoryid)->name;
typetitle($typename);
$usededuplication = 1;
if(@$wpNyarukoOption['wpNyarukoDeduplication0']!='' && @$wpNyarukoOption['wpNyarukoDeduplication3']!='') {
    $usededuplication = 2;
}
$nposts = get_posts(array(
    'category' => $categoryid,
    'numberposts' => ($numberposts*$usededuplication),
));
$dedupreturn = deduplication($showids,$nposts,$numberposts);
if (@$wpNyarukoOption['wpNyarukoDeduplication0']!='' && @$wpNyarukoOption['wpNyarukoDeduplication3']!='') {
    $nposts = $dedupreturn[0];
}
if (@$wpNyarukoOption['wpNyarukoDeduplication0']!='' && @$wpNyarukoOption['wpNyarukoDeduplication3M']!='') {
    $showids = $dedupreturn[1];
}
if(empty($nposts)){
    echo "<center><p>暂无内容</p><p>&emsp;</p></center>";
} else {
?>
<div class="carouseljs">
    <div class="spfatherDIV" id="sp<?php echo $colid; ?>">
        <div class="sp"></div>
        <div class="scrollpicture"></div>
        <div class="spbutton spleft" onclick="leftbutton('sp<?php echo $colid; ?>');">
            <div class="spbuttoncell"><div class="triangle-facing triangle-facing-left"></div></div>
        </div>
        <div class="spbutton spright" onclick="rightbutton('sp<?php echo $colid; ?>');">
            <div class="spbuttoncell"><div class="triangle-facing triangle-facing-right"></div></div>
        </div>
    </div>
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
            $posttitle = '<span class="scrollimgcell">'.$npost->post_title.'</span>';
            if (isvideo($npost->post_content)) {
                if (isvideo($npost->post_content)) {
                    $posttitle = '<span class="scrollimgcell"><i class="material-icons">&#xE039;&nbsp;</i></span>'.$posttitle;
                }
            }
            $posttitle = '<span class="pictitletable">'.$posttitle.'</span>';
            echo "['".$posttitle."',";
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
    echo "];setscrollimgs(scrollimgs);scrollpicture('sp".$colid."');</script>";
    echo '<div class="morebtnbox"><a class="morebtn" title="更多'.$typename.'" href="'.get_category_link($categoryid).'">更多</a></div><br/>';
} ?>
</div>