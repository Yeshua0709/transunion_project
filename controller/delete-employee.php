<?php

include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Escape the input value to prevent SQL injection
    $id = mysqli_real_escape_string($mysqli, $id);

    // Construct the SQL query to delete the employee
    $sql = "DELETE FROM employees WHERE id = '$id'";

    // Execute the query
    if (mysqli_query($mysqli, $sql)) {
        // Successful deletion, redirect to the employee list page or show a success message
      header("location: ../view/employees.php?delete_success=1");
      
    } else {
        // Error handling in case the query fails
        echo '<script type="text/javascript">
                alert("Error deleting employee: ' . mysqli_error($mysqli) . '");
                window.location.href = "../view/employees.php";
              </script>';
    }
}

// Close the connection
mysqli_close($mysqli);
?>
