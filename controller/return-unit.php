<?php

include('connection.php');
require('../fpdf186/fpdf.php');  // Include FPDF library

if (isset($_REQUEST['return_unit'])) {
    $unit_id = $_REQUEST['unit_id'];

    // Escape the input value to prevent SQL injection
    $unit_id = mysqli_real_escape_string($mysqli, $unit_id);

    // Fetch unit details before updating
    $unit_query = "SELECT * FROM units WHERE id = '$unit_id'";
    $unit_result = mysqli_query($mysqli, $unit_query);
    
    if ($unit_result && mysqli_num_rows($unit_result) > 0) {
        $unit = mysqli_fetch_assoc($unit_result);

        // Fetch employee details using the assignee ID from the unit details
        $emp_id = $unit['assignee'];
        $emp_query = "SELECT name, department FROM employees WHERE id = '$emp_id'";
        $emp_result = mysqli_query($mysqli, $emp_query);
        
        if ($emp_result && mysqli_num_rows($emp_result) > 0) {
            $employee = mysqli_fetch_assoc($emp_result);

            // Now update the unit status and assignee
            $sql = "UPDATE units SET
                    status = 'in-storage',
                    assignee = '0'
                    WHERE id = '$unit_id'";

            if (mysqli_query($mysqli, $sql)) {
                // Generate PDF
                $pdf = new FPDF();
                $pdf->AddPage();

                // Set font
                $pdf->SetFont('Arial', 'B', 12);

                // Add a cell
                $pdf->Cell(0, 10, 'Transunion Information Solutions, Philippines', 0, 1, 'C');
                $pdf->Ln(10);

                // Add employee details
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(0, 10, 'The following IT equipment has been returned by: ' . $employee['name'] . ' from ' . $employee['department'] . ' on ' . date('Y-m-d') . '.', 0, 1);
                $pdf->Ln(10);

                // Add table header
                $pdf->SetFont('Arial', 'B', 12);
                $pdf->Cell(40, 10, 'Equipment', 1);
                $pdf->Cell(40, 10, 'Model', 1);
                $pdf->Cell(30, 10, 'Quantity', 1);
                $pdf->Cell(40, 10, 'Serial', 1);
                $pdf->Cell(40, 10, 'Remarks', 1);
                $pdf->Ln(10);

                // Add table row
                $pdf->SetFont('Arial', '', 12);
                $pdf->Cell(40, 10, "Laptop", 1);
                $pdf->Cell(40, 10, $unit['model'] . " - " . $unit['memory'], 1);
                $pdf->Cell(30, 10, 1, 1);
                $pdf->Cell(40, 10, $unit['serial'], 1);
                $pdf->Cell(40, 10, " ", 1);
                $pdf->Ln(20);

                // Add signatories
                $pdf->Cell(0, 10, '', 0, 1); // Add an empty line

                // Position for the first signatory
                $pdf->SetX(10);
                $pdf->Cell(80, 10, '________________________', 0, 0, 'C');
                
                // Position for the second signatory
                $pdf->SetX(120);
                $pdf->Cell(80, 10, '________________________', 0, 1, 'C');

                // Position for the first signatory's name
                $pdf->SetX(10);
                $pdf->Cell(80, 10, 'Kichela Defeo', 0, 0, 'C');
                
                // Position for the second signatory's name
                $pdf->SetX(120);
                $pdf->Cell(80, 10, 'Alvin Aquino', 0, 1, 'C');
                
                $pdf->Ln(10);

                // Output the PDF
                $pdf->Output('D', $employee['name'] . '_returning_form.pdf');

                // Redirect to the relevant page after successful update
                echo '<script type="text/javascript">
                        window.location.href = "../view/unit.php?id=' . $unit_id . '";
                      </script>';
                exit;
            } else {
                // Redirect to the unit page in case of an error
                echo '<script type="text/javascript">
                        window.location.href = "../view/unit.php?id=' . $unit_id . '";
                      </script>';
            }
        } else {
            // Handle the case where employee details are not found
            echo '<script type="text/javascript">
                    alert("Employee details not found.");
                    window.location.href = "../view/unit.php?id=' . $unit_id . '";
                  </script>';
        }
    } else {
        // Handle the case where unit details are not found
        echo '<script type="text/javascript">
                alert("Unit details not found.");
                window.location.href = "../view/unit.php?id=' . $unit_id . '";
              </script>';
    }
}

// Close the connection
mysqli_close($mysqli);
?>
