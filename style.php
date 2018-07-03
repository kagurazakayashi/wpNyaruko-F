<?php function gcss($wpNyarukoOption) { ?>
<style>
/* [page */
body {
    font-family: <?php if ($wpNyarukoOption['wpNyarukoFontsF']!='') { fontsettingconv(@$wpNyarukoOption['wpNyarukoFonts']); } ?>;
}
.racing_text, .racing_text p {
    font-size: <?php echo @$wpNyarukoOption['wpNyarukoPageH0FontSize']; ?>pt;
    color: #<?php echo @$wpNyarukoOption['wpNyarukoPageH0FontColor']; ?>;
    line-height: <?php echo @$wpNyarukoOption['wpNyarukoPageH0FontLine']; ?>px;
    font-family: <?php if ($wpNyarukoOption['wpNyarukoFontsF']=='') { fontsettingconv(@$wpNyarukoOption['wpNyarukoFonts']); } ?>;
}
/* text-indent: */
.racing_indent {
    display: inline-block;
    background-color: transparent;
    height: 1px;
    width: <?php echo @$wpNyarukoOption['wpNyarukoPageIndent']; ?>px;
}
<?php
$wpNyarukoPageT = array("Size"=>"font-size","Color"=>"color","Line"=>"line-height");
for ($i=1; $i < 7; $i++) {
    echo ".racing_single_single h".$i." {";
    foreach ($wpNyarukoPageT as $wpNyarukoPageTk => $wpNyarukoPageTv) {
        $tv = @$wpNyarukoOption[("wpNyarukoPageH".$i."Font".$wpNyarukoPageTk)];
        if ($wpNyarukoPageTk == "Size") {
            $tv = $tv."pt";
        } else if ($wpNyarukoPageTk == "Color") {
            $tv = "#".$tv;
        } else if ($wpNyarukoPageTk == "Line") {
            $tv = $tv."px";
        }
        echo $wpNyarukoPageTv.":".$tv.";";
    }
    echo "} ";
}
?>
.racing_single_autosizeimg {
    padding-left: <?php
    $wpNyarukoPageImgWidth = intval(@$wpNyarukoOption['wpNyarukoPageImgWidth']);
    $racingsingleimgpadd = (100-$wpNyarukoPageImgWidth)/2; echo $racingsingleimgpadd;
    ?>% !important;
    padding-right: <?php echo $racingsingleimgpadd; ?>% !important;
    width: <?php echo $wpNyarukoPageImgWidth; ?>% !important;
    height: auto !important;
    padding-top: 20px !important;
    padding-bottom: 20px !important;
}
/* page] */
@media screen and (max-width: 840px) {
    .racing_single_autosizeimg {
        padding-left: <?php
        $wpNyarukoPageImgWidthM = intval(@$wpNyarukoOption['wpNyarukoPageImgWidthM']);
        $racingsingleimgpadd = (100-$wpNyarukoPageImgWidthM)/2; echo $racingsingleimgpadd;
        ?>% !important;
        padding-right: <?php echo $racingsingleimgpadd; ?>% !important;
        width: <?php echo $wpNyarukoPageImgWidthM; ?>% !important;
        height: auto !important;
        padding-top: 20px !important;
        padding-bottom: 20px !important;
    }
}
</style>
<?php } ?>