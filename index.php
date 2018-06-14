<html>
    <head>
        
        <title>Sol's Spectacular Site</title>
        <link rel="icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" type="text/css" href="style.css">
        <script src="script.js"></script>
        
    </head>
    <body>
        
        <?php
            
            for ($i = 1; $i <= 50; $i++) {
                echo $i;
                echo " ";
                if (($i % 5) == 0) {
                    echo "<br>";
                }
            }
            
        ?>
        
    </body>
</html>
