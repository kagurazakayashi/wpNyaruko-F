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
    echo "];setscrollimgs(scrollimgs);scrollpicture('sp".$colid."');</script>";
    echo '<div class="morebtnbox"><a class="morebtn" title="更多'.$typename.'" href="'.get_category_link($categoryid).'">更多</a></div><br/>'; ?>
</div>