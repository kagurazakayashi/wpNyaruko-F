<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
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
<!-- Stylesheets -->
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo("template_url"); ?>/style-mobile.css" type="text/css" media="screen" />
<link href="resources/bootstrap.min.css" rel="stylesheet">
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo $feed; ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
<script type="text/javascript" src="resources/jquery.min.js"></script>
<script type="text/javascript" src="resources/jquery.cookie.js"></script>
</head>

<?php flush(); ?>

<body>
<div id="wrapper">
	<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/homepage/nyarukoplayer.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/script.js"></script>
	<!-- 1顶端大图 -->
	<div id="nyarukoplayer_loading">
		<noscript>错误：页面没有成功运行，请允许 javascript 以获得最佳浏览体验。</noscript>
		<div id="nyarukoplayer_loadingok">
			Loading...
		</div>
	</div>
	<!-- <div id="homepage_bignews">正在直播：点击前往 >></div> -->
	<div id="nyarukoplayer"></div>
	<div id="homepage_topimgbox">
	<div id="homepage_title"></div>
	<?php echo '<script>var ishome=';
		if(is_home()) {
			echo 'true;</script>';
			?>
			<div id="homepage_footbox">
				<span id="homepage_foot">
					© 北京未来赛车文化有限公司
				</span>
				<span id="homepage_sociallist">
					<img src="homepage/weibo.png" alt="访问我们的新浪微博">
					<span>　</span>
					<img src="homepage/wechat.png" alt="关注我们的微信公众号">
				</span>
			</div>
		<?php
		} else {
			echo 'false;</script>';
		}
	?>
		<div id="homepage_titlebox">
			<span id="homepage_mobilemenubtn"><i class="material-icons">&#xE5D2;</i></span>
			<span id="homepage_titlelogo"><a href="<?php bloginfo('url'); ?>" title="返回<?php bloginfo('name'); ?>主页"><?php bloginfo('name'); ?></a></span>
			<span class="homepage_menu" id="homepage_mainmenu">
				<?php wp_nav_menu(array(
					"menu"=>"mainmenu"
				)) ?>
			</span>
		</div>
	</div>