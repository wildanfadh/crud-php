<?php
// Create database connection using config file include_once("config.php");
// Fetch all users data from database
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>

<html>

<head>
    <title>Homepage</title>
</head>

<body>
    <a href="add.php">Add New User</a><br /><br />
    <table width='80%' border=1>
        <tr>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Update</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['mobile'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td><a href='edit.php?id=$row[id]'>Edit</a> | <a href='delete.php?id=$row[id]'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "No Data Avaliable";
        }
        ?>
    </table>
</body>

</html>