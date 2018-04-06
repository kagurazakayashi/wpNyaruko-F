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
<?php include_once("KagurazakaYashi.php"); ?>
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
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/script-first.js"></script>
<link href="<?php echo @$wpNyarukoOption['wpNyarukoBScss']; ?>" rel="stylesheet">
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

<body>
<div id="mobilemenubox">
	<div class="racing_phone_menuback" onclick="mobilemenu();"></div>
	<div class="racing_phone_menu">
		<div id="mobilemenu_userinfo" style="background-image: url(<?php bloginfo("template_url"); ?>/images/defaultuserbg.jpg)">
			<div id="mobilemenu_userinfoc"><b>栏目导航</b><br/><?php bloginfo('name'); ?></div>
		</div>
		<div class="mainmenu_mob"><?php wp_nav_menu(array(
			"theme_location"=>"mainmenu",
			'menu_class' => 'mobilemenu'
		)) ?></div>
	</div>
</div>
<div id="wrapper">
	<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/homepage/nyarukoplayer.min.js"></script>
	<script type="text/javascript">var nyarukoplayerjson = "/wp-content/themes/wpNyaruko-N/homepage/nyarukoplayer/nyarukoplayer.json";</script>
	<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/lib/qrcode.js"></script>
	<?php
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
		echo '"'.$wpNyarukoOption['wpNyarukoQRimgtype'].'"];</script>';
	} else {
		echo '<script type="text/javascript">var qrdef = [];</script>';
	}
	?>
	<!-- 1顶端大图 -->
	<div id="nyarukoplayer_loading">
		<noscript>错误：页面没有成功运行，请允许 javascript 以获得最佳浏览体验。</noscript>
		<div id="nyarukoplayer_loadingok">
			Loading...
		</div>
	</div>
	<?php if (strlen($wpNyarukoOption['wpNyarukoFNewsTitle']) > 0) { ?>
		<div class="homepage_bignewsbox" id="homepage_bignews" style="background-color: #<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?>;">
			<span id="homepage_bignewsimg">
				<img src="<?php echo @$wpNyarukoOption['wpNyarukoFNewsImage']; ?>" />
				<span id="homepage_bignewsit" style="background: linear-gradient(to right, transparent 50%, #<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?> 100%);"></span>
			</span>
			<span id="homepage_bignewstxt" style="color: #<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorF']; ?>; text-shadow:#<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?> 1px 0 0,#<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?> 0 1px 0,#<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?> -1px 0 0,#<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?> 0 -1px 0;"><?php echo @$wpNyarukoOption['wpNyarukoFNewsTitle']; ?></span>
		</div>
		<div class="homepage_bignewsbox" id="homepage_bignewslink" onmouseover="bignewslinkmouse(true);" onmouseout="bignewslinkmouse(false);"><a href="<?php echo @$wpNyarukoOption['wpNyarukoFNewsLink']; ?>"<?php if (@$wpNyarukoOption['wpNyarukoFNewsLinkN'] == "on") echo 'target="_blank"'; ?>></a></div>
		<div id="homepage_bignewspop">
			<div id="homepage_bignewspopup" style="border-bottom: 20px solid #<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?>;"></div>
			<img id="homepage_bignewspopimg" src="<?php echo @$wpNyarukoOption['wpNyarukoFNewsImageB']; ?>" style="border: 10px solid #<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?>;" />
		</div>
	<?php } ?>
	<div id="nyarukoplayer"></div>
	<div id="homepage_topimgbox">
	<div id="homepage_title"></div>
	<?php echo '<script>var ishome=';
		if(is_home()) {
			echo 'true;</script>';
		} else {
			echo 'false;</script>';
		}
	?>
	<div id="homepage_footbox">
		<span id="homepage_foot">
			<!-- TODO:footmenu -->
			<?php wp_nav_menu(array(
				"theme_location" => "tabmenu",
				"container_id" => "racing_tabmenu"
			)) ?>
		</span>
			<span id="homepage_snsqrshowbox"><div id="homepage_snsqrshow"></div>点击图标可直接打开</span>
		<span id="homepage_sociallist">
			<a href="http://weibo.com/<?php echo $wpNyarukoOption['wpNyarukoSNSWeibo']; ?>" id="homepage_snsa_weibo" target="_blank"><img class="homepage_snsicon" id="homepage_snsicon_weibo" src="homepage/weibo.png" alt="访问我们的新浪微博" onMouseOver="snsiconover('weibo');" onMouseOut="snsiconout('weibo');"></a>
			<span></span>
			<a href="http://weixin.qq.com/q/<?php echo $wpNyarukoOption['wpNyarukoSNSWeChat']; ?>" id="homepage_snsa_wechat" target="_blank"><img class="homepage_snsicon" id="homepage_snsicon_wechat" src="homepage/wechat.png" alt="关注我们的微信公众号" onMouseOver="snsiconover('wechat');" onMouseOut="snsiconout('wechat');"></a>
		</span>
	</div>
		<div id="homepage_titlebox">
			<span id="homepage_mobilemenubtn" onclick="mobilemenu();"><i class="material-icons">&#xE5D2;</i></span>
			<span id="homepage_titlelogo">
			<?php
			if (@$wpNyarukoOption['wpNyarukoLogo'] == "") {
				echo '<a href="'.get_bloginfo('url').'" title="返回'.get_bloginfo('name').'主页">'.get_bloginfo('name').'</a>';
			} else {
				echo '<a href="'.get_bloginfo('url').'" title="返回'.get_bloginfo('name').'主页"><img id="homepage_logo" src="'.$wpNyarukoOption['wpNyarukoLogo'].'" alt="'.get_bloginfo('name').'" /></a>';
			}
			?>
			</span>
			<span class="homepage_menu" id="homepage_mainmenu">
				<div class="mainmenu_com"><?php wp_nav_menu(array(
					"theme_location"=>"mainmenu"
				)) ?></div>
			</span>
		</div>
	</div>