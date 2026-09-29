<!DOCTYPE html>
<html>
<body>

<form method="POST">
    <textarea name="sql_query" rows="5" cols="50"></textarea><br>
    <input type="submit" value="Run SQL">
</form>

<?php
if (isset($_POST['sql_query'])) {
    $db = new PDO("sqlite:migrainehealthmetrics.db");
    //query box
    $statement = $db->query($_POST['sql_query']);
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    //results
    if ($rows) {
        echo "<table border='1'>";

        // table formatting
        echo "<tr>";
        foreach (array_keys($rows[0]) as $column) {
            echo "<th>$column</th>";
        }
        echo "</tr>";

        foreach ($rows as $row) {
            echo "<tr>";
            foreach ($row as $data) {
                echo "<td>$data</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>

</body>
</html>