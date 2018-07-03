<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
$wpNyarukoOption = get_option('wpNyaruko_options');
if(@$wpNyarukoOption['wpNyarukoPHPDebug']!='') {
    echo "<!-- wpNyaruko DEBUG MODE -->";
}
?>
<?php $wpNyarukoHeaderTheme = 2; //TODO:切换顶端主题
include_once("KagurazakaYashi.php"); ?>
<title><?php if ( is_home() ) {
        bloginfo('name'); echo " - "; bloginfo('description');
    } elseif ( is_category() ) {
        single_cat_title(); echo " - "; bloginfo('name');
    } elseif (is_single() || is_page() ) {
        single_post_title();
    } elseif (is_search() ) {
        echo "搜索结果"; echo " - "; bloginfo('name');
    } elseif (is_404() ) {
        echo '页面未找到!';
    } else {
        wp_title('',true);
    } ?></title>
<?php echo @$wpNyarukoOption['wpNyarukoHeader']; ?>
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/style-mobile.css" type="text/css" media="screen" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php if(@$wpNyarukoOption['wpNyarukoRSSArticle']!='') { ?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo get_bloginfo('rss2_url'); ?>" />
<?php } if(@$wpNyarukoOption['wpNyarukoRSSComment']!='') { ?>
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
<?php } ?>
<script type="text/javascript" src="<?php echo @$wpNyarukoOption['wpNyarukoJQ']; ?>"></script>
<script type="text/javascript" src="<?php echo @$wpNyarukoOption['wpNyarukoJQcookie']; ?>"></script>
<script type="text/javascript" src="/resources/jquery.mousewheel.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/script-first.js"></script>
<?php
$description = '';
$keywords = '';

if (is_home() || is_page()) {
   $description = get_bloginfo('description');
   $keywords = @$wpNyarukoOption['wpNyarukoIndexKeywords'];
}
elseif (is_single()) {
   $description1 = get_post_meta($post->ID, "description", true);
   $description2 = str_replace("\n","",mb_strimwidth(strip_tags($post->post_content), 0, 200, "…", 'utf-8'));

   // 填写自定义字段description时显示自定义字段的内容，否则使用文章内容前200字作为描述
   $description = $description1 ? $description1 : $description2;

   // 填写自定义字段keywords时显示自定义字段的内容，否则使用文章tags作为关键词
   $keywords = get_post_meta($post->ID, "_keywords_value", true);
   if($keywords == '') {
      $tags = wp_get_post_tags($post->ID);
      foreach ($tags as $tag ) {
         $keywords = $keywords . $tag->name . ", ";
      }
      $keywords = rtrim($keywords, ', ');
   }
}
elseif (is_category()) {
   // 分类的description可以到后台 - 文章 -分类目录，修改分类的描述
   $description = category_description();
   $keywords = single_cat_title('', false);
}
elseif (is_tag()){
   // 标签的description可以到后台 - 文章 - 标签，修改标签的描述
   $description = tag_description();
   $keywords = single_tag_title('', false);
}
$description = trim(strip_tags($description));
$keywords = trim(strip_tags($keywords));
?>
<meta name="description" content="<?php echo $description; ?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<?php wp_head(); ?>
</head>

<?php flush(); ?>

<body onload="medialoaded();">
    <?php 
    include "ua.php";
    $mobile = isMobile();
    include "style.php";
    gcss($wpNyarukoOption);
    ?>
<div id="mobilemenubox">
    <div class="racing_phone_menuback" onclick="mobilemenu();"></div>
    <div class="racing_phone_menu">
        <div id="mobilemenu_userinfo">
            <div id="mobilemenu_userinfoc"><br/><?php bloginfo('name'); ?></div>
        </div>
        <div class="mainmenu_mob"><?php 
        $mobilemenulocation = "wpNyaruko_SlidingMenuPc";
        if ($mobile) $mobilemenulocation = "wpNyaruko_SlidingMenuMobile";
        wp_nav_menu(array(
            "theme_location" => $mobilemenulocation,
            'menu_class' => 'mobilemenu'
        )) ?></div>
    </div>
