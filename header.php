<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有文章" href="<?php echo $feed; ?>" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0 - 所有评论" href="<?php bloginfo('comments_rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>

<?php flush(); ?>

<body>
<div id="wrapper">
	<!-- Text Logo -->
	<!-- <h1 id="logo"  class="grid_4"><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1> -->
	<!-- Navigation Menu -->
	<!-- <ul id="navigation" class="grid_8">
		<?php wp_list_pages('depth=1&title_li=0&sort_column=menu_order'); ?>
		<li <?php if (is_home()) { echo 'class="current"';} ?>><a title="<?php bloginfo('name'); ?>"  href="<?php echo get_option('home'); ?>/">主页</a></li>
	</ul> -->
	<!-- Caption Line -->
	<!-- <h2 class="grid_12 caption clearfix"><?php bloginfo('description'); ?></h2> -->
	<!-- <div class="hr grid_12 clearfix">&nbsp;</div> -->
	<script type="text/javascript" src="resources/jquery.min.js"></script>
	<script type="text/javascript" src="resources/jquery.cookie.js"></script>
	<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/script.js"></script>
	<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/homepage/nyarukoplayer.js"></script>
	<div id="nyarukoplayer_loading">
		<noscript>错误：页面没有成功运行，请允许 javascript 以获得最佳浏览体验。</noscript>
		<div id="nyarukoplayer_loadingok">
			Loading...
		</div>
	</div>
	<!-- <div id="bignews">正在直播：点击前往 >></div> -->
	<div id="nyarukoplayer"></div>
	<!-- <div id="nyarukoplayer_def"></div> -->
	<div id="homepage_topimgbox">
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
		<div id="homepage_titlebox">
			<span id="homepage_titlelogo">LOGO预留位置</span>
			<span class="homepage_menu" id="homepage_mainmenu">
				<a href="#" target="_blank">
					<span>
						<h1>联系我们</h1>
					</span>
				</a>
				<a href="#" target="_blank">
					<span>
						<h1>成功案例</h1>
					</span>
				</a>
				<a href="#" target="_blank">
					<span>
						<h1>合作伙伴</h1>
					</span>
				</a>
				<a href="#" target="_blank">
					<span>
						<h1>业务介绍</h1>
					</span>
				</a>
				<a href="#" target="_blank">
					<span>
						<h1>公司简介</h1>
					</span>
				</a>
			</span>
		</div>
	</div>