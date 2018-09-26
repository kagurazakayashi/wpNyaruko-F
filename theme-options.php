<?php 
include("KagurazakaYashi.php");
function loadjs() {
  echo '<link rel="stylesheet" href="'.get_bloginfo("template_url").'/style-admin.css" type="text/css" media="screen" />';
  echo '<script type="text/javascript" src="/resources/jquery.min.js"></script>';
  echo '<script type="text/javascript" src="'.get_bloginfo("template_url").'/lib/colorpicker.min.js"></script>';
  echo '<script type="text/javascript" src="'.get_bloginfo("template_url").'/theme-options.js"></script>';
}
function getOptions() {
  $wpNyarukoOption = get_option('wpNyaruko_options');
  if ($_SERVER['PHP_SELF'] == "/wp-admin/index.php" && !isset($_GET["nowpnyaruko"])) {
    echo "<script>var showwpnyarukooptions2 = true;</script>";
    loadjs();
    // include "theme-options2.php";
  } else if (strpos($_SERVER['QUERY_STRING'],'theme-options.php')) {
    loadjs();
    //读取设置
    if (!is_array($wpNyarukoOption)) {
        $wpNyarukoOption['wpNyarukoTest'] = '此处可以任意填写一些笔记';
        $wpNyarukoOption['wpNyarukoPHPDebug'] = '';
        $wpNyarukoOption['wpNyarukoBanBrowser'] = '';
        $wpNyarukoOption['wpNyarukoWordlimit'] = '300';
        $wpNyarukoOption['wpNyarukoWLInfo'] = ' ... [阅读全文]';
        $wpNyarukoOption['wpNyarukoIndexModule'] = '';
        $wpNyarukoOption['wpNyarukoIndexModuleM'] = '';
        $wpNyarukoOption['wpNyarukoQRtype'] = 10;
        $wpNyarukoOption['wpNyarukoQRecorrection'] = 'L';
        $wpNyarukoOption['wpNyarukoQRmode'] = 'Byte';
        $wpNyarukoOption['wpNyarukoQRecode'] = 'UTF-8';
        $wpNyarukoOption['wpNyarukoQRimgtype'] = 'img';
        $wpNyarukoOption['wpNyarukoSNSWeibo'] = '';
        $wpNyarukoOption['wpNyarukoSNSWeChat'] = '';
        $wpNyarukoOption['wpNyarukoConsoleLog'] = '';
        $wpNyarukoOption['wpNyarukoConsoleLogT'] = '';
        $wpNyarukoOption['wpNyarukoCommentMode'] = '';
        $wpNyarukoOption['wpNyarukoCommentBox'] = '';
        $wpNyarukoOption['wpNyarukoHeader'] = '';
        $wpNyarukoOption['wpNyarukoFooter'] = '<b>版权所有 © </b><br/><a rel="external" title="WordPress主页" class="link" href="http://wordpress.org/" target="_blank">WordPress</a> <a title="访问主题主页" class="link" href="https://github.com/kagurazakayashi/wpNyaruko-F" target="_blank">Theme: wpNyaruko-F</a>｜<a class="float right" href="#">页首</a><br/><a href="#" target="_blank" title="如果您对我们的内容有疑问，请点击这里联系我们。">联系我们</a>｜<a href="http://www.miitbeian.gov.cn/" target="_blank" title="如果您对我们的内容有疑问，请先进入「联系我们」栏目解决。">京ICP备XXXXXXXX号</a>';
        $wpNyarukoOption['wpNyarukoIndexKeywords'] = '';
        $wpNyarukoOption['wpNyarukoRSSArticle'] = 'on';
        $wpNyarukoOption['wpNyarukoRSSComment'] = '';
        $wpNyarukoOption['wpNyarukoJQ'] = 'resources/jquery.min.js';
        $wpNyarukoOption['wpNyarukoJQcookie'] = 'resources/jquery.cookie.js';
        $wpNyarukoOption['wpNyarukoBScss'] = 'resources/bootstrap.min.css';
        $wpNyarukoOption['wpNyarukoFNewsTitle'] = '我们正在举办活动 >>>';
        $wpNyarukoOption['wpNyarukoFNewsImage'] = '';
        $wpNyarukoOption['wpNyarukoFNewsImageB'] = '';
        $wpNyarukoOption['wpNyarukoFNewsColorB'] = 'ffcc00';
        $wpNyarukoOption['wpNyarukoFNewsColorF'] = '000000';
        $wpNyarukoOption['wpNyarukoFNewsLink'] = '';
        $wpNyarukoOption['wpNyarukoFNewsLinkN'] = 'on';
        $wpNyarukoOption['wpNyarukoFLinkN'] = '';
        $wpNyarukoOption['wpNyarukoFLinkNM'] = '';
        $wpNyarukoOption['wpNyarukoLogo'] = '';
        $wpNyarukoOption['wpNyarukoPlayerAutoMiniSize'] = '';
        $wpNyarukoOption['wpNyarukoPlayerAutoMiniSizeU'] = '';
        $wpNyarukoOption['wpNyarukoPlayerAutoMiniSizeA'] = 'on';
        $wpNyarukoOption['wpNyarukoPlayerAutoStop'] = '';
        $wpNyarukoOption['wpNyarukoPlayerAutoRemove'] = '';
        $wpNyarukoOption['wpNyarukoBigPicTitleAutoSize'] = 'on';
        $wpNyarukoOption['wpNyarukoBigPicTitleAutoSizeF'] = '10';
        $wpNyarukoOption['wpNyarukoBigPicTitleAutoSizeT'] = '32';
        $wpNyarukoOption['wpNyarukoPageParagraph'] = '50';
        $wpNyarukoPageT = ["Size","Color","Line"];
        for ($i=0; $i < 8; $i++) {
            foreach ($wpNyarukoPageT as $wpNyarukoPageTv) {
                $tv = "";
                if ($wpNyarukoPageTv == "Size") {
                    if ($i == 0) {
                        $tv = 12;
                    } else {
                        $tv = 23 - $i;
                    }
                } else if ($wpNyarukoPageTv == "Color") {
                    $tv = "#000000";
                } else if ($wpNyarukoPageTv == "Line") {
                    $tv = 25;
                }
                $wpNyarukoOption[("wpNyarukoPageH".$i."Font".$wpNyarukoPageTv)] = $tv;
            }
        }
        $wpNyarukoOption['wpNyarukoPageIndent'] = '40';
        $wpNyarukoOption['wpNyarukoTableOverflowW'] = 'on';
        $wpNyarukoOption['wpNyarukoTableOverflowF'] = 'on';
        $wpNyarukoOption['wpNyarukoTableOverflowS'] = '';
        for ($i=0; $i < 4; $i++) {
            $wpNyarukoOption[("wpNyarukoDeduplication".$i)] = '';
            $wpNyarukoOption[("wpNyarukoDeduplication".$i."M")] = '';
        }
        $wpNyarukoOption['wpNyarukoFonts'] = '';
        $wpNyarukoOption['wpNyarukoFontsF'] = 'on';
        update_option('wpNyaruko_options', $wpNyarukoOption);
        die('<div id="wpNyarukoInfo" style="text-align: center; width: 100%; height: 25px; line-height: 25px; border-radius: 0px 0px 5px 5px; overflow: hidden; background-color: yellow; box-shadow: 0px 0px 5px gray; font-size: 12px;">欢迎使用 wpNyaruko 主题，请先完成初始设定。<a href="themes.php?page=theme-options.php">现在开始</a></div>');
    }
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
        $options = ["wpNyarukoTest","wpNyarukoBanBrowser","wpNyarukoPHPDebug","wpNyarukoWordlimit","wpNyarukoWLInfo","wpNyarukoIndexModule","wpNyarukoIndexModuleM","wpNyarukoSNSWeibo","wpNyarukoSNSWeChat","wpNyarukoQRtype","wpNyarukoQRecorrection","wpNyarukoQRmode","wpNyarukoQRecode","wpNyarukoQRimgtype","wpNyarukoConsoleLog","wpNyarukoConsoleLogT","wpNyarukoCommentMode","wpNyarukoCommentBox","wpNyarukoHeader","wpNyarukoFooter","wpNyarukoIndexKeywords","wpNyarukoRSSArticle","wpNyarukoRSSComment","wpNyarukoJQ","wpNyarukoJQcookie","wpNyarukoBScss","wpNyarukoFNewsTitle","wpNyarukoFNewsImage","wpNyarukoFNewsImageB","wpNyarukoFNewsColorB","wpNyarukoFNewsColorF","wpNyarukoFNewsLink","wpNyarukoFNewsLinkN","wpNyarukoFLinkN","wpNyarukoFLinkNM","wpNyarukoLogo","wpNyarukoPlayerAutoMiniSize","wpNyarukoPlayerAutoMiniSizeU","wpNyarukoPlayerAutoMiniSizeA","wpNyarukoPlayerAutoStop","wpNyarukoPlayerAutoRemove","wpNyarukoBigPicTitleAutoSize","wpNyarukoBigPicTitleAutoSizeF","wpNyarukoBigPicTitleAutoSizeT","wpNyarukoPageIndent","wpNyarukoPageImgWidth","wpNyarukoPageImgWidthM","wpNyarukoFonts","wpNyarukoFontsF","wpNyarukoPageParagraph","wpNyarukoTableOverflowW","wpNyarukoTableOverflowS","wpNyarukoTableOverflowF"];
        $wpNyarukoPageT = ["Size","Color","Line"];
        for ($i=0; $i < 8; $i++) {
            foreach ($wpNyarukoPageT as $wpNyarukoPageTv) {
                array_push($options,("wpNyarukoPageH".$i."Font".$wpNyarukoPageTv));
            }
        }
        for ($i=0; $i < 4; $i++) {
            array_push($options,("wpNyarukoDeduplication".$i));
            array_push($options,("wpNyarukoDeduplication".$i."M"));
        }
        foreach ($options as $value) {
            @$wpNyarukoOption[$value] = stripslashes($_POST[$value]);
        }
        update_option('wpNyaruko_options', $wpNyarukoOption);
    } else {
        getOptions();
    }
  }
  add_theme_page('wpNyaruko Theme Options','wpNyaruko 主题选项', 'edit_themes', basename(__FILE__),  'display');
}
function display() {
?>
<!-- <img id="optionbg" class="optionfull" src="<?php bloginfo("template_url") ?>/nya.jpg" /> -->

<div class="colorpickerbox wpnyarukodiglog">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td colspan="2" align="left"><div class="colorpickertitle1" tid=0 ><div class="wp-menu-image dashicons dashicons-admin-appearance colorpickericon"></div>&nbsp;wpNyaruko&nbsp;颜色选择器&nbsp;:&nbsp;<span id="colorpickertitleto"></span></div></td>
      <td align="right" class="colorpickerwincol"><a href="javascript:colorpickerclose(true);" title="确定" id="colorpickerwinyes">○</a>&nbsp;<a href="javascript:colorpickerclose(false);" title="取消" id="colorpickerwinno">×</a></td>
    </tr>
    <tr>
      <td colspan="3" align="left"><hr class="colorpickertitlehr"></td>
    </tr>
    <tr>
      <td width="240" height="200" rowspan="8" align="left" valign="middle">
        <div id="fcp_yashi" class="flexicolorpicker"></div>
      </td>
      <td width="50" align="center">红色</td>
      <td><input id="fcp_rgb_r" type="number" value="" /><br/></td>
    </tr>
    <tr>
      <td align="center">绿色</td>
      <td><input id="fcp_rgb_g" type="number" value="" /><br/></td>
    </tr>
    <tr>
      <td align="center">蓝色</td>
      <td><input id="fcp_rgb_b" type="number" value="" /><br/></td>
    </tr>
    <tr>
      <td colspan="2"><hr></td>
    </tr>
    <tr>
      <td align="center">色度</td>
      <td><input id="fcp_hsv_h" type="number" value="" /><br/></td>
    </tr>
    <tr>
      <td align="center">饱和</td>
      <td><input id="fcp_hsv_s" type="number" value="" /><br/></td>
    </tr>
    <tr>
      <td align="center">明亮</td>
      <td><input id="fcp_hsv_v" type="number" value="" /><br/></td>
    </tr>
    <tr>
      <td colspan="2"><hr></td>
    </tr>
    <tr>
      <td valign="middle"><div class="fcp2_sy1">原始颜色</div><div class="fcp2_sy1" id="fcp_color">新的颜色</div></td>
      <td align="center">哈希</td>
      <td><input id="fcp_hex" type="text" value="" size=7 maxlength=7 /></td>
    </tr>
  </tbody>
</table>
</div>

<div class="picturepickerbox wpnyarukodiglog">
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
    <td colspan="3" align="left"><div class="colorpickertitle1" tid=1 ><div class="wp-menu-image dashicons dashicons-admin-media colorpickericon"></div>&nbsp;wpNyaruko&nbsp;图片选择器&nbsp;:&nbsp;<span id="picturepickertitleto"></span></div></td>
      <td align="right" class="colorpickerwincol"><a href="javascript:picturepickerclose(true);" title="确定" id="colorpickerwinyes">○</a>&nbsp;<a href="javascript:picturepickerclose(false);" title="取消" id="colorpickerwinno">×</a></td>
    </tr>
    <tr>
      <td colspan="4"><hr class="colorpickertitlehr"></td>
    </tr>
    <tr>
      <td width="25%" align="center" valign="middle" class="picturepickerbtn" onclick="picturepickerbtnclick(0);"><div class="wp-menu-image dashicons dashicons-admin-page colorpickericon"></div>&nbsp;上传</td>
      <td width="25%" align="center" valign="middle" class="picturepickerbtn" onclick="picturepickerbtnclick(1);"><div class="wp-menu-image dashicons dashicons-admin-plugins colorpickericon"></div>&nbsp;外链</td>
      <td width="25%" align="center" valign="middle" class="picturepickerbtn" onclick="picturepickerbtnclick(2);"><div class="wp-menu-image dashicons dashicons-admin-media colorpickericon"></div>&nbsp;图库</td>
      <td width="25%" align="center" valign="middle" class="picturepickerbtn" onclick="picturepickerbtnclick(3);"><div class="wp-menu-image dashicons dashicons-admin-tools colorpickericon"></div>&nbsp;清除</td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="middle"><img class="picturepickerpic" src="" /></td>
    </tr>
    <tr>
      <td colspan="4" align="center" valign="middle"><iframe class="picturepickeriframe" src="">不支持的浏览器</iframe></td>
    </tr>
  </tbody>
</table>
</div>

<div id="optionbg2" class="optionfull"></div>
<div id="optionbox">
<?php 
  if(isset($_POST['input_save'])) {
    echo '<div id="wpNyarukoInfo">已受理您的变更。</div>';
  }
?>
<div id="wpNyarukoOptionTitle"><a title="版本升级日志" class="link" href="https://github.com/kagurazakayashi/wpNyaruko-F/commits/master" target="_blank"><div id="wpNyarukoPanelLogo"></div></a>&nbsp;设置中心（版本&nbsp;<?php include "version.php"; ?>）</div><hr>
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
        活动标题：<input name="wpNyarukoFNewsTitle" id="wpNyarukoFNewsTitle" type="text" value="<?php echo(@$wpNyarukoOption['wpNyarukoFNewsTitle']); ?>" size=55 maxlength=128 alt="活动标题" /><br/>
        若要关闭主页上的此提示信息,请清空活动标题。<br/>
        小图网址：<input name="wpNyarukoFNewsImage" id="wpNyarukoFNewsImage" class="chpicture" type="text" value="<?php echo(@$wpNyarukoOption['wpNyarukoFNewsImage']); ?>" size=55 maxlength=128 alt="小图网址" /><br/>
        大图网址：<input name="wpNyarukoFNewsImageB" id="wpNyarukoFNewsImageB" class="chpicture" type="text" value="<?php echo(@$wpNyarukoOption['wpNyarukoFNewsImageB']); ?>" size=55 maxlength=128 alt="大图网址" /><br/>
        链接网址：<input name="wpNyarukoFNewsLink" id="wpNyarukoFNewsLink" type="text" value="<?php echo(@$wpNyarukoOption['wpNyarukoFNewsLink']); ?>" size=55 maxlength=128 /><br/>
        背景颜色：#<input name="wpNyarukoFNewsColorB" id="wpNyarukoFNewsColorB" class="chcolor" type="text" value="<?php echo(@$wpNyarukoOption['wpNyarukoFNewsColorB']); ?>" size=6 maxlength=6 alt="背景颜色" readonly="readonly" />&emsp;
        标题颜色：#<input name="wpNyarukoFNewsColorF" id="wpNyarukoFNewsColorF" class="chcolor" type="text" value="<?php echo(@$wpNyarukoOption['wpNyarukoFNewsColorF']); ?>" size=6 maxlength=6 alt="标题颜色" readonly="readonly" />&emsp;
        点击时：<input name="wpNyarukoFNewsLinkN" type="checkbox" id="wpNyarukoFNewsLinkN" <?php if(@$wpNyarukoOption['wpNyarukoFNewsLinkN']!='')echo('checked'); ?> />在新标签页中打开
        </td>
    </tr>
    <tr>
      <td>链接行为</td>
      <td>文章入口链接都在新标签页中打开：<input name="wpNyarukoFLinkN" type="checkbox" id="wpNyarukoFLinkN" <?php if(@$wpNyarukoOption['wpNyarukoFLinkN']!='')echo('checked'); ?> />电脑&emsp;<input name="wpNyarukoFLinkNM" type="checkbox" id="wpNyarukoFLinkNM" <?php if(@$wpNyarukoOption['wpNyarukoFLinkNM']!='')echo('checked'); ?> />手机<br/>（一些浏览器可能会在新窗口打开，或者触发弹出窗口拦截程序。<br/>所有菜单项的打开方式在WP菜单设置中单独修改）</td>
    </tr>
    <tr>
        <td>正文版式</td>
        <td align="center"><table width="400" border="0" cellspacing="10" cellpadding="0">
        <tbody>
            <tr>
            <th>文章元素</th>
            <th>文字字号</th>
            <th>文字颜色</th>
            <th>行距</th>
            </tr>
            <?php $wpNyarukoPageSetTitle = ["正文","一级标题","二级标题","三级标题","四级标题","五级标题","六级标题","英文正文"];
            for ($i=0; $i < count($wpNyarukoPageSetTitle); $i++) {
                $sname = "wpNyarukoPageH".$i."Font";
                ?>
                <tr>
                <th><?php echo $wpNyarukoPageSetTitle[$i]; ?></th>
                <td align="center"><input name="<?php echo $sname; ?>Size" type="text" id="<?php echo $sname; ?>Size" value="<?php echo(@$wpNyarukoOption[$sname.'Size']); ?>" size="2" maxlength="2" />码</td>
                <td align="center">#<input name="<?php echo $sname; ?>Color" id="<?php echo $sname; ?>Color" class="chcolor" type="text" value="<?php echo(@$wpNyarukoOption[$sname.'Color']); ?>" size=6 maxlength=6 alt="<?php echo $wpNyarukoPageSetTitle[$i]; ?>颜色" readonly="readonly" /></td>
                <td align="center"><input name="<?php echo $sname; ?>Line" type="text" id="<?php echo $sname; ?>Line" value="<?php echo(@$wpNyarukoOption[$sname.'Line']); ?>" size="2" maxlength="2" />像素</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        </table>
        正文段落间距：<input name="wpNyarukoPageParagraph" type="text" id="<?php echo $sname; ?>Line" value="<?php echo(@$wpNyarukoOption['wpNyarukoPageParagraph']); ?>" size="2" maxlength="2" />像素<br/>每个自然段前自动添加<input name="wpNyarukoPageIndent" type="text" id="wpNyarukoPageIndent" value="<?php echo(@$wpNyarukoOption['wpNyarukoPageIndent']); ?>" size="2" maxlength="2" />像素的空格<br/>文章中的图片宽度为正文宽度的百分之<input name="wpNyarukoPageImgWidth" type="text" id="wpNyarukoPageImgWidth" value="<?php echo(@$wpNyarukoOption['wpNyarukoPageImgWidth']); ?>" size="3" maxlength="3" />(电脑版) 和 百分之<input name="wpNyarukoPageImgWidthM" type="text" id="wpNyarukoPageImgWidthM" value="<?php echo(@$wpNyarukoOption['wpNyarukoPageImgWidthM']); ?>" size="3" maxlength="3" />(手机版)
    </td>
    </tr>
    <tr>
        <td>表格排版</td>
        <td>
        将表格宽度跟随页面宽度而变化：<input name="wpNyarukoTableOverflowW" type="checkbox" id="wpNyarukoTableOverflowW" <?php if(@$wpNyarukoOption['wpNyarukoTableOverflowW']!='')echo('checked'); ?> />电脑&emsp;<input name="wpNyarukoTableOverflowF" type="checkbox" id="wpNyarukoTableOverflowF" <?php if(@$wpNyarukoOption['wpNyarukoTableOverflowF']!='')echo('checked'); ?> />手机<br/>
        或者：<input name="wpNyarukoTableOverflowS" type="checkbox" id="wpNyarukoTableOverflowS" <?php if(@$wpNyarukoOption['wpNyarukoTableOverflowS']!='')echo('checked'); ?> />添加横向滚动条，使表格支持横向拖动。
        </td>
    </tr>
    <tr>
        <td>字体</td>
        <td><table border="0" cellspacing="0" cellpadding="0">
        <tbody>
            <tr>
            <td width="200px"><textarea name="wpNyarukoFonts" cols="20" rows="14" maxlength="2000" id="wpNyarukoFonts"><?php echo(@$wpNyarukoOption['wpNyarukoFonts']); ?></textarea></td>
            <td width="300px"><ul>
            <li><input name="wpNyarukoFontsF" type="checkbox" id="wpNyarukoFontsF" <?php if(@$wpNyarukoOption['wpNyarukoFontsF']!='')echo('checked'); ?> />将字体设置应用于本网站页面中所有文字，而不是只有文章中的文字。</li>
            <li>-&nbsp;输入字体名称，每个字体名称一行（使用换行作为分隔符），不用加引号。</li>
            <li>-&nbsp;建议输入多个字体，如果用户电脑中没有第一个字体，则会尝试使用第二个，以此类推。</li>
            <li>-&nbsp;留空将使用默认值：</li>
            <li>思源黑体,Source Han Sans,苹方黑体,PingFang SC,冬青黑体,Hiragino Sans GB,微软雅黑,Microsoft YaHei,Hiragino Sans GB,STHeiti Light,SimHei,serif,sans-serif,cursive,fantasy,monospace</li>
            </ul></td>
            </tr>
        </tbody>
        </table></td>
    </tr>
    <tr>
        <td>主页模块设定<br/><p>
          <label>
            <input type="radio" name="wpNyarukoIndexModuleO" value="wpNyarukoIndexModuleOP" id="wpNyarukoIndexModuleOP" checked="checked" onchange="colmgr_pcmobileradio(1);">
            电脑版</label>
          <br>
          <label>
            <input type="radio" name="wpNyarukoIndexModuleO" value="wpNyarukoIndexModuleOM" id="wpNyarukoIndexModuleOM" onchange="colmgr_pcmobileradio(2);">
            手机版</label>
          <br>
        </p></td>
        <td>
        <div id="colmgr_title"><span>
        <input type="text" class="wpNyarukoIndexModule" id="wpNyarukoIndexModule" name="wpNyarukoIndexModule" onfocus="this.select();" value="<?php echo(@$wpNyarukoOption['wpNyarukoIndexModule']); ?>"/>
        <input type="text" class="wpNyarukoIndexModule" id="wpNyarukoIndexModuleM" name="wpNyarukoIndexModuleM" onfocus="this.select();" value="<?php echo(@$wpNyarukoOption['wpNyarukoIndexModuleM']); ?>"/>
        </span></div>
    <div id="colmgr_tb">
        <div class="colmgr_tb_lr cell"></div>
        <div class="colmgr_tb_sel cell">
            <div class="colmgr_tbc">
                <h2>添加模块<hr></h2>
                <?php
                $stypes = ["大图展示","纵向列表","横向图片","块状列表","空白模块"];
                for ($j=0; $j < count($stypes); $j++) { 
                  $nowstype = $stypes[$j];
                  echo '<div class="colmgr_blo racing_itembg" id="colmgr_blo_'.($j).'" onclick="colmgr_blo_click($(this));">'.$nowstype.'</div><script>colmgr_blo_stypes.push("'.$nowstype.'");</script>';
                }
                ?>
                <hr><h2>设置<hr></h2>
                <p>栏目分类<br/>(不含id>1000和空分类)<br/>
                    <select id="colmgr_blo_stype" onchange="colmgr_blo_stypeonchange(this.value);">
                    <?php $categories = get_categories();
                    $categoriesi = 0;
                    for ($i=0; $i <= count($categories); $i++) {
                      $ni = $i+$categoriesi;
                        if (!array_key_exists($ni,$categories)) {
                          $i--;
                          $categoriesi++;
                          if ($categoriesi > 1000) break;
                          continue;
                        }
                        $nowcategories = $categories[$ni];
                        $selected = "";
                        $nowcategoriesid = $nowcategories->term_id;
                        if (!$nowcategoriesid) {
                          $nowcategoriesid = "0";
                        }
                        $nowcategoriesname = $nowcategories->name;
                        if (!$nowcategoriesname) {
                          $nowcategoriesname = "无效分类";
                        }
                        if ($i == 0) {
                          $selected = " selected";
                          echo '<script>colmgr_blo_stype = '.$nowcategoriesid.';</script>';
                        }
                        // if ($nowcategories->term_id && $nowcategories->name) {
                          echo '<option value='.$nowcategoriesid.$selected.'>'.$nowcategoriesid.'&nbsp;'.$nowcategoriesname.'</option><script>colmgr_blo_names["id'.$nowcategoriesid.'"]="'.$nowcategoriesname.'";</script>';
                        // }
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
                <h2 id="colmgr_tbch">管理电脑版模块<hr></h2>
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
      <td>标题图片</td>
      <td><input name="wpNyarukoLogo" id="wpNyarukoLogo" class="chpicture" type="text" value="<?php echo(@$wpNyarukoOption['wpNyarukoLogo']); ?>" size=64 maxlength=128 alt="标题图片" /><br>点击可以返回网站主页。如果留空，将显示网站名称。建议使用高度为60像素的图片。</td>
    </tr>
    <tr>
      <td>首页的动<br/>画头图播<br/>放完第一<br/>遍之后执<br/>行的操作</td>
      <td><input name="wpNyarukoPlayerAutoMiniSize" type="checkbox" id="wpNyarukoPlayerAutoMiniSize" <?php if(@$wpNyarukoOption['wpNyarukoPlayerAutoMiniSize']!='')echo('checked'); ?> />首页的动画头图区自动缩小高度到一半<br/>&emsp;<input name="wpNyarukoPlayerAutoMiniSizeU" type="checkbox" id="wpNyarukoPlayerAutoMiniSizeU" <?php if(@$wpNyarukoOption['wpNyarukoPlayerAutoMiniSizeU']!='')echo('checked'); ?> />如果用户已经向下划离动画头图区域则不缩小<br/><input name="wpNyarukoPlayerAutoStop" type="checkbox" id="wpNyarukoPlayerAutoStop" <?php if(@$wpNyarukoOption['wpNyarukoPlayerAutoStop']!='')echo('checked'); ?> />停止播放动画<br/>&emsp;<input name="wpNyarukoPlayerAutoRemove" type="checkbox" id="wpNyarukoPlayerAutoRemove" <?php if(@$wpNyarukoOption['wpNyarukoPlayerAutoRemove']!='')echo('checked'); ?> />卸载 NyarukoPlayer<br/><input name="wpNyarukoPlayerAutoMiniSizeA" type="checkbox" id="wpNyarukoPlayerAutoMiniSizeA" <?php if(@$wpNyarukoOption['wpNyarukoPlayerAutoMiniSizeA']!='')echo('checked'); ?> />缩小或卸载 NyarukoPlayer 时使用动画过渡</td>
    </tr>
    <tr>
      <td>大图展示<br/>模块设置</td>
      <td><input name="wpNyarukoBigPicTitleAutoSize" type="checkbox" id="wpNyarukoBigPicTitleAutoSize" <?php if(@$wpNyarukoOption['wpNyarukoBigPicTitleAutoSize']!='')echo('checked'); ?> />当大图中间的标题文字容纳不下时，将文字缩小而不是自动换行<br/>&emsp;文字尺寸应在&nbsp;<input name="wpNyarukoBigPicTitleAutoSizeF" type="text" id="wpNyarukoBigPicTitleAutoSizeF" value="<?php echo(@$wpNyarukoOption['wpNyarukoBigPicTitleAutoSizeF']); ?>" size="4" maxlength="4" />像素&nbsp;到&nbsp;<input name="wpNyarukoBigPicTitleAutoSizeT" type="text" id="wpNyarukoBigPicTitleAutoSizeT" value="<?php echo(@$wpNyarukoOption['wpNyarukoBigPicTitleAutoSizeT']); ?>" size="4" maxlength="4" />像素&nbsp;之间</td>
    </tr>
    <tr>
      <td>文章概览</td>
      <td>文章列表中只预览前<input name="wpNyarukoWordlimit" type="text" id="wpNyarukoWordlimit" value="<?php echo(@$wpNyarukoOption['wpNyarukoWordlimit']); ?>" size="3" maxlength="3" />个字，并在后面添加<input name="wpNyarukoWLInfo" type="text" id="wpNyarukoWLInfo" value="<?php echo(@$wpNyarukoOption['wpNyarukoWLInfo']); ?>" size="20" maxlength="20" /></td>
    </tr>
    <tr>
      <td>主页内容<br/>智能去重</td>
      <td><input name="wpNyarukoDeduplication0" type="checkbox" id="wpNyarukoDeduplication0" <?php if(@$wpNyarukoOption['wpNyarukoDeduplication0']!='')echo('checked'); ?> />对主页中重复列出的文章，从上而下进行去重过滤。<br/>&emsp;过滤来源于以下模块：<br/>&emsp;&emsp;<input name="wpNyarukoDeduplication1M" type="checkbox" id="wpNyarukoDeduplication1M" <?php if(@$wpNyarukoOption['wpNyarukoDeduplication1M']!='')echo('checked'); ?> />大图展示&emsp;<input name="wpNyarukoDeduplication2M" type="checkbox" id="wpNyarukoDeduplication2M" <?php if(@$wpNyarukoOption['wpNyarukoDeduplication2M']!='')echo('checked'); ?> />纵向列表&emsp;<input name="wpNyarukoDeduplication3M" type="checkbox" id="wpNyarukoDeduplication3M" <?php if(@$wpNyarukoOption['wpNyarukoDeduplication3M']!='')echo('checked'); ?> />横向图片<br/>&emsp;过滤应用于以下模块：<br/>&emsp;&emsp;<input name="wpNyarukoDeduplication1" type="checkbox" id="wpNyarukoDeduplication1" <?php if(@$wpNyarukoOption['wpNyarukoDeduplication1']!='')echo('checked'); ?> />大图展示&emsp;<input name="wpNyarukoDeduplication2" type="checkbox" id="wpNyarukoDeduplication2" <?php if(@$wpNyarukoOption['wpNyarukoDeduplication2']!='')echo('checked'); ?> />纵向列表&emsp;<input name="wpNyarukoDeduplication3" type="checkbox" id="wpNyarukoDeduplication3" <?php if(@$wpNyarukoOption['wpNyarukoDeduplication3']!='')echo('checked'); ?> />横向图片</td>
    </tr>
    <tr>
      <td>社交网络用户名</td>
      <td>新浪微博：<input name="wpNyarukoSNSWeibo" type="text" id="wpNyarukoSNSWeibo" value="<?php echo(@$wpNyarukoOption['wpNyarukoSNSWeibo']); ?>" size="50" maxlength="128" /><br/>微信公众号：<input name="wpNyarukoSNSWeChat" type="text" id="wpNyarukoSNSWeChat" value="<?php echo(@$wpNyarukoOption['wpNyarukoSNSWeChat']); ?>" size="50" maxlength="128" /></td>
    </tr>
    <tr>
      <td>主页关键字</td>
      <td><input name="wpNyarukoIndexKeywords" type="text" id="wpNyarukoIndexKeywords" value="<?php echo(@$wpNyarukoOption['wpNyarukoIndexKeywords']); ?>" size="40" maxlength="100" /></td>
    </tr>
    <tr>
      <td>RSS 订阅</td>
      <td><input name="wpNyarukoRSSArticle" type="checkbox" id="wpNyarukoRSSArticle" <?php if(@$wpNyarukoOption['wpNyarukoRSSArticle']!='')echo('checked'); ?> />文章&emsp;<input name="wpNyarukoRSSComment" type="checkbox" id="wpNyarukoRSSComment" <?php if(@$wpNyarukoOption['wpNyarukoRSSComment']!='')echo('checked'); ?> />评论</td>
    </tr>
    <tr>
      <td>自定义 jQuery 路径</td>
      <td><input name="wpNyarukoJQ" type="text" id="wpNyarukoJQ" value="<?php echo(@$wpNyarukoOption['wpNyarukoJQ']); ?>" size="64" maxlength="100" /></td>
    </tr>
    <tr>
      <td>自定义 jQuery<br/>cookie 路径</td>
      <td><input name="wpNyarukoJQcookie" type="text" id="wpNyarukoJQcookie" value="<?php echo(@$wpNyarukoOption['wpNyarukoJQcookie']); ?>" size="64" maxlength="100" /></td>
    </tr>
    <tr>
      <td>自定义 Bootstrap<br/>css 路径(将弃用)</td>
      <td><input name="wpNyarukoBScss" type="text" id="wpNyarukoBScss" value="<?php echo(@$wpNyarukoOption['wpNyarukoBScss']); ?>" size="64" maxlength="100" /></td>
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
    <hr>
    <p><input id="submitoption" type="submit" name="input_save" value="应用这些设定" />&emsp;<a href="themes.php?page=theme-options.php?reset">恢复初始设定</a>&emsp;<?php } 
    //echo '<a title="开源是一种态度" target="_blank" href="https://github.com/kagurazakayashi/wpNyaruko-F" target="_blank">Github</a>';
    ?>
    </p></form><p><br/></p>
</div>
<?php
}
add_action('admin_menu', 'init');
?>