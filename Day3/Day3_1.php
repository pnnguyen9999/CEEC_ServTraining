<?php error_reporting(E_ERROR | E_PARSE); ?>
<html>
	<?php 
		echo "<h1 style=\"color:#ff0000\">hello world !</h1>";
		$a = 8;
		$b = 4;
		if ($b == 0) {
			echo "yeu cau b khac 0";
		} else {
			echo $a/$b;
		}
 		
		echo "<br>";

		for ($x = 1; $x <= 5; $x++) {
  			echo "<b>| $x |</b><br>";
		}
	?>
</html>