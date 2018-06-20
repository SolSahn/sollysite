<html>
    <head>
        
        <title>Sol's Site</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="script.js"></script>
        
    </head>
    <body>
        
    	<form action = "<?php $_PHP_SELF ?>" method = "POST">
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
    		if (isset($_POST["post"])) { // checks if a post is being made
    			if ($_POST["post"] != "clearlogs") {
    			    if (strlen(str_replace(' ','',sanitize($_POST["post"]))) > 0) { // checks if string length is greater than zero w/o whitespace
        				echo "Post shared!<br><br>";
        				fwrite($log,sanitize($_POST["post"])."<br>"); // writes sanitized post to log along with a br
    			    }
    			} else {
    				file_put_contents('log.txt',""); // clears log if specified
    			}
    		}
    		echo file_get_contents('log.txt'); // echos log
    		fclose($log);

    	?>
        
    </body>
</html>
