<?php
$pagestime=microtime(true);
$wpNyarukoOption = get_option('wpNyaruko_options');
if($wpNyarukoOption['wpNyarukoPHPDebug']!='') {
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
} else {
  ini_set('display_errors', '0');
}
if($wpNyarukoOption['wpNyarukoBanBrowser']!='') {
    include_once("broswerchk.php");
    broswerchkto($wpNyarukoOption['wpNyarukoBanBrowser']);
}
if(is_admin()) {
  require ('theme-options.php');
}
add_action("user_register", "set_user_admin_bar_false_by_default", 10, 1);
function set_user_admin_bar_false_by_default($user_id) {
    update_user_meta( $user_id, 'show_admin_bar_front', 'false' );
    update_user_meta( $user_id, 'show_admin_bar_admin', 'false' );
}
/** widgets */
if( function_exists('register_sidebar') ) {
    register_sidebar(array(
        'name' => 'indexsidebar',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>'
    ));
}
//风格一　电脑：MainMenu、TabMenu　手机：wpNyaruko_SlidingMenuMobile、TabMenu
//风格二　电脑：MainMenu、wpNyaruko_SlidingMenuPc、TabMenu　手机：wpNyaruko_SlidingMenuMobile、TabMenu
if( function_exists('register_nav_menus') ) {
    register_nav_menus(array(
        'wpNyaruko_MainMenu' => '顶端主菜单,文字链接,仅电脑平台,所有风格',
        'wpNyaruko_SlidingMenuPc' => '左侧展开菜单栏,文字链接,仅电脑平台',
        'wpNyaruko_SlidingMenuMobile' => '左侧展开菜单栏,文字链接,仅手机平台,所有风格',
        'wpNyaruko_TabMenu' => '选项卡菜单,图片链接,全部平台,所有风格'
    ));
}
// 获取预览
function clearcontent($content) {
    $wpNyarukoOption = get_option('wpNyaruko_options');
    $ravideo = ['/\[video.*?\]/','/\[\/video.*?\]/','/\<\/video.*?\>/','/\<\/video.*?\>/'];
    foreach ($ravideo as $replacen){ 
        $content = preg_replace($replacen,'&emsp;',$content);
    }
    $content = strip_tags($content);
    $wpNyarukoWordlimit = intval($wpNyarukoOption['wpNyarukoWordlimit']);
    if (strlen($content) >= $wpNyarukoWordlimit) {
        $content = mb_substr($content,0,$wpNyarukoWordlimit).$wpNyarukoOption['wpNyarukoWLInfo'];
    }
    echo $content;
}
function cleardate($post) {
    echo mysql2date('Y-m-d　H:i',$post->post_date);
}
/*获取图片开始*/
function catch_that_image() {
    global $post, $posts;
    catch_image($post);
}
function catch_image($npost) {
    $first_img = '';
    ob_start();
    ob_end_clean();
    $raimage = '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i';
    $output = preg_match_all($raimage, $npost->post_content, $matches);
    //获取文章中第一张图片的路径并输出
    $first_img = @$matches[1][0];
    if(empty($first_img)){
    $first_img = bloginfo("template_url")."/images/default.jpg";
    //default.jpg
    }
    return $first_img;
}
function removevideoimage($content) {
    $mode = 1; //TODO: -1过滤所有图片 0不过滤图片 1过滤第一张图片
    $raimage = '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i';
    if ($mode != 0 && isvideo($content)) {
        $content = preg_replace($raimage,'',$content,$mode);
    }
    return $content;
}
/*获取图片完*/

function typetitle($name) {
    //echo '<div class="racing_typetitle"><div class="racing_typetitlehr cell" style="text-align: right;"><img class="racing_typetitlehrimg" id="racing_typetitlehrimgl" src="'.get_bloginfo("template_url").'/images/400004705.gif" /></div><div class="racing_typetitletxt cell">'.$name.'</div><div class="racing_typetitlehr cell"><img class="racing_typetitlehrimg" id="racing_typetitlehrimgr" src="'.get_bloginfo("template_url").'/images/400004705.gif" /></div></div>';
    echo '<div class="racing_typetitle"><div class="racing_typetitlehr cell"><div class="racing_celldotted"></div></div><div class="racing_typetitletxt cell">'.$name.'</div><div class="racing_typetitlehr cell"><div class="racing_celldotted"></div></div></div>';
}

function isvideo($content) {//nyarukolive
    $ravideo = ['/\[video.*?\]/','/\[\/video.*?\]/','/\<\/video.*?\>/','/\<\/video.*?\>/','/\[\/nyarukolive.*?\]/'];
    $newcontent = $content;
    foreach ($ravideo as $replacen){
        $newcontent = preg_replace($replacen,'',$newcontent);
    }
    if ($content != $newcontent) {
        return true;
    }
    return false;
}
function isvideotitle($title) {
    $deletekeyword = false;
    $videoscode = "视频";
    if (strstr($text,$videoscode)) {
        $newtext = $text;
        if ($deletekeyword) {
            $newtext = str_replace($videoscode,"",$text);
        }
        return [true,$newtext];
    }
    return [false,$text];
}

function curPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on")
    {
        $pageURL .= "s";
    }
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80")
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } 
    else 
    {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}

function cpath($i) {
    $n = '&emsp;<span class="sortingi"><i class="material-icons">&#xE037;</i></span>&emsp;';
    if ($i) return $n;
    echo $n;
}

function aurelius_comment($comment, $args, $depth) 
{
   $GLOBALS['comment'] = $comment; ?>
   <li class="comment" id="li-comment-<?php comment_ID(); ?>">
        <div class="gravatar"> <?php if (function_exists('get_avatar') && get_option('show_avatars')) { echo get_avatar($comment, 48); } ?></div>
        <div class="comment_content" id="comment-<?php comment_ID(); ?>">    
            <div class="clearfix">
                    <?php printf(__('<cite class="author_name">%s</cite>'), get_comment_author_link()); ?>
                    <div class="comment-meta commentmetadata">发表于：<?php echo get_comment_time('Y-m-d H:i'); ?></div>
                    &nbsp;&nbsp;&nbsp;<?php edit_comment_link('修改'); ?>
            </div>

            <div class="comment_text">
                <?php if ($comment->comment_approved == '0') : ?>
                    <em>你的评论正在审核，稍后会显示出来！</em><br />
        <?php endif; ?>
        <?php comment_text(); ?>
            </div>
        </div>
<?php }

function deduplication($showids,$nposts,$numberposts) {
    $newshowids = $showids;
    $newnposts = array();
    if(empty($nposts)){
        return [array(),$showids];
    } else {
        $nownumberposts = $numberposts;
        for ($i=0; $i < $nownumberposts; $i++) {
            if (!isset($nposts[$i])) {
                break;
            }
            $nowpost = $nposts[$i];
            $nowid = $nowpost->ID;
            $isOK = true;
            for ($j=0; $j < count($showids); $j++) {
                if ($nowid == $showids[$j]) {
                    $isOK = false;
                    break;
                }
            }
            if ($isOK) {
                array_push($newshowids,$nowid);
                array_push($newnposts,$nowpost);
            } else {
                $nownumberposts++;
            }
        }
        return array($newnposts,$newshowids);
    }
}
function deduplicationonlylog() {

}
function fontsettingconv($fontsset) {
    $fontarr = explode("\n",$fontsset);
    $fontfamilycss = "";
    foreach ($fontarr as $fontv) {
        $fonttv = $fontv;
        if (substr($fonttv,strlen($fonttv)-1,0) == "") {
            $fonttv = substr($fonttv,0,strlen($fonttv)-1);
        }
        $fontfamilycss = $fontfamilycss.'"'.$fonttv.'",';
    }
    $fontfamilycss = substr($fontfamilycss,0,strlen($fontfamilycss)-1);
    print_r($fontfamilycss);
}
function descriptionwithtag($scrdescription) {
    if (strlen($scrdescription) > 8) {
        if (strpos($scrdescription,"page_id=")) {
            $nowdpid = intval(explode("=", $scrdescription)[1]);
            return get_post($nowdpid)->post_content;
        }
    }
    return $scrdescription;
}
// function deduplication($showids,$nposts,$numberposts) {

// print_r($showids);
//     $newshowids = $showids;
//     $newnposts = $nposts;
//     $newnposts2 = array();
//     $added = 0;
//     if(empty($nposts)){
//         return [array(),$showids];
//     } else {
//         $icount = count($nposts);
//         for ($i=0; $i < $icount; $i++) {
//             if (!isset($newnposts[$i])) {
//                 break;
//             }
//             $npost = $newnposts[$i];
//             $npostid = $npost->ID;
//             $rep = false;
//             for ($j=0; $j < count($newshowids); $j++) {
//                 $showid = $newshowids[$j];
//                 if ($npostid == $showid) {
//                     unset($newnposts[$i]);
//                     $i--;
//                     $icount--;
//                     $rep = true;
//                     break;
//                 }
//             }
//             if (!$rep) {
//             }
//         }
//         for ($i=0; $i < $numberposts; $i++) {
//             if (!isset($newnposts[$i])) {
//                 break;
//             }
//             $nnpost = $newnposts[$i];
//             array_push($newnposts2,$nnpost);
//             echo $nnpost->ID;
//             $newshowids = $showids;
//             array_push($newshowids,$nnpost->ID);
//         }
//         return array($newnposts2,$newshowids);
//     }
// }

?>