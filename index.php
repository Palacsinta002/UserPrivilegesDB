<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
        <select name="users" id="users">
         <?php 
            for($i = 0; $i < count($list); $i++) { 
                echo "<option value="$i"></option>"
            }
         ?>
        </select>
    </form>
</body>
</html>