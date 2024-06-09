<?php

include 'connection.php';

// Handle search query
$search = '';
if (isset($_GET['search'])) {
    $search = $mysqli->real_escape_string($_GET['search']);
    $sql = "
        SELECT u.id, u.serial, u.model, u.memory, u.assignee, u.status, e.name AS assignee_name
        FROM units u
        LEFT JOIN employees e ON u.assignee = e.id
        WHERE 
        e.name LIKE '%$search%' OR 
        u.id LIKE '%$search%' OR 
        u.serial LIKE '%$search%' OR 
        u.model LIKE '%$search%' OR 
        u.memory LIKE '%$search%' OR 
        u.assignee LIKE '%$search%' OR 
        u.status LIKE '%$search%'

    ";
} else {
    // Retrieve all data if no search query
    $sql = "
        SELECT u.id, u.serial, u.model, u.memory, u.assignee, u.status, e.name AS assignee_name
        FROM units u
        LEFT JOIN employees e ON u.assignee = e.id
    ";
}

$result = $mysqli->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Employees</title>
</head>
<body>

<!-- Search form -->
<div class="search-add">
    <div class="search">
        <form method="GET" action="">
            <input class="search-input" type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search Unit">
            <input class='search-btn' type="submit" value="Search">
        </form>
    </div>
    <div class="add">
        <button class="add-emp" id="emp_modal_btn">+ Add a unit</button>
    </div>
</div>

<div class="emp-table-container">
    <table class="emp-table">
        <tr class="header-background">
            <th>ID</th>
            <th>Serial #</th>
            <th>Model</th>
            <th>Memory</th>
            <th>Assignee</th>
            <th>Status</th>
            <th>Manage</th>
        </tr>

        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr class='emp-data'>";
                echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["serial"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["model"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["memory"]) . "</td>";

                if($row["assignee"] == 0){
                    echo "<td> Not Assigned</td>";
                } else {
                    echo "<td>" . htmlspecialchars($row["assignee_name"]) . "</td>";
                }

                if($row["status"] === "for repair"){
                    echo "<td class='unit-status'><p class='for-repair'> For Repair </p></td>";
                } else if($row["status"] === "Assigned"){
                    echo "<td class='unit-status'><p class='assigned'> Assigned </p></td>";
                } else if($row["status"] === "in-storage"){
                    echo "<td class='unit-status'><p class='in-storage'> In-Storage </p></td>";
                }

                echo "<td> <a class='manage-btn' href='../view/unit.php?id=".$row['id']."'>Manage </a> </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No results found</td></tr>";
        }
        $mysqli->close();
        ?>

    </table>
</div>

</body>
</html>
