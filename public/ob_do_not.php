 	<?php
	include '../application/includes/session.php';
	header('test:KO');
	
	//il faut faire attention, on peut imbriquzer les vecteurs de temporisation, et pas faire
	// ce genre de script ( où les temporisations sont accolées....)
	
 	ob_start();
 	?>
	<head><title>test</title></head>
 	<?php
	 $head = ob_get_contents();
	 ob_end_clean();
	?>

<?php
ob_start();
?>
<!DOCTYPE h2 PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
 <html><body>
    <h2>ob</h2>
 </body></html>
 
<?php 
var_dump($head);
$content = ob_get_contents();
ob_end_clean();



var_dump($content);

?>