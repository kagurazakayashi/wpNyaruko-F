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
            global $current_user;
            $canuseadminsetting = ['author','editor','administrator'];
            $ucanuseadminsetting = false;
            foreach ($canuseadminsetting as $nowcanuseadminsetting) {
                if(isset($current_user->roles[0]) && $current_user->roles[0] == $nowcanuseadminsetting) {
                    $ucanuseadminsetting = true;
                    break;
                }
            }
            if ($ucanuseadminsetting) echo '&emsp;<a href="/wp-admin/" title="已使用具备访问后台权限的用户登录，点此前往网站后台。"><img id="wpnyaruko_goadminbtn" src="'.get_bloginfo("template_url").'/homepage/ic_settings_white_48pt_2x.png" alt="后台" /></a>';
            ?>
        </div>
        <div class="racing_h2menucell" id="racing_h2menu1c">
        <?php 
        if (!$mobile) {
            wp_nav_menu(array(
                "theme_location" => "wpNyaruko_MainMenu",
                "container_id" => "racing_topmenu"
            ));
        }
        ?>
        </div>
        <div class="racing_h2menucell" id="racing_h2menu1r">
            <a href="javascript:mobilemenu();" id="homepage_snsa_weibo" target="_blank"><img class="homepage_snsicon" id="homepage_snsicon_weibo" src="<?php bloginfo("template_url"); ?>/homepage/ic_menu_white_48dp_2x.png" alt="打开主菜单"></a>
            <span>&emsp;</span>
            <a href="<?php echo $wpNyarukoOption['wpNyarukoSNSWeibo']; ?>" id="homepage_snsa_weibo" target="_blank"><img class="homepage_snsicon" id="homepage_snsicon_weibo" src="<?php bloginfo("template_url"); ?>/homepage/weibo.png" alt="访问我们的新浪微博" onMouseOver="snsiconover('weibo');" onMouseOut="snsiconout('weibo');"></a>
            <span>&emsp;</span>
            <a href="<?php echo $wpNyarukoOption['wpNyarukoSNSWeChat']; ?>" id="homepage_snsa_wechat" target="_blank"><img class="homepage_snsicon" id="homepage_snsicon_wechat" src="<?php bloginfo("template_url"); ?>/homepage/wechat.png" alt="关注我们的微信公众号" onMouseOver="snsiconover('wechat');" onMouseOut="snsiconout('wechat');"></a>
        </div>
    </div>
    <div id="racing_h2menu2box">
        <div class="racing_h2menu" id="racing_h2menu2">
            <div class="racing_h2menucell" id="racing_h2menu2l">版权资源</div>
            <div class="racing_h2menucell" id="racing_h2menu2r">
                <?php wp_nav_menu(array(
                    "theme_location" => "wpNyaruko_TabMenu",
                    "container_id" => "racing_h2tabmenu"
                )) ?>
            </div>
        </div>
    </div>
</div>
<?php if (strlen($wpNyarukoOption['wpNyarukoFNewsTitle']) > 0) { ?>
        <div class="homepage_bignewsbox" id="homepage_bignews" style="background-color: #<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?>;">
            <span id="homepage_bignewsimg">
                <img src="<?php echo @$wpNyarukoOption['wpNyarukoFNewsImage']; ?>" />
            </span>
            <span id="homepage_bignewstxt" style="color: #<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorF']; ?>; text-shadow:#<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?> 1px 0 0,#<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?> 0 1px 0,#<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?> -1px 0 0,#<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?> 0 -1px 0;"><?php echo @$wpNyarukoOption['wpNyarukoFNewsTitle']; ?></span>
        </div>
        <div class="homepage_bignewsbox" id="homepage_bignewslink" onmouseover="bignewslinkmouse(true);" onmouseout="bignewslinkmouse(false);" style="top: 110px;" ><a href="<?php echo @$wpNyarukoOption['wpNyarukoFNewsLink']; ?>"<?php if (@$wpNyarukoOption['wpNyarukoFNewsLinkN'] == "on") echo 'target="_blank"'; ?>></a>
        <span id="homepage_bignewsit" style="background: linear-gradient(to right, transparent 50%, #<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?> 100%);"></span>
        </div>
        <div id="homepage_bignewspop" style="top:174px;">
            <div id="homepage_bignewspopup" style="border-bottom: 20px solid #<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?>;"></div>
            <img id="homepage_bignewspopimg" src="<?php echo @$wpNyarukoOption['wpNyarukoFNewsImageB']; ?>" style="border: 10px solid #<?php echo @$wpNyarukoOption['wpNyarukoFNewsColorB']; ?>;" />
        </div>
    <?php } ?>
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
                        "theme_location"=>"wpNyaruko_MainMenu"
                    )) ?></div>
                </span>
            </div>
    </div> -->