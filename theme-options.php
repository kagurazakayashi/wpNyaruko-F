<?php 
function getOptions() {
    $wpNyarukoOption = get_option('wpNyaruko_options'); //SELECT * FROM `cxc_options` WHERE `option_name` = 'wpNyaruko_options'
    echo '<script type="text/javascript" src="/resources/jquery.min.js"></script><script type="text/javascript" src="'.get_bloginfo("template_url").'/theme-options.js"></script>';
    if (!is_array($wpNyarukoOption)) {
        $wpNyarukoOption['wpNyarukoTest'] = '此处可以任意填写一些笔记';
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
    if(isset($_POST['input_save'])) {
        $wpNyarukoOption = getOptions();
        @$wpNyarukoOption['wpNyarukoTest'] = stripslashes($_POST['wpNyarukoTest']);
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
?>
<form action="#" method="post" enctype="multipart/form-data" name="op_form" id="op_form">
    <table border="0" cellspacing="0" cellpadding="10">
    <tbody>
    <tr>
      <td>笔记(不呈现)</td>
      <td><input name="wpNyarukoTest" type="text" id="wpNyarukoTest" value="<?php echo(@$wpNyarukoOption['wpNyarukoTest']); ?>" size="64" maxlength="128" /></td>
    </tr>
    <tr>
      <td>主页模块<br/>设定</td>
      <td>
      <div id="colmgr_title"><span>
        <!-- wpNyaruko-N 主页模块设定<hr> -->
        <input type="text" id="wpNyarukoIndexModule" name="indexcol" onfocus="this.select();" />
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
    </tbody>
    </table>
    <hr><p><input id="submitoption" type="submit" name="input_save" value="应用这些设定" />　<a href="themes.php?page=theme-options.php&reset">恢复初始设定</a>　<?php } ?><a title="开源是一种态度" target="_blank" href="https://github.com/kagurazakayashi/wpNyaruko-N" target="_blank">Github</a></p></form><p><br/></p>
</div>
<?php
}
add_action('admin_menu', 'init');
?>