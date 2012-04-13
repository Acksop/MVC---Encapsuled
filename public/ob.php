<?php
ob_start();
?>
 	<?php ob_start();?>
	<head><title>test</title></head>
 	<?php
	 $head = ob_get_contents();
	 ob_end_clean();
	?>
<!DOCTYPE h2 PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
 <html><?php var_dump($head);?><body>
    <h2><?php phpinfo();?></h2>
 </body></html>
 
<?php 
$content = ob_get_contents();
ob_end_clean();
include '../application/includes/session.php';
header('test:KO');

var_dump($content);

?>