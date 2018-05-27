<?php get_header(); $wpNyarukoOption = get_option('wpNyaruko_options'); ?>
<div class="tshadow">
<div class="listoption">
    <div class="clistbox">
        <span class="sortby">
            <select onchange="if(this.value==''){this.selectedIndex=this.defOpt;}else{window.location=this.value;}">
                <option value="" selected>更改排序方式</option>
                <option value="">=======</option>
                <option value="<?php echo curPageURL().'?'.http_build_query(array_merge($_GET, array('order' => 'date'))); ?>">最新内容</option>
                <option value="<?php echo curPageURL().'?'.http_build_query(array_merge($_GET, array('order' => 'rand'))); ?>">随机阅读</option>
                <option value="<?php echo curPageURL().'?'.http_build_query(array_merge($_GET, array('order' => 'commented'))); ?>">评论最多</option>
                <option value="<?php echo curPageURL().'?'.http_build_query(array_merge($_GET, array('order' => 'title'))); ?>">标题排序</option>
                <?php if (@$wpNyarukoOption['wpNyarukoPHPDebug']) { ?>
                    <option value="">=======</option>
                    <option value="<?php echo curPageURL().'?'.http_build_query(array_merge($_GET, array('order' => 'ID'))); ?>">文章ID</option>
                    <option value="<?php echo curPageURL().'?'.http_build_query(array_merge($_GET, array('order' => 'modified'))); ?>">修改时间</option>
                <?php } ?>
            </select>
        </span>
        <span class="sorting">
        <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>主页">主页</a><?php
        cpath(false);
            $typename = "";
            $description = "";
            if (is_category()) {
                $typename = single_cat_title('', false);
                echo "分类".cpath(true).$typename;
                if (category_description()) {
                    $description = category_description();
                }
            } elseif (is_tag()) {
                $typename = single_tag_title('', false);
                echo "标签".cpath(true).$typename;
                if (tag_description()) {
                    $description = tag_description();
                }
            } elseif (is_day()) {
                $typename = get_the_time('j日');
                echo "日期存档".cpath(true).get_the_time('Y年n月j日');
            } elseif (is_month()) {
                $typename = get_the_time('n月');
                echo "月份存档".cpath(true).get_the_time('Y年n月');
            } elseif (is_year()) {
                $typename = get_the_time('Y年');
                echo "年份存档".cpath(true).get_the_time('Y年');
            } elseif (is_author()) {
                $typename = "";
                echo '作者存档';
            } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {
                echo '博客存档';
            }
            ?>
        </span>
    </div>
</div>
<script type="text/javascript">settitle("<?php echo $typename; ?>");</script>
<div class="racing_listbox">
    <div class="racing_list_tlr"></div>
    <div class="racing_list">
<?php
global $wp_query;

if ( isset($_GET['order']) && ($_GET['order']=='rand') ) 
{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args=array(
        'orderby' => 'rand',
        'paged' => $paged,
    );
    $arms = array_merge(
        $args,
        $wp_query->query
    );
    query_posts($arms);
}
else if ( isset($_GET['order']) && ($_GET['order']=='commented') )
{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args=array(
        'orderby' => 'comment_count',
        'order' => 'DESC',
        'paged' => $paged,
    );
    $arms = array_merge(
        $args,
        $wp_query->query
    );
    query_posts($arms);
}
else if ( isset($_GET['order']) && ($_GET['order']=='alpha') )
{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args=array(
        'orderby' => 'title',
        'order' => 'ASC',
        'paged' => $paged,
    );
    $arms = array_merge(
        $args,
        $wp_query->query
    );
    query_posts($arms);
}
if ($description != "") {
    echo '<div id="description" class="racing_text">'.$description.'</div>';
}
if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="racing_item" onclick="racinglistgotolink('<?php the_permalink(); ?>')">
        <div class="racing_list_left">
            <div class="racing_list_left_class" onclick="racinglistleftclass('<?php echo get_tag_link(@get_the_tags()[0]->term_id); ?>')"><?php
                $ntypename = @get_the_tags()[0]->name;
                if ($ntypename == "") {
                    $ntypename = $typename;
                }
                echo $ntypename;
            ?></div>
            <img class="racing_list_left_img" src="<?php 
            $itemimage = catch_image($post);
            if ($itemimage == "") {
                bloginfo("template_url");
                echo "images/default.jpg";
            } else {
                echo $itemimage;
            }
            ?>" alt="<?php echo get_the_title(); ?>" />
            <?php if (isvideo(get_the_content())) { echo '<div class="racing_list_left_play material-icons">&#xE039;</div>'; } ?>
        </div>
        <div class="racing_list_right" onclick="racinglistgotolink('<?php the_permalink(); ?>')">
            <div class="racing_list_right_title"><?php the_title(); ?></div>
            <div class="racing_list_right_content"><?php clearcontent(get_the_content()); ?></div>
            <div class="racing_list_right_bottom">
                <div class="racing_list_right_bottom_time"><?php
                cleardate($post);
                echo "　";
                comments_popup_link('0 条评论', '1 条评论', '% 条评论', '', '评论已关闭');
                echo "　";
                edit_post_link('编辑', '', '');
                ?></div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <div class="morebtnbox morebtnboxarchive">
        <?php
        $nppostslinkspan = "";
        $previouspostslink = get_previous_posts_link("&lt;&lt;", 0);
        $previouspostslink = str_replace("&lt;&lt;",'<span><i class="material-icons">&#xE314;</i></span><span>查看新文章</span>',$previouspostslink);
        $nextpostslink = get_next_posts_link("&lt;&lt;", 0);
        $nextpostslink = str_replace("&lt;&lt;",'<span>查看旧文章</span><span class="material-icons">&#xE315;</span>',$nextpostslink);
        if ($previouspostslink && $nextpostslink) {
            $nppostslinkspan = "&emsp;&emsp;";
        }
        echo str_replace("\n","",$previouspostslink.$nppostslinkspan.$nextpostslink);
        ?>
    </div>
</div>
<div class="racing_list_tlr"></div>
        <?php else : ?>
        <center><p>暂无内容</p></center>
        <?php endif; ?>
    </div>
    <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>