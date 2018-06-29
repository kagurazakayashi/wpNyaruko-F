<div id="wpNyarukoPanelBox">
<?php
function plugininstalled($pluginfile) {
    $nowphpfile = explode(DIRECTORY_SEPARATOR, __FILE__);
    $wpdir = "";
    for ($i=0; $i < sizeof($nowphpfile); $i++) {
        if ($nowphpfile[$i] == "wp-content") {
            break;
        } else {
            if ($i == 0) {
                $wpdir = $wpdir.$nowphpfile[$i];
            } else {
                $wpdir = $wpdir.DIRECTORY_SEPARATOR.$nowphpfile[$i];
            }
        }
    }
    return file_exists($wpdir.DIRECTORY_SEPARATOR.'wp-content'.DIRECTORY_SEPARATOR.'plugins'.DIRECTORY_SEPARATOR.$pluginfile);
}
$imgdir = "../wp-content/themes/wpNyaruko-F/images/";
?>
    <a title="版本升级日志" class="link" href="https://github.com/kagurazakayashi/wpNyaruko-F/commits/master" target="_blank"><div id="wpNyarukoPanelLogo"></div> <?php include "version.php"; ?></a>
    <hr>
    <div class="wpNyarukoPanelTable">
        <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellpadding" id="wpNyarukoPanelCL">
            <h2><span class="wpNyarukoPanelh2h"></span>&nbsp;系统资讯</h2>
            <p><div class="wpNyarukoPanelTable">
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoL">IP 地址</div>
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoR">
                <?php echo $_SERVER['REMOTE_ADDR'].":".@$_SERVER ["REMOTE_PORT"]; ?>
                </div>
            </div></p>
            <p><div class="wpNyarukoPanelTable">
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoL">客户端</div>
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoR">
                <?php echo $_SERVER['HTTP_USER_AGENT']; ?>
                </div>
            </div></p>
            <p><div class="wpNyarukoPanelTable">
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoL">安全性</div>
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoR">
                <?php echo $_SERVER["REQUEST_SCHEME"]; ?>
                </div>
            </div></p>
            <p><div class="wpNyarukoPanelTable">
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoL">时间戳</div>
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoR">
                <?php echo $_SERVER["REQUEST_TIME"]."<br/>".date("Y年m月d日h时i分s秒"); ?>
                </div>
            </div></p>
            <p><div class="wpNyarukoPanelTable">
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoL">额外参数</div>
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoR">
                <?php echo $_SERVER["REQUEST_METHOD"].":".@$_SERVER["QUERY_STRING"]; ?>
                </div>
            </div></p>
            <p><div class="wpNyarukoPanelTable">
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoL">PHP</div>
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoR">
                <?php echo ini_get('php_version'); ?>
                </div>
            </div></p>
            <p><div class="wpNyarukoPanelTable">
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoL">内存限制</div>
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoR">
                <?php echo ini_get('memory_limit'); ?>
                </div>
            </div></p>
            <p><div class="wpNyarukoPanelTable">
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoL">参数提交</div>
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoR">
                <?php echo ini_get('post_max_size'); ?>
                </div>
            </div></p>
            <p><div class="wpNyarukoPanelTable">
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoL">文件上传</div>
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoR">
                <?php echo ini_get('upload_max_filesize'); ?>
                </div>
            </div></p>
            <p><div class="wpNyarukoPanelTable">
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoL">浮点位数</div>
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoR">
                <?php echo ini_get('precision'); ?>
                </div>
            </div></p>
            <p><div class="wpNyarukoPanelTable">
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoL">脚本超时</div>
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoR">
                <?php echo ini_get('max_execution_time'); ?>
                </div>
            </div></p>
            <p><div class="wpNyarukoPanelTable">
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoL">通讯超时</div>
                <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelSysInfoR">
                <?php echo ini_get('default_socket_timeout'); ?>
                </div>
            </div></p>
            
        </div>
        <div class="wpNyarukoPanelTablecell" id="wpNyarukoPanelCC"></div>
        <div class="wpNyarukoPanelTablecell wpNyarukoPanelTablecellpadding wpNyarukoPanelTablecellAutoW" id="wpNyarukoPanelCR">
            <h2><span class="wpNyarukoPanelh2h"></span>&nbsp;控制面板</h2>
            <div id="wpNyarukoPanelList">
                <a href="post-new.php"><span class="wpNyarukoPanelBtn"><img src="<?php echo $imgdir; ?>ic_edit_black_48px.svg" /><br/>新建文章</span></a>
                <a href="edit.php"><span class="wpNyarukoPanelBtn"><img src="<?php echo $imgdir; ?>ic_note_add_black_48px.svg" /><br/>文章管理</span></a>
                <a href="upload.php?mode=grid"><span class="wpNyarukoPanelBtn"><img src="<?php echo $imgdir; ?>ic_perm_media_black_48px.svg" /><br/>媒体管理</span></a>
                <a href="edit-comments.php"><span class="wpNyarukoPanelBtn"><img src="<?php echo $imgdir; ?>ic_comment_black_48px.svg" /><br/>评论管理</span></a>
                <a href="edit-tags.php?taxonomy=category"><span class="wpNyarukoPanelBtn"><img src="<?php echo $imgdir; ?>ic_merge_type_black_48px.svg" /><br/>分类管理</span></a>
                <a href="nav-menus.php?action=locations"><span class="wpNyarukoPanelBtn"><img src="<?php echo $imgdir; ?>ic_menu_black_48px.svg" /><br/>修改菜单</span></a>
                <a href="themes.php?page=theme-options.php"><span class="wpNyarukoPanelBtn"><img src="<?php echo $imgdir; ?>ic_select_all_black_48px.svg" /><br/>外观设置</span></a>
                <?php
                if (plugininstalled('wpNyarukoLive'.DIRECTORY_SEPARATOR.'nyarukolive.php')) { ?>
                <a href="tools.php?page=nyarukolive-options"><span class="wpNyarukoPanelBtn"><img src="<?php echo $imgdir; ?>baseline-live_tv-24px.svg" /><br/>视频直播</span></a>
                <?php } ?>
                <a href="index.php?nowpnyaruko"><span class="wpNyarukoPanelBtn"><img src="<?php echo $imgdir; ?>ic_settings_black_48px.svg" /><br/>全部设置</span></a>
                <a href="profile.php"><span class="wpNyarukoPanelBtn"><img src="<?php echo $imgdir; ?>ic_assignment_ind_black_48px.svg" /><br/>我的信息</span></a>
                <a href="wp-login.php?action=logout"><span class="wpNyarukoPanelBtn"><img src="<?php echo $imgdir; ?>ic_exit_to_app_black_48px.svg" /><br/>登出系统</span></a>
            </div>
        </div>
    </div>
    <hr>
    <div class="wpNyarukoPanelCenter" id="wpNyarukoPanelFoot">Powered by KagurazakaYashi 2018.</div>
</div>