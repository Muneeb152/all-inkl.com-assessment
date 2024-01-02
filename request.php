<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve database connection details from the form
    $host = $_POST['host'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $database = $_POST['database'];
    $query = $_POST['query'];

    // Create connection to the database
    $conn = new mysqli($host, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query data
    $result = $conn->query($query);

    // Fetch data
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    echo json_encode($data);

    // Close connection
    $conn->close();
}

?>
