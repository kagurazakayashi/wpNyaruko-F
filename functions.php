<?php
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
function clearcontent($post) {
	$content = $post->post_content;
	$replacef = ['/\[video.*?\]/','/\[\/video.*?\]/'];
	foreach ($replacef as $replacen){ 
		$content = preg_replace($replacen,'　',$content);
	}
	$content = strip_tags($content);
	if (strlen($content) >= 300) {
		$content = substr($content,0,300)." ... [阅读全文]";
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
	$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $npost->post_content, $matches);
	//获取文章中第一张图片的路径并输出
	$first_img = @$matches[1][0];
	if(empty($first_img)){
	$first_img = bloginfo("template_url")."/images/default.jpg";
	//default.jpg
	}
	return $first_img;
}
/*获取图片完*/

function typetitle($name) {
	echo '<div class="racing_typetitle"><div class="racing_typetitlehr cell"><div class="racing_celldotted"></div></div><div class="racing_typetitletxt cell">'.$name.'</div><div class="racing_typetitlehr cell"><div class="racing_celldotted"></div></div></div>';
}

function isvideo($text) {
	$videoscode = "[V]";
	$isvideo = false;
	$newtext = str_replace($videoscode,"",$text);
	if ($text != $newtext) {
		$isvideo = true;
	}
	return [$isvideo,$newtext];
}

function curPageURL() {
	$pageURL = 'http://';

	$this_page = $_SERVER["REQUEST_URI"]; 
	if (strpos($this_page , "?") !== false) 
		$this_page = reset(explode("?", $this_page));

	$pageURL .= $_SERVER["SERVER_NAME"]  . $this_page;

	return $pageURL;
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
