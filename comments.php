<?php
	if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
        die ('Please do not load this page directly. Thanks!');
    if ( comments_open() ) {
?>
<div class="commentsbox">
		<h1><i class="material-icons">&#xE254;</i>&nbsp;评论</h1>
		<?php
    		if (!empty($post->post_password) && $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
        ?>
<div class="cinfo"><ul><li style="list-style: inside;">请输入密码再查看评论内容。</div>
    <?php
        } else if ( !comments_open() ) {
    ?>
<div class="cinfo"><ul><li style="list-style: inside;">评论功能已经关闭。</div>
    <?php
        } else if ( !have_comments() ) {
    ?>
<div class="cinfo"><ul><li style="list-style: inside;">还没有任何评论，来说两句吧~</div>
    <?php
        } else {
            wp_list_comments('type=comment&callback=aurelius_comment');
        }
    ?>
</li></ul>
<?php
if ( !comments_open() ) :
// If registration required and not logged in.
elseif ( get_option('comment_registration') && !is_user_logged_in() ) :
?>
<h1><i class="material-icons">&#xE92A;</i>&nbsp;发表评论</h1>
<div class="cinfo">你必须 <a href="<?php echo wp_login_url( get_permalink() ); ?>">登录</a> 才能发表评论。</div>
<?php else  : ?>
<!-- Comment Form -->
<form id="commentform" name="commentform" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">
<h1><i class="material-icons">&#xE0D8;</i>&nbsp;发表评论</h1>
    <ul>
        <?php if ( !is_user_logged_in() ) : ?>
        <div class="cinfo2">
        <span class="cuserinfo"><i class="material-icons">&#xE85E;</i>&nbsp;昵称*：<input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="15" tabindex="1" /></span>&emsp;
        <span class="cuserinfo"><i class="material-icons">&#xE0BE;</i>&nbsp;邮件*：<input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="15" tabindex="2" /></span>&emsp;
        <span class="cuserinfo"><i class="material-icons">&#xE30A;</i>&nbsp;网址：<input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="15" tabindex="3" /></span>
        </div>
        <?php else : ?>
        <div class="cinfo">您已登录：<a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>，<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="退出登录">退出 &raquo;</a></div>
        <?php endif; ?>
            <p><span class="cuserinfo"><i class="material-icons">&#xE254;</i>&nbsp;评论内容：</span><br/><textarea id="message comment" name="comment" tabindex="4" rows="3" cols="40"></textarea>
            <button type="button" onClick="Javascript:document.forms['commentform'].submit()" id="subbtn"><i class="material-icons">&#xE876;</i></button></p>
    </ul>
    <?php comment_id_fields(); ?>
    <?php do_action('comment_form', $post->ID); ?>
</form>
</div>
<?php endif; 
} else {
    echo '<div id="commentsclose"><i class="material-icons">&#xE92A;</i>&nbsp;此处的评论功能已被禁用。</div>';
}?>