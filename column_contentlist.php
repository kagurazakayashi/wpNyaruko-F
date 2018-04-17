<?php
$typename = get_category($categoryid)->name;
typetitle($typename);
$usededuplication = 1;
if(@$wpNyarukoOption['wpNyarukoDeduplication0']!='' && @$wpNyarukoOption['wpNyarukoDeduplication2']!='') {
    $usededuplication = 2;
}
$nposts = get_posts(array(
    'category' => $categoryid,
    'numberposts' => ($numberposts*$usededuplication),
));
$dedupreturn = deduplication($showids,$nposts,$numberposts);
if (@$wpNyarukoOption['wpNyarukoDeduplication0']!='' && @$wpNyarukoOption['wpNyarukoDeduplication2']!='') {
    $nposts = $dedupreturn[0];
}
if (@$wpNyarukoOption['wpNyarukoDeduplication0']!='' && @$wpNyarukoOption['wpNyarukoDeduplication2M']!='') {
    $showids = $dedupreturn[1];
}
?>
<div class="racing_listbox">
    <div class="racing_list_tlr"></div>
    <div class="racing_list">
        <?php  
        if(empty($nposts)){
            echo "<center><p>暂无内容</p><p>&emsp;</p></center>";
        } else {
            foreach($nposts as $npost){
        ?>
        <div class="racing_item" onclick="javascript:window.location.href='<?php echo get_permalink($npost->ID); ?>'">
            <div class="racing_list_left">
                <div class="racing_list_left_class" onclick="racinglistleftclass('<?php echo get_tag_link(@get_the_tags()[0]->term_id); ?>')"><?php
                    $tags = wp_get_post_tags($npost->ID);
                    if (count($tags) == 0) {
                        $ntypename = $typename;
                    } else {
                        $ntypename = $tags[0]->name;
                        if ($ntypename == "") {
                            $ntypename = $typename;
                        }
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
                ?>" alt="<?php echo $npost->post_title; ?>" />
                <?php if (isvideo($npost->post_content)) { echo '<div class="racing_list_left_play material-icons">&#xE039;</div>'; } ?>
            </div>
            <div class="racing_list_right" onclick="racinglistgotolink('<?php echo get_permalink($npost->ID); ?>')">
                <div class="racing_list_right_title"><?php echo $npost->post_title; ?></div>
                <div class="racing_list_right_content"><?php clearcontent($npost->post_content); ?></div>
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
        <div class="racing_list_tlr"></div>
</div>
    <?php echo '<div class="morebtnbox"><a class="morebtn" title="更多'.$typename.'" href="'.get_category_link($categoryid).'">更多</a></div>'; ?>