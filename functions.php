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
		$content = substr($content,0,$wpNyarukoWordlimit).$wpNyarukoOption['wpNyarukoWLInfo'];
	}
	echo $content;
}
function cleardate($post) {
	echo mysql2date('Y-m-d　h:i',$post->post_date);
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
	$mode = 1; //TODO: 0不过滤图片 1过滤第一张图片 2过滤所有图片
	$raimage = '/<img.+src=[\'"]([^\'"]+)[\'"].*>/i';
	if ($mode > 0 && isvideo($content)) {
		$content = preg_replace($raimage,'',$content);
	}
	return $content;
}
/*获取图片完*/

function typetitle($name) {
	echo '<div class="racing_typetitle"><div class="racing_typetitlehr cell"><div class="racing_celldotted"></div></div><div class="racing_typetitletxt cell">'.$name.'</div><div class="racing_typetitlehr cell"><div class="racing_celldotted"></div></div></div>';
}

function isvideo($content) {
	$ravideo = ['/\[video.*?\]/','/\[\/video.*?\]/','/\<\/video.*?\>/','/\<\/video.*?\>/'];
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
	$n = '&emsp;<i class="material-icons">&#xE037;</i>&emsp;';
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
<?php } ?>