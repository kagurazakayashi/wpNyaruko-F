<?php get_header(); ?>
    <?php if (have_posts()) : the_post(); update_post_caches($posts); ?>
    <script type="text/javascript">settitle("<?php echo get_the_title(); ?>",'<?php cleardate($post); ?>');</script>

    <!-- <?php the_permalink(); comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭'); ?> -->
    <div class="racing_single">
        <div class="racing_single_single">
            <div class="sorting">
                <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>主页">主页</a><?php cpath(false); the_category('　'); cpath(false); ?>内容阅读
                <?php edit_post_link('编辑', '　(已使用有', '权限的账户登录)'); ?>
            </div>
            <div id="sortingtotext"></div>
            <div class="racing_text"><?php echo do_shortcode(removevideoimage(get_the_content())); ?></div>
        </div>
    <script type="text/javascript">contentformat();</script>
    <?php comments_template(); ?>
</div>
<?php else : ?>
没有文章！
<?php endif; ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>