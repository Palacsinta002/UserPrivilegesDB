<?php
$host = 'localhost';         
$username = 'root';          
$password = '';              
$dbname = 'UserPrivilegesDB';


$userToSearch = 'username';  
$hostToSearch = 'localhost';  


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userToSearch = $_POST["user"];
$hostToSearch = "localhost";
$sql = "SELECT * FROM USER_PRIVILEGES WHERE GRANTEE = \"'{$userToSearch}'@'{$hostToSearch}'\"";


$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "User: " . $row['GRANTEE'] . " has privilege: " . $row['PRIVILEGE_TYPE'] . "<br>";
    }
} else {
    echo "No privileges found for the user '{$userToSearch}'@'{$hostToSearch}'.";
}

$conn->close();
?>