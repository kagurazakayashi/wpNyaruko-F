<?php $colid = 0; ?>
<!-- 1顶端大图 -->
<?php get_header(); ?>

<div class="tshadow">
<!-- 2焦点新闻 -->
<?php $colid++; $categoryid = 4; $numberposts = 1;
include "column_bigpicture.php"; ?>
<!-- 3三个次焦点新闻 -->
<?php $colid++; $categoryid = 5; $numberposts = 3;
include "column_contentlist.php"; ?>
<!-- 4横排视频 -->
<?php $colid++; $categoryid = 6; $numberposts = 6;
include "column_picturelist.php"; ?>
<!-- 5流新闻列表 -->
<?php $colid++; $categoryid = 3; $numberposts = 10;
include "column_contentlist.php"; ?>
<!-- 6横排图片 -->
<?php $colid++; $categoryid = 7; $numberposts = 6;
include "column_picturelist.php"; ?>
</div>

<!-- 7页脚 -->
<?php get_footer(); ?>