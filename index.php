<?php $colid = 0; ?>
<?php get_header(); ?>

<div class="tshadow"><?php
$wpNyarukoOption = get_option('wpNyaruko_options');
$wpNyarukoIndexModule = null;
if (isMobile() && $wpNyarukoOption['wpNyarukoIndexModuleM']) {
    $wpNyarukoIndexModule = $wpNyarukoOption['wpNyarukoIndexModuleM'];
} else {
    $wpNyarukoIndexModule = $wpNyarukoOption['wpNyarukoIndexModule'];
}

$categories = get_categories();
$modules = explode("|",$wpNyarukoIndexModule);
$showids = array();
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
            include "column_picturelist2.php";
            break;
        case 3:
            include "column_contentlist2.php";
            break;
        default:
            include "column_blank.php";
            break;
    }
}
?></div>
<?php get_footer(); ?>