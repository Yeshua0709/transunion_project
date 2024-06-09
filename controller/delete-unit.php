<?php

include ('connection.php');

    if(isset($_REQUEST['delete_unit'])){

            $unit_id =  $_REQUEST['unit_id'];

            echo $unit_id;


                // Construct the DELETE SQL query
    $sql = "DELETE FROM units WHERE id = '$unit_id'";

    // Execute the query
    if (mysqli_query($mysqli, $sql)) {
        // Redirect to the units page after successful deletion
        header("Location: ../view/units.php?delete_success=1");
        exit;
    } else {
        
    }
    }



?>