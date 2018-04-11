<div id="nyarukoplayer"></div>
	<div id="homepage_topimgbox">
	<div id="homepage_title"></div>
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
    <?php
//

?>