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
            function sanitize($input) { // sanitize function to prevent sneaky bois
                $search = array(
                    '@<script[^>]*?>.*?</script>@si',   // strip out javascript
                    '@<[\/\!]*?[^<>]*?>@si',            // strip out html tags
                    '@<style[^>]*?>.*?</style>@siU',    // strip style tags properly
                    '@<![\s\S]*?--[ \t\n\r]*>@'         // strip multi-line comments
                );
                $output = preg_replace($search, '', $input);
                return $output;
            }
            
    		$log = fopen('log.txt',"a+") or die("Unable to open post log."); // creates and opens log variable
    		if (isset($_GET["post"])) { // checks if a post is being made
    			if ($_GET["post"] != "clearlogs") {
    			    if (strlen(preg_replace(' ','',$_GET["post"])) > 0) {
        				echo "Post shared!<br><br>";
        				fwrite($log,sanitize($_GET["post"])."<br>"); // writes sanitized post to log along with a br
    			    }
    			} else {
    				file_put_contents('log.txt',""); // clears log if specified
    			}
    		}
    		echo substr(readfile('log.txt'), 0, -3); // echos log
    		fclose($log);

    	?>
        
    </body>
</html>
