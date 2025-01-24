<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST">
        <table>
            <tr>
                <td>User:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Lekérdez"></td>
            </tr>
        </table>
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] = "POST"){
            require_once "getUserPrivilege.php";
        }
    ?>
</body>
</html>