</div>
<div id="wrapper">
    <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/homepage/nyarukoplayer.min.js"></script>
    <script type="text/javascript">var nyarukoplayerjson = "/wp-content/themes/wpNyaruko-F/homepage/nyarukoplayer/nyarukoplayer.json";</script>
    <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/lib/qrcode.js"></script>
    <?php //JS VAR
    //QRdef
    if ($wpNyarukoOption['wpNyarukoQRtype'] && $wpNyarukoOption['wpNyarukoQRtype'] != "" &&
    $wpNyarukoOption['wpNyarukoQRecorrection'] && $wpNyarukoOption['wpNyarukoQRecorrection'] != "" &&
    $wpNyarukoOption['wpNyarukoQRmode'] && $wpNyarukoOption['wpNyarukoQRmode'] != "" &&
    $wpNyarukoOption['wpNyarukoQRecode'] && $wpNyarukoOption['wpNyarukoQRecode'] != "" &&
    $wpNyarukoOption['wpNyarukoQRimgtype'] && $wpNyarukoOption['wpNyarukoQRimgtype'] != ""
    ) {
        echo '<script type="text/javascript">var qrdef = [';
        echo $wpNyarukoOption['wpNyarukoQRtype'].',';
        echo '"'.$wpNyarukoOption['wpNyarukoQRecorrection'].'",';
        echo '"'.$wpNyarukoOption['wpNyarukoQRmode'].'",';
        echo '"'.$wpNyarukoOption['wpNyarukoQRecode'].'",';
        echo '"'.$wpNyarukoOption['wpNyarukoQRimgtype'].'"];';
    } else {
        echo '<script type="text/javascript">var qrdef = [];';
    }
    //isMobile
    echo 'var isMobile=';
    echo ($mobile) ? "true;" : "false;";
    //Playerdef
    echo 'var playerdef = [';
    echo '"'.$wpNyarukoOption['wpNyarukoPlayerAutoMiniSize'].'",';
    echo '"'.$wpNyarukoOption['wpNyarukoPlayerAutoMiniSizeU'].'",';
    echo '"'.$wpNyarukoOption['wpNyarukoPlayerAutoMiniSizeA'].'",';
    echo '"'.$wpNyarukoOption['wpNyarukoPlayerAutoStop'].'",';
    echo '"'.$wpNyarukoOption['wpNyarukoPlayerAutoRemove'].'"];';
    //pagetype
    $pagetype = 0;
    if (is_home()) {
        $pagetype = 1;
    } else if (is_single()) {
        $pagetype = 2;
    } else if (is_page()) {
        $pagetype = 3;
    } else if (is_category()) {
        $pagetype = 4;
    } else if (is_tag()) {
        $pagetype = 5;
    } else if (is_archive() || is_year() || is_month() || is_day() || is_time()) {
        $pagetype = 6;
    } else if (is_search()) {
        $pagetype = 7;
    }
    echo 'var pagetype="'.$pagetype.'";';
    echo 'var ispaged=';
    echo (is_paged()) ? "true;" : "false;";
    //bigpic
    if ($wpNyarukoOption['wpNyarukoBigPicTitleAutoSizeF'] && $wpNyarukoOption['wpNyarukoBigPicTitleAutoSizeT'] != "") {
        echo 'var bigpicdef = [';
        echo '"'.$wpNyarukoOption['wpNyarukoBigPicTitleAutoSize'].'",';
        echo '"'.$wpNyarukoOption['wpNyarukoBigPicTitleAutoSizeF'].'",';
        echo '"'.$wpNyarukoOption['wpNyarukoBigPicTitleAutoSizeT'].'"];';
    }
    echo '</script>';
    ?>
    <!-- 1顶端大图 -->
    <div class="nyarukoplayer_loading">
        <noscript>错误：页面没有成功运行，请允许 javascript 以获得最佳浏览体验。</noscript>
        <div class="nyarukoplayer_loadingok">
            Loading...
        </div>
    </div>
    <?php
    echo "<script>wpnyaruko_headermode = ".$wpNyarukoHeaderTheme.";</script>";
    if ($wpNyarukoHeaderTheme == 1) {
        include "header_transparent.php";
    } else if ($wpNyarukoHeaderTheme == 2) {
        include "header_clear.php";
    }
    ?>