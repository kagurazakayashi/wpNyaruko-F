<!-- Footer -->
	<div class="foot tshadow"><?php
	$wpNyarukoOption = get_option('wpNyaruko_options');
	echo @$wpNyarukoOption['wpNyarukoFooter'];
	?></div>
</div>
<!--end wrapper-->
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
<script src="resources/bootstrap.min.js"></script>
<script type="text/javascript" src="resources/flexible-bootstrap-carousel.js"></script>
</body>
</html>