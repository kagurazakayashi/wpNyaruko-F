<span class="homepage_snsqrshowbox" id="homepage_h2snsqrshowbox"><div id="homepage_snsqrshow"></div>点击图标可直接打开</span>
<div id="racing_h2nyarukopbg"></div>
<div id="racing_h2menubox">
    <div class="racing_h2menu" id="racing_h2menu1">
        <div class="racing_h2menucell" id="racing_h2menu1l">
            <?php
            if (@$wpNyarukoOption['wpNyarukoLogo'] == "") {
                echo '<a href="'.get_bloginfo('url').'" title="返回'.get_bloginfo('name').'主页">'.get_bloginfo('name').'</a>';
            } else {
                echo '<a href="'.get_bloginfo('url').'" title="返回'.get_bloginfo('name').'主页"><img id="racing_h2logo" src="'.$wpNyarukoOption['wpNyarukoLogo'].'" alt="'.get_bloginfo('name').'" /></a>';
            }
            ?>
        </div>
        <div class="racing_h2menucell" id="racing_h2menu1r">
            <a href="javascript:mobilemenu();" id="homepage_snsa_weibo" target="_blank"><img class="homepage_snsicon" id="homepage_snsicon_weibo" src="<?php bloginfo("template_url"); ?>/homepage/ic_menu_white_48dp_2x.png" alt="打开主菜单"></a>
            <span>&emsp;</span>
            <a href="http://weibo.com/<?php echo $wpNyarukoOption['wpNyarukoSNSWeibo']; ?>" id="homepage_snsa_weibo" target="_blank"><img class="homepage_snsicon" id="homepage_snsicon_weibo" src="<?php bloginfo("template_url"); ?>/homepage/weibo.png" alt="访问我们的新浪微博" onMouseOver="snsiconover('weibo');" onMouseOut="snsiconout('weibo');"></a>
            <span>&emsp;</span>
            <a href="http://weixin.qq.com/q/<?php echo $wpNyarukoOption['wpNyarukoSNSWeChat']; ?>" id="homepage_snsa_wechat" target="_blank"><img class="homepage_snsicon" id="homepage_snsicon_wechat" src="<?php bloginfo("template_url"); ?>/homepage/wechat.png" alt="关注我们的微信公众号" onMouseOver="snsiconover('wechat');" onMouseOut="snsiconout('wechat');"></a>
        </div>
    </div>
    <div id="racing_h2menu2box">
        <div class="racing_h2menu" id="racing_h2menu2">
            <div class="racing_h2menucell" id="racing_h2menu2l">版权资源</div>
            <div class="racing_h2menucell" id="racing_h2menu2r">
                <?php wp_nav_menu(array(
                    "theme_location" => "tabmenu",
                    "container_id" => "racing_h2tabmenu"
                )) ?>
            </div>
        </div>
    </div>
</div>
<div class="nyarukoplayer" id="nyarukoplayer1"></div>
<div id="homepage_topimgbox">
    <div id="homepage_title"></div>
</div>
	<!-- <div id="homepage_topimgbox">
        <div id="homepage_title"></div>
        <div id="homepage_footbox">
                <span id="homepage_snsqrshowbox"><div id="homepage_snsqrshow"></div>点击图标可直接打开</span>
        </div>
            <div id="homepage_titlebox">
                <span class="homepage_menu" id="homepage_mainmenu">
                    <div class="mainmenu_com"><?php wp_nav_menu(array(
                        "theme_location"=>"mainmenu"
                    )) ?></div>
                </span>
            </div>
	</div> -->