<?php 
function getOptions() {
    $wpNyarukoOption = get_option('wpNyaruko_options'); //SELECT * FROM `cxc_options` WHERE `option_name` = 'wpNyaruko_options'
?>
<script type="text/javascript" src="/resources/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/lib/colorpicker.min.js"></script>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/theme-options.js"></script>
<?php
    //读取设置
    if (!is_array($wpNyarukoOption)) {
        $wpNyarukoOption['wpNyarukoTest'] = '此处可以任意填写一些笔记';
        $wpNyarukoOption['wpNyarukoPHPDebug'] = '';
        $wpNyarukoOption['wpNyarukoBanBrowser'] = '';
        $wpNyarukoOption['wpNyarukoWordlimit'] = '300';
        $wpNyarukoOption['wpNyarukoWLInfo'] = ' ... [阅读全文]';
        $wpNyarukoOption['wpNyarukoIndexModule'] = '';
        $wpNyarukoOption['wpNyarukoQRtype'] = 10;
        $wpNyarukoOption['wpNyarukoQRecorrection'] = 'L';
        $wpNyarukoOption['wpNyarukoQRmode'] = 'Byte';
        $wpNyarukoOption['wpNyarukoQRecode'] = 'UTF-8';
        $wpNyarukoOption['wpNyarukoQRimgtype'] = 'img';
        $wpNyarukoOption['wpNyarukoTitleFootInfo'] = '©';
        $wpNyarukoOption['wpNyarukoSNSWeibo'] = '';
        $wpNyarukoOption['wpNyarukoSNSWeChat'] = '';
        $wpNyarukoOption['wpNyarukoConsoleLog'] = '';
        $wpNyarukoOption['wpNyarukoConsoleLogT'] = '';
        $wpNyarukoOption['wpNyarukoCommentMode'] = '';
        $wpNyarukoOption['wpNyarukoCommentBox'] = '';
        $wpNyarukoOption['wpNyarukoHeader'] = '';
        $wpNyarukoOption['wpNyarukoFooter'] = '<b>版权所有 © </b><br/><a rel="external" title="WordPress主页" class="link" href="http://wordpress.org/" target="_blank">WordPress</a> <a title="访问主题主页" class="link" href="https://github.com/kagurazakayashi/wpNyaruko-N" target="_blank">Theme: wpNyaruko-N</a>｜<a class="float right" href="#">页首</a><br/><a href="#" target="_blank" title="如果您对我们的内容有疑问，请点击这里联系我们。">联系我们</a>｜<a href="http://www.miitbeian.gov.cn/" target="_blank" title="如果您对我们的内容有疑问，请先进入「联系我们」栏目解决。">京ICP备XXXXXXXX号</a>';
        $wpNyarukoOption['wpNyarukoIndexKeywords'] = '';
        $wpNyarukoOption['wpNyarukoRSSArticle'] = 'on';
        $wpNyarukoOption['wpNyarukoRSSComment'] = '';
        $wpNyarukoOption['wpNyarukoJQ'] = 'resources/jquery.min.js';
        $wpNyarukoOption['wpNyarukoJQcookie'] = 'resources/jquery.cookie.js';
        $wpNyarukoOption['wpNyarukoBScss'] = 'resources/bootstrap.min.css';

        update_option('wpNyaruko_options', $wpNyarukoOption);
        die('<div id="wpNyarukoInfo" style="text-align: center; width: 100%; height: 25px; line-height: 25px; border-radius: 0px 0px 5px 5px; overflow: hidden; background-color: yellow; box-shadow: 0px 0px 5px gray; font-size: 12px;">欢迎使用 wpNyaruko 主题，请先完成初始设定。<a href="themes.php?page=theme-options.php">现在开始</a></div>');
    }
    return $wpNyarukoOption;
}
function init() {
  if (is_admin()) {
    if(isset($_GET['reset'])) {
      delete_option('wpNyaruko_options');
    }
    //保存设置
    if(isset($_POST['input_save'])) {
        $wpNyarukoOption = getOptions();
        @$wpNyarukoOption['wpNyarukoTest'] = stripslashes($_POST['wpNyarukoTest']);
        @$wpNyarukoOption['wpNyarukoBanBrowser'] = stripslashes($_POST['wpNyarukoBanBrowser']);
        @$wpNyarukoOption['wpNyarukoPHPDebug'] = stripslashes($_POST['wpNyarukoPHPDebug']);
        @$wpNyarukoOption['wpNyarukoWordlimit'] = stripslashes($_POST['wpNyarukoWordlimit']);
        @$wpNyarukoOption['wpNyarukoWLInfo'] = stripslashes($_POST['wpNyarukoWLInfo']);
        @$wpNyarukoOption['wpNyarukoIndexModule'] = stripslashes($_POST['wpNyarukoIndexModule']);
        @$wpNyarukoOption['wpNyarukoTitleFootInfo'] = stripslashes($_POST['wpNyarukoTitleFootInfo']);
        @$wpNyarukoOption['wpNyarukoSNSWeibo'] = stripslashes($_POST['wpNyarukoSNSWeibo']);
        @$wpNyarukoOption['wpNyarukoSNSWeChat'] = stripslashes($_POST['wpNyarukoSNSWeChat']);
        @$wpNyarukoOption['wpNyarukoQRtype'] = stripslashes($_POST['wpNyarukoQRtype']);
        @$wpNyarukoOption['wpNyarukoQRecorrection'] = stripslashes($_POST['wpNyarukoQRecorrection']);
        @$wpNyarukoOption['wpNyarukoQRmode'] = stripslashes($_POST['wpNyarukoQRmode']);
        @$wpNyarukoOption['wpNyarukoQRecode'] = stripslashes($_POST['wpNyarukoQRecode']);
        @$wpNyarukoOption['wpNyarukoQRimgtype'] = stripslashes($_POST['wpNyarukoQRimgtype']);
        @$wpNyarukoOption['wpNyarukoConsoleLog'] = stripslashes($_POST['wpNyarukoConsoleLog']);
        @$wpNyarukoOption['wpNyarukoConsoleLogT'] = stripslashes($_POST['wpNyarukoConsoleLogT']);
        @$wpNyarukoOption['wpNyarukoCommentMode'] = stripslashes($_POST['wpNyarukoCommentMode']);
        @$wpNyarukoOption['wpNyarukoCommentBox'] = stripslashes($_POST['wpNyarukoCommentBox']);
        @$wpNyarukoOption['wpNyarukoHeader'] = stripslashes($_POST['wpNyarukoHeader']);
        @$wpNyarukoOption['wpNyarukoFooter'] = stripslashes($_POST['wpNyarukoFooter']);
        @$wpNyarukoOption['wpNyarukoIndexKeywords'] = stripslashes($_POST['wpNyarukoIndexKeywords']);
        @$wpNyarukoOption['wpNyarukoRSSArticle'] = stripslashes($_POST['wpNyarukoRSSArticle']);
        @$wpNyarukoOption['wpNyarukoRSSComment'] = stripslashes($_POST['wpNyarukoRSSComment']);
        @$wpNyarukoOption['wpNyarukoJQ'] = stripslashes($_POST['wpNyarukoJQ']);
        @$wpNyarukoOption['wpNyarukoJQcookie'] = stripslashes($_POST['wpNyarukoJQcookie']);
        @$wpNyarukoOption['wpNyarukoBScss'] = stripslashes($_POST['wpNyarukoBScss']);
        update_option('wpNyaruko_options', $wpNyarukoOption);
    } else {
        getOptions();
    }
  }
  add_theme_page('wpNyaruko Theme Options','wpNyaruko 主题选项', 'edit_themes', basename(__FILE__),  'display');
}
function display() {
?>
<link rel="stylesheet" href="<?php bloginfo("template_url") ?>/style-admin.css" type="text/css" media="screen" />
<!-- <img id="optionbg" class="optionfull" src="<?php bloginfo("template_url") ?>/nya.jpg" /> -->

<div class="colorpickerbox">
  <div class="colorpickertitle0">
    <div class="colorpickertitle1">wpNyaruko&nbsp;颜色选择器&nbsp;:&nbsp;<span id="colorpickertitleto"></span></div>
    <div class="colorpickertitle2">
      <a href="javascript:colorpickerclose(true);" title="确定">√</a>&nbsp;<a href="javascript:colorpickerclose(false);" title="取消">×</a>
    </div>
  </div>
  <div id="fcp_yashi" class="flexicolorpicker"></div>
  <div class="fcp2_cinfo0">
    <div class="fcp2_cinfo1">&emsp;</div>
    <div class="fcp2_cinfo1">
    红色<br/>绿色<br/>蓝色<br/>色度<br/>饱和<br/>明亮<br/>哈希
    </div>
    <div class="fcp2_cinfo1">&emsp;</div>
    <div class="fcp2_cinfo1">
      <input id="fcp_rgb_r" type="number" value="" /><br/>
      <input id="fcp_rgb_g" type="number" value="" /><br/>
      <input id="fcp_rgb_b" type="number" value="" /><br/>
      <input id="fcp_hsv_h" type="number" value="" /><br/>
      <input id="fcp_hsv_s" type="number" value="" /><br/>
      <input id="fcp_hsv_v" type="number" value="" /><br/>
      <input id="fcp_hex" type="text" value="" size=7 maxlength=7 />
    </div>
  </div>
  <div class="fcp2_sy3">
    <div class="fcp2_sy0">
      <div class="fcp2_sy1">原始颜色</div>
      <div class="fcp2_sy1" id="fcp_color">新的颜色</div>
    </div>
  </div>
</div>

</div><div id="optionbg2" class="optionfull"></div>
<div id="optionbox">
<?php 
  if(isset($_POST['input_save'])) {
    echo '<div id="wpNyarukoInfo">已受理您的变更。</div>';
  }
?>
<h1>wpNyaruko 主题首选项</h1><hr>
<?php
if(!is_admin()) {
  echo '<p>欢迎使用 wpNyaruko 主题，<br/>请使用管理员权限登录来继续设置。</p><hr><p>';
} else {
  $wpNyarukoOption = getOptions();
  //修改设置
?>
<form action="#" method="post" enctype="multipart/form-data" name="op_form" id="op_form">
    <table border="0" cellspacing="0" cellpadding="10">
    <tbody>
    <tr>
      <td>笔记(不呈现)</td>
      <td><input name="wpNyarukoTest" type="text" id="wpNyarukoTest" value="<?php echo(@$wpNyarukoOption['wpNyarukoTest']); ?>" size=64 maxlength=128 /></td>
    </tr>
    <tr>
      <td>正在进行<br/>活动提示</td>
      <td>
      活动标题：<input name="wpNyarukoFNewsTitle" id="wpNyarukoFNewsTitle" type="text" value="" size=55 maxlength=128 /><br/>
      图片网址：<input name="wpNyarukoFNewsImage" id="wpNyarukoFNewsImage" type="text" value="" size=55 maxlength=128 /><br/>
      背景颜色：#<input name="wpNyarukoFNewsColorB" id="wpNyarukoFNewsColorB" class="chcolor" type="text" value="ffcc00" size=6 maxlength=6 alt="背景颜色"  readonly="readonly" />&emsp;
      标题颜色：#<input name="wpNyarukoFNewsColorF" id="wpNyarukoFNewsColorF" class="chcolor" type="text" value="000000" size=6 maxlength=6 alt="标题颜色"  readonly="readonly" />
      </td>
    </tr>
    <tr>
      <td>主页模块<br/>设定</td>
      <td>
      <div id="colmgr_title"><span>
        <!-- wpNyaruko-N 主页模块设定<hr> -->
        <input type="text" id="wpNyarukoIndexModule" name="wpNyarukoIndexModule" onfocus="this.select();" value="<?php echo(@$wpNyarukoOption['wpNyarukoIndexModule']); ?>"/>
    </span></div>
    <div id="colmgr_tb">
        <div class="colmgr_tb_lr cell"></div>
        <div class="colmgr_tb_sel cell">
            <div class="colmgr_tbc">
                <h2>添加模块<hr></h2>
                <?php
                $stypes = ["大图展示","纵向列表","横向图片","空白模块"];
                for ($j=0; $j < count($stypes); $j++) { 
                  $nowstype = $stypes[$j];
                  echo '<div class="colmgr_blo" id="colmgr_blo_'.($j).'" onclick="colmgr_blo_click($(this));">'.$nowstype.'</div><script>colmgr_blo_stypes.push("'.$nowstype.'");</script>';
                }
                ?>
                <hr><h2>设置<hr></h2>
                <p>栏目分类<br/>
                    <select id="colmgr_blo_stype" onchange="colmgr_blo_stypeonchange(this.value);">
                    <?php $categories = get_categories(); 
                    for ($i=0; $i <= count($categories); $i++) {
                        if (!array_key_exists($i,$categories)) {
                            continue;
                        }
                        $nowcategories = $categories[$i];
                        $selected = "";
                        if ($i == 0) {
                          $selected = " selected";
                          echo '<script>colmgr_blo_stype = '.$nowcategories->term_id.';</script>';
                        }
                        if ($nowcategories->term_id && $nowcategories->name) {
                          echo '<option value='.$nowcategories->term_id.$selected.'>'.$nowcategories->term_id.'&nbsp;'.$nowcategories->name.'</option><script>colmgr_blo_names["id'.$nowcategories->term_id.'"]="'.$nowcategories->name.'";</script>';
                        }
                    }
                    ?>
                    </select>
                </p>
                <p><a class="colmgr_abtn" href="edit-tags.php?taxonomy=category" target="_blank">编辑分类</a></p>
                <p>显示文章数量<br/>
                    <select id="colmgr_blo_snum" onchange="colmgr_blo_snumonchange(this.value);">
                    <?php for ($i=1; $i <= 10; $i++) {
                      $selected = "";
                      if ($i == 10) {
                        $selected = " selected";
                      }
                      echo '<option value='.$i.$selected.'>'.$i.' 篇文章</option>';
                    } ?>
                    <!-- <option value=-1 selected>WP默认值</option> -->
                    </select>
                </p>
                <p><button type="button" onclick="colmgr_blo_add();">添加&nbsp;>></button></p>
                <hr>
            </div>
        </div>
        <div class="colmgr_tb_set cell">
            <div class="colmgr_tbc">
                <h2>管理模块<hr></h2>
                <div id="colmgr_nowtb">
                    <p>当前没有模块</p>
                </div>
                <hr><p><button type="button" onclick="colmgr_blnmgr_click(1);">&nbsp;↑&nbsp;上移&nbsp;</button>&emsp;<button type="button" onclick="colmgr_blnmgr_click(2);">&nbsp;×&nbsp;删除&nbsp;</button>&emsp;<button type="button" onclick="colmgr_blnmgr_click(3);">&nbsp;↓&nbsp;下移&nbsp;</button></p>
            <button type="button" onclick="colmgr_blnset_click(1);">&nbsp;导入/导出/编辑&nbsp;主页模块配置代码&nbsp;</button><hr>
        </div>
        </div>
        <div class="colmgr_tb_lr cell"></div>
    </div>
    <!-- <div id="colmgr_title"><hr></div> -->
      </td>
    </tr>
    <tr>
      <td>文章概览</td>
      <td>文章列表中只预览前<input name="wpNyarukoWordlimit" type="text" id="wpNyarukoWordlimit" value="<?php echo(@$wpNyarukoOption['wpNyarukoWordlimit']); ?>" size="3" maxlength="3" />个字，并在后面添加<input name="wpNyarukoWLInfo" type="text" id="wpNyarukoWLInfo" value="<?php echo(@$wpNyarukoOption['wpNyarukoWLInfo']); ?>" size="20" maxlength="20" /></td>
    </tr>
    <tr>
      <td>大图左下角信息</td>
      <td><input name="wpNyarukoTitleFootInfo" type="text" id="wpNyarukoTitleFootInfo" value="<?php echo(@$wpNyarukoOption['wpNyarukoTitleFootInfo']); ?>" size="64" maxlength="512" /></td>
    </tr>
    <tr>
      <td>社交网络用户名</td>
      <td>新浪微博：http://weibo.com/<input name="wpNyarukoSNSWeibo" type="text" id="wpNyarukoSNSWeibo" value="<?php echo(@$wpNyarukoOption['wpNyarukoSNSWeibo']); ?>" size="16" maxlength="16" /><br/>微信公众号链接地址(显示为二维码)：http://weixin.qq.com/q/<input name="wpNyarukoSNSWeChat" type="text" id="wpNyarukoSNSWeChat" value="<?php echo(@$wpNyarukoOption['wpNyarukoSNSWeChat']); ?>" size="16" maxlength="32" /></td>
    </tr>
    <tr>
      <td>主页关键字</td>
      <td><input name="wpNyarukoIndexKeywords" type="text" id="wpNyarukoIndexKeywords" value="<?php echo(@$wpNyarukoOption['wpNyarukoIndexKeywords']); ?>" size="40" maxlength="100" /></td>
    </tr>
    <tr>
      <td>RSS 订阅</td>
      <td><input name="wpNyarukoRSSArticle" type="checkbox" id="wpNyarukoRSSArticle" <?php if(@$wpNyarukoOption['wpNyarukoRSSArticle']!='')echo('checked'); ?> />文章　<input name="wpNyarukoRSSComment" type="checkbox" id="wpNyarukoRSSComment" <?php if(@$wpNyarukoOption['wpNyarukoRSSComment']!='')echo('checked'); ?> />评论</td>
    </tr>
    <tr>
      <td>自定义 jQuery 路径</td>
      <td><input name="wpNyarukoJQ" type="text" id="wpNyarukoJQ" value="<?php echo(@$wpNyarukoOption['wpNyarukoJQ']); ?>" size="40" maxlength="100" /></td>
    </tr>
    <tr>
      <td>自定义 jQuery<br/>cookie 路径</td>
      <td><input name="wpNyarukoJQcookie" type="text" id="wpNyarukoJQcookie" value="<?php echo(@$wpNyarukoOption['wpNyarukoJQcookie']); ?>" size="40" maxlength="100" /></td>
    </tr>
    <tr>
      <td>自定义 Bootstrap<br/>css 路径</td>
      <td><input name="wpNyarukoBScss" type="text" id="wpNyarukoBScss" value="<?php echo(@$wpNyarukoOption['wpNyarukoBScss']); ?>" size="40" maxlength="100" /></td>
    </tr>
    <tr>
      <td>评论方式</td>
      <td><input name="wpNyarukoCommentMode" type="checkbox" id="wpNyarukoCommentMode" <?php if(@$wpNyarukoOption['wpNyarukoCommentMode']!='')echo('checked'); ?> />使用第三方评论系统</td>
    </tr>
    <tr>
      <td>第三方评论<br/>平台加载HTML</td>
      <td><textarea name="wpNyarukoCommentBox" cols="64" rows="5" maxlength="2000" id="wpNyarukoCommentBox"><?php echo(@$wpNyarukoOption['wpNyarukoCommentBox']); ?></textarea></td>
    </tr>
    <tr>
      <td>页头信息HTML<br/>额外加载文件HTML</td>
      <td><textarea name="wpNyarukoHeader" cols="64" rows="10" maxlength="2000" id="wpNyarukoHeader"><?php echo(@$wpNyarukoOption['wpNyarukoHeader']); ?></textarea></td>
    </tr>
    <tr>
      <td>页脚内容HTML<br/>备案号HTML<br/>统计HTML</td>
      <td><textarea name="wpNyarukoFooter" cols="64" rows="10" maxlength="2000" id="wpNyarukoFooter"><?php echo(@$wpNyarukoOption['wpNyarukoFooter']); ?></textarea></td>
    </tr>
    <tr>
      <td>获得当前网<br/>页的二维码</td>
      <td>直接插入以下代码到需要的地方即可（二维码选项见README.md）：<br/><code>&lt;div id="qrview" class="qrview"&gt;&lt;/div&gt;&lt;script type="text/javascript"&gt;qr();&lt;/script&gt;</code><br/>也可以直接使用本主题提供的「当前页面二维码」小工具。</td>
    </tr>
    <tr>
      <td>二维码<br/>默认样式</td>
      <td>
      尺寸：
      <select name="wpNyarukoQRtype">
      <?php 
      $selected = ' selected="selected"';
      $wpNyarukoQRtype = 10;
      if(@$wpNyarukoOption['wpNyarukoQRtype']!='') {
        $wpNyarukoQRtype = (int)($wpNyarukoOption['wpNyarukoQRtype']);
      }
      for ($i=1; $i <= 40; $i++) {
        if ($i != $wpNyarukoQRtype) {
          echo '<option value="'.$i.'">'.$i.'</option>';
        } else {
          echo '<option value="'.$wpNyarukoQRtype.'" selected="selected">'.$wpNyarukoQRtype.'</option>';
        }
      }
      ?>
      </select>
      容错：
      <?php 
      $wpNyarukoQRecorrection = "L";
      if(@$wpNyarukoOption['wpNyarukoQRecorrection']!='') {
        $wpNyarukoQRecorrection = $wpNyarukoOption['wpNyarukoQRecorrection'];
      }
      ?>
      <select name="wpNyarukoQRecorrection">
        <option value="L"<?php if($wpNyarukoQRecorrection=="L") echo $selected; ?>>弱(7%)</option>
        <option value="M"<?php if($wpNyarukoQRecorrection=="M") echo $selected; ?>>标(15%)</option>
        <option value="Q"<?php if($wpNyarukoQRecorrection=="Q") echo $selected; ?>>中(25%)</option>
        <option value="H"<?php if($wpNyarukoQRecorrection=="H") echo $selected; ?>>强(30%)</option>
      </select>
      模式：
      <?php 
      $wpNyarukoQRmode = "Byte";
      if(@$wpNyarukoOption['wpNyarukoQRmode']!='') {
        $wpNyarukoQRmode = $wpNyarukoOption['wpNyarukoQRmode'];
      }
      ?>
      <select name="wpNyarukoQRmode">
        <option value="Numeric"<?php if($wpNyarukoQRmode=="Numeric") echo $selected; ?>>数字</option>
        <option value="Alphanumeric"<?php if($wpNyarukoQRmode=="Alphanumeric") echo $selected; ?>>字母数字</option>
        <option value="Byte"<?php if($wpNyarukoQRmode=="Byte") echo $selected; ?>>字节</option>
        <option value="Kanji"<?php if($wpNyarukoQRmode=="Kanji") echo $selected; ?>>汉字</option>
      </select>
      编码：
      <?php 
      $wpNyarukoQRecode = "UTF-8";
      if(@$wpNyarukoOption['wpNyarukoQRecode']!='') {
        $wpNyarukoQRecode = $wpNyarukoOption['wpNyarukoQRecode'];
      }
      ?>
      <select name="wpNyarukoQRecode">
        <!--<option value="default"<?php if($wpNyarukoQRecode=="default") echo $selected; ?>>默认编码</option>
        <option value="SJIS"<?php if($wpNyarukoQRecode=="SJIS") echo $selected; ?>>日文SJIS</option>-->
        <option value="UTF-8"<?php if($wpNyarukoQRecode=="UTF-8") echo $selected; ?>>通用UTF-8</option>
      </select>
      <br>输出：
      <?php 
      $wpNyarukoQRimgtype = "UTF-8";
      if(@$wpNyarukoOption['wpNyarukoQRimgtype']!='') {
        $wpNyarukoQRimgtype = $wpNyarukoOption['wpNyarukoQRimgtype'];
      }
      ?>
      <select name="wpNyarukoQRimgtype">
        <option value="tab"<?php if($wpNyarukoQRimgtype=="tab") echo $selected; ?>>创建一个填充表格(矢量并且清晰,但不能像图片一样处理)</option>
        <option value="svg"<?php if($wpNyarukoQRimgtype=="svg") echo $selected; ?>>SVG图形(矢量并且清晰,可像图片一样处理,但不是所有浏览器都支持)</option>
        <option value="img"<?php if($wpNyarukoQRimgtype=="img") echo $selected; ?>>标准图片(生成一张标准的图片,兼容性最佳,可以图片另存为等操作)</option>
      </select>
      </td>
    </tr>
    <tr>
      <td>在控制台输<br/>出一段内容</td>
      <td><input name="wpNyarukoConsoleLog" type="text" id="wpNyarukoConsoleLog" value="<?php echo(@$wpNyarukoOption['wpNyarukoConsoleLog']); ?>" size="64" maxlength="512" /><br/><input name="wpNyarukoConsoleLogT" type="checkbox" id="wpNyarukoConsoleLogT" <?php if(@$wpNyarukoOption['wpNyarukoConsoleLogT']!='')echo('checked'); ?> />在输出的信息后面加入页面执行时间</td>
    </tr>
    <tr>
      <td>阻止不兼<br/>容浏览器</td>
      <td>如果主题认为当前浏览器是不兼容的,则转到以下网页：（留空则不阻止）<br/><input name="wpNyarukoBanBrowser" type="text" id="wpNyarukoBanBrowser" value="<?php echo(@$wpNyarukoOption['wpNyarukoBanBrowser']); ?>" size="64" maxlength="512" /></td>
    </tr>
    <tr>
      <td>PHP调试</td>
      <td><input name="wpNyarukoPHPDebug" type="checkbox" id="wpNyarukoPHPDebug" <?php if(@$wpNyarukoOption['wpNyarukoPHPDebug']!='')echo('checked'); ?> />显示所有PHP警告和错误(display_errors,E_ALL),不建议在生产环境使用</td>
    </tr>
    </tbody>
    </table>
    <hr><p><input id="submitoption" type="submit" name="input_save" value="应用这些设定" />　<a href="themes.php?page=theme-options.php&reset">恢复初始设定</a>　<?php } ?><a title="开源是一种态度" target="_blank" href="https://github.com/kagurazakayashi/wpNyaruko-N" target="_blank">Github</a></p></form><p><br/></p>
</div>
<?php
}
add_action('admin_menu', 'init');
?>