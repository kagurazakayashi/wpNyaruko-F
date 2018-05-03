    <div class="foot tshadow"><?php
    $wpNyarukoOption = get_option('wpNyaruko_options');
    echo @$wpNyarukoOption['wpNyarukoFooter'];
    ?></div>
</div>
<script type="text/javascript" src="<?php bloginfo("template_url"); ?>/script.js"></script>
<?php wp_footer(); 
$consolelog = "";
if (isset($wpNyarukoOption['wpNyarukoConsoleLog']) && $wpNyarukoOption['wpNyarukoConsoleLog'] != "") {
  $consolelog = $wpNyarukoOption['wpNyarukoConsoleLog'];
}
if(@$wpNyarukoOption['wpNyarukoConsoleLogT']!='') {
  $pageetime=microtime(true);
  $pagetotal=($pageetime-$GLOBALS['pagestime'])*1000;
  $consolelog=$consolelog.' '.sprintf("%.4f", $pagetotal).' ms';
}
if ($consolelog != "") {
  echo "<script language='javascript' type='text/javascript'>console.log('".$consolelog."');</script>";
}
?>
</body>
<!-- <?php if (isMobile()) {echo "MOBILE : ";} else {echo "DESKTOP : ";} if (isset($_SERVER['HTTP_USER_AGENT'])) echo $_SERVER['HTTP_USER_AGENT']; ?> -->
</html>