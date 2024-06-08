<?php

include 'connection.php';

// Handle search query
$search = '';
if (isset($_GET['search'])) {
    $search = $mysqli->real_escape_string($_GET['search']);
    $sql = "SELECT id, name, department FROM employees WHERE name LIKE '%$search%' OR department LIKE '%$search%'";
} else {
    // Retrieve all employee data if no search query
    $sql = "SELECT id, name, department FROM employees";
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
    <input class="search-input" type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search Employee">
    <input class='search-btn' type="submit" value="Search">
</form>
</div>

<div class="add">
    <button class="add-emp" id="emp_modal_btn">+ Add an employee</button>
</div>
</div>


<div class="emp-table-container">

<table class="emp-table">


<tr class="header-background">
        <th>ID</th>
        <th>Name</th>
        <th>Department</th>
        <th>Action</th>
    </tr>

 

<?php

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr class='emp-data'>";
        echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
        echo "<td>" . htmlspecialchars($row["department"]) . "</td>";
        echo "<td> <a class='manage-btn'href='employee.php?id=$row[id]'>Manage </a> </td> ";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='3'>No results found</td></tr>";
}
$mysqli->close();

?>

</table>

</div>



</body>
</html>
