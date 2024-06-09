<?php

include('connection.php');

if (isset($_REQUEST['assign_unit'])) {
    $emp_id = $_REQUEST['emp_name'];
    $unit_id = $_REQUEST['unit_id'];

    // Escape the input values to prevent SQL injection
    $emp_id = mysqli_real_escape_string($mysqli, $emp_id);
    $unit_id = mysqli_real_escape_string($mysqli, $unit_id);

    // Construct the SQL query
    $sql = "UPDATE units SET status = 'Assigned', assignee = '$emp_id' WHERE id = '$unit_id'";

    // Execute the query
    if (mysqli_query($mysqli, $sql)) {
        // Redirect to a relevant page after successful update (e.g., units.php)
        header("Location: ../view/unit.php?id=$unit_id");
        exit;
    } else {
        header("Location: ../view/units.php");
    }
}

// Close the connection
mysqli_close($mysqli);
?>