<?php

include('connection.php');

if (isset($_REQUEST['return_unit'])) {
    $unit_id = $_REQUEST['unit_id'];

    // Escape the input value to prevent SQL injection
    $unit_id = mysqli_real_escape_string($mysqli, $unit_id);

    // Construct the SQL query
    $sql = "UPDATE units SET
    status = 'in-storage',
    assignee = '0'
    WHERE id = '$unit_id'";

    // Execute the query
    if (mysqli_query($mysqli, $sql)) {
        // Redirect to a relevant page after successful update
        header("Location: ../view/unit.php?id=$unit_id");
        exit;
    } else {
        header("Location: ../view/unit.php?id=$unit_id");
    }
}

// Close the connection
mysqli_close($mysqli);
?>
