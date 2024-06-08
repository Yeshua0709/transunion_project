<?php
session_start();
include("connection.php");

if (isset($_REQUEST['add'])) {
    $emp_name = $_REQUEST['emp_name'];
    $emp_dept = $_REQUEST['emp_dept'];

    // Print the values for debugging purposes
    echo $emp_name;
    echo $emp_dept;

    // Prepare the SQL statement
    $query = "INSERT INTO employees (name, department) VALUES (?, ?)";

    // Prepare and bind
    if ($stmt = $mysqli->prepare($query)) {
        // Bind the parameters
        $stmt->bind_param("ss", $emp_name, $emp_dept);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New employee added successfully.";
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

    header('location: ../view/employees.php?success=1');
}
?>
