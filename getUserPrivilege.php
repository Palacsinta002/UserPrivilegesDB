<?php
$host = 'localhost';         
$username = 'root';          
$password = '';              
$dbname = 'UserPrivilegesDB';


$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userToSearch = $_POST["user"];
$hostToSearch = "%";
$sql = "SELECT * FROM information_schema.user_privileges WHERE GRANTEE = \"'{$userToSearch}'@'{$hostToSearch}'\"";


$result = $conn->query($sql); 



if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        if($row["PRIVILEGE_TYPE"] == "UPDATE"){
            echo "User: " . $row['GRANTEE'] . " has privilege: " . "<span class='blue'>" . $row['PRIVILEGE_TYPE'] . "</span>" . "<br>";
        }
        else if($row["PRIVILEGE_TYPE"] == "INSERT"){
            echo "User: " . $row['GRANTEE'] . " has privilege: " . "<span class='green'>" . $row['PRIVILEGE_TYPE'] . "</span>" . "<br>";
        }
        else if($row["PRIVILEGE_TYPE"] == "DELETE"){
            echo "User: " . $row['GRANTEE'] . " has privilege: " . "<span class='red'>" . $row['PRIVILEGE_TYPE'] . "</span>" . "<br>";
        }
        else if($row["PRIVILEGE_TYPE"] == "ALTER"){
            echo "User: " . $row['GRANTEE'] . " has privilege: " . "<span class='black'>" . $row['PRIVILEGE_TYPE'] . "</span>" . "<br>";
        }
        else if($row["PRIVILEGE_TYPE"] == "SELECT"){
            echo "User: " . $row['GRANTEE'] . " has privilege: " . "<span class='yellow'>" . $row['PRIVILEGE_TYPE'] . "</span>" . "<br>";
        }
        else if($row["PRIVILEGE_TYPE"] == "CREATE"){
            echo "User: " . $row['GRANTEE'] . " has privilege: " . "<span class='pink'>" . $row['PRIVILEGE_TYPE'] . "</span>" . "<br>";
        }
        else if($row["PRIVILEGE_TYPE"] == "DROP"){
            echo "User: " . $row['GRANTEE'] . " has privilege: " . "<span class='purple'>" . $row['PRIVILEGE_TYPE'] . "</span>" . "<br>";
        }
    }
} else {
    echo "No privileges found for the user '{$userToSearch}'@'{$hostToSearch}'.";
}

$conn->close();
?>