<?php
session_start();
include("connection.php");

if (isset($_REQUEST['add'])) {
    $unit_serial = $_REQUEST['unit_serial'];
    $unit_model = $_REQUEST['unit_model'];
    $unit_memory = $_REQUEST['unit_memory'];
    $unit_assignee = 0;
    $unit_status = 'in-storage';


    // Prepare the SQL statement
    $query = "INSERT INTO units (serial,model,memory,status,assignee) VALUES (?, ?,?,?,?)";

    // Prepare and bind
    if ($stmt = $mysqli->prepare($query)) {
        // Bind the parameters
        $stmt->bind_param("sssss", $unit_serial,$unit_model,$unit_memory,$unit_status, $unit_assignee);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New unit added successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error: " . $mysqli->error;
    }

    // Close the connection
    $mysqli->close();

    header('location: ../view/units.php?success=1');
}
?>
