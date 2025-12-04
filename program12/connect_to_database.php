<?php
// Database connection details
$servername = "localhost";
$username = "root";      // default username in xampp/wamp
$password = "";          // default password (empty)
$dbname = "sampledb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to retrieve data
$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
        }
        th {
            background-color:rgb(216, 106, 106);
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<h2>Student Details</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>Course</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        // Output each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['name']."</td>
                    <td>".$row['age']."</td>
                    <td>".$row['course']."</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='4' style='text-align:center;'>No Records Found</td></tr>";
    }
    ?>

</table>

</body>
</html>

<?php
$conn->close();
?>