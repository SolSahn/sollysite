<html>
    <head>
        
        <title>Sol's Site</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="script.js"></script>
        
    </head>
    <body>
        
    	<form action = "<?php $_PHP_SELF ?>" method = "GET">
        	Post: <input type="text" name="post"/>
         	<input type = "submit"/>
      	</form>

    	<?php

    		$log = fopen('log.txt',"a+") or die("Unable to open post log.");
    		if (isset($_GET["post"])) {
    			if ($_GET["post"] != "clearlogs") {
    				echo "Post shared!<br><br>";
    				fwrite($log,$_GET["post"]."<br>");
    			} else {
    				file_put_contents('log.txt',"");
    			}
    		}
    		echo substr(readfile('log.txt'), 0, -3);
    		fclose($log);

    	?>
        
    </body>
</html>
