<?php $colid = 0; ?>
<!-- 1顶端大图 -->
<?php get_header(); ?>

<div class="tshadow"><?php
$wpNyarukoOption = get_option('wpNyaruko_options');
$wpNyarukoIndexModule = $wpNyarukoOption['wpNyarukoIndexModule'];
$categories = get_categories();
$modules = explode("|",$wpNyarukoIndexModule);
foreach ($modules as $moduleinfos) {
    if ($moduleinfos == "") {
        continue;
    }
    $moduleinfo = explode("_",$moduleinfos);
    $colid++;
    $categoryid = intval($moduleinfo[1]);
    $numberposts = intval($moduleinfo[2]);
    switch (intval($moduleinfo[0])) {
        case 0:
            include "column_bigpicture.php";
            break;
        case 1:
            include "column_contentlist.php";
            break;
        case 2:
            include "column_picturelist.php";
            break;
        default:
            include "column_blank.php";
            break;
    }
}
?></div>

<!-- 7页脚 -->
<?php get_footer(); ?